<x-guest-layout>
    <form method="POST" action="{{ route('login') }}" 
          class="w-full max-w-sm mx-auto mt-4 animate__animated animate__fadeInDown">
        @csrf

        <!-- Judul Login -->
        <h2 class="text-center text-2xl font-bold text-gray-800 mb-5">Login</h2>

        <!-- Status Session -->
        @if (session('status'))
            <div class="mb-4 text-sm text-green-600 text-center">
                {{ session('status') }}
            </div>
        @endif

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" />
            @error('email')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Kata Sandi</label>
            <div class="relative">
                <input id="password" type="password" name="password" required
                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 pr-10" />
                <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 px-3 flex items-center text-gray-600">
                    <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </button>
            </div>
            @error('password')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="flex items-center mb-4">
            <input id="remember_me" type="checkbox" name="remember"
                class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring focus:ring-blue-200">
            <label for="remember_me" class="ml-2 text-sm text-gray-700">Ingat saya</label>
        </div>

        <!-- Tombol Login -->
        <div class="flex justify-center mb-4">
            <button type="submit"
                class="px-6 py-2 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700 transition ease-in-out duration-200">
                Masuk
            </button>
        </div>

        <!-- Link Daftar -->
        <div class="text-center">
            <span class="text-sm text-gray-600">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Daftar di sini</a>
            </span>
        </div>
    </form>

    <!-- Script toggle password -->
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.setAttribute("stroke", "#1D4ED8");
            } else {
                passwordInput.type = 'password';
                eyeIcon.setAttribute("stroke", "currentColor");
            }
        }
    </script>
</x-guest-layout>
