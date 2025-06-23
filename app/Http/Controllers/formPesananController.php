<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;

class FormPesananController extends Controller
{
    /** GET /formpesanan/{slug} */
    public function showForm($slug)
    {
        $paket = Paket::where('slug', $slug)->firstOrFail();

        return view('formpesanan', compact('paket'));   // slug tak wajib dikirim lagi
    }

    /** POST /kirim-pesanan */
    public function submitForm(Request $request)
    {
        // 1. Validasi
        $validated = $request->validate([
            'nama'       => 'required|string|max:255',
            'no_hp'      => 'required|string|max:20',
            'paket_id'   => 'required|exists:pakets,id',
            'tanggal'    => 'required|date',
            'waktu'      => 'required|string',
            'pembayaran' => 'required|in:dp,lunas',
        ]);

        // 2. Ambil detail paket sekali saja
        $paket = Paket::findOrFail($validated['paket_id']);

        // 3. Hitung total bayar
        $totalBayar = $validated['pembayaran'] === 'dp' ? 50000 : $paket->harga;

        // 4. Susun data untuk nota
        $notaData = [
            'nama'        => $validated['nama'],
            'no_hp'       => $validated['no_hp'],
            'paket'       => $paket->nama,
            'harga'       => $paket->harga,
            'pembayaran'  => $validated['pembayaran'],
            'tanggal'     => $validated['tanggal'],
            'waktu'       => $validated['waktu'],
            'total_bayar' => $totalBayar,
        ];

        // 5. Simpan ke session & redirect
        $request->session()->put('nota_data', $notaData);

        return redirect()->route('nota');
    }
}
