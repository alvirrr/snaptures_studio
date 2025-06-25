<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portofolio;
use Illuminate\Support\Facades\File;

class MenuPortofolioController extends Controller
{
    public function index(Request $request)
    {
        $query = Portofolio::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('judul', 'like', "%{$search}%")
                ->orWhere('kategori', 'like', "%{$search}%");
        }

        $portofolios = $query->orderBy('id', 'asc')->paginate(10); // ganti urutan di sini
        return view('admin.portofolio', compact('portofolios'));
    }



    public function create()
    {
        return view('admin.tambah-portofolio');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'kategori' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $path = $request->file('gambar')->store('uploads/portofolio', 'public');

        Portofolio::create([
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'gambar' => 'storage/' . $path,
        ]);

        return redirect()->route('admin.portofolio')->with('success', 'Portofolio ditambahkan!');
    }

    public function edit(Portofolio $portofolio)
    {
        return view('admin.edit-portofolio', compact('portofolio'));
    }

    public function update(Request $request, Portofolio $portofolio)
    {
        $request->validate([
            'judul' => 'required',
            'kategori' => 'required',
        ]);

        if ($request->hasFile('gambar')) {
            File::delete(public_path($portofolio->gambar));
            $path = $request->file('gambar')->store('uploads/portofolio', 'public');
            $portofolio->gambar = 'storage/' . $path;
        }

        $portofolio->update([
            'judul' => $request->judul,
            'kategori' => $request->kategori,
        ]);

        return redirect()->route('admin.portofolio')->with('success', 'Portofolio diperbarui!');
    }

    public function destroy(Portofolio $portofolio)
    {
        File::delete(public_path($portofolio->gambar));
        $portofolio->delete();

        return back()->with('success', 'Portofolio dihapus.');
    }
}
