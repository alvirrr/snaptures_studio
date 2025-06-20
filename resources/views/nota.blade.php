<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Nota Transaksi - Snaptures Studio</title>

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

    <!-- Header -->
    <header class="sticky top-0 z-50 bg-neutral-400 shadow-md shadow-neutral-500 no-print">
        <x-navbar></x-navbar>
        <x-mobile-menu></x-mobile-menu>
    </header>

    <!-- Nota Transaksi -->
    <section class="py-16 px-4">
        <div id="invoice" class="max-w-lg mx-auto bg-white p-8 rounded-xl shadow-lg border border-gray-300">
            <h2 class="text-2xl font-bold text-center text-blue-700 mb-6 border-b pb-3">
                Nota Transaksi Pesanan
            </h2>

            <div class="space-y-2 text-sm">
                <p><strong>ID Pesanan:</strong> <span id="orderId"></span></p>
                <p><strong>Nama:</strong> {{ $data['nama'] }}</p>
                <p><strong>No. HP:</strong> {{ $data['no_hp'] }}</p>
                <p><strong>Paket:</strong> {{ $data['paket'] }}</p>
                <p><strong>Tanggal Booking:</strong> {{ $data['tanggal'] }}</p>
                <p><strong>Jam:</strong> {{ $data['waktu'] }} WIB</p>
                <p><strong>Total Bayar:</strong> <span class="font-semibold text-lg text-green-700">Rp 100.000</span>
                </p>
            </div>

            <div class="text-center mt-8">
                <p class="text-sm text-gray-600">Silahkan melakukan pembayran ke rekening <strong>BRI : 6298 0105 0917
                        535 AN ACHMAD AGUNG ALFIANTO</strong></p>
                <p class="text-sm text-gray-600">kirim bukti pembayaran ke menu <a
                        href="pembayaran"></a><strong>Pembayran</strong></p>
                <p class="text-sm text-gray-600">Terima kasih telah memesan di <strong>Snaptures Studio</strong>!</p>
            </div>

            <!-- Tombol Cetak -->
            <div class="mt-6 text-center no-print">
                <button onclick="window.print()"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-full text-sm font-medium shadow-md transition">
                    <i class="fa fa-print mr-2"></i> Cetak Nota
                </button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <x-footer class="no-print"></x-footer>

    <!-- Script: Generate Order ID -->
    <script>
        const now = new Date();
        const orderId =
            `SNAPS${now.getFullYear()}${String(now.getMonth() + 1).padStart(2, '0')}${String(now.getDate()).padStart(2, '0')}${String(now.getHours()).padStart(2, '0')}${String(now.getMinutes()).padStart(2, '0')}${String(now.getSeconds()).padStart(2, '0')}`;
        document.getElementById("orderId").innerText = orderId;
    </script>

</body>

</html>
