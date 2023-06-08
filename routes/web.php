<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::resource('/', HomeController::class);

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSimpan')->name('register.simpan');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAksi')->name('login.aksi');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

// Route::get('/', function () {
//     return view('auth.login');
// });

Route::middleware('auth')->group(function () {

    Route::resource('dashboard', DashboardController::class);

    Route::resource('profile', ProfileController::class);
    Route::resource('user', UserController::class);
    Route::resource('customer', CustomerController::class);

    Route::resource('booking', BookingController::class);
    Route::get('/get-data/{id}', [BookingController::class, 'getData'])->name('getData');
    Route::get('/mekanik-booking', [BookingController::class, 'mekanik'])->name('mekanik.booking');

    Route::resource('history', HistoryController::class);
    Route::get('/mekanik-history', [HistoryController::class, 'mekanik'])->name('mekanik.history');

    Route::resource('feedback', FeedbackController::class);
    Route::get('/mekanik-feedback', [FeedbackController::class, 'mekanik'])->name('mekanik.feedback');

    Route::resource('galeri', GaleriController::class);
    Route::resource('kontak', KontakController::class);
    Route::resource('kendaraan', KendaraanController::class);

});
