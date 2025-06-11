<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- @vite('resources/css/app.css') --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    {{-- <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Snapstures Studio</title>
</head>

<body>
    <header class="sticky top-0 left-0 right-0 z-50 bg-neutral-400 shadow-md shadow-neutral-500">
        <x-navbar></x-navbar>
        <!-- Mobile menu -->
        <x-mobile-menu></x-mobile-menu>
    </header>
    {{-- <div class="isolate bg-white px-6 py-7 sm:py-32 lg:px-8">
        <div class="bg-neutral-400 px-5 py-7 rounded-md">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-4xl font-semibold tracking-tight text-balance text-gray-900 sm:text-5xl">Konfirmasi Pembayaran
                </h2>
                <p class="mt-2 text-lg/8 text-gray-600">Silahkan Tranfers ke No rekening 830xxxxxxxxx, dan Upload bukti pembayarannya dalam form berikut :
                </p>
            </div>
            <form action="#" method="POST" class="mx-auto mt-5 max-w-xl sm:mt-20">
                <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                    <div>
                        <label for="first-name" class="block text-sm/6 font-semibold text-gray-900">Nama Depan</label>
                        <div class="mt-2.5">
                            <input type="text" name="first-name" id="first-name" autocomplete="given-name"
                                class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
                        </div>
                    </div>
                    <div>
                        <label for="last-name" class="block text-sm/6 font-semibold text-gray-900">Nama Belakang</label>
                        <div class="mt-2.5">
                            <input type="text" name="last-name" id="last-name" autocomplete="family-name"
                                class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="company" class="block text-sm/6 font-semibold text-gray-900">Alamat</label>
                        <div class="mt-2.5">
                            <input type="text" name="company" id="company" autocomplete="organization"
                                class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="email" class="block text-sm/6 font-semibold text-gray-900">Email</label>
                        <div class="mt-2.5">
                            <input type="email" name="email" id="email" autocomplete="email"
                                class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="phone-number" class="block text-sm/6 font-semibold text-gray-900">Whatsapp</label>
                        <div class="mt-2.5">
                            <div
                                class="flex rounded-md bg-white outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                                <div class="grid shrink-0 grid-cols-1 focus-within:relative">
                                    <select id="country" name="country" autocomplete="country" aria-label="Country"
                                        class="col-start-1 row-start-1 w-full appearance-none rounded-md py-2 pr-7 pl-3.5 text-base text-gray-500 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                        <option>US</option>
                                        <option>ID</option>
                                        <option>EU</option>
                                    </select>
                                    <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4"
                                        viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                                        <path fill-rule="evenodd"
                                            d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" name="phone-number" id="phone-number"
                                    class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                                    placeholder="123-456-7890">
                            </div>
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="message" class="block text-sm/6 font-semibold text-gray-900">Message</label>
                        <div class="mt-2.5">
                            <textarea name="message" id="message" rows="4"
                                class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600"></textarea>
                        </div>
                    </div>
                </div>
                <div class="mt-5 mb-8">
                    <button type="submit"
                        class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Kirim</button>
                </div>
            </form>
        </div>

    </div> --}}
    {{-- <section class="p-6 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-lg p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Validasi Pembayaran</h2>

            <!-- Daftar pembayaran -->
            <div class="space-y-4">
                <!-- Item pembayaran -->
                <div class="flex items-center justify-between p-4 border rounded-lg shadow-sm bg-gray-100">
                    <div>
                        <h4 class="text-lg font-semibold text-gray-800">Paket Studio A</h4>
                        <p class="text-sm text-gray-600">Nama: Nabila Salsabila</p>
                        <p class="text-sm text-gray-600">Tanggal: 10 Mei 2025</p>
                        <p class="text-sm text-gray-600">Total: Rp150.000</p>
                    </div>
                    <div class="flex space-x-2">
                        <button
                            class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm">Setujui</button>
                        <button
                            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm">Tolak</button>
                    </div>
                </div>

                <!-- Tambah item lainnya sesuai data -->
            </div>
        </div>
    </section> --}}

    <section class="min-h-screen bg-linear-to-t from-neutral-300 to-neutral-500 py-15 px-4">
        {{-- <h2 class="text-center text-black font-bold">Konfirmasi Pembayaran</h2> --}}
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-lg">
            <h2 class="text-center text-2xl font-bold mb-6 text-gray-800">Konfirmasi Pembayaran</h2>

            <form action="/konfirmasi-pembayaran" method="POST" enctype="multipart/form-data" class="space-y-5">
                <!-- Nama -->
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" />
                </div>

                <!-- Nomor Id Pesanan -->
                <div>
                    <label for="invoice" class="block text-sm font-medium text-gray-700">Nomor ID Pesanan
                        Booking</label>
                    <input type="text" id="invoice" name="invoice" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" />
                </div>

                <!-- Bank Pengirim -->
                <div>
                    <label for="bank" class="block text-sm font-medium text-gray-700">Bank Pengirim</label>
                    <input type="text" id="bank" name="bank" placeholder="Contoh: BCA A/N Firman" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" />
                </div>
                <!-- Jumlah Pembayaran -->
                <div>
                    <label for="jumlah" class="block text-sm font-medium text-gray-700">Jumlah Pembayaran</label>
                    <input type="number" id="jumlah" name="jumlah" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" />
                </div>
                <!-- Upload Bukti -->
                <div>
                    <label for="bukti" class="block text-sm font-medium text-gray-700">Upload Bukti Transfer</label>
                    <input type="file" id="bukti" name="bukti" accept="image/*,application/pdf" required
                        class="border border-gray-300 shadow-sm rounded-md mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2
                            file:rounded file:border-0 file:text-sm file:font-semibold
                            file:bg-neutral-300 file:text-blue-500 hover:file:bg-blue-200" />
                </div>

                <!-- Tombol Submit -->
                <div class="pt-4">
                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md">
                        Kirim Konfirmasi
                    </button>
                </div>
            </form>
        </div>
    </section>

    <x-footer></x-footer>
</body>

</html>
