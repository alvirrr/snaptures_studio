@extends('admin.layout')

@section('title', 'Data Pemesanan')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Daftar Pemesanan</h1>

    {{-- Pemesanan Member --}}
    <div class="mb-12">
        <h2 class="text-lg font-semibold mb-3">Pemesanan Member</h2>
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
                        <th class="py-3 px-4 text-left">Status</th>
                        <th class="py-3 px-4 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($pemesanansMember as $pemesanan)
                        <tr>
                            <td class="py-3 px-4 font-medium">{{ $pemesanan->kode_transaksi }}</td>
                            <td class="py-3 px-4">{{ $pemesanan->member->name ?? '-' }}</td>
                            <td class="py-3 px-4">{{ $pemesanan->paket->nama ?? '-' }}</td>
                            <td class="py-3 px-4">{{ \Carbon\Carbon::parse($pemesanan->tanggal)->format('d M Y') }}</td>
                            <td class="py-3 px-4">{{ $pemesanan->waktu }}</td>
                            <td class="py-3 px-4 text-green-600 font-semibold">Rp
                                {{ number_format($pemesanan->total_bayar, 0, ',', '.') }}</td>
                            <td class="py-3 px-4">
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
                            </td>
                            <td class="py-3 px-4">
                                <a href="{{ route('admin.pesanan.show', $pemesanan->id) }}"
                                    class="text-blue-600 hover:underline text-sm">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $pemesanansMember->onEachSide(1)->links('pagination::tailwind') }}
        </div>
    </div>

    {{-- Pemesanan Non-Member --}}
    <div>
        <h2 class="text-lg font-semibold mb-3">Pemesanan Non-Member</h2>
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
                        <th class="py-3 px-4 text-left">Status</th>
                        <th class="py-3 px-4 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($pemesanansNonMember as $nonMember)
                        <tr>
                            <td class="py-3 px-4 font-medium">{{ $nonMember->id_pesanan }}</td>
                            <td class="py-3 px-4">{{ $nonMember->nama }}</td>
                            <td class="py-3 px-4">{{ $nonMember->paket->nama ?? '-' }}</td>
                            <td class="py-3 px-4">{{ \Carbon\Carbon::parse($nonMember->tanggal)->format('d M Y') }}</td>
                            <td class="py-3 px-4">{{ $nonMember->waktu }}</td>
                            <td class="py-3 px-4 text-green-600 font-semibold">Rp
                                {{ number_format($nonMember->total_bayar, 0, ',', '.') }}</td>
                            <td class="py-3 px-4">
                                @php
                                    $statusColor = match ($nonMember->status) {
                                        'pending' => 'bg-yellow-100 text-yellow-800',
                                        'confirmed' => 'bg-green-100 text-green-800',
                                        'cancelled' => 'bg-red-100 text-red-800',
                                        default => 'bg-gray-100 text-gray-800',
                                    };
                                @endphp
                                <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $statusColor }}">
                                    {{ ucfirst($nonMember->status) }}
                                </span>
                            </td>
                            <td class="py-3 px-4">
                                <a href="{{ route('admin.pesanan.nonmember.show', $nonMember->id) }}"
                                    class="text-blue-600 hover:underline text-sm">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
        <div class="mt-4">
            {{ $pemesanansNonMember->onEachSide(1)->links('pagination::tailwind') }}
        </div>
    </div>
@endsection
