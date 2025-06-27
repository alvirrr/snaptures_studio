@extends('admin.layout')

@section('title', 'Data Properti')

@section('content')
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 gap-4">
        <h1 class="text-2xl font-bold">Data Properti</h1>

        <div class="flex items-center gap-3">
            {{-- Search Form --}}
            <form method="GET" action="{{ route('admin.properti') }}" class="flex gap-2">
                <input type="text" name="search" placeholder="Cari nama/kategori..." value="{{ request('search') }}"
                    class="w-52 border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-300" />
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm">Cari</button>
            </form>

            {{-- Tambah Properti --}}
            <a href="{{ route('admin.properti.create') }}"
                class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 text-sm">+ Tambah Paket</a>
        </div>
    </div>

    @if (session('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
            class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto rounded-xl border border-gray-200 bg-white shadow-sm">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100 text-gray-600 text-xs uppercase tracking-wider">
                <tr>
                    <th class="px-6 py-4 text-left">ID</th>
                    <th class="px-6 py-4 text-left">Judul</th>
                    <th class="px-6 py-4 text-left">Kategori</th>
                    <th class="px-6 py-4 text-left">Gambar</th>
                    <th class="px-6 py-4 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                @forelse ($propertis as $properti)
                    <tr class="hover:bg-blue-50">
                        <td class="px-6 py-4 font-medium">{{ $properti->id }}</td>
                        <td class="px-6 py-4">{{ $properti->judul }}</td>
                        <td class="px-6 py-4 capitalize">{{ $properti->kategori }}</td>
                        <td class="px-6 py-4">
                            <img src="{{ asset($properti->gambar) }}" alt="Gambar"
                                class="w-16 h-16 object-cover rounded border">
                        </td>
                        <td class="px-6 py-4 space-x-2">
                            <a href="{{ route('admin.properti.edit', $properti->id) }}"
                                class="text-blue-600 hover:underline text-sm">Edit</a>
                            <form action="{{ route('admin.properti.destroy', $properti->id) }}" method="POST"
                                class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin ingin menghapus?')"
                                    class="text-red-600 hover:underline text-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-400">Belum ada data properti.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($propertis->hasPages())
        <div class="mt-6">
            {{ $propertis->links() }}
        </div>
    @endif
@endsection
