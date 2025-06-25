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
    <title>Register Admin - Snapstures Studio</title>
</head>

<body class="bg-gradient-to-tr from-neutral-200 to-neutral-600 min-h-screen">
    {{-- <header class="sticky top-0 left-0 right-0 z-50 bg-neutral-400 shadow-md shadow-neutral-500">
        <x-navbar></x-navbar>
        <x-mobile-menu></x-mobile-menu>
    </header> --}}

    <section class="flex items-center justify-center min-h-[calc(100vh-4rem)] px-4">
        <div class="w-full max-w-md p-6 bg-white rounded-xl shadow-md space-y-4 mt-10 mb-10">
            <h2 class="text-2xl font-bold text-center text-gray-800">Daftar Admin</h2>

            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-3 rounded text-sm">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.register') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" name="name" id="name" required value="{{ old('name') }}"
                        class="w-full mt-1 px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300 @error('name') border-red-500 @enderror">
                    @error('name')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" required value="{{ old('email') }}"
                        class="w-full mt-1 px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300 @error('email') border-red-500 @enderror">
                    @error('email')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <div x-data="{ show: false }" class="relative">
                        <input :type="show ? 'text' : 'password'" name="password" id="password" required
                            class="w-full mt-1 px-3 py-2 border rounded-lg pr-10 focus:outline-none focus:ring focus:border-blue-300 @error('password') border-red-500 @enderror">
                        <button type="button" @click="show = !show"
                            class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-600">
                            <i :class="show ? 'fa fa-eye-slash' : 'fa fa-eye'"></i>
                        </button>
                    </div>
                    @error('password')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi
                        Password</label>
                    <div x-data="{ showConfirm: false }" class="relative">
                        <input :type="showConfirm ? 'text' : 'password'" name="password_confirmation"
                            id="password_confirmation" required
                            class="w-full mt-1 px-3 py-2 border rounded-lg pr-10 focus:outline-none focus:ring focus:border-blue-300 @error('password_confirmation') border-red-500 @enderror">
                        <button type="button" @click="showConfirm = !showConfirm"
                            class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-600">
                            <i :class="showConfirm ? 'fa fa-eye-slash' : 'fa fa-eye'"></i>
                        </button>
                    </div>
                    @error('password_confirmation')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <div>
                    <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                    <textarea name="alamat" id="alamat" required rows="2"
                        class="w-full mt-1 px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300 @error('alamat') border-red-500 @enderror">{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="wa" class="block text-sm font-medium text-gray-700">Nomor WhatsApp</label>
                    <input type="text" name="wa" id="wa" required placeholder="08xxxxxxxxxx"
                        value="{{ old('wa') }}"
                        class="w-full mt-1 px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300 @error('wa') border-red-500 @enderror">
                    @error('wa')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full py-2 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition-all">
                    Daftar
                </button>
            </form>

            <p class="text-center text-sm text-gray-600">
                Sudah punya akun? <a href="{{ route('admin.login') }}" class="text-blue-600 hover:underline">Login di
                    sini</a>
            </p>
        </div>
    </section>
</body>

</html>
