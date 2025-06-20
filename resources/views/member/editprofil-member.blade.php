<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil Member - Snapstures Studio</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-gradient-to-tr from-gray-100 to-gray-300 min-h-screen font-inter">
    <header class="sticky top-0 z-50 bg-neutral-400 shadow-md shadow-neutral-500">
        <x-navbar></x-navbar>
        <x-mobile-menu></x-mobile-menu>
    </header>

    <section class="py-12 px-4">
        <div class="max-w-xl mx-auto bg-white p-8 rounded-3xl shadow-2xl">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">📝 Edit Profil Member</h2>

            <form action="{{ route('member.update') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf

                {{-- Nama Lengkap --}}
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-600 mb-1">
                        <i class="fas fa-user mr-1 text-gray-500"></i> Nama Lengkap
                    </label>
                    <input type="text" name="name" id="name" value="{{ old('name', $member->name) }}"
                        required class="w-full px-4 py-2 border rounded-lg focus:ring focus:border-blue-400 shadow-sm">
                </div>

                {{-- Alamat --}}
                <div>
                    <label for="alamat" class="block text-sm font-semibold text-gray-600 mb-1">
                        <i class="fas fa-map-marker-alt mr-1 text-gray-500"></i> Alamat
                    </label>
                    <textarea name="alamat" id="alamat" rows="3" required
                        class="w-full px-4 py-2 border rounded-lg focus:ring focus:border-blue-400 shadow-sm">{{ old('alamat', $member->alamat) }}</textarea>
                </div>

                {{-- WhatsApp --}}
                <div>
                    <label for="wa" class="block text-sm font-semibold text-gray-600 mb-1">
                        <i class="fab fa-whatsapp mr-1 text-green-500"></i> Nomor WhatsApp
                    </label>
                    <input type="text" name="wa" id="wa" value="{{ old('wa', $member->wa) }}" required
                        class="w-full px-4 py-2 border rounded-lg focus:ring focus:border-blue-400 shadow-sm">
                </div>

                {{-- Foto Profil --}}
                <div>
                    <label for="foto" class="block text-sm font-semibold text-gray-600 mb-1">
                        <i class="fas fa-image mr-1 text-purple-500"></i> Foto Profil
                    </label>
                    <div class="flex items-center gap-4">
                        <label for="foto"
                            class="cursor-pointer inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg shadow hover:bg-blue-700 transition">
                            <i class="fas fa-upload mr-2"></i> Pilih File
                        </label>
                        <span id="nama-file"
                            class="text-sm text-gray-700 bg-white border border-gray-300 px-4 py-2 rounded-md shadow-sm">
                            Tidak ada file yang dipilih
                        </span>

                    </div>
                    <input type="file" name="foto" id="foto" accept="image/*" class="hidden"
                        onchange="document.getElementById('nama-file').innerText = this.files[0]?.name || 'Tidak ada file yang dipilih';">

                    @if ($member->foto)
                        <div class="mt-3 text-center">
                            <p class="text-xs text-gray-500 mb-1">Foto Saat Ini:</p>
                            <img src="{{ asset($member->foto) }}" alt="Foto Sekarang"
                                class="w-24 h-24 object-cover rounded-full border-2 border-gray-300 shadow mx-auto">
                        </div>
                    @endif
                </div>


                {{-- Tombol Simpan --}}
                <div class="text-center pt-2">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-6 py-2 rounded-xl shadow-md transition-all">
                        💾 Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </section>

    <x-footer></x-footer>
</body>

</html>
