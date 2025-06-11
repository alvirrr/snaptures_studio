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

    <section class="py-16 bg-gradient-to-b from-white to-neutral-100">
        <h3 class="text-center mb-1 sm:text-3xl md:text-3xl lg:text-4xl tracking-tight font-semibold text-black">
            Misi Snaptures Studio</h3>
        <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
            <div class="font-light text-black sm:text-lg">
                <ol class="text-justify list-decimal pl-4">
                    <li>
                        <strong>Memberikan Layanan, Pelayanan dan Kualitas maksimal dengan harga terjangkau pada
                            masyarakat : </strong>Kami berkomitmen untuk memberikan hasil fotografi terbaik dengan
                        pelayanan yang profesional dan ramah, tanpa mengorbankan keterjangkauan harga. Tujuannya adalah
                        agar semua lapisan masyarakat bisa menikmati layanan berkualitas tanpa terbebani secara
                        finansial.
                    </li>
                    <li><strong>Meningkatkan sarana dan prasarana sesuai perkembangan : </strong>
                        Kami terus mengikuti perkembangan teknologi dan tren dalam dunia fotografi, dengan memperbarui
                        peralatan serta meningkatkan fasilitas demi mendukung hasil karya yang lebih maksimal dan
                        memuaskan.
                    </li>
                    <li><strong>Memberikan kebebasan untuk menciptakan moment : </strong>
                        Kami memberikan ruang bagi pelanggan untuk berkreasi dan mengekspresikan diri, sehingga setiap
                        momen yang tercipta benar-benar unik, personal, dan sesuai dengan keinginan mereka.
                    </li>
                </ol>
                <a href="tentang">
                    <button
                        class="ml-4 mt-7 border-0 border-white bg-blue-500 hover:bg-blue-600 text-white px-4 py-1 text-sm rounded">back</button>
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
