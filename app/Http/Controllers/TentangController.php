<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portofolio;
use App\Models\Properti;
use App\Models\Background;

class TentangController extends Controller
{
    // 1. Halaman utama Tentang
    public function index()
    {
        $portofolios = Portofolio::latest()->paginate(8);
        $backgrounds = Background::latest()->paginate(12);
        $items = Properti::latest()->paginate(8);

        return view('tentang', compact('portofolios', 'backgrounds', 'items'));
    }

    // 2. AJAX - Load portofolio
    public function loadPortofolio(Request $request)
    {
        $portofolios = Portofolio::latest()->paginate(8);
        if ($request->ajax()) {
            return view('components.partials.gallery-item', compact('portofolios'))->render();
        }
    }

    // 3. AJAX - Load properti
    public function loadProperti(Request $request)
    {
        $items = Properti::latest()->paginate(8);
        if ($request->ajax()) {
            return view('components.partials.properti-item', ['propertis' => $items])->render();
        }
    }

    // 4. AJAX - Load background
    public function loadBackground(Request $request)
    {
        $backgrounds = Background::latest()->paginate(12);
        if ($request->ajax()) {
            return view('components.partials.background-item', ['backgrounds' => $backgrounds])->render();
        }
    }
}
