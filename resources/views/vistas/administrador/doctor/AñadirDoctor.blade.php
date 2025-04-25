@extends('plantillas.administrador.plantilla')

@section('title', 'Registro Médico')

@section('menu')
    @include('vistas.administrador.menu')
@endsection

@section('submenu')
    @include('vistas.administrador.doctor.nav')
@endsection

@section('content')
    <div class="min-h-screen" style="background-color: rgb(34, 37, 42); padding: 2rem;">
        <div class="max-w-5xl mx-auto">
            <!-- Encabezado mejorado para modo oscuro -->
            <div class="text-center mb-10">
                <div class="inline-flex items-center justify-center mb-4">
                    <div class="bg-gray-800 p-3 rounded-full shadow-lg border border-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <h2 class="text-3xl font-bold text-white mb-2">Registro de Profesional Médico</h2>
                <p class="text-lg text-gray-300 max-w-2xl mx-auto">Complete el formulario para registrar un nuevo médico en el sistema. Todos los campos son obligatorios.</p>
            </div>

            <!-- Tarjeta del formulario en modo oscuro -->
            <div class="bg-gray-800 rounded-xl shadow-lg overflow-hidden border border-gray-700">
                <!-- Barra de progreso visual -->
                <div class="h-1 bg-gray-700">
                    <div class="h-full bg-blue-500 w-0" id="progress-bar"></div>
                </div>

                <div class="p-8 sm:p-10">
                    <form action="{{ route('agregarDoctor') }}" method="POST" enctype="multipart/form-data" class="space-y-8" id="doctor-form">
                        @csrf

                        <!-- Sección de información personal en modo oscuro -->
                        <div class="space-y-6" id="personal-info-section">
                            <div class="flex items-center space-x-3">
                                <div class="bg-blue-900 bg-opacity-50 p-2 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <h3 class="text-xl font-semibold text-white">Información Personal</h3>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Nombre -->
                                <div class="space-y-1">
                                    <label for="nombre" class="block text-sm font-medium text-gray-300 flex items-center">
                                        Nombre
                                        <span class="text-red-400 ml-1">*</span>
                                    </label>
                                    <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}"
                                           class="w-full px-4 py-3 rounded-lg border border-gray-600 bg-gray-700 text-black focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 placeholder-gray-400"
                                           placeholder="Ej: Carlos" required>
                                    @error('nombre')
                                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Apellido -->
                                <div class="space-y-1">
                                    <label for="apellido" class="block text-sm font-medium text-gray-300 flex items-center">
                                        Apellido
                                        <span class="text-red-400 ml-1">*</span>
                                    </label>
                                    <input type="text" name="apellido" id="apellido" value="{{ old('apellido') }}"
                                           class="w-full px-4 py-3 rounded-lg border border-gray-600 bg-gray-700 text-black focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 placeholder-gray-400"
                                           placeholder="Ej: Martínez" required>
                                    @error('apellido')
                                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- DNI -->
                                <div class="space-y-1">
                                    <label for="dni" class="block text-sm font-medium text-gray-300 flex items-center">
                                        DNI
                                        <span class="text-red-400 ml-1">*</span>
                                    </label>
                                    <input type="text" name="dni" id="dni" value="{{ old('dni') }}"
                                           class="w-full px-4 py-3 rounded-lg border border-gray-600 bg-gray-700 text-black focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 placeholder-gray-400"
                                           placeholder="Ej: 12345678" maxlength="8" pattern="\d{8}" required>
                                    @error('dni')
                                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Especialidad -->
                                <div class="space-y-1">
                                    <label for="especialidad" class="block text-sm font-medium text-gray-300 flex items-center">
                                        Especialidad
                                        <span class="text-red-400 ml-1">*</span>
                                    </label>
                                    <select id="especialidad" name="especialidad" required
                                            class="w-full px-4 py-3 rounded-lg border border-gray-600 bg-gray-700 text-black focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 appearance-none">
                                        <option value="" disabled selected>Seleccione una especialidad</option>
                                        @foreach($especialidades as $especialidad)
                                            <option value="{{ $especialidad->nombre }}" {{ old('especialidad') == $especialidad->nombre ? 'selected' : '' }}>
                                                {{ $especialidad->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('especialidad')
                                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <!-- Correo -->
                        <div class="space-y-1">
                            <label for="correo" class="block text-sm font-medium text-gray-300 flex items-center">
                                Correo electrónico institucional
                                <span class="text-red-400 ml-1">*</span>
                            </label>
                            <input type="email" name="correo" id="correo" value="{{ old('correo') }}"
                                   class="w-full px-4 py-3 rounded-lg border border-gray-600 bg-gray-700 text-black focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 placeholder-gray-400"
                                   placeholder="ejemplo@clinica.com" required>
                            @error('correo')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Contraseña mejorada -->
                        <div class="space-y-1">
                            <label for="password" class="block text-sm font-medium text-gray-300 flex items-center">
                                Contraseña
                                <span class="text-red-400 ml-1">*</span>
                            </label>
                            <div class="relative">
                                <input id="password" name="password" type="password" value="{{ old('password') }}"
                                       class="w-full px-4 py-3 rounded-lg border border-gray-600 bg-gray-700 text-black focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 placeholder-gray-400 pr-12"
                                       placeholder="Mínimo 8 caracteres" minlength="8" required>
                                <button type="button" onclick="togglePassword()"
                                        class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-blue-400 transition-colors">
                                    <svg id="password-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </div>
                            <p class="mt-1 text-xs text-gray-400">La contraseña debe contener al menos 8 caracteres</p>
                            @error('password')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Botón de enviar -->
                        <button type="submit"
                                class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors shadow-md hover:shadow-lg flex items-center justify-center space-x-2">
                            <span>Registrar Doctor</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Función para mostrar/ocultar contraseña mejorada
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

        // Función para resetear el formulario
        function resetForm() {
            document.getElementById("doctor-form").reset();
            updateProgressBar();

            // Resetear clases de error
            document.querySelectorAll('.border-red-500').forEach(el => {
                el.classList.remove('border-red-500');
                el.classList.add('border-gray-600');
            });
        }

        // Actualizar barra de progreso
        function updateProgressBar() {
            const form = document.getElementById("doctor-form");
            const requiredFields = form.querySelectorAll("[required]");
            let completedFields = 0;

            requiredFields.forEach(field => {
                if (field.value.trim() !== "") {
                    completedFields++;
                }
            });

            const progress = (completedFields / requiredFields.length) * 100;
            document.getElementById("progress-bar").style.width = `${progress}%`;
        }

        // Escuchar cambios en los campos para actualizar la barra de progreso
        document.querySelectorAll("#doctor-form input, #doctor-form select").forEach(field => {
            field.addEventListener("input", updateProgressBar);
            field.addEventListener("change", updateProgressBar);
        });

        // Mostrar alerta de éxito si existe en la sesión
        @if(session()->has('success'))
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Registro exitoso',
            html: `
            <div class="text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-green-400 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p class="text-gray-300">${'{{ session('success') }}'}</p>
            </div>
            `,
            showConfirmButton: false,
            timer: 3000,
            background: '#1F2937',
            color: '#ffffff'
        });
        @endif

        // Mostrar alerta de error por campos duplicados
        @if(session()->has('duplicate_error'))
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Error de registro',
            html: `
            <div class="text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-red-400 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p class="text-gray-300">{{ session('duplicate_error') }}</p>
            </div>
            `,
            showConfirmButton: true,
            background: '#1F2937',
            color: '#ffffff',
            confirmButtonColor: '#3B82F6'
        });
        @endif

        // Mostrar otros errores genéricos
        @if(session()->has('error'))
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Error',
            html: `
            <div class="text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-red-400 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p class="text-gray-300">{{ session('error') }}</p>
            </div>
            `,
            showConfirmButton: true,
            background: '#1F2937',
            color: '#ffffff',
            confirmButtonColor: '#3B82F6'
        });
        @endif

        // Validación mejorada del formulario
        document.getElementById('doctor-form').addEventListener('submit', function(event) {
            const requiredFields = ['nombre', 'apellido', 'dni', 'especialidad', 'correo', 'password'];
            let missingFields = [];
            let invalidFields = [];

            // Validar campos requeridos
            requiredFields.forEach(field => {
                const element = document.querySelector(`[name="${field}"]`);
                if (!element.value.trim()) {
                    missingFields.push(field);
                    element.classList.add('border-red-500');
                    element.classList.remove('border-gray-600');
                } else {
                    element.classList.remove('border-red-500');
                    element.classList.add('border-gray-600');
                }
            });

            // Validación especial para DNI (8 dígitos)
            const dniField = document.getElementById('dni');
            if (dniField.value && !/^\d{8}$/.test(dniField.value)) {
                invalidFields.push({field: 'dni', message: 'DNI debe tener exactamente 8 dígitos numéricos'});
                dniField.classList.add('border-red-500');
            }

            // Validación de email
            const emailField = document.getElementById('correo');
            if (emailField.value && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailField.value)) {
                invalidFields.push({field: 'correo', message: 'Correo electrónico no válido'});
                emailField.classList.add('border-red-500');
            }

            if (missingFields.length > 0 || invalidFields.length > 0) {
                event.preventDefault();

                // Scroll al primer campo con error
                const firstErrorField = missingFields[0] || invalidFields[0].field;
                document.querySelector(`[name="${firstErrorField}"]`).scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });

                let errorHtml = '<div class="text-left">';

                if (missingFields.length > 0) {
                    errorHtml += '<p class="mb-2 text-gray-300">Por favor complete los siguientes campos:</p><ul class="list-disc pl-5 space-y-1 text-sm text-gray-300 mb-3">';
                    errorHtml += missingFields.map(field => {
                        let fieldName = '';
                        switch(field) {
                            case 'nombre': fieldName = 'Nombre'; break;
                            case 'apellido': fieldName = 'Apellido'; break;
                            case 'dni': fieldName = 'DNI'; break;
                            case 'especialidad': fieldName = 'Especialidad'; break;
                            case 'correo': fieldName = 'Correo electrónico'; break;
                            case 'password': fieldName = 'Contraseña'; break;
                        }
                        return `<li><span class="font-medium">${fieldName}</span></li>`;
                    }).join('');
                    errorHtml += '</ul>';
                }

                if (invalidFields.length > 0) {
                    errorHtml += '<p class="mb-2 text-gray-300">Corrija los siguientes errores:</p><ul class="list-disc pl-5 space-y-1 text-sm text-gray-300">';
                    errorHtml += invalidFields.map(error => {
                        return `<li><span class="font-medium">${error.message}</span></li>`;
                    }).join('');
                    errorHtml += '</ul>';
                }

                errorHtml += '</div>';

                Swal.fire({
                    icon: 'error',
                    title: 'Formulario incompleto',
                    html: errorHtml,
                    confirmButtonColor: '#3B82F6',
                    background: '#1F2937',
                    color: '#ffffff',
                    scrollbarPadding: false
                });
            }
        });

        // Inicializar barra de progreso
        document.addEventListener('DOMContentLoaded', function() {
            updateProgressBar();

            // Añadir máscara para DNI (solo números)
            document.getElementById('dni').addEventListener('input', function(e) {
                this.value = this.value.replace(/[^0-9]/g, '');
            });
        });
    </script>
@endsection
