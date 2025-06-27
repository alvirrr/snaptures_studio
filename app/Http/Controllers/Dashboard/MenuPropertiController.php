<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Properti;
use Illuminate\Support\Facades\File;

class MenuPropertiController extends Controller
{
    //
    public function index(Request $request)
    {
        $query = Properti::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('judul', 'like', "%{$search}%")
                ->orWhere('kategori', 'like', "%{$search}%");
        }

        $propertis = $query->orderBy('id', 'asc')->paginate(10); // ganti urutan di sini
        return view('admin.properti', compact('propertis'));
    }



    public function create()
    {
        return view('admin.tambah-properti');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'kategori' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $path = $request->file('gambar')->store('uploads/properti', 'public');

        Properti::create([
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'gambar' => 'storage/' . $path,
        ]);

        return redirect()->route('admin.properti')->with('success', 'properti ditambahkan!');
    }

    public function edit(Properti $properti)
    {
        return view('admin.edit-properti', compact('properti'));
    }

    public function update(Request $request, Properti $properti)
    {
        $request->validate([
            'judul' => 'required',
            'kategori' => 'required',
        ]);

        if ($request->hasFile('gambar')) {
            File::delete(public_path($properti->gambar));
            $path = $request->file('gambar')->store('uploads/properti', 'public');
            $properti->gambar = 'storage/' . $path;
        }

        $properti->update([
            'judul' => $request->judul,
            'kategori' => $request->kategori,
        ]);

        return redirect()->route('admin.properti')->with('success', 'Properti diperbarui!');
    }

    public function destroy(Properti $properti)
    {
        File::delete(public_path($properti->gambar));
        $properti->delete();

        return back()->with('success', 'Properti dihapus.');
    }
}
