<?php

use App\Models\Paket;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\MemberAuthController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\formPesananController;
use App\Http\Controllers\registmemberController;
use App\Http\Controllers\JadwalBookingController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\AdminRescheduleController;
use App\Http\Controllers\MemberPemesananController;
use App\Http\Controllers\EditProfilMemberController;
use App\Http\Controllers\Admin\RegistAdminController;
use App\Http\Controllers\Dashboard\MenuPaketController;
use App\Http\Controllers\Dashboard\MenuMemberController;
use App\Http\Controllers\Member\ResetPasswordController;
use App\Http\Controllers\Admin\PembayaranAdminController;
use App\Http\Controllers\Member\ForgotPasswordController;
use App\Http\Controllers\Dashboard\MenuPropertiController;
use App\Http\Controllers\Admin\LupaPasswordAdminController;
use App\Http\Controllers\Dashboard\AdminPemesananController;
use App\Http\Controllers\Dashboard\MenuBackgroundController;
use App\Http\Controllers\Dashboard\MenuPortofolioController;
use App\Http\Controllers\Dashboard\KonfirmasiPembayaranController;

Route::get('/', function () {
    $paket = Paket::first(); // atau bisa pakai where/kategori sesuai kebutuhan
    return view('home', compact('paket'));
});

// Route::get('/tentang', function () {
//     return view('tentang');
// });
Route::get('/tentang', [TentangController::class, 'index'])->name('tentang');

Route::get('/tentang/portofolio', [TentangController::class, 'loadPortofolio'])->name('tentang.portofolio');
Route::get('/tentang/properti', [TentangController::class, 'loadProperti'])->name('tentang.properti');
Route::get('/tentang/background', [TentangController::class, 'loadBackground'])->name('tentang.background');

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


// Route::get('/dashboard-member', function () {
//     return view('member.dashboard-member');
// })->name('member.dashboard');

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

// Route::get('/nota', function () {
//     return view('nota');
// });

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

// Menampilkan form pemesanan berdasarkan slug paket
Route::get('/formpesanan/{slug}', [PesananController::class, 'create'])->name('formpesanan');

// Menangani pengiriman data pemesanan
Route::post('/kirim-pesanan', [PesananController::class, 'store'])->name('pesanan.submit');

// Menampilkan halaman nota
Route::get('/nota', function () {
    if (!session()->has('nota_data')) {
        return redirect('/'); // Redirect jika data nota tidak tersedia
    }
    return view('nota');
})->name('nota');
Route::get('/nota/unduh', [PesananController::class, 'unduhNota'])->name('nota.download');


Route::get('/pembayaran', function () {
    return view('pembayaran');
})->name('pembayaran');
Route::post('/konfirmasi-pembayaran', [PembayaranController::class, 'store'])->name('pembayaran.store');

// Pilih Paket dari Dashboard
Route::middleware(['auth:member'])->group(function () {
    Route::get('/member/pilih-paket', [MemberPemesananController::class, 'pilihPaket'])->name('member.pilihpaket');
    Route::get('/member/pemesanan/{paket}', [MemberPemesananController::class, 'formPemesanan'])->name('member.formpesanan');

    // Tambah route post:
    Route::post('/member/pemesanan', [MemberPemesananController::class, 'store'])->name('member.pesanan.store');


    // Route untuk nota:
    Route::get('/member/pesanan/nota/{id}', [MemberPemesananController::class, 'showNota'])->name('member.pesanan.nota');

    Route::get('/member/riwayat', [MemberPemesananController::class, 'riwayat'])->name('member.riwayat')->middleware('auth:member');

    Route::get('/member/poin', [MemberAuthController::class, 'poin'])->name('member.poin');
    //Route::get('/member/poin/riwayat', [MemberPemesananController::class, 'riwayatPoin'])->name('member.poin.riwayat');

});
Route::get('/member/riwayat-poin', [MemberPemesananController::class, 'riwayatPoin'])
    ->middleware('auth:member')
    ->name('member.riwayat-poin');

Route::get('/member/nota/download/{id}', [MemberPemesananController::class, 'downloadNota'])
    ->name('nota.member.download')
    ->middleware('auth:member');
Route::get('/member/pemesanan/{id}/reschedule', [MemberPemesananController::class, 'formReschedule'])
    ->name('member.reschedule.form')
    ->middleware('auth:member');
Route::get('/member/pemesanan/{id}/reschedule', [MemberPemesananController::class, 'formReschedule'])->name('member.reschedule.form')->middleware('auth:member');
Route::post('/member/pemesanan/{id}/reschedule', [MemberPemesananController::class, 'submitReschedule'])->name('member.reschedule.submit')->middleware('auth:member');




// Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
// // user admin
// Route::middleware(['auth:admin'])->prefix('admin')->group(function () {
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

//     Route::get('/pembayaran', [PembayaranAdminController::class, 'index'])->name('admin.pembayaran.index');
//     Route::post('/pembayaran/{id}/verifikasi', [PembayaranAdminController::class, 'verifikasi'])->name('admin.pembayaran.verifikasi');
// });


// Route::get('/admin', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
// Route::post('/admin', [AdminAuthController::class, 'login'])->name('admin.login.submit');
// Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');


// PROSES login Admin
Route::get('/login-admin', function () {
    return view('admin.login-admin');
})->name('admin.login');
Route::post('/login-admin', [AdminAuthController::class, 'login'])->name('admin.login.submit');

// PROSES logout Admin
Route::post('/logout-admin', [AdminAuthController::class, 'logout'])->name('admin.logout');

//register Admin
Route::get('/register-admin', function () {
    return view('admin.register-admin');
})->name('admin.register');

// POST → Menyimpan data pendaftaran ke database
Route::post('/register-admin', [RegistAdminController::class, 'useradmin'])->name('admin.register.store');

// lupa password admin
Route::get('/admin/lupa-password', [LupaPasswordAdminController::class, 'showLinkRequestForm'])->name('admin.password.request');
Route::post('/admin/lupa-password', [LupaPasswordAdminController::class, 'sendResetLinkEmail'])->name('admin.password.email');

// Dashboard Admin
// Route::get('/dashboard-admin', function () {
//     return view('admin.dashboard');
// })->name('admin.dashboard');

// Dashboard untuk admin (dengan proteksi login)
Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});
// Menu Dashboard Admin
// Route::get('/admin/member', function () {
//     $members = Member::all(); // atau paginate jika banyak
//     return view('admin.member', compact('members'));
// })->name('admin.members');

Route::prefix('admin')->name('admin.')->middleware(['auth:admin'])->group(function () {
    Route::get('/member', [MenuMemberController::class, 'index'])->name('members');
    Route::get('/member/{id}/edit', [MenuMemberController::class, 'edit'])->name('members.edit');
    Route::put('/member/{id}', [MenuMemberController::class, 'update'])->name('members.update');
    Route::delete('/member/{id}', [MenuMemberController::class, 'destroy'])->name('members.destroy');
});

Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('/paket', [MenuPaketController::class, 'index'])->name('admin.paket');
    Route::get('/paket/{id}/edit', [MenuPaketController::class, 'edit'])->name('admin.paket.edit');
    Route::put('/paket/{id}', [MenuPaketController::class, 'update'])->name('admin.paket.update');
    Route::delete('/paket/{id}', [MenuPaketController::class, 'destroy'])->name('admin.paket.destroy');
    Route::get('/paket/tambah', [MenuPaketController::class, 'create'])->name('admin.paket.create');
    Route::post('/paket', [MenuPaketController::class, 'store'])->name('admin.paket.store');
});

// portofolio
Route::get('/galeri', [UserController::class, 'gallery'])->name('galeri');

Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('/portofolio', [MenuPortofolioController::class, 'index'])->name('admin.portofolio');
    Route::get('/portofolio/create', [MenuPortofolioController::class, 'create'])->name('admin.portofolio.create');
    Route::post('/portofolio', [MenuPortofolioController::class, 'store'])->name('admin.portofolio.store');
    Route::get('/portofolio/{portofolio}/edit', [MenuPortofolioController::class, 'edit'])->name('admin.portofolio.edit');
    Route::put('/portofolio/{portofolio}', [MenuPortofolioController::class, 'update'])->name('admin.portofolio.update');
    Route::delete('/portofolio/{portofolio}', [MenuPortofolioController::class, 'destroy'])->name('admin.portofolio.destroy');
});

// properti
//Route::get('/properti', [UserController::class, 'property'])->name('properti');

Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('/properti', [MenuPropertiController::class, 'index'])->name('admin.properti');
    Route::get('/properti/create', [MenuPropertiController::class, 'create'])->name('admin.properti.create');
    Route::post('/properti', [MenuPropertiController::class, 'store'])->name('admin.properti.store');
    Route::get('/properti/{properti}/edit', [MenuPropertiController::class, 'edit'])->name('admin.properti.edit');
    Route::put('/properti/{properti}', [MenuPropertiController::class, 'update'])->name('admin.properti.update');
    Route::delete('/properti/{properti}', [MenuPropertiController::class, 'destroy'])->name('admin.properti.destroy');
});

// Background
//Route::get('/properti', [UserController::class, 'property'])->name('properti');

Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('/background', [MenuBackgroundController::class, 'index'])->name('admin.background');
    Route::get('/background/create', [MenuBackgroundController::class, 'create'])->name('admin.background.create');
    Route::post('/background', [MenuBackgroundController::class, 'store'])->name('admin.background.store');
    Route::get('/background/{background}/edit', [MenuBackgroundController::class, 'edit'])->name('admin.background.edit');
    Route::put('/background/{background}', [MenuBackgroundController::class, 'update'])->name('admin.background.update');
    Route::delete('/background/{background}', [MenuBackgroundController::class, 'destroy'])->name('admin.background.destroy');
});

// Route::middleware(['auth:admin'])->group(function () {
//     Route::get('/admin/konfirmasi-jadwal', [AdminPemesananController::class, 'index'])->name('admin.konfirmasi.index');
//     Route::post('/admin/konfirmasi/{id}', [AdminPemesananController::class, 'konfirmasi'])->name('admin.konfirmasi.setuju');
//     Route::post('/admin/tolak/{id}', [AdminPemesananController::class, 'tolak'])->name('admin.konfirmasi.tolak');
// });

Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('/reschedule', [AdminRescheduleController::class, 'index'])->name('admin.reschedule.index');
    Route::post('/reschedule/{id}/approve', [AdminRescheduleController::class, 'approve'])->name('admin.reschedule.approve');
    Route::post('/reschedule/{id}/reject', [AdminRescheduleController::class, 'reject'])->name('admin.reschedule.reject');
});

Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('/pesanan', [AdminPemesananController::class, 'index'])->name('admin.pesanan.index');
    Route::get('/pesanan/{id}', [AdminPemesananController::class, 'show'])->name('admin.pesanan.show');
    Route::get('/admin/pesanan-nonmember/{id}', [AdminPemesananController::class, 'showNonMember'])->name('admin.pesanan.nonmember.show');
});

Route::prefix('admin')->middleware(['auth:admin'])->group(function () {
    Route::get('/konfirmasi-pembayaran', [KonfirmasiPembayaranController::class, 'index'])->name('admin.konfirmasi.index');
    Route::post('/konfirmasi-pembayaran/{id}/konfirmasi', [KonfirmasiPembayaranController::class, 'konfirmasi'])->name('admin.konfirmasi.konfirmasi');
});

Route::prefix('member')->middleware('auth:member')->group(function () {
    Route::get('/voucher', [\App\Http\Controllers\Member\VoucherController::class, 'index'])->name('member.voucher');
    Route::post('/voucher/tukar/{id}', [\App\Http\Controllers\Member\VoucherController::class, 'tukar'])->name('member.voucher.tukar');
});


Route::get('/jadwal-booking', [JadwalBookingController::class, 'index'])->name('jadwal.index');
Route::post('/jadwal-booking', [JadwalBookingController::class, 'store'])->name('jadwal.store');
Route::get('/cek-jam/{tanggal}', [JadwalBookingController::class, 'cekJam'])->name('cek.jam');
