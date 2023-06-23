<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'kendaraan_id',
        'model',
        'nopol',
        'no_mesin',
        'masalah',
        'tgl_masuk',
        'tgl_selesai',
        'status',
        'pic_id',
        'ket_pembatalan',
        'penanganan',
    ];

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    public function pic()
    {
        return $this->belongsTo(User::class, 'pic_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }

    public function feedback()
    {
        return $this->hasOne(Feedback::class);
    }
}
