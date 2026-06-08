<section>
    <header>
        <h2 class="text-lg font-bold text-gray-900">
            {{ __('Ubah Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 leading-relaxed">
            {{ __('Gunakan password yang kuat dan berbeda dari akun lain.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-5">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" :value="__('Password Saat Ini')" class="font-semibold text-gray-700" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-2 block w-full rounded-lg border-gray-300 px-4 py-2.5 focus:border-[#D4AF37] focus:ring-[#D4AF37]" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password" :value="__('Password Baru')" class="font-semibold text-gray-700" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-2 block w-full rounded-lg border-gray-300 px-4 py-2.5 focus:border-[#D4AF37] focus:ring-[#D4AF37]" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Konfirmasi Password Baru')" class="font-semibold text-gray-700" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-2 block w-full rounded-lg border-gray-300 px-4 py-2.5 focus:border-[#D4AF37] focus:ring-[#D4AF37]" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex flex-wrap items-center gap-4 pt-1">
            <button type="submit" class="inline-flex items-center rounded-lg bg-gray-900 px-5 py-2.5 text-sm font-bold text-white transition hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:ring-offset-2">
                {{ __('Simpan Password') }}
            </button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm font-medium text-green-700"
                >{{ __('Password berhasil diperbarui.') }}</p>
            @endif
        </div>
    </form>
</section>
