<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Riwayat Poin Member | Snapstures Studio</title>
</head>

<body class="bg-gradient-to-tr from-gray-100 to-gray-300 min-h-screen font-inter">

    <!-- Navbar -->
    <nav class="bg-white shadow-md px-6 py-4 flex justify-between items-center">
        <div class="text-xl font-bold text-gray-800">Snapstures Studio</div>
        <div class="space-x-4 hidden md:flex">
            <a href="/member/dashboard" class="text-gray-700 hover:text-indigo-600 font-medium">Dashboard</a>
            <a href="/member/riwayat" class="text-gray-700 hover:text-indigo-600 font-medium">Riwayat</a>
            <a href="/member/riwayat-poin" class="text-indigo-600 font-semibold">Poin</a>
        </div>
    </nav>

    <!-- Header -->
    <section class="py-10 px-4">
        <div class="max-w-5xl mx-auto">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Riwayat Poin Anda</h2>

            <!-- Informasi Total Poin -->
            <div class="bg-white shadow-md rounded-xl p-6 mb-8 text-center">
                <p class="text-gray-600 text-sm mb-2">Total Poin Anda Saat Ini</p>
                <p class="text-4xl font-bold text-yellow-500">{{ $totalPoin ?? 0 }}</p>
            </div>

            <!-- Tabel Riwayat Poin -->
            <div class="bg-white shadow-md rounded-xl overflow-x-auto">
                <table class="w-full table-auto">
                    <thead class="bg-indigo-600 text-white text-left text-sm">
                        <tr>
                            <th class="px-4 py-3">Tanggal</th>
                            <th class="px-4 py-3">Aktivitas</th>
                            <th class="px-4 py-3">Poin</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm text-gray-700">
                        @forelse ($riwayatPoin as $log)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-4 py-3">{{ \Carbon\Carbon::parse($log->created_at)->format('d M Y') }}
                                </td>
                                <td class="px-4 py-3">{{ $log->keterangan }}</td>
                                <td
                                    class="px-4 py-3 font-bold {{ $log->poin >= 0 ? 'text-green-600' : 'text-red-600' }}">
                                    {{ $log->poin >= 0 ? '+' : '' }}{{ $log->poin }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-4 py-6 text-center text-gray-500">Belum ada riwayat poin.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Tombol Kembali -->
            <div class="mt-6 text-center">
                <a href="{{ route('member.dashboard') }}" class="text-sm text-blue-600 hover:underline">
                    ← Kembali ke Dashboard
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white text-center py-6 text-sm text-gray-500 border-t mt-12">
        &copy; {{ date('Y') }} Snapstures Studio. All rights reserved.
    </footer>

</body>

</html>
