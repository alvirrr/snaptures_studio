<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\Member;   // untuk member
use App\Models\Pesanan;   // untuk non-member

class AdminPemesananController extends Controller
{
    // Menampilkan daftar semua pemesanan (member dan non-member)
    public function index(Request $request)
    {
        $tanggal = $request->tanggal;
        $status = $request->status;

        $pemesanansMember = Pemesanan::with(['member', 'paket'])
            ->when($tanggal, fn($q) => $q->whereDate('tanggal', $tanggal))
            ->when($status, fn($q) => $q->where('status', $status))
            ->latest()
            ->paginate(10, ['*'], 'members_page'); // <--- paginate khusus members

        $pemesanansNonMember = Pesanan::with('paket')
            ->when($tanggal, fn($q) => $q->whereDate('tanggal', $tanggal))
            ->when($status, fn($q) => $q->where('status', $status))
            ->latest()
            ->paginate(10, ['*'], 'nonmembers_page'); // <--- paginate khusus non-member

        return view('admin.pesanan', compact('pemesanansMember', 'pemesanansNonMember'));
    }

    // Menampilkan detail pemesanan member
    public function show($id)
    {
        $pemesanan = Pemesanan::with(['member', 'paket'])->findOrFail($id);

        return view('admin.detail-pesanan', compact('pemesanan'));
    }
    public function showNonMember($id)
    {
        $pesanan = Pesanan::with('paket')->findOrFail($id);
        return view('admin.detail-pesanan-nonmember', compact('pesanan'));
    }
}
