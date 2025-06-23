<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;   // facade untuk reset password
use Illuminate\Validation\ValidationException;

class ForgotPasswordController extends Controller
{
    /**
     * Tampilkan form minta link reset password.
     */
    public function showLinkRequestForm()
    {
        return view('member.forgot-password');   // blade yang sudah kamu buat
    }

    /**
     * Proses kirim link reset password ke e-mail member.
     */
    public function sendResetLinkEmail(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
        ]);

        // Gunakan broker 'members'
        $status = Password::broker('members')->sendResetLink(
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
