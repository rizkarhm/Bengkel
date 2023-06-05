<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        //get all data
        $all_booking = Booking::all();

        //get user id
        $user = auth()->user()->id;

        //book appointment
        $bookings = $all_booking->intersect(Booking::whereIn('status', ['Booked', 'In Queue', 'Proccessed'])->get());

        //status booked atau pending
        $booked = Booking::where('status', 'Booked')->get();

        //history booking
        $historys = $all_booking->intersect(Booking::whereIn('status', ['Done', 'Canceled'])->get());

        //User
        $user = User::all();

        //customer
        $customer = User::where('role', 'Customer')->get();

        //mekanik dan magang
        $pegawai = $user->intersect(User::whereIn('role', ['Mekanik', 'Magang', 'Admin'])->get());

        return view('admin.dashboard', [
            'all_booking' => $all_booking,
            'bookings' => $bookings,
            'historys' => $historys,
            'customer' => $customer,
            'pegawai' => $pegawai,
            'booked' => $booked,
        ]);
    }
}
