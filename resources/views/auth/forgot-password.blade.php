<x-guest-layout>
    <div class="px-6 py-8 sm:px-8">
        <div class="mb-7 text-center">
            <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full border-2 border-[#D4AF37] bg-gray-900 shadow-lg">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Sinar Mandiri" class="h-12 w-12 object-contain">
            </div>
            <h1 class="mt-4 text-2xl font-bold text-white">Lupa Password?</h1>
            <p class="mt-2 text-sm leading-relaxed text-gray-400">
                Masukkan email akun Anda. Kami akan mengirim tautan untuk membuat password baru.
            </p>
        </div>

        <x-auth-session-status class="mb-4 w-full rounded-lg border border-green-700/40 bg-green-900/30 px-4 py-3 text-green-200" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
            @csrf

            <div>
                <x-input-label for="email" :value="__('Email Address')" class="font-semibold text-gray-300" />
                <x-text-input
                    id="email"
                    class="mt-2 block w-full rounded-lg border border-gray-600 bg-gray-900 px-4 py-2.5 text-white transition placeholder:text-gray-500 focus:border-transparent focus:ring-2 focus:ring-[#D4AF37]"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autofocus
                    autocomplete="username"
                    placeholder="nama@email.com"
                />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <button type="submit" class="w-full rounded-lg bg-[#D4AF37] px-6 py-2.5 font-bold text-gray-900 transition hover:bg-[#c4a132] focus:outline-none focus:ring-2 focus:ring-[#D4AF37] focus:ring-offset-2 focus:ring-offset-gray-900">
                {{ __('Kirim Tautan Reset') }}
            </button>

            <div class="text-center pt-2">
                <a href="{{ route('login') }}" class="text-sm font-semibold text-[#D4AF37] transition hover:text-[#f8d771]">
                    {{ __('Kembali ke halaman masuk') }}
                </a>
            </div>
        </form>
    </div>
</x-guest-layout>
