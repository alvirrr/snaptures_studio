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
        {{-- <h3 class="text-center mb-1 sm:text-3xl md:text-3xl lg:text-4xl tracking-tight font-semibold text-black">
            Snaptures Studio</h3> --}}
        <div class="gap-16 items-center py-5 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
            <div class="font-light text-black sm:text-lg">
                <h3
                    class="text-shadow-md text-shadow-white mb-4 sm:text-3xl md:text-3xl lg:text-5xl tracking-tight font-extrabold text-black">
                    Snapstures Studio</h3>
                <p class="text-justify">Snaptures Studio merupakan sebuah studio fotografi yang hadir dengan semangat
                    dan dedikasi tinggi untuk mengabadikan setiap momen berharga dalam hidup Anda. Kami percaya bahwa
                    fotografi bukan hanya tentang menangkap gambar semata, tetapi lebih dari itu—ia adalah sarana untuk
                    menceritakan kisah, menyimpan kenangan, serta menyampaikan emosi yang tak lekang oleh waktu. Setiap
                    hasil jepretan adalah representasi dari keindahan dan makna di balik setiap detik yang terlewati.
                </p>
                <p class="text-justify">Kami berkomitmen untuk memberikan layanan yang profesional namun tetap hangat
                    dan bersahabat, karena kami memahami bahwa kenyamanan klien adalah kunci dalam menciptakan hasil
                    foto yang alami dan memuaskan. Dengan pendekatan yang personal, kami menjalin komunikasi terbuka
                    dengan setiap klien agar proses pemotretan berlangsung menyenangkan dan sesuai harapan.
                </p class="text-justify">
                <p>Snaptures Studio mengedepankan kualitas dalam setiap aspek layanan. Kami menggunakan peralatan
                    fotografi modern dan teknologi terbaru untuk memastikan hasil foto memiliki detail tajam,
                    pencahayaan sempurna, dan komposisi yang estetis.</p>
                <a href="home">
                    <button
                        class="ml-1 mt-7 border-0 border-white bg-blue-500 hover:bg-blue-600 text-white px-4 py-1 text-sm rounded">back</button>
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
