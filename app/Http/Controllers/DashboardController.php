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
        $all = count($all_booking);

        //get user id
        $user = auth()->user()->id;

        //book appointment
        $bookings = $all_booking->intersect(Booking::whereIn('status', ['Booked', 'In Queue', 'Proccessed', 'Canceled'])->get());
        $booking = count($bookings);

        //status booked atau pending
        $bookeds = Booking::where('status', 'Booked')->get();
        $booked = count($bookeds);

        //history booking
        $historys = $all_booking->intersect(Booking::whereIn('status', ['Done'])->get());
        $history = count($historys);

        //User
        $users = User::all();
        $user = count($users);

        //feedback
        $feedbacks = Feedback::all();
        $feedback = count($feedbacks);

        //customer
        $customers = User::where('role', 'Customer')->get();
        $customer = count($customers);

        //mekanik dan magang
        $pegawais = $users->intersect(User::whereIn('role', ['Mekanik', 'Magang', 'Admin'])->get());
        $pegawai = count($pegawais);

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
            'all',
            'bookings',
            'booking',
            'historys',
            'history',
            'customers',
            'customer',
            'pegawais',
            'pegawai',
            'feedbacks',
            'feedback',
            'bookeds',
            'booked',
            'chart',
            'bulan'
        ));
    }
}
