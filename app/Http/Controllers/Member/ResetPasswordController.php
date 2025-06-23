<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class ResetPasswordController extends Controller
{
    /**
     * Tampilkan form reset (dari link di e-mail).
     */
    public function showResetForm(Request $request, $token)
    {
        return view('member.reset-password', [
            'token' => $token,
            'email' => $request->email, // otomatis ter-isi dari query string
        ]);
    }

    /**
     * Simpan password baru.
     */
    public function reset(Request $request)
    {
        // Validasi input
        $request->validate([
            'token'    => 'required',
            'email'    => 'required|email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Jalankan reset menggunakan broker 'members'
        $status = Password::broker('members')->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($member) use ($request) {
                $member->forceFill([
                    'password'       => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();
            }
        );

        // Respon
        if ($status === Password::PASSWORD_RESET) {
            return redirect()
                ->route('member.login')
                ->with('status', __($status));  // “Password reset successfully.”
        }

        throw ValidationException::withMessages([
            'email' => [__($status)],
        ]);
    }
}
