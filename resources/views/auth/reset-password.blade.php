<x-layout.public>
    <x-auth.card>
        
        <!-- Validation Errors -->
        <x-auth.validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('auth.secure.password.reset.post') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <x-atoms.label for="email" :value="__('Email')" />

                <x-atoms.input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-atoms.label for="password" :value="__('Password')" />

                <x-atoms.input id="password" class="block mt-1 w-full" type="password" name="password" required />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-atoms.label for="password_confirmation" :value="__('Confirm Password')" />

                <x-atoms.input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-atoms.button>
                    {{ __('Reset Password') }}
                </x-atoms.button>
            </div>
        </form>
    </x-auth.card>
</x-layout.public>
