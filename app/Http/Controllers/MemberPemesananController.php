<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\Paket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MemberPemesananController extends Controller
{
    public function pilihPaket()
    {
        $pakets = Paket::all();
        return view('member.pilih-paket', compact('pakets'));
    }

    public function formPemesanan($id)
    {
        $paket = Paket::findOrFail($id);
        $member = Auth::guard('member')->user();
        return view('member.form-pemesanan', compact('paket', 'member'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'paket_id'    => 'required|exists:pakets,id',
            'no_hp'       => 'required|string|max:15',
            'tanggal'     => 'required|date|after_or_equal:' . now()->toDateString(),
            'waktu'       => 'required',
            'pembayaran'  => 'required|in:dp,lunas',
        ]);

        $harga = Paket::findOrFail($request->paket_id)->harga;
        $total_bayar = $request->pembayaran === 'dp' ? 50000 : $harga;
        $kode_transaksi = 'SNAPMB-' . strtoupper(Str::random(8));

        $pemesanan = Pemesanan::create([
            'kode_transaksi' => $kode_transaksi,
            'member_id'      => Auth::guard('member')->id(),
            'paket_id'       => $request->paket_id,
            'no_hp'          => $request->no_hp,
            'tanggal'        => $request->tanggal,
            'waktu'          => $request->waktu,
            'pembayaran'     => $request->pembayaran,
            'total_bayar'    => $total_bayar,
            'status'         => 'pending',
        ]);

        if ($request->pembayaran === 'lunas') {
            $member = $pemesanan->member;
            $member->poin += 10;
            $member->save();
        }

        return redirect()->route('member.pesanan.nota', $pemesanan->id)
            ->with('success', 'Pemesanan berhasil dibuat!');
    }

    public function showNota($id)
    {
        $pemesanan = Pemesanan::with(['paket', 'member'])->findOrFail($id);

        if ($pemesanan->member_id !== Auth::guard('member')->id()) {
            abort(403);
        }

        return view('member.nota-member', compact('pemesanan'));
    }
}
