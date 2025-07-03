<div x-data="{ isOpen: false, openDropdown: false }" @toggle-menu.window="isOpen = !isOpen">
    <div x-show="isOpen" x-transition class="fixed inset-0 z-50 bg-black/50 lg:hidden" @click.outside="isOpen = false">
        <!-- Sidebar -->
        <div class="absolute right-0 top-0 h-full w-1/2 bg-white shadow-lg p-6 overflow-y-auto">
            <!-- Logo -->
            <div class="flex justify-between items-center mb-4">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('img/logoss.png') }}" alt="Logo" class="h-8">
                </a>
                <button @click="isOpen = false" class="text-2xl text-gray-700 font-bold">&times;</button>
            </div>

            <!-- Menu List -->
            <nav class="flex flex-col space-y-3 text-sm font-medium">
                <a href="{{ url('/') }}"
                    class="block px-3 py-2 rounded-md w-full 
                    {{ request()->is('/') ? 'bg-blue-500 text-white font-semibold' : 'hover:bg-gray-100 text-gray-800' }}">
                    Home
                </a>
                <a href="{{ url('tentang') }}"
                    class="block px-3 py-2 rounded-md w-full 
                    {{ request()->is('tentang') ? 'bg-blue-500 text-white font-semibold' : 'hover:bg-gray-100 text-gray-800' }}">
                    Tentang
                </a>
                <a href="{{ url('jadwal-booking') }}"
                    class="block px-3 py-2 rounded-md w-full 
                    {{ request()->is('jadwal-booking') ? 'bg-blue-500 text-white font-semibold' : 'hover:bg-gray-100 text-gray-800' }}">
                    Jadwal
                </a>

                <!-- Dropdown Paket -->
                <div @click="openDropdown = !openDropdown" class="relative">
                    <button
                        class="flex justify-between items-center w-full px-3 py-2 rounded-md 
                        {{ request()->is('paket*') ? 'bg-blue-500 text-white font-semibold' : 'hover:bg-gray-100 text-gray-800' }}">
                        <span>Paket</span>
                        <svg :class="{ 'rotate-180': openDropdown }" class="w-4 h-4 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="openDropdown" x-transition class="mt-2 ml-2 space-y-1">
                        <a href="{{ url('paket') }}"
                            class="block px-4 py-2 text-sm rounded-md 
                            {{ request()->is('paket') ? 'bg-gray-200 text-blue-600 font-semibold' : 'hover:bg-gray-100' }}">
                            All Paket
                        </a>
                        <a href="{{ url('selfphoto') }}"
                            class="block px-4 py-2 text-sm rounded-md 
                            {{ request()->is('selfphoto') ? 'bg-gray-200 text-blue-600 font-semibold' : 'hover:bg-gray-100' }}">
                            Self Photo
                        </a>
                        <a href="{{ url('photostudio') }}"
                            class="block px-4 py-2 text-sm rounded-md 
                            {{ request()->is('photostudio') ? 'bg-gray-200 text-blue-600 font-semibold' : 'hover:bg-gray-100' }}">
                            Photo Studio
                        </a>
                        <a href="{{ url('pasphoto') }}"
                            class="block px-4 py-2 text-sm rounded-md 
                            {{ request()->is('pasphoto') ? 'bg-gray-200 text-blue-600 font-semibold' : 'hover:bg-gray-100' }}">
                            Pas Photo
                        </a>
                    </div>
                </div>

                <a href="{{ url('pembayaran') }}"
                    class="block px-3 py-2 rounded-md w-full truncate 
                    {{ request()->is('pembayaran') ? 'bg-blue-500 text-white font-semibold' : 'hover:bg-gray-100 text-gray-800' }}">
                    Pembayaran
                </a>
                <a href="{{ url('login-member') }}"
                    class="block px-3 py-2 rounded-md w-full 
                    {{ request()->is('login-member') ? 'bg-blue-500 text-white font-semibold' : 'hover:bg-gray-100 text-gray-800' }}">
                    Member
                </a>
                <a href="{{ url('kontak') }}"
                    class="block px-3 py-2 rounded-md w-full 
                    {{ request()->is('kontak') ? 'bg-blue-500 text-white font-semibold' : 'hover:bg-gray-100 text-gray-800' }}">
                    Kontak
                </a>
                <a href="{{ url('login-admin') }}"
                    class="block px-3 py-2 rounded-md w-full 
                    {{ request()->is('login-admin') ? 'bg-blue-500 text-white font-semibold' : 'hover:bg-gray-100 text-gray-800' }}">
                    Login Admin
                </a>
            </nav>
        </div>
    </div>
</div>
