<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;

class UserController extends Controller
{
    public function gallery()
    {
        $items = Portofolio::latest()->get();
        return view('components.gallery', compact('portofolios'));
    }
}
