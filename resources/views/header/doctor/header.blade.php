<header x-data="{ open: false, userMenuOpen: false }" class="bg-gradient-to-r from-indigo-600 to-blue-500 text-white shadow-lg">
    <div class="container mx-auto flex items-center justify-between px-6 py-3">
        <!-- Logo y nombre de la aplicación -->
        <div class="flex items-center space-x-4">
            <img src="{{ asset('imagen/logo-icon.png') }}" alt="Logo" class="w-10 h-10 rounded-lg bg-white/10 p-1">
            <span class="text-xl font-bold hidden md:block text-white">SaludPlus</span>
        </div>

        <!-- Menú central -->
        <div class="hidden lg:flex space-x-2">
            <a href="#" class="px-4 py-2 rounded-lg text-sm font-medium text-white hover:bg-white/10 transition-all flex items-center">
                <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
            </a>
            <a href="#" class="px-4 py-2 rounded-lg text-sm font-medium text-white hover:bg-white/10 transition-all flex items-center">
                <i class="fas fa-user-injured mr-2"></i> Pacientes
            </a>
            <a href="#" class="px-4 py-2 rounded-lg text-sm font-medium text-white hover:bg-white/10 transition-all flex items-center">
                <i class="fas fa-calendar-check mr-2"></i> Agenda
            </a>
        </div>

        <!-- Área de usuario -->
        <div class="flex items-center space-x-4">
            <!-- Notificaciones -->
            <button class="relative p-2 rounded-full hover:bg-white/10 transition-all group">
                <i class="fas fa-bell text-lg"></i>
                <span class="absolute top-0 right-0 w-2.5 h-2.5 bg-red-500 rounded-full border-2 border-indigo-600"></span>
                <span class="absolute -top-1 -right-1 w-4 h-4 bg-red-400 rounded-full opacity-0 group-hover:opacity-20 animate-ping"></span>
            </button>

            <!-- Calendario -->
            <a href="#" class="p-2 rounded-full hover:bg-white/10 transition-all hidden sm:block" title="Calendario">
                <i class="fas fa-calendar-day text-lg"></i>
            </a>

            <!-- Perfil del doctor -->
            <div class="relative">
                <button @click="userMenuOpen = !userMenuOpen" class="flex items-center space-x-2 focus:outline-none group">
                    @auth('doctor')
                        <div class="relative">
                            <img src="{{ Auth::guard('doctor')->user()->foto_perfil ? 'data:image/jpeg;base64,' . Auth::guard('doctor')->user()->foto_perfil : asset('images/doctor_default.png') }}"
                                 alt="Foto de perfil" class="w-9 h-9 rounded-full border-2 border-white/80 shadow-sm group-hover:border-white transition-all">
                            <span class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 rounded-full border-2 border-white"></span>
                        </div>
                        <span class="hidden md:inline-block font-medium text-white">
                            Dr. {{ Auth::guard('doctor')->user()->nombre }}
                        </span>
                        <i class="fas fa-chevron-down text-xs transition-transform duration-200 text-white/70 group-hover:text-white" :class="{ 'transform rotate-180': userMenuOpen }"></i>
                    @else
                        <img src="{{ asset('images/doctor_default.png') }}" alt="Invitado" class="w-9 h-9 rounded-full border-2 border-white/80 shadow-sm group-hover:border-white transition-all">
                        <span class="hidden md:inline-block font-medium text-white">Invitado</span>
                    @endauth
                </button>

                <!-- Menú desplegable del usuario -->
                <div x-show="userMenuOpen" @click.away="userMenuOpen = false"
                     x-transition:enter="transition ease-out duration-100"
                     x-transition:enter-start="transform opacity-0 scale-95"
                     x-transition:enter-end="transform opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="transform opacity-100 scale-100"
                     x-transition:leave-end="transform opacity-0 scale-95"
                     class="absolute right-0 mt-2 w-56 bg-white rounded-lg shadow-xl py-1 z-50 divide-y divide-gray-100 border border-gray-200 overflow-hidden">
                    <!-- Información del usuario -->
                    <div class="px-4 py-3 bg-gray-50">
                        <p class="text-sm font-medium text-gray-900">
                            @auth('doctor')
                                Dr. {{ Auth::guard('doctor')->user()->nombre }} {{ Auth::guard('doctor')->user()->apellidos }}
                            @else
                                Usuario Invitado
                            @endauth
                        </p>
                        <p class="text-xs text-gray-500 truncate">
                            @auth('doctor')
                                {{ Auth::guard('doctor')->user()->email }}
                            @else
                                invitado@ejemplo.com
                            @endauth
                        </p>
                    </div>

                    <!-- Opciones del menú -->
                    <div class="py-1">
                        <a href="#" class="flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-700 transition-all">
                            <i class="fas fa-user-circle mr-3 text-indigo-500 w-5 text-center"></i> Perfil
                        </a>
                        <a href="#" class="flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-700 transition-all">
                            <i class="fas fa-cog mr-3 text-indigo-500 w-5 text-center"></i> Configuración
                        </a>
                        <a href="#" class="flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-700 transition-all">
                            <i class="fas fa-question-circle mr-3 text-indigo-500 w-5 text-center"></i> Ayuda
                        </a>
                    </div>

                    <!-- Cerrar sesión -->
                    <div class="py-1">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full text-left flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-red-50 hover:text-red-700 transition-all">
                                <i class="fas fa-sign-out-alt mr-3 text-red-500 w-5 text-center"></i> Cerrar sesión
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Menú hamburguesa (solo móvil) -->
            <button @click="open = !open" class="lg:hidden p-2 rounded-lg hover:bg-white/10 focus:outline-none transition-all">
                <svg x-show="!open" class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg x-show="open" class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Menú móvil -->
    <div x-show="open" x-transition class="lg:hidden bg-indigo-700 shadow-inner">
        <div class="px-2 pt-2 pb-4 space-y-2 sm:px-4">
            <a href="#" class="flex items-center px-4 py-3 rounded-lg text-base font-medium text-white hover:bg-white/10 transition-all">
                <i class="fas fa-tachometer-alt mr-3 w-5 text-center"></i> Dashboard
            </a>
            <a href="#" class="flex items-center px-4 py-3 rounded-lg text-base font-medium text-white hover:bg-white/10 transition-all">
                <i class="fas fa-user-injured mr-3 w-5 text-center"></i> Pacientes
            </a>
            <a href="#" class="flex items-center px-4 py-3 rounded-lg text-base font-medium text-white hover:bg-white/10 transition-all">
                <i class="fas fa-calendar-check mr-3 w-5 text-center"></i> Agenda
            </a>
            <a href="#" class="flex items-center px-4 py-3 rounded-lg text-base font-medium text-white hover:bg-white/10 transition-all">
                <i class="fas fa-cog mr-3 w-5 text-center"></i> Configuración
            </a>
        </div>
    </div>
</header>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
