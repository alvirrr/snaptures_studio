<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class formPesananController extends Controller
{
    public function submit(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string',
            'no_hp' => 'required|string',
            'paket' => 'required|string',
            'tanggal' => 'required|date',
            'waktu' => 'required|string',
        ]);

        session(['pesanan' => $data]);

        return redirect()->route('nota');
    }

    public function nota()
    {
        $data = session('pesanan');

        if (!$data) {
            return redirect('/');
        }

        return view('nota', compact('data'));
    }
}
