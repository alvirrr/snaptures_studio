<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalBooking;
use Illuminate\Support\Facades\Auth;

class JadwalBookingController extends Controller
{
    /**
     * Tampilkan halaman jadwal booking
     */
    public function index(Request $request)
    {
        $tanggal = $request->query('tanggal', now()->toDateString());

        // Ambil jam yang sudah dibooking dan ubah ke format H:i
        $booked = JadwalBooking::whereDate('tanggal', $tanggal)
            ->pluck('jam')
            ->map(function ($jam) {
                return date('H:i', strtotime($jam));
            })
            ->toArray();

        $slots = [];
        $start = strtotime('08:00');
        $end = strtotime('20:00');

        while ($start < $end) {
            $jam = date('H:i', $start);
            $slots[] = [
                'jam' => $jam,
                'status' => in_array($jam, $booked) ? 'booked' : 'available',
            ];
            $start = strtotime('+30 minutes', $start);
        }

        return view('jadwal', compact('tanggal', 'slots'));
    }

    /**
     * Simpan booking manual dari halaman jadwal
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date|after_or_equal:today',
            'jam' => 'required|date_format:H:i',
        ]);

        $jam = $request->jam;

        $exists = JadwalBooking::where('tanggal', $request->tanggal)
            ->whereTime('jam', $jam) // gunakan whereTime untuk akurat
            ->exists();

        if ($exists) {
            return back()->with('error', 'Slot sudah dibooking.');
        }

        JadwalBooking::create([
            'user_id' => Auth::id(), // nullable jika belum login
            'tanggal' => $request->tanggal,
            'jam' => $jam,
        ]);

        return back()->with('success', 'Berhasil booking slot.');
    }

    /**
     * AJAX: Ambil semua slot berdasarkan tanggal (dipakai di form pemesanan)
     */
    public function cekJam($tanggal)
    {
        $booked = JadwalBooking::whereDate('tanggal', $tanggal)
            ->pluck('jam')
            ->map(function ($jam) {
                return date('H:i', strtotime($jam));
            })
            ->toArray();

        $slots = [];
        $start = strtotime('08:00');
        $end = strtotime('20:00');

        while ($start < $end) {
            $jam = date('H:i', $start);
            $slots[] = [
                'jam' => $jam,
                'status' => in_array($jam, $booked) ? 'booked' : 'available',
            ];
            $start = strtotime('+30 minutes', $start);
        }

        return response()->json($slots);
    }
}
