@php
    $items = [
        ['route' => 'añadircuentas', 'icon' => 'fas fa-user-plus', 'label' => 'Agregar Cuentas'],
        ['route' => 'ver.doctores', 'icon' => 'fas fa-user-md', 'label' => 'Ver Cuentas de Doctor'],
        ['route' => 'add.especialidades', 'icon' => 'fas fa-notes-medical', 'label' => 'Agregar Especialidades'],
        ['route' => 'ver.administradores', 'icon' => 'fas fa-user-shield', 'label' => 'Ver Cuentas de Administrador'],
    ];
@endphp

<div class="flex flex-col space-y-3 w-full mt-8 px-2">
    @foreach ($items as $item)
        @php
            $editando = isset($especialidad);
           $active = request()->routeIs($item['route']) || ($item['route'] === 'add.especialidades' && $editando);
        @endphp

        <a href="{{ route($item['route']) }}"
           class="group relative flex items-center justify-between w-full px-4 py-2.5 rounded-xl transition-all duration-300 ease-[cubic-bezier(0.4,0,0.2,1)]
           {{ $active ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-lg shadow-blue-500/20' : 'bg-white text-gray-700 hover:bg-gray-50 hover:shadow-md border border-gray-100' }}
           before:absolute before:left-0 before:top-0 before:h-full before:w-1 before:rounded-l-lg
           {{ $active ? 'before:bg-white before:opacity-80' : 'before:bg-transparent' }}
           transform hover:-translate-y-0.5">

            <div class="flex items-center gap-3">
                <div class="{{ $active ? 'bg-white/20 text-white' : 'bg-gray-100 text-blue-600 group-hover:bg-blue-100 group-hover:text-blue-700' }}
                      rounded-xl p-2.5 transition-all duration-300 group-hover:rotate-6">
                    <i class="{{ $item['icon'] }} text-xl"></i>
                </div>
                <span class="text-sm font-medium tracking-wide">{{ $item['label'] }}</span>
            </div>

            @if ($active)
                <span class="text-white/90 animate-pulse">
                    <i class="fas fa-arrow-right text-sm"></i>
                </span>
            @else
                <span class="text-gray-400 group-hover:text-blue-500 transition-transform duration-300 group-hover:translate-x-1">
                    <i class="fas fa-chevron-right text-xs"></i>
                </span>
            @endif

            <span class="absolute inset-0 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300
                  bg-gradient-to-r from-blue-500/5 to-indigo-500/5"></span>
        </a>
    @endforeach

    <!-- Botón de Cerrar Sesión -->
    <form method="POST" action="{{ route('logout') }}" class="mt-6">
        @csrf
        <button type="submit"
                class="group relative flex items-center justify-between w-full px-4 py-3 rounded-xl transition-all duration-300 ease-[cubic-bezier(0.4,0,0.2,1)]
                       bg-white text-red-600 hover:bg-red-50 hover:shadow-md border border-red-100
                       before:absolute before:left-0 before:top-0 before:h-full before:w-1 before:rounded-l-lg before:bg-transparent
                       transform hover:-translate-y-0.5">

            <div class="flex items-center gap-3">
                <div class="bg-red-100 text-red-600 group-hover:bg-red-200 group-hover:text-red-700
                      rounded-xl p-2.5 transition-all duration-300 group-hover:rotate-6">
                    <i class="fas fa-sign-out-alt text-xl"></i>
                </div>
                <span class="text-sm font-medium tracking-wide">Cerrar Sesión</span>
            </div>

            <span class="text-red-400 group-hover:text-red-500 transition-transform duration-300 group-hover:translate-x-1">
                <i class="fas fa-chevron-right text-xs"></i>
            </span>

            <span class="absolute inset-0 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300
                  bg-gradient-to-r from-red-500/5 to-pink-500/5"></span>
        </button>
    </form>
</div>

<style>
    /* Animación sutil para el ícono activo */
    @keyframes subtleBounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-2px); }
    }

    .animate-pulse {
        animation: subtleBounce 1.5s ease-in-out infinite;
    }

    /* Efecto hover para el botón de cerrar sesión */
    button:hover .fa-sign-out-alt {
        animation: signOutShake 0.5s ease-in-out;
    }

    @keyframes signOutShake {
        0%, 100% { transform: translateX(0) rotate(0deg); }
        20% { transform: translateX(-2px) rotate(-5deg); }
        40% { transform: translateX(2px) rotate(5deg); }
        60% { transform: translateX(-2px) rotate(-5deg); }
        80% { transform: translateX(2px) rotate(5deg); }
    }
</style>
