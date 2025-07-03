<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
</head>

<body style="font-family: Arial, sans-serif; color: #333;">
    <h2>Terima kasih, {{ $pesanan->nama }}!</h2>

    <p>Pemesanan Anda dengan ID <strong>{{ $pesanan->id_pesanan }}</strong> telah berhasil dilakukan.</p>

    <p><strong>Detail Pemesanan:</strong></p>
    <ul>
        <li>Paket: {{ $pesanan->paket->nama ?? '-' }}</li>
        <li>Tanggal: {{ \Carbon\Carbon::parse($pesanan->tanggal)->format('d M Y') }}</li>
        <li>Waktu: {{ $pesanan->waktu }} WIB</li>
        <li>Total: Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</li>
    </ul>

    <p>Silakan melakukan pembayaran melalui QRIS atau transfer bank dan upload bukti pembayaran di halaman:</p>
    <p><a href="{{ route('pembayaran') }}">Halaman Pembayaran Snapstures Studio</a></p>

    <p>Terima kasih telah menggunakan layanan Snapstures Studio!</p>
</body>

</html>
