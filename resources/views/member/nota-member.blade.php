<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nota Transaksi Member | Snapstures Studio</title>

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

            #nota,
            #nota * {
                visibility: visible;
            }

            #nota {
                position: absolute;
                left: 2%;
                top: 2%;
                width: 100%;
                margin: 2%;
                padding: 2%;
                box-shadow: none;
                border: none;
            }

            .no-print {
                display: none !important;
            }
        }
    </style>
</head>

<body class="bg-neutral-200 text-gray-800 font-sans">

    <header class="sticky top-0 z-50 bg-neutral-400 shadow-md shadow-neutral-500 no-print">
        <x-navbar />
        <x-mobile-menu />
    </header>

    <section class="py-16 px-4">
        <div id="nota" class="max-w-xl mx-auto bg-white p-8 rounded-xl shadow-lg border border-gray-300">

            <h2 class="text-2xl font-bold text-center text-blue-700 mb-6 border-b pb-3">
                Nota Pemesanan Member
            </h2>

            <div class="space-y-2 text-sm">
                <p><strong>Kode Transaksi:</strong> {{ $pemesanan->kode_transaksi }}</p>
                <p><strong>Nama Member:</strong> {{ $pemesanan->member->name }}</p>
                <p><strong>Email:</strong> {{ $pemesanan->member->email }}</p>
                <p><strong>No. HP:</strong> {{ $pemesanan->no_hp }}</p>
                <p><strong>Paket:</strong> {{ $pemesanan->paket->nama }}</p>
                <p><strong>Tanggal Booking:</strong> {{ \Carbon\Carbon::parse($pemesanan->tanggal)->format('d M Y') }}
                </p>
                <p><strong>Waktu Booking:</strong> {{ $pemesanan->waktu }} WIB</p>
                <p><strong>Background:</strong> {{ ucfirst($pemesanan->background) }}</p>
                <p><strong>Jumlah Orang:</strong> {{ $pemesanan->jumlah_orang }}
                    @if ($pemesanan->jumlah_orang > 2)
                        (Tambahan {{ $pemesanan->jumlah_orang - 2 }} orang)
                    @endif
                </p>
                <p><strong>Tambahan Spotlight:</strong>
                    {{ $pemesanan->tambahan_spotlight ? 'Ya (Rp 15.000)' : 'Tidak' }}
                </p>

                <p><strong>Metode Pembayaran:</strong>
                    {{ $pemesanan->pembayaran === 'dp' ? 'DP (Rp 50.000)' : 'Lunas' }}
                </p>

                <p><strong>Total Bayar:</strong>
                    <span class="font-semibold text-lg text-green-700">
                        Rp {{ number_format($pemesanan->total_bayar, 0, ',', '.') }}
                    </span>
                </p>

                <p><strong>Status:</strong> <span class="capitalize">{{ $pemesanan->status }}</span></p>

                <p><strong>Waktu Checkout:</strong>
                    {{ \Carbon\Carbon::parse($pemesanan->created_at)->format('d M Y H:i') }} WIB
                </p>
            </div>

            <div class="text-center mt-8 space-y-2 text-sm text-gray-600">
                <p>Silakan lakukan pembayaran ke rekening:</p>
                <p><strong>BRI : 6298 0105 0917 535</strong><br>AN: ACHMAD AGUNG ALFIANTO</p>
                <p>Upload bukti pembayaran melalui halaman <a href="{{ route('pembayaran') }}"
                        class="text-blue-600 underline font-semibold">Pembayaran</a></p>
                <p>Terima kasih telah memesan di <strong>Snapstures Studio</strong>!</p>
            </div>

            <div class="mt-6 text-center no-print">
                <button onclick="window.print()"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-full text-sm font-medium shadow-md transition">
                    <i class="fa fa-print mr-2"></i> Cetak Nota
                </button>
            </div>
        </div>
    </section>

    <x-footer class="no-print" />
</body>

</html>
