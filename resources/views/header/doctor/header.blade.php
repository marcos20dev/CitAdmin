<header x-data="{ open: false }" class="bg-blue-800 text-white py-4" style="background-color: rgb(0, 170, 169);">
    <div class="container mx-auto flex items-center justify-between px-4">
        @auth('doctor')
            <img src="{{ Auth::guard('doctor')->user()->foto_perfil ? 'data:image/jpeg;base64,' . Auth::guard('doctor')->user()->foto_perfil : 'path_to_doctor_default_image.jpg' }}"
                alt="Foto de perfil del doctor" class="w-12 h-12 rounded-full">
        @else
            <img src="path_to_doctor_default_image.jpg" alt="Imagen predeterminada del doctor" class="w-12 h-12 rounded-full">
        @endauth
        <div class="flex items-center">
            @auth('doctor')
                <h1 class="text-xl font-semibold">{{ Auth::guard('doctor')->user()->nombre }}
                    {{ Auth::guard('doctor')->user()->apellidos }}</h1>
            @else
                <h1 class="text-xl font-semibold">Invitado</h1>
            @endauth

            <!-- Icono de calendario -->
            <a href="#" class="ml-4 p-2 rounded-md text-white hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-800 transition">
                <i class="fas fa-calendar-day text-2xl"></i> <!-- Ícono de calendario -->
            </a>

            <button @click="open = !open"
                class="ml-4 p-2 rounded-md text-white hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-800 transition">
                <svg x-show="!open" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
                <svg x-show="open" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <div x-show="open" x-transition @click.away="open = false"
         class="absolute right-0 mt-2 w-64 bg-white shadow-xl rounded-lg py-1 z-50">
        <div class="px-5 py-4 shadow-xl rounded-lg transform transition-all duration-300 scale-100 opacity-100">
            <!-- Cambiar de cuenta -->
            <a href="#" class="flex items-center px-4 py-3 rounded-lg text-lg font-medium text-gray-700 hover:text-gray-900">
                <span class="mr-3"><i class="fas fa-sync-alt text-gray-800"></i></span>
                Cambiar de cuenta
            </a>
            <hr class="my-1">
            <!-- Acerca de -->
            <a href="#" class="flex items-center px-4 py-3 rounded-lg text-lg font-medium text-gray-700 hover:text-gray-900">
                <span class="mr-3"><i class="fas fa-info-circle text-gray-800"></i></span>
                Acerca de
            </a>
            <hr class="my-1">
            <!-- Cerrar sesión -->
            <form action="{{ route('logout') }}" method="POST" style="all:unset;">
                @csrf
                <button type="submit" class="flex items-center px-4 py-3 rounded-lg text-lg font-medium text-gray-700 hover:text-red-700 focus:outline-none">
                    <span class="mr-3"><i class="fas fa-sign-out-alt text-red-500"></i></span>
                    Cerrar sesión
                </button>
            </form>
        </div>
    </div>
</header>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.x" defer></script>
