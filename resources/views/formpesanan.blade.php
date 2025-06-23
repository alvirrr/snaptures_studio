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
    <title>Form Pemesanan | Snapstures Studio</title>
</head>

<body>
    <header class="sticky top-0 left-0 right-0 z-50 bg-neutral-400 shadow-md shadow-neutral-500">
        <x-navbar></x-navbar>
        <x-mobile-menu></x-mobile-menu>
    </header>

    <section class="py-20 bg-gradient-to-t from-neutral-300 to-neutral-500">
        <div class="max-w-xl mx-auto px-6 bg-white shadow-xl rounded-2xl p-8">
            <h2 class="text-2xl font-bold text-center text-black mb-6">Form Pemesanan</h2>

            {{-- Flash success message (optional) --}}
            @if (session('success'))
                <div class="mb-4 p-3 bg-green-200 text-green-800 rounded">{{ session('success') }}</div>
            @endif

            <form action="{{ route('pesanan.submit') }}" method="POST" class="space-y-4">
                @csrf

                {{-- Nama Lengkap --}}
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required
                        class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-400">
                    @error('nama')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Nomor HP / WhatsApp --}}
                <div>
                    <label for="no_hp" class="block text-sm font-medium text-gray-700">Nomor HP / WhatsApp</label>
                    <input type="tel" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" required
                        class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-400">
                    @error('no_hp')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Informasi Paket (disabled) --}}
                <!-- Nama Paket -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nama Paket</label>
                    <input type="text" value="{{ $paket->nama }}" disabled
                        class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100" />
                </div>


                <!-- Harga -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Harga</label>
                    <input type="text" value="Rp {{ number_format($paket->harga, 0, ',', '.') }}" disabled
                        class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100" />
                </div>

                <!-- Input tersembunyi untuk dikirim -->
                <input type="hidden" name="paket_id" value="{{ $paket->id }}">


                {{-- Tanggal Booking --}}
                <div>
                    <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
                    <input type="date" id="tanggal" name="tanggal" value="{{ old('tanggal') }}" required
                        min="{{ date('Y-m-d') }}"
                        class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-400">
                    @error('tanggal')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Waktu --}}
                <div>
                    <label for="waktu" class="block text-sm font-medium text-gray-700">Waktu</label>
                    <select id="waktu" name="waktu" required
                        class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-400">
                        <option value="" disabled selected>Pilih Jam</option>
                        @foreach (range(8, 19) as $jam)
                            @php $slot = sprintf('%02d:00', $jam); @endphp
                            <option value="{{ $slot }}" {{ old('waktu') == $slot ? 'selected' : '' }}>
                                {{ $slot }} - {{ sprintf('%02d:00', $jam + 1) }}
                            </option>
                        @endforeach
                    </select>
                    @error('waktu')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Pilihan Pembayaran --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Metode Pembayaran</label>
                    <div class="space-y-2">
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="pembayaran" value="dp" required
                                {{ old('pembayaran') == 'dp' ? 'checked' : '' }}
                                class="text-blue-600 focus:ring-blue-500 border-gray-300">
                            <span>Bayar DP Rp 50.000</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="pembayaran" value="lunas"
                                {{ old('pembayaran') == 'lunas' ? 'checked' : '' }}
                                class="text-blue-600 focus:ring-blue-500 border-gray-300">
                            <span>Bayar Lunas Rp {{ number_format($paket->harga, 0, ',', '.') }}</span>
                        </label>
                    </div>
                    @error('pembayaran')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Tombol Submit --}}
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
