<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Pilih Paket - Dashboard Member | Snapstures Studio</title>
</head>

<body class="bg-gradient-to-tr from-gray-100 to-gray-300 min-h-screen font-inter">
    <header class="sticky top-0 z-50 bg-neutral-400 shadow-md shadow-neutral-500">
        <x-navbar></x-navbar>
        <x-mobile-menu></x-mobile-menu>
    </header>

    <section class="py-12 px-4">
        <div class="max-w-5xl mx-auto">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-10">Pilih Paket Foto</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($pakets as $paket)
                    <div
                        class="relative bg-white rounded-2xl shadow-md p-4 hover:-translate-y-1 hover:shadow-lg transition duration-300 ease-in-out">
                        {{-- Optional Label --}}
                        @if ($paket->is_rekomendasi)
                            <span
                                class="absolute top-2 right-2 bg-yellow-400 text-white text-xs px-3 py-1 rounded-full shadow">
                                Rekomendasi
                            </span>
                        @endif

                        {{-- Gambar Paket --}}
                        <img src="{{ asset($paket->gambar) }}" alt="{{ $paket->nama }}"
                            class="w-full h-48 object-cover rounded-lg mb-3 shadow-sm">

                        {{-- Info Paket --}}
                        <h3 class="text-lg font-bold text-gray-800 mb-1 flex items-center gap-2">
                            <i class="fa-solid fa-camera-retro text-purple-500"></i>
                            {{ $paket->nama }}
                        </h3>

                        <p class="text-sm text-gray-600 mb-1">Kategori:
                            <span class="font-medium">{{ ucfirst($paket->kategori) }}</span>
                        </p>

                        <ul class="text-sm text-gray-700 list-disc pl-5 my-2">
                            @foreach ($paket->deskripsi as $fitur)
                                <li>{{ $fitur }}</li>
                            @endforeach
                        </ul>

                        <div class="text-xl font-semibold text-indigo-600 my-2">
                            Rp {{ number_format($paket->harga, 0, ',', '.') }}
                        </div>

                        {{-- Tombol --}}
                        <a href="{{ route('member.formpesanan', $paket->id) }}">
                            <button
                                class="w-full py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-semibold transition">
                                Pilih Paket Ini
                            </button>
                        </a>
                    </div>
                @empty
                    <div class="col-span-full text-center text-gray-600">
                        Belum ada paket tersedia saat ini.
                    </div>
                @endforelse
            </div>

            {{-- Tombol Kembali --}}
            <div class="mt-10 text-center">
                <a href="{{ route('member.dashboard') }}" class="text-sm text-blue-600 hover:underline">
                    ← Kembali ke Dashboard
                </a>
            </div>
        </div>
    </section>

    <x-footer></x-footer>
</body>

</html>
