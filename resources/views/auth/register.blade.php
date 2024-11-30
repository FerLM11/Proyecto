<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" class="block w-full mt-1 border-cyan-600" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Correo')" />
            <x-text-input id="email" class="block w-full mt-1 border-cyan-600" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

               <!-- Rol -->
        <div class="mt-4">
            <x-input-label for="rol" :value="__('Que accion necesitas realizar?')" />
            <select name="rol" id="rol" class="w-full rounded-md shadow-sm border-cyan-600 focus:border-indigo-500 focus:ring-indigo-500">
                <option value="" >--Selecciona un rol--</option>
                <option value="1" >Obtener un empleo</option>
                <option value="2" >Publicar una vacante</option>
            </select>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />

            <x-text-input id="password" class="block w-full mt-1 border-cyan-600"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar contraseña')" />

            <x-text-input id="password_confirmation" class="block w-full mt-1 border-cyan-600"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex justify-between my-5">
        <x-link
                :href="route('password.request')"
            >
                Olvidaste tu contraseña? 
            </x-link>
            <x-link
                :href="route('login')"
            >
                Iniciar Sesion
            </x-link>
        </div>
        <x-primary-button class="flex justify-center w-full bg-cyan-600">
                {{ __('Registrar') }}
            </x-primary-button>
    </form>
</x-guest-layout>
