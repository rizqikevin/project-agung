@php
    use App\Models\Jurusan;
    $jurusans = Jurusan::all();
@endphp

<nav x-data="{ open: false, showLogout: false, openJurusan: false }" class="bg-gradient-to-r from-blue-600 via-blue-500 to-blue-400 text-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">

            <!-- Logo -->
            <div class="flex items-center space-x-2">
                <a href="{{ route('dashboard') }}" class="flex items-center transition hover:scale-105">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-9 w-auto" />
                    <span class="ml-2 font-semibold hidden sm:block">Pakar Jurusan</span>
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden sm:flex space-x-6 items-center">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-white hover:text-yellow-200">
                    Home
                </x-nav-link>

                @if (Auth::user()->peran === 'admin')
                    <x-nav-link :href="route('admin.kelolaJurusan')" :active="request()->routeIs('admin.kelolaJurusan')" class="text-white hover:text-yellow-200">
                        Kelola Jurusan
                    </x-nav-link>
                    <x-nav-link :href="route('admin.kelolaPertanyaan')" :active="request()->routeIs('admin.kelolaPertanyaan')" class="text-white hover:text-yellow-200">
                        Kelola Pertanyaan
                    </x-nav-link>
                    <x-nav-link :href="route('admin.hasilRekomendasi')" :active="request()->routeIs('admin.hasilRekomendasi')" class="text-white hover:text-yellow-200">
                        Hasil Rekomendasi
                    </x-nav-link>
                @elseif (Auth::user()->peran === 'siswa')
                    <x-nav-link :href="route('siswa.form')" :active="request()->routeIs('siswa.form')" class="text-white hover:text-yellow-200">
                        Form Rekomendasi
                    </x-nav-link>

                    <!-- Dropdown Detail Jurusan (Desktop) -->
                    <div x-data="{ openJurusan: false }" class="relative">
                        <button @click="openJurusan = !openJurusan"
                                class="text-white hover:text-yellow-200 inline-flex items-center space-x-1">
                            <span>Detail Jurusan</span>
                            <svg class="w-4 h-4 transform transition" :class="openJurusan ? 'rotate-180' : ''"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="openJurusan" @click.away="openJurusan = false"
                             class="absolute right-0 mt-2 w-56 bg-white text-black rounded shadow z-50">
                            @foreach ($jurusans as $jurusan)
                                <a href="{{ route('siswa.jurusanDetail', $jurusan->id) }}"
                                   class="block px-4 py-2 hover:bg-gray-100 border-b last:border-b-0">
                                    {{ $jurusan->nama }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Dropdown Nama Pengguna -->
                <div class="relative" @click.away="showLogout = false">
                    <button @click="showLogout = !showLogout" class="flex items-center space-x-2 hover:text-yellow-200">
                        <span class="font-medium">👤 {{ Auth::user()->name }}</span>
                        <svg class="w-4 h-4 transform" :class="showLogout ? 'rotate-180' : 'rotate-0'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="showLogout" x-transition class="absolute right-0 mt-2 w-40 bg-white text-black rounded shadow-lg z-50">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 hover:bg-red-100">
                                🚪 Keluar
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Hamburger (Mobile) -->
            <div class="flex sm:hidden items-center">
                <button @click="open = !open" class="text-white focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="sm:hidden bg-blue-500">
        <div class="pt-4 pb-4 px-4 space-y-2 text-white">
            <div class="font-semibold">👤 {{ Auth::user()->name }}</div>

            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                Home
            </x-responsive-nav-link>

            @if (Auth::user()->peran === 'admin')
                <x-responsive-nav-link :href="route('admin.kelolaJurusan')" :active="request()->routeIs('admin.kelolaJurusan')">
                    Kelola Jurusan
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.kelolaPertanyaan')" :active="request()->routeIs('admin.kelolaPertanyaan')">
                    Kelola Pertanyaan
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.hasilRekomendasi')" :active="request()->routeIs('admin.hasilRekomendasi')">
                    Hasil Rekomendasi
                </x-responsive-nav-link>
            @elseif (Auth::user()->peran === 'siswa')
                <x-responsive-nav-link :href="route('siswa.form')" :active="request()->routeIs('siswa.form')">
                    Form Rekomendasi
                </x-responsive-nav-link>

                <div class="px-4 pt-2 font-semibold text-sm">Detail Jurusan</div>
                @foreach ($jurusans as $jurusan)
                    <x-responsive-nav-link :href="route('siswa.jurusanDetail', $jurusan->id)">
                        - {{ $jurusan->nama }}
                    </x-responsive-nav-link>
                @endforeach
            @endif

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                    🚪 Keluar
                </x-responsive-nav-link>
            </form>
        </div>
    </div>
</nav>
