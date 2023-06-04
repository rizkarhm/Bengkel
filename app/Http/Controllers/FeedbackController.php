<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Feedback;
use App\Models\Kendaraan;
use App\Models\User;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::all();

        //get user id
        $user = auth()->user()->id;

        return view('admin.feedback.index', [
            'feedbacks' => $feedbacks,
            'user' => $user
        ]);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'booking_id' => 'required',
            'rating' => 'required',
            'feedback' => 'required'
        ]);

        Feedback::create([
            'booking_id' => $request->booking_id,
            'rating' => $request->rating,
            'feedback' => $request->feedback,
        ]);

        return redirect()->route('booking.index')
        ->with('success', 'Feedback berhasil ditambahkan');
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

        //get data kendaraan all
        $bookings = Booking::all();

        $feedbacks = Feedback::find($id);
        if (!$feedbacks) return redirect()->route('feedback.index')
            ->with('error', 'Booking dengan id' . $id . ' tidak ditemukan');

        return view('admin.feedback.show', [
            'feedbacks' => $feedbacks,
            'cust' => $cust,
            'pic' => $pic,
            'kendaraans' => $kendaraans,
            'bookings' => $bookings
        ]);
    }

    //get booking id from detail booking for create feedback
    public function edit($id)
    {
        $feedbacks = Feedback::all();
        $booking = Booking::find($id);
        $booking_id = $booking->id;

        return view('admin.feedback.create', [
            'feedbacks' => $feedbacks,
            'booking_id' => $booking_id,
            'booking' => $booking
        ]);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $feedbacks = Feedback::find($id);
        if ($feedbacks) {
            $feedbacks->delete();
            return redirect()->route('booking.index')
                ->with('success', 'Berhasil menghapus feedback');
        }
    }
}
