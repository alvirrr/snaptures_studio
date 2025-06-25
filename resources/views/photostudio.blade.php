<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Fonts & Ikon --}}
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Snapstures Studio – Paket Photo Studio</title>
</head>

<body>
    <header class="sticky top-0 z-50 bg-neutral-400 shadow-md shadow-neutral-500">
        <x-navbar />
        <x-mobile-menu />
    </header>

    <section class="bg-gradient-to-t from-neutral-200 to-neutral-100 py-16 px-4">
        <div class="max-w-5xl mx-auto bg-gradient-to-t from-fuchsia-500 to-indigo-500 rounded-2xl my-5 p-8">
            <h2 class="text-center text-2xl font-semibold text-black py-5">Paket Photo Studio</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 p-10 sm:p-3">
                {{-- LOOP semua paket --}}
                @foreach ($pakets as $paket)
                    <div
                        class="relative rounded-2xl border border-white/20 bg-white/80 shadow-2xl overflow-hidden backdrop-blur-md
                           transition transform duration-300 hover:scale-105 hover:shadow-lg hover:border-green-400 hover:shadow-green-400">
                        {{-- Gambar --}}
                        <img src="{{ asset($paket->gambar) }}" alt="{{ $paket->nama }}"
                            class="w-full h-64 object-cover" />

                        {{-- Konten --}}
                        <div class="p-3 space-y-3">
                            <div class="flex items-center justify-between">
                                <h3 class="text-xl font-bold text-black flex items-center gap-2">
                                    <i class="fa-solid fa-camera-retro text-blue-500"></i>
                                    {{ $paket->nama }}
                                </h3>
                                <span class="bg-blue-100 text-blue-600 text-xs font-semibold px-3 py-1 rounded-full">
                                    {{ ucfirst($paket->kategori) }}
                                </span>
                            </div>

                            {{-- List fitur dari kolom JSON --}}
                            <ul class="text-sm text-gray-700 space-y-1">
                                @foreach ($paket->deskripsi as $fitur)
                                    <li>✔ {{ $fitur }}</li>
                                @endforeach
                            </ul>

                            {{-- Harga --}}
                            <div class="text-xl font-semibold text-primary pb-2">
                                Rp {{ number_format($paket->harga, 0, ',', '.') }}
                            </div>

                            {{-- Tombol Pesan --}}
                            <a
                                href="{{ route('pilih.lanjutan', $paket->slug) }}?nama_paket={{ $paket->nama }}&harga={{ $paket->harga }}">
                                <button
                                    class="mt-2 w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-xl font-medium transition-all">
                                    Pesan Sekarang
                                </button>
                            </a>

                        </div>
                    </div>
                @endforeach
                {{-- END FOREACH --}}
            </div>
        </div>
    </section>

    <x-footer />
</body>

</html>
