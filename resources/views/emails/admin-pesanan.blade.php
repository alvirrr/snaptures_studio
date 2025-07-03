<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Notifikasi Pemesanan</title>
</head>

<body>
    <h2>Pemesanan Baru oleh Member</h2>
    <p><strong>Nama:</strong> {{ $pemesanan->member->name }}</p>
    <p><strong>Email:</strong> {{ $pemesanan->member->email }}</p>
    <p><strong>Kode Transaksi:</strong> {{ $pemesanan->kode_transaksi }}</p>
    <p><strong>Paket:</strong> {{ $pemesanan->paket->nama }}</p>
    <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($pemesanan->tanggal)->format('d M Y') }}</p>
    <p><strong>Waktu:</strong> {{ $pemesanan->waktu }}</p>
    <p><strong>Total Bayar:</strong> Rp {{ number_format($pemesanan->total_bayar, 0, ',', '.') }}</p>

    <p>Silakan cek dashboard admin untuk detail lebih lanjut.</p>
</body>

</html>
