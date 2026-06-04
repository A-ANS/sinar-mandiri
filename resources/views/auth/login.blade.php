<<<<<<< HEAD
<x-guest-layout>
    <div class="px-6 py-8 sm:px-8 flex flex-col items-center justify-center">
        <!-- Logo -->
        <div class="mb-6">
            <div class="flex items-center justify-center w-16 h-16 bg-gradient-to-br from-blue-600 to-blue-800 rounded-lg shadow-lg">
                <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10.5 1.5H5.75A2.25 2.25 0 003.5 3.75v12.5A2.25 2.25 0 005.75 18.5h8.5a2.25 2.25 0 002.25-2.25V8.5m-8-5v5m0 0h5m-5 0L15 3.5" stroke="currentColor" stroke-width="1.5" fill="none"/>
                </svg>
            </div>
            <h1 class="mt-3 text-2xl font-bold text-center text-gray-900">Sinar Mandiri</h1>
            <p class="text-center text-sm text-gray-600 mt-1">Platform Penjualan Kendaraan</p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4 w-full" :status="session('status')" />

        <!-- Login Form -->
        <div class="w-full">
            <h2 class="text-xl font-bold text-gray-900 mb-6">Masuk ke Akun Anda</h2>
            
            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email Address')" class="font-semibold text-gray-700" />
                    <x-text-input 
                        id="email" 
                        class="block mt-2 w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" 
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

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" class="font-semibold text-gray-700" />
                    <x-text-input 
                        id="password" 
                        class="block mt-2 w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                        type="password"
                        name="password"
                        required 
                        autocomplete="current-password"
                        placeholder="••••••••"
                    />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center">
                    <input 
                        id="remember_me" 
                        type="checkbox" 
                        class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500 cursor-pointer" 
                        name="remember"
                    >
                    <label for="remember_me" class="ms-2 text-sm text-gray-600 cursor-pointer">
                        {{ __('Ingat Saya') }}
                    </label>
                </div>

                <!-- Actions -->
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4 mt-6">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-blue-600 hover:text-blue-800 font-medium transition" href="{{ route('password.request') }}">
                            {{ __('Lupa Password?') }}
                        </a>
                    @endif

                    <button type="submit" class="w-full sm:w-auto px-6 py-2.5 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold rounded-lg hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition">
                        {{ __('Masuk') }}
                    </button>
                </div>

                <!-- Register Link -->
                <div class="text-center pt-4 border-t border-gray-200">
                    <p class="text-gray-600 text-sm">
                        Belum punya akun?
                        <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-800 font-semibold transition">
                            Daftar di sini
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
=======
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
>>>>>>> d0cbcdfe2183facd8477fe0d0c77c93a43f940b9
