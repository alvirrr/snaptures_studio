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
    <title>Snaptures Studio</title>
</head>

<body>
    <header class="sticky top-0 left-0 right-0 z-50 bg-neutral-400 shadow-md shadow-neutral-500">
        <x-navbar></x-navbar>
        <!-- Mobile menu -->
        <x-mobile-menu></x-mobile-menu>
    </header>

    <section class="py-16 bg-gradient-to-b from-white to-neutral-100">
        <h3 class="text-center mb-1 sm:text-3xl md:text-3xl lg:text-4xl tracking-tight font-semibold text-black">
            Visi Snaptures Studio</h3>
        <div class="gap-16 items-center py-5 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
            <div class="font-light text-black sm:text-lg">
                <p class="mb-4 text-justify"><strong>"Menciptakan moment dengan media photography yang mengutamakan
                        layanan,
                        pelayanan, dan
                        kualitas"</strong><br>
                    Visi ini mencerminkan komitmen untuk menangkap setiap momen berharga melalui media fotografi dengan
                    pendekatan yang mengedepankan kenyamanan dan kepuasan klien. Fokus utama adalah memberikan layanan
                    yang profesional, pelayanan yang ramah dan responsif, serta hasil foto dengan kualitas terbaik.
                    Tujuannya adalah menciptakan pengalaman yang menyenangkan dan hasil yang tak terlupakan bagi setiap
                    pelanggan.</p>
                <a href="tentang">
                    <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-1 text-sm rounded">back</button>
                </a>
            </div>
            <div class="grid grid-cols-2 gap-4 mt-8">
                <img class="w-full rounded-lg shadow-black shadow-md" src="/img/s4.jpg" alt="office content 1">
                <img class="mt-4 w-full lg:mt-10 rounded-lg shadow-black shadow-md" src="/img/s6.jpg"
                    alt="office content 2">
            </div>
        </div>
    </section>



    <x-footer></x-footer>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>
