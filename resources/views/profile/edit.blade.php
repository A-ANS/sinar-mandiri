<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-1">
            <p class="text-sm font-semibold uppercase tracking-wide text-[#D4AF37]">Akun Pengguna</p>
            <h2 class="font-bold text-2xl text-gray-900 leading-tight">
                {{ __('Profil Saya') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-6 overflow-hidden rounded-lg bg-gray-900 shadow-lg">
                <div class="grid gap-6 p-6 sm:p-8 lg:grid-cols-[1fr_auto] lg:items-center">
                    <div class="flex items-center gap-4">
                        <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-full border-2 border-[#D4AF37] bg-gray-800 text-2xl font-bold text-[#D4AF37]">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>

                        <div>
                            <h3 class="text-xl font-bold text-white">{{ auth()->user()->name }}</h3>
                            <p class="mt-1 text-sm text-gray-300">{{ auth()->user()->email }}</p>
                        </div>
                    </div>

                    <div class="rounded-lg border border-gray-700 bg-gray-800/80 px-4 py-3">
                        <p class="text-xs font-semibold uppercase tracking-wide text-gray-400">Status Akun</p>
                        <p class="mt-1 text-sm font-semibold text-[#D4AF37]">Aktif</p>
                    </div>
                </div>
            </div>

            <div class="grid gap-6 lg:grid-cols-2">
                <div class="rounded-lg border border-gray-200 bg-white p-5 shadow-sm sm:p-6">
                    @include('profile.partials.update-profile-information-form')
                </div>

                <div class="rounded-lg border border-gray-200 bg-white p-5 shadow-sm sm:p-6">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="mt-6 rounded-lg border border-red-100 bg-red-50 p-5 shadow-sm sm:p-6">
                <div class="max-w-2xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
