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

    @extends('app')

    @section('content')
        <div class="max-w-4xl mx-auto p-6 bg-white rounded-2xl shadow-md">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Pilih Jadwal Pemesanan</h2>

            @if (session('success'))
                <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
            @elseif(session('error'))
                <div class="bg-red-100 text-red-800 p-3 rounded mb-4">{{ session('error') }}</div>
            @endif

            <form method="POST" action="{{ route('booking.store') }}">
                @csrf

                <!-- Pilih Tanggal -->
                <label for="booking-date" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Pemesanan</label>
                <input type="date" id="booking-date" name="booking_date"
                    class="w-full p-3 border border-gray-300 rounded-xl mb-6 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>

                <!-- Pilih Waktu -->
                <input type="hidden" name="time_slot" id="selected-slot">

                <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Waktu</label>
                <div id="time-slots" class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                    @foreach (['10:00-11:00', '11:00-12:00', '13:00-14:00', '14:00-15:00', '15:00-16:00'] as $slot)
                        <button type="button"
                            class="time-slot bg-green-100 text-green-700 px-4 py-2 rounded-xl hover:bg-green-200"
                            data-slot="{{ $slot }}">{{ $slot }}</button>
                    @endforeach
                </div>

                <!-- Submit -->
                <button type="submit"
                    class="mt-6 w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-xl">
                    Konfirmasi Pemesanan
                </button>
            </form>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const dateInput = document.getElementById('booking-date');
                const timeButtons = document.querySelectorAll('.time-slot');
                const selectedSlot = document.getElementById('selected-slot');

                // Handle slot selection
                timeButtons.forEach(btn => {
                    btn.addEventListener('click', () => {
                        timeButtons.forEach(b => b.classList.remove('bg-blue-600', 'text-white'));
                        btn.classList.add('bg-blue-600', 'text-white');
                        selectedSlot.value = btn.dataset.slot;
                    });
                });

                // Fetch booked slots
                dateInput.addEventListener('change', () => {
                    fetch(`/booking/slots?date=${dateInput.value}`)
                        .then(res => res.json())
                        .then(booked => {
                            timeButtons.forEach(btn => {
                                if (booked.includes(btn.dataset.slot)) {
                                    btn.disabled = true;
                                    btn.classList.remove('bg-green-100', 'hover:bg-green-200');
                                    btn.classList.add('bg-gray-300', 'text-gray-500',
                                        'cursor-not-allowed');
                                } else {
                                    btn.disabled = false;
                                    btn.classList.remove('bg-gray-300', 'text-gray-500',
                                        'cursor-not-allowed');
                                    btn.classList.add('bg-green-100', 'hover:bg-green-200');
                                }
                            });
                        });
                });
            });
        </script>
    @endsection


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




    <x-footer></x-footer>
</body>

</html>
