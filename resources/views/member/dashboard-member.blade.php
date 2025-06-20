<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- @vite('resources/css/app.css') --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    {{-- <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Snapstures Studio</title>
</head>

<body>
    <header class="sticky top-0 left-0 right-0 z-50 bg-neutral-400 shadow-md shadow-neutral-500">
        <x-navbar></x-navbar>
        <!-- Mobile menu -->
        <x-mobile-menu></x-mobile-menu>
    </header>


    {{-- <section class="py-12 bg-gray-100">
        <div class="max-w-4xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-10">Member Area</h2>

            <div class="bg-white rounded-2xl shadow-lg p-8 flex flex-col sm:flex-row items-center justify-between">
                <div class="flex items-center space-x-6">
                    <img class="w-20 h-20 rounded-full border-4 border-blue-500 shadow" src="https://i.pravatar.cc/100"
                        alt="User Avatar">
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800">Nabila Salsabila</h3>
                        <p class="text-gray-500">Membership: <span class="font-semibold text-blue-600">Gold</span></p>
                        <p class="text-sm text-gray-400">Bergabung sejak: Jan 2024</p>
                    </div>
                </div>

                <div class="mt-6 sm:mt-0 flex space-x-4">
                    <a href="#upgrade"
                        class="px-5 py-2.5 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition">Upgrade</a>
                    <a href="#riwayat"
                        class="px-5 py-2.5 bg-gray-200 text-gray-700 rounded-xl hover:bg-gray-300 transition">Riwayat</a>
                </div>
            </div>
        </div>
    </section> --}}
    {{-- 
    <section class="py-12 bg-gray-100">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Menu Pelanggan</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Riwayat Pemesanan -->
                <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-lg transition group">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-semibold text-gray-800 group-hover:text-blue-600">Riwayat Pemesanan</h3>
                        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path d="M8 17l4 4 4-4m0-5l-4-4-4 4"></path>
                        </svg>
                    </div>
                    <p class="text-gray-500 text-sm">Lihat detail transaksi, status pesanan, dan tanggal booking.</p>
                    <a href="#" class="mt-4 inline-block text-sm text-blue-600 hover:underline">Lihat Riwayat
                        →</a>
                </div>

                <!-- Point Member -->
                <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-lg transition group">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-semibold text-gray-800 group-hover:text-yellow-600">Poin Member</h3>
                        <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path d="M12 8v4l3 3m6-1a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <p class="text-gray-500 text-sm">Cek total poin yang Anda miliki dan cara mendapatkannya.</p>
                    <a href="#" class="mt-4 inline-block text-sm text-yellow-600 hover:underline">Lihat Poin →</a>
                </div>

                <!-- Voucher / Bonus -->
                <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-lg transition group">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-semibold text-gray-800 group-hover:text-green-600">Voucher & Bonus</h3>
                        <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path d="M9 14l6-6m2 10V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2z">
                            </path>
                        </svg>
                    </div>
                    <p class="text-gray-500 text-sm">Tukarkan poin Anda untuk voucher menarik dan bonus spesial.</p>
                    <a href="#" class="mt-4 inline-block text-sm text-green-600 hover:underline">Tukar Sekarang
                        →</a>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-white py-8">
        <div class="max-w-4xl mx-auto flex items-center space-x-6 px-4">
            <img src="https://i.pravatar.cc/100?img=3" alt="Profile"
                class="w-20 h-20 rounded-full shadow-lg border-2 border-blue-500">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Nabila Salsabila</h2>
                <p class="text-sm text-gray-600">ID Member: <span class="font-medium">MBR102938</span></p>
                <p class="text-sm text-gray-600">Email: nabila@example.com</p>
            </div>
            <div class="ml-auto">
                <a href="#" class="text-blue-600 hover:underline text-sm">Edit Profil</a>
            </div>
        </div>
    </section> --}}

    <section class="bg-linear-to-t from-neutral-300 to-neutral-500 min-h-screen py-10 px-4">
        <!-- Header Member Info -->
        <div
            class="max-w-5xl mx-auto bg-white rounded-2xl shadow-lg p-6 flex flex-col md:flex-row items-center md:items-start gap-6">
            <img src="/img/pas.jpg" alt="Profile" class="w-28 h-28 rounded-full border-4 border-blue-500 shadow-md">
            <div class="flex-1 text-center md:text-left">
                <h2 class="text-2xl font-bold text-gray-800">Muhammad Firman</h2>
                <p class="text-sm text-gray-600">ID Member: <span class="font-medium">MBR102938</span></p>
                <p class="text-sm text-gray-600">Email: firman@gmail.com</p>
                <div class="mt-2 flex justify-center md:justify-start gap-3 text-blue-600">
                    <a href="#" class="hover:underline text-sm">Edit Profil</a>
                    <span>|</span>
                    <a href="#" class="hover:underline text-sm">Logout</a>
                </div>
            </div>
            <div class="text-sm bg-blue-100 text-blue-700 px-4 py-2 rounded-full font-semibold">
                Member Level: <span class="text-blue-800">Gold</span>
            </div>
        </div>

        <!-- Menu Pelanggan -->
        <div class="max-w-5xl mx-auto mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Riwayat Pemesanan -->
            <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition-all">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-xl font-semibold text-gray-800">Riwayat Pemesanan</h3>
                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h11M9 21V3m12 10H12" />
                    </svg>
                </div>
                <p class="text-sm text-gray-600">Lihat semua aktivitas pemesanan Anda sebelumnya.</p>
                <a href="#" class="inline-block mt-4 text-blue-600 hover:underline text-sm">Lihat Detail</a>
            </div>

            <!-- Poin Member -->
            <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition-all">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-xl font-semibold text-gray-800">Poin Member</h3>
                    <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M9.049 2.927C9.35 2.118 10.65 2.118 10.951 2.927l1.286 3.97a1 1 0 00.95.69h4.174c.969 0 1.371 1.24.588 1.81l-3.38 2.456a1 1 0 00-.364 1.118l1.286 3.97c.3.809-.755 1.48-1.538.91l-3.38-2.456a1 1 0 00-1.175 0l-3.38 2.456c-.783.57-1.838-.101-1.538-.91l1.286-3.97a1 1 0 00-.364-1.118L2.05 9.397c-.783-.57-.38-1.81.588-1.81h4.174a1 1 0 00.95-.69l1.286-3.97z" />
                    </svg>
                </div>
                <p class="text-sm text-gray-600">Poin saat ini: <span class="font-bold text-gray-900">120</span></p>
                <a href="#" class="inline-block mt-4 text-blue-600 hover:underline text-sm">Cek Penukaran</a>
            </div>

            <!-- Voucher & Bonus -->
            <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition-all">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-xl font-semibold text-gray-800">Voucher & Bonus</h3>
                    <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17 9V7a4 4 0 00-8 0v2M5 13h14M12 17h.01M4 21h16a2 2 0 002-2V9a2 2 0 00-2-2H4a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <p class="text-sm text-gray-600">Dapatkan bonus dan tukarkan voucher eksklusif untuk member.</p>
                <a href="#" class="inline-block mt-4 text-blue-600 hover:underline text-sm">Lihat Voucher</a>
            </div>
        </div>
    </section>
    <x-footer></x-footer>
</body>

</html>
