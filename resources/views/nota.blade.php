<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nota Transaksi - Snapstures Studio</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        @media print {
            body * {
                visibility: hidden;
            }

            #invoice,
            #invoice * {
                visibility: visible;
            }

            #invoice {
                position: absolute;
                left: 0;
                top: 0;
                width: 14.8cm;
                height: 21cm;
                padding: 1.5cm;
                box-shadow: none;
                border: none;
                background: white;
            }

            .no-print {
                display: none !important;
            }
        }
    </style>
</head>

<body class="bg-neutral-200 text-gray-800 font-sans">

    <header class="sticky top-0 z-50 bg-neutral-400 shadow-md no-print">
        <x-navbar />
        <x-mobile-menu />
    </header>

    @php
        $data = session('nota_data');
    @endphp

    <section class="py-16 px-4">
        <div id="invoice" class="max-w-lg mx-auto bg-white p-8 rounded-xl shadow-lg border border-gray-300">
            <h2 class="text-2xl font-bold text-center text-blue-700 mb-6 border-b pb-3">
                Nota Transaksi Pesanan
            </h2>

            <div class="space-y-1 text-sm leading-relaxed">
                <p><strong>ID Pesanan:</strong> {{ $data['id_pesanan'] ?? '-' }}</p>
                <p><strong>Nama:</strong> {{ $data['nama'] ?? '-' }}</p>
                <p><strong>No. HP:</strong> {{ $data['no_hp'] ?? '-' }}</p>
                <p><strong>Paket:</strong> {{ $data['paket'] ?? '-' }}</p>
                <p><strong>Harga Paket:</strong> Rp {{ number_format($data['harga_paket'] ?? 0, 0, ',', '.') }}</p>
                <p><strong>Background:</strong> {{ ucfirst($data['background'] ?? '-') }}</p>
                <p><strong>Jumlah Orang:</strong> {{ $data['jumlah_orang'] ?? '2' }}</p>

                @if (!empty($data['tambahan_orang']) && $data['tambahan_orang'] > 0)
                    <p><strong>Tambahan Orang:</strong> {{ $data['tambahan_orang'] }} x Rp 15.000</p>
                @endif

                @if (!empty($data['tambahan_spotlight']))
                    <p><strong>Tambahan Spotlight:</strong> Ya (Rp 15.000)</p>
                @endif

                <p><strong>Tanggal Booking:</strong> {{ $data['tanggal'] ?? '-' }}</p>
                <p><strong>Jam:</strong> {{ $data['waktu'] ?? '-' }} WIB</p>
                <p><strong>Metode Pembayaran:</strong>
                    {{ ($data['pembayaran'] ?? '') === 'dp' ? 'DP (Rp 50.000)' : 'Lunas' }}
                </p>

                <p><strong>Total Bayar:</strong>
                    <span class="font-semibold text-lg text-green-700">
                        Rp {{ number_format($data['total_bayar'] ?? 0, 0, ',', '.') }}
                    </span>
                </p>
            </div>

            {{-- QRIS --}}
            <div class="mt-3 text-center">
                <p class="text-xs text-gray-500 mb-1">Scan QRIS berikut untuk pembayaran langsung</p>
                <img src="{{ asset('storage/qris/QRIS.jpg') }}" alt="QRIS Snapstures" class="w-24 mx-auto">
                <p class="text-xs text-gray-500 mt-1">Atau transfer ke rekening:</p>
                <p class="text-xs text-gray-500 mt-1"><strong>BRI: 6298 0105 0917 535</strong><br>AN: ACHMAD AGUNG
                    ALFIANTO</p>
                <p class="text-xs text-gray-500 mt-1">Upload bukti pembayaran di halaman
                    <a href="{{ route('pembayaran') }}" class="text-blue-600 underline font-semibold">Pembayaran</a>
                </p>
                <p class="text-xs text-gray-500 mt-1">Terima kasih telah memesan di <strong>Snapstures Studio</strong>!
                </p>
            </div>

            {{-- <div class="text-center mt-8 space-y-2 text-sm text-gray-600">
            </div> --}}

            {{-- Tombol --}}
            <div class="mt-6 text-center no-print space-x-3">
                <button onclick="window.print()"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-full text-sm font-medium shadow-md transition">
                    <i class="fa fa-print mr-2"></i> Cetak Nota
                </button>

                <a href="{{ route('nota.download') }}"
                    class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-full text-sm font-medium shadow-md transition">
                    <i class="fa fa-download mr-2"></i> Unduh PDF
                </a>
            </div>
        </div>
    </section>

    <x-footer class="no-print" />

</body>

</html>
