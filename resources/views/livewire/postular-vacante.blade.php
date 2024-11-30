<div class="flex flex-col items-center justify-center p-5 mt-10 bg-gray-100">
    <h3 class="my-4 text-2xl font-bold text-center">Postularme a la vacante</h3>
    @if (@session()->has('mensaje'))
        <div class="p-2 my-2 font-bold text-green-600 uppercase bg-green-100">
            {{session('mensaje')}}
        </div>
    @else
        <form wire:submit.prevent='postularme' class="mt-5 w-96">
            <div class="mb-4">
                <x-input-label for="cv" :value="__('CV')" class="uppercase" />
                <x-text-input id="cv" type="file" wire:model="cv" accept=".pdf" class="block w-full mt-1"/>
            </div>
            
            @error('cv')
                <livewire:mostrar-alerta :message="$message">
            @enderror
            
            <x-primary-button class="justify-center my-5">
                {{__('Postularme')}}
            </x-primary-button>
        </form>
        
    @endif
    
</div>
