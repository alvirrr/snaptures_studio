<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Dashboard Admin') | Snapstures Studio</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="flex bg-neutral-100 min-h-screen text-gray-800">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md fixed h-full z-40">
        <div class="p-6 text-2xl font-bold text-center text-blue-600 border-b border-gray-200">
            Admin Panel
        </div>
        <nav class="mt-6 space-y-2 text-sm">
            <a href="{{ route('admin.dashboard') }}" class="block px-6 py-2 hover:bg-blue-100">
                <i class="fas fa-home mr-2"></i> Beranda
            </a>
            <a href="{{ route('admin.members') }}" class="block px-6 py-2 hover:bg-blue-100">
                <i class="fas fa-users mr-2"></i> Member
            </a>
            <a href="{{ route('admin.paket') }}" class="block px-6 py-2 hover:bg-blue-100">
                <i class="fas fa-box mr-2"></i> Paket
            </a>
            <a href="{{ route('admin.portofolio') }}" class="block px-6 py-2 hover:bg-blue-100">
                <i class="fas fa-image mr-2"></i> Portofolio
            </a>
            <a href="{{ route('admin.properti') }}" class="block px-6 py-2 hover:bg-blue-100">
                <i class="fas fa-hat-cowboy mr-2"></i> Properti
            </a>
            <a href="{{ route('admin.background') }}" class="block px-6 py-2 hover:bg-blue-100">
                <i class="fas fa-layer-group mr-2"></i> Background
            </a>

            <!-- Transaksi Dropdown -->
            <div x-data="{ open: false }" class="px-4">
                <button @click="open = !open"
                    class="flex items-center w-full text-left py-2 hover:bg-blue-100 px-2 rounded transition">
                    <i class="fas fa-money-check-alt mr-2"></i>
                    <span class="flex-1">Transaksi</span>
                    <i class="fas fa-chevron-down text-xs" :class="{ 'rotate-180': open }"></i>
                </button>
                <div x-show="open" class="mt-1 pl-6 space-y-1" x-cloak>
                    <a href="{{ route('admin.pesanan.index') }}" class="block py-1 hover:text-blue-600">Data Pesanan</a>
                    <a href="{{ route('admin.konfirmasi.index') }}" class="block py-1 hover:text-blue-600">Konfirmasi
                        Pembayaran</a>
                    <a href="{{ route('admin.reschedule.index') }}" class="block py-1 hover:text-blue-600">Reschedule
                        Jadwal</a>
                </div>
            </div>

            <a href="#" class="block px-6 py-2 hover:bg-blue-100">
                <i class="fas fa-chart-line mr-2"></i> Laporan
            </a>
            <a href="#" class="block px-6 py-2 hover:bg-blue-100">
                <i class="fas fa-camera mr-2"></i> Studio
            </a>
            <a href="#" class="block px-6 py-2 hover:bg-blue-100">
                <i class="fas fa-cog mr-2"></i> Pengaturan
            </a>
            <form method="POST" action="{{ route('admin.logout') }}" class="px-6 mt-4">
                @csrf
                <button type="submit" class="w-full text-left py-2 hover:bg-red-100 text-red-600">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </button>
            </form>
        </nav>
    </aside>

    <!-- Konten Utama -->
    <main class="flex-1 ml-64 p-6">
        @yield('content')
    </main>

</body>

</html>
