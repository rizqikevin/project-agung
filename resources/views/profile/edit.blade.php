<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Edit Profil') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PATCH')

                <div class="mb-4">
                    <label for="name" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Nama</label>
                    <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}"
                        class="mt-1 block w-full" required autofocus>
                    @error('name') <small class="text-red-600">{{ $message }}</small> @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}"
                        class="mt-1 block w-full" required>
                    @error('email') <small class="text-red-600">{{ $message }}</small> @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Password Baru</label>
                    <input id="password" type="password" name="password" class="mt-1 block w-full">
                    @error('password') <small class="text-red-600">{{ $message }}</small> @enderror
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Konfirmasi Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" class="mt-1 block w-full">
                </div>

                <div class="flex items-center gap-4">
                    <x-primary-button>Simpan</x-primary-button>
                    <a href="{{ route('dashboard') }}" class="text-sm text-gray-500 hover:text-gray-800">Kembali</a>
                </div>
            </form>

            <hr class="my-6 border-gray-300">

            <form method="POST" action="{{ route('profile.destroy') }}">
                @csrf
                @method('DELETE')

                <x-danger-button
                    onclick="return confirm('Yakin ingin menghapus akun? Data akan hilang permanen.')">
                    Hapus Akun
                </x-danger-button>
            </form>
        </div>
    </div>
</x-app-layout>
