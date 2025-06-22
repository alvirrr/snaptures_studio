<?php

use App\Models\Paket;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\MemberAuthController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\formPesananController;
use App\Http\Controllers\registmemberController;
use App\Http\Controllers\EditProfilMemberController;

Route::get('/', function () {
    $paket = Paket::first(); // atau bisa pakai where/kategori sesuai kebutuhan
    return view('home', compact('paket'));
});

Route::get('/tentang', function () {
    return view('tentang');
});

Route::get('/jadwal', function () {
    return view('jadwal');
});

Route::get('/paket', function () {
    $paket = Paket::first(); // atau bisa pakai where/kategori sesuai kebutuhan
    return view('paket', compact('paket'));
});

Route::get('/pembayaran', function () {
    return view('pembayaran');
})->name('pembayaran.form');

Route::post('/pembayaran', [PembayaranController::class, 'store'])->name('pembayaran.store');

// Route::get('/member', function () {
//     return view('member');
// });
// FORM login member
Route::get('/login-member', function () {
    return view('member.login-member');
})->name('member.login');

// PROSES login member
Route::post('/login-member', [MemberAuthController::class, 'login'])->name('member.login.submit');

// PROSES logout member
Route::post('/logout-member', [MemberAuthController::class, 'logout'])->name('member.logout');

// Dashboard untuk member (dengan proteksi login)
Route::middleware('auth:member')->group(function () {
    Route::get('/member/dashboard', function () {
        return view('member.dashboard-member');
    })->name('member.dashboard');
});

//register member
Route::get('/register-member', function () {
    return view('member.register-member');
})->name('member.register');

// POST → Menyimpan data pendaftaran ke database
Route::post('/register-member', [registmemberController::class, 'usermember'])->name('member.register.store');


Route::get('/dashboard-member', function () {
    return view('member.dashboard-member');
})->name('member.dashboard');

Route::middleware('auth:member')->group(function () {
    Route::get('/member/edit', [EditProfilMemberController::class, 'edit'])->name('member.edit');
    Route::post('/member/update', [EditProfilMemberController::class, 'update'])->name('member.update');
});

Route::get('/kontak', function () {
    return view('kontak');
});
Route::post('/kirim-kontak', [KontakController::class, 'kirim']);

Route::get('/selfphoto', function () {
    $paket = Paket::first(); // atau bisa pakai where/kategori sesuai kebutuhan
    return view('selfphoto', compact('paket'));
});

Route::get('/photostudio', function () {
    $paket = Paket::first(); // atau bisa pakai where/kategori sesuai kebutuhan
    return view('photostudio', compact('paket'));
});

// Route::get('/pasphoto', function () {
//     return view('pasphoto');
// });

Route::get('/pasphoto', [PaketController::class, 'index'])->name('pasphoto');
Route::get('/formpesanan/{slug}', [PesananController::class, 'create'])->name('formpesanan');
Route::post('/formpesanan/{slug}', [PesananController::class, 'store'])->name('pesanan.submit');

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

// Route::get('/formpesanan', function () {
//     return view('formpesanan');
// });

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
