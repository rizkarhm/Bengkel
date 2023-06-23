<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Kendaraan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get user id
        $user = auth()->user()->id;

        //get all booking data with status canceled or done
        $history_all = Booking::whereIn('status', ['Canceled', 'Done'])->with('user', 'pic')
            ->paginate(10);

        //get history booking where user_id == customer id
        $history_customer = Booking::whereIn('status', ['Canceled', 'Done'])->with('user', 'pic')
            ->where('user_id', $user)
            ->paginate(10);

        //get history booking where user_id == PIC id
        $history_pic = Booking::whereIn('status', ['Canceled', 'Done'])->with('user', 'pic')
            ->where('pic_id', $user)
            ->paginate(10);

        return view('admin.history.index', [
            'historys' => $history_all,
            'history_customer' => $history_customer,
            'history_pic' => $history_pic,
        ]);
    }

    public function mekanik()
    {
        //get user id
        $user = auth()->user()->id;

        //mekanik
        $history_pic = Booking::whereIn('status', ['Canceled', 'Done'])
            ->where('pic_id', $user)
            ->paginate(10);

        return view('admin.history.mekanik', [
            'history_pic' => $history_pic,
        ]);
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

        $isExist = DB::table('feedback')->where('booking_id', $id)->exists();

        $booking = Booking::find($id);
        if (!$booking) return redirect()->route('booking.index')
            ->with('error', 'Riwayat dengan id' . $id . ' tidak ditemukan');

        return view('admin.history.show', [
            'bookings' => $booking,
            'cust' => $cust,
            'pic' => $pic,
            'kendaraans' => $kendaraans,
            'isExist' => $isExist,
        ]);
    }

    public function reminderForm($id)
    {
        $customer = User::find($id);
        return view('admin.history.reminder', ['customer' => $customer]);
    }

    public function redirectToWhatsApp(Request $request)
    {
        // Get the input values
        $phoneNumber = $request->input('telepon');
        $message = $request->input('pesan');

        // Format the phone number (remove any non-numeric characters)
        $formattedPhoneNumber = preg_replace('/^0/', '62', $phoneNumber);

        // Create the WhatsApp URL with the custom number and message
        $whatsAppUrl = "https://api.whatsapp.com/send?phone={$formattedPhoneNumber}&text=" . urlencode($message);

        // Redirect the user to WhatsApp
        return redirect()->away($whatsAppUrl);
    }
}
