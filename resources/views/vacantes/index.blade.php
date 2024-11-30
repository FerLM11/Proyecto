<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Mis vacantes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                @if (session('mensaje'))
                    <div class="p-2 my-3 font-bold text-green-600 uppercase bg-green-100 border border-green-600 ">
                     {{session('mensaje')}}
                    </div>
                @endif
                <livewire:mostar-vacantes />
            </div>
        </div>
    </div>
</x-app-layout>