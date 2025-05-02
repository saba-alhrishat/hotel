{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout> --}}











<x-modern-guest-layout>
    <x-modern-auth-card title="Sign in to your account">
        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-brown-700 mb-2">Email Address</label><br>
                <input id="email" class="auth-input" type="email" name="email" :value="old('email')" required autofocus placeholder="Enter your email" />
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-brown-700 mb-2">Password</label><br>
                <input id="password" class="auth-input" type="password" name="password" required placeholder="Enter your password" />
            </div>

            <div class="flex items-center justify-between mb-6">
                <label for="remember_me" class="flex items-center remember-me">
                    <input id="remember_me" type="checkbox" class="rounded border-brown-300 text-brown-600 shadow-sm focus:ring-brown-500" name="remember">
                    <span class="ms-2 text-sm">{{ __('Remember me') }}</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="auth-link text-sm" href="{{ route('password.request') }}">
                        {{ __('Forgot password?') }}
                    </a>
                @endif
            </div>

            <button type="submit" class="auth-button">
                {{ __('Sign In') }}
            </button>
        </form>

        <div class="auth-footer">
            @if (Route::has('register'))
                <span>Don't have an account?</span>
                <a href="{{ route('register') }}" class="auth-link ml-1">Register now</a>
            @endif
        </div>
    </x-modern-auth-card>
</x-modern-guest-layout>