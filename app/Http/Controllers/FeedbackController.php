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
        $bookings = Booking::all();

        return view('admin.feedback.index', [
            'feedbacks' => $feedbacks,
            'bookings' => $bookings
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
