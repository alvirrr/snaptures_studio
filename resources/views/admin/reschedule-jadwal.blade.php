@extends('admin.layout')

@section('title', 'Konfirmasi Reschedule')

@section('content')
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Konfirmasi Permintaan Reschedule</h1>
        <p class="text-gray-500 mt-1">Berikut adalah daftar permintaan reschedule yang menunggu konfirmasi.</p>
    </div>

    {{-- Form Pencarian --}}
    <form method="GET" action="{{ route('admin.reschedule.index') }}" class="mb-6 max-w-md">
        <div class="flex items-center">
            <input type="text" name="search" value="{{ request('search') }}"
                class="w-full border border-gray-300 rounded-l-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Cari berdasarkan nama member atau kode...">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-r-lg">
                Cari
            </button>
        </div>
    </form>

    {{-- Notifikasi --}}
    @if (session('success'))
        <div class="flash-message bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-md mb-4 shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="flash-message bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-md mb-4 shadow-sm">
            {{ session('error') }}
        </div>
    @endif

    @if ($pemesanans->isEmpty())
        <div class="bg-yellow-100 text-yellow-700 p-4 rounded-md border border-yellow-300">
            Tidak ada permintaan reschedule yang cocok.
        </div>
    @else
        <div class="overflow-x-auto bg-white rounded-xl shadow">
            <table class="min-w-full table-auto text-sm">
                <thead class="bg-gray-100 text-gray-700 text-left">
                    <tr>
                        <th class="px-6 py-3">Kode</th>
                        <th class="px-6 py-3">Nama Member</th>
                        <th class="px-6 py-3">Paket</th>
                        <th class="px-6 py-3">Jadwal Lama</th>
                        <th class="px-6 py-3 text-blue-600">Jadwal Baru</th>
                        <th class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($pemesanans as $p)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 font-medium">{{ $p->kode_transaksi }}</td>
                            <td class="px-6 py-4">{{ $p->member->name }}</td>
                            <td class="px-6 py-4">{{ $p->paket->nama }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ $p->tanggal }} {{ $p->waktu }}</td>
                            <td class="px-6 py-4 font-semibold text-blue-700">{{ $p->reschedule_tanggal }}
                                {{ $p->reschedule_waktu }}</td>
                            <td class="px-6 py-4 text-center space-x-2">
                                <form action="{{ route('admin.reschedule.approve', $p->id) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    <button
                                        class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded-full text-sm shadow">
                                        Setujui
                                    </button>
                                </form>
                                <form action="{{ route('admin.reschedule.reject', $p->id) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    <button
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-full text-sm shadow">
                                        Tolak
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    {{-- Auto-dismiss notifikasi --}}
    <script>
        setTimeout(() => {
            document.querySelectorAll('.flash-message').forEach(el => {
                el.style.transition = 'opacity 0.5s ease';
                el.style.opacity = '0';
                setTimeout(() => el.remove(), 500);
            });
        }, 5000);
    </script>
@endsection
