<x-layout.public>
    <x-auth.card>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth.session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth.validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('auth.guest.password.request.post') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-atoms.label for="email" :value="__('Email')" />

                <x-atoms.input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-atoms.button>
                    {{ __('Email Password Reset Link') }}
                </x-atoms.button>
            </div>
        </form>
    </x-auth.card>
</x-layout.public>
