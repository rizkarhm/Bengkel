<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'rating',
        'feedback',
    ];

    // public function bookings()
    // {
    //     return $this->hasMany(Booking::class);
    // }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
