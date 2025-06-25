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

    <section class="bg-linear-to-t from-neutral-200 to-neutral-100">
        <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
            <div class="font-light text-black sm:text-lg">
                <h2
                    class="text-shadow-md text-shadow-white mb-4 sm:text-3xl md:text-3xl lg:text-5xl tracking-tight font-extrabold text-black">
                    Snapstures Studio</h2>
                <p class="text-justify">Snaptures Studio adalah studio fotografi yang berdiri dengan semangat untuk
                    mengabadikan setiap momen berharga dengan sentuhan profesional dan penuh makna. Kami percaya bahwa
                    setiap foto bukan hanya sekadar gambar, tapi juga cerita, kenangan, dan emosi yang abadi.</p>
                <p class="text-justify">Snaptures Studio berkomitmen memberikan layanan ramah, hasil fotografi
                    berkualitas tinggi, dan harga yang kompetitif untuk semua kalangan. Dengan dukungan peralatan modern
                    dan tim yang berpengalaman, kami siap melayani berbagai kebutuhan fotografi—mulai dari sesi
                    personal, keluarga, prewedding, produk, hingga acara khusus.
                    Kami juga menghargai setiap ide dan konsep dari klien, guna mewujudkan karya yang sesuai dengan visi
                    dan karakter unik masing-masing.
                </p>
            </div>
            <div class="grid grid-cols-2 gap-4 mt-8">
                <img class="w-full rounded-lg shadow-black shadow-md" src="{{ asset('img/s4.jpg') }}"
                    alt="office content 1">
                <img class="mt-4 w-full lg:mt-10 rounded-lg shadow-black shadow-md" src="{{ asset('img/s6.jpg') }}"
                    alt="office content 2">
            </div>
        </div>
    </section>

    <section class="py-16 bg-gradient-to-b from-white to-neutral-100">
        <h2 class="text-shadow-md text-3xl md:text-3xl font-extrabold text-center text-gray-800 mb-12">
            Visi dan Misi</h2>
        <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-10 px-4">
            <!-- Visi -->
            <div
                class="bg-white p-8 rounded-3xl shadow-xl border border-neutral-300 hover:shadow-2xl transition-all duration-300">
                <h3 class="text-2xl font-semibold text-gray-800 text-center mb-4">Visi</h3>
                <p class="text-gray-600 text-justify text-md leading-relaxed">
                    Menciptakan momen dengan media fotografi yang mengutamakan layanan, pelayanan, dan kualitas.
                </p>
                <div class="mt-6 text-center">
                    <a href="visi">
                        <button
                            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-full text-sm transition duration-300">
                            Selengkapnya
                        </button>
                    </a>
                </div>
            </div>

            <!-- Misi -->
            <div
                class="bg-white p-8 rounded-3xl shadow-xl border border-gray-200 hover:shadow-2xl transition-all duration-300">
                <h3 class="text-2xl font-semibold text-gray-800 text-center mb-4">Misi</h3>
                <ol class="text-gray-600 text-md text-justify list-decimal pl-4">
                    <li>
                        Memberikan Layanan, Pelayanan dan Kualitas maksimal dengan harga terjangkau pada
                        masyarakat
                    </li>
                    <li>Meningkatkan sarana dan prasarana sesuai perkembangan
                    </li>
                    <li>Memberikan kebebasan untuk menciptakan moment
                    </li>
                </ol>
                <div class="mt-6 text-center">
                    <a href="misi">
                        <button
                            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-full text-sm transition duration-300">
                            Selengkapnya
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <x-gallery :items="$portofolios" />
    <x-properti></x-properti>
    <x-background></x-background>
    <x-maps></x-maps>


    <x-footer></x-footer>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>
