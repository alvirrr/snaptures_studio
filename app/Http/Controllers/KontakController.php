<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class KontakController extends Controller
{
    public function kirim(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email',
          //  'wa' => 'required | wa',
            'subjek' => 'nullable|string|max:150',
            'pesan' => 'required|string',
        ]);

        $data = [
            'nama'   => $request->nama,
            'email'  => $request->email,
           // 'wa' => $request->wa,
            'subjek' => $request->subjek ?? 'Tidak Ada Subjek',
            'pesan'  => $request->pesan,
        ];

        Mail::send('emails.kontak', $data, function ($message) use ($data) {
            $message->to('mantappum@gmail.com')
                ->subject('Pesan Baru dari Kontak Website: ' . $data['subjek']);
        });

        return back()->with('success', 'Pesan berhasil dikirim!');
    }
}
