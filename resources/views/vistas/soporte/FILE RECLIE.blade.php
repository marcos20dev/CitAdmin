@extends('plantillas.soporte.menu')

@section('title', 'Registro de Cuenta de Administrador')

@section('menu')
    @include('vistas.soporte.menu_soporte')
@endsection

@section('soprote')
    <div class="h-screen w-full bg-gradient-to-br from-gray-50 to-blue-50 p-6 overflow-hidden flex flex-col">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Registro de Administradores</h1>
                <p class="text-gray-600">Gestiona las cuentas de administración del sistema</p>
            </div>
            <div class="flex items-center space-x-4">
                <form method="GET" action="" class="flex items-center space-x-2">
                    <div class="relative">
                        <input type="text" name="buscar" placeholder="Buscar administrador..."
                               value=""
                               class="pl-10 pr-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent w-64">
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    </div>

                    <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow-md transition-all duration-300">
                        Buscar
                    </button>

                    @if(request()->has('buscar'))
                        <a href=""
                           class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg shadow-md transition-all duration-300">
                            Limpiar
                        </a>
                    @endif
                </form>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 xl:grid-cols-12 gap-6 flex-grow overflow-hidden">
            <!-- Registration Form -->
            <div class="xl:col-span-4 bg-white rounded-2xl shadow-xl p-6 border border-gray-100 flex flex-col">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-gray-800 flex items-center">
                        <span class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center mr-3 text-white shadow-md">
                            <i class="fas fa-user-plus"></i>
                        </span>
                        Registrar Nuevo Administrador
                    </h2>
                    <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white text-sm font-semibold px-3 py-1 rounded-full shadow-sm">
                        Paso 1 de 2
                    </div>
                </div>

                <form id="adminForm" method="POST" action="" class="space-y-6 overflow-y-auto flex-grow pr-2" enctype="multipart/form-data">
                    @csrf

                    <!-- Foto de perfil -->
                    <div class="flex flex-col items-center space-y-4">
                        <div class="relative group">
                            <div class="relative overflow-hidden rounded-full w-28 h-28 border-4 border-white shadow-lg">
                                <img id="fotoPreview" src="https://ui-avatars.com/api/?name=N+U&background=random"
                                     class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                                <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <label for="foto" class="cursor-pointer">
                                        <i class="fas fa-camera text-white text-xl"></i>
                                    </label>
                                </div>
                            </div>
                            <label for="foto" class="absolute -bottom-2 -right-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white p-2 rounded-full cursor-pointer shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-110">
                                <i class="fas fa-pencil-alt fa-xs"></i>
                                <input type="file" id="foto" name="foto" class="hidden" accept="image/*" onchange="previewImage(this)">
                            </label>
                        </div>
                        <span class="text-xs text-gray-500 font-medium">Formatos: JPG, PNG (Max. 2MB)</span>
                    </div>

                    <!-- Sección de Datos Personales -->
                    <div class="bg-gray-50 p-4 rounded-xl">
                        <h3 class="text-lg font-semibold text-gray-700 mb-4 flex items-center">
                            <i class="fas fa-user-circle text-blue-500 mr-2"></i>
                            Datos Personales
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <!-- DNI -->
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-gray-700">DNI <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="text" id="dni" name="dni" placeholder="Ingrese DNI (8 dígitos)"
                                           value="{{ old('dni') }}"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 placeholder-gray-400">
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                        <i class="fas fa-id-card text-gray-400"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Nombres -->
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-gray-700">Nombres <span class="text-red-500">*</span></label>
                                <input type="text" name="nombres" placeholder="Ingrese nombres completos"
                                       value="{{ old('nombres') }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 placeholder-gray-400">
                            </div>

                            <!-- Apellidos -->
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-gray-700">Apellidos <span class="text-red-500">*</span></label>
                                <input type="text" name="apellidos" placeholder="Ingrese apellidos completos"
                                       value="{{ old('apellidos') }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 placeholder-gray-400">
                            </div>

                            <!-- Correo Electrónico -->
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-gray-700">Correo Electrónico <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="email" name="email" placeholder="ejemplo@dominio.com"
                                           value="{{ old('email') }}"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 placeholder-gray-400">
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                        <i class="fas fa-envelope text-gray-400"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Teléfono -->
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-gray-700">Teléfono</label>
                                <div class="relative">
                                    <input type="text" name="telefono" placeholder="Ingrese número telefónico"
                                           value="{{ old('telefono') }}"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 placeholder-gray-400">
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                        <i class="fas fa-phone text-gray-400"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sección de Credenciales -->
                    <div class="bg-gray-50 p-4 rounded-xl">
                        <h3 class="text-lg font-semibold text-gray-700 mb-4 flex items-center">
                            <i class="fas fa-key text-blue-500 mr-2"></i>
                            Credenciales de Acceso
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <!-- Nombre de Usuario -->
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-gray-700">Nombre de Usuario <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="text" name="username" placeholder="Ingrese nombre de usuario"
                                           value="{{ old('username') }}"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 placeholder-gray-400">
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                        <i class="fas fa-user text-gray-400"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Contraseña -->
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-gray-700">Contraseña <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="password" id="password" name="password" placeholder="Ingrese contraseña segura"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 placeholder-gray-400">
                                    <button type="button" onclick="togglePasswordVisibility()" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-blue-500 transition-colors">
                                        <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </button>
                                </div>
                                <div class="mt-2">
                                    <div class="w-full bg-gray-200 rounded-full h-2 overflow-hidden">
                                        <div id="strength-bar" class="h-full w-0 transition-all duration-300"></div>
                                    </div>
                                    <div id="strength-hints" class="text-xs text-gray-500 mt-1">
                                        <span id="strength-text" class="font-medium">Seguridad de la contraseña</span>
                                        <span id="strength-hint" class="ml-2"></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Confirmar Contraseña -->
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-gray-700">Confirmar Contraseña <span class="text-red-500">*</span></label>
                                <input type="password" name="password_confirmation" placeholder="Repita la contraseña"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 placeholder-gray-400">
                            </div>
                        </div>
                    </div>

                    <!-- Sección de Configuración -->
                    <div class="bg-gray-50 p-4 rounded-xl">
                        <h3 class="text-lg font-semibold text-gray-700 mb-4 flex items-center">
                            <i class="fas fa-cog text-blue-500 mr-2"></i>
                            Configuración de Cuenta
                        </h3>

                        <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
                            <!-- Estado -->
                            <div class="flex items-center">
                                <label class="flex items-center cursor-pointer">
                                    <div class="relative">
                                        <input type="checkbox" name="estado" value="1" checked class="sr-only">
                                        <div class="block bg-gray-300 w-14 h-8 rounded-full transition-colors duration-300"></div>
                                        <div class="dot absolute left-1 top-1 bg-white w-6 h-6 rounded-full transition-transform duration-300"></div>
                                    </div>
                                    <div class="ml-3 text-gray-700 font-medium">
                                        Cuenta activa
                                    </div>
                                </label>
                            </div>

                            <!-- Rol -->
                            <div class="w-full md:w-48">
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Rol del usuario</label>
                                <div class="relative">
                                    <select name="rol" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 appearance-none bg-white bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSJub25lIiBzdHJva2U9ImN1cnJlbnRDb2xvciIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiIGNsYXNzPSJsdWNpZGUgbHVjaWRlLWNoZXZyb24tZG93biI+PHBhdGggZD0ibTYgOSA2IDYgNi02Ii8+PC9zdmc+')] bg-no-repeat bg-[right_0.75rem_center] bg-[length:1.25rem]">
                                        <option value="admin">Administrador</option>
                                        <option value="soporte">Soporte Técnico</option>
                                        <option value="editor">Editor</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Botón de Registro -->
                    <button type="submit"
                            class="w-full bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-700 hover:to-blue-600 text-white font-semibold px-6 py-4 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 flex items-center justify-center group sticky bottom-0">
                        <span class="relative">
                            <i class="fas fa-user-plus mr-3 transition-all duration-300 group-hover:scale-110"></i>
                            Registrar Administrador
                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-white transition-all duration-300 group-hover:w-full"></span>
                        </span>
                    </button>
                </form>
            </div>

            <!-- Administrators Table -->
            <div class="xl:col-span-8 bg-white rounded-2xl shadow-xl p-6 border border-gray-100 flex flex-col">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-semibold text-gray-800 flex items-center">
                        <span class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-users text-blue-600"></i>
                        </span>
                        Administradores Registrados
                    </h2>
                    <div class="text-sm text-gray-500">
                        <span class="font-medium text-blue-600">8</span> administradores registrados
                    </div>
                </div>

                <div class="overflow-auto flex-grow">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50 sticky top-0">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Foto</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Usuario</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rol</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        <!-- Datos falsos de administradores -->
                        <tr class="hover:bg-gray-50 transition-colors duration-150">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <img src="https://randomuser.me/api/portraits/men/32.jpg" class="w-10 h-10 rounded-full">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">Juan Pérez</div>
                                <div class="text-sm text-gray-500">juan.perez@example.com</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">jperez</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                    Administrador
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Activo
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-end space-x-2">
                                    <a href="#" class="text-blue-600 hover:text-blue-900 p-1.5 rounded-full hover:bg-blue-50 transition" title="Editar">
                                        <i class="fas fa-pen fa-sm"></i>
                                    </a>
                                    <a href="#" class="text-yellow-600 hover:text-yellow-900 p-1.5 rounded-full hover:bg-yellow-50 transition" title="Desactivar">
                                        <i class="fas fa-toggle-on fa-sm"></i>
                                    </a>
                                    <a href="#" class="text-red-600 hover:text-red-900 p-1.5 rounded-full hover:bg-red-50 transition" title="Eliminar">
                                        <i class="fas fa-trash fa-sm"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <!-- Más filas de la tabla... -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Custom scrollbar styles */
        .overflow-y-auto::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        .overflow-y-auto::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .overflow-y-auto::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 10px;
        }

        .overflow-y-auto::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }

        /* Sticky table header */
        thead.sticky th {
            position: sticky;
            top: 0;
            background-color: #f9fafb;
            z-index: 10;
            box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.1);
        }

        /* Sticky submit button */
        button.sticky {
            position: sticky;
            bottom: 20px;
            z-index: 10;
        }

        /* Improved form layout */
        .flex-grow {
            flex-grow: 1;
            min-height: 0;
        }

        /* Smooth transitions */
        .transition-all {
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 150ms;
        }
    </style>

    <script>
        // Función para previsualizar la imagen seleccionada
        function previewImage(input) {
            if (input.files && input.files[0]) {
                // Validar tamaño máximo (2MB)
                if (input.files[0].size > 2 * 1024 * 1024) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Archivo demasiado grande',
                        text: 'La imagen no debe superar los 2MB',
                        confirmButtonText: 'Entendido',
                        customClass: {
                            popup: 'rounded-lg shadow-xl'
                        }
                    });
                    input.value = ''; // Limpiar el input
                    return;
                }

                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('fotoPreview').setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        // Función para mostrar/ocultar contraseña
        function togglePasswordVisibility() {
            const passwordField = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>';
            } else {
                passwordField.type = 'password';
                eyeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>';
            }
        }

        // Medidor de fuerza de contraseña
        document.getElementById('password').addEventListener('input', function(e) {
            const password = e.target.value;
            const strengthBar = document.getElementById('strength-bar');
            const strengthText = document.getElementById('strength-text');
            const strengthHint = document.getElementById('strength-hint');

            // Reset
            strengthBar.style.width = '0%';
            strengthBar.className = 'h-full bg-gray-400 w-0 transition-all duration-300';

            if (!password) {
                strengthText.textContent = 'Seguridad';
                strengthHint.textContent = '';
                return;
            }

            // Calcular fuerza (simple)
            let strength = 0;
            let hints = [];

            // Longitud mínima
            if (password.length >= 6) strength += 25;
            if (password.length >= 10) strength += 25;
            else hints.push('mínimo 10 caracteres');

            // Contiene números
            if (/\d/.test(password)) strength += 15;
            else hints.push('añadir números');

            // Contiene mayúsculas y minúsculas
            if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength += 20;
            else hints.push('añadir mayúsculas y minúsculas');

            // Contiene caracteres especiales
            if (/[^a-zA-Z0-9]/.test(password)) strength += 15;
            else hints.push('añadir caracteres especiales');

            // Aplicar cambios visuales
            strengthBar.style.width = strength + '%';

            if (strength < 40) {
                strengthBar.className = 'h-full bg-red-500 transition-all duration-300';
                strengthText.textContent = 'Débil';
                strengthText.className = 'text-xs font-medium text-red-500';
            } else if (strength < 70) {
                strengthBar.className = 'h-full bg-yellow-500 transition-all duration-300';
                strengthText.textContent = 'Moderada';
                strengthText.className = 'text-xs font-medium text-yellow-500';
            } else {
                strengthBar.className = 'h-full bg-green-500 transition-all duration-300';
                strengthText.textContent = 'Fuerte';
                strengthText.className = 'text-xs font-medium text-green-500';
            }

            if (hints.length > 0) {
                strengthHint.textContent = 'Recomendación: ' + hints.join(', ');
            } else {
                strengthHint.textContent = '';
            }
        });

        // Validación del formulario
        document.addEventListener('DOMContentLoaded', function() {
            // Mostrar notificaciones SweetAlert
            @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: '¡Registro Exitoso!',
                text: '{{ session('success') }}',
                confirmButtonText: 'Entendido',
                customClass: {
                    popup: 'rounded-lg shadow-xl'
                },
                background: '#f9fafb'
            });
            @endif

            @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error en el Registro',
                text: '{{ session('error') }}',
                confirmButtonText: 'Entendido',
                customClass: {
                    popup: 'rounded-lg shadow-xl'
                },
                background: '#f9fafb'
            });
            @endif

            // Validación al enviar el formulario
            document.getElementById('adminForm').addEventListener('submit', function(event) {
                let isValid = true;
                const errors = [];
                const dni = document.getElementById('dni').value;
                const password = document.getElementById('password').value;

                // Validación de DNI
                if (!/^\d{8}$/.test(dni)) {
                    errors.push('El DNI debe contener exactamente 8 dígitos numéricos');
                    isValid = false;
                }

                // Validación de contraseña
                if (!/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/.test(password)) {
                    errors.push('La contraseña debe tener al menos 6 caracteres, incluyendo mayúsculas, minúsculas y números');
                    isValid = false;
                }

                if (!isValid) {
                    event.preventDefault();
                    Swal.fire({
                        icon: 'error',
                        title: 'Errores en el Formulario',
                        html: `<div class="text-left"><ul class="list-disc pl-5 space-y-1">${errors.map(error => `<li>${error}</li>`).join('')}</ul></div>`,
                        confirmButtonText: 'Corregir',
                        customClass: {
                            popup: 'rounded-lg shadow-xl'
                        },
                        background: '#f9fafb'
                    });
                }
            });
        });
    </script>
@endsection
