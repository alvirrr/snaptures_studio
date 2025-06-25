<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paket;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class MenuPaketController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $pakets = Paket::query()
            ->when($search, function ($query, $search) {
                $query->where('nama', 'like', "%{$search}%")
                    ->orWhere('kategori', 'like', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.paket', compact('pakets'));
    }

    public function create()
    {
        return view('admin.tambah-paket'); // buat blade ini nanti
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // olah deskripsi ke array
        $deskripsiArray = array_filter(array_map('trim', explode("\n", $request->input('deskripsi'))));

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/paket'), $filename);
            $gambarPath = 'uploads/paket/' . $filename;
        }

        Paket::create([
            'nama' => $request->input('nama'),
            'kategori' => $request->input('kategori'),
            'harga' => $request->input('harga'),
            'deskripsi' => $deskripsiArray,
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('admin.paket')->with('success', 'Paket berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $paket = Paket::findOrFail($id);
        return view('admin.edit-paket', compact('paket'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $paket = Paket::findOrFail($id);

        $deskripsiArray = array_filter(array_map('trim', explode("\n", $request->input('deskripsi'))));

        // jika ada file baru
        if ($request->hasFile('gambar')) {
            if ($paket->gambar && File::exists(public_path($paket->gambar))) {
                File::delete(public_path($paket->gambar));
            }

            $file = $request->file('gambar');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/paket'), $filename);
            $paket->gambar = 'uploads/paket/' . $filename;
        }

        $paket->nama = $request->input('nama');
        $paket->kategori = $request->input('kategori');
        $paket->harga = $request->input('harga');
        $paket->deskripsi = $deskripsiArray;

        $paket->save();

        return redirect()->route('admin.paket')->with('success', 'Paket berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $paket = Paket::findOrFail($id);

        if ($paket->gambar && File::exists(public_path($paket->gambar))) {
            File::delete(public_path($paket->gambar));
        }

        $paket->delete();

        return back()->with('success', 'Paket berhasil dihapus.');
    }
}
