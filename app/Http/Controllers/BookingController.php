<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Feedback;
use App\Models\Kendaraan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BookingController extends Controller
{
    public function index()
    {
        //all with paginate
        $all = Booking::orderBy('id', 'asc')->paginate(10);

        //get user id
        $user = auth()->user()->id;

        //get all booking data with status Booked, In Queue, and Proccessed
        $bookings = Booking::whereIn('status', ['Booked', 'In Queue', 'Proccessed'])
            ->paginate(10);

        //customer
        $bookings_user = Booking::whereIn('status', ['Booked', 'In Queue', 'Proccessed'])
            ->where('user_id', $user)
            ->paginate(4);

        //magang
        $bookings_pic = Booking::whereIn('status', ['Booked', 'In Queue', 'Proccessed'])
            ->where('pic_id', $user)
            ->paginate(4);

        return view('admin.booking.index', [
            'all' => $all,
            'bookings' => $bookings,
            'bookings_user' => $bookings_user,
            'bookings_pic' => $bookings_pic,
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

        if (auth()->user()->role == 'Customer') {
            return view('admin.booking.create-customer',  compact('cust', 'kendaraans', 'pic'));
        } else {
            return view('admin.booking.create',  compact('cust', 'kendaraans', 'pic'));
        }
    }

    //Store Booking + Create customer
    public function store(Request $request)
    {
        if ($request->status == "Done") {
            $tglKeluar = date('Y-m-d');
        } else if ($request->status == "Canceled") {
            $tglKeluar = "-";
        } else {
            $tglKeluar = null;
        }

        if (auth()->user()->role == 'Customer') {
            $user_id = auth()->user()->id;
        } else {
            $user_id = $request->user_id;
        }

        if ($user_id == "new_customer") {
            $this->validate($request, [
                //validasi new customer
                'nama' => 'required',
                'telepon' => 'required|unique:users',
                'alamat' => 'nullable',

                //validasi new booking
                'kendaraan_id' => 'required',
                'model' => 'required',
                'nopol' => 'required|min:7',
                'masalah' => 'required',
                'tgl_masuk' => 'required|date',
            ]);

            $create_user = User::create([
                'nama' => $request->nama,
                'telepon' => $request->telepon,
                'alamat' => $request->alamat,
                'password' => Hash::make('customer123'),
                'role' => 'Customer'
            ]);

            Booking::create([
                'user_id' => $create_user->id,
                'kendaraan_id' => $request->kendaraan_id,
                'model' => $request->model,
                'nopol' => $request->nopol,
                'masalah' => $request->masalah,
                'tgl_masuk' => $request->tgl_masuk,
                'tgl_selesai' => $tglKeluar,
                'pic_id' => $request->pic_id,
                'status' => 'Booked',
            ]);
        } else {
            $this->validate($request, [
                //validasi new customer
                // 'nama' => 'required',
                // 'telepon' => 'required|unique:users',
                // 'alamat' => 'nullable',

                //validasi new booking
                'kendaraan_id' => 'required',
                'model' => 'required',
                'nopol' => 'required|min:7',
                'masalah' => 'required',
                'tgl_masuk' => 'required|date',
            ]);

            Booking::create([
                'user_id' => $user_id,
                'kendaraan_id' => $request->kendaraan_id,
                'model' => $request->model,
                'nopol' => $request->nopol,
                'masalah' => $request->masalah,
                'tgl_masuk' => $request->tgl_masuk,
                'tgl_selesai' => $tglKeluar,
                'pic_id' => $request->pic_id,
                'status' => 'Booked',
            ]);
        }

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

        //get data feedback all
        $feedbacks = Feedback::all();

        $booking = Booking::find($id);
        if (!$booking) return redirect()->route('booking.index')
            ->with('error', 'Booking dengan id' . $id . ' tidak ditemukan');

        return view('admin.booking.show', [
            'bookings' => $booking,
            'cust' => $cust,
            'pic' => $pic,
            'kendaraans' => $kendaraans,
            'feedbacks' => $feedbacks,
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

        $status = $booking->status;
        // if ($status == 'Proccessed') {
        //     return redirect()->route('booking.show', $booking->id)
        //         ->with('error', 'Data booking dengan status Proccessed tidak dapat diubah');
        // } else if ($status == 'Done') {
        //     return redirect()->route('booking.show', $booking->id)
        //         ->with('error', 'Data booking dengan status Done tidak dapat diubah');
        // } else if ($status == 'Canceled') {
        //     return redirect()->route('booking.show', $booking->id)
        //         ->with('error', 'Data booking dengan status Canceled tidak dapat diubah');
        // } else {
        return view('admin.booking.edit', [
            'bookings' => $booking,
            'cust' => $cust,
            'pic' => $pic,
            'kendaraans' => $kendaraans
        ]);
        // }
    }

    public function update(Request $request, $id)
    {

        if ($request->status == "Done") {
            $tglKeluar = date('Y-m-d');
            $ket_pembatalan = null;
            $penanganan = $request->penanganan;
        } else if ($request->status == "Canceled") {
            $tglKeluar = "-";
            $ket_pembatalan = $request->ket_pembatalan;
            $penanganan = null;
        } else {
            $tglKeluar = null;
            $ket_pembatalan = null;
            $penanganan = null;
        }

        $user_id = auth()->user()->id;

        $booking = Booking::find($id);
        if (auth()->user()->role == "Customer") {
            $request->validate([
                'kendaraan_id' => 'required',
                'model' => 'required',
                'nopol' => 'required|min:7',
                'tgl_masuk' => 'required|date',
                'tgl_selesai' => 'nullable',
                'masalah' => 'required',
                'pic_id' => 'nullable',
                'ket_pembatalan' => 'nullable',
                'penanganan' => 'nullable',
            ]);
            $booking->user_id = $user_id;
            $booking->status = "Booked";
        } else {
            $request->validate([
                'user_id' => 'required',
                'kendaraan_id' => 'required',
                'model' => 'required',
                'nopol' => 'required|min:7',
                'masalah' => 'required',
                'tgl_masuk' => 'required|date',
                'tgl_selesai' => 'nullable',
                'pic_id' => 'nullable',
                'ket_pembatalan' => 'nullable',
                'penanganan' => 'nullable',
                'status' => 'required'
            ]);
            $booking->user_id = $request->user_id;
            $booking->status = $request->status;
        }
        $booking->kendaraan_id = $request->kendaraan_id;
        $booking->model = $request->model;
        $booking->nopol = $request->nopol;
        $booking->masalah = $request->masalah;
        $booking->tgl_masuk = $request->tgl_masuk;
        $booking->tgl_selesai = $tglKeluar;
        $booking->pic_id = $request->pic_id;
        $booking->penanganan = $penanganan;
        $booking->ket_pembatalan = $ket_pembatalan;

        $booking->save();

        return redirect()->route('booking.index')
            ->with('success', 'Berhasil mengubah data booking');
    }

    public function destroy($id)
    {
        $booking = Booking::find($id);
        $status = $booking->status;

        $isUsed = DB::table('feedback')->where('booking_id', $id)->exists();

        if ($isUsed == 1) {
            return redirect()->route('booking.index')
                ->with('error', 'Hapus gagal. Data memiliki relasi dengan tabel lain');
        } else if ($status == 'Proccessed') {
            return redirect()->route('booking.index')
                ->with('error', 'Data booking dengan status Proccessed tidak dapat dihapus');
        } else if ($status == 'Done') {
            return redirect()->route('booking.index')
                ->with('error', 'Data booking dengan status Done tidak dapat dihapus');
        } else if ($status == 'Canceled') {
            return redirect()->route('booking.index')
                ->with('error', 'Data booking dengan status Canceled tidak dapat dihapus');
        } else {
            if ($booking) {
                $booking->delete();
                return redirect()->route('booking.index')
                    ->with('success', 'Berhasil menghapus data booking');
            }
        }
    }
}
