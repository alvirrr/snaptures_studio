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
    <link href="style.css" rel="stylesheet" />
</head>

<body>
    <header class="sticky top-0 left-0 right-0 z-50 bg-neutral-400 shadow-md shadow-neutral-500">
        <x-navbar></x-navbar>
        <!-- Mobile menu -->
        <x-mobile-menu></x-mobile-menu>
    </header>
    {{-- 
    <section class="py-20 bg-white">
        <div class="max-w-6xl mx-auto px-4" x-data="{ tab: 'all' }">

            <!-- Filter Tabs -->
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                <button @click="tab = 'all'"
                    :class="tab === 'all' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700'"
                    class="px-4 py-2 rounded-full text-sm font-medium transition">All</button>
                <button @click="tab = 'branding'"
                    :class="tab === 'branding' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700'"
                    class="px-4 py-2 rounded-full text-sm font-medium transition">Branding Strategy</button>
                <button @click="tab = 'digital'"
                    :class="tab === 'digital' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700'"
                    class="px-4 py-2 rounded-full text-sm font-medium transition">Digital Experiences</button>
                <button @click="tab = 'ecommerce'"
                    :class="tab === 'ecommerce' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700'"
                    class="px-4 py-2 rounded-full text-sm font-medium transition">Ecommerce</button>
            </div>

            <!-- Gallery Masonry -->
            <div class="columns-1 sm:columns-2 md:columns-3 gap-4 space-y-4">
                <!-- Item 1 -->
                <div class="break-inside-avoid" x-show="tab === 'all' || tab === 'branding' || tab === 'ecommerce'">
                    <img src="/img/foto1.jpg" alt="Project 1" class="rounded-lg shadow-sm hover:shadow-md transition">
                </div>

                <!-- Item 2 -->
                <div class="break-inside-avoid" x-show="tab === 'all' || tab === 'digital'">
                    <img src="/img/s1.jpg" alt="Project 2" class="rounded-lg shadow-sm hover:shadow-md transition">
                </div>

                <!-- Item 3 -->
                <div class="break-inside-avoid" x-show="tab === 'all' || tab === 'branding' || tab === 'ecommerce'">
                    <img src="/img/foto1.jpg" alt="Project 3" class="rounded-lg shadow-sm hover:shadow-md transition">
                </div>

                <!-- Item 4 -->
                <div class="break-inside-avoid" x-show="tab === 'all' || tab === 'digital' || tab === 'ecommerce'">
                    <img src="/img/s1.jpg" alt="Project 4" class="rounded-lg shadow-sm hover:shadow-md transition">
                </div>

                <div class="break-inside-avoid" x-show="tab === 'all' || tab === 'digital' || tab === 'ecommerce'">
                    <img src="/img/s1.jpg" alt="Project 4" class="rounded-lg shadow-sm hover:shadow-md transition">
                </div>

                <div class="break-inside-avoid" x-show="tab === 'all' || tab === 'digital' || tab === 'ecommerce'">
                    <img src="/img/s1.jpg" alt="Project 4" class="rounded-lg shadow-sm hover:shadow-md transition">
                </div>

                <div class="break-inside-avoid" x-show="tab === 'all' || tab === 'digital' || tab === 'ecommerce'">
                    <img src="/img/foto1.jpg" alt="Project 4"
                        class="rounded-lg shadow-sm hover:shadow-md transition">
                </div>
            </div>
        </div>
    </section> --}}

    {{-- <main class="flex-1 p-8 overflow-y-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Data Pemesanan</h1>

        <!-- Table -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="text-gray-600 uppercase text-sm bg-gray-100">
                        <th class="py-3 px-4 border-b">No</th>
                        <th class="py-3 px-4 border-b">Nama Pemesan</th>
                        <th class="py-3 px-4 border-b">Tanggal</th>
                        <th class="py-3 px-4 border-b">Paket</th>
                        <th class="py-3 px-4 border-b">Pembayaran</th>
                        <th class="py-3 px-4 border-b">Status</th>
                        <th class="py-3 px-4 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-gray-50">
                        <td class="py-3 px-4 border-b">1</td>
                        <td class="py-3 px-4 border-b">Nabila Salsabila</td>
                        <td class="py-3 px-4 border-b">2025-05-10</td>
                        <td class="py-3 px-4 border-b">Self Photo</td>
                        <td class="py-3 px-4 border-b">Transfer</td>
                        <td class="py-3 px-4 border-b">
                            <span class="text-green-600 font-semibold">Terkonfirmasi</span>
                        </td>
                        <td class="py-3 px-4 border-b">
                            <button class="text-blue-500 hover:underline mr-2">Detail</button>
                            <button class="text-yellow-500 hover:underline mr-2">Edit</button>
                            <button class="text-red-500 hover:underline">Hapus</button>
                        </td>
                    </tr>
                    <!-- Baris data lainnya -->
                </tbody>
            </table>
        </div>
    </main> --}}

    {{-- <div class="max-w-6xl mx-auto py-5">
        <h1 class="text-3xl font-bold text-gray-800 py-10 text-center">Daftar Paket Studio</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div
                class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition duration-300 border border-gray-200">
                <div class="h-40 bg-cover bg-center" style="background-image: url('{{ asset('img/foto1.jpg') }}')">
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-center">
                        <h2 class="text-xl font-semibold text-gray-800">Paket Silver</h2>
                        <span
                            class="bg-blue-100 text-blue-600 text-xs font-semibold px-2.5 py-0.5 rounded">Terpopuler</span>
                    </div>
                    <p class="text-gray-600 mt-2 mb-4">30 menit sesi self-photo, 10 hasil edit, 1 background pilihan.
                    </p>
                    <div class="text-2xl font-bold text-gray-800 mb-4">Rp 100.000</div>
                    <ul class="text-sm text-gray-600 space-y-1 mb-6">
                        <li>✔ Studio eksklusif</li>
                        <li>✔ 1 background bebas</li>
                        <li>✔ 10 hasil foto digital</li>
                    </ul>
                    <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg">
                        Pesan Sekarang
                    </button>
                </div>
            </div>

            <div
                class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition duration-300 border border-gray-200">
                <div class="h-40 bg-cover bg-center"
                    style="background-image: url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=600&q=80');">
                </div>
                <div class="p-6">
                    <h2 class="text-xl font-semibold text-gray-800">Paket Gold</h2>
                    <p class="text-gray-600 mt-2 mb-4">60 menit sesi, 20 hasil edit, bebas 2 background, gratis cetak.
                    </p>
                    <div class="text-2xl font-bold text-gray-800 mb-4">Rp 180.000</div>
                    <ul class="text-sm text-gray-600 space-y-1 mb-6">
                        <li>✔ Durasi lebih lama</li>
                        <li>✔ 2 background bebas</li>
                        <li>✔ Cetak 1 foto gratis</li>
                    </ul>
                    <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg">
                        Pesan Sekarang
                    </button>
                </div>
            </div>

            <div
                class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition duration-300 border border-gray-200">
                <div class="h-40 bg-cover bg-center"
                    style="background-image: url('https://images.unsplash.com/photo-1603791440384-56cd371ee9a7?auto=format&fit=crop&w=600&q=80');">
                </div>
                <div class="p-6">
                    <h2 class="text-xl font-semibold text-gray-800">Paket Platinum</h2>
                    <p class="text-gray-600 mt-2 mb-4">90 menit sesi, 30 foto edit, semua background & properti.</p>
                    <div class="text-2xl font-bold text-gray-800 mb-4">Rp 250.000</div>
                    <ul class="text-sm text-gray-600 space-y-1 mb-6">
                        <li>✔ Semua background</li>
                        <li>✔ Semua properti studio</li>
                        <li>✔ 30 hasil foto digital + cetak 3</li>
                    </ul>
                    <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg">
                        Pesan Sekarang
                    </button>
                </div>
            </div>

        </div>
    </div> --}}
    <section class="py-10 bg-linear-to-t from-neutral-200 to-neutral-100">
        <div class="max-w-6xl mx-auto px-4 py-5" x-data="{ tab: 'all' }">
            <div class="max-w-6xl mx-auto text-center py-10">
                <h1 class="text-4xl font-extrabold text-gray-800 text-shadow-white text-shadow-md">Pilih Paket Studio
                    Foto</h1>
                <p class="text-gray-900 mt-2">Temukan paket terbaik untuk sesi foto tak terlupakan</p>
            </div>
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                <button @click="tab = 'all'"
                    :class="tab === 'all' ? 'bg-blue-500 text-white' : 'bg-gray-300 text-gray-700'"
                    class="hover:bg-blue-600 hover:text-white px-4 py-2 rounded-full text-sm font-medium transition ">All</button>
                <button @click="tab = 'selfPhoto'"
                    :class="tab === 'selfPhoto' ? 'bg-blue-500 text-white' : 'bg-gray-300 text-gray-700'"
                    class="hover:bg-blue-600 hover:text-white px-4 py-2 rounded-full text-sm font-medium transition  ">Self
                    Photo</button>
                <button @click="tab = 'photoStudio'"
                    :class="tab === 'photoStudio' ? 'bg-blue-500 text-white' : 'bg-gray-300 text-gray-700'"
                    class="hover:bg-blue-600 hover:text-white px-4 py-2 rounded-full text-sm font-medium transition  ">Photo
                    Studio</button>
                <button @click="tab = 'pasPhoto'"
                    :class="tab === 'pasPhoto' ? 'bg-blue-500 text-white' : 'bg-gray-300 text-gray-700'"
                    class="hover:bg-blue-600 hover:text-white px-4 py-2 rounded-full text-sm font-medium transition  ">Pas
                    Photo</button>
            </div>
            {{-- self photo --}}
            <div x-show="tab === 'all' || tab === 'selfPhoto'" id="selfphoto"
                class="bg-linear-to-t from-fuchsia-400 to-indigo-700 rounded-2xl my-5">
                <h2 class="text-center text-2xl text-black font-semibold py-5">Paket Self Photo</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-5xl mx-auto p-10">
                    <!-- Card -->
                    <div
                        class=" relative rounded-2xl shadow-2xl overflow-hidden transform transition hover:scale-105 hover:shadow-lg hover:border-green-400 hover:shadow-green-400 duration-300 backdrop-blur-md bg-white/80 border border-white/20">
                        <img src="{{ asset('img/s6.jpg') }}" alt="silver" class="w-full h-64 object-cover">
                        <div class="p-3 space-y-3">
                            <div class="flex items-center justify-between">
                                <h2 class="text-2xl font-bold text-black flex items-center gap-2">
                                    <i class="fa-solid fa-camera-retro text-blue-500"></i> Paket 1
                                </h2>
                                <!-- kategori -->
                                <span
                                    class="bg-blue-100 text-blue-600 text-xs font-semibold px-3 py-1 rounded-full">Self
                                    Photo</span>
                            </div>
                            <ul class="text-sm text-gray-700 space-y-1">
                                <li>✔ 15 Menit Sesi Foto</li>
                                <li>✔ Jumlah Foto Bebas</li>
                                <li>✔ 1 Background</li>
                                <li>✔ Free 2 Cetak Foto</li>
                                <li>✔ Free Properti</li>
                            </ul>
                            <div class="text-xl font-semibold text-primary pb-2">Rp 60.000</div>
                            <a href="{{ route('formpesanan', $paket->slug) }}">
                                <button
                                    class="mt-2 w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-xl font-medium transition-all">Pesan
                                    Sekarang</button>
                            </a>
                        </div>
                    </div>
                    <div
                        class="relative rounded-2xl shadow-xl overflow-hidden transform transition hover:scale-105 hover:shadow-lg hover:border-green-400 hover:shadow-green-400 duration-300 backdrop-blur-md bg-white/80 border border-white/20">
                        <img src="{{ asset('img/s6.jpg') }}" alt="silver" class="w-full h-64 object-cover">
                        <div class="p-3 space-y-3">
                            <div class="flex items-center justify-between">
                                <h2 class="text-2xl font-bold text-black flex items-center gap-2">
                                    <i class="fa-solid fa-camera-retro text-blue-500"></i> Paket 2
                                </h2>
                                <!-- kategori -->
                                <span
                                    class="bg-blue-100 text-blue-600 text-xs font-semibold px-3 py-1 rounded-full">Self
                                    Photo</span>
                            </div>
                            <ul class="text-sm text-gray-700 space-y-1">
                                <li>✔ 25 Menit Sesi Foto</li>
                                <li>✔ Jumlah Foto Bebas</li>
                                <li>✔ 2 Background</li>
                                <li>✔ Free 2 Cetak Foto</li>
                                <li>✔ Free Properti</li>
                            </ul>
                            <div class="text-xl font-semibold text-primary pb-2">Rp 100.000</div>
                            <a href="{{ route('formpesanan', $paket->slug) }}">
                                <button
                                    class="mt-2 w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-xl font-medium transition-all">Pesan
                                    Sekarang</button>
                            </a>
                        </div>
                    </div>
                    <div
                        class="relative rounded-2xl shadow-xl overflow-hidden transform transition hover:scale-105 hover:shadow-lg hover:border-green-400 hover:shadow-green-400 duration-300 backdrop-blur-md bg-white/80 border border-white/20">
                        <img src="{{ asset('img/s6.jpg') }}" alt="silver" class="w-full h-64 object-cover">
                        <div class="p-3 space-y-3">
                            <div class="flex items-center justify-between">
                                <h2 class="text-2xl font-bold text-black flex items-center gap-2">
                                    <i class="fa-solid fa-camera-retro text-blue-500"></i> Paket 3
                                </h2>
                                <!-- kategori -->
                                <span
                                    class="bg-blue-100 text-blue-600 text-xs font-semibold px-3 py-1 rounded-full">Self
                                    Photo</span>
                            </div>
                            <ul class="text-sm text-gray-700 space-y-1">
                                <li>✔ 45 Menit Sesi Foto</li>
                                <li>✔ Jumlah Foto Bebas</li>
                                <li>✔ 2 Background</li>
                                <li>✔ Free 2 Cetak Foto</li>
                                <li>✔ Free Properti</li>
                            </ul>
                            <div class="text-xl font-semibold text-primary pb-2">Rp 180.000</div>
                            <a href="{{ route('formpesanan', $paket->slug) }}">
                                <button
                                    class="mt-2 w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-xl font-medium transition-all">Pesan
                                    Sekarang</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- photo studio --}}
            <div x-show="tab === 'all' || tab === 'photoStudio'" id="photoStudio"
                class="bg-linear-to-t from-purple-500 to-blue-500 rounded-2xl my-5">
                <h2 class="text-center text-2xl text-black font-semibold py-5">Paket Photo Studio</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-5xl mx-auto p-10">
                    <!-- Card -->
                    <div
                        class=" relative rounded-2xl shadow-2xl overflow-hidden transform transition hover:scale-105 hover:shadow-lg hover:border-green-400 hover:shadow-green-400 duration-300 backdrop-blur-md bg-white/80 border border-white/20">
                        <img src="{{ asset('img/foto1.jpg') }}" alt="silver" class="w-full h-64 object-cover">
                        <div class="p-3 space-y-3">
                            <div class="flex items-center justify-between">
                                <h2 class="text-2xl font-bold text-black flex items-center gap-2">
                                    <i class="fa-solid fa-camera-retro text-blue-500"></i> Package 1
                                </h2>
                                <!-- kategori -->
                                <span
                                    class="bg-green-100 text-green-600 text-xs font-semibold px-3 py-1 rounded-full">Photo
                                    Studio</span>
                            </div>
                            <ul class="text-sm text-gray-700 space-y-1">
                                <li>✔ 15 File Edit</li>
                                <li>✔ 1 Background</li>
                                <li>✔ All File Diterima</li>
                                <li>✔ Fill On Google Drive</li>
                            </ul>
                            <div class="text-xl font-semibold text-primary pb-2">Rp 200.000</div>
                            <a href="{{ route('formpesanan', $paket->slug) }}">
                                <button
                                    class="mt-2 w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-xl font-medium transition-all">Pesan
                                    Sekarang</button>
                            </a>
                        </div>
                    </div>
                    <div
                        class="relative rounded-2xl shadow-xl overflow-hidden transform transition hover:scale-105 hover:shadow-lg hover:border-green-400 hover:shadow-green-400 duration-300 backdrop-blur-md bg-white/80 border border-white/20">
                        <img src="{{ asset('img/foto1.jpg') }}" alt="silver" class="w-full h-64 object-cover">
                        <div class="p-3 space-y-3">
                            <div class="flex items-center justify-between">
                                <h2 class="text-2xl font-bold text-black flex items-center gap-2">
                                    <i class="fa-solid fa-camera-retro text-blue-500"></i> Package 2
                                </h2>
                                <!-- kategori -->
                                <span
                                    class="bg-green-100 text-green-600 text-xs font-semibold px-3 py-1 rounded-full">Photo
                                    Studio</span>
                            </div>
                            <ul class="text-sm text-gray-700 space-y-1">
                                <li>✔ 20 File Edit</li>
                                <li>✔ 2 Background</li>
                                <li>✔ All File Diterima</li>
                                <li>✔ File On Google Drive</li>
                            </ul>
                            <div class="text-xl font-semibold text-primary pb-2">Rp 300.000</div>
                            <a href="{{ route('formpesanan', $paket->slug) }}">
                                <button
                                    class="mt-2 w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-xl font-medium transition-all">Pesan
                                    Sekarang</button>
                            </a>
                        </div>
                    </div>
                    <div
                        class="relative rounded-2xl shadow-xl overflow-hidden transform transition hover:scale-105 hover:shadow-lg hover:border-green-400 hover:shadow-green-400 duration-300 backdrop-blur-md bg-white/80 border border-white/20">
                        <img src="{{ asset('img/foto1.jpg') }}" alt="silver" class="w-full h-64 object-cover">
                        <div class="p-3 space-y-3">
                            <div class="flex items-center justify-between">
                                <h2 class="text-2xl font-bold text-black flex items-center gap-2">
                                    <i class="fa-solid fa-camera-retro text-blue-500"></i> Package 3
                                </h2>
                                <!-- kategori -->
                                <span
                                    class="bg-green-100 text-green-600 text-xs font-semibold px-3 py-1 rounded-full">Photo
                                    Studio</span>
                            </div>
                            <ul class="text-sm text-gray-700 space-y-1">
                                <li>✔ 25 File Edit</li>
                                <li>✔ 2 Background</li>
                                <li>✔ 1 Cetak 12RS + Frame</li>
                                <li>✔ All File Diterima</li>
                                <li>✔ File On Google drive</li>
                            </ul>
                            <div class="text-xl font-semibold text-primary pb-2">Rp 500.000</div>
                            <a href="{{ route('formpesanan', $paket->slug) }}">
                                <button
                                    class="mt-2 w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-xl font-medium transition-all">Pesan
                                    Sekarang</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- pas photo --}}
            <div x-show="tab === 'all' || tab === 'pasPhoto'" id="pasPhoto"
                class="bg-linear-to-t from-violet-600 to-green-500 rounded-2xl my-5">
                <h2 class="text-center text-2xl text-black font-semibold py-5">Pas Photo Studio</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-5xl mx-auto p-10">
                    <!-- Card -->
                    <div
                        class=" relative rounded-2xl shadow-2xl overflow-hidden transform transition hover:scale-105 hover:shadow-lg hover:border-green-400 hover:shadow-green-400 duration-300 backdrop-blur-md bg-white/80 border border-white/20">
                        <img src="{{ asset('img/foto1.jpg') }}" alt="silver" class="w-full h-64 object-cover">
                        <div class="p-3 space-y-3">
                            <div class="flex items-center justify-between">
                                <h2 class="text-2xl font-bold text-black flex items-center gap-2">
                                    <i class="fa-solid fa-camera-retro text-blue-500"></i> Paket Foto
                                </h2>
                                <!-- kategori -->
                                <span
                                    class="bg-pink-100 text-pink-600 text-xs font-semibold px-3 py-1 rounded-full">Pas
                                    Photo</span>
                            </div>
                            <ul class="text-sm text-gray-700 space-y-1">
                                <li>✔ 1 Orang</li>
                                <li>✔ File 3x4</li>
                                <li>✔ File 4x6 </li>
                                <li>✔ File 2x3</li>
                                <li>✔ File Edit</li>
                            </ul>
                            <div class="text-xl font-semibold text-primary pb-2">Rp 20.000</div>
                            <a href="{{ route('formpesanan', $paket->slug) }}">
                                <button
                                    class="mt-2 w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-xl font-medium transition-all">Pesan
                                    Sekarang</button>
                            </a>
                        </div>
                    </div>
                    <div
                        class="relative rounded-2xl shadow-xl overflow-hidden transform transition hover:scale-105 hover:shadow-lg hover:border-green-400 hover:shadow-green-400 duration-300 backdrop-blur-md bg-white/80 border border-white/20">
                        <img src="{{ asset('img/foto1.jpg') }}" alt="silver" class="w-full h-64 object-cover">
                        <div class="p-3 space-y-3">
                            <div class="flex items-center justify-between">
                                <h2 class="text-2xl font-bold text-black flex items-center gap-2">
                                    <i class="fa-solid fa-camera-retro text-blue-500"></i> Paket Cetak
                                </h2>
                                <!-- kategori -->
                                <span
                                    class="bg-pink-100 text-pink-600 text-xs font-semibold px-3 py-1 rounded-full">Pas
                                    Photo</span>
                            </div>
                            <ul class="text-sm text-gray-700 space-y-1">
                                <li class="mt-2 font-semibold">Pilih Ukuran 4x6</li>
                                <li>✔ 4 Lembar Foto Cetak</li>

                                <li class="mt-2 font-semibold">Pilih Ukuran 3x4</li>
                                <li>✔ 8 Lembar Foto Cetak</li>

                                <li class="mt-2 font-semibold">Pilih Ukuran 2x3</li>
                                <li>✔ 8 Lembar Foto Cetak</li>
                            </ul>
                            <div class="text-xl font-semibold text-primary pb-2">Rp 5.000</div>
                            <a href="{{ route('formpesanan', $paket->slug) }}">
                                <button
                                    class="mt-2 w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-xl font-medium transition-all">Pesan
                                    Sekarang</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <x-footer></x-footer>
</body>

</html>
