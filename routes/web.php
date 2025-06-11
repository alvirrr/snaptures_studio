<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\BookingController;
use App\Http\Controllers\formPesananController;

Route::get('/', function () {
    return view('home');
});

Route::get('/tentang', function () {
    return view('tentang');
});

Route::get('/jadwal', function () {
    return view('jadwal');
});

Route::get('/paket', function () {
    return view('paket');
});

Route::get('/pembayaran', function () {
    return view('pembayaran');
});

Route::get('/member', function () {
    return view('member');
});

Route::get('/kontak', function () {
    return view('kontak');
});

Route::get('/selfphoto', function () {
    return view('selfphoto');
});

Route::get('/photostudio', function () {
    return view('photostudio');
});

Route::get('/pasphoto', function () {
    return view('pasphoto');
});

// Route::get('/login', function () {
//     return view('login');
// });
Route::get('/login', function () {
    return view('booking');
})->name('login');

Route::get('/register', function () {
    return view('register');
});

Route::get('/visi', function () {
    return view('visi');
});

Route::get('/misi', function () {
    return view('misi');
});

Route::get('/formpesanan', function () {
    return view('formpesanan');
});

Route::get('/nota', function () {
    return view('nota');
});

Route::get('/profil', function () {
    return view('profil');
});

// Route::get('/booking', function () {
//     return view('booking');
// });


// routes/web.php
// Route::middleware(['auth'])->group(function () {
//     Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
//     Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
//     Route::get('/booking/slots', [BookingController::class, 'getBookedSlots']);
// });


Route::post('/nota', [formPesananController::class, 'submit'])->name('pesanan.submit');
Route::get('/nota', [formPesananController::class, 'nota'])->name('nota');
