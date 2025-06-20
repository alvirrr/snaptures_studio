<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class registmemberController extends Controller
{
    //
    public function usermember(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'name'     => 'required|string|m ax:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'alamat'   => 'required|string',
            'wa'       => 'required|string|max:15',
        ]);

        // Simpan ke database
        Member::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
            'alamat'   => $validated['alamat'],
            'wa'       => $validated['wa'],
        ]);

        // Redirect ke login + notifikasi sukses
        return redirect()->route('member.login')->with('success', 'Pendaftaran berhasil! Silakan login.');
    }
}
