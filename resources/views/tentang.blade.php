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
    <!-- Hero Section -->
    {{-- <section class="bg-gray-100 py-20">
        <div class="container mx-auto px-6 flex flex-col md:flex-row items-center justify-between">
            <div class="w-full md:w-1/2 text-center md:text-left">
                <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">
                    Abadikan Momenmu di <br>
                    <span class="text-green-600">Snaptures Studio</span>
                </h1>
                <div class="space-x-4">
                    <a href="#paket"
                        class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-3 rounded-full">Lihat
                        Paket</a>
                    <a href="#"
                        class="bg-white border border-green-600 hover:bg-green-50 text-green-600 font-semibold px-6 py-3 rounded-full">Pesan
                        Sekarang</a>
                </div>
            </div>
            <div class="w-full md:w-1/2 mt-10 md:mt-0">
                <img src="/img/foto1.jpg" alt="Hero Image" class="rounded-xl shadow-xl">
            </div>
        </div>
    </section> --}}

    {{-- <section class="bg-white dark:bg-neutral-200">
        <h2 class="text-2xl text-center md:text-4xl font-bold text-black py-6">Tentang Kami</h2>
        </p>
        <div class="grid max-w-screen-xl px-4 py-5 mx-auto lg:gap-8 xl:gap-0 lg:py-10 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h2
                    class="max-w-2xl mb-2 text-xs font-bold tracking-tight leading-none md:text-5xl xl:text-5xl dark:text-black">
                    Snapstures Studio</h2>
                <p
                    class="max-w-2xl mb-6 font-light text-black lg:mb-8 md:text-lg lg:text-xl dark:text-black text-justify">
                    Snapstures Studio merupakan Lorem
                    ipsum dolor sit amet consectetur adipisicing elit. Delectus rerum quasi consectetur aspernatur
                    pariatur ea architecto quisquam asperiores nobis quibusdam dolorem quidem a tempora odit debitis,
                    perspiciatis similique cupiditate quaerat.</p>
            </div>
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                <img src="/img/foto1.jpg" alt="mockup" class="rounded-xl shadow-xl">
            </div>
        </div>
    </section> --}}

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
                <img class="w-full rounded-lg shadow-black shadow-md" src="{{ asset('img/s4.jpg') }}" alt="office content 1">
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

    <x-gallery></x-gallery>
    <x-maps></x-maps>

    {{-- <section class="py-16 bg-white text-center">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold text-teal-700 mb-4">Tentang Kami</h2>
            <p class="text-gray-600 max-w-3xl mx-auto mb-12">
                WPU Course adalah sebuah platform pembelajaran digital yang dibuat untuk memudahkan kamu dalam belajar
                di bidang teknologi dan digital. Kami menyediakan berbagai macam course yang dapat membantu kamu dalam
                mengembangkan kemampuan dan keterampilan digital.
            </p>
            <div class="grid grid-cols-3 md:grid-cols-5 gap-6 items-center justify-center">
                <div class="flex justify-center">
                    <img src="/img/cam1.png" alt="Figma" class="w-12 h-12">
                </div>
                <div class="col-span-1">
                    <img src="/img/foto1.jpg" alt="Foto WPU 1" class="rounded-xl shadow-lg">
                </div>
                <div class="flex justify-center">
                    <img src="/img/cam1.png" alt="Figma" class="w-12 h-12">
                    <span class="text-5xl text-teal-600">&lt;/&gt;</span>
                </div>
                <div class="col-span-1">
                    <img src="/img/s1.jpg" alt="Foto WPU 2" class="rounded-xl shadow-lg">
                </div>
                <div class="flex justify-center">
                    <img src="/img/cam2.png" alt="JavaScript" class="w-12 h-12">
                </div>
                <div class="flex justify-center">
                    <img src="/img/cam2.png" alt="Laravel" class="w-12 h-12">
                </div>
                <div class="col-span-1">
                    <img src="/img/s1.jpg" alt="Foto WPU 3" class="rounded-xl shadow-lg">
                </div>
                <div class="flex justify-center">
                    <img src="/img/logoss.png" alt="Logo" class="w-24">
                </div>
                <div class="col-span-1">
                    <img src="/img/s1.jpg" alt="Foto WPU 4" class="rounded-xl shadow-lg">
                </div>
                <div class="flex justify-center">
                    <img src="/img/cam2.png" alt="React" class="w-12 h-12">
                </div>
            </div>
        </div>
    </section> --}}

    {{-- <section class="py-16 bg-white">
        <h2 class="text-2xl font-bold text-center mb-8">Mengapa Snaptures Studio</h2>

        <div class="flex flex-wrap justify-center gap-8 px-32">
            <!-- Card 1 -->
            <div class="w-100 sm:w-48 rounded-xl overflow-hidden shadow-md bg-gray-100">
                <img src="/img/s1.jpg" alt="Single Session" class="w-full object-cover">
            </div>

            <!-- Card 2 -->
            <div class="w-100 sm:w-48 rounded-xl overflow-hidden shadow-md bg-gray-100">
                <img src="/img/s1.jpg" alt="Single Session" class="w-full object-cover">
            </div>

            <!-- Card 3 -->
            <div class="w-100 sm:w-48 rounded-xl overflow-hidden shadow-md bg-gray-100">
                <img src="/img/s1.jpg" alt="Single Session" class="w-full object-cover">
            </div>

            <div class="w-100 sm:w-48 rounded-xl overflow-hidden shadow-md bg-gray-100">
                <img src="/img/s1.jpg" alt="Single Session" class="w-full object-cover">
            </div>

            <div class="w-100 sm:w-48 rounded-xl overflow-hidden shadow-md bg-gray-100">
                <img src="/img/s1.jpg" alt="Single Session" class="w-full object-cover">
            </div>

            <div class="w-100 sm:w-48 rounded-xl overflow-hidden shadow-md bg-gray-100">
                <img src="/img/s1.jpg" alt="Single Session" class="w-full object-cover">
            </div>


        </div>
    </section> --}}


    <x-footer></x-footer>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>
