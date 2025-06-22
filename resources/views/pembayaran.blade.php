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
    <title>Konfirmasi Pembayaran - Snapstures Studio</title>
</head>

<body>
    <header class="sticky top-0 left-0 right-0 z-50 bg-neutral-400 shadow-md shadow-neutral-500">
        <x-navbar></x-navbar>
        <x-mobile-menu></x-mobile-menu>
    </header>

    <section class="min-h-screen bg-gradient-to-t from-neutral-300 to-neutral-500 py-16 px-4">
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-lg">
            <h2 class="text-center text-2xl font-bold mb-6 text-gray-800">Konfirmasi Pembayaran</h2>

            {{-- Alert Success --}}
            @if (session('success'))
                <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Alert Error --}}
            @if ($errors->any())
                <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('pembayaran.store') }}" method="POST" enctype="multipart/form-data"
                class="space-y-5">
                @csrf

                <!-- Nama -->
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" />
                </div>

                <!-- Nomor Id Pesanan -->
                <div>
                    <label for="invoice" class="block text-sm font-medium text-gray-700">Nomor ID Pesanan
                        Booking</label>
                    <input type="text" id="invoice" name="invoice" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" />
                </div>

                <!-- Bank Pengirim -->
                <div>
                    <label for="bank" class="block text-sm font-medium text-gray-700">Bank Pengirim</label>
                    <input type="text" id="bank" name="bank" placeholder="Contoh: BCA A/N Firman" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" />
                </div>

                <!-- Jumlah Pembayaran -->
                <div>
                    <label for="jumlah" class="block text-sm font-medium text-gray-700">Jumlah Pembayaran</label>
                    <input type="number" id="jumlah" name="jumlah" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" />
                </div>

                <!-- Upload Bukti -->
                <div>
                    <label for="bukti" class="block text-sm font-medium text-gray-700">Upload Bukti Transfer</label>
                    <input type="file" id="bukti" name="bukti" accept="image/*,application/pdf" required
                        class="border border-gray-300 shadow-sm rounded-md mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2
                            file:rounded file:border-0 file:text-sm file:font-semibold
                            file:bg-neutral-300 file:text-blue-500 hover:file:bg-blue-200" />
                </div>

                <!-- Tombol Submit -->
                <div class="pt-4">
                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md">
                        Kirim Konfirmasi
                    </button>
                </div>
            </form>
        </div>
    </section>

    <x-footer></x-footer>
</body>

</html>
