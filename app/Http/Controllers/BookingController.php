<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Kendaraan;
use App\Models\User;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $data = Booking::all();
        $bookings = $data->intersect(Booking::whereIn('status', ['Booked', 'In Queue', 'Proccessed'])->get());
        return view('admin.booking.index', [
            'bookings' => $bookings
        ]);
    }

    public function create()
    {
        //get data user all
        $users = User::all();
        //get data user dengan role customer
        $cust = $users->intersect(User::whereIn('role', ['Customer'])->get());
        //get data user dengan role magang & mekanik
        $pic = $users->intersect(User::whereIn('role', ['Magang', 'Mekanik'])->get());

        //get data kendaraan all
        $kendaraans = Kendaraan::all();

        return view('admin.booking.form',  compact('cust', 'kendaraans', 'pic'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'kendaraan_id' => 'required',
            'model' => 'required',
            'nopol' => 'required|min:7',
            'tgl_masuk' => 'required|date',
            'tgl_selesai' => 'nullable',
            'pic_id' => 'nullable',
            'status' => 'required'
        ]);

        if ($request->status == "Done"){
            $tglKeluar = date('Y-m-d');
        } else if ($request->status == "Canceled"){
            $tglKeluar = "-";
        } else {
            $tglKeluar = null;
        }

        Booking::create([
            'user_id' => $request->user_id,
            'kendaraan_id' => $request->kendaraan_id,
            'model' => $request->model,
            'nopol' => $request->nopol,
            'tgl_masuk' => $request->tgl_masuk,
            'tgl_selesai' => $tglKeluar,
            'pic_id' => $request->pic_id,
            'status' => $request->status,
        ]);

        return redirect()->route('booking.index')
            ->with('success', 'Berhasil menambah appointment baru');
    }


    public function show($id)
    {
        //get data user all
        $users = User::all();
        //get data user dengan role customer
        $cust = $users->intersect(User::whereIn('role', ['customer'])->get());
        //get data user dengan role magang & mekanik
        $pic = $users->intersect(User::whereIn('role', ['Magang', 'Mekanik'])->get());

        //get data kendaraan all
        $kendaraans = Kendaraan::all();

        $booking = Booking::find($id);
        if (!$booking) return redirect()->route('booking.index')
            ->with('error', 'Booking dengan id' . $id . ' tidak ditemukan');

        return view('admin.booking.show', [
            'bookings' => $booking,
            'cust' => $cust,
            'pic' => $pic,
            'kendaraans' => $kendaraans
        ]);
    }

    public function edit($id)
    {
        //get data user all
        $users = User::all();
        //get data user dengan role customer
        $cust = $users->intersect(User::whereIn('role', ['customer'])->get());
        //get data user dengan role magang & mekanik
        $pic = $users->intersect(User::whereIn('role', ['Magang', 'Mekanik'])->get());

        //get data kendaraan all
        $kendaraans = Kendaraan::all();

        $booking = Booking::find($id);
        if (!$booking) return redirect()->route('booking.index')
            ->with('error', 'Booking dengan id' . $id . ' tidak ditemukan');

        return view('admin.booking.edit', [
            'bookings' => $booking,
            'cust' => $cust,
            'pic' => $pic,
            'kendaraans' => $kendaraans
        ]);

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required',
            'kendaraan_id' => 'required',
            'model' => 'required',
            'nopol' => 'required|min:7',
            'tgl_masuk' => 'required|date',
            'tgl_selesai' => 'nullable',
            'pic_id' => 'nullable',
            'status' => 'required'
        ]);

        if ($request->status == "Done"){
            $tglKeluar = date('Y-m-d');
        } else if ($request->status == "Canceled"){
            $tglKeluar = "-";
        } else {
            $tglKeluar = null;
        }

        $booking = Booking::find($id);
        $booking->user_id = $request->user_id;
        $booking->kendaraan_id = $request->kendaraan_id;
        $booking->model = $request->model;
        $booking->nopol = $request->nopol;
        $booking->tgl_masuk = $request->tgl_masuk;
        $booking->tgl_selesai = $tglKeluar;
        $booking->pic_id = $request->pic_id;
        $booking->status = $request->status;

        $booking->save();

        return redirect()->route('booking.index')
            ->with('success', 'Berhasil mengubah data booking');
    }

    public function destroy($id)
    {
        $booking = Booking::find($id);

        if ($booking) {
            $booking->delete();
            return redirect()->route('booking.index')
                ->with('success', 'Berhasil menghapus data booking');
        }
    }
}
