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
    <title>Snapstures Studio</title>
</head>

<body>
    <header class="sticky top-0 left-0 right-0 z-50 bg-neutral-400 shadow-md shadow-neutral-500">
        <x-navbar></x-navbar>
        <x-mobile-menu></x-mobile-menu>
    </header>

    <section class="bg-linear-to-t from-neutral-300 to-neutral-200 py-16 px-4">
        <div class="max-w-3xl mx-auto bg-white shadow-xl rounded-2xl p-10 border border-gray-200">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-4">Kontak Kami</h2>
            <p class="text-center text-gray-500 mb-10">Ada pertanyaan atau ingin kerja sama? Kirimkan pesanmu di sini,
                kami akan segera menghubungi kamu kembali!</p>

            {{-- Notifikasi sukses --}}
            @if (session('success'))
                <div class="mb-6 p-4 bg-green-100 text-green-800 rounded-xl shadow text-center font-medium">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Form Kontak --}}
            <form action="/kirim-kontak" method="POST" class="space-y-6">
                @csrf

                <!-- Nama -->
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama" required
                        class="w-full px-5 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none focus:border-blue-500 transition duration-300" />
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" id="email" name="email" required
                        class="w-full px-5 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none focus:border-blue-500 transition duration-300" />
                </div>

                <!-- Nomor WhatsApp -->
                <div>
                    <label for="whatsapp" class="block text-sm font-medium text-gray-700 mb-1">Nomor WhatsApp</label>
                    <input type="tel" id="whatsapp" name="whatsapp" required
                        pattern="^(\+62|62|0)8[1-9][0-9]{6,9}$"
                        title="Masukkan nomor HP yang valid, contoh: 081234567890"
                        oninput="this.value = this.value.replace(/[^0-9+]/g, '')"
                        class="w-full px-5 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none focus:border-blue-500 transition duration-300"
                        placeholder="Contoh: 081234567890" />
                </div>

                <!-- Subjek -->
                <div>
                    <label for="subjek" class="block text-sm font-medium text-gray-700 mb-1">Subjek</label>
                    <input type="text" id="subjek" name="subjek"
                        class="w-full px-5 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none focus:border-blue-500 transition duration-300" />
                </div>

                <!-- Pesan -->
                <div>
                    <label for="pesan" class="block text-sm font-medium text-gray-700 mb-1">Pesan</label>
                    <textarea id="pesan" name="pesan" rows="5" required
                        class="w-full px-5 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none focus:border-blue-500 transition duration-300 resize-none"></textarea>
                </div>

                <!-- Tombol -->
                <div>
                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-xl shadow-md transition duration-300">
                        Kirim Pesan
                    </button>
                </div>
            </form>

            <!-- Kontak Lain -->
            <div class="mt-10 text-center">
                <p class="text-gray-600 mb-4">Atau hubungi kami melalui:</p>
                <div class="flex justify-center space-x-6">
                    <a href="mailto:mantappum@gmail.com" class="text-amber-500 hover:text-amber-600 text-2xl"
                        target="_blank">
                        <i class="fa-solid fa-envelope"></i></a>
                    <a href="https://wa.me/6283870730186" target="_blank"
                        class="text-green-500 hover:text-green-600 text-2xl">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <a href="https://www.instagram.com/snapturesstudio" target="_blank"
                        class="text-pink-500 hover:text-pink-600 text-2xl">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://tiktok.com/@snapturesstudio.id" target="_blank"
                        class="text-black hover:text-gray-800 text-2xl">
                        <i class="fab fa-tiktok"></i>
                    </a>
                    {{-- <a href="https://facebook.com/username" target="_blank"
                        class="text-blue-600 hover:text-blue-700 text-2xl">
                        <i class="fab fa-facebook"></i>
                    </a> --}}
                </div>
            </div>
        </div>
    </section>

    <x-footer></x-footer>
</body>

</html>
