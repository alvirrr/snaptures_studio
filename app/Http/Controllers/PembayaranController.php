<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Pemesanan;
use Illuminate\Support\Facades\Storage;

class PembayaranController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'invoice' => 'required|string|max:100',
            'bank' => 'required|string|max:100',
            'jumlah' => 'required|numeric',
            'bukti' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
        ]);

        // Simpan bukti transfer
        $buktiPath = $request->file('bukti')->store('bukti-pembayaran', 'public');

        // Simpan ke tabel pembayaran
        Pembayaran::create([
            'nama' => $validated['nama'],
            'invoice' => $validated['invoice'],
            'bank' => $validated['bank'],
            'jumlah' => $validated['jumlah'],
            'bukti' => $buktiPath,
        ]);

        // Cari dan update pemesanan jika ditemukan
        $pemesanan = Pemesanan::where('kode_transaksi', $validated['invoice'])
            ->orWhere('id', $validated['invoice'])
            ->first();

        if ($pemesanan) {
            $pemesanan->bukti_pembayaran = $buktiPath;
            $pemesanan->status = 'pending'; // Menunggu konfirmasi admin
            $pemesanan->save();
        }

        return redirect()->back()->with('success', 'Konfirmasi pembayaran berhasil dikirim.');
    }
}
