<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PointLog;

class MemberAuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('member')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/member/dashboard'); // ganti sesuai tujuan
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('member')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('member.login');
    }

    public function poin()
    {
        $member = Auth::guard('member')->user();

        // Ambil log poin jika kamu menyimpan riwayatnya (opsional)
        $logs = PointLog::where('member_id', $member->id)->latest()->get();

        return view('member.riwayat-point', compact('member', 'logs'));
    }
}
