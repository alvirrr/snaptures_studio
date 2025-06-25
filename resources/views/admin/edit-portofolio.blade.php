@extends('admin.layout')

@section('title', 'Edit Portofolio')

@section('content')
<div class="max-w-2xl mx-auto bg-white shadow-md rounded-xl p-6">
    <h2 class="text-xl font-bold mb-6">Edit Portofolio</h2>

    <form action="{{ route('admin.portofolio.update', $portofolio->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Judul</label>
            <input type="text" name="judul" value="{{ old('judul', $portofolio->judul) }}" class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-blue-200" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Kategori</label>
            <select name="kategori" class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-blue-200" required>
                <option value="selfphoto" {{ $portofolio->kategori === 'selfphoto' ? 'selected' : '' }}>Self Photo</option>
                <option value="photostudio" {{ $portofolio->kategori === 'photostudio' ? 'selected' : '' }}>Photo Studio</option>
                <option value="pasphoto" {{ $portofolio->kategori === 'pasphoto' ? 'selected' : '' }}>Pas Photo</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Gambar Saat Ini</label>
            <img src="{{ asset($portofolio->gambar) }}" alt="Gambar Portofolio" class="w-24 h-24 object-cover rounded mb-2">
            <input type="file" name="gambar" accept="image/*" class="block w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
        </div>

        <div class="flex justify-end gap-4">
            <a href="{{ route('admin.portofolio') }}" class="inline-block px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">Batal</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Simpan</button>
        </div>
    </form>
</div>
@endsection