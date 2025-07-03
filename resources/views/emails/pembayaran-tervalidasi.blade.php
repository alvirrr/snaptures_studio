<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pembayaran Tervalidasi</title>
</head>
<body>
    <h2>Halo {{ $pemesanan->member->nama ?? $pemesanan->nama }},</h2>

    <p>Pembayaran Anda dengan kode transaksi <strong>{{ $pemesanan->kode_transaksi }}</strong> telah berhasil divalidasi oleh admin Snapstures Studio.</p>

    <p>Jadwal pemotretan Anda: <br>
    <strong>{{ \Carbon\Carbon::parse($pemesanan->tanggal)->format('d M Y') }}</strong> pukul <strong>{{ $pemesanan->waktu }}</strong></p>

    <p>Terima kasih telah menggunakan layanan kami.</p>

    <p>Salam,<br>Snapstures Studio</p>
</body>
</html>
