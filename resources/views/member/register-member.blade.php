<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Register Member - Snapstures Studio</title>
</head>

<body class="bg-gradient-to-tr from-gray-100 to-gray-300 min-h-screen">
    <header class="sticky top-0 left-0 right-0 z-50 bg-neutral-400 shadow-md shadow-neutral-500">
        <x-navbar></x-navbar>
        <x-mobile-menu></x-mobile-menu>
    </header>

    <section class="flex items-center justify-center min-h-[calc(100vh-4rem)] px-4">
        <div class="w-full max-w-md p-6 bg-white rounded-xl shadow-md space-y-4 mt-10 mb-10">
            <h2 class="text-2xl font-bold text-center text-gray-800">Daftar Member</h2>

            <form action="{{ route('member.register') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" name="name" id="name" required
                        class="w-full mt-1 px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" required
                        class="w-full mt-1 px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password" required
                        class="w-full mt-1 px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                </div>

                <div>
                    <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                    <textarea name="alamat" id="alamat" required rows="2"
                        class="w-full mt-1 px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"></textarea>
                </div>

                <div>
                    <label for="wa" class="block text-sm font-medium text-gray-700">Nomor WhatsApp</label>
                    <input type="text" name="wa" id="wa" required placeholder="08xxxxxxxxxx"
                        class="w-full mt-1 px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                </div>

                <button type="submit"
                    class="w-full py-2 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition-all">
                    Daftar
                </button>
            </form>

            <p class="text-center text-sm text-gray-600">
                Sudah punya akun? <a href="{{ route('member.login') }}" class="text-blue-600 hover:underline">Login di
                    sini</a>
            </p>
        </div>
    </section>
</body>

</html>
