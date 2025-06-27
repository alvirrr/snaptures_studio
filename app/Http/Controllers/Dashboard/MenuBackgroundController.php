<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Background;
use Illuminate\Support\Facades\File;

class MenuBackgroundController extends Controller
{
    //
    public function index(Request $request)
    {
        $query = Background::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('judul', 'like', "%{$search}%")
                ->orWhere('kategori', 'like', "%{$search}%");
        }

        $backgrounds = $query->orderBy('id', 'asc')->paginate(10); // ganti urutan di sini
        return view('admin.background', compact('backgrounds'));
    }



    public function create()
    {
        return view('admin.tambah-background');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'kategori' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $path = $request->file('gambar')->store('uploads/background', 'public');

        Background::create([
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'gambar' => 'storage/' . $path,
        ]);

        return redirect()->route('admin.background')->with('success', 'background ditambahkan!');
    }

    public function edit(Background $background)
    {
        return view('admin.edit-background', compact('background'));
    }

    public function update(Request $request, Background $background)
    {
        $request->validate([
            'judul' => 'required',
            'kategori' => 'required',
        ]);

        if ($request->hasFile('gambar')) {
            File::delete(public_path($background->gambar));
            $path = $request->file('gambar')->store('uploads/background', 'public');
            $background->gambar = 'storage/' . $path;
        }

        $background->update([
            'judul' => $request->judul,
            'kategori' => $request->kategori,
        ]);

        return redirect()->route('admin.background')->with('success', 'background diperbarui!');
    }

    public function destroy(Background $background)
    {
        File::delete(public_path($background->gambar));
        $background->delete();

        return back()->with('success', 'background dihapus.');
    }
}
