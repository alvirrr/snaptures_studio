<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Voucher & Bonus Member | Snapstures Studio</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-tr from-gray-100 to-gray-300 min-h-screen font-inter">
    <div class="max-w-5xl mx-auto py-10 px-4">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Voucher & Bonus</h2>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="bg-red-100 text-red-800 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <div class="text-right text-sm text-gray-700 mb-4">
            Total Poin Anda: <span class="font-bold text-yellow-600">{{ $member->poin }}</span>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
            @forelse($vouchers as $voucher)
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <h3 class="text-lg font-semibold text-gray-800">{{ $voucher->kode }}</h3>
                    <p class="text-sm text-gray-600 mb-2">{{ $voucher->deskripsi }}</p>
                    <p class="text-sm text-gray-800 mb-4">Poin dibutuhkan: <span
                            class="font-bold">{{ $voucher->poin_dibutuhkan }}</span></p>

                    <form action="{{ route('member.voucher.tukar', $voucher->id) }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold py-2 px-4 rounded transition">
                            Tukar Sekarang
                        </button>
                    </form>
                </div>
            @empty
                <p class="text-gray-600 col-span-3 text-center">Tidak ada voucher tersedia saat ini.</p>
            @endforelse
        </div>

        <h4 class="text-xl font-bold text-gray-700 mb-4">Voucher yang Sudah Ditukar</h4>
        <div class="bg-white p-4 rounded shadow">
            @forelse ($vouchersDitukar as $v)
                <div class="flex justify-between items-center border-b py-2 text-sm text-gray-700">
                    <div>
                        <span class="font-semibold">{{ $v->kode }}</span> - {{ $v->pivot->status }}
                    </div>
                    <div>{{ \Carbon\Carbon::parse($v->pivot->ditukar_pada)->format('d M Y') }}</div>
                </div>
            @empty
                <p class="text-gray-600 text-sm">Belum ada voucher yang ditukar.</p>
            @endforelse
        </div>

        <div class="mt-6 text-center">
            <a href="{{ route('member.dashboard') }}" class="text-blue-600 hover:underline text-sm">← Kembali ke
                Dashboard</a>
        </div>
    </div>
</body>

</html>
