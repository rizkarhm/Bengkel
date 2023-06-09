<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendWhatsapp extends Controller
{
    public function sendMessage(Request $request){
        $nama = $request->input('nama');
        $pesan = $request->input('pesan');
        $url = "https://wa.me/087959159058?text=Halo, saya " . urlencode($nama) . ". " . urlencode($pesan);

        return redirect()->away($url);
    }
}
