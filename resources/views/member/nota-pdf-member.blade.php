<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Nota Transaksi Member - Snapstures Studio</title>
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
        use Carbon\Carbon;
    @endphp

    <div class="nota-container">
        <h2>Nota Transaksi Member</h2>

        <div class="info">
            <p><strong>ID Pesanan:</strong> {{ $pemesanan->kode_transaksi ?? '-' }}</p>
            <p><strong>Nama:</strong> {{ $pemesanan->member->name ?? '-' }}</p>
            <p><strong>Email:</strong> {{ $pemesanan->member->email ?? '-' }}</p>
            <p><strong>No. HP:</strong> {{ $pemesanan->no_hp ?? '-' }}</p>
            <p><strong>Paket:</strong> {{ $pemesanan->paket->nama ?? '-' }}</p>
            <p><strong>Harga Paket:</strong> Rp {{ number_format($pemesanan->paket->harga ?? 0, 0, ',', '.') }}</p>
            <p><strong>Background:</strong> {{ ucfirst($pemesanan->background ?? '-') }}</p>
            <p><strong>Jumlah Orang:</strong> {{ $pemesanan->jumlah_orang ?? '2' }}</p>

            @if (!empty($pemesanan->tambahan_orang) && $pemesanan->tambahan_orang > 0)
                <p><strong>Tambahan Orang:</strong> {{ $pemesanan->tambahan_orang }} x Rp 15.000</p>
            @endif

            <p><strong>Tambahan Spotlight:</strong>
                {{ !empty($pemesanan->tambahan_spotlight) ? 'Ya (Rp 15.000)' : 'Tidak' }}
            </p>

            <p><strong>Tanggal Booking:</strong>
                {{ !empty($pemesanan->tanggal) ? Carbon::parse($pemesanan->tanggal)->format('d M Y') : '-' }}
            </p>
            <p><strong>Waktu:</strong> {{ $pemesanan->waktu ?? '-' }} WIB</p>

            <p><strong>Metode Pembayaran:</strong>
                {{ ($pemesanan->pembayaran ?? '') === 'dp' ? 'DP (Rp 50.000)' : 'Lunas' }}
            </p>

            <p class="total">
                <strong>Total Bayar:</strong> Rp {{ number_format($pemesanan->total_bayar ?? 0, 0, ',', '.') }}
            </p>
        </div>

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
