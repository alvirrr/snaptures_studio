<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class RegistAdminController extends Controller
{
    //
    public function useradmin(Request $request)
    {
        // Validasi data input
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:admins,email',
            'password' => 'required|string|min:8|confirmed',
            'alamat'   => 'required|string|max:255',
            'wa'       => 'required|digits_between:10,15',
        ]);

        // Simpan data admin baru
        Admin::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
            'alamat'   => $validated['alamat'],
            'wa'       => $validated['wa'],
        ]);

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->route('admin.login')->with('success', 'Pendaftaran berhasil! Silakan login.');
    }
}
