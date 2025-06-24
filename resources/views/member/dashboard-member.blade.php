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
        <x-navbar></x-navbar>
        <x-mobile-menu></x-mobile-menu>
    </header>

    @php
        $member = Auth::guard('member')->user();
    @endphp

    <section class="py-12 px-4">
        {{-- Flash Message --}}
        @if (session('success'))
            <div class="max-w-5xl mx-auto mb-4">
                <div class="bg-green-100 text-green-800 px-4 py-2 rounded-lg shadow">
                    {{ session('success') }}
                </div>
            </div>
        @endif

        <!-- Header Member Info -->
        <div
            class="max-w-5xl mx-auto bg-white rounded-3xl shadow-xl p-6 md:p-8 flex flex-col md:flex-row items-center md:items-start gap-6 transition hover:shadow-2xl">
            <img src="{{ $member->foto ? asset($member->foto) : asset('/img/default-avatar.png') }}" alt="Profile"
                class="w-28 h-28 rounded-full border-4 border-blue-500 shadow-lg object-cover">

            <div class="flex-1 text-center md:text-left space-y-2">
                <h2 class="text-2xl font-bold text-gray-800">{{ $member->name }}</h2>

                <p class="text-sm text-gray-600">
                    ID Member:
                    <span class="font-medium">MBR{{ str_pad($member->id, 6, '0', STR_PAD_LEFT) }}</span>
                </p>

                <p class="text-sm text-gray-600">
                    Email:
                    <span class="font-medium text-black">{{ $member->email }}</span>
                </p>

                <div class="mt-4 flex justify-center md:justify-start gap-3">
                    <a href="{{ route('member.edit') }}"
                        class="inline-flex items-center gap-2 bg-blue-500 hover:bg-blue-600 text-white text-sm font-medium py-2 px-4 rounded-full shadow transition duration-300">
                        <i class="fas fa-user-edit"></i> Edit Profil
                    </a>

                    <form action="{{ route('member.logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="inline-flex items-center gap-2 bg-red-500 hover:bg-red-600 text-white text-sm font-medium py-2 px-4 rounded-full shadow transition duration-300">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </div>
            </div>

            <div
                class="text-sm px-4 py-2 bg-gradient-to-r from-yellow-300 to-yellow-400 text-yellow-900 font-semibold rounded-full shadow-sm">
                🏆 Member Level: <span class="text-yellow-800">Gold</span>
            </div>
        </div>

        <!-- Menu Cards -->
        <div class="max-w-5xl mx-auto mt-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Card 1 - Buat Pemesanan -->
            <div
                class="bg-white rounded-2xl shadow-md p-6 hover:-translate-y-1 hover:shadow-lg transition duration-300 ease-in-out">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-xl font-semibold text-gray-800">Buat Pemesanan</h3>
                    <i class="fas fa-camera text-purple-500 text-lg"></i>
                </div>
                <p class="text-sm text-gray-600">Pesan paket foto langsung dari akun member Anda.</p>
                <a href="{{ route('member.pilihpaket') }}"
                    class="inline-block mt-4 text-blue-600 hover:underline text-sm">
                    Pilih Paket
                </a>
            </div>

            <!-- Card 2 - Riwayat Pemesanan -->
            <div
                class="bg-white rounded-2xl shadow-md p-6 hover:-translate-y-1 hover:shadow-lg transition duration-300 ease-in-out">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-xl font-semibold text-gray-800">Riwayat Pemesanan</h3>
                    <i class="fas fa-clock text-blue-500 text-lg"></i>
                </div>
                <p class="text-sm text-gray-600">Lihat semua aktivitas pemesanan Anda sebelumnya.</p>
                <a href="#" class="inline-block mt-4 text-blue-600 hover:underline text-sm">Lihat Detail</a>
            </div>

            <!-- Card 3 - Poin Member -->
            <div
                class="bg-white rounded-2xl shadow-md p-6 hover:-translate-y-1 hover:shadow-lg transition duration-300 ease-in-out">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-xl font-semibold text-gray-800">Poin Member</h3>
                    <i class="fas fa-star text-yellow-400 text-lg"></i>
                </div>
                <p class="text-sm text-gray-600">Poin saat ini: <span class="font-bold text-gray-900">120</span></p>
                <a href="#" class="inline-block mt-4 text-blue-600 hover:underline text-sm">Cek Penukaran</a>
            </div>

            <!-- Card 4 - Voucher & Bonus -->
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
