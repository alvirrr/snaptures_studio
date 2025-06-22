<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paket;

class PaketController extends Controller
{
    public function index()
    {
        $pakets = Paket::all();
        return view('pasphoto', compact('pakets'));
    }
}
