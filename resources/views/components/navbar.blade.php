<nav x-data="{ isOpen: false }" class="bg-neutral-400 mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8"
    aria-label="Global">
    <!-- Logo -->
    <div class="flex lg:flex-1">
        <a href="{{ url('/') }}" class="-m-1.5 p-1.5">
            <span class="sr-only">Snapsturesstudio</span>
            <img class="h-8 w-auto" src="{{ asset('img/logoss.png') }}" alt="Snapsturesstudio">
        </a>
    </div>

    <!-- Mobile Toggle -->
    <div class="flex lg:hidden">
        <button @click="$dispatch('toggle-menu')" type="button"
            class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
            <span class="sr-only">Open main menu</span>
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <!-- Desktop Menu -->
    <div class="hidden lg:flex lg:gap-x-8">
        <a href="{{ url('/') }}"
            class="{{ request()->is('/') ? 'bg-neutral-600 text-neutral-300' : 'text-gray-900 hover:bg-neutral-300' }} py-1 px-2 rounded-md text-sm font-semibold">Home</a>
        <a href="{{ url('tentang') }}"
            class="{{ request()->is('tentang') ? 'bg-neutral-600 text-neutral-300' : 'text-gray-900 hover:bg-neutral-300' }} py-1 px-2 rounded-md text-sm font-semibold">Tentang</a>
        <a href="{{ url('jadwal-booking') }}"
            class="{{ request()->is('jadwal-booking') ? 'bg-neutral-600 text-neutral-300' : 'text-gray-900 hover:bg-neutral-300' }} py-1 px-2 rounded-md text-sm font-semibold">Jadwal</a>

        <!-- Dropdown Paket -->
        <div x-data="{ openPaket: false }" @mouseleave="openPaket = false" class="relative">
            <button type="button" @mouseenter="openPaket = true" @click="openPaket = !openPaket"
                class="flex items-center gap-x-1 py-1 px-3 text-sm font-medium rounded-md transition duration-200 ease-in-out {{ request()->is('paket') ? 'bg-neutral-600 text-neutral-100' : 'text-gray-900 hover:bg-neutral-300' }}">
                Paket
                <svg :class="{ 'rotate-180': openPaket }"
                    class="h-4 w-4 transform transition-transform duration-500 text-black" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M5.23 7.21a.75.75 0 011.06 0L10 10.92l3.71-3.71a.75.75 0 111.06 1.06l-4.25 4.25a.75.75 0 01-1.06 0L5.23 8.27a.75.75 0 010-1.06z"
                        clip-rule="evenodd" />
                </svg>
            </button>
            <div x-show="openPaket" x-transition
                class="absolute z-30 mt-2 w-56 rounded-lg bg-white border border-gray-200 shadow-md py-2">
                @php
                    $routes = [
                        'paket' => 'All Paket',
                        'selfphoto' => 'Self Photo',
                        'photostudio' => 'Photo Studio',
                        'pasphoto' => 'Pas Photo',
                    ];
                @endphp
                @foreach ($routes as $route => $label)
                    <a href="{{ url($route) }}"
                        class="group relative block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition">
                        <span
                            class="relative z-10 {{ request()->is($route) ? 'text-neutral-700 font-semibold' : '' }}">{{ $label }}</span>
                        <span
                            class="absolute bottom-1 left-4 h-[2px] w-0 bg-neutral-500 transition-all duration-300 ease-in-out group-hover:w-[calc(100%-2rem)] {{ request()->is($route) ? 'w-[calc(100%-2rem)]' : '' }}"></span>
                    </a>
                @endforeach
            </div>
        </div>

        <a href="{{ url('pembayaran') }}"
            class="{{ request()->is('pembayaran') ? 'bg-neutral-600 text-neutral-300' : 'text-gray-900 hover:bg-neutral-300' }} py-1 px-2 rounded-md text-sm font-semibold">Pembayaran</a>
        <a href="{{ url('login-member') }}"
            class="{{ request()->is('login-member') ? 'bg-neutral-600 text-neutral-300' : 'text-gray-900 hover:bg-neutral-300' }} py-1 px-2 rounded-md text-sm font-semibold">Member</a>
        <a href="{{ url('kontak') }}"
            class="{{ request()->is('kontak') ? 'bg-neutral-600 text-neutral-300' : 'text-gray-900 hover:bg-neutral-300' }} py-1 px-2 rounded-md text-sm font-semibold">Kontak</a>
    </div>

    <!-- Login -->
    <div class="hidden lg:flex lg:flex-1 lg:justify-end">
        <a href="{{ url('login-admin') }}" class="text-sm font-semibold text-gray-900 hover:underline">Login <span
                aria-hidden="true">&rarr;</span></a>
    </div>
</nav>
