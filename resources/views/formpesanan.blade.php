<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form Pemesanan | Snapstures Studio</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-neutral-200 text-gray-800">

    <header class="sticky top-0 z-50 bg-neutral-400 shadow-md">
        <x-navbar />
        <x-mobile-menu />
    </header>

    <section class="py-20 bg-gradient-to-t from-neutral-300 to-neutral-500">
        <div class="max-w-xl mx-auto px-6 bg-white shadow-xl rounded-2xl p-8">
            <h2 class="text-2xl font-bold text-center text-black mb-6">Form Pemesanan</h2>

            @if (session('success'))
                <div class="mb-4 p-3 bg-green-200 text-green-800 rounded">{{ session('success') }}</div>
            @endif

            <form action="{{ route('pesanan.submit') }}" method="POST" class="space-y-4">
                @csrf

                {{-- Nama --}}
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama" required
                        class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg">
                </div>

                {{-- No HP --}}
                <div>
                    <label for="no_hp" class="block text-sm font-medium text-gray-700">No HP / WhatsApp</label>
                    <input type="tel" id="no_hp" name="no_hp" required
                        class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg">
                </div>

                {{-- email --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" />
                </div>

                {{-- Nama Paket --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nama Paket</label>
                    <input type="text" value="{{ $paket->nama }}" disabled
                        class="mt-1 w-full px-4 py-2 border border-gray-300 bg-gray-100 rounded-lg">
                    <input type="hidden" name="paket_id" value="{{ $paket->id }}">
                </div>

                {{-- Harga Paket --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">Harga</label>
                    <input type="text" value="Rp {{ number_format($paket->harga, 0, ',', '.') }}" disabled
                        class="mt-1 w-full px-4 py-2 border border-gray-300 bg-gray-100 rounded-lg">
                </div>

                {{-- Tanggal --}}
                <div>
                    <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
                    <input type="date" id="tanggal" name="tanggal" required min="{{ date('Y-m-d') }}"
                        class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg">
                </div>

                {{-- Waktu --}}
                <div>
                    <label for="waktu" class="block text-sm font-medium text-gray-700">Waktu</label>
                    <select id="waktu" name="waktu" required
                        class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg">
                        <option value="">Pilih tanggal dulu</option>
                    </select>
                </div>

                {{-- Background --}}
                <div>
                    <label for="background" class="block text-sm font-medium text-gray-700">Background</label>
                    <select name="background" id="background" required
                        class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg">
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
                        value="2" required class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg">
                    <p class="text-sm text-gray-500 mt-1">
                        Termasuk 2 orang, tambahan Rp 15.000 per orang.
                    </p>
                </div>

                {{-- Orang Tambahan (readonly) --}}
                <div>
                    <label for="tambahan_orang" class="block text-sm font-medium text-gray-700">
                        Orang Tambahan
                    </label>
                    <input type="number" id="tambahan_orang" readonly
                        class="mt-1 w-full px-4 py-2 border border-gray-300 bg-gray-100 rounded-lg">
                </div>

                {{-- Tambahan Spotlight --}}
                <div>
                    <label class="flex items-center space-x-2 mt-2">
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

                {{-- Estimasi Harga --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">Total Estimasi Biaya</label>
                    <input type="text" id="total_harga" readonly
                        class="mt-1 w-full px-4 py-2 border bg-gray-100 rounded-lg font-semibold">
                </div>

                <div class="text-center">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-6 py-2 rounded-lg">
                        Kirim Pesanan
                    </button>
                </div>
            </form>
        </div>
    </section>

    <x-footer />

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

            // Ambil slot booking sesuai tanggal
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
                                `${slot.jam} - ${parseInt(slot.jam) + 1}:00${slot.status === 'booked' ? ' (Terisi)' : ''}`;
                            opt.disabled = slot.status === 'booked';
                            waktuSelect.appendChild(opt);
                        });
                    });
            });

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

            hitungTotal(); // jalankan awal
        });
    </script>
</body>

</html>
