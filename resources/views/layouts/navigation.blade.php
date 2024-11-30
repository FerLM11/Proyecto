<nav x-data="{ open: false }" class="border-gray-100 borcyader-b bg-cyan-600"> <!--Aqui se modifica el header principal -->
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center shrink-0">
                    <a href="{{ route('vacantes.index') }}">
                        <x-application-logo class="block w-auto text-white fill-current h-9" />
                    </a>
                </div>
                @auth
                     <!-- Navigation Links -->
                     @can('create', App\Models\Vacante::class)
                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <x-nav-link class="text-white" :href="route('vacantes.index')" :active="request()->routeIs('vacantes.index')">
                                {{ __('Mis vacantes') }}
                            </x-nav-link>
                            <x-nav-link class="text-white" :href="route('vacantes.create')" :active="request()->routeIs('vacantes.create')">
                                {{ __('Crear vacante') }}
                            </x-nav-link>
                        </div>
                    @endcan
                @endauth          
                
                <!-- Esto se mostrara cuando el usuario no este autenticado -->
                
                                 
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden bg-cyan-600 sm:flex sm:items-center sm:ms-6">
                @auth
                    @can('create', App\Models\Vacante::class)
                        <a href="{{route('notificaciones')}}" class="flex items-center justify-center mr-2 text-sm font-extrabold text-white rounded-full h-7 hover:bg-indigo-600">
                            <img src="{{asset('images/campana.png')}}" alt="Notificaciones" class="w-6 h-6 ml-1">
                            <span class="flex items-center justify-center w-6 h-6 ml-1 text-white bg-red-500 rounded-full">
                                {{Auth::user()->unreadNotifications->count()}}
                            </span>
                        </a>
                    @endcan
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-black duration-150 ease-in-out bg-white border border-transparent rounded-md transition-noneon hover:text-gray-300 focus:outline-none">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ms-1">
                                    <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Perfil') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Cerrar Sesion') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @endauth
                @guest
                     <!-- Navigation Links -->
                     <div class="hidden space-x-8 text-black sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="route('login')" class="text-white">
                            {{ __('Iniciar Sesion') }}
                        </x-nav-link>
                        <x-nav-link :href="route('register')" class="text-white" :active="request()->routeIs('vacantes.create')">
                            {{ __('Crear una cuenta') }}
                        </x-nav-link>
                    </div> 
                @endguest
                
            </div>

            <!-- Hamburger -->
            <div class="flex items-center -me-2 sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        @auth
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link class="text-black hover:bg-gray-600" :href="route('vacantes.index')" :active="request()->routeIs('vacantes.index')">
                    {{ __('Mis vacantes') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link class="text-black hover:bg-gray-600" :href="route('vacantes.create')" :active="request()->routeIs('vacantes.create')">
                    {{ __('Crear vacantes') }}
                </x-responsive-nav-link>
                @if (auth()->user()->rol ===2)
                    <div class="flex items-center gap-2 p-3">
                        <a href="{{route('notificaciones')}}" class="flex items-center justify-center mr-2 text-sm font-extrabold text-white rounded-full h-7 hover:bg-indigo-600">
                            <img src="{{asset('images/campana.png')}}" alt="Notificaciones" class="w-6 h-6 ml-1">
                            <span class="flex items-center justify-center w-6 h-6 ml-1 text-white bg-red-500 rounded-full">
                                {{Auth::user()->unreadNotifications->count()}}
                            </span>
                        </a>
                        <p class="text-white">Notificaciones</p>
                    </div>
                    
                @endif
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="text-base font-medium text-white">{{ Auth::user()->name }}</div>
                    <div class="text-sm font-medium text-white">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link class="text-white" :href="route('profile.edit')">
                        {{ __('Perfil') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link class="text-white" :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Cerrar Sesion') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @endauth
        @guest
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('login')">
                    {{ __('Iniciar Sesion') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('register')" >
                    {{ __('Crear cuenta') }}
                </x-responsive-nav-link>
            </div>
        @endguest
       
    </div>
</nav>
