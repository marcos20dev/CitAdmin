@php
    $editandoAdministrador = isset($adminEditar);
    $editandoEspecialidad = isset($especialidad);
    $items = [
        ['route' => 'añadircuentas', 'icon' => 'fas fa-user-shield', 'label' => 'Administradores', 'desc' => 'Gestionar cuentas admin'],
        ['route' => 'add.especialidades', 'icon' => 'fas fa-user-md', 'label' => 'Doctores', 'desc' => 'Gestionar especialidades'],
    ];
@endphp

<div id="sidebarMenu" class="flex flex-col justify-between px-2 py-6 overflow-hidden">
    <!-- Menú -->
    <div class="flex flex-col space-y-2.5 text-sm">
        @foreach ($items as $item)
            @php
                $active = request()->routeIs($item['route']) ||
                          ($item['route'] === 'añadircuentas' && $editandoAdministrador) ||
                          ($item['route'] === 'add.especialidades' && $editandoEspecialidad);
            @endphp

            <a href="{{ route($item['route']) }}"
               class="relative flex items-center justify-between w-full px-4 py-2.5 rounded-lg transition-all duration-300 ease-in-out
                      {{ $active ?
                         'bg-gradient-to-br from-indigo-600 to-purple-500 shadow-md text-white' :
                         'bg-white/90 backdrop-blur-sm hover:bg-white text-gray-700 hover:shadow-sm border border-gray-100' }}
                      hover:-translate-y-0.5 hover:scale-[1.01] transform-gpu overflow-hidden">

                @if($active)
                    <div class="absolute inset-0 bg-[radial-gradient(80%_80%_at_50%_0%,rgba(255,255,255,0.3)_0%,transparent_100%)]"></div>
                @endif

                <div class="flex items-center gap-3 relative z-10 w-full">
                    <div class="{{ $active ? 'bg-white/20 shadow-inner' : 'bg-gradient-to-br from-white to-gray-50 shadow border border-gray-100' }}
                                rounded-md p-2 transition-all duration-300 group-hover/all:rotate-3 hover:scale-105">
                        <i class="{{ $item['icon'] }} text-base {{ $active ? 'text-white' : 'bg-gradient-to-r from-indigo-500 to-purple-500 bg-clip-text text-transparent' }}"></i>
                    </div>

                    <div class="flex flex-col">
                        <span class="font-medium {{ $active ? 'text-white' : 'text-gray-800' }}">{{ $item['label'] }}</span>
                        <span class="text-xs {{ $active ? 'text-white/80' : 'text-gray-500' }}">{{ $item['desc'] }}</span>
                    </div>
                </div>

                <div class="relative z-10 ml-2 flex-shrink-0">
                    @if($active)
                        <div class="flex items-center animate-pulse-right">
                            <span class="w-1.5 h-1.5 bg-cyan-200 rounded-full mr-1"></span>
                            <i class="fas fa-chevron-right text-xs text-white/90"></i>
                        </div>
                    @else
                        <div class="h-5 w-5 flex items-center justify-center bg-gradient-to-br from-white to-gray-50 rounded-full shadow border border-gray-100">
                            <i class="fas fa-chevron-right text-[0.55rem] bg-gradient-to-r from-gray-500 to-gray-600 bg-clip-text text-transparent transition-transform group-hover/all:translate-x-0.5"></i>
                        </div>
                    @endif
                </div>
            </a>
        @endforeach
    </div>

    <!-- Botón Cerrar Sesión -->
    <form method="POST" action="{{ route('logout') }}" class="pt-4 border-t border-gray-100/50 mt-4">
        @csrf
        <button type="submit"
                class="group relative flex items-center justify-between w-full px-4 py-2.5 rounded-lg transition-all duration-300 ease-in-out
                       bg-white/90 backdrop-blur-sm hover:bg-white shadow-sm hover:shadow-md border border-gray-100
                       hover:-translate-y-0.5 hover:scale-[1.01] transform-gpu overflow-hidden">

            <div class="flex items-center gap-3 relative z-10 w-full">
                <div class="bg-gradient-to-br from-white to-gray-50 shadow border border-gray-100 rounded-md p-2 transition-all duration-300
                            group-hover:rotate-3 hover:scale-105">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-pink-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2h4a2 2 0 012 2v1"/>
                    </svg>
                </div>

                <div class="flex flex-col">
                    <span class="text-sm font-semibold text-gray-800">Cerrar Sesión</span>
                    <span class="text-xs text-gray-500 mt-0.5">Salir del sistema</span>
                </div>
            </div>

            <div class="h-5 w-5 flex items-center justify-center bg-gradient-to-br from-white to-gray-50 rounded-full shadow border border-gray-100">
                <i class="fas fa-chevron-right text-[0.55rem] bg-gradient-to-r from-rose-500 to-pink-500 bg-clip-text text-transparent transition-transform group-hover:translate-x-0.5"></i>
            </div>
        </button>
    </form>
</div>

<!-- Enlace a FontAwesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<!-- Script para altura automática -->
<script>
    function setFullHeight() {
        const menu = document.getElementById('sidebarMenu');
        menu.style.height = window.innerHeight + 'px';
    }
    window.addEventListener('load', setFullHeight);
    window.addEventListener('resize', setFullHeight);
</script>
