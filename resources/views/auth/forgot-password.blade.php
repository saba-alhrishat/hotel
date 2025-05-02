{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout> --}}




{{-- 
<x-modern-guest-layout>
    <x-modern-auth-card title="Reset Your Password">
        <div class="mb-4 text-sm text-brown-600">
            {{ __('Forgot your password? No problem. Just enter your email address and we\'ll send you a password reset link.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-brown-700 mb-2">Email Address</label>
                <input id="email" class="auth-input" type="email" name="email" :value="old('email')" required autofocus placeholder="Enter your email" />
            </div>

            <div class="flex items-center justify-end mt-6">
                <button type="submit" class="auth-button">
                    {{ __('Send Reset Link') }}
                </button>
            </div>
        </form>

        <div class="auth-footer mt-4">
            <a href="{{ route('login') }}" class="auth-link">
                {{ __('Back to Login') }}
            </a>
        </div>
    </x-modern-auth-card>
</x-modern-guest-layout> --}}











<x-modern-guest-layout>
    <x-modern-auth-card title="Reset Your Password">
        <div class="mb-6 text-sm text-brown-600">
            {{ __('Forgot your password? No problem. Just enter your email address and we\'ll send you a password reset link.') }}
        </div>

        @if (session('status'))
            <div class="mb-6 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-validation-errors class="mb-6" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-5">
                <label for="email" class="block text-sm font-medium text-brown-700 mb-3">Email Address</label><br>
                <input id="email" class="auth-input" type="email" name="email" :value="old('email')" required autofocus placeholder="Enter your email" />
            </div>

            <div class="flex items-center justify-end mt-8">
                <button type="submit" class="auth-button">
                    {{ __('Send Reset Link') }}
                </button>
            </div>
        </form>

        <div class="auth-footer mt-6">
            <a href="{{ route('login') }}" class="auth-link">
                {{ __('Back to Login') }}
            </a>
        </div>
    </x-modern-auth-card>
</x-modern-guest-layout>