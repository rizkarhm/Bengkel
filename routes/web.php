<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSimpan')->name('register.simpan');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAksi')->name('login.aksi');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::get('/', function () {
    return view('auth/login');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('user', UserController::class);
    Route::resource('booking', BookingController::class);
    Route::resource('galeri', GaleriController::class);
    Route::resource('kontak', KontakController::class);
    Route::resource('feedback', FeedbackController::class);
    Route::resource('kendaraan', KendaraanController::class);

});
