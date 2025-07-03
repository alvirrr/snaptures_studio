<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Konfirmasi Pemesanan</title>
</head>
<body>
    <h2>Halo {{ $pemesanan->member->name }},</h2>
    <p>Terima kasih telah melakukan pemesanan di Snapstures Studio.</p>

    <p>Berikut detail pemesanan Anda:</p>
    <ul>
        <li><strong>Kode Transaksi:</strong> {{ $pemesanan->kode_transaksi }}</li>
        <li><strong>Paket:</strong> {{ $pemesanan->paket->nama }}</li>
        <li><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($pemesanan->tanggal)->format('d M Y') }}</li>
        <li><strong>Waktu:</strong> {{ $pemesanan->waktu }}</li>
        <li><strong>Total Bayar:</strong> Rp {{ number_format($pemesanan->total_bayar, 0, ',', '.') }}</li>
        <li><strong>Status:</strong> {{ ucfirst($pemesanan->status) }}</li>
    </ul>

    <p>Silakan unggah bukti pembayaran melalui halaman pembayaran kami.</p>

    <p>Salam,<br>Snapstures Studio</p>
</body>
</html>
