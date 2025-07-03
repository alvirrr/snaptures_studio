<h2>Permintaan Reschedule Baru</h2>

<p>Member <strong>{{ $pemesanan->member->name }}</strong> mengajukan permintaan reschedule.</p>

<ul>
    <li><strong>Kode Transaksi:</strong> {{ $pemesanan->kode_transaksi }}</li>
    <li><strong>Tanggal Lama:</strong> {{ $pemesanan->tanggal }}</li>
    <li><strong>Waktu Lama:</strong> {{ $pemesanan->waktu }}</li>
    <li><strong>Tanggal Baru:</strong> {{ $pemesanan->reschedule_tanggal }}</li>
    <li><strong>Waktu Baru:</strong> {{ $pemesanan->reschedule_waktu }}</li>
</ul>

<p>Segera buka dashboard admin untuk konfirmasi perubahan jadwal.</p>
