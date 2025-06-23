<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Snapstures Studio - Pilihan Pemesanan</title>
</head>

<body>
    <header class="sticky top-0 left-0 right-0 z-50 bg-neutral-400 shadow-md shadow-neutral-500">
        <x-navbar></x-navbar>
        <x-mobile-menu></x-mobile-menu>
    </header>

    <section class="bg-gradient-to-t from-neutral-200 to-neutral-100 min-h-screen py-20 px-4">
        <div class="max-w-3xl mx-auto bg-gradient-to-t from-fuchsia-500 to-indigo-500 rounded-2xl p-10 shadow-2xl">

            <h2 class="text-center text-2xl text-white font-bold mb-8">
                Lanjutkan Pemesanan
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Sudah jadi member -->
                <div class="rounded-2xl bg-white/80 p-6 shadow-xl border border-white/30 backdrop-blur-md">
                    <h3 class="text-xl font-bold text-black mb-4">
                        <i class="fa-solid fa-user-lock text-blue-500 mr-2"></i>
                        Sudah Jadi Member
                    </h3>
                    <p class="text-gray-700 text-sm mb-6">Jika kamu sudah memiliki akun, silakan login untuk
                        melanjutkan.</p>
                    <a href="{{ route('member.login') }}">
                        <button
                            class="w-full py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-xl font-semibold transition">
                            Login Member
                        </button>
                    </a>
                </div>

                <!-- Belum daftar member -->
                <div class="rounded-2xl bg-white/80 p-6 shadow-xl border border-white/30 backdrop-blur-md">
                    <h3 class="text-xl font-bold text-black mb-4">
                        <i class="fa-solid fa-user-plus text-green-600 mr-2"></i>
                        Belum Jadi Member?
                    </h3>
                    <p class="text-gray-700 text-sm mb-6">Daftar jadi member dan dapatkan penawaran khusus!</p>
                    <a href="{{ route('member.register') }}">
                        <button
                            class="w-full py-2 bg-green-600 hover:bg-green-700 text-white rounded-xl font-semibold transition">
                            Daftar Sekarang
                        </button>
                    </a>
                </div>
            </div>

            <div class="mt-10 text-center">
                <p class="text-white mb-4">Atau lanjutkan tanpa menjadi member:</p>
                <a href="{{ route('formpesanan', $slug) }}">
                    <button
                        class="px-6 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-xl font-medium transition">
                        Lanjut Tanpa Member
                    </button>
                </a>
            </div>
        </div>
    </section>

    <x-footer></x-footer>
</body>

</html>
