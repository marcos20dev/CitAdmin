
@extends('plantillas.soporte.menu')

@section('title', 'Registro de Cuenta de Administrador')

@section('menu')
    @include('vistas.soporte.menu_soporte')
@endsection

@section('soprote')
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 p-4 md:p-8">
        <!-- Main Container -->
        <div class="w-full">
            <!-- Header Section -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
                <div>
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-800">Gestión de Administradores</h1>
                    <p class="text-gray-600 mt-2">Registro y administración de cuentas privilegiadas</p>
                </div>

                <!-- Search Bar -->
                <form method="GET" action="" class="w-full md:w-auto">
                    <div class="relative flex items-center">
                        <input type="text" name="buscar" placeholder="Buscar administrador..."
                               value=""
                               class="pl-12 pr-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent w-full md:w-64 bg-white shadow-sm transition-all duration-200">
                        <i class="fas fa-search absolute left-4 text-gray-400"></i>

                        <button type="submit"
                                class="ml-2 bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-700 hover:to-blue-600 text-white px-5 py-3 rounded-xl shadow-md transition-all duration-300 flex items-center">
                            <span>Buscar</span>
                        </button>

                        @if(request()->has('buscar'))
                            <a href=""
                               class="ml-2 bg-gray-100 hover:bg-gray-200 text-gray-800 px-4 py-3 rounded-xl shadow-sm transition-all duration-300 flex items-center">
                                <i class="fas fa-times mr-1"></i>
                                Limpiar
                            </a>
                        @endif
                    </div>
                </form>
            </div>

            <!-- Grid Layout -->
            <div class="grid grid-cols-1 xl:grid-cols-12 gap-6">
                <!-- Registration Card -->
                <div class="xl:col-span-4 bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                    <!-- Card Header -->
                    <div class="bg-gradient-to-r from-blue-600 to-blue-500 p-6 text-white">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-white bg-opacity-20 rounded-full flex items-center justify-center mr-4">
                                    <i class="fas fa-user-plus text-xl"></i>
                                </div>
                                <div>
                                    <h2 class="text-2xl font-bold">Nuevo Administrador</h2>
                                    <p class="text-blue-100">Complete el formulario para registrar</p>
                                </div>
                            </div>
                            <div class="bg-white text-blue-600 text-sm font-semibold px-3 py-1 rounded-full shadow">
                                Paso 1 de 2
                            </div>
                        </div>
                    </div>

                    <!-- Form Container -->
                    <div class="p-6 overflow-y-auto" style="max-height: calc(100vh - 220px)">
                        <form id="adminForm" method="POST" action="" enctype="multipart/form-data" class="space-y-6">
                            @csrf

                            <!-- Profile Picture Section -->
                            <div class="flex flex-col items-center space-y-4">
                                <div class="relative group">
                                    <div class="relative overflow-hidden rounded-full w-32 h-32 border-4 border-white shadow-xl">
                                        <img id="fotoPreview" src="https://ui-avatars.com/api/?name=N+U&background=random&color=fff&size=128"
                                             class="w-full h-full object-cover transition-all duration-300 group-hover:scale-105">
                                        <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                            <label for="foto" class="cursor-pointer">
                                                <i class="fas fa-camera text-white text-2xl"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <label for="foto" class="absolute -bottom-2 -right-2 bg-gradient-to-r from-blue-600 to-blue-500 text-white p-2 rounded-full cursor-pointer shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-110">
                                        <i class="fas fa-pencil-alt fa-sm"></i>
                                        <input type="file" id="foto" name="foto" class="hidden" accept="image/*" onchange="previewImage(this)">
                                    </label>
                                </div>
                                <span class="text-xs text-gray-500 font-medium">Formatos: JPG, PNG (Max. 2MB)</span>
                            </div>

                            <!-- Personal Information Section -->
                            <div class="space-y-6">
                                <div class="flex items-center">
                                    <div class="w-1 h-8 bg-blue-500 rounded-full mr-3"></div>
                                    <h3 class="text-lg font-semibold text-gray-800">Información Personal</h3>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                    <!-- DNI -->
                                    <div class="space-y-2">
                                        <label class="block text-sm font-medium text-gray-700">DNI <span class="text-red-500">*</span></label>
                                        <div class="relative">
                                            <input type="text" id="dni" name="dni" placeholder="Ingrese DNI (8 dígitos)"
                                                   value="{{ old('dni') }}"
                                                   class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 placeholder-gray-400 bg-white shadow-sm">
                                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                                <i class="fas fa-id-card text-gray-400"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Nombres -->
                                    <div class="space-y-2">
                                        <label class="block text-sm font-medium text-gray-700">Nombres <span class="text-red-500">*</span></label>
                                        <input type="text" name="nombres" placeholder="Ingrese nombres completos"
                                               value="{{ old('nombres') }}"
                                               class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 placeholder-gray-400 bg-white shadow-sm">
                                    </div>

                                    <!-- Apellidos -->
                                    <div class="space-y-2">
                                        <label class="block text-sm font-medium text-gray-700">Apellidos <span class="text-red-500">*</span></label>
                                        <input type="text" name="apellidos" placeholder="Ingrese apellidos completos"
                                               value="{{ old('apellidos') }}"
                                               class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 placeholder-gray-400 bg-white shadow-sm">
                                    </div>

                                    <!-- Email -->
                                    <div class="space-y-2">
                                        <label class="block text-sm font-medium text-gray-700">Correo Electrónico <span class="text-red-500">*</span></label>
                                        <div class="relative">
                                            <input type="email" name="email" placeholder="ejemplo@dominio.com"
                                                   value="{{ old('email') }}"
                                                   class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 placeholder-gray-400 bg-white shadow-sm">
                                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                                <i class="fas fa-envelope text-gray-400"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Teléfono -->
                                    <div class="space-y-2">
                                        <label class="block text-sm font-medium text-gray-700">Teléfono</label>
                                        <div class="relative">
                                            <input type="text" name="telefono" placeholder="Ingrese número telefónico"
                                                   value="{{ old('telefono') }}"
                                                   class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 placeholder-gray-400 bg-white shadow-sm">
                                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                                <i class="fas fa-phone text-gray-400"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Credentials Section -->
                            <div class="space-y-6">
                                <div class="flex items-center">
                                    <div class="w-1 h-8 bg-blue-500 rounded-full mr-3"></div>
                                    <h3 class="text-lg font-semibold text-gray-800">Credenciales de Acceso</h3>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                    <!-- Username -->
                                    <div class="space-y-2">
                                        <label class="block text-sm font-medium text-gray-700">Nombre de Usuario <span class="text-red-500">*</span></label>
                                        <div class="relative">
                                            <input type="text" name="username" placeholder="Ingrese nombre de usuario"
                                                   value="{{ old('username') }}"
                                                   class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 placeholder-gray-400 bg-white shadow-sm">
                                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                                <i class="fas fa-user text-gray-400"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Password -->
                                    <div class="space-y-2">
                                        <label class="block text-sm font-medium text-gray-700">Contraseña <span class="text-red-500">*</span></label>
                                        <div class="relative">
                                            <input type="password" id="password" name="password" placeholder="Ingrese contraseña segura"
                                                   class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 placeholder-gray-400 bg-white shadow-sm">
                                            <button type="button" onclick="togglePasswordVisibility()" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-blue-500 transition-colors">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                        <div class="mt-2">
                                            <div class="w-full bg-gray-200 rounded-full h-2 overflow-hidden">
                                                <div id="strength-bar" class="h-full w-0 transition-all duration-300"></div>
                                            </div>
                                            <div id="strength-hints" class="text-xs text-gray-500 mt-1 flex justify-between">
                                                <span id="strength-text" class="font-medium">Seguridad</span>
                                                <span id="strength-hint" class="text-right"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="space-y-2">
                                        <label class="block text-sm font-medium text-gray-700">Confirmar Contraseña <span class="text-red-500">*</span></label>
                                        <input type="password" name="password_confirmation" placeholder="Repita la contraseña"
                                               class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 placeholder-gray-400 bg-white shadow-sm">
                                    </div>
                                </div>
                            </div>

                            <!-- Account Settings -->
                            <div class="space-y-6">
                                <div class="flex items-center">
                                    <div class="w-1 h-8 bg-blue-500 rounded-full mr-3"></div>
                                    <h3 class="text-lg font-semibold text-gray-800">Configuración de Cuenta</h3>
                                </div>

                                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                                    <!-- Status Toggle -->
                                    <div class="flex items-center">
                                        <label class="flex items-center cursor-pointer">
                                            <div class="relative">
                                                <input type="checkbox" name="estado" value="1" checked class="sr-only">
                                                <div class="block bg-gray-300 w-14 h-8 rounded-full transition-colors duration-300"></div>
                                                <div class="dot absolute left-1 top-1 bg-white w-6 h-6 rounded-full transition-transform duration-300 shadow-md"></div>
                                            </div>
                                            <div class="ml-3 text-gray-700 font-medium">
                                                Cuenta activa
                                            </div>
                                        </label>
                                    </div>

                                    <!-- Role Selector -->
                                    <div class="w-full md:w-48">
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Rol del usuario</label>
                                        <div class="relative">
                                            <select name="rol" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 appearance-none bg-white shadow-sm bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSJub25lIiBzdHJva2U9ImN1cnJlbnRDb2xvciIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiIGNsYXNzPSJsdWNpZGUgbHVjaWRlLWNoZXZyb24tZG93biI+PHBhdGggZD0ibTYgOSA2IDYgNi02Ii8+PC9zdmc+')] bg-no-repeat bg-[right_1rem_center] bg-[length:1.25rem]">
                                                <option value="admin">Administrador</option>
                                                <option value="soporte">Soporte Técnico</option>
                                                <option value="editor">Editor</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit"
                                    class="w-full bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-700 hover:to-blue-600 text-white font-semibold px-6 py-4 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 flex items-center justify-center group mt-8">
                                <i class="fas fa-user-plus mr-3 transition-all duration-300 group-hover:scale-110"></i>
                                Registrar Administrador
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Administrators List -->
                <div class="xl:col-span-8  bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                    <!-- Card Header -->
                    <div class="bg-white p-6 border-b border-gray-200">
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
                                <span class="font-bold">8</span> administradores
                            </div>
                        </div>
                    </div>

                    <!-- Table Container -->
                    <div class="overflow-auto" style="max-height: calc(100vh - 220px)">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50 sticky top-0">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Usuario</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rol</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Sample Row 1 -->
                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/men/32.jpg" alt="">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Juan Pérez</div>
                                            <div class="text-sm text-gray-500">jperez</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2.5 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                        Administrador
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2.5 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Activo
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex justify-end space-x-2">
                                        <button class="text-blue-600 hover:text-blue-900 p-2 rounded-full hover:bg-blue-50 transition" title="Editar">
                                            <i class="fas fa-pen fa-sm"></i>
                                        </button>
                                        <button class="text-yellow-600 hover:text-yellow-900 p-2 rounded-full hover:bg-yellow-50 transition" title="Desactivar">
                                            <i class="fas fa-toggle-on fa-sm"></i>
                                        </button>
                                        <button class="text-red-600 hover:text-red-900 p-2 rounded-full hover:bg-red-50 transition" title="Eliminar">
                                            <i class="fas fa-trash fa-sm"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Sample Row 2 -->
                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/women/44.jpg" alt="">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">María Rodríguez</div>
                                            <div class="text-sm text-gray-500">mrodriguez</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2.5 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">
                                        Soporte Técnico
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2.5 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Activo
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex justify-end space-x-2">
                                        <button class="text-blue-600 hover:text-blue-900 p-2 rounded-full hover:bg-blue-50 transition" title="Editar">
                                            <i class="fas fa-pen fa-sm"></i>
                                        </button>
                                        <button class="text-yellow-600 hover:text-yellow-900 p-2 rounded-full hover:bg-yellow-50 transition" title="Desactivar">
                                            <i class="fas fa-toggle-on fa-sm"></i>
                                        </button>
                                        <button class="text-red-600 hover:text-red-900 p-2 rounded-full hover:bg-red-50 transition" title="Eliminar">
                                            <i class="fas fa-trash fa-sm"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Sample Row 3 -->
                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/men/75.jpg" alt="">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Carlos Gómez</div>
                                            <div class="text-sm text-gray-500">cgomez</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2.5 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                        Administrador
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2.5 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                        Inactivo
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex justify-end space-x-2">
                                        <button class="text-blue-600 hover:text-blue-900 p-2 rounded-full hover:bg-blue-50 transition" title="Editar">
                                            <i class="fas fa-pen fa-sm"></i>
                                        </button>
                                        <button class="text-yellow-600 hover:text-yellow-900 p-2 rounded-full hover:bg-yellow-50 transition" title="Activar">
                                            <i class="fas fa-toggle-off fa-sm"></i>
                                        </button>
                                        <button class="text-red-600 hover:text-red-900 p-2 rounded-full hover:bg-red-50 transition" title="Eliminar">
                                            <i class="fas fa-trash fa-sm"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- More rows would go here -->
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="bg-white px-6 py-4 border-t border-gray-200">
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
                </div>
            </div>
        </div>
    </div>

    <!-- Custom Styles -->
    <style>
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e0;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #a0aec0;
        }

        /* Toggle switch */
        input:checked ~ .dot {
            transform: translateX(100%);
            background-color: #3b82f6;
        }

        input:checked ~ .block {
            background-color: #93c5fd;
        }

        /* Table row hover effect */
        tr {
            transition: all 0.2s ease;
        }

        /* Gradient text for active elements */
        .gradient-text {
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            background-image: linear-gradient(to right, #3b82f6, #6366f1);
        }

        /* Smooth transitions */
        .transition-all {
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 200ms;
        }
    </style>

    <!-- JavaScript -->
    <script>
        // Image preview function
        function previewImage(input) {
            if (input.files && input.files[0]) {
                // Validate file size (2MB max)
                if (input.files[0].size > 2 * 1024 * 1024) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Archivo demasiado grande',
                        text: 'La imagen no debe superar los 2MB',
                        confirmButtonText: 'Entendido',
                        customClass: {
                            popup: 'rounded-xl shadow-2xl'
                        },
                        background: '#ffffff'
                    });
                    input.value = '';
                    return;
                }

                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('fotoPreview').setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        // Toggle password visibility
        function togglePasswordVisibility() {
            const passwordField = document.getElementById('password');
            const eyeIcon = passwordField.nextElementSibling.querySelector('i');

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }

        // Password strength meter
        document.getElementById('password').addEventListener('input', function(e) {
            const password = e.target.value;
            const strengthBar = document.getElementById('strength-bar');
            const strengthText = document.getElementById('strength-text');
            const strengthHint = document.getElementById('strength-hint');

            // Reset
            strengthBar.style.width = '0%';
            strengthBar.className = 'h-full bg-gray-400 transition-all duration-300';
            strengthText.textContent = 'Seguridad';
            strengthText.className = 'font-medium';
            strengthHint.textContent = '';

            if (!password) return;

            // Calculate strength
            let strength = 0;
            let hints = [];

            // Length checks
            if (password.length >= 6) strength += 20;
            if (password.length >= 10) strength += 20;
            else hints.push('mínimo 10 caracteres');

            // Character diversity
            if (/[A-Z]/.test(password)) strength += 15;
            else hints.push('añadir mayúsculas');

            if (/[0-9]/.test(password)) strength += 15;
            else hints.push('añadir números');

            if (/[^A-Za-z0-9]/.test(password)) strength += 15;
            else hints.push('añadir símbolos');

            // Common patterns (negative points)
            if (/(.)\1{2,}/.test(password)) strength -= 10; // Repeated chars
            if (/123|abc|qwerty/.test(password.toLowerCase())) strength -= 15; // Common sequences

            // Cap at 100
            strength = Math.max(0, Math.min(100, strength));

            // Update UI
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

            if (hints.length > 0 && strength < 70) {
                strengthHint.textContent = 'Sugerencia: ' + hints.join(', ');
            }
        });

        // Form validation
        document.addEventListener('DOMContentLoaded', function() {
            // Show notifications
            @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: '{{ session('success') }}',
                confirmButtonText: 'Entendido',
                customClass: {
                    popup: 'rounded-xl shadow-2xl'
                },
                background: '#ffffff'
            });
            @endif

            @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('error') }}',
                confirmButtonText: 'Entendido',
                customClass: {
                    popup: 'rounded-xl shadow-2xl'
                },
                background: '#ffffff'
            });
            @endif

            // Form submission validation
            document.getElementById('adminForm').addEventListener('submit', function(event) {
                let isValid = true;
                const errors = [];
                const dni = document.getElementById('dni').value;
                const password = document.getElementById('password').value;

                // DNI validation
                if (!/^\d{8}$/.test(dni)) {
                    errors.push('El DNI debe contener exactamente 8 dígitos numéricos');
                    isValid = false;
                }

                // Password validation
                if (password.length < 6) {
                    errors.push('La contraseña debe tener al menos 6 caracteres');
                    isValid = false;
                }

                if (!isValid) {
                    event.preventDefault();
                    Swal.fire({
                        icon: 'error',
                        title: 'Error en el formulario',
                        html: `<div class="text-left"><ul class="list-disc pl-5 space-y-1">${errors.map(error => `<li>${error}</li>`).join('')}</ul></div>`,
                        confirmButtonText: 'Entendido',
                        customClass: {
                            popup: 'rounded-xl shadow-2xl'
                        },
                        background: '#ffffff'
                    });
                }
            });
        });
    </script>
@endsection
