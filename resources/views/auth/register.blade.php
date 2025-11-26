<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Nombre -->
        <div>
            <x-input-label for="us_nombre" :value="__('Nombre')" />
            <x-text-input id="us_nombre" class="block mt-1 w-full" type="text" name="us_nombre" :value="old('us_nombre')" required autofocus autocomplete="given-name" />
            <x-input-error :messages="$errors->get('us_nombre')" class="mt-2" />
        </div>

        <!-- Apellido -->
        <div class="mt-4">
            <x-input-label for="us_apellido" :value="__('Apellido')" />
            <x-text-input id="us_apellido" class="block mt-1 w-full" type="text" name="us_apellido" :value="old('us_apellido')" required autocomplete="family-name" />
            <x-input-error :messages="$errors->get('us_apellido')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="us_email" :value="__('Email')" />
            <x-text-input id="us_email" class="block mt-1 w-full" type="email" name="us_email" :value="old('us_email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('us_email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="us_password" :value="__('Contraseña')" />
            <x-text-input id="us_password" class="block mt-1 w-full"
                            type="password"
                            name="us_password"
                            required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('us_password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="us_password_confirmation" :value="__('Confirmar Contraseña')" />
            <x-text-input id="us_password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="us_password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('us_password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('¿Ya estás registrado?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Registrarse') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
