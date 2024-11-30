<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis vacantes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="my-10 text-3xl font-bold text-center">Publicar Vacante</h1>
                    <div class="p-5 md:flex md:justify-center">
                        <livewire:crear-vacante />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>