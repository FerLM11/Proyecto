<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Notificaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="my-10 text-3xl font-bold text-center">Mis notificaciones</h1>
                    
                    @forelse ($notificaciones as $notificacion)
                    <div class="p-5 lg:justify-between lg:flex lg:items-center">
                        <div class="p-5 border-gray-200">
                            <p>Tienes un nuevo candidato en:
                                <span class="font-bold">{{$notificacion->data['nombre_vacante']}}</span>
                            </p>
                            <p>Hace:
                                <span class="font-bold">{{$notificacion->created_at->diffForHumans()}}</span>
                            </p>
                        </div>
                        <div>
                            <a href="{{route ('candidatos.index', $notificacion->data['id_vacante'])}}" class="p-3 text-sm font-bold text-white uppercase rounded-lg">Ver candidatos</a>
                        </div>
                    </div>
                        
                    @empty
                        <p class="text-center text-gray-600">No hay notificaciones nuevas</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>