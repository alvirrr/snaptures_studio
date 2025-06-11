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
    <section class="py-20 bg-linear-to-t from-neutral-300 to-neutral-500">
        <div class="max-w-xl mx-auto px-6 bg-white shadow-xl rounded-2xl p-8">
            <h2 class="text-2xl font-bold text-center text-black mb-6">Form Pemesanan</h2>

            <form action="{{ route('pesanan.submit') }}" method="POST" class="space-y-4">
                @csrf
                <!-- Nama -->
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama" required
                        class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-400">
                </div>

                <!-- Nomor HP -->
                <div>
                    <label for="no_hp" class="block text-sm font-medium text-gray-700">Nomor HP / WhatsApp</label>
                    <input type="tel" id="no_hp" name="no_hp" required
                        class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-400">
                </div>

                <!-- Pilih Paket -->
                <div>
                    <label for="paket" class="block text-sm font-medium text-gray-700">Pilih Paket</label>
                    <select id="paket" name="paket"
                        class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-400">

                        <!-- Self Photo -->
                        <optgroup label="Self Photo">
                            <option value="Self Photo - Paket 1">Paket 1 - Rp 60.000</option>
                            <option value="Self Photo - Paket 2">Paket 2 - Rp 100.000</option>
                            <option value="Self Photo - Paket 3">Paket 3 - Rp 180.000</option>
                        </optgroup>

                        <!-- Photo Studio -->
                        <optgroup label="Photo Studio">
                            <option value="Photo Studio - Package 1">Package 1 - Rp 200.000</option>
                            <option value="Photo Studio - Package 2">Package 2 - Rp 300.000</option>
                            <option value="Photo Studio - Package 3">Package 3 - Rp 500.000</option>
                        </optgroup>

                        <!-- Pas Photo -->
                        <optgroup label="Pas Photo">
                            <option value="Paket Foto">Paket Foto - Rp 20.000</option>
                            <option value="Paket Cetak">Paket Cetak - Rp 5.000</option>
                        </optgroup>

                    </select>
                </div>


                <!-- Tanggal Booking -->
                <div>
                    <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
                    <input type="date" id="tanggal" name="tanggal" required
                        class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-400">
                </div>

                <script>
                    // Set tanggal minimum ke hari ini secara real-time
                    document.addEventListener('DOMContentLoaded', function() {
                        const tanggalInput = document.getElementById('tanggal');
                        const today = new Date();
                        const year = today.getFullYear();
                        const month = String(today.getMonth() + 1).padStart(2, '0');
                        const day = String(today.getDate()).padStart(2, '0');
                        const minDate = `${year}-${month}-${day}`;
                        tanggalInput.min = minDate;
                    });
                </script>
                <!-- Jam -->
                <div>
                    <label for="waktu" class="block text-sm font-medium text-gray-700">Waktu</label>
                    <select id="waktu" name="waktu" required
                        class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-400">
                        <option value="" disabled selected>Pilih Jam</option>
                        <option value="08:00">08:00 - 09:00</option>
                        <option value="09:00">09:00 - 10:00</option>
                        <option value="10:00">10:00 - 11:00</option>
                        <option value="11:00">11:00 - 12:00</option>
                        <option value="12:00">12:00 - 13:00</option>
                        <option value="13:00">13:00 - 14:00</option>
                        <option value="14:00">14:00 - 15:00</option>
                        <option value="15:00">15:00 - 16:00</option>
                        <option value="16:00">16:00 - 17:00</option>
                        <option value="17:00">17:00 - 18:00</option>
                        <option value="18:00">18:00 - 19:00</option>
                        <option value="19:00">19:00 - 20:00</option>
                    </select>
                </div>

                <!-- Tombol Submit -->
                <div class="text-center">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-6 py-2 rounded-lg transition">
                        Kirim Pesanan
                    </button>
                </div>

            </form>

        </div>
    </section>

    <x-footer></x-footer>
</body>

</html>
