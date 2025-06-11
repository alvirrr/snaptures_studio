<nav x-data="{ isOpen: false }" class=" bg-neutral-400 mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8 "
    aria-label="Global">
    <div class="flex lg:flex-1">
        <a href="/" class="-m-1.5 p-1.5">
            <span class="sr-only">Snapsturesstudio</span>
            <img class="h-8 w-auto" src="../img/logoss.png" alt="Snapsturesstudio">
        </a>
    </div>
    <div class="flex lg:hidden">
        <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
            <span class="sr-only">Open main menu</span>
            <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                aria-hidden="true" data-slot="icon">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </button>
    </div>
    <div class="hidden lg:flex lg:gap-x-12">
        <a href="/"
            class="{{ request()->is('/') ? 'bg-neutral-600 text-neutral-300' : 'text-gray-900 hover:bg-neutral-300' }} py-1 px-1 text-sm/6 font-semibold  rounded-md"
            aria-current="page">Home</a>
        <a href="tentang"
            class="{{ request()->is('tentang') ? 'bg-neutral-600 text-neutral-300' : 'text-gray-900 hover:bg-neutral-300' }} py-1 px-1 text-sm/6 font-semibold  rounded-md">Tentang</a>
        <a href="jadwal"
            class="{{ request()->is('jadwal') ? 'bg-neutral-600 text-neutral-300' : 'text-gray-900 hover:bg-neutral-300' }} py-1 px-1 text-sm/6 font-semibold  rounded-md">Jadwal</a>
        <div class="relative">
            <button type="button" @click="isOpen = !isOpen"
                class="flex items-center gap-x-1 {{ request()->is('paket') ? 'bg-neutral-600 text-neutral-300' : 'text-gray-900 hover:bg-neutral-300' }} py-1 px-1 text-sm/6 font-semibold  rounded-md"
                aria-expanded="false">
                Paket
                <svg class="size-5 flex-none text-black" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                    data-slot="icon">
                    <path fill-rule="evenodd"
                        d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                        clip-rule="evenodd" />
                </svg>
            </button>
            <div x-show="isOpen" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-1"
                class="absolute top-full -left-8 z-10 mt-1 w-screen max-w-max overflow-hidden rounded-md bg-neutral-300 shadow-lg ring-1 ring-gray-500/5">
                <div class="p-4">
                    <div class="group relative flex items-center gap-x-6 rounded-lg p-2 text-sm/6 hover:bg-gray-50">
                        <div class="flex-auto">
                            <a href="paket" class="block font-semibold text-gray-900">
                                All Paket
                                <span class="absolute inset-0"></span>
                            </a>
                            <p class="mt-1 text-gray-600">lihat semua paket</p>
                        </div>
                    </div>
                    <div class="group relative flex items-center gap-x-6 rounded-lg p-2 text-sm/6 hover:bg-gray-50">
                        <div class="flex-auto">
                            <a href="selfphoto" class="block font-semibold text-gray-900">
                                Self Photo
                                <span class="absolute inset-0"></span>
                            </a>
                            <p class="mt-1 text-gray-600">Sesi foto secara mandiri tanpa fotografer</p>
                        </div>
                    </div>
                    <div class="group relative flex items-center gap-x-6 rounded-lg p-2 text-sm/6 hover:bg-gray-50">
                        <div class="flex-auto">
                            <a href="photostudio" class="block font-semibold text-gray-900">
                                Photo Studio
                                <span class="absolute inset-0"></span>
                            </a>
                            <p class="mt-1 text-gray-600">Sesi foto dengan fotografer</p>
                        </div>
                    </div>
                    <div class="group relative flex items-center gap-x-6 rounded-lg p-2 text-sm/6 hover:bg-gray-50">
                        <div class="flex-auto">
                            <a href="pasphoto" class="block font-semibold text-gray-900">
                                Pas Photo
                                <span class="absolute inset-0"></span>
                            </a>
                            <p class="mt-1 text-gray-600">Foto formal berukuran tertentu</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <a href="pembayaran"
            class="{{ request()->is('pembayaran') ? 'bg-neutral-600 text-neutral-300' : 'text-gray-900 hover:bg-neutral-300' }} py-1 px-1 text-sm/6 font-semibold  rounded-md">Pembayaran</a>
        <a href="member"
            class="{{ request()->is('member') ? 'bg-neutral-600 text-neutral-300' : 'text-gray-900 hover:bg-neutral-300' }} py-1 px-1 text-sm/6 font-semibold  rounded-md">Member</a>
        <a href="kontak"
            class="{{ request()->is('kontak') ? 'bg-neutral-600 text-neutral-300' : 'text-gray-900 hover:bg-neutral-300' }} py-1 px-1 text-sm/6 font-semibold  rounded-md">Kontak</a>
    </div>
    <div class="hidden lg:flex lg:flex-1 lg:justify-end">
        <a href="login" class="text-sm/6 font-semibold text-gray-900">Login <span aria-hidden="true">&rarr;</span></a>
    </div>
</nav>
