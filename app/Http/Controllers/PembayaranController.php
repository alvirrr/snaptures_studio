<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
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

        // Simpan ke database
        Pembayaran::create([
            'nama' => $validated['nama'],
            'invoice' => $validated['invoice'],
            'bank' => $validated['bank'],
            'jumlah' => $validated['jumlah'],
            'bukti' => $buktiPath,
        ]);

        return redirect()->back()->with('success', 'Konfirmasi pembayaran berhasil dikirim.');
    }
}
