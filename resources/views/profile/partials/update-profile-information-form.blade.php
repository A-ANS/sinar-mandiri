<section>
    <header>
        <h5 class="fw-bold text-white mb-1">{{ __('Informasi Profil') }}</h5>
        <p class="text-white-50 small mb-4">
            {{ __('Perbarui nama dan alamat email yang digunakan untuk akun Anda.') }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label for="name" class="form-label text-white-50">{{ __('Nama Lengkap') }}</label>
            <input id="name" name="name" type="text" class="form-control bg-dark text-white border-secondary" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
            @if($errors->get('name'))
                <div class="text-danger small mt-1">{{ $errors->first('name') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="email" class="form-label text-white-50">{{ __('Email') }}</label>
            <input id="email" name="email" type="email" class="form-control bg-dark text-white border-secondary" value="{{ old('email', $user->email) }}" required autocomplete="username">
            @if($errors->get('email'))
                <div class="text-danger small mt-1">{{ $errors->first('email') }}</div>
            @endif

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-3 alert alert-warning">
                    <p class="small mb-2">
                        {{ __('Alamat email Anda belum diverifikasi.') }}
                        <button form="send-verification" class="btn btn-link p-0 m-0 align-baseline text-warning">
                            {{ __('Kirim ulang email verifikasi.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="fw-medium text-success small mb-0">
                            {{ __('Tautan verifikasi baru telah dikirim ke email Anda.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="d-flex align-items-center gap-3 mt-4">
            <button type="submit" class="btn btn-accent">{{ __('Simpan Profil') }}</button>

            @if (session('status') === 'profile-updated')
                <p class="text-success small mb-0">{{ __('Perubahan tersimpan.') }}</p>
            @endif
        </div>
    </form>
</section>
