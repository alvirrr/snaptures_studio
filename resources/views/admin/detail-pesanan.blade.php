@extends('admin.layout')

@section('title', 'Detail Pemesanan')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Detail Pemesanan</h1>

    <div class="bg-white shadow rounded-lg p-6 space-y-6">
        <div>
            <h2 class="font-semibold text-lg mb-2">Informasi Umum</h2>
            <div class="grid grid-cols-2 gap-4 text-sm">
                <div><strong>Kode Transaksi:</strong> {{ $pemesanan->kode_transaksi }}</div>
                <div><strong>Status:</strong>
                    @php
                        $statusColor = match ($pemesanan->status) {
                            'pending' => 'bg-yellow-100 text-yellow-800',
                            'confirmed' => 'bg-green-100 text-green-800',
                            'cancelled' => 'bg-red-100 text-red-800',
                            default => 'bg-gray-100 text-gray-800',
                        };
                    @endphp
                    <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $statusColor }}">
                        {{ ucfirst($pemesanan->status) }}
                    </span>
                </div>
                <div><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($pemesanan->tanggal)->format('d M Y') }}</div>
                <div><strong>Waktu:</strong> {{ $pemesanan->waktu }}</div>
            </div>
        </div>

        <div>
            <h2 class="font-semibold text-lg mb-2">Informasi Pemesan</h2>
            <div class="grid grid-cols-2 gap-4 text-sm">
                @if ($pemesanan->member)
                    <div><strong>Nama:</strong> {{ $pemesanan->member->name }}</div>
                    <div><strong>Email:</strong> {{ $pemesanan->member->email }}</div>
                @else
                    <div><strong>Nama:</strong> {{ $pemesanan->nama }}</div>
                    <div><strong>Email:</strong> {{ $pemesanan->email }}</div>
                @endif
            </div>
        </div>

        <div>
            <h2 class="font-semibold text-lg mb-2">Informasi Paket</h2>
            <div class="grid grid-cols-2 gap-4 text-sm">
                <div><strong>Nama Paket:</strong> {{ $pemesanan->paket->nama ?? '-' }}</div>
                <div><strong>Harga:</strong> Rp {{ number_format($pemesanan->paket->harga ?? 0, 0, ',', '.') }}</div>
            </div>
        </div>

        <div>
            <h2 class="font-semibold text-lg mb-2">Detail Tambahan</h2>
            <div class="grid grid-cols-2 gap-4 text-sm">
                <div><strong>Jumlah Orang:</strong> {{ $pemesanan->jumlah_orang ?? 1 }}</div>
                <div><strong>Tambahan Orang:</strong> {{ $pemesanan->tambahan_orang ?? 0 }}</div>
                <div><strong>Tambahan Spotlight:</strong> {{ $pemesanan->tambahan_spotlight ?? 'Tidak' }}</div>
                <div><strong>Background Pilihan:</strong> {{ $pemesanan->background ?? '-' }}</div>
            </div>
        </div>

        <div class="border-t pt-4 text-right">
            <h3 class="text-lg font-bold text-green-700">Total Bayar: Rp
                {{ number_format($pemesanan->total_bayar, 0, ',', '.') }}</h3>
        </div>
    </div>

    <div class="mt-6">
        <a href="{{ route('admin.pesanan.index') }}" class="text-sm text-blue-600 hover:underline">← Kembali ke daftar</a>
    </div>
@endsection
