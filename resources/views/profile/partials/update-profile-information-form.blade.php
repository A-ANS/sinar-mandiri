<section>
    <header>
        <h2 class="text-lg font-bold text-gray-900">
            {{ __('Informasi Profil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 leading-relaxed">
            {{ __('Perbarui nama dan alamat email yang digunakan untuk akun Anda.') }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-5">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Nama Lengkap')" class="font-semibold text-gray-700" />
            <x-text-input id="name" name="name" type="text" class="mt-2 block w-full rounded-lg border-gray-300 px-4 py-2.5 focus:border-[#D4AF37] focus:ring-[#D4AF37]" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" class="font-semibold text-gray-700" />
            <x-text-input id="email" name="email" type="email" class="mt-2 block w-full rounded-lg border-gray-300 px-4 py-2.5 focus:border-[#D4AF37] focus:ring-[#D4AF37]" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-3 rounded-lg border border-amber-200 bg-amber-50 p-3">
                    <p class="text-sm text-amber-900">
                        {{ __('Alamat email Anda belum diverifikasi.') }}

                        <button form="send-verification" class="font-semibold underline decoration-amber-500 underline-offset-4 hover:text-amber-700 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#D4AF37]">
                            {{ __('Kirim ulang email verifikasi.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-700">
                            {{ __('Tautan verifikasi baru telah dikirim ke email Anda.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex flex-wrap items-center gap-4 pt-1">
            <button type="submit" class="inline-flex items-center rounded-lg bg-[#D4AF37] px-5 py-2.5 text-sm font-bold text-gray-900 transition hover:bg-[#c4a132] focus:outline-none focus:ring-2 focus:ring-[#D4AF37] focus:ring-offset-2">
                {{ __('Simpan Profil') }}
            </button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm font-medium text-green-700"
                >{{ __('Perubahan tersimpan.') }}</p>
            @endif
        </div>
    </form>
</section>
