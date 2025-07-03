@extends('admin.layout')

@section('title', 'Konfirmasi Pembayaran')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Konfirmasi Pembayaran</h1>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if ($pendingPembayaran->isEmpty())
        <p class="text-gray-500">Tidak ada pembayaran yang perlu dikonfirmasi.</p>
    @else
        <div class="overflow-x-auto bg-white rounded-xl shadow">
            <table class="min-w-full text-sm text-gray-700">
                <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="py-3 px-4 text-left">Kode</th>
                        <th class="py-3 px-4 text-left">Nama</th>
                        <th class="py-3 px-4 text-left">Paket</th>
                        <th class="py-3 px-4 text-left">Tanggal</th>
                        <th class="py-3 px-4 text-left">Jam</th>
                        <th class="py-3 px-4 text-left">Total</th>
                        <th class="py-3 px-4 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($pendingPembayaran as $pemesanan)
                        <tr>
                            <td class="py-3 px-4 font-medium">{{ $pemesanan->kode_transaksi ?? $pemesanan->id_pesanan }}
                            </td>
                            <td class="py-3 px-4">{{ $pemesanan->member->name ?? $pemesanan->name }}</td>
                            <td class="py-3 px-4">{{ $pemesanan->paket->nama ?? '-' }}</td>
                            <td class="py-3 px-4">{{ \Carbon\Carbon::parse($pemesanan->tanggal)->format('d M Y') }}</td>
                            <td class="py-3 px-4">{{ $pemesanan->waktu }}</td>
                            <td class="py-3 px-4 text-green-600 font-semibold">Rp
                                {{ number_format($pemesanan->total_bayar, 0, ',', '.') }}</td>
                            <td class="py-3 px-4">
                                <form action="{{ route('admin.konfirmasi.konfirmasi', $pemesanan->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin konfirmasi pembayaran ini?')">
                                    @csrf
                                    <button type="submit"
                                        class="bg-green-500 hover:bg-green-600 text-white px-4 py-1 rounded text-xs font-medium">
                                        Konfirmasi
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
