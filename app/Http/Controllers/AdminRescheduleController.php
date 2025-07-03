<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use Illuminate\Support\Facades\DB;
use App\Notifications\RescheduleStatusNotification;


class AdminRescheduleController extends Controller
{
    // Menampilkan daftar permintaan reschedule
    public function index(Request $request)
    {
        $query = Pemesanan::with(['member', 'paket'])
            ->whereNotNull('reschedule_tanggal')
            ->whereNotNull('reschedule_waktu')
            ->where(function ($q) {
                $q->whereColumn('tanggal', '!=', 'reschedule_tanggal')
                    ->orWhereColumn('waktu', '!=', 'reschedule_waktu');
            });

        // Filter pencarian jika ada
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->whereHas('member', fn($m) => $m->where('name', 'like', "%$search%"))
                    ->orWhere('kode_transaksi', 'like', "%$search%");
            });
        }

        $pemesanans = $query->latest()->paginate(10); // Dengan pagination

        return view('admin.reschedule-jadwal', compact('pemesanans'));
    }


    // Menyetujui permintaan reschedule
    public function approve($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);

        $pemesanan->tanggal = $pemesanan->reschedule_tanggal;
        $pemesanan->waktu = $pemesanan->reschedule_waktu;
        $pemesanan->reschedule_status = 'Approved';
        $pemesanan->reschedule_message = 'Permintaan reschedule Anda telah disetujui.';
        $pemesanan->reschedule_tanggal = null;
        $pemesanan->reschedule_waktu = null;
        $pemesanan->save();

        // Kirim Email
        $member = $pemesanan->member;
        $member->notify(new RescheduleStatusNotification('Disetujui', $pemesanan->tanggal, $pemesanan->waktu));

        return back()->with('success', 'Permintaan reschedule disetujui.');
    }


    // Menolak permintaan reschedule
    public function reject($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);

        $pemesanan->reschedule_status = 'Rejected';
        $pemesanan->reschedule_message = 'Permintaan reschedule Anda ditolak oleh admin.';
        $pemesanan->reschedule_tanggal = null;
        $pemesanan->reschedule_waktu = null;
        $pemesanan->save();

        // Kirim Email
        $member = $pemesanan->member;
        $member->notify(new RescheduleStatusNotification('Ditolak', null, null));

        return back()->with('success', 'Permintaan reschedule ditolak.');
    }
}
