@extends('admin.layout')

@section('title', 'Beranda')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Dashboard Admin</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="p-6 bg-white rounded-lg shadow">
            <h2 class="text-xl font-semibold mb-2">Jumlah Member</h2>
            <p class="text-4xl font-bold text-blue-600">125</p>
        </div>

        <div class="p-6 bg-white rounded-lg shadow">
            <h2 class="text-xl font-semibold mb-2">Total Pemesanan</h2>
            <p class="text-4xl font-bold text-green-600">340</p>
        </div>

        <div class="p-6 bg-white rounded-lg shadow">
            <h2 class="text-xl font-semibold mb-2">Pendapatan Bulan Ini</h2>
            <p class="text-4xl font-bold text-amber-600">Rp 12.500.000</p>
        </div>
    </div>

    <div class="mt-10 grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-lg font-semibold mb-4">Aktivitas Terbaru</h3>
            <ul class="text-sm text-gray-700 space-y-2">
                <li>• Member <strong>John Doe</strong> melakukan pemesanan</li>
                <li>• Portofolio <strong>Paket Lebaran</strong> diperbarui</li>
                <li>• Admin mengubah harga <strong>Paket Self Photo</strong></li>
            </ul>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-lg font-semibold mb-4">Notifikasi Sistem</h3>
            <ul class="text-sm text-red-600 space-y-2">
                <li>⚠️ Studio 1 penuh untuk tanggal 27 Juni</li>
                <li>⚠️ 2 member belum melakukan pembayaran</li>
            </ul>
        </div>
    </div>
@endsection
