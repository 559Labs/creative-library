<x-layout.public>
    <x-auth.card>


        <!-- Validation Errors -->
        <x-auth.validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('auth.guest.register.post') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-atoms.label for="name" :value="__('Name')" />

                <x-atoms.input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-atoms.label for="email" :value="__('Email')" />

                <x-atoms.input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-atoms.label for="password" :value="__('Password')" />

                <x-atoms.input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-atoms.label for="password_confirmation" :value="__('Confirm Password')" />

                <x-atoms.input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('auth.guest.signin') }}">
                    {{ __('Already Registered?') }}
                </a>

                <x-atoms.button class="ml-4">
                    {{ __('Register') }}
                </x-atoms.button>
            </div>
        </form>
    </x-auth.card>
</x-layout.public>
