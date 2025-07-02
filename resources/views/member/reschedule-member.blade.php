<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Reschedule Jadwal</title>
</head>

<body class="bg-gradient-to-tr from-gray-100 to-gray-300 min-h-screen font-inter">
    <header class="sticky top-0 z-50 bg-neutral-400 shadow-md shadow-neutral-500">
        <x-navbar />
        <x-mobile-menu />
    </header>

    <main class="max-w-xl mx-auto mt-12 p-6 bg-white shadow-xl rounded-2xl">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Reschedule Pemesanan</h2>

        <form action="{{ route('member.reschedule.submit', $pemesanan->id) }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal Baru</label>
                <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', $tanggal) }}"
                    min="{{ now()->toDateString() }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    required>
                @error('tanggal')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Jam Baru</label>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                    @foreach ($slots as $slot)
                        @if ($slot['status'] === 'available')
                            <label class="block">
                                <input type="radio" name="waktu" value="{{ $slot['jam'] }}"
                                    {{ old('waktu', $pemesanan->waktu) == $slot['jam'] ? 'checked' : '' }}
                                    class="hidden peer">
                                <div
                                    class="cursor-pointer peer-checked:bg-blue-600 peer-checked:text-white bg-green-500 text-white text-center py-2 rounded-xl transition">
                                    {{ $slot['jam'] }}
                                </div>
                            </label>
                        @else
                            <div
                                class="bg-red-500 text-white text-center py-2 rounded-xl opacity-60 cursor-not-allowed">
                                {{ $slot['jam'] }}
                            </div>
                        @endif
                    @endforeach
                </div>

                @error('waktu')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="text-center">
                <button type="submit"
                    class="inline-block bg-blue-600 text-white px-5 py-2 rounded-full hover:bg-blue-700 transition">
                    Kirim Permintaan Reschedule
                </button>
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('member.riwayat') }}" class="text-sm text-gray-600 hover:underline">← Kembali ke
                    Riwayat</a>
            </div>
        </form>
    </main>

    <x-footer />
</body>

</html>
