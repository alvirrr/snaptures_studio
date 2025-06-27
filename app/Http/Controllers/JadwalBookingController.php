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

        $booked = JadwalBooking::whereDate('tanggal', $tanggal)
            ->pluck('jam')
            ->toArray();

        $slots = [];
        for ($i = 8; $i <= 19; $i++) {
            $jam = sprintf('%02d:00', $i);
            $slots[] = [
                'jam' => $jam,
                'status' => in_array($jam, $booked) ? 'booked' : 'available',
            ];
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
            'jam' => 'required',
        ]);

        $exists = JadwalBooking::where('tanggal', $request->tanggal)
            ->where('jam', $request->jam)
            ->exists();

        if ($exists) {
            return back()->with('error', 'Slot sudah dibooking.');
        }

        JadwalBooking::create([
            'user_id' => Auth::id(),
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
        ]);

        return back()->with('success', 'Berhasil booking slot.');
    }

    /**
     * AJAX: Ambil semua slot berdasarkan tanggal
     */
    public function cekJam($tanggal)
    {
        $booked = JadwalBooking::whereDate('tanggal', $tanggal)->pluck('jam')->toArray();

        $slots = [];
        for ($i = 8; $i <= 19; $i++) {
            $jam = sprintf('%02d:00', $i);
            $slots[] = [
                'jam' => $jam,
                'status' => in_array($jam, $booked) ? 'booked' : 'available',
            ];
        }

        return response()->json($slots);
    }
}
