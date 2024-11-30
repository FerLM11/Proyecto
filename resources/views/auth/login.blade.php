<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Correo')" />
            <x-text-input id="email" class="block w-full mt-1 border-cyan-600" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />

            <x-text-input id="password" class="block w-full mt-1 border-cyan-600"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="text-indigo-600 rounded shadow-sm border-cyan-600 focus:ring-indigo-500" name="remember">
                <span class="text-sm text-gray-600 ms-2">{{ __('Recordarme') }}</span>
            </label>
        </div>

        <div class="flex justify-between my-5">
            <x-link
                :href="route('password.request')"
            >
                Olvidaste tu contraseña? 
            </x-link>
            <x-link
                :href="route('register')"
            >
                Crear cuenta
            </x-link>
            
        </div>
        <x-primary-button class="justify-center w-full bg-cyan-600">
                {{ __('Iniciar Sesion') }}
            </x-primary-button>
    </form>
</x-guest-layout>
