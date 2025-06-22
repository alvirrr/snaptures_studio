<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Paket;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    // Tampilkan form pemesanan berdasarkan slug
    public function create($slug)
    {
        $paket = Paket::where('slug', $slug)->firstOrFail();
        return view('formpesanan', compact('paket'));
    }

    // Simpan pesanan ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama'     => 'required|string|max:100',
            'no_hp'    => 'required|string|max:20',
            'paket_id' => 'required|exists:pakets,id',
            'tanggal'  => 'required|date|after_or_equal:today',
            'waktu'    => 'required',
        ]);

        Pesanan::create([
            'nama'     => $request->nama,
            'no_hp'    => $request->no_hp,
            'paket_id' => $request->paket_id,
            'tanggal'  => $request->tanggal,
            'waktu'    => $request->waktu,
        ]);

        return redirect()->route('pasphoto')->with('success', 'Pesanan berhasil dikirim!');
    }
}
