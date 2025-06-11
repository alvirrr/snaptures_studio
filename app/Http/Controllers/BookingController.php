<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// app/Http/Controllers/BookingController.php
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        return view('booking');
    }

    public function getBookedSlots(Request $request)
    {
        $bookings = Booking::where('booking_date', $request->date)->pluck('time_slot');
        return response()->json($bookings);
    }

    public function store(Request $request)
    {
        $request->validate([
            'booking_date' => 'required|date',
            'time_slot' => 'required|string',
        ]);

        $existing = Booking::where('booking_date', $request->booking_date)
            ->where('time_slot', $request->time_slot)
            ->first();

        if ($existing) {
            return back()->with('error', 'Slot sudah dipesan. Silakan pilih waktu lain.');
        }

        Booking::create([
            'user_id' => Auth::id(),
            'booking_date' => $request->booking_date,
            'time_slot' => $request->time_slot,
        ]);

        return back()->with('success', 'Pemesanan berhasil.');
    }
}
