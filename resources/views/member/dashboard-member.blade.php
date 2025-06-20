<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Dashboard Member - Snapstures Studio</title>
</head>

<body class="bg-gradient-to-tr from-gray-100 to-gray-300 min-h-screen font-inter">
    <header class="sticky top-0 z-50 bg-neutral-400 shadow-md shadow-neutral-500">
        <x-navbar />
        <x-mobile-menu />
    </header>

    <section class="py-12 px-4">
        <!-- Header Member Info -->
        <div
            class="max-w-5xl mx-auto bg-white rounded-3xl shadow-xl p-6 md:p-8 flex flex-col md:flex-row items-center md:items-start gap-6 transition hover:shadow-2xl">
            <img src="/img/pas.jpg" alt="Profile"
                class="w-28 h-28 rounded-full border-4 border-blue-500 shadow-lg object-cover">
            <div class="flex-1 text-center md:text-left space-y-2">
                <h2 class="text-2xl font-bold text-gray-800">Muhammad Firman</h2>
                <p class="text-sm text-gray-600">ID Member: <span class="font-medium text-black">MBR102938</span></p>
                <p class="text-sm text-gray-600">Email: <span class="font-medium text-black">firman@gmail.com</span></p>
                <div class="mt-2 flex justify-center md:justify-start gap-4 text-sm text-blue-600">
                    <a href="#" class="hover:underline">✏️ Edit Profil</a>
                    <span>|</span>
                    <a href="#" class="hover:underline text-red-500">🚪 Logout</a>
                </div>
            </div>
            <div
                class="text-sm px-4 py-2 bg-gradient-to-r from-yellow-300 to-yellow-400 text-yellow-900 font-semibold rounded-full shadow-sm">
                🏆 Member Level: <span class="text-yellow-800">Gold</span>
            </div>
        </div>

        <!-- Menu Cards -->
        <div class="max-w-5xl mx-auto mt-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Card 1 -->
            <div
                class="bg-white rounded-2xl shadow-md p-6 hover:-translate-y-1 hover:shadow-lg transition duration-300 ease-in-out">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-xl font-semibold text-gray-800">Riwayat Pemesanan</h3>
                    <i class="fas fa-clock text-blue-500 text-lg"></i>
                </div>
                <p class="text-sm text-gray-600">Lihat semua aktivitas pemesanan Anda sebelumnya.</p>
                <a href="#" class="inline-block mt-4 text-blue-600 hover:underline text-sm">Lihat Detail</a>
            </div>

            <!-- Card 2 -->
            <div
                class="bg-white rounded-2xl shadow-md p-6 hover:-translate-y-1 hover:shadow-lg transition duration-300 ease-in-out">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-xl font-semibold text-gray-800">Poin Member</h3>
                    <i class="fas fa-star text-yellow-400 text-lg"></i>
                </div>
                <p class="text-sm text-gray-600">Poin saat ini: <span class="font-bold text-gray-900">120</span></p>
                <a href="#" class="inline-block mt-4 text-blue-600 hover:underline text-sm">Cek Penukaran</a>
            </div>

            <!-- Card 3 -->
            <div
                class="bg-white rounded-2xl shadow-md p-6 hover:-translate-y-1 hover:shadow-lg transition duration-300 ease-in-out">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-xl font-semibold text-gray-800">Voucher & Bonus</h3>
                    <i class="fas fa-gift text-green-500 text-lg"></i>
                </div>
                <p class="text-sm text-gray-600">Dapatkan bonus dan tukarkan voucher eksklusif untuk member.</p>
                <a href="#" class="inline-block mt-4 text-blue-600 hover:underline text-sm">Lihat Voucher</a>
            </div>
        </div>
    </section>

    <x-footer />
</body>

</html>
