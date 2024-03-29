<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <div class="flex justify-center">
                <a href="/" class="mt-6 mb-2">
                        <img src="img/MIPERIUM.png" class="block h-20 w-40 alt="">
                    </a>
              </div>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            Esta es un área segura de la aplicación. Confirme su contraseña antes de continuar.
        </div>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div>
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" autofocus />
            </div>

            <div class="flex justify-end mt-4">
                <x-jet-button class="ml-4">
                    {{ __('Confirm') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
