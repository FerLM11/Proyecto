<div>
    <div>
            @forelse ($vacantes as $vacante)
                <div class="p-6 text-gray-900 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
                    <div class="space-y-3">
                        <a href="{{route('vacantes.show', $vacante->id)}}" class="my-3 text-3xl font-bold text-gray-800">
                            {{$vacante->titulo}}
                        </a >
                        <p class="text-sm font-bold text-gray-600">{{$vacante->empresa}}</p>
                        <p>Último día: {{Carbon\Carbon::parse($vacante->ultimo_dia)->toFormattedDateString() }}</p>
                    </div>
                    <div class="flex flex-col gap-3 items-str md:mt-0">
                        <a 
                            href="{{route('candidatos.index', $vacante)}}"
                            class="px-4 py-2 text-xs font-bold text-center text-white uppercase rounded-lg bg-cyan-800"
                            >Candidatos</a>

                        <a 
                            href="{{route('vacantes.edit',$vacante->id)}}"
                            class="px-4 py-2 text-xs font-bold text-center text-white uppercase rounded-lg bg-cyan-600"
                            >Editar</a>
                        
                        <button 
                            wire:click="$dispatch('mostrarAlerta',{vacante_id:{{$vacante->id}}})"
                            class="px-4 py-2 text-xs font-bold text-center text-white uppercase bg-red-600 rounded-lg"
                            >Eliminar</button>
                    </div>
                </div>
            @empty
                <p class="p-3 text-sm text-center text-red-600 uppercase">No existen vacantes para mostar</p>
            @endforelse 
    </div>

    <div class="flex justify-center mt-10">
        {{$vacantes->links()}}
    </div>
</div>
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        document.addEventListener('livewire:initialized', () => {
            @this.on('mostrarAlerta', (vacanteId) => {
                Swal.fire({
                    title: '¿Eliminar Vacante?',
                    text: "Una Vacante eliminada no se puede recuperar:(",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // ELiminar vacante
                        @this.call('eliminarVacante',vacanteId);
                        Swal.fire(
                            'Se eliminó la Vacante',
                            'Eliminado correctamente',
                            'success'
                        )
                    }
                })
 
            });
        });
    </script>

@endpush
