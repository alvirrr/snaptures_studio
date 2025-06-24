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
    <title>Form Pemesanan Member | Snapstures Studio</title>
</head>

<body class="bg-gradient-to-tr from-gray-100 to-gray-300 min-h-screen font-inter">
    <header class="sticky top-0 z-50 bg-neutral-400 shadow-md shadow-neutral-500">
        <x-navbar />
        <x-mobile-menu />
    </header>

    @php
        $member = Auth::guard('member')->user();
    @endphp

    <section class="py-16">
        <div class="max-w-2xl mx-auto px-6 bg-white rounded-2xl shadow-xl p-8 space-y-6">
            <h2 class="text-3xl font-bold text-center text-gray-800">Form Pemesanan Member</h2>

            {{-- Flash Message --}}
            @if (session('success'))
                <div class="p-3 bg-green-100 text-green-800 rounded-md text-center">{{ session('success') }}</div>
            @endif

            {{-- Error Validation --}}
            @if ($errors->any())
                <div class="p-4 bg-red-100 text-red-800 rounded text-sm">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('member.pesanan.store') }}" method="POST" class="space-y-6">
                @csrf

                {{-- Info Member --}}
                <div class="bg-gray-100 border border-gray-300 p-4 rounded-lg space-y-1 text-sm text-gray-700">
                    <p><strong>Nama:</strong> {{ $member->name }}</p>
                    <p><strong>Email:</strong> {{ $member->email }}</p>
                    <p><strong>ID Member:</strong> MBR{{ str_pad($member->id, 6, '0', STR_PAD_LEFT) }}</p>
                    <p><strong>No WhatsApp:</strong> {{ $member->wa ?? '-' }}</p>
                </div>
                <input type="hidden" name="member_id" value="{{ $member->id }}">
                <input type="hidden" name="no_hp" value="{{ $member->wa }}">

                {{-- Informasi Paket --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama Paket</label>
                        <input type="text" value="{{ $paket->nama }}" disabled
                            class="w-full mt-1 px-4 py-2 border border-gray-300 bg-gray-100 rounded-lg" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Harga</label>
                        <input type="text" value="Rp {{ number_format($paket->harga, 0, ',', '.') }}" disabled
                            class="w-full mt-1 px-4 py-2 border border-gray-300 bg-gray-100 rounded-lg" />
                    </div>
                </div>
                <input type="hidden" name="paket_id" value="{{ $paket->id }}">

                {{-- Tanggal & Waktu --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal Booking</label>
                        <input type="date" id="tanggal" name="tanggal" value="{{ old('tanggal') }}" required
                            min="{{ date('Y-m-d') }}"
                            class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-400">
                        @error('tanggal')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="waktu" class="block text-sm font-medium text-gray-700">Waktu</label>
                        <select id="waktu" name="waktu" required
                            class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-400">
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
                </div>

                {{-- Metode Pembayaran --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Metode Pembayaran</label>
                    <div class="flex flex-col gap-2">
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="pembayaran" value="dp" required
                                class="text-blue-600 focus:ring-blue-500 border-gray-300"
                                {{ old('pembayaran') == 'dp' ? 'checked' : '' }}>
                            <span>Bayar DP Rp 50.000</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="pembayaran" value="lunas"
                                class="text-blue-600 focus:ring-blue-500 border-gray-300"
                                {{ old('pembayaran') == 'lunas' ? 'checked' : '' }}>
                            <span>Bayar Lunas Rp {{ number_format($paket->harga, 0, ',', '.') }}</span>
                        </label>
                    </div>
                    @error('pembayaran')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Tombol --}}
                <div class="text-center pt-4">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg transition-all duration-200">
                        Kirim Pesanan
                    </button>
                </div>
            </form>
        </div>
    </section>

    <x-footer />
</body>

</html>
