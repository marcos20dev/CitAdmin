@extends('plantillas.soporte.menu')

@section('title', 'Registro de Cuenta de Administrador')

@section('menu')
    @include('vistas.soporte.menu_soporte')
@endsection

@section('soprote')
    <!-- Notificaciones mejoradas -->
    <div id="successNotification" class="hidden fixed top-24 right-6 w-80 bg-emerald-50 border-l-4 border-emerald-400 text-emerald-700 px-4 py-3 rounded-lg shadow-lg flex items-center justify-between animate-slideIn">
        <div class="flex items-center space-x-3">
            <i class="fas fa-check-circle text-emerald-400"></i>
            <span id="successMessage" class="text-sm"></span>
        </div>
        <button onclick="closeSuccessNotification()" class="text-emerald-400 hover:text-emerald-600">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <div id="errorNotification" class="hidden fixed top-24 right-6 w-80 bg-rose-50 border-l-4 border-rose-400 text-rose-700 px-4 py-3 rounded-lg shadow-lg flex items-center justify-between animate-slideIn">
        <div class="flex items-center space-x-3">
            <i class="fas fa-exclamation-triangle text-rose-400"></i>
            <span id="errorMessage" class="text-sm"></span>
        </div>
        <button onclick="closeErrorNotification()" class="text-rose-400 hover:text-rose-600">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <div class="min-h-screen bg-slate-50 p-4 md:p-8">
        <div class="max-w-7xl mx-auto">
            <!-- Encabezado mejorado -->
            <div class="mb-8 space-y-2">
                <h1 class="text-3xl font-bold text-slate-800">Gestión de Administradores</h1>
                <p class="text-slate-600">Administra las cuentas con privilegios del sistema</p>
                <div class="border-b border-slate-200"></div>
            </div>

            <!-- Layout Grid Moderno -->
            <div class="grid lg:grid-cols-12 gap-6">
                <!-- Panel de Formulario -->
                <div class="lg:col-span-5 xl:col-span-4">
                    <div class="bg-white rounded-xl shadow-sm border border-slate-200">
                        <!-- Header con degradado dinámico -->
                        <div class="px-6 py-4 border-b border-slate-200 bg-gradient-to-r {{ isset($adminEditar) ? 'from-rose-500 to-rose-600' : 'from-blue-500 to-blue-600' }} rounded-t-xl">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="p-2 bg-white/10 rounded-lg">
                                        <i class="fas {{ isset($adminEditar) ? 'fa-user-edit' : 'fa-user-plus' }} text-white text-lg"></i>
                                    </div>
                                    <div>
                                        <h2 class="text-white font-semibold">{{ isset($adminEditar) ? 'Editar Administrador' : 'Nuevo Administrador' }}</h2>
                                        <p class="text-white/80 text-sm">{{ isset($adminEditar) ? 'Actualiza la información' : 'Registra una nueva cuenta' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Contenido del Formulario -->
                        <div class="p-6 space-y-6">
                            <!-- Sección de Avatar -->
                            <div class="flex flex-col items-center space-y-4">
                                <div class="relative group">
                                    <div class="relative h-24 w-24 rounded-full bg-slate-100 border-4 border-white shadow-lg overflow-hidden">
                                        <img id="fotoPreview"
                                             class="object-cover w-full h-full transition-transform duration-300 group-hover:scale-105"
                                             src="{{ isset($adminEditar) && $adminEditar->foto_perfil
                                                 ? 'data:image/jpeg;base64,'.$adminEditar->foto_perfil
                                                 : 'https://ui-avatars.com/api/?name='.urlencode(isset($adminEditar) ? $adminEditar->nombre[0].' '.$adminEditar->apellidos[0] : 'N+U' }}&background=random&color=fff&size=128' }}">
                                        <label class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity cursor-pointer">
                                            <i class="fas fa-camera text-white text-xl"></i>
                                            <input type="file" id="foto_perfil" name="foto_perfil" class="hidden" accept="image/*" onchange="previewImage(this)">
                                        </label>
                                    </div>
                                    <div class="mt-2 text-center">
                                        <span class="text-xs text-slate-500">Formatos: JPG, PNG (Max 2MB)</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Formulario -->
                            <form method="POST" action="{{ isset($adminEditar) ? route('soporte.update', $adminEditar->id) : route('soporte.store') }}" enctype="multipart/form-data" class="space-y-6">
                                @csrf
                                @if(isset($adminEditar)) @method('PUT') @endif

                                <!-- Sección de Información Personal -->
                                <div class="space-y-4">
                                    <div class="space-y-4">
                                        <div class="grid grid-cols-2 gap-4">
                                            <!-- Campo DNI -->
                                            <div>
                                                <label class="block text-sm font-medium text-slate-700 mb-1">DNI</label>
                                                <div class="relative">
                                                    <input type="text" name="dni"
                                                           class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 placeholder-slate-400"
                                                           placeholder="Número de DNI"
                                                           pattern="\d{8}"
                                                           value="{{ $adminEditar->dni ?? old('dni') }}">
                                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                                        <i class="fas fa-id-card text-slate-400"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Campo Teléfono -->
                                            <div>
                                                <label class="block text-sm font-medium text-slate-700 mb-1">Teléfono</label>
                                                <div class="relative">
                                                    <input type="text" name="telefono"
                                                           class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 placeholder-slate-400"
                                                           placeholder="Número de contacto"
                                                           value="{{ $adminEditar->telefono ?? old('telefono') }}">
                                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                                        <i class="fas fa-mobile-alt text-slate-400"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Campos de Nombre y Apellidos -->
                                        <div class="grid grid-cols-2 gap-4">
                                            <div>
                                                <label class="block text-sm font-medium text-slate-700 mb-1">Nombres</label>
                                                <input type="text" name="nombre"
                                                       class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 placeholder-slate-400"
                                                       placeholder="Nombres completos"
                                                       value="{{ $adminEditar->nombre ?? old('nombre') }}">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-slate-700 mb-1">Apellidos</label>
                                                <input type="text" name="apellidos"
                                                       class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 placeholder-slate-400"
                                                       placeholder="Apellidos completos"
                                                       value="{{ $adminEditar->apellidos ?? old('apellidos') }}">
                                            </div>
                                        </div>

                                        <!-- Campo Email -->
                                        <div>
                                            <label class="block text-sm font-medium text-slate-700 mb-1">Correo Electrónico</label>
                                            <div class="relative">
                                                <input type="email" name="usuario"
                                                       class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 placeholder-slate-400"
                                                       placeholder="correo@ejemplo.com"
                                                       value="{{ $adminEditar->usuario ?? old('usuario') }}">
                                                <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                                    <i class="fas fa-envelope text-slate-400"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Sección de Credenciales -->
                                @unless(isset($adminEditar))
                                    <div class="space-y-4">
                                        <div class="grid grid-cols-2 gap-4">
                                            <div>
                                                <label class="block text-sm font-medium text-slate-700 mb-1">Contraseña</label>
                                                <div class="relative">
                                                    <input type="password" id="password" name="password"
                                                           class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 placeholder-slate-400"
                                                           placeholder="••••••••">
                                                    <button type="button" onclick="togglePasswordVisibility()" class="absolute right-3 top-3.5 text-slate-400 hover:text-blue-600">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                </div>
                                                <div class="mt-2">
                                                    <div class="h-1.5 bg-slate-200 rounded-full overflow-hidden">
                                                        <div id="strength-bar" class="h-full transition-all duration-500"></div>
                                                    </div>
                                                    <div id="strength-hints" class="text-xs text-slate-500 mt-1.5 flex justify-between">
                                                        <span>Seguridad de contraseña</span>
                                                        <span id="strength-text"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div>
                                                <label class="block text-sm font-medium text-slate-700 mb-1">Confirmar Contraseña</label>
                                                <input type="password" name="password_confirmation"
                                                       class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 placeholder-slate-400"
                                                       placeholder="••••••••">
                                            </div>
                                        </div>
                                    </div>
                                @endunless

                                <!-- Configuraciones Finales -->
                                <div class="space-y-4">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center space-x-3">
                                            <label class="relative inline-flex items-center cursor-pointer">
                                                <input type="checkbox" name="estado" value="1" class="sr-only peer" {{ ($adminEditar->activo ?? old('estado', true)) ? 'checked' : '' }}>
                                                <div class="w-11 h-6 bg-slate-300 rounded-full peer-checked:bg-blue-600 transition-colors peer-checked:after:translate-x-5 peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all"></div>
                                                <span class="ml-3 text-sm text-slate-700">Cuenta Activa</span>
                                            </label>
                                        </div>

                                        <div class="relative w-48" x-data="{ open: false, search: '{{ $adminEditar->cargo ?? old('cargo') }}', roles: ['Administrador', 'Soporte Técnico', 'Editor'] }">
                                            <input type="text" name="cargo" x-model="search" @click="open = !open"
                                                   class="w-full px-4 py-2.5 text-sm border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                                   placeholder="Seleccionar rol">
                                            <ul x-show="open" @click.away="open = false" class="absolute z-10 w-full mt-1 bg-white border border-slate-200 rounded-lg shadow-lg">
                                                <template x-for="role in roles.filter(r => r.toLowerCase().includes(search.toLowerCase()))" :key="role">
                                                    <li @click="search = role; open = false" class="px-4 py-2.5 text-sm hover:bg-slate-50 cursor-pointer" x-text="role"></li>
                                                </template>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- Botón de Submit -->
                                <button type="submit" class="w-full py-3 px-6 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-all duration-300 transform hover:scale-[1.02] shadow-sm">
                                    {{ isset($adminEditar) ? 'Actualizar Administrador' : 'Registrar Administrador' }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Lista de Administradores -->
                <div class="lg:col-span-7 xl:col-span-8">
                    <div class="bg-white rounded-xl shadow-sm border border-slate-200">
                        <!-- Header de la Tabla -->
                        <div class="px-6 py-4 border-b border-slate-200 bg-slate-50 rounded-t-xl">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="text-lg font-semibold text-slate-800">Administradores Registrados</h3>
                                    <p class="text-slate-600 text-sm">{{ $administradores->count() }} cuentas encontradas</p>
                                </div>
                                <div class="flex items-center space-x-4">
                                    <div class="relative">
                                        <input type="text" placeholder="Buscar administrador..."
                                               class="pl-10 pr-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 w-64 text-sm"
                                               name="buscar" value="">
                                        <i class="fas fa-search absolute left-3 top-3 text-slate-400"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tabla Mejorada -->
                        <div class="overflow-auto max-h-[calc(100vh-220px)]">
                            <table class="w-full">
                                <thead class="bg-slate-50 border-b border-slate-200">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Usuario</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Rol</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Estado</th>
                                    <th class="px-6 py-3 text-right text-xs font-semibold text-slate-500 uppercase tracking-wider">Acciones</th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-200">
                                @foreach($administradores as $admin)
                                    <tr class="hover:bg-slate-50 transition-colors">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center space-x-4">
                                                <div class="flex-shrink-0 h-10 w-10 rounded-full bg-slate-100 border-2 border-white shadow-sm overflow-hidden">
                                                    @if($admin->foto_perfil)
                                                        <img src="data:image/jpeg;base64,{{ $admin->foto_perfil }}" class="w-full h-full object-cover">
                                                    @else
                                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($admin->nombre) }}&background=random" class="w-full h-full object-cover">
                                                    @endif
                                                </div>
                                                <div>
                                                    <div class="text-sm font-medium text-slate-900">{{ $admin->nombre }} {{ $admin->apellidos }}</div>
                                                    <div class="text-sm text-slate-500">{{ $admin->usuario }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="px-2.5 py-1 text-xs font-medium bg-blue-100 text-blue-800 rounded-full">{{ $admin->cargo }}</span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="px-2.5 py-1 text-xs font-medium {{ $admin->activo ? 'bg-emerald-100 text-emerald-800' : 'bg-rose-100 text-rose-800' }} rounded-full">
                                                {{ $admin->activo ? 'Activo' : 'Inactivo' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <div class="flex justify-end space-x-2">
                                                <a href="{{ route('soporte.edit', $admin->id) }}" class="p-2 text-slate-600 hover:text-blue-600 rounded-lg hover:bg-slate-100">
                                                    <i class="fas fa-pen fa-sm"></i>
                                                </a>
                                                <form action="{{ route('soporte.toggle', $admin->id) }}" method="POST">
                                                    @csrf @method('PATCH')
                                                    <button type="submit" class="p-2 text-slate-600 hover:text-emerald-600 rounded-lg hover:bg-slate-100">
                                                        <i class="fas {{ $admin->activo ? 'fa-toggle-on' : 'fa-toggle-off' }} fa-sm"></i>
                                                    </button>
                                                </form>
                                                <form action="{{ route('soporte.eliminarAdministrador', $admin->id) }}" method="POST">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="p-2 text-slate-600 hover:text-rose-600 rounded-lg hover:bg-slate-100" onclick="return confirm('¿Confirmar eliminación?')">
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

                        <!-- Paginación Mejorada -->
                        <div class="px-6 py-4 border-t border-slate-200 bg-slate-50">
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-slate-600">Mostrando 1 a 10 de {{ $administradores->total() }} registros</span>
                                <div class="flex space-x-2">
                                    <button class="p-2 text-slate-600 hover:text-blue-600 hover:bg-slate-100 rounded-lg">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <button class="px-3 py-2 text-sm text-white bg-blue-600 rounded-lg">1</button>
                                    <button class="px-3 py-2 text-sm text-slate-600 hover:bg-slate-100 rounded-lg">2</button>
                                    <button class="p-2 text-slate-600 hover:text-blue-600 hover:bg-slate-100 rounded-lg">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }

        @keyframes slideOut {
            from { transform: translateX(0); opacity: 1; }
            to { transform: translateX(100%); opacity: 0; }
        }

        .animate-slideIn { animation: slideIn 0.3s ease-out; }
        .animate-slideOut { animation: slideOut 0.3s ease-in; }
    </style>

    <script>
        // Funciones de notificación
        function showSuccessNotification(message) {
            const notification = document.getElementById('successNotification');
            notification.querySelector('#successMessage').textContent = message;
            notification.classList.remove('hidden');
            notification.style.animation = 'slideIn 0.3s ease-out';
            setTimeout(() => closeSuccessNotification(), 5000);
        }

        function showErrorNotification(message) {
            const notification = document.getElementById('errorNotification');
            notification.querySelector('#errorMessage').textContent = message;
            notification.classList.remove('hidden');
            notification.style.animation = 'slideIn 0.3s ease-out';
            setTimeout(() => closeErrorNotification(), 5000);
        }

        function closeSuccessNotification() {
            const notification = document.getElementById('successNotification');
            notification.style.animation = 'slideOut 0.3s ease-in';
            setTimeout(() => notification.classList.add('hidden'), 300);
        }

        function closeErrorNotification() {
            const notification = document.getElementById('errorNotification');
            notification.style.animation = 'slideOut 0.3s ease-in';
            setTimeout(() => notification.classList.add('hidden'), 300);
        }

        // Vista previa de imagen
        function previewImage(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('fotoPreview').src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        // Alternar visibilidad de contraseña
        function togglePasswordVisibility() {
            const passwordField = document.getElementById('password');
            passwordField.type = passwordField.type === 'password' ? 'text' : 'password';
        }

        // Medidor de fuerza de contraseña
        document.getElementById('password').addEventListener('input', function(e) {
            const password = e.target.value;
            const strengthBar = document.getElementById('strength-bar');
            const strengthText = document.getElementById('strength-text');

            let strength = 0;
            if (password.match(/[A-Z]/)) strength += 20;
            if (password.match(/[0-9]/)) strength += 20;
            if (password.match(/[^A-Za-z0-9]/)) strength += 20;
            if (password.length >= 8) strength += 20;
            if (password.length >= 12) strength += 20;

            strength = Math.min(strength, 100);
            strengthBar.style.width = strength + '%';

            if (strength < 40) {
                strengthBar.className = 'bg-rose-500';
                strengthText.textContent = 'Débil';
            } else if (strength < 70) {
                strengthBar.className = 'bg-amber-500';
                strengthText.textContent = 'Moderada';
            } else {
                strengthBar.className = 'bg-emerald-500';
                strengthText.textContent = 'Fuerte';
            }
        });

        // Inicializar notificaciones
        document.addEventListener('DOMContentLoaded', function() {
            @if(session('success'))
            showSuccessNotification('{{ session('success') }}');
            @endif

            @if($errors->any())
            @foreach($errors->all() as $error)
            showErrorNotification('{{ $error }}');
            @endforeach
            @endif
        });
    </script>
@endsection
