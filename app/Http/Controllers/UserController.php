<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use App\Models\Properti;

class UserController extends Controller
{
    public function gallery()
    {
        $items = Portofolio::latest()->get();
        return view('components.gallery', compact('portofolios'));
    }
    public function property()
    {
        $items = Properti::latest()->get();
        return view('components.properti', compact('propertis'));
    }
}
