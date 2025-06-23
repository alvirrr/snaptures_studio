<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistMemberController extends Controller
{
    /**
     * Handle registration form submission.
     */
    public function usermember(Request $request)
    {
        // Validasi data input
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:members,email',
            'password' => 'required|string|min:8|confirmed',
            'alamat'   => 'required|string|max:255',
            'wa'       => 'required|digits_between:10,15',
        ]);

        // Simpan data member baru
        Member::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
            'alamat'   => $validated['alamat'],
            'wa'       => $validated['wa'],
        ]);

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->route('member.login')->with('success', 'Pendaftaran berhasil! Silakan login.');
    }
}
