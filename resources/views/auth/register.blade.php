<x-guest-layout>
    <div class="px-6 py-8 sm:px-8 flex flex-col items-center justify-center">
        <!-- Logo -->
        <div class="mb-6">
            <div class="flex items-center justify-center w-24 h-24 bg-gray-900 rounded-full shadow-lg mx-auto border-2 border-[#D4AF37]">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Sinar Mandiri" class="w-16 h-16 object-contain">
            </div>
            <h1 class="mt-4 text-2xl font-bold text-center text-white">Sinar <span style="color:#D4AF37">Mandiri</span></h1>
            <p class="text-center text-sm text-gray-400 mt-1">Platform Penjualan Kendaraan</p>
        </div>

        <!-- Register Form -->
        <div class="w-full">
            <h2 class="text-xl font-bold text-white mb-6">Buat Akun Baru</h2>
            
            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Nama Lengkap')" class="font-semibold text-gray-300" />
                    <x-text-input 
                        id="name" 
                        class="block mt-2 w-full px-4 py-2.5 bg-gray-900 border border-gray-600 rounded-lg text-white focus:ring-2 focus:ring-[#D4AF37] focus:border-transparent transition" 
                        type="text" 
                        name="name" 
                        :value="old('name')" 
                        required 
                        autofocus 
                        autocomplete="name"
                        placeholder="Nama Anda"
                    />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email Address')" class="font-semibold text-gray-300" />
                    <x-text-input 
                        id="email" 
                        class="block mt-2 w-full px-4 py-2.5 bg-gray-900 border border-gray-600 rounded-lg text-white focus:ring-2 focus:ring-[#D4AF37] focus:border-transparent transition" 
                        type="email" 
                        name="email" 
                        :value="old('email')" 
                        required 
                        autocomplete="username"
                        placeholder="nama@email.com"
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" class="font-semibold text-gray-300" />
                    <div class="relative mt-2">
                        <x-text-input 
                            id="password" 
                            class="block w-full pl-4 pr-12 py-2.5 bg-gray-900 border border-gray-600 rounded-lg text-white focus:ring-2 focus:ring-[#D4AF37] focus:border-transparent transition"
                            type="password"
                            name="password"
                            required 
                            autocomplete="new-password"
                            placeholder="••••••••"
                        />
                        <button type="button" onclick="togglePasswordVisibility('password', this)" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-white focus:outline-none">
                            <svg class="w-5 h-5 eye-open" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            <svg class="w-5 h-5 eye-closed hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"></path>
                            </svg>
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    <p class="text-xs text-gray-500 mt-1">Min. 8 karakter dengan kombinasi huruf dan angka</p>
                </div>

                <!-- Confirm Password -->
                <div>
                    <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" class="font-semibold text-gray-300" />
                    <div class="relative mt-2">
                        <x-text-input 
                            id="password_confirmation" 
                            class="block w-full pl-4 pr-12 py-2.5 bg-gray-900 border border-gray-600 rounded-lg text-white focus:ring-2 focus:ring-[#D4AF37] focus:border-transparent transition"
                            type="password"
                            name="password_confirmation" 
                            required 
                            autocomplete="new-password"
                            placeholder="••••••••"
                        />
                        <button type="button" onclick="togglePasswordVisibility('password_confirmation', this)" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-white focus:outline-none">
                            <svg class="w-5 h-5 eye-open" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            <svg class="w-5 h-5 eye-closed hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"></path>
                            </svg>
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Actions -->
                <div class="flex flex-col gap-4 mt-6">
                    <button type="submit" class="w-full px-6 py-2.5 bg-[#D4AF37] text-gray-900 font-bold rounded-lg hover:bg-[#c4a132] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-900 focus:ring-[#D4AF37] transition">
                        {{ __('Daftar') }}
                    </button>
                </div>

                <!-- Login Link -->
                <div class="text-center pt-4 border-t border-gray-700">
                    <p class="text-gray-400 text-sm">
                        Sudah punya akun?
                        <a href="{{ route('login') }}" class="text-[#D4AF37] hover:text-[#f8d771] font-bold transition">
                            Masuk di sini
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <script>
        function togglePasswordVisibility(inputId, button) {
            const input = document.getElementById(inputId);
            const openIcon = button.querySelector('.eye-open');
            const closedIcon = button.querySelector('.eye-closed');
            
            if (input.type === 'password') {
                input.type = 'text';
                openIcon.classList.add('hidden');
                closedIcon.classList.remove('hidden');
            } else {
                input.type = 'password';
                openIcon.classList.remove('hidden');
                closedIcon.classList.add('hidden');
            }
        }
    </script>
</x-guest-layout>
