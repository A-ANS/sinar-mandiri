<section>
    <header>
        <h5 class="fw-bold text-white mb-1">{{ __('Ubah Password') }}</h5>
        <p class="text-white-50 small mb-4">
            {{ __('Gunakan password yang kuat dan berbeda dari akun lain.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="update_password_current_password" class="form-label text-white-50">{{ __('Password Saat Ini') }}</label>
            <input id="update_password_current_password" name="current_password" type="password" class="form-control bg-dark text-white border-secondary" autocomplete="current-password">
            @if($errors->updatePassword->get('current_password'))
                <div class="text-danger small mt-1">{{ $errors->updatePassword->first('current_password') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="update_password_password" class="form-label text-white-50">{{ __('Password Baru') }}</label>
            <input id="update_password_password" name="password" type="password" class="form-control bg-dark text-white border-secondary" autocomplete="new-password">
            @if($errors->updatePassword->get('password'))
                <div class="text-danger small mt-1">{{ $errors->updatePassword->first('password') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="update_password_password_confirmation" class="form-label text-white-50">{{ __('Konfirmasi Password Baru') }}</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control bg-dark text-white border-secondary" autocomplete="new-password">
            @if($errors->updatePassword->get('password_confirmation'))
                <div class="text-danger small mt-1">{{ $errors->updatePassword->first('password_confirmation') }}</div>
            @endif
        </div>

        <div class="d-flex align-items-center gap-3 mt-4">
            <button type="submit" class="btn btn-outline-light">{{ __('Simpan Password') }}</button>

            @if (session('status') === 'password-updated')
                <p class="text-success small mb-0">{{ __('Password berhasil diperbarui.') }}</p>
            @endif
        </div>
    </form>
</section>
