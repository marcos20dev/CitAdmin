@extends('plantillas.soporte.menu')

@section('title', 'Registro de Cuenta de Administrador')

@section('menu')
    @include('vistas.soporte.menu_soporte')
@endsection

@section('soprote')
    <!-- Notificaciones flotantes -->
    <div id="successNotification" class="notification hidden fixed top-24 right-6 w-80 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-lg flex items-center justify-between animate-slideIn">
        <div class="flex items-center">
            <i class="fas fa-check-circle mr-2"></i>
            <span id="successMessage"></span>
        </div>
        <button onclick="closeNotification('successNotification')" class="text-green-700 hover:text-green-900">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <div id="errorNotification" class="notification hidden fixed top-24 right-6 w-80 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg shadow-lg flex items-center justify-between animate-slideIn">
        <div class="flex items-center">
            <i class="fas fa-exclamation-circle mr-2"></i>
            <span id="errorMessage"></span>
        </div>
        <button onclick="closeNotification('errorNotification')" class="text-red-700 hover:text-red-900">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <!-- Contenedor principal -->
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 py-8">
        <div class="container mx-auto px-4">
            <!-- Encabezado de la página -->
            <header class="mb-8 bg-transparent">
                <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
                    <div>
                        <h1 class="text-3xl md:text-4xl font-extrabold text-gray-800">Gestión de Administradores</h1>
                        <p class="text-gray-600 mt-2">Registro y administración de cuentas privilegiadas</p>
                    </div>
                    <form method="GET" action="{{ route('soporte.buscar') }}" class="w-full md:w-auto">
                        <div class="relative flex items-center">
                            <input type="text" name="buscar" value="{{ request('buscar') }}" placeholder="Buscar administrador..."
                                   class="pl-12 pr-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent w-full md:w-64 bg-white shadow-none transition-all duration-200">
                            <i class="fas fa-search absolute left-4 text-gray-400"></i>
                            <button type="submit"
                                    class="ml-2 bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-700 hover:to-blue-600 text-white px-5 py-3 rounded-xl shadow-none transition-all duration-300 flex items-center">
                                <span>Buscar</span>
                            </button>
                            @if(request()->has('buscar'))
                                <a href="{{ route('soporte.buscar') }}"
                                   class="ml-2 bg-gray-100 hover:bg-gray-200 text-gray-800 px-4 py-3 rounded-xl shadow-none transition-all duration-300 flex items-center">
                                    <i class="fas fa-times mr-1"></i>
                                    Limpiar
                                </a>
                            @endif
                        </div>
                    </form>

                </div>
            </header>


            <!-- Contenido principal (Grid) -->
            <main class="grid grid-cols-1 xl:grid-cols-12 gap-6">
                <!-- Tarjeta: Formulario de Registro -->
                <section class="xl:col-span-4 bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                    <!-- Encabezado de la tarjeta -->
                    <div class="p-4 text-white {{ isset($adminEditar) ? 'bg-gradient-to-r from-red-600 to-red-500' : 'bg-gradient-to-r from-blue-600 to-blue-500' }}">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-white bg-opacity-20 rounded-full flex items-center justify-center mr-3">
                                    <i class="fas {{ isset($adminEditar) ? 'fa-user-edit' : 'fa-user-plus' }} text-lg"></i>
                                </div>
                                <div>
                                    <h2 class="text-sm font-bold">{{ isset($adminEditar) ? 'Editar Administrador' : 'Nuevo Administrador' }}</h2>
                                    <p class="text-blue-100 text-xs">{{ isset($adminEditar) ? 'Modifique los campos necesarios' : 'Complete el formulario para registrar' }}</p>
                                </div>
                            </div>
                            <div class="bg-white {{ isset($adminEditar) ? 'text-red-600' : 'text-blue-600' }} text-xs font-semibold px-2.5 py-1 rounded-full shadow">
                                {{ isset($adminEditar) ? 'Modo Edición' : 'Paso 1 de 2' }}
                            </div>
                        </div>
                    </div>
                    <!-- Cuerpo del formulario -->
                    <div class="p-4 overflow-y-auto" style="max-height: calc(100vh - 220px)">
                        <form method="POST" action="{{ isset($adminEditar) ? route('soporte.update', $adminEditar->id) : route('soporte.store') }}" enctype="multipart/form-data">
                            @csrf
                            @if(isset($adminEditar))
                                @method('PUT')
                            @endif

                            <!-- Foto de Perfil -->
                            <div class="flex flex-col items-center space-y-3">
                                <div class="relative group">
                                    <div class="relative overflow-hidden rounded-full w-24 h-24 border-4 border-white shadow-xl">
                                        <img id="fotoPreview"
                                             src="@if(isset($adminEditar) && $adminEditar->foto_perfil)
                                                    data:image/jpeg;base64,{{ $adminEditar->foto_perfil }}
                                                  @else
                                                    https://ui-avatars.com/api/?name={{ isset($adminEditar) ? urlencode($adminEditar->nombre[0].' '.$adminEditar->apellidos[0]) : 'N+U' }}&background=random&color=fff&size=128
                                                  @endif"
                                             class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                                        <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                            <label for="foto_perfil" class="cursor-pointer">
                                                <i class="fas fa-camera text-white text-lg"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <label for="foto_perfil" class="absolute -bottom-2 -right-2 bg-gradient-to-r {{ isset($adminEditar) ? 'from-red-600 to-red-500' : 'from-blue-600 to-blue-500' }} text-white p-1.5 rounded-full cursor-pointer shadow-lg hover:shadow-xl transition-transform duration-300 transform hover:scale-110">
                                        <i class="fas fa-pencil-alt fa-xs"></i>
                                        <input type="file" id="foto_perfil" name="foto_perfil" class="hidden" accept="image/*" onchange="previewImage(this)">
                                    </label>
                                </div>
                                <span class="text-xs text-gray-500">Formatos: JPG, PNG (Máx. 2MB)</span>
                            </div>

                            <!-- Información Personal -->
                            <div class="space-y-4 mt-6">
                                <div class="flex items-center">
                                    <div class="w-1 h-6 bg-blue-500 rounded-full mr-2"></div>
                                    <h3 class="text-sm font-semibold text-gray-800">Información Personal</h3>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                    <!-- DNI -->
                                    <div class="space-y-1">
                                        <label class="block text-gray-700 font-medium">DNI <span class="text-red-500">*</span></label>
                                        <div class="relative">
                                            <input type="text" name="dni" placeholder="Ingrese DNI"
                                                   value="{{ $adminEditar->dni ?? old('dni') }}"
                                                   pattern="\d{8}" maxlength="8"
                                                   onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                                   class="w-full px-3 py-2 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 bg-white shadow-sm text-xs">
                                            <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                                <i class="fas fa-id-card text-gray-400 text-xs"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Nombres -->
                                    <div class="space-y-1">
                                        <label class="block text-gray-700 font-medium">Nombres <span class="text-red-500">*</span></label>
                                        <input type="text" name="nombre" placeholder="Ingrese nombres"
                                               value="{{ $adminEditar->nombre ?? old('nombre') }}"
                                               pattern="[A-Za-zÁ-Úá-ú\s]+" title="Solo se permiten letras y espacios"
                                               oninput="this.value = this.value.replace(/[^A-Za-zÁ-Úá-ú\s]/g,'')"
                                               class="w-full px-3 py-2 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 bg-white shadow-sm text-xs">
                                    </div>
                                    <!-- Apellidos -->
                                    <div class="space-y-1">
                                        <label class="block text-gray-700 font-medium">Apellidos <span class="text-red-500">*</span></label>
                                        <input type="text" name="apellidos" placeholder="Ingrese apellidos"
                                               value="{{ $adminEditar->apellidos ?? old('apellidos') }}"
                                               pattern="[A-Za-zÁ-Úá-ú\s]+" title="Solo se permiten letras y espacios"
                                               oninput="this.value = this.value.replace(/[^A-Za-zÁ-Úá-ú\s]/g,'')"
                                               class="w-full px-3 py-2 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 bg-white shadow-sm text-xs">
                                    </div>
                                    <!-- Correo Electrónico -->
                                    <div class="space-y-1">
                                        <label class="block text-gray-700 font-medium">Correo Electrónico <span class="text-red-500">*</span></label>
                                        <div class="relative">
                                            <input type="email" name="usuario" placeholder="ejemplo@dominio.com"
                                                   value="{{ $adminEditar->usuario ?? old('usuario') }}"
                                                   pattern="[^\s@]+@[^\s@]+\.[^\s@]+" title="Ingrese un correo válido"
                                                   class="w-full px-3 py-2 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 bg-white shadow-sm text-xs">
                                            <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                                <i class="fas fa-envelope text-gray-400 text-xs"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Teléfono -->
                                    <div class="space-y-1">
                                        <label class="block text-gray-700 font-medium">Teléfono</label>
                                        <div class="relative">
                                            <input type="text" name="telefono" placeholder="Ingrese número"
                                                   value="{{ $adminEditar->telefono ?? old('telefono') }}"
                                                   pattern="9\d{8}" maxlength="9"
                                                   onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                                   class="w-full px-3 py-2 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 bg-white shadow-sm text-xs">
                                            <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                                <i class="fas fa-phone text-gray-400 text-xs"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Credenciales de Acceso (solo en modo creación) -->
                            @unless(isset($adminEditar))
                                <div class="space-y-4 mt-6">
                                    <div class="flex items-center">
                                        <div class="w-1 h-6 bg-blue-500 rounded-full mr-2"></div>
                                        <h3 class="text-sm font-semibold text-gray-800">Credenciales de Acceso</h3>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                        <!-- Contraseña -->
                                        <div class="space-y-1">
                                            <label class="block text-gray-700 font-medium">Contraseña <span class="text-red-500">*</span></label>
                                            <div class="relative">
                                                <input type="password" id="password" name="password" placeholder="Contraseña"
                                                       class="w-full px-3 py-2 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 bg-white shadow-sm text-xs">
                                                <button type="button" onclick="togglePasswordVisibility()" class="absolute inset-y-0 right-0 flex items-center pr-2 text-gray-400 hover:text-blue-500">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                            <div class="mt-1">
                                                <div class="w-full bg-gray-200 rounded-full h-1 overflow-hidden">
                                                    <div id="strength-bar" class="h-full w-0 transition-all duration-300"></div>
                                                </div>
                                                <div id="strength-hints" class="text-xs text-gray-500 mt-0.5 flex justify-between">
                                                    <span id="strength-text" class="font-medium">Seguridad</span>
                                                    <span id="strength-hint" class="text-right"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Confirmar Contraseña -->
                                        <div class="space-y-1">
                                            <label class="block text-gray-700 font-medium">Confirmar Contraseña <span class="text-red-500">*</span></label>
                                            <input type="password" name="password_confirmation" placeholder="Repita la contraseña"
                                                   class="w-full px-3 py-2 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 bg-white shadow-sm text-xs">
                                        </div>
                                    </div>
                                </div>
                            @endunless

                            <!-- Configuración de Cuenta -->
                            <div class="space-y-4 mt-6">
                                <div class="flex items-center">
                                    <div class="w-1 h-6 bg-blue-500 rounded-full mr-2"></div>
                                    <h3 class="text-sm font-semibold text-gray-800">Configuración de Cuenta</h3>
                                </div>
                                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">
                                    <!-- Toggle Estado -->
                                    <div class="flex items-center">
                                        <input type="hidden" name="estado" value="0">
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" name="estado" value="1"
                                                   class="sr-only peer"
                                                {{ ($adminEditar->activo ?? old('estado', true)) ? 'checked' : '' }}>
                                            <span class="slider"></span>
                                            <span class="ml-3 text-gray-700 font-medium text-xs">Cuenta activa</span>
                                        </label>

                                    </div>
                           <!-- Cargo del usuario (con autocompletado con Alpine.js) -->
                                    <div class="w-full md:w-48 relative" x-data="{ open: false, search: '{{ $adminEditar->cargo ?? old('cargo') }}', roles: ['Administrador', 'Soporte Técnico', 'Editor'] }">
                                        <label class="block text-xs font-medium text-gray-700 mb-1">Cargo del usuario</label>
                                        <input type="text" name="cargo"
                                               x-model="search"
                                               @focus="open = true"
                                               @input="open = true"
                                               @click.away="open = false"
                                               placeholder="Seleccionar rol..."
                                               value="{{ $adminEditar->cargo ?? old('cargo') }}"
                                               class="w-full px-3 py-2 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 bg-white shadow-sm text-xs">
                                        <ul x-show="open && roles.filter(r => r.toLowerCase().includes(search.toLowerCase())).length > 0"
                                            class="absolute z-10 w-full mt-1 bg-white border border-gray-200 rounded-md shadow-md max-h-40 overflow-y-auto text-xs"
                                            x-transition>
                                            <template x-for="role in roles.filter(r => r.toLowerCase().includes(search.toLowerCase()))" :key="role">
                                                <li @click="search = role; open = false"
                                                    class="px-4 py-2 hover:bg-blue-100 cursor-pointer transition-all">
                                                    <span x-text="role"></span>
                                                </li>
                                            </template>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Botón Enviar -->
                            <button type="submit"
                                    class="w-full mt-6 bg-gradient-to-r {{ isset($adminEditar) ? 'from-red-600 to-red-500 hover:from-red-700 hover:to-red-600' : 'from-blue-600 to-blue-500 hover:from-blue-700 hover:to-blue-600' }} text-white font-semibold px-4 py-3 rounded-xl shadow-lg transition-all duration-300 flex items-center justify-center text-xs">
                                <i class="fas {{ isset($adminEditar) ? 'fa-save' : 'fa-user-plus' }} mr-2 text-sm transition-transform group-hover:scale-110"></i>
                                {{ isset($adminEditar) ? 'Actualizar Administrador' : 'Registrar Administrador' }}
                            </button>
                        </form>
                        <!-- Alpine.js para autocompletado -->
                        <script src="//unpkg.com/alpinejs" defer></script>
                    </div>
                </section>

                <!-- Tarjeta: Lista de Administradores -->
                <section class="xl:col-span-8 bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                    <!-- Encabezado de la tarjeta -->
                    <div class="p-6 border-b border-gray-200 bg-white">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                                    <i class="fas fa-users text-blue-600 text-xl"></i>
                                </div>
                                <div>
                                    <h2 class="text-xl font-bold text-gray-800">Administradores Registrados</h2>
                                    <p class="text-gray-600 text-sm">Lista completa de cuentas con privilegios</p>
                                </div>
                            </div>
                            <div class="bg-blue-50 text-blue-600 px-3 py-1 rounded-full text-sm font-semibold">
                                <span class="font-bold">{{ $administradores->count() }}</span> administradores
                            </div>
                        </div>
                    </div>

                    <!-- Contenedor de la tabla -->
                    <div class="overflow-auto" style="max-height: calc(100vh - 220px)">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50 sticky top-0">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Usuario</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cargo</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($administradores as $admin)
                                <tr class="hover:bg-gray-50 transition-colors duration-150">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                @if($admin->foto_perfil)
                                                    <img class="h-10 w-10 rounded-full" src="data:image/jpeg;base64,{{ $admin->foto_perfil }}" alt="Foto">
                                                @else
                                                    <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name={{ urlencode($admin->nombre) }}" alt="Avatar">
                                                @endif
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $admin->nombre }} {{ $admin->apellidos }}</div>
                                                <div class="text-sm text-gray-500">{{ $admin->usuario }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2.5 py-1 inline-flex text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                                {{ $admin->cargo }}
                                            </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2.5 py-1 inline-flex text-xs font-semibold rounded-full {{ $admin->activo ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                                {{ $admin->activo ? 'Activo' : 'Inactivo' }}
                                            </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex justify-end space-x-2">
                                            <!-- Botón Editar -->
                                            <form action="{{ route('soporte.edit', $admin->id) }}" method="GET">
                                                <button type="submit" class="p-2 rounded-full hover:bg-blue-50 transition text-blue-600" title="Editar">
                                                    <i class="fas fa-pen fa-sm"></i>
                                                </button>
                                            </form>
                                            <!-- Botón Toggle Estado -->
                                            <form action="{{ route('soporte.toggle', $admin->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="p-2 rounded-full hover:bg-yellow-50 transition text-yellow-600" title="{{ $admin->activo ? 'Desactivar' : 'Activar' }}">
                                                    <i class="fas {{ $admin->activo ? 'fa-toggle-on' : 'fa-toggle-off' }} fa-sm"></i>
                                                </button>
                                            </form>
                                            <!-- Botón Eliminar -->
                                            <form action="{{ route('soporte.eliminarAdministrador', $admin->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro que deseas eliminar este administrador?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-2 rounded-full hover:bg-red-50 transition text-red-600" title="Eliminar">
                                                    <i class="fas fa-trash fa-sm"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Paginación -->
                    <div class="px-6 py-4 border-t border-gray-200 bg-white">
                        <div class="flex flex-col md:flex-row items-center justify-between space-y-4 md:space-y-0">
                            <div class="text-sm text-gray-500">
                                Mostrando <span class="font-medium">1</span> a <span class="font-medium">3</span> de <span class="font-medium">8</span> resultados
                            </div>
                            <div class="flex items-center space-x-2">
                                <button class="px-3 py-1 rounded-lg border border-gray-300 text-gray-500 hover:bg-gray-50 transition">
                                    <i class="fas fa-chevron-left"></i>
                                </button>
                                <button class="px-3 py-1 rounded-lg bg-blue-600 text-white">1</button>
                                <button class="px-3 py-1 rounded-lg border border-gray-300 text-gray-500 hover:bg-gray-50 transition">2</button>
                                <button class="px-3 py-1 rounded-lg border border-gray-300 text-gray-500 hover:bg-gray-50 transition">3</button>
                                <button class="px-3 py-1 rounded-lg border border-gray-300 text-gray-500 hover:bg-gray-50 transition">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>

    <!-- Estilos personalizados -->
    <style>
        /* Animaciones para las notificaciones */
        @keyframes slideIn {
            from { opacity: 0; transform: translateX(100%); }
            to { opacity: 1; transform: translateX(0); }
        }
        @keyframes slideOut {
            from { opacity: 1; transform: translateX(0); }
            to { opacity: 0; transform: translateX(100%); }
        }
        .animate-slideIn {
            animation: slideIn 0.3s ease-out forwards;
        }
        .animate-slideOut {
            animation: slideOut 0.3s ease-out forwards;
        }
        /* Estilos personalizados para el Toggle Switch */
        .slider {
            position: relative;
            display: inline-block;
            width: 44px;
            height: 24px;
            background-color: #d1d5db;
            border-radius: 9999px;
            transition: background-color 0.3s;
        }
        .peer:checked + .slider {
            background-color: #2563eb;
        }
        .slider::before {
            content: "";
            position: absolute;
            top: 2px;
            left: 2px;
            height: 20px;
            width: 20px;
            background-color: white;
            border-radius: 9999px;
            transition: transform 0.3s;
        }
        .peer:checked + .slider::before {
            transform: translateX(20px);
        }
    </style>

    <style>
        .slider {
            position: relative;
            display: inline-block;
            width: 44px;
            height: 24px;
            background-color: #d1d5db;
            border-radius: 9999px;
            transition: background-color 0.3s;
        }
        .peer:checked + .slider {
            background-color: #2563eb;
        }
        .slider::before {
            content: "";
            position: absolute;
            top: 2px;
            left: 2px;
            height: 20px;
            width: 20px;
            background-color: white;
            border-radius: 9999px;
            transition: transform 0.3s;
        }
        .peer:checked + .slider::before {
            transform: translateX(20px);
        }

    </style>

    <!-- JavaScript -->
    <script>
        // Función genérica para mostrar notificaciones
        function showNotification(id, message) {
            const notification = document.getElementById(id);
            const messageElement = id === 'successNotification' ? document.getElementById('successMessage') : document.getElementById('errorMessage');
            messageElement.textContent = message;
            notification.classList.remove('hidden');
            notification.style.animation = 'none';
            void notification.offsetHeight;
            notification.style.animation = 'slideIn 0.3s ease-out forwards';
            setTimeout(() => closeNotification(id), 5000);
        }

        function closeNotification(id) {
            const notification = document.getElementById(id);
            notification.style.animation = 'slideOut 0.3s forwards';
            setTimeout(() => notification.classList.add('hidden'), 300);
        }

        // Mostrar notificaciones en DOMContentLoaded
        document.addEventListener('DOMContentLoaded', function() {
            @if(session('success'))
            showNotification('successNotification', '{{ session('success') }}');
            @endif

            @if($errors->any())
            @foreach($errors->all() as $error)
            showNotification('errorNotification', '{{ $error }}');
            @endforeach
            @endif
        });

        // Función para la vista previa de la imagen
        function previewImage(input) {
            if (input.files && input.files[0]) {
                if (input.files[0].size > 2 * 1024 * 1024) {
                    showNotification('errorNotification', 'La imagen no debe superar los 2MB');
                    input.value = '';
                    return;
                }
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('fotoPreview').setAttribute('src', e.target.result);
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
            strengthBar.className = 'h-full w-0 transition-all duration-300';
            strengthText.textContent = 'Seguridad';
            strengthText.className = 'font-medium';
            strengthHint.textContent = '';

            if (!password) return;

            // Calcular fuerza y sugerir mejoras
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
                strengthBar.className = 'h-full bg-red-500 transition-all duration-300';
                strengthText.textContent = 'Débil';
                strengthText.className = 'font-medium text-red-500';
            } else if (strength < 70) {
                strengthBar.className = 'h-full bg-yellow-500 transition-all duration-300';
                strengthText.textContent = 'Moderada';
                strengthText.className = 'font-medium text-yellow-500';
            } else {
                strengthBar.className = 'h-full bg-green-500 transition-all duration-300';
                strengthText.textContent = 'Fuerte';
                strengthText.className = 'font-medium text-green-500';
            }

            if (suggestions.length > 0 && strength < 70) {
                strengthHint.textContent = 'Sugerencias: ' + suggestions.join(', ');
            }
        });
    </script>
@endsection
