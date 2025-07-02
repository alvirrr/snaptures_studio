<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Riwayat Pemesanan - Snapstures Studio</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gradient-to-tr from-gray-100 to-gray-300 min-h-screen font-inter">

    <!-- Navbar -->
    <header class="sticky top-0 z-50 bg-neutral-400 shadow-md shadow-neutral-500">
        <x-navbar />
        <x-mobile-menu />
    </header>

    <main class="py-12 px-4">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Riwayat Pemesanan Anda</h2>

            @if ($pemesanans->isEmpty())
                <div class="bg-white rounded-xl p-6 shadow text-center">
                    <p class="text-gray-600">Belum ada riwayat pemesanan yang tercatat.</p>
                </div>
            @else
                <div class="overflow-x-auto bg-white rounded-xl shadow-lg ring-1 ring-gray-200">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Tanggal
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Jam</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Paket</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Jumlah
                                    Orang</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Total</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Status
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @foreach ($pemesanans as $pemesanan)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4 text-sm text-gray-700 whitespace-nowrap">
                                        {{ \Carbon\Carbon::parse($pemesanan->tanggal)->format('d M Y') }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap">
                                        {{ \Carbon\Carbon::parse($pemesanan->waktu)->format('H:i') }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-800">
                                        {{ $pemesanan->paket->nama ?? '-' }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-600">
                                        {{ $pemesanan->jumlah_orang }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-green-700 font-semibold">
                                        Rp {{ number_format($pemesanan->total_harga, 0, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        <span
                                            class="px-3 py-1 rounded-full text-white text-xs 
                                            {{ strtolower($pemesanan->status) == 'selesai'
                                                ? 'bg-green-500'
                                                : (strtolower($pemesanan->status) == 'pending'
                                                    ? 'bg-yellow-500'
                                                    : 'bg-gray-400') }}">
                                            {{ ucfirst($pemesanan->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        @if (strtolower($pemesanan->status) === 'pending')
                                            <a href="{{ route('member.reschedule.form', $pemesanan->id) }}"
                                                class="inline-block px-3 py-1 text-xs text-white bg-indigo-500 hover:bg-indigo-600 rounded-full transition">
                                                Minta Reschedule
                                            </a>
                                        @else
                                            <span class="text-gray-400 text-xs italic">-</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

            <!-- Tombol Kembali -->
            <div class="mt-8 text-center">
                <a href="{{ route('member.dashboard') }}"
                    class="inline-block text-sm text-blue-600 hover:underline hover:text-blue-800 transition">
                    ← Kembali ke Dashboard
                </a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <x-footer />
</body>

</html>
