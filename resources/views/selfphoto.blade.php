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
    <section class="bg-linear-to-t from-neutral-200 to-neutral-100 py-16 px-4">
        <div class="max-w-5xl mx-auto bg-linear-to-t from-fuchsia-500 to-indigo-500 rounded-2xl my-5 p-8 m-8">
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
                            <span class="bg-blue-100 text-blue-600 text-xs font-semibold px-3 py-1 rounded-full">Self
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
                        <a href="formpesanan">
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
                            <span class="bg-blue-100 text-blue-600 text-xs font-semibold px-3 py-1 rounded-full">Self
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
                        <a href="formpesanan">
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
                            <span class="bg-blue-100 text-blue-600 text-xs font-semibold px-3 py-1 rounded-full">Self
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
                        <a href="formpesanan">
                            <button
                                class="mt-2 w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-xl font-medium transition-all">Pesan
                                Sekarang</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <x-footer></x-footer>
</body>

</html>
