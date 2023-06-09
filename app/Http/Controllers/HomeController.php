<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Feedback;
use App\Models\Galeri;
use App\Models\Kendaraan;
use App\Models\Kontak;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galeri = Galeri::all();
        $kontak = Kontak::all();
        $feedback = Feedback::all();

        return view('user.index', [
            'galeri' => $galeri,
            'kontak' => $kontak,
            'feedback' => $feedback,
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

        if (auth()->user() != null) {
            if (auth()->user()->role == 'Customer') {
                return view('admin.booking.create-customer',  compact('cust', 'kendaraans', 'pic'));
            } else {
                return view('admin.booking.create',  compact('cust', 'kendaraans', 'pic'));
            }
        } else {
            return redirect()->route('login');
        }
    }

}
