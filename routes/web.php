<?php

use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\MemberAuthController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\formPesananController;
use App\Http\Controllers\registmemberController;
use App\Http\Controllers\MemberPemesananController;
use App\Http\Controllers\EditProfilMemberController;
use App\Http\Controllers\Member\ResetPasswordController;
use App\Http\Controllers\Member\ForgotPasswordController;

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

// Route::get('/paket', function () {
//     $paket = Paket::first(); // atau bisa pakai where/kategori sesuai kebutuhan
//     return view('paket', compact('paket'));
// });

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

Route::get('/member/lupa-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('member.password.request');
Route::post('/member/lupa-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('member.password.email');

// Route reset form
Route::get('/member/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])
    ->name('password.reset');  // ← alias default Laravel
// ->name('member.password.reset'); // tetap bisa pakai yang lama

// Route post reset
Route::post('/member/reset-password', [ResetPasswordController::class, 'reset'])
    ->name('member.password.update');

Route::get('/kontak', function () {
    return view('kontak');
});
Route::post('/kirim-kontak', [KontakController::class, 'kirim']);

// Route::get('/selfphoto', function () {
//     $paket = Paket::first(); // atau bisa pakai where/kategori sesuai kebutuhan
//     return view('selfphoto', compact('paket'));
// });

Route::get('/photostudio', function () {
    $paket = Paket::first(); // atau bisa pakai where/kategori sesuai kebutuhan
    return view('photostudio', compact('paket'));
});

// Route::get('/pasphoto', function () {
//     return view('pasphoto');
// });

Route::get('/paket', [PaketController::class, 'all'])->name('paket.all');
Route::get('/selfphoto', [PaketController::class, 'selfphoto'])->name('paket.selfphoto');
//Route::get('/pasphoto', [PaketController::class, 'pasphoto'])->name('paket.pasphoto');
Route::get('/photostudio', [PaketController::class, 'photostudio'])->name('paket.photostudio');

Route::get('/pasphoto', [PaketController::class, 'pasphoto'])->name('paket.pasphoto');
Route::get('/formpesanan/{slug}', [PesananController::class, 'create'])->name('formpesanan');
Route::post('/formpesanan/{slug}', [PesananController::class, 'store'])->name('pesanan.submit');

Route::get('/login', function () {
    return view('login');
});
// Route::get('/login', function () {
//     return view('booking');
// })->name('login');

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


// Route::post('/nota', [formPesananController::class, 'submit'])->name('pesanan.submit');
// Route::get('/nota', [formPesananController::class, 'nota'])->name('nota');

Route::get('/pilih-lanjutan/{slug}', function ($slug) {
    return view('lanjutan', compact('slug'));
})->name('pilih.lanjutan');

Route::get('/formpesanan/{slug}', [formPesananController::class, 'showForm'])->name('formpesanan');
Route::post('/kirim-pesanan', [formPesananController::class, 'submitForm'])->name('pesanan.submit');

Route::get('/nota', function (Request $request) {
    $data = $request->session()->get('nota_data');
    if (!$data) {
        return redirect('/'); // jika tidak ada data, kembali ke home
    }
    return view('nota', compact('data'));
})->name('nota');

Route::get('/pembayaran', function () {
    return view('pembayaran');
})->name('pembayaran');


// Pilih Paket dari Dashboard
Route::middleware(['auth:member'])->group(function () {
    Route::get('/member/pilih-paket', [MemberPemesananController::class, 'pilihPaket'])->name('member.pilihpaket');
    Route::get('/member/pemesanan/{paket}', [MemberPemesananController::class, 'formPemesanan'])->name('member.formpesanan');

    // Tambah route post:
    Route::post('/member/pemesanan', [MemberPemesananController::class, 'store'])->name('member.pesanan.store');


    // Route untuk nota:
    Route::get('/member/pesanan/nota/{id}', [MemberPemesananController::class, 'showNota'])->name('member.pesanan.nota');
});
