<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Paket;
use App\Models\JadwalBooking;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    // Tampilkan form pemesanan
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
            'pembayaran' => 'required|in:dp,lunas',
        ]);

        // Cek apakah slot tanggal dan waktu sudah dibooking
        $slotSudahTerpakai = JadwalBooking::where('tanggal', $request->tanggal)
            ->where('jam', $request->waktu)
            ->exists();

        if ($slotSudahTerpakai) {
            return back()->with('error', 'Slot tanggal dan jam yang Anda pilih sudah dibooking. Silakan pilih yang lain.');
        }

        // Simpan pesanan
        $pesanan = Pesanan::create([
            'nama'     => $request->nama,
            'no_hp'    => $request->no_hp,
            'paket_id' => $request->paket_id,
            'tanggal'  => $request->tanggal,
            'waktu'    => $request->waktu,
            'pembayaran' => $request->pembayaran,
        ]);

        // Simpan juga ke tabel JadwalBooking (untuk warna merah di jadwal)
        JadwalBooking::create([
            'user_id' => null, // jika tidak ada login member
            'tanggal' => $request->tanggal,
            'jam'     => $request->waktu,
        ]);

        return redirect()->route('pasphoto')->with('success', 'Pesanan berhasil dikirim!');
    }
}
