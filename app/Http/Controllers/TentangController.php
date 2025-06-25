<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portofolio;

class TentangController extends Controller
{
    public function index()
    {
        $portofolios = Portofolio::latest()->paginate(8);
        return view('tentang', compact('portofolios'));
    }
}
