 {{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div>
                <x-label for="name" value="{{ __('phone') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout> 
     --}}











{{-- <x-modern-guest-layout>
    <x-modern-auth-card title="Create Your Account">
        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700">
                <p class="font-medium">Please fix these errors:</p>
                <ul class="mt-2 list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name Field -->
            <div class="mb-5">
                <label for="name" class="block text-sm font-medium text-brown-700 mb-2">Full Name</label>
                <input id="name" class="auth-input @error('name') border-red-500 @enderror" 
                       type="text" name="name" value="{{ old('name') }}" 
                       required autofocus placeholder="Enter your full name" />
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email Field -->
            <div class="mb-5">
                <label for="email" class="block text-sm font-medium text-brown-700 mb-2">Email Address</label>
                <input id="email" class="auth-input @error('email') border-red-500 @enderror" 
                       type="email" name="email" value="{{ old('email') }}" 
                       required placeholder="Enter your email" />
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Phone Field (New) -->
            <div class="mb-5">
                <label for="phone" class="block text-sm font-medium text-brown-700 mb-2">Phone Number</label>
                <input id="phone" class="auth-input @error('phone') border-red-500 @enderror" 
                       type="tel" name="phone" value="{{ old('phone') }}" 
                       required placeholder="Enter your phone number" />
                @error('phone')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password Field -->
            <div class="mb-5">
                <label for="password" class="block text-sm font-medium text-brown-700 mb-2">Password</label>
                <input id="password" class="auth-input @error('password') border-red-500 @enderror" 
                       type="password" name="password" required 
                       placeholder="Create a password (min 8 characters)" />
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password Field -->
            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm font-medium text-brown-700 mb-2">Confirm Password</label>
                <input id="password_confirmation" class="auth-input" 
                       type="password" name="password_confirmation" required 
                       placeholder="Confirm your password" />
            </div>

            <button type="submit" class="auth-button">
                {{ __('Create Account') }}
            </button>
        </form>

        <div class="auth-footer mt-6">
            <span class="text-brown-600">Already have an account?</span>
            <a href="{{ route('login') }}" class="auth-link ml-1">Sign in</a>
        </div>
    </x-modern-auth-card>
</x-modern-guest-layout> --}}














<x-modern-guest-layout>
    <x-modern-auth-card title="Create Your Account">
        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700">
                <p class="font-medium">Please fix these errors:</p>
                <ul class="mt-2 list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name Field -->
            <div class="mb-5">
                <label for="name" class="block text-sm font-medium text-brown-700 mb-3">Full Name</label>
                <input id="name" class="auth-input @error('name') border-red-500 @enderror mt-1" 
                       type="text" name="name" value="{{ old('name') }}" 
                       required autofocus placeholder="Enter your full name" />
                @error('name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email Field -->
            <div class="mb-5">
                <label for="email" class="block text-sm font-medium text-brown-700 mb-3">Email Address</label>
                <input id="email" class="auth-input @error('email') border-red-500 @enderror mt-1" 
                       type="email" name="email" value="{{ old('email') }}" 
                       required placeholder="Enter your email" />
                @error('email')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Phone Field -->
            <div class="mb-5">
                <label for="phone" class="block text-sm font-medium text-brown-700 mb-3">Phone Number</label>
                <input id="phone" class="auth-input @error('phone') border-red-500 @enderror mt-1" 
                       type="tel" name="phone" value="{{ old('phone') }}" 
                       required placeholder="Enter your phone number" />
                @error('phone')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password Field -->
            <div class="mb-5">
                <label for="password" class="block text-sm font-medium text-brown-700 mb-3">Password</label>
                <input id="password" class="auth-input @error('password') border-red-500 @enderror mt-1" 
                       type="password" name="password" required 
                       placeholder="Create a password (min 8 characters)" />
                @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password Field -->
            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm font-medium text-brown-700 mb-3">Confirm Password</label>
                <input id="password_confirmation" class="auth-input mt-1" 
                       type="password" name="password_confirmation" required 
                       placeholder="Confirm your password" />
            </div>

            <button type="submit" class="auth-button">
                {{ __('Create Account') }}
            </button>
        </form>

        <div class="auth-footer mt-6">
            <span class="text-brown-600">Already have an account?</span>
            <a href="{{ route('login') }}" class="auth-link ml-1">Sign in</a>
        </div>
    </x-modern-auth-card>
</x-modern-guest-layout>








 