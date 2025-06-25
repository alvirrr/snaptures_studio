{{-- resources/views/admin/paket-edit.blade.php --}}
@extends('admin.layout')

@section('title', 'Edit Paket')

@section('content')
    <div class="max-w-2xl mx-auto bg-white shadow-md rounded-xl p-6">
        <h2 class="text-xl font-bold mb-6">Edit Paket</h2>

        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.paket.update', $paket->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" name="nama" value="{{ old('nama', $paket->nama) }}"
                    class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-blue-200"
                    required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Kategori</label>
                <input type="text" name="kategori" value="{{ old('kategori', $paket->kategori) }}"
                    class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-blue-200"
                    required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Harga</label>
                <input type="number" name="harga" value="{{ old('harga', $paket->harga) }}"
                    class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-blue-200"
                    required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Deskripsi (pisahkan dengan baris baru)</label>
                <textarea name="deskripsi" rows="5"
                    class="block w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-blue-200 text-sm">{{ old('deskripsi', is_array($paket->deskripsi) ? implode("\n", $paket->deskripsi) : $paket->deskripsi) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Gambar Saat Ini</label>
                @if ($paket->gambar)
                    <img src="{{ asset ($paket->gambar) }}" alt="Gambar"
                        class="w-20 h-20 mt-2 object-cover rounded border">
                @else
                    <p class="text-sm text-gray-500 mt-2">Belum ada gambar</p>
                @endif
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700">Ganti Gambar (Opsional)</label>
                <input type="file" name="gambar"
                    class="mt-1 block w-full text-sm text-gray-600 border border-gray-300 rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                    accept="image/*">
            </div>

            <div class="flex justify-end gap-4">
                <a href="{{ route('admin.paket') }}"
                    class="inline-block px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">Batal</a>
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Simpan</button>
            </div>
        </form>
    </div>
@endsection
