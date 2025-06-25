<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portofolio;

class PortofolioController extends Controller
{
    //
    public function gallery()
    {
        $items = Portofolio::latest()->get();
        return view('components.gallery', compact('portofolios'));
    }
}
