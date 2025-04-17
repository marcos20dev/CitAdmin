@extends('plantillas.soporte.menu')

@section('title', 'Registro de Cuenta de Administrador')

@section('menu')
    @include('vistas.soporte.menu_soporte')
@endsection

@section('soprote')
    <!-- Sistema de Notificaciones Holográficas -->
    <div id="notificationsHoloSystem" class="fixed inset-0 pointer-events-none z-50 flex justify-end items-start pt-24 pr-6">
        <!-- Notificación flotante principal -->
        <div id="holoNotification" class="hidden w-96 bg-opacity-90 backdrop-blur-lg rounded-2xl overflow-hidden shadow-2xl transform transition-all duration-500 ease-[cubic-bezier(0.68,-0.6,0.32,1.6)] translate-x-full">
            <div class="absolute inset-0 bg-gradient-to-br opacity-30 from-blue-500 to-purple-600"></div>
            <div class="relative p-5 flex items-start">
                <div id="holoIcon" class="flex-shrink-0 text-2xl mr-4 mt-1"></div>
                <div class="flex-1">
                    <h3 id="holoTitle" class="text-lg font-bold text-white"></h3>
                    <p id="holoMessage" class="text-white text-opacity-90 mt-1"></p>
                </div>
                <button onclick="dismissHolo()" class="text-white text-opacity-70 hover:text-opacity-100 ml-4">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div id="holoProgress" class="h-1 bg-white bg-opacity-30 w-full"></div>
        </div>
    </div>

    <!-- Panel de Notificaciones Holográfico -->
    <div id="holoPanel" class="fixed top-24 right-6 w-96 bg-gray-900 bg-opacity-80 backdrop-blur-xl rounded-2xl shadow-2xl border border-white border-opacity-10 z-50 transform transition-all duration-500 ease-[cubic-bezier(0.68,-0.6,0.32,1.6)] translate-x-full hidden overflow-hidden">
        <div class="relative">
            <!-- Encabezado con efecto neón -->
            <div class="p-5 border-b border-white border-opacity-10">
                <div class="flex justify-between items-center">
                    <h3 class="text-xl font-bold text-white flex items-center">
                        <i class="fas fa-bell mr-3 text-blue-400"></i>
                        <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-purple-400">Notificaciones</span>
                    </h3>
                    <div class="flex space-x-3">
                        <button onclick="clearAllNotifications()" class="text-blue-400 hover:text-blue-300 transition-colors" title="Limpiar todo">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                        <button onclick="toggleHoloPanel()" class="text-white text-opacity-70 hover:text-opacity-100 transition-colors">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="mt-3 flex items-center">
                    <div class="flex-1 h-1 bg-white bg-opacity-10 rounded-full overflow-hidden">
                        <div class="h-full bg-gradient-to-r from-blue-500 to-purple-500 rounded-full" style="width: 60%"></div>
                    </div>
                    <span class="ml-3 text-xs text-blue-400 font-mono">Sistema al 60%</span>
                </div>
            </div>

            <!-- Lista de notificaciones -->
            <div class="max-h-[70vh] overflow-y-auto custom-scroll">
                <ul id="holoNotificationsList" class="divide-y divide-white divide-opacity-5">
                    <!-- Notificaciones se insertarán aquí dinámicamente -->
                </ul>
            </div>

            <!-- Pie con efecto de conexión -->
            <div class="p-4 border-t border-white border-opacity-10 flex justify-between items-center">
                <div class="flex items-center">
                    <div class="w-2 h-2 rounded-full bg-green-400 mr-2 animate-pulse"></div>
                    <span class="text-xs text-white text-opacity-70 font-mono">Conectado</span>
                </div>
                <button class="text-xs bg-white bg-opacity-10 hover:bg-opacity-20 text-white px-3 py-1 rounded-full transition-all flex items-center">
                    <i class="fas fa-sync-alt mr-1 text-xs"></i> Actualizar
                </button>
            </div>
        </div>
    </div>

    <!-- Botón Flotante Futurista -->
    <div class="fixed bottom-8 right-8 z-40">
        <button id="holoButton" onclick="toggleHoloPanel()" class="w-16 h-16 rounded-full bg-gradient-to-br from-blue-600 to-purple-600 shadow-2xl flex items-center justify-center text-white transform transition-all duration-300 hover:scale-110 hover:shadow-xl active:scale-95 group">
            <div class="absolute inset-0 rounded-full border-2 border-white border-opacity-30 animate-ping-slow opacity-0 group-hover:opacity-100 transition-opacity"></div>
            <i class="fas fa-bell text-xl"></i>
            <span id="holoBadge" class="absolute -top-1 -right-1 bg-red-500 text-white text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center hidden shadow-lg">0</span>
        </button>
    </div>

    <!-- Contenedor Principal con Efecto de Cristal -->
    <div class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 py-8 px-4 sm:px-6 relative overflow-hidden">
        <!-- Efectos de partículas -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="particle absolute rounded-full bg-blue-500 bg-opacity-10"></div>
            <div class="particle absolute rounded-full bg-purple-500 bg-opacity-10"></div>
            <div class="particle absolute rounded-full bg-blue-400 bg-opacity-10"></div>
        </div>

        <div class="container mx-auto relative z-10">
            <!-- Encabezado Futurista -->
            <header class="mb-10">
                <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
                    <div class="relative">
                        <h1 class="text-4xl md:text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-400 leading-tight">
                            Gestión de <span class="text-white">Administradores</span>
                        </h1>
                        <p class="text-gray-400 mt-3 text-sm md:text-base max-w-2xl">
                            <span class="text-blue-400">Sistema de control</span> y administración de cuentas privilegiadas con tecnología <span class="text-purple-400">de última generación</span>
                        </p>
                        <div class="absolute -top-6 -left-6 w-16 h-16 rounded-full bg-blue-500 bg-opacity-20 blur-xl"></div>
                    </div>

                    <!-- Búsqueda con efecto neón -->
                    <form method="GET" action="{{ route('soporte.buscar') }}" class="w-full md:w-auto relative">
                        <div class="relative flex items-center">
                            <div class="absolute inset-0 bg-blue-500 rounded-xl opacity-20 blur-md"></div>
                            <input type="text" name="buscar" value="{{ request('buscar') }}" placeholder="Buscar administrador..."
                                   class="relative pl-12 pr-4 py-3 rounded-xl border border-gray-700 bg-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent w-full md:w-64 text-white placeholder-gray-500 shadow-lg transition-all duration-200">
                            <i class="fas fa-search absolute left-4 text-blue-400"></i>
                            <button type="submit"
                                    class="relative ml-2 bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-500 hover:to-blue-400 text-white px-5 py-3 rounded-xl shadow-lg transition-all duration-300 flex items-center group">
                                <span>Buscar</span>
                                <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-1 transition-transform"></i>
                            </button>
                            @if(request()->has('buscar'))
                                <a href="{{ route('soporte.buscar') }}"
                                   class="relative ml-2 bg-gray-700 hover:bg-gray-600 text-gray-300 px-4 py-3 rounded-xl shadow-lg transition-all duration-300 flex items-center">
                                    <i class="fas fa-times mr-1"></i>
                                    Limpiar
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </header>

            <!-- Grid Principal con Efecto 3D -->
            <main class="grid grid-cols-1 xl:grid-cols-12 gap-8 transform-style-preserve-3d perspective-1000">
                <!-- Tarjeta: Formulario de Registro (Efecto de Cristal) -->
                <section class="xl:col-span-4 bg-gray-800 bg-opacity-60 backdrop-blur-md rounded-2xl shadow-2xl border border-gray-700 border-opacity-50 overflow-hidden transform transition-all hover:-translate-y-1 hover:shadow-xl">
                    <!-- Encabezado con gradiente animado -->
                    <div class="p-5 text-white relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-purple-600 opacity-80 animate-gradient-x"></div>
                        <div class="relative z-10 flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-white bg-opacity-20 rounded-full flex items-center justify-center mr-4 backdrop-blur-sm">
                                    <i class="fas {{ isset($adminEditar) ? 'fa-user-edit' : 'fa-user-plus' }} text-xl"></i>
                                </div>
                                <div>
                                    <h2 class="text-lg font-bold">{{ isset($adminEditar) ? 'Editar Administrador' : 'Nuevo Administrador' }}</h2>
                                    <p class="text-blue-100 text-opacity-80 text-sm">{{ isset($adminEditar) ? 'Modifique los campos necesarios' : 'Complete el formulario para registrar' }}</p>
                                </div>
                            </div>
                            <div class="bg-black bg-opacity-30 text-xs font-semibold px-3 py-1 rounded-full shadow-lg backdrop-blur-sm">
                                {{ isset($adminEditar) ? 'MODO EDICIÓN' : 'PASO 1/2' }}
                            </div>
                        </div>
                    </div>

                    <!-- Cuerpo del formulario con scroll personalizado -->
                    <div class="p-5 overflow-y-auto custom-scroll" style="max-height: calc(100vh - 250px)">
                        <form method="POST" action="{{ isset($adminEditar) ? route('soporte.update', $adminEditar->id) : route('soporte.store') }}" enctype="multipart/form-data" class="space-y-6">
                            @csrf
                            @if(isset($adminEditar))
                                @method('PUT')
                            @endif

                            <!-- Foto de Perfil con Efecto Hover 3D -->
                            <div class="flex flex-col items-center space-y-4">
                                <div class="relative group cursor-pointer transform-style-preserve-3d">
                                    <div class="relative overflow-hidden rounded-full w-28 h-28 border-4 border-gray-700 shadow-xl transition-transform duration-700 group-hover:rotate-y-180">
                                        <div class="absolute inset-0 bg-gradient-to-br from-blue-500 to-purple-600 opacity-20 rounded-full"></div>
                                        <img id="fotoPreview"
                                             src="@if(isset($adminEditar) && $adminEditar->foto_perfil)
                                                    data:image/jpeg;base64,{{ $adminEditar->foto_perfil }}
                                                  @else
                                                    https://ui-avatars.com/api/?name={{ isset($adminEditar) ? urlencode($adminEditar->nombre[0].' '.$adminEditar->apellidos[0]) : 'N+U' }}&background=random&color=fff&size=128
                                                  @endif"
                                             class="w-full h-full object-cover transition-all duration-300 group-hover:scale-110">
                                        <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-full">
                                            <label for="foto_perfil" class="cursor-pointer">
                                                <i class="fas fa-camera text-white text-2xl"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <label for="foto_perfil" class="absolute -bottom-2 -right-2 bg-gradient-to-r {{ isset($adminEditar) ? 'from-red-500 to-red-600' : 'from-blue-500 to-blue-600' }} text-white p-2 rounded-full cursor-pointer shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-110 hover:rotate-12 flex items-center justify-center w-10 h-10">
                                        <i class="fas fa-pencil-alt"></i>
                                        <input type="file" id="foto_perfil" name="foto_perfil" class="hidden" accept="image/*" onchange="previewImage(this)">
                                    </label>
                                </div>
                                <span class="text-xs text-gray-500">Formatos: JPG, PNG (Máx. 2MB)</span>
                            </div>

                            <!-- Secciones del formulario con acordeón -->
                            <div class="space-y-6">
                                <!-- Información Personal -->
                                <div class="accordion-item" x-data="{ open: true }">
                                    <button @click="open = !open" type="button" class="flex items-center justify-between w-full group">
                                        <div class="flex items-center">
                                            <div class="w-2 h-6 bg-blue-500 rounded-full mr-3 transition-all duration-300" :class="{ 'bg-purple-500': !open }"></div>
                                            <h3 class="text-sm font-semibold text-white" :class="{ 'text-purple-400': !open }">Información Personal</h3>
                                        </div>
                                        <i class="fas fa-chevron-down text-gray-500 transform transition-transform duration-300" :class="{ 'rotate-180': open }"></i>
                                    </button>

                                    <div x-show="open" x-collapse class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <!-- DNI -->
                                        <div class="space-y-2">
                                            <label class="block text-sm font-medium text-gray-400">DNI <span class="text-red-500">*</span></label>
                                            <div class="relative">
                                                <div class="absolute inset-0 bg-blue-500 rounded-xl opacity-10 blur-sm"></div>
                                                <input type="text" name="dni" placeholder="Ingrese DNI"
                                                       value="{{ $adminEditar->dni ?? old('dni') }}"
                                                       pattern="\d{8}" maxlength="8"
                                                       onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                                       class="relative w-full px-4 py-2.5 border border-gray-700 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-800 text-white shadow-sm text-sm">
                                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                                    <i class="fas fa-id-card text-blue-400 text-sm"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Nombres -->
                                        <div class="space-y-2">
                                            <label class="block text-sm font-medium text-gray-400">Nombres <span class="text-red-500">*</span></label>
                                            <div class="relative">
                                                <div class="absolute inset-0 bg-blue-500 rounded-xl opacity-10 blur-sm"></div>
                                                <input type="text" name="nombre" placeholder="Ingrese nombres"
                                                       value="{{ $adminEditar->nombre ?? old('nombre') }}"
                                                       pattern="[A-Za-zÁ-Úá-ú\s]+" title="Solo se permiten letras y espacios"
                                                       oninput="this.value = this.value.replace(/[^A-Za-zÁ-Úá-ú\s]/g,'')"
                                                       class="relative w-full px-4 py-2.5 border border-gray-700 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-800 text-white shadow-sm text-sm">
                                            </div>
                                        </div>

                                        <!-- Apellidos -->
                                        <div class="space-y-2">
                                            <label class="block text-sm font-medium text-gray-400">Apellidos <span class="text-red-500">*</span></label>
                                            <div class="relative">
                                                <div class="absolute inset-0 bg-blue-500 rounded-xl opacity-10 blur-sm"></div>
                                                <input type="text" name="apellidos" placeholder="Ingrese apellidos"
                                                       value="{{ $adminEditar->apellidos ?? old('apellidos') }}"
                                                       pattern="[A-Za-zÁ-Úá-ú\s]+" title="Solo se permiten letras y espacios"
                                                       oninput="this.value = this.value.replace(/[^A-Za-zÁ-Úá-ú\s]/g,'')"
                                                       class="relative w-full px-4 py-2.5 border border-gray-700 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-800 text-white shadow-sm text-sm">
                                            </div>
                                        </div>

                                        <!-- Correo Electrónico -->
                                        <div class="space-y-2">
                                            <label class="block text-sm font-medium text-gray-400">Correo Electrónico <span class="text-red-500">*</span></label>
                                            <div class="relative">
                                                <div class="absolute inset-0 bg-blue-500 rounded-xl opacity-10 blur-sm"></div>
                                                <input type="email" name="usuario" placeholder="ejemplo@dominio.com"
                                                       value="{{ $adminEditar->usuario ?? old('usuario') }}"
                                                       pattern="[^\s@]+@[^\s@]+\.[^\s@]+" title="Ingrese un correo válido"
                                                       class="relative w-full px-4 py-2.5 border border-gray-700 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-800 text-white shadow-sm text-sm">
                                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                                    <i class="fas fa-envelope text-blue-400 text-sm"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Teléfono -->
                                        <div class="space-y-2">
                                            <label class="block text-sm font-medium text-gray-400">Teléfono</label>
                                            <div class="relative">
                                                <div class="absolute inset-0 bg-blue-500 rounded-xl opacity-10 blur-sm"></div>
                                                <input type="text" name="telefono" placeholder="Ingrese número"
                                                       value="{{ $adminEditar->telefono ?? old('telefono') }}"
                                                       pattern="9\d{8}" maxlength="9"
                                                       onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                                       class="relative w-full px-4 py-2.5 border border-gray-700 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-800 text-white shadow-sm text-sm">
                                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                                    <i class="fas fa-phone text-blue-400 text-sm"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Credenciales de Acceso (solo en modo creación) -->
                                @unless(isset($adminEditar))
                                    <div class="accordion-item" x-data="{ open: false }">
                                        <button @click="open = !open" type="button" class="flex items-center justify-between w-full group">
                                            <div class="flex items-center">
                                                <div class="w-2 h-6 bg-blue-500 rounded-full mr-3 transition-all duration-300" :class="{ 'bg-purple-500': !open }"></div>
                                                <h3 class="text-sm font-semibold text-white" :class="{ 'text-purple-400': !open }">Credenciales de Acceso</h3>
                                            </div>
                                            <i class="fas fa-chevron-down text-gray-500 transform transition-transform duration-300" :class="{ 'rotate-180': open }"></i>
                                        </button>

                                        <div x-show="open" x-collapse class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                                            <!-- Contraseña -->
                                            <div class="space-y-2">
                                                <label class="block text-sm font-medium text-gray-400">Contraseña <span class="text-red-500">*</span></label>
                                                <div class="relative">
                                                    <div class="absolute inset-0 bg-blue-500 rounded-xl opacity-10 blur-sm"></div>
                                                    <input type="password" id="password" name="password" placeholder="Contraseña"
                                                           class="relative w-full px-4 py-2.5 border border-gray-700 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-800 text-white shadow-sm text-sm">
                                                    <button type="button" onclick="togglePasswordVisibility()" class="absolute inset-y-0 right-0 flex items-center pr-3 text-blue-400 hover:text-blue-300">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                </div>
                                                <div class="mt-2">
                                                    <div class="w-full bg-gray-700 rounded-full h-1.5 overflow-hidden">
                                                        <div id="strength-bar" class="h-full w-0 transition-all duration-500 ease-out"></div>
                                                    </div>
                                                    <div id="strength-hints" class="text-xs text-gray-400 mt-1.5 flex justify-between">
                                                        <span id="strength-text" class="font-medium">Seguridad</span>
                                                        <span id="strength-hint" class="text-right"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Confirmar Contraseña -->
                                            <div class="space-y-2">
                                                <label class="block text-sm font-medium text-gray-400">Confirmar Contraseña <span class="text-red-500">*</span></label>
                                                <div class="relative">
                                                    <div class="absolute inset-0 bg-blue-500 rounded-xl opacity-10 blur-sm"></div>
                                                    <input type="password" name="password_confirmation" placeholder="Repita la contraseña"
                                                           class="relative w-full px-4 py-2.5 border border-gray-700 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-800 text-white shadow-sm text-sm">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endunless

                                <!-- Configuración de Cuenta -->
                                <div class="accordion-item" x-data="{ open: true }">
                                    <button @click="open = !open" type="button" class="flex items-center justify-between w-full group">
                                        <div class="flex items-center">
                                            <div class="w-2 h-6 bg-blue-500 rounded-full mr-3 transition-all duration-300" :class="{ 'bg-purple-500': !open }"></div>
                                            <h3 class="text-sm font-semibold text-white" :class="{ 'text-purple-400': !open }">Configuración de Cuenta</h3>
                                        </div>
                                        <i class="fas fa-chevron-down text-gray-500 transform transition-transform duration-300" :class="{ 'rotate-180': open }"></i>
                                    </button>

                                    <div x-show="open" x-collapse class="mt-4">
                                        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                                            <!-- Toggle Estado -->
                                            <div class="flex items-center">
                                                <input type="hidden" name="estado" value="0">
                                                <label class="relative inline-flex items-center cursor-pointer">
                                                    <input type="checkbox" name="estado" value="1"
                                                           class="sr-only peer"
                                                        {{ ($adminEditar->activo ?? old('estado', true)) ? 'checked' : '' }}>
                                                    <span class="slider"></span>
                                                    <span class="ml-3 text-gray-300 font-medium text-sm">Cuenta activa</span>
                                                </label>
                                            </div>

                                            <!-- Cargo del usuario -->
                                            <div class="w-full md:w-48 relative" x-data="{ open: false, search: '{{ $adminEditar->cargo ?? old('cargo') }}', roles: ['Administrador', 'Soporte Técnico', 'Editor', 'Supervisor', 'Auditor'] }">
                                                <label class="block text-xs font-medium text-gray-400 mb-1">Cargo del usuario</label>
                                                <div class="relative">
                                                    <div class="absolute inset-0 bg-blue-500 rounded-xl opacity-10 blur-sm"></div>
                                                    <input type="text" name="cargo"
                                                           x-model="search"
                                                           @focus="open = true"
                                                           @input="open = true"
                                                           @click.away="open = false"
                                                           placeholder="Seleccionar rol..."
                                                           value="{{ $adminEditar->cargo ?? old('cargo') }}"
                                                           class="relative w-full px-4 py-2.5 border border-gray-700 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-800 text-white shadow-sm text-sm">
                                                    <ul x-show="open && roles.filter(r => r.toLowerCase().includes(search.toLowerCase())).length > 0"
                                                        class="absolute z-10 w-full mt-1 bg-gray-800 border border-gray-700 rounded-xl shadow-xl max-h-40 overflow-y-auto text-sm"
                                                        x-transition>
                                                        <template x-for="role in roles.filter(r => r.toLowerCase().includes(search.toLowerCase()))" :key="role">
                                                            <li @click="search = role; open = false"
                                                                class="px-4 py-2.5 hover:bg-gray-700 cursor-pointer transition-all border-b border-gray-700 last:border-0">
                                                                <span x-text="role" class="text-white"></span>
                                                            </li>
                                                        </template>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Botón Enviar con Efecto Hover -->
                            <button type="submit"
                                    class="w-full mt-6 bg-gradient-to-r {{ isset($adminEditar) ? 'from-red-500 to-red-600 hover:from-red-400 hover:to-red-500' : 'from-blue-500 to-blue-600 hover:from-blue-400 hover:to-blue-500' }} text-white font-semibold px-6 py-3.5 rounded-xl shadow-lg transition-all duration-300 flex items-center justify-center text-sm group transform hover:-translate-y-0.5 hover:shadow-xl active:translate-y-0">
                                <i class="fas {{ isset($adminEditar) ? 'fa-save' : 'fa-user-plus' }} mr-3 text-lg transition-transform duration-300 group-hover:scale-110"></i>
                                {{ isset($adminEditar) ? 'ACTUALIZAR ADMINISTRADOR' : 'REGISTRAR NUEVO ADMINISTRADOR' }}
                                <i class="fas fa-arrow-right ml-2 opacity-0 transform -translate-x-2 group-hover:translate-x-0 group-hover:opacity-100 transition-all duration-300"></i>
                            </button>
                        </form>
                    </div>
                </section>

                <!-- Tarjeta: Lista de Administradores (Efecto de Cristal) -->
                <section class="xl:col-span-8 bg-gray-800 bg-opacity-60 backdrop-blur-md rounded-2xl shadow-2xl border border-gray-700 border-opacity-50 overflow-hidden transform transition-all hover:-translate-y-1 hover:shadow-xl">
                    <!-- Encabezado con gradiente animado -->
                    <div class="p-5 border-b border-gray-700 border-opacity-50 bg-gray-800 bg-opacity-80">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-blue-500 bg-opacity-20 rounded-full flex items-center justify-center mr-4 backdrop-blur-sm">
                                    <i class="fas fa-users text-blue-400 text-xl"></i>
                                </div>
                                <div>
                                    <h2 class="text-xl font-bold text-white">Administradores Registrados</h2>
                                    <p class="text-gray-400 text-sm">Lista completa de cuentas con privilegios</p>
                                </div>
                            </div>
                            <div class="bg-black bg-opacity-30 text-blue-400 px-3 py-1 rounded-full text-sm font-semibold shadow-lg backdrop-blur-sm flex items-center">
                                <i class="fas fa-database mr-2"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Contenedor de la tabla con scroll personalizado -->
                    <div class="overflow-auto custom-scroll" style="max-height: calc(100vh - 250px)">
                        <table class="min-w-full divide-y divide-gray-700">
                            <thead class="bg-gray-800 sticky top-0">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-blue-400 uppercase tracking-wider">Usuario</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-blue-400 uppercase tracking-wider">Cargo</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-blue-400 uppercase tracking-wider">Estado</th>
                                <th class="px-6 py-4 text-right text-xs font-semibold text-blue-400 uppercase tracking-wider">Acciones</th>
                            </tr>
                            </thead>
                            <tbody class="bg-gray-800 bg-opacity-50 divide-y divide-gray-700">
                                <tr class="hover:bg-gray-700 hover:bg-opacity-50 transition-colors duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10 relative">
                                                @if($admin->foto_perfil)
                                                    <img class="h-10 w-10 rounded-full border-2 border-gray-600" src="data:image/jpeg;base64,{{ $admin->foto_perfil }}" alt="Foto">
                                                @else
                                                    <img class="h-10 w-10 rounded-full border-2 border-gray-600" src="https://ui-avatars.com/api/?name={{ urlencode($admin->nombre) }}" alt="Avatar">
                                                @endif
                                                <div class="absolute -bottom-1 -right-1 w-3 h-3 rounded-full border-2 border-gray-800 {{ $admin->activo ? 'bg-green-400' : 'bg-gray-500' }}"></div>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-white">{{ $admin->nombre }} {{ $admin->apellidos }}</div>
                                                <div class="text-xs text-gray-400">{{ $admin->usuario }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-3 py-1 inline-flex text-xs font-semibold rounded-full bg-blue-500 bg-opacity-20 text-blue-400 border border-blue-400 border-opacity-30">
                                            {{ $admin->cargo }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-3 py-1 inline-flex text-xs font-semibold rounded-full {{ $admin->activo ? 'bg-green-500 bg-opacity-20 text-green-400 border border-green-400 border-opacity-30' : 'bg-gray-500 bg-opacity-20 text-gray-400 border border-gray-400 border-opacity-30' }}">
                                            {{ $admin->activo ? 'Activo' : 'Inactivo' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex justify-end space-x-2">
                                            <!-- Botón Editar -->
                                            <form action="{{ route('soporte.edit', $admin->id) }}" method="GET">
                                                <button type="submit" class="p-2 rounded-full bg-blue-500 bg-opacity-10 hover:bg-opacity-20 text-blue-400 border border-blue-400 border-opacity-30 transition-all duration-200 transform hover:scale-110" title="Editar">
                                                    <i class="fas fa-pen fa-sm"></i>
                                                </button>
                                            </form>
                                            <!-- Botón Toggle Estado -->
                                            <form action="{{ route('soporte.toggle', $admin->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="p-2 rounded-full bg-yellow-500 bg-opacity-10 hover:bg-opacity-20 text-yellow-400 border border-yellow-400 border-opacity-30 transition-all duration-200 transform hover:scale-110" title="{{ $admin->activo ? 'Desactivar' : 'Activar' }}">
                                                    <i class="fas {{ $admin->activo ? 'fa-toggle-on' : 'fa-toggle-off' }} fa-sm"></i>
                                                </button>
                                            </form>
                                            <!-- Botón Eliminar -->
                                            <form action="{{ route('soporte.eliminarAdministrador', $admin->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro que deseas eliminar este administrador?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-2 rounded-full bg-red-500 bg-opacity-10 hover:bg-opacity-20 text-red-400 border border-red-400 border-opacity-30 transition-all duration-200 transform hover:scale-110" title="Eliminar">
                                                    <i class="fas fa-trash fa-sm"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Paginación Futurista -->
                    <div class="px-6 py-4 border-t border-gray-700 border-opacity-50 bg-gray-800 bg-opacity-80">
                        <div class="flex flex-col md:flex-row items-center justify-between space-y-4 md:space-y-0">
                            <div class="text-sm text-gray-400">
                                Mostrando <span class="font-medium text-white">1</span> a <span class="font-medium text-white">3</span> de <span class="font-medium text-white">8</span> resultados
                            </div>
                            <div class="flex items-center space-x-2">
                                <button class="px-3 py-1.5 rounded-lg bg-gray-700 hover:bg-gray-600 text-gray-300 border border-gray-600 transition-all duration-200 transform hover:-translate-x-0.5">
                                    <i class="fas fa-chevron-left"></i>
                                </button>
                                <button class="px-3.5 py-1.5 rounded-lg bg-blue-500 text-white shadow-lg transform hover:scale-110 transition-all">1</button>
                                <button class="px-3.5 py-1.5 rounded-lg bg-gray-700 hover:bg-gray-600 text-gray-300 border border-gray-600 transition-all duration-200">2</button>
                                <button class="px-3.5 py-1.5 rounded-lg bg-gray-700 hover:bg-gray-600 text-gray-300 border border-gray-600 transition-all duration-200">3</button>
                                <button class="px-3 py-1.5 rounded-lg bg-gray-700 hover:bg-gray-600 text-gray-300 border border-gray-600 transition-all duration-200 transform hover:translate-x-0.5">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>

    <!-- Estilos personalizados avanzados -->
    <style>
        /* Efectos de partículas */
        .particle {
            animation: float 15s infinite ease-in-out;
        }
        .particle:nth-child(1) {
            width: 300px;
            height: 300px;
            top: -100px;
            left: -100px;
            animation-delay: 0s;
        }
        .particle:nth-child(2) {
            width: 400px;
            height: 400px;
            bottom: -150px;
            right: -100px;
            animation-delay: 3s;
        }
        .particle:nth-child(3) {
            width: 250px;
            height: 250px;
            top: 50%;
            right: 20%;
            animation-delay: 6s;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            25% { transform: translate(10px, 10px) rotate(5deg); }
            50% { transform: translate(-10px, 5px) rotate(-5deg); }
            75% { transform: translate(5px, -10px) rotate(3deg); }
        }

        /* Scroll personalizado */
        .custom-scroll::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        .custom-scroll::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
        }
        .custom-scroll::-webkit-scrollbar-thumb {
            background: rgba(99, 102, 241, 0.5);
            border-radius: 10px;
        }
        .custom-scroll::-webkit-scrollbar-thumb:hover {
            background: rgba(99, 102, 241, 0.7);
        }

        /* Animación de gradiente */
        @keyframes gradient-x {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .animate-gradient-x {
            background-size: 200% auto;
            animation: gradient-x 3s ease infinite;
        }

        /* Ping lento para efectos */
        @keyframes ping-slow {
            0% { transform: scale(1); opacity: 0.5; }
            100% { transform: scale(1.5); opacity: 0; }
        }
        .animate-ping-slow {
            animation: ping-slow 3s cubic-bezier(0, 0, 0.2, 1) infinite;
        }

        /* Efecto de cristal */
        .glass-effect {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Preservar 3D para efectos */
        .transform-style-preserve-3d {
            transform-style: preserve-3d;
        }
        .perspective-1000 {
            perspective: 1000px;
        }

        /* Acordeón personalizado */
        .accordion-item {
            background: rgba(255, 255, 255, 0.03);
            border-radius: 12px;
            padding: 12px;
            transition: all 0.3s ease;
        }
        .accordion-item:hover {
            background: rgba(255, 255, 255, 0.05);
        }
    </style>

    <!-- JavaScript Avanzado -->
    <script>
        // Datos falsos para notificaciones
        const fakeNotifications = [
            {
                id: 1,
                type: 'success',
                title: 'Registro exitoso',
                message: 'El administrador Juan Pérez ha sido registrado correctamente en el sistema.',
                time: 'Hace 5 minutos',
                read: false,
                icon: 'fa-user-check'
            },
            {
                id: 2,
                type: 'info',
                title: 'Actualización del sistema',
                message: 'Nueva versión 2.5.3 disponible. Actualice para obtener las últimas características.',
                time: 'Hace 2 horas',
                read: false,
                icon: 'fa-system-update'
            },
            {
                id: 3,
                type: 'error',
                title: 'Error de conexión',
                message: 'Problemas detectados en el servidor de base de datos. Intente nuevamente.',
                time: 'Hace 1 día',
                read: true,
                icon: 'fa-database'
            },
            {
                id: 4,
                type: 'success',
                title: 'Copia de seguridad',
                message: 'La copia de seguridad nocturna se completó exitosamente.',
                time: 'Ayer, 11:30 PM',
                read: true,
                icon: 'fa-cloud-upload-alt'
            },
            {
                id: 5,
                type: 'info',
                title: 'Nuevo mensaje',
                message: 'Tiene un nuevo mensaje del equipo de soporte técnico.',
                time: 'Ayer, 4:45 PM',
                read: true,
                icon: 'fa-envelope'
            },
            {
                id: 6,
                type: 'warning',
                title: 'Alerta de seguridad',
                message: 'Se detectaron 3 intentos fallidos de inicio de sesión en su cuenta.',
                time: 'Ayer, 3:20 PM',
                read: true,
                icon: 'fa-shield-alt'
            }
        ];

        // Mostrar notificación holográfica
        function showHoloNotification(type, title, message) {
            const holo = document.getElementById('holoNotification');
            const icon = document.getElementById('holoIcon');
            const holoTitle = document.getElementById('holoTitle');
            const holoMessage = document.getElementById('holoMessage');
            const progress = document.getElementById('holoProgress');

            // Configurar según el tipo
            let iconClass, bgClass;
            switch(type) {
                case 'success':
                    iconClass = 'fa-check-circle text-green-400';
                    bgClass = 'from-green-500 to-blue-500';
                    break;
                case 'error':
                    iconClass = 'fa-exclamation-circle text-red-400';
                    bgClass = 'from-red-500 to-purple-500';
                    break;
                case 'warning':
                    iconClass = 'fa-exclamation-triangle text-yellow-400';
                    bgClass = 'from-yellow-500 to-orange-500';
                    break;
                default:
                    iconClass = 'fa-info-circle text-blue-400';
                    bgClass = 'from-blue-500 to-purple-500';
            }

            // Configurar contenido
            icon.className = `fas ${iconClass} text-2xl`;
            holoTitle.textContent = title;
            holoMessage.textContent = message;
            holo.className = `holo-notification w-96 bg-opacity-90 backdrop-blur-lg rounded-2xl overflow-hidden shadow-2xl transform transition-all duration-500 ease-[cubic-bezier(0.68,-0.6,0.32,1.6)] translate-x-0`;
            holo.style.background = `linear-gradient(135deg, var(--tw-gradient-stops))`;
            holo.style.setProperty('--tw-gradient-from', bgClass.split(' to ')[0].replace('from-', ''));
            holo.style.setProperty('--tw-gradient-to', bgClass.split(' to ')[1]);

            // Animación de progreso
            progress.style.width = '100%';
            progress.style.transition = 'width 5s linear';
            setTimeout(() => {
                progress.style.width = '0%';
            }, 50);

            // Auto cerrar después de 5 segundos
            setTimeout(() => {
                dismissHolo();
            }, 5000);
        }

        // Cerrar notificación holográfica
        function dismissHolo() {
            const holo = document.getElementById('holoNotification');
            holo.className = `holo-notification w-96 bg-opacity-90 backdrop-blur-lg rounded-2xl overflow-hidden shadow-2xl transform transition-all duration-500 ease-[cubic-bezier(0.68,-0.6,0.32,1.6)] translate-x-full`;
        }

        // Alternar panel holográfico
        function toggleHoloPanel() {
            const panel = document.getElementById('holoPanel');
            panel.classList.toggle('translate-x-full');
            panel.classList.toggle('hidden');

            // Marcar como leídas al abrir
            if (!panel.classList.contains('translate-x-full')) {
                fakeNotifications.forEach(n => n.read = true);
                renderHoloNotifications();
            }
        }

        // Renderizar notificaciones en el panel
        function renderHoloNotifications() {
            const list = document.getElementById('holoNotificationsList');
            const unreadCount = fakeNotifications.filter(n => !n.read).length;
            const badge = document.getElementById('holoBadge');

            // Actualizar badge
            if (unreadCount > 0) {
                badge.textContent = unreadCount;
                badge.classList.remove('hidden');
                // Animación de notificación
                document.getElementById('holoButton').classList.add('animate-pulse');
                setTimeout(() => {
                    document.getElementById('holoButton').classList.remove('animate-pulse');
                }, 1000);
            } else {
                badge.classList.add('hidden');
            }

            // Limpiar lista
            list.innerHTML = '';

            // Agregar notificaciones
            fakeNotifications.forEach(notification => {
                const li = document.createElement('li');
                li.className = notification.read ? 'bg-opacity-0' : 'bg-blue-500 bg-opacity-5 unread';

                let textColor, borderColor, iconColor;
                switch(notification.type) {
                    case 'success':
                        textColor = 'text-green-400';
                        borderColor = 'border-green-400';
                        iconColor = 'text-green-400';
                        break;
                    case 'error':
                        textColor = 'text-red-400';
                        borderColor = 'border-red-400';
                        iconColor = 'text-red-400';
                        break;
                    case 'warning':
                        textColor = 'text-yellow-400';
                        borderColor = 'border-yellow-400';
                        iconColor = 'text-yellow-400';
                        break;
                    default:
                        textColor = 'text-blue-400';
                        borderColor = 'border-blue-400';
                        iconColor = 'text-blue-400';
                }

                li.innerHTML = `
                    <div class="p-4 hover:bg-white hover:bg-opacity-5 transition-colors cursor-pointer">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 mt-1">
                                <div class="h-10 w-10 rounded-full ${iconColor} bg-opacity-10 border ${borderColor} border-opacity-30 flex items-center justify-center">
                                    <i class="fas ${notification.icon || 'fa-bell'}"></i>
                                </div>
                            </div>
                            <div class="ml-3 flex-1">
                                <div class="flex justify-between">
                                    <h4 class="text-sm font-medium text-white">${notification.title}</h4>
                                    <span class="text-xs ${textColor}">${notification.time}</span>
                                </div>
                                <p class="text-sm text-gray-400 mt-1">${notification.message}</p>
                            </div>
                        </div>
                    </div>
                `;

                list.appendChild(li);
            });
        }

        // Limpiar todas las notificaciones
        function clearAllNotifications() {
            fakeNotifications.forEach(n => n.read = true);
            renderHoloNotifications();
            showHoloNotification('success', 'Notificaciones limpiadas', 'Todas las notificaciones han sido marcadas como leídas');
        }

        // Función para la vista previa de la imagen
        function previewImage(input) {
            if (input.files && input.files[0]) {
                if (input.files[0].size > 2 * 1024 * 1024) {
                    showHoloNotification('error', 'Error de carga', 'La imagen no debe superar los 2MB');
                    input.value = '';
                    return;
                }
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('fotoPreview').setAttribute('src', e.target.result);
                    showHoloNotification('success', 'Imagen cargada', 'La foto de perfil se ha cargado correctamente');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        // Alternar visibilidad de la contraseña
        function togglePasswordVisibility() {
            const passwordField = document.getElementById('password');
            const eyeIcon = passwordField.nextElementSibling.querySelector('i');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                passwordField.type = 'password';
                eyeIcon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }

        // Medidor de fuerza de contraseña
        document.getElementById('password').addEventListener('input', function(e) {
            const password = e.target.value;
            const strengthBar = document.getElementById('strength-bar');
            const strengthText = document.getElementById('strength-text');
            const strengthHint = document.getElementById('strength-hint');

            // Reiniciar
            strengthBar.style.width = '0%';
            strengthBar.className = 'h-full transition-all duration-500 ease-out';
            strengthText.textContent = 'Seguridad';
            strengthText.className = 'font-medium text-gray-400';
            strengthHint.textContent = '';

            if (!password) return;

            // Calcular fuerza
            let strength = 0;
            let suggestions = [];

            if (password.length >= 6) strength += 20;
            if (password.length >= 10) strength += 20;
            else suggestions.push('Mínimo 10 caracteres');

            if (/[A-Z]/.test(password)) strength += 15;
            else suggestions.push('Añadir mayúsculas');

            if (/[0-9]/.test(password)) strength += 15;
            else suggestions.push('Añadir números');

            if (/[^A-Za-z0-9]/.test(password)) strength += 15;
            else suggestions.push('Añadir símbolos');

            if (/(.)\1{2,}/.test(password)) strength -= 10;
            if (/123|abc|qwerty/.test(password.toLowerCase())) strength -= 15;

            strength = Math.max(0, Math.min(100, strength));
            strengthBar.style.width = strength + '%';

            if (strength < 40) {
                strengthBar.className = 'h-full bg-red-500 transition-all duration-500 ease-out';
                strengthText.textContent = 'Débil';
                strengthText.className = 'font-medium text-red-400';
            } else if (strength < 70) {
                strengthBar.className = 'h-full bg-yellow-500 transition-all duration-500 ease-out';
                strengthText.textContent = 'Moderada';
                strengthText.className = 'font-medium text-yellow-400';
            } else {
                strengthBar.className = 'h-full bg-green-500 transition-all duration-500 ease-out';
                strengthText.textContent = 'Fuerte';
                strengthText.className = 'font-medium text-green-400';
            }

            if (suggestions.length > 0 && strength < 70) {
                strengthHint.textContent = 'Sugerencias: ' + suggestions.join(', ');
            }
        });

        // Inicializar
        document.addEventListener('DOMContentLoaded', function() {
            // Renderizar notificaciones
            renderHoloNotifications();

            // Mostrar notificación de bienvenida
            setTimeout(() => {
                showHoloNotification('info', 'Bienvenido al panel', 'Sistema de administración de usuarios cargado correctamente');
            }, 1000);

            // Mostrar notificaciones aleatorias cada 30 segundos (demo)
            setInterval(() => {
                const types = ['success', 'info', 'warning', 'error'];
                const titles = [
                    'Nuevo registro',
                    'Actualización del sistema',
                    'Alerta de seguridad',
                    'Copia de seguridad',
                    'Mensaje importante'
                ];
                const messages = [
                    'Se ha registrado un nuevo administrador en el sistema',
                    'El rendimiento del servidor es óptimo',
                    'Se detectaron intentos de acceso no autorizados',
                    'La última copia de seguridad se completó con éxito',
                    'Revise los nuevos mensajes en su bandeja'
                ];
                const icons = [
                    'fa-user-plus',
                    'fa-server',
                    'fa-shield-alt',
                    'fa-database',
                    'fa-envelope'
                ];

                const randomIndex = Math.floor(Math.random() * types.length);
                const randomType = types[randomIndex];
                const randomTitle = titles[Math.floor(Math.random() * titles.length)];
                const randomMessage = messages[Math.floor(Math.random() * messages.length)];
                const randomIcon = icons[Math.floor(Math.random() * icons.length)];

                // Mostrar notificación flotante
                showHoloNotification(randomType, randomTitle, randomMessage);

                // Agregar a la lista de notificaciones
                fakeNotifications.unshift({
                    id: Date.now(),
                    type: randomType,
                    title: randomTitle,
                    message: randomMessage,
                    time: 'Hace unos segundos',
                    read: false,
                    icon: randomIcon
                });

                // Actualizar lista
                renderHoloNotifications();
            }, 30000);

            // Efectos de partículas
            const particles = document.querySelectorAll('.particle');
            particles.forEach((particle, index) => {
                // Posiciones aleatorias
                const randomX = Math.random() * 20 - 10;
                const randomY = Math.random() * 20 - 10;
                particle.style.transform = `translate(${randomX}px, ${randomY}px)`;

                // Tamaños aleatorios
                const randomSize = Math.random() * 100 + 200;
                particle.style.width = `${randomSize}px`;
                particle.style.height = `${randomSize}px`;
            });

            // Inicializar Alpine.js para componentes interactivos
            if (typeof Alpine === 'undefined') {
                console.warn('Alpine.js no está cargado');
            }
        });

        // Mostrar notificaciones de sesión si existen
        @if(session('success'))
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(() => {
                showHoloNotification('success', 'Operación exitosa', '{{ session('success') }}');
            }, 1500);
        });
        @endif

        @if($errors->any()))
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(() => {
                @foreach($errors->all() as $error)
                showHoloNotification('error', 'Error en el formulario', '{{ $error }}');
                @endforeach
            }, 2000);
        });
        @endif
    </script>
@endsection
