<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Properti;

class PropertiController extends Controller
{
    // Menampilkan gallery properti
    public function gallery()
    {
        // Ambil data properti terbaru dan paginasi jika perlu
        $items = Properti::latest()->paginate(12);

        // Kirim ke view (misalnya views/pages/properti-gallery.blade.php)
        return view('components.properti', compact('items'));
    }
}
