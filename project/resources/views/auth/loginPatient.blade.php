<x-guest-layout>
    <!-- Session Status -->

    <form method="POST" action="{{ route('patient.store') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            @error('email')
            <div class="text-sm text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Пароль')" />

            <x-text-input id="password" class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required autocomplete="current-password" />

            @error('email')
            <div class="text-sm text-red-600">{{ $message }}</div>
            @enderror
        </div>

        @if (session()->has('error'))
            <div class="flex items-center p-4 font-sans text-2xl antialiased font-semibold leading-snug shrink-0 text-blue-gray-900">
                {{ session()->pull('error') }}
            </div>

        @endif
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="/patient/register">
                {{ __('Нет учетной записи?') }}
            </a>
            <x-primary-button class="ms-3">
                {{ __('Авторизоваться') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
