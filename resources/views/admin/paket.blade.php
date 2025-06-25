@extends('admin.layout')

@section('title', 'Data Paket')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Data Paket</h1>

        <div class="flex gap-2">
            {{-- Form Search --}}
            <form action="{{ route('admin.paket') }}" method="GET" class="flex items-center gap-2">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama/kategori..."
                    class="px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 text-sm">
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition text-sm">Cari</button>
            </form>

            {{-- Tombol Tambah --}}
            <a href="{{ route('admin.paket.create') }}"
                class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition text-sm">+ Tambah
                Paket</a>
        </div>
    </div>

    @if (request('search'))
        <p class="mb-4 text-sm text-gray-600">Hasil pencarian untuk: <strong>{{ request('search') }}</strong></p>
    @endif

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">{{ session('success') }}</div>
    @endif

    <div class="overflow-x-auto rounded-xl border border-gray-200 bg-white shadow-sm">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100 text-gray-600 text-xs uppercase tracking-wider">
                <tr>
                    <th class="px-6 py-4 text-left">Nama</th>
                    <th class="px-6 py-4 text-left">Kategori</th>
                    <th class="px-6 py-4 text-left">Harga</th>
                    <th class="px-6 py-4 text-left">Deskripsi</th>
                    <th class="px-6 py-4 text-left">Gambar</th>
                    <th class="px-6 py-4 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                @forelse ($pakets as $paket)
                    <tr class="hover:bg-blue-50 transition duration-200">
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $paket->nama }}</td>
                        <td class="px-6 py-4">{{ $paket->kategori }}</td>
                        <td class="px-6 py-4">Rp{{ number_format($paket->harga, 0, ',', '.') }}</td>
                        <td class="px-6 py-4">
                            <ul class="list-disc list-inside">
                                @foreach ((array) $paket->deskripsi as $desc)
                                    <li>{{ $desc }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="px-6 py-4">
                            @if ($paket->gambar)
                                <img src="{{ asset($paket->gambar) }}" alt="Gambar Paket"
                                    class="w-16 h-16 object-cover rounded border">
                            @else
                                <span class="text-gray-400 text-xs">Tidak ada gambar</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 space-x-2">
                            <a href="{{ route('admin.paket.edit', $paket->id) }}"
                                class="text-blue-600 hover:underline text-sm">Edit</a>
                            <form action="{{ route('admin.paket.destroy', $paket->id) }}" method="POST"
                                class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin ingin menghapus paket ini?')"
                                    class="text-red-600 hover:underline text-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-400">Tidak ada data paket.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $pakets->withQueryString()->links() }}
    </div>
@endsection
