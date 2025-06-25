<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;   // facade untuk reset password
use Illuminate\Validation\ValidationException;

class LupaPasswordAdminController extends Controller
{
    //
    public function showLinkRequestForm()
    {
        return view('admin.lupa-sandi-admin');   // blade yang sudah kamu buat
    }

    /**
     * Proses kirim link reset password ke e-mail admin.
     */
    public function sendResetLinkEmail(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
        ]);

        // Gunakan broker 'admins'
        $status = Password::broker('admins')->sendResetLink(
            $request->only('email')
        );

        // Beri respon sesuai status
        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', __($status))      // berhasil
            : throw ValidationException::withMessages([ // gagal
                'email' => [__($status)],
            ]);
    }
}
