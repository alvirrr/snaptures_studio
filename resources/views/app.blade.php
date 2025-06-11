<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Snaptures Studio</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 font-sans antialiased">

    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-4">
                    <a href="/" class="text-xl font-bold text-gray-800">Snaptures Studio</a>
                    <a href="/booking" class="text-gray-600 hover:text-blue-600">Pemesanan</a>
                    <a href="/packages" class="text-gray-600 hover:text-blue-600">Paket</a>
                    <a href="/gallery" class="text-gray-600 hover:text-blue-600">Galeri</a>
                </div>

                <!-- Auth -->
                <div class="flex items-center space-x-4">
                    @auth
                        <span class="text-gray-700">Hi, {{ Auth::user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="text-red-500 hover:text-red-700">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login</a>
                        <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Daftar</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-8 px-4 sm:px-6 lg:px-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t mt-12">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-center text-gray-500 text-sm">
            &copy; {{ date('Y') }} Snaptures Studio. All rights reserved.
        </div>
    </footer>

</body>

</html>
