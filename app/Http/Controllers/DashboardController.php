<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Feedback;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        //get all data
        $all_booking = Booking::all();

        //get user id
        $user = auth()->user()->id;

        //book appointment
        $bookings = $all_booking->intersect(Booking::whereIn('status', ['Booked', 'In Queue', 'Proccessed', 'Canceled'])->get());

        //status booked atau pending
        $booked = Booking::where('status', 'Booked')->get();

        //history booking
        $historys = $all_booking->intersect(Booking::whereIn('status', ['Done'])->get());

        //User
        $user = User::all();

        //feedback
        $feedback = Feedback::all();

        //customer
        $customer = User::where('role', 'Customer')->get();

        //mekanik dan magang
        $pegawai = $user->intersect(User::whereIn('role', ['Mekanik', 'Magang', 'Admin'])->get());

        $chart = Booking::select(DB::raw("COUNT(*) as count"))
            ->whereYear('tgl_masuk', date('Y'))
            ->groupBy(DB::raw("Month(tgl_masuk)"))
            ->pluck('count');

        $bulan = Booking::select(DB::raw("MONTHNAME(tgl_masuk) as bulan"))
            ->whereYear('tgl_masuk', date('Y'))
            ->groupBy(DB::raw("MONTHNAME(tgl_masuk)"))
            ->pluck('bulan');

        return view('admin.dashboard', compact(
            'all_booking',
            'bookings',
            'historys',
            'customer',
            'pegawai',
            'feedback',
            'booked',
            'chart',
            'bulan'
        ));
    }
}
