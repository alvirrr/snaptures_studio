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

<body class="bg-gradient-to-tr from-gray-100 to-gray-300 min-h-screen">
    <!-- Header tetap -->
    <header class="sticky top-0 left-0 right-0 z-50 bg-neutral-400 shadow-md shadow-neutral-500">
        <x-navbar></x-navbar>
        <x-mobile-menu></x-mobile-menu>
    </header>

    <!-- Konten Login -->
    <section class="flex items-center justify-center min-h-[calc(100vh-4rem)] px-4">
        <div class="w-full max-w-sm p-6 bg-white rounded-xl shadow-md space-y-4 mt-10 mb-10">
            <h2 class="text-2xl font-bold text-center text-gray-800">Login Member</h2>

            <form action="{{ route('member.login.submit') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required
                        class="w-full px-3 py-2 border rounded-lg">
                </div>

                <div>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required
                        class="w-full px-3 py-2 border rounded-lg">
                </div>

                <button type="submit"
                    class="w-full py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700">Login</button>
            </form>


            <p class="text-center text-sm text-gray-600">
                Belum punya akun? <a href="{{ route('member.register') }}" class="text-blue-600 hover:underline">Daftar
                    di sini</a>
            </p>
        </div>
    </section>
</body>

</html>
