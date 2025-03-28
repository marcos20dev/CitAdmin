@extends('plantillas.administrador.plantilla')

@section('title', 'Registro Médico')

@section('menu')
    @include('vistas.administrador.menu')
@endsection

@section('submenu')
    @include('vistas.administrador.doctor.nav')
@endsection

@section('content')
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <!-- Encabezado con logo médico -->
            <div class="text-center mb-12">
                <div class="mx-auto h-20 w-20 bg-red-50 rounded-full flex items-center justify-center mb-4 shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <h2 class="text-4xl font-bold text-gray-800 mb-2">Registro de Médico</h2>
                <p class="text-lg text-gray-600">Complete todos los campos para registrar un nuevo profesional</p>
            </div>

            <!-- Tarjeta del formulario -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden max-w-4xl mx-auto">
                <div class="p-8 sm:p-10">
                    <form action="{{ route('agregarDoctor') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                        @csrf

                        <!-- Sección de información personal -->
                        <div class="space-y-6">
                            <h3 class="text-xl font-semibold text-gray-800 border-b pb-2">Información Personal</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Nombre -->
                                <div>
                                    <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                                    <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}"
                                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-200 placeholder-gray-400"
                                           placeholder="Nombre del médico">
                                    @error('nombre')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Apellido -->
                                <div>
                                    <label for="apellido" class="block text-sm font-medium text-gray-700 mb-1">Apellido</label>
                                    <input type="text" name="apellido" id="apellido" value="{{ old('apellido') }}"
                                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-200 placeholder-gray-400"
                                           placeholder="Apellido del médico">
                                    @error('apellido')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- DNI -->
                                <div>
                                    <label for="dni" class="block text-sm font-medium text-gray-700 mb-1">DNI</label>
                                    <input type="text" name="dni" id="dni" value="{{ old('dni') }}"
                                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-200 placeholder-gray-400"
                                           placeholder="Número de documento">
                                    @error('dni')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Especialidad -->
                                <div>
                                    <label for="especialidad" class="block text-sm font-medium text-gray-700 mb-1">Especialidad</label>
                                    <select id="especialidad" name="especialidad"
                                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-200 bg-white">
                                        <option value="" disabled selected>Seleccione especialidad</option>
                                        <option value="Cardiología">Cardiología</option>
                                        <option value="Dermatología">Dermatología</option>
                                        <option value="Gastroenterología">Gastroenterología</option>
                                    </select>
                                    @error('especialidad')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Sección de credenciales -->
                        <div class="space-y-6">
                            <h3 class="text-xl font-semibold text-gray-800 border-b pb-2">Credenciales de Acceso</h3>
                            <div class="grid grid-cols-1 gap-6">
                                <!-- Correo electrónico -->
                                <div>
                                    <label for="correo" class="block text-sm font-medium text-gray-700 mb-1">Correo electrónico</label>
                                    <input type="email" name="correo" id="correo" value="{{ old('correo') }}"
                                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-200 placeholder-gray-400"
                                           placeholder="correo@clinica.com">
                                    @error('correo')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Contraseña -->
                                <div>
                                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Contraseña</label>
                                    <div class="relative">
                                        <input id="password" name="password" type="password" value="{{ old('password') }}"
                                               class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-200 placeholder-gray-400 pr-12"
                                               placeholder="Mínimo 8 caracteres">
                                        <button type="button" onclick="togglePassword()"
                                                class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-red-500">
                                            <svg id="password-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </button>
                                    </div>
                                    @error('password')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Botón de envío -->
                        <div class="pt-4">
                            <button type="submit"
                                    class="w-full bg-red-600 hover:bg-red-700 text-white font-medium py-3 px-6 rounded-lg transition duration-200 shadow-md hover:shadow-lg flex items-center justify-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                <span>Registrar Médico</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Función para mostrar/ocultar contraseña
        function togglePassword() {
            const password = document.getElementById("password");
            const icon = document.getElementById("password-icon");

            if (password.type === "text") {
                password.type = "password";
                icon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            `;
            } else {
                password.type = "text";
                icon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
            `;
            }
        }

        // Mostrar alerta de éxito si existe en la sesión
        @if(session()->has('success'))
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Registro exitoso',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 3000,
            toast: true,
            background: '#f8fafc',
            backdrop: false
        });
        @endif

        // Validación del formulario antes de enviar
        document.querySelector('form').addEventListener('submit', function(event) {
            const requiredFields = ['nombre', 'apellido', 'dni', 'especialidad', 'correo', 'password'];
            let missingFields = [];

            requiredFields.forEach(field => {
                const value = document.querySelector(`[name="${field}"]`).value.trim();
                if (!value) {
                    missingFields.push(field);
                }
            });

            if (missingFields.length > 0) {
                event.preventDefault();

                Swal.fire({
                    icon: 'error',
                    title: 'Campos incompletos',
                    html: `
                    <div class="text-left">
                        <p class="mb-2">Por favor complete los siguientes campos:</p>
                        <ul class="list-disc pl-5 space-y-1">
                            ${missingFields.map(field => {
                        let fieldName = '';
                        switch(field) {
                            case 'nombre': fieldName = 'Nombre'; break;
                            case 'apellido': fieldName = 'Apellido'; break;
                            case 'dni': fieldName = 'DNI'; break;
                            case 'especialidad': fieldName = 'Especialidad'; break;
                            case 'correo': fieldName = 'Correo electrónico'; break;
                            case 'password': fieldName = 'Contraseña'; break;
                        }
                        return `<li>${fieldName}</li>`;
                    }).join('')}
                        </ul>
                    </div>
                `,
                    confirmButtonColor: '#EF4444',
                    background: '#ffffff'
                });
            }
        });
    </script>
@endsection
