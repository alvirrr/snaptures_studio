<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Lupa Sandi - Snapstures Studio</title>
</head>

<body class="bg-gradient-to-tr from-gray-100 to-gray-300 min-h-screen">
    <header class="sticky top-0 left-0 right-0 z-50 bg-neutral-400 shadow-md shadow-neutral-500">
        <x-navbar></x-navbar>
        <x-mobile-menu></x-mobile-menu>
    </header>

    <section class="flex items-center justify-center min-h-[calc(100vh-4rem)] px-4">
        <div class="w-full max-w-sm p-6 bg-white rounded-xl shadow-md space-y-4 mt-10 mb-10">
            <h2 class="text-2xl font-bold text-center text-gray-800">Lupa Password</h2>

            @if (session('status'))
                <div class="bg-green-100 text-green-800 p-3 rounded-lg text-sm text-center">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('admin.password.email') }}" class="space-y-4">
                @csrf
                <div>
                    <label for="email" class="block">Email</label>
                    <input type="email" name="email" id="email" required
                        class="w-full px-3 py-2 border rounded-lg @error('email') border-red-500 @enderror"
                        value="{{ old('email') }}">
                    @error('email')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700">
                    Kirim Link Reset
                </button>
            </form>

            <div class="text-center text-sm">
                <a href="{{ route('admin.login') }}" class="text-blue-600 hover:underline">← Kembali ke login</a>
            </div>
        </div>
    </section>
</body>

</html>
