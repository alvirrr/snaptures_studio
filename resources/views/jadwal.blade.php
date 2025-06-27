<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Jadwal - Snapstures Studio</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-gradient-to-b from-white to-neutral-100">

    {{-- Navbar --}}
    <header class="sticky top-0 left-0 right-0 z-50 bg-neutral-400 shadow-md shadow-neutral-500">
        <x-navbar />
        <x-mobile-menu />
    </header>

    {{-- Konten Booking --}}
    <section class="py-16">
        <div class="max-w-5xl mx-auto px-4">
            <h2 class="text-3xl font-extrabold text-center text-gray-800 mb-10">Booking Jadwal Studio</h2>

            {{-- Tanggal Selector --}}
            <form method="GET" class="flex justify-center mb-8">
                <input type="date" name="tanggal" value="{{ $tanggal }}" min="{{ now()->toDateString() }}"
                    class="border border-neutral-300 rounded-xl p-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="submit"
                    class="ml-4 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-xl shadow">
                    Tampilkan
                </button>
            </form>

            {{-- Alert --}}
            @if (session('success'))
                <div class="mb-4 text-green-700 bg-green-100 border border-green-300 p-3 rounded-md text-center">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="mb-4 text-red-700 bg-red-100 border border-red-300 p-3 rounded-md text-center">
                    {{ session('error') }}
                </div>
            @endif

            {{-- Grid Slot Booking --}}
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6">
                @foreach ($slots as $slot)
                    @if ($slot['status'] === 'available')
                        <form method="POST" action="{{ route('jadwal.store') }}">
                            @csrf
                            <input type="hidden" name="tanggal" value="{{ $tanggal }}">
                            <input type="hidden" name="jam" value="{{ $slot['jam'] }}">

                            <button type="submit"
                                class="w-full p-4 rounded-2xl bg-green-500 text-white font-semibold shadow hover:bg-green-600 transition">
                                {{ $slot['jam'] }}
                            </button>
                        </form>
                    @else
                        <div
                            class="w-full p-4 rounded-2xl bg-red-500 text-white font-semibold text-center shadow opacity-60 cursor-not-allowed">
                            {{ $slot['jam'] }}
                        </div>
                    @endif
                @endforeach
            </div>

            <p class="text-sm text-gray-500 mt-6 text-center">🟩 Tersedia | 🟥 Sudah Dipesan</p>
        </div>
    </section>

    {{-- Footer --}}
    <x-footer />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>
