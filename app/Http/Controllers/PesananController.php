<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Paket;
use App\Models\JadwalBooking;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

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
        // Validasi input
        $request->validate([
            'nama'          => 'required|string|max:100',
            'no_hp'         => 'required|string|max:20',
            'paket_id'      => 'required|exists:pakets,id',
            'tanggal'       => 'required|date|after_or_equal:today',
            'waktu'         => 'required',
            'background'    => 'required|string|in:putih,hitam,abu-abu,cream,pink',
            'jumlah_orang'  => 'required|integer|min:1|max:7',
            'pembayaran'    => 'required|in:dp,lunas',
        ]);

        // Cek ketersediaan slot booking
        $slotTerpakai = JadwalBooking::where('tanggal', $request->tanggal)
            ->where('jam', $request->waktu)
            ->exists();

        if ($slotTerpakai) {
            return back()->with('error', 'Slot tanggal dan jam yang Anda pilih sudah dibooking. Silakan pilih waktu lain.');
        }

        // Ambil data paket
        $paket = Paket::findOrFail($request->paket_id);
        $hargaDasar = $paket->harga;

        // Hitung biaya tambahan orang (lebih dari 2)
        $jumlahOrang     = $request->jumlah_orang;
        $tambahanOrang   = max(0, $jumlahOrang - 2);
        $biayaOrangExtra = $tambahanOrang * 15000;

        // Hitung biaya spotlight
        $pakaiSpotlight  = $request->has('tambahan_spotlight');
        $biayaSpotlight  = $pakaiSpotlight ? 15000 : 0;

        // Hitung total harga
        $totalHarga = $hargaDasar + $biayaOrangExtra + $biayaSpotlight;
        $idPesanan = 'SNAPS' . now()->format('YmdHis');

        // Simpan ke database
        $pesanan = Pesanan::create([
            'id_pesanan'         => $idPesanan,
            'nama'               => $request->nama,
            'no_hp'              => $request->no_hp,
            'paket_id'           => $paket->id,
            'tanggal'            => $request->tanggal,
            'waktu'              => $request->waktu,
            'background'         => $request->background,
            'jumlah_orang'       => $jumlahOrang,
            'tambahan_orang'     => $tambahanOrang,
            'tambahan_spotlight' => $pakaiSpotlight,
            'total_harga'        => $totalHarga,
            'pembayaran'         => $request->pembayaran,
        ]);

        // Simpan ke tabel booking jadwal
        JadwalBooking::create([
            'user_id' => null,
            'tanggal' => $request->tanggal,
            'jam'     => $request->waktu,
        ]);

        // Simpan ke session untuk nota
        session()->put('nota_data', [
            'id_pesanan'          => $idPesanan,
            'nama'                => $request->nama,
            'no_hp'               => $request->no_hp,
            'paket'               => $paket->nama,
            'harga_paket'         => $hargaDasar, // ✅ Ditambahkan
            'tanggal'             => $request->tanggal,
            'waktu'               => $request->waktu,
            'background'          => $request->background,
            'jumlah_orang'        => $jumlahOrang,
            'tambahan_orang'      => $tambahanOrang,
            'tambahan_spotlight'  => $pakaiSpotlight,
            'pembayaran'          => $request->pembayaran,
            'total_bayar'         => $totalHarga,
        ]);

        // Redirect ke halaman nota
        return redirect()->route('nota')->with('success', 'Pesanan berhasil dikirim!');
    }


    public function unduhNota()
    {
        $data = session('nota_data');

        $pdf = Pdf::loadView('nota-pdf', ['data' => $data]);
        return $pdf->download('nota-pesanan-' . $data['id_pesanan'] . '.pdf');
    }
}
