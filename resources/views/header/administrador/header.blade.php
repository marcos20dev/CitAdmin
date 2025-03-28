<header x-data="{ open: false }" class="bg-gray-800 text-white py-4" style="background-color: rgb(46, 49, 54);">
    <div class="container mx-auto flex items-center justify-between px-6">
        <!-- User Info Section -->
        <div class="flex items-center">
            @auth('admin')
                <div class="relative">
                    <img src="{{ Auth::guard('admin')->user()->foto_perfil ? 'data:image/jpeg;base64,' . Auth::guard('admin')->user()->foto_perfil : 'https://via.placeholder.com/150' }}"
                         alt="Foto de perfil" class="w-12 h-12 rounded-full border-2 border-gray-600 object-cover shadow">
                </div>
                <div class="ml-4">
                    <h1 class="text-lg font-semibold">
                        {{ ucfirst(Auth::guard('admin')->user()->nombre) }}
                        {{ ucfirst(Auth::guard('admin')->user()->apellidos) }}
                    </h1>
                    <p class="text-gray-400 text-sm">Administrador</p>
                </div>
            @else
                <div class="relative">
                    <img src="https://via.placeholder.com/150" alt="Default Image" class="w-12 h-12 rounded-full border-2 border-gray-600 object-cover shadow">
                </div>
                <div class="ml-4">
                    <h1 class="text-lg font-semibold">Invitado</h1>
                    <p class="text-gray-400 text-sm">No autenticado</p>
                </div>
            @endauth
        </div>

        <!-- Menu Button -->
        <button @click="open = !open"
                class="p-2 rounded-md text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 transition duration-150">
            <span class="sr-only">Toggle menu</span>
            <svg x-show="!open" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg x-show="open" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Dropdown Menu -->
    <div x-show="open" x-transition:enter="transition ease-out duration-100"
         x-transition:enter-start="transform opacity-0 scale-95"
         x-transition:enter-end="transform opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-75"
         x-transition:leave-start="transform opacity-100 scale-100"
         x-transition:leave-end="transform opacity-0 scale-95"
         @click.away="open = false"
         class="absolute right-6 mt-2 w-56 origin-top-right rounded-md shadow-lg bg-gray-800 ring-1 ring-gray-700 z-50">
        <div class="py-1">
            <!-- Cambiar de cuenta -->
            <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white">
                <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                </svg>
                Cambiar de cuenta
            </a>

            <!-- Divider -->
            <hr class="border-gray-700">

            <!-- Acerca de -->
            <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white">
                <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Acerca de
            </a>

            <!-- Divider -->
            <hr class="border-gray-700">

            <!-- Cerrar sesión -->
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full text-left flex items-center px-4 py-3 text-red-400 hover:bg-gray-700 hover:text-red-300 focus:outline-none">
                    <svg class="w-5 h-5 mr-3 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    Cerrar sesión
                </button>
            </form>
        </div>
    </div>
</header>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.x" defer></script>
