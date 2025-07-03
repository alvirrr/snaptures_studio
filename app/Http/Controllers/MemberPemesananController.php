<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\PointLog;
use App\Models\Paket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Mail\AdminRescheduleRequestMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\MemberOrderSuccessMail;
use App\Mail\AdminOrderNotificationMail;


class MemberPemesananController extends Controller
{
    // Menampilkan semua paket
    public function pilihPaket()
    {
        $pakets = Paket::all();
        return view('member.pilih-paket', compact('pakets'));
    }

    // Menampilkan form pemesanan untuk member
    public function formPemesanan($id)
    {
        $paket = Paket::findOrFail($id);
        $member = Auth::guard('member')->user();
        return view('member.form-pemesanan', compact('paket', 'member'));
    }

    // Menyimpan data pemesanan
    public function store(Request $request)
    {
        $request->validate([
            'paket_id'    => 'required|exists:pakets,id',
            'no_hp'       => 'required|string|max:15',
            'tanggal'     => 'required|date|after_or_equal:' . now()->toDateString(),
            'waktu'       => 'required',
            'background'  => 'required|string',
            'jumlah_orang' => 'required|integer|min:1|max:7',
            'pembayaran'  => 'required|in:dp,lunas',
        ]);

        $paket = Paket::findOrFail($request->paket_id);

        $tambahan_orang = max(0, $request->jumlah_orang - 2);
        $biaya_tambahan_orang = $tambahan_orang * 15000;

        $tambahan_spotlight = $request->has('tambahan_spotlight') ? true : false;
        $biaya_spotlight = $tambahan_spotlight ? 15000 : 0;

        $total_harga = $paket->harga + $biaya_tambahan_orang + $biaya_spotlight;
        $total_bayar = $request->pembayaran === 'dp' ? 50000 : $total_harga;

        $kode_transaksi = 'SNAPMB-' . strtoupper(Str::random(8));

        $pemesanan = Pemesanan::create([
            'kode_transaksi'     => $kode_transaksi,
            'member_id'          => Auth::guard('member')->id(),
            'paket_id'           => $request->paket_id,
            'no_hp'              => $request->no_hp,
            'tanggal'            => $request->tanggal,
            'waktu'              => $request->waktu,
            'background'         => $request->background,
            'jumlah_orang'       => $request->jumlah_orang,
            'tambahan_orang'     => $tambahan_orang,
            'tambahan_spotlight' => $tambahan_spotlight,
            'pembayaran'         => $request->pembayaran,
            'total_bayar'        => $total_bayar,
            'status'             => 'pending',
        ]);

        // Kirim email konfirmasi ke member
        // Kirim email ke member
        Mail::to($pemesanan->member->email)->send(new MemberOrderSuccessMail($pemesanan));

        // Kirim notifikasi ke admin
        Mail::to(env('ADMIN_EMAIL'))->send(new AdminOrderNotificationMail($pemesanan));



        if ($request->pembayaran === 'lunas') {
            $member = $pemesanan->member;
            $member->poin += 10;
            $member->save();

            PointLog::create([
                'member_id' => $member->id,
                'poin' => 10,
                'tipe' => 'tambah',
                'keterangan' => 'Bonus poin dari pemesanan lunas (ID: ' . $pemesanan->id . ')',
            ]);
        }


        return redirect()->route('member.pesanan.nota', $pemesanan->id)
            ->with('success', 'Pemesanan berhasil dibuat!');
    }

    // Menampilkan halaman nota pemesanan
    public function showNota($id)
    {
        $pemesanan = Pemesanan::with(['paket', 'member'])->findOrFail($id);

        if ($pemesanan->member_id !== Auth::guard('member')->id()) {
            abort(403);
        }

        return view('member.nota-member', compact('pemesanan'));
    }

    public function downloadNota($id)
    {
        // Ambil data pemesanan beserta relasi
        $pemesanan = Pemesanan::with(['paket', 'member'])->findOrFail($id);

        // Validasi: hanya member terkait yang boleh akses
        if ($pemesanan->member_id !== Auth::guard('member')->id()) {
            abort(403, 'Anda tidak memiliki akses ke nota ini.');
        }

        // Cek apakah kode_transaksi tersedia, fallback ke ID jika tidak
        $kode = $pemesanan->kode_transaksi ?? 'SNAPMB-' . $pemesanan->id;

        // Render PDF dari blade
        $pdf = Pdf::loadView('member.nota-pdf-member', compact('pemesanan'));

        // Download dengan nama file sesuai kode transaksi
        return $pdf->download('nota-pesanan-' . $kode . '.pdf');
    }

    public function riwayat()
    {
        $member = Auth::guard('member')->user();
        $pemesanans = Pemesanan::where('member_id', $member->id)->latest()->get();

        return view('member.riwayat', compact('pemesanans'));
    }

    public function formReschedule($id)
    {
        $pemesanan = Pemesanan::where('id', $id)
            ->where('member_id', Auth::guard('member')->id())
            ->firstOrFail();

        $tanggal = request('tanggal', $pemesanan->tanggal);

        // Generate slot 08:00 - 20:00, interval 30 menit
        $start = \Carbon\Carbon::createFromTime(8, 0);
        $end = \Carbon\Carbon::createFromTime(19, 30);
        $slots = [];

        while ($start <= $end) {
            $jam = $start->format('H:i');

            $bentrok = Pemesanan::where('tanggal', $tanggal)
                ->where('waktu', $jam)
                ->where('id', '!=', $pemesanan->id)
                ->whereIn('status', ['Pending', 'Confirmed'])
                ->exists();

            $slots[] = [
                'jam' => $jam,
                'status' => $bentrok ? 'booked' : 'available'
            ];

            $start->addMinutes(30);
        }

        return view('member.reschedule-member', compact('pemesanan', 'slots', 'tanggal'));
    }

    public function submitReschedule(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date|after_or_equal:today',
            'waktu'   => 'required|date_format:H:i',
        ]);

        $pemesanan = Pemesanan::where('id', $id)
            ->where('member_id', Auth::guard('member')->id())
            ->firstOrFail();

        // Cek jadwal bentrok
        $bentrok = Pemesanan::where('tanggal', $request->tanggal)
            ->where('waktu', $request->waktu)
            ->where('id', '!=', $pemesanan->id)
            ->whereIn('status', ['Pending', 'Confirmed'])
            ->exists();

        if ($bentrok) {
            return back()->withErrors(['waktu' => 'Jadwal ini sudah dibooking. Silakan pilih jam lain.'])->withInput();
        }

        // Simpan sebagai permintaan reschedule
        $pemesanan->reschedule_tanggal = $request->tanggal;
        $pemesanan->reschedule_waktu = $request->waktu;
        $pemesanan->reschedule_status = 'Pending';
        $pemesanan->save();


        Mail::to(env('ADMIN_EMAIL'))->send(new AdminRescheduleRequestMail($pemesanan));


        return redirect()->route('member.riwayat')->with('success', 'Permintaan reschedule berhasil dikirim. Menunggu persetujuan admin.');
    }

    public function riwayatPoin()
    {
        $member = Auth::guard('member')->user();

        // Ambil semua riwayat poin untuk member ini
        $riwayatPoin = \App\Models\PointLog::where('member_id', $member->id)
            ->orderBy('created_at', 'desc')
            ->get();

        // Ambil total poin (dari tabel members)
        $totalPoin = $member->poin;

        return view('member.riwayat-point', compact('riwayatPoin', 'totalPoin'));
    }
}
