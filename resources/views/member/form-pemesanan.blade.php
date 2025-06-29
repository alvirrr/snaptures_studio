<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form Pemesanan Member | Snapstures Studio</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
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

            @if (session('success'))
                <div class="p-3 bg-green-100 text-green-800 rounded-md text-center">{{ session('success') }}</div>
            @endif

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

                {{-- Paket --}}
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

                {{-- Tanggal & Jam --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal Booking</label>
                        <input type="date" id="tanggal" name="tanggal" value="{{ old('tanggal') }}" required
                            min="{{ date('Y-m-d') }}" class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg">
                    </div>

                    <div>
                        <label for="waktu" class="block text-sm font-medium text-gray-700">Waktu</label>
                        <select id="waktu" name="waktu" required
                            class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg">
                            <option value="">Pilih Tanggal Terlebih Dahulu</option>
                        </select>
                    </div>
                </div>

                {{-- Background --}}
                <div>
                    <label for="background" class="block text-sm font-medium text-gray-700">Background</label>
                    <select name="background" id="background" required
                        class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg">
                        <option value="">-- Pilih Background --</option>
                        <option value="putih">Putih</option>
                        <option value="hitam">Hitam</option>
                        <option value="abu-abu">Abu-abu</option>
                        <option value="cream">Cream</option>
                        <option value="pink">Pink</option>
                    </select>
                </div>

                {{-- Jumlah Orang --}}
                <div>
                    <label for="jumlah_orang" class="block text-sm font-medium text-gray-700">Jumlah Orang</label>
                    <input type="number" id="jumlah_orang" name="jumlah_orang" min="1" max="7"
                        value="2" required class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg">
                    <p class="text-sm text-gray-500 mt-1">
                        Termasuk 2 orang, tambahan Rp 15.000 per orang.
                    </p>
                </div>

                {{-- Orang Tambahan --}}
                <div>
                    <label for="tambahan_orang" class="block text-sm font-medium text-gray-700">
                        Orang Tambahan
                    </label>
                    <input type="number" id="tambahan_orang" readonly
                        class="mt-1 w-full px-4 py-2 border border-gray-300 bg-gray-100 rounded-lg">
                </div>

                {{-- Tambahan Spotlight --}}
                <div>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="tambahan_spotlight" id="tambahan_spotlight" value="1"
                            class="text-blue-600 border-gray-300">
                        <span>Tambahan Spotlight (Rp 15.000)</span>
                    </label>
                </div>

                {{-- Metode Pembayaran --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Metode Pembayaran</label>
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="pembayaran" value="dp" required
                            class="text-blue-600 border-gray-300">
                        <span>Bayar DP Rp 50.000</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="pembayaran" value="lunas" class="text-blue-600 border-gray-300">
                        <span>Bayar Lunas</span>
                    </label>
                </div>

                {{-- Total Biaya --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">Total Estimasi Biaya</label>
                    <input type="text" id="total_harga" readonly
                        class="mt-1 w-full px-4 py-2 border bg-gray-100 rounded-lg font-semibold">
                </div>

                {{-- Submit --}}
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

    {{-- Script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tanggalInput = document.querySelector('#tanggal');
            const waktuSelect = document.querySelector('#waktu');
            const jumlahOrang = document.querySelector('#jumlah_orang');
            const tambahanOrang = document.querySelector('#tambahan_orang');
            const tambahanSpotlight = document.querySelector('#tambahan_spotlight');
            const totalHargaInput = document.querySelector('#total_harga');

            const hargaPaket = {{ $paket->harga }};
            const biayaPerOrangTambahan = 15000;
            const biayaSpotlight = 15000;

            // Ambil waktu booking dari controller
            tanggalInput.addEventListener('change', function() {
                waktuSelect.innerHTML = '<option value="">Memuat...</option>';
                fetch(`/cek-jam/${this.value}`)
                    .then(res => res.json())
                    .then(data => {
                        waktuSelect.innerHTML = '';
                        data.forEach(slot => {
                            const opt = document.createElement('option');
                            opt.value = slot.jam;
                            opt.textContent =
                                `${slot.jam} ${slot.status === 'booked' ? '(Terisi)' : ''}`;
                            opt.disabled = slot.status === 'booked';
                            waktuSelect.appendChild(opt);
                        });
                    });
            });

            // Hitung total biaya
            function hitungTotal() {
                let total = hargaPaket;
                const jumlah = parseInt(jumlahOrang.value) || 1;
                const tambahan = Math.max(0, jumlah - 2);

                tambahanOrang.value = tambahan;
                total += tambahan * biayaPerOrangTambahan;

                if (tambahanSpotlight.checked) {
                    total += biayaSpotlight;
                }

                totalHargaInput.value = 'Rp ' + total.toLocaleString('id-ID');
            }

            jumlahOrang.addEventListener('input', hitungTotal);
            tambahanSpotlight.addEventListener('change', hitungTotal);

            hitungTotal(); // inisialisasi
        });
    </script>
</body>

</html>
