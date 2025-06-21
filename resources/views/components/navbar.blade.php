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
        <button @click="isOpen = !isOpen" type="button"
            class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
            <span class="sr-only">Open main menu</span>
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path :class="{ 'hidden': isOpen, 'block': !isOpen }" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <!-- Desktop Menu -->
    <div class="hidden lg:flex lg:gap-x-8">
        <a href="{{ url('/') }}"
            class="{{ request()->is('/') ? 'bg-neutral-600 text-neutral-300' : 'text-gray-900 hover:bg-neutral-300' }} py-1 px-2 rounded-md text-sm font-semibold">
            Home
        </a>
        <a href="{{ url('tentang') }}"
            class="{{ request()->is('tentang') ? 'bg-neutral-600 text-neutral-300' : 'text-gray-900 hover:bg-neutral-300' }} py-1 px-2 rounded-md text-sm font-semibold">
            Tentang
        </a>
        <a href="{{ url('jadwal') }}"
            class="{{ request()->is('jadwal') ? 'bg-neutral-600 text-neutral-300' : 'text-gray-900 hover:bg-neutral-300' }} py-1 px-2 rounded-md text-sm font-semibold">
            Jadwal
        </a>

        <!-- Dropdown Paket -->
        <div class="relative" @mouseleave="isOpen = false">
            <button type="button" @click="isOpen = !isOpen"
                class="flex items-center gap-x-1 py-1 px-2 text-sm font-semibold rounded-md 
                           {{ request()->is('paket') ? 'bg-neutral-600 text-neutral-300' : 'text-gray-900 hover:bg-neutral-300' }}">
                Paket
                <svg class="h-5 w-5 text-black" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M5.23 7.21a.75.75 0 011.06 0L10 10.92l3.71-3.71a.75.75 0 111.06 1.06l-4.25 4.25a.75.75 0 01-1.06 0L5.23 8.27a.75.75 0 010-1.06z"
                        clip-rule="evenodd" />
                </svg>
            </button>
            <div x-show="isOpen" x-transition
                class="absolute top-full left-0 z-20 mt-2 w-56 rounded-md bg-white shadow-lg border">
                <a href="{{ url('paket') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">All
                    Paket</a>
                <a href="{{ url('selfphoto') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Self
                    Photo</a>
                <a href="{{ url('photostudio') }}"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Photo Studio</a>
                <a href="{{ url('pasphoto') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Pas
                    Photo</a>
            </div>
        </div>

        <a href="{{ url('pembayaran') }}"
            class="{{ request()->is('pembayaran') ? 'bg-neutral-600 text-neutral-300' : 'text-gray-900 hover:bg-neutral-300' }} py-1 px-2 rounded-md text-sm font-semibold">
            Pembayaran
        </a>
        <a href="{{ url('login-member') }}"
            class="{{ request()->is('login-member') ? 'bg-neutral-600 text-neutral-300' : 'text-gray-900 hover:bg-neutral-300' }} py-1 px-2 rounded-md text-sm font-semibold">
            Member
        </a>
        <a href="{{ url('kontak') }}"
            class="{{ request()->is('kontak') ? 'bg-neutral-600 text-neutral-300' : 'text-gray-900 hover:bg-neutral-300' }} py-1 px-2 rounded-md text-sm font-semibold">
            Kontak
        </a>
    </div>

    <!-- Login -->
    <div class="hidden lg:flex lg:flex-1 lg:justify-end">
        <a href="{{ url('login') }}" class="text-sm font-semibold text-gray-900 hover:underline">
            Login <span aria-hidden="true">&rarr;</span>
        </a>
    </div>
</nav>
