<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemesanan;

class AdminPemesananController extends Controller
{
    // //
    // public function index()
    // {
    //     $pemesanans = Pemesanan::where('status', 'Pending')->orderBy('tanggal')->get();
    //     return view('admin.konfirmasi-jadwal', compact('pemesanans'));
    // }

    // public function konfirmasi($id)
    // {
    //     $pemesanan = Pemesanan::findOrFail($id);
    //     $pemesanan->status = 'Confirmed';
    //     $pemesanan->save();

    //     return back()->with('success', 'Pemesanan berhasil dikonfirmasi.');
    // }

    // public function tolak($id)
    // {
    //     $pemesanan = Pemesanan::findOrFail($id);
    //     $pemesanan->status = 'Ditolak';
    //     $pemesanan->save();

    //     return back()->with('success', 'Pemesanan ditolak.');
    // }
}
