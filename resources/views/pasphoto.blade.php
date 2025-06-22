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

    {{-- SECTION PAKET --}}
    <section class="bg-linear-to-t from-neutral-200 to-neutral-100 py-16 px-4">
        <div class="max-w-5xl mx-auto bg-linear-to-t from-violet-600 to-green-500 rounded-2xl my-5">
            <h2 class="text-center text-2xl text-black font-semibold py-5 text-shadow-md text-shadow-white">
                Paket Photo Studio
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-5xl mx-auto p-10">
                {{-- LOOP DATA PAKET --}}
                @foreach ($pakets as $paket)
                    <div
                        class="relative rounded-2xl shadow-2xl overflow-hidden transform transition hover:scale-105 hover:shadow-lg hover:border-green-400 hover:shadow-green-400 duration-300 backdrop-blur-md bg-white/80 border border-white/20">
                        <img src="{{ asset($paket->gambar) }}" alt="{{ $paket->nama }}"
                            class="w-full h-64 object-cover" />

                        <div class="p-3 space-y-3">
                            <div class="flex items-center justify-between">
                                <h2 class="text-2xl font-bold text-black flex items-center gap-2">
                                    <i class="fa-solid fa-camera-retro text-blue-500"></i>
                                    {{ $paket->nama }}
                                </h2>
                                <span class="bg-pink-100 text-pink-600 text-xs font-semibold px-3 py-1 rounded-full">
                                    {{ $paket->kategori }}
                                </span>
                            </div>

                            <ul class="text-sm text-gray-700 space-y-1">
                                @foreach (json_decode($paket->deskripsi) as $item)
                                    <li>✔ {{ $item }}</li>
                                @endforeach
                            </ul>

                            <div class="text-xl font-semibold text-primary pb-2">
                                Rp {{ number_format($paket->harga, 0, ',', '.') }}
                            </div>

                            <a href="{{ route('formpesanan', $paket->slug) }}">
                                <button
                                    class="mt-2 w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-xl font-medium transition-all">
                                    Pesan Sekarang
                                </button>
                            </a>

                        </div>
                    </div>
                @endforeach
                {{-- END LOOP --}}
            </div>
        </div>
    </section>

    <x-footer></x-footer>
</body>

</html>
