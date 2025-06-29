<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Nota Transaksi - Snapstures Studio</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
            color: #333;
            margin: 30px;
        }

        .nota-container {
            max-width: 480px;
            margin: auto;
            border: 1px solid #ccc;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #1e3a8a;
            margin-bottom: 20px;
            font-size: 18px;
        }

        .info p {
            margin: 4px 0;
        }

        .info p strong {
            display: inline-block;
            width: 150px;
        }

        .total {
            font-weight: bold;
            font-size: 14px;
            color: #0f5132;
            margin-top: 10px;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 11px;
        }

        .bayar {
            text-align: center;
            margin-top: 20px;
        }

        .bayar img {
            width: 160px;
            height: auto;
        }

        .bayar p {
            font-size: 11px;
            color: #666;
            margin-top: 2px;
        }
    </style>
</head>

<body>
    @php
        $data = $data ?? session('nota_data');
        $total = number_format($data['total_bayar'] ?? 0, 0, ',', '.');
        $id = $data['id_pesanan'] ?? 'SNAPS-' . now()->format('YmdHis');
    @endphp

    <div class="nota-container">
        <h2>Nota Transaksi Pesanan</h2>

        <div class="info">
            <p><strong>ID Pesanan:</strong> {{ $id }}</p>
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

            <p class="total">
                <strong>Total Bayar:</strong> Rp {{ $total }}
            </p>
        </div>

        {{-- Gambar QRIS --}}
        <div class="bayar">
            <p>Scan QR berikut untuk pembayaran QRIS</p>
            <img src="{{ public_path('storage/qris/QRIS.jpg') }}" alt="QRIS Snapstures Studio">
            <p>BRI: 6298 0105 0917 535</p>
            <p>AN: ACHMAD AGUNG ARIFIANTO</p>
            <p>Terima kasih telah memesan di <strong>Snapstures Studio</strong></p>
        </div>
    </div>
</body>

</html>
