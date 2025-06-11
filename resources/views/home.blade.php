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
    <div class="relative isolate px-3 pt-56 lg:px-6 bg-cover bg-center"
        style="background-image: url('{{ asset('img/s4.jpg') }}')">
        <div class="mx-auto max-w-2xl py-5 sm:py-20 lg:py-28">
            <div class="text-center">
                <h1
                    class="text-4xl font-semibold tracking-tight text-balance text-neutral-800 text-shadow-white text-shadow-md sm:text-6xl">
                    Snapstures
                    Studio</h1>
                <p
                    class="mt-2 text-lg font-medium text-pretty text-black text-shadow-white text-shadow-md sm:text-xl/8">
                    "Create Yout Moment Freely"
                </p>
                <div class="mt-10 flex items-center justify-center gap-x-6">
                    <a href="paket"
                        class="rounded-md bg-blue-500 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-blue-700 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Lihat
                        Paket</a>
                    <a href="formpesanan"
                        class="rounded-md bg-blue-500 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-blue-700 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Pesan
                        Sekarang</a>
                </div>
            </div>
        </div>
    </div>

    <section class="py-16 bg-white">
        <h2 class="text-3xl font-bold text-center mb-7">Mengapa Snaptures Studio</h2>

        <!-- Container Card Horizontal -->
        <div class="flex flex-wrap justify-center gap-6 px-4 md:px-20 py-4">
            <!-- Card 1 -->
            <div class="w-60 rounded-xl overflow-hidden shadow-md bg-gray-100">
                <img src="{{ asset('img/s4.jpg') }}" alt="Friends Session" class="w-full h-85 object-cover">
                <div class="p-3 text-center">
                    <p class="font-semibold text-sm">Self Photo</p>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="w-60 rounded-xl overflow-hidden shadow-md bg-gray-100">
                <img src="{{ asset('img/s4.jpg') }}" alt="College Session" class="w-full h-85 object-cover">
                <div class="p-3 text-center">
                    <p class="font-semibold text-sm">Self Photo</p>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="w-60 rounded-xl overflow-hidden shadow-md bg-gray-100">
                <img src="{{ asset('img/s4.jpg') }}" alt="Single Session" class="w-full h-85 object-cover">
                <div class="p-3 text-center">
                    <p class="font-semibold text-sm">Pas Photo</p>
                </div>
            </div>
            <!-- Card 4 -->
            <div class="w-60 rounded-xl overflow-hidden shadow-md bg-gray-100">
                <img src="{{ asset('img/s4.jpg') }}" alt="Family Session" class="w-full h-85 object-cover">
                <div class="p-3 text-center">
                    <p class="font-semibold text-sm">Photo Studio</p>
                </div>
            </div>
        </div>

        <!-- Tombol CTA -->
        <div class="mt-5 text-center">
            <a href="tentang#gallery"
                class="inline-block bg-blue-500 text-white px-6 py-2 rounded-full text-sm font-semibold hover:bg-blue-700 transition">
                Lihat Selengkapnya
            </a>
        </div>
    </section>

    <section class="py-8 px-10">
        <h2 class="text-3xl font-bold text-center mb-4">Paket Foto</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-5xl mx-auto p-10">
            <!-- Card -->
            <div
                class="relative rounded-2xl shadow-2xl overflow-hidden transform transition hover:scale-105 hover:shadow-lg hover:border-green-400 hover:shadow-green-400 duration-300 backdrop-blur-md bg-white/80 border border-black/20">
                <img src="{{ asset('img/s4.jpg') }}" alt="silver" class="w-full h-64 object-cover">
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
                            class="mt-2 w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-xl font-medium transition-all">
                            Pesan Sekarang
                        </button>
                    </a>
                </div>
            </div>
            <div
                class=" relative rounded-2xl shadow-2xl overflow-hidden transform transition hover:scale-105 hover:shadow-lg hover:border-green-400 hover:shadow-green-400 duration-300 backdrop-blur-md bg-white/80 border border-black/20">
                <img src="{{ asset('img/s4.jpg') }}" alt="silver" class="w-full h-64 object-cover">
                <div class="p-3 space-y-3">
                    <div class="flex items-center justify-between">
                        <h2 class="text-2xl font-bold text-black flex items-center gap-2">
                            <i class="fa-solid fa-camera-retro text-blue-500"></i> Package 1
                        </h2>
                        <!-- kategori -->
                        <span class="bg-green-100 text-green-600 text-xs font-semibold px-3 py-1 rounded-full">Photo
                            Studio</span>
                    </div>
                    <ul class="text-sm text-gray-700 space-y-1">
                        <li>✔ 15 File Edit</li>
                        <li>✔ 1 Background</li>
                        <li>✔ All File Diterima</li>
                        <li>✔ Fill On Google Drive</li>
                    </ul>
                    <div class="text-xl font-semibold text-primary pb-2">Rp 200.000</div>
                    <a href="formpesanan">
                        <button
                            class="mt-2 w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-xl font-medium transition-all">Pesan
                            Sekarang</button>
                    </a>
                </div>
            </div>
            <div
                class=" relative rounded-2xl shadow-2xl overflow-hidden transform transition hover:scale-105 hover:shadow-lg hover:border-green-400 hover:shadow-green-400 duration-300 backdrop-blur-md bg-white/80 border border-black/20">
                <img src="{{ asset('img/s4.jpg') }}" alt="silver" class="w-full h-64 object-cover">
                <div class="p-3 space-y-3">
                    <div class="flex items-center justify-between">
                        <h2 class="text-2xl font-bold text-black flex items-center gap-2">
                            <i class="fa-solid fa-camera-retro text-blue-500"></i> Paket Foto
                        </h2>
                        <!-- kategori -->
                        <span class="bg-pink-100 text-pink-600 text-xs font-semibold px-3 py-1 rounded-full">Pas
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
                    <a href="formpesanan">
                        <button
                            class="mt-2 w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-xl font-medium transition-all">Pesan
                            Sekarang</button>
                    </a>
                </div>
            </div>
        </div>
        <!-- Tombol CTA -->
        <div class="mt-5 text-center">
            <a href="paket"
                class="inline-block bg-blue-500 text-white px-6 py-2 rounded-full text-sm font-semibold hover:bg-blue-700 transition">
                Lihat Selengkapnya
            </a>
        </div>
    </section>

    <section class="py-16 bg-gradient-to-b from-white to-neutral-100">
        <h2 class="text-shadow-md text-3xl md:text-3xl font-extrabold text-center text-gray-800 mb-12">
            Tentang</h2>
        <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-10 px-4">
            <!-- Profil -->
            <div
                class="bg-white p-8 rounded-3xl shadow-xl border border-neutral-300 hover:shadow-2xl transition-all duration-300">
                <h3 class="text-2xl font-semibold text-gray-800 text-center mb-4">Profil</h3>
                <p class="text-gray-600 text-justify text-sm leading-relaxed"><strong>Snaptures Studio</strong>
                    adalah studio fotografi yang berdiri dengan semangat untuk
                    mengabadikan setiap momen berharga dengan sentuhan profesional dan penuh makna. Kami percaya bahwa
                    setiap foto bukan hanya sekadar gambar, tapi juga cerita, kenangan, dan emosi yang abadi.
                </p>
                <div class="mt-6 text-center">
                    <a href="tentang">
                        <button
                            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-full text-sm transition duration-300">
                            Selengkapnya
                        </button>
                    </a>
                </div>
            </div>
            <!-- Visi dan Misi -->
            <div
                class="bg-white p-8 rounded-3xl shadow-xl border border-gray-200 hover:shadow-2xl transition-all duration-300">
                <h3 class="text-2xl font-semibold text-gray-800 text-center mb-4">Visi Misi</h3>
                <p class="text-gray-600 text-sm text-justify"><strong>Visi :</strong> Menciptakan momen dengan media
                    fotografi yang
                    mengutamakan layanan,
                    pelayanan, dan kualitas.</p>
                <p class="text-gray-600 text-sm text-justify font-semibold">Misi :</p>
                <ol class="text-gray-600 text-sm text-justify list-decimal pl-4">
                    <li>
                        Memberikan Layanan, Pelayanan dan Kualitas maksimal dengan harga terjangkau pada
                        masyarakat
                    </li>
                    <li>Meningkatkan sarana dan prasarana sesuai perkembangan
                    </li>
                    <li>Memberikan kebebasan untuk menciptakan moment
                    </li>
                </ol>
                <div class="mt-6 text-center">
                    <a href="tentang">
                        <button
                            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-full text-sm transition duration-300">
                            Selengkapnya
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <x-footer></x-footer>




</body>

</html>
