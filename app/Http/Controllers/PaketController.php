<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paket;

class PaketController extends Controller
{
    // Semua paket
    public function all()
    {
        $pakets = Paket::all();
        return view('paket', compact('pakets'));
    }

    // Paket kategori Self Photo
    public function selfphoto()
    {
        $pakets = Paket::where('kategori', 'self photo')->get();
        return view('selfphoto', compact('pakets'));
    }

    // Paket kategori Pas Photo
    public function pasphoto()
    {
        $pakets = Paket::where('kategori', 'pas photo')->get();
        return view('pasphoto', compact('pakets'));
    }

    // Paket kategori Photo Studio
    public function photostudio()
    {
        $pakets = Paket::where('kategori', 'photo studio')->get();
        return view('photostudio', compact('pakets'));
    }
}
