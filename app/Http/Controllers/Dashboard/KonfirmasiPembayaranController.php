<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemesanan;
use Illuminate\Support\Facades\Mail;
use App\Mail\PembayaranTervalidasi;


class KonfirmasiPembayaranController extends Controller
{
    //
    public function index()
    {
        $pendingPembayaran = Pemesanan::with(['member', 'paket'])
            ->where('status', 'pending')
            ->orderBy('tanggal', 'asc')
            ->get();

        return view('admin.konfirmasi-pembayaran', compact('pendingPembayaran'));
    }

    public function konfirmasi($id)
    {
        $pemesanan = \App\Models\Pemesanan::with('member')->findOrFail($id);
        $pemesanan->status = 'confirmed';
        $pemesanan->save();

        // Kirim email jika ada alamat email
        $email = $pemesanan->member->email ?? $pemesanan->email;
        if ($email) {
            Mail::to($email)->send(new PembayaranTervalidasi($pemesanan));
        }

        return redirect()->route('admin.konfirmasi.index')->with('success', 'Pembayaran berhasil dikonfirmasi dan email telah dikirim.');
    }
}
