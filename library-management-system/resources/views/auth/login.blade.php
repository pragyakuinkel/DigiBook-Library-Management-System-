<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="flex items-center justify-center mb-4">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="">
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4 text_color">
            <x-input-label for="password" :value="__('Password')"/>

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex mt-4 w-full" style="justify-content:space-between">
            <label for="remember_me" class="inline-flex items-center text_color">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800 " name="remember">
                <span class="ml-2 text-sm text_color">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="underline text-sm main_text_color hover:text_color rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>
        
        <button class="mt-4 main_color text-white btn w-full px-2 py-1 rounded">
            {{ __('Log in') }}
        </button>
        
        <div class="flex row mt-4 w-100" style="justify-content:center;">
            <p class="text-sm text_color">
                Donot have an account, 
            </p>
            <a class="underline text-sm main_text_color hover:text_color rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 w-80" href="{{ route('register') }}">
                {{ __(' Sign up') }}
            </a>
        </div>

        
    </form>
</x-guest-layout>
