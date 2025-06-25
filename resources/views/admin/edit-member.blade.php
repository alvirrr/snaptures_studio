@extends('admin.layout')

@section('title', 'Edit Member')

@section('content')
    <div class="max-w-3xl mx-auto bg-white rounded-xl shadow p-6">

        {{-- Header --}}
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800">Edit Member</h2>
            <a href="{{ route('admin.members') }}"
                class="px-4 py-2 bg-gray-100 text-gray-700 rounded hover:bg-gray-200 text-sm">
                ← Kembali
            </a>
        </div>

        {{-- Notifikasi Sukses --}}
        @if (session('success'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
                class="mb-4 px-4 py-3 bg-green-100 border border-green-300 text-green-800 rounded-lg transition">
                {{ session('success') }}
            </div>
        @endif

        {{-- Form Edit Member --}}
        <form action="{{ route('admin.members.update', $member->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-5">
            @csrf
            @method('PUT')

            {{-- Nama --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" name="name" value="{{ old('name', $member->name) }}"
                    class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-blue-200"
                    required>
            </div>

            {{-- Email --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" value="{{ old('email', $member->email) }}"
                    class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-blue-200"
                    required>
            </div>

            {{-- Alamat --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Alamat</label>
                <input type="text" name="alamat" value="{{ old('alamat', $member->alamat) }}"
                    class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-blue-200">
            </div>

            {{-- WhatsApp --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">WhatsApp</label>
                <input type="text" name="wa" value="{{ old('wa', $member->wa) }}"
                    class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-blue-200">
            </div>

            {{-- Foto Saat Ini --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Foto Saat Ini</label>
                @if ($member->foto)
                    <img src="{{ asset($member->foto) }}" alt="Foto"
                        class="w-20 h-20 mt-2 object-cover rounded-full border border-gray-300">
                @else
                    <p class="text-sm text-gray-500 mt-2">Belum ada foto</p>
                @endif
            </div>

            {{-- Ganti Foto --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Ganti Foto (Opsional)</label>
                <input type="file" name="foto" accept="image/*"
                    class="mt-1 block w-full text-sm text-gray-600 border border-gray-300 rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
            </div>

            {{-- Tombol --}}
            <div class="flex justify-end gap-3 pt-4 border-t border-gray-200 mt-6">
                <a href="{{ route('admin.members') }}"
                    class="px-4 py-2 bg-gray-100 text-gray-700 rounded hover:bg-gray-200 transition">Batal</a>
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Simpan</button>
            </div>
        </form>
    </div>
@endsection
