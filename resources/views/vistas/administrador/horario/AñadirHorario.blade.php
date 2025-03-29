


@extends('plantillas.administrador.plantilla')

@section('title', 'Añadir Horario')
@section('submenu')
    @include('vistas.administrador.horario.nav')
@endsection
@section('menu')
    @include('vistas.administrador.menu')
@endsection

@section('content')
    <div class="min-h-screen" style="background-color: rgb(34, 37, 42);">
        <div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
            <!-- Encabezado -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-white mb-2">Registrar Horario Médico</h1>
                <p class="text-gray-400">Complete los datos para programar los horarios de atención</p>
            </div>

            <!-- Tarjeta principal -->
            <div class="bg-gray-800 rounded-xl shadow-lg overflow-hidden border border-gray-700">
                <!-- Barra de progreso visual (opcional) -->
                <div class="h-1 bg-gray-700">
                    <div class="h-full bg-blue-500 w-0" id="progress-bar"></div>
                </div>

                <div class="p-6 sm:p-8">
                    <!-- Formulario de búsqueda de doctor -->
                    <div class="mb-8">
                        <div class="flex items-center mb-4">
                            <div class="bg-blue-900 bg-opacity-50 p-2 rounded-full mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <h2 class="text-xl font-semibold text-white">Información del Médico</h2>
                        </div>

                        <form id="buscarDoctorForm" class="space-y-4">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class="md:col-span-2">
                                    <label for="dni" class="block text-sm font-medium text-gray-300 mb-1">
                                        DNI del doctor
                                        <span class="text-red-400">*</span>
                                    </label>
                                    <div class="flex">
                                        <input type="text" name="dni" id="dni" value="{{ old('dni') }}"
                                               class="flex-grow px-4 py-2 rounded-l-lg border border-gray-600 bg-gray-700 text-black focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                                               placeholder="Ingrese el DNI" required>
                                        <button type="submit"
                                                class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-r-lg transition-colors flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                            </svg>
                                            <span class="ml-1">Buscar</span>
                                        </button>
                                    </div>
                                    @error('dni')
                                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-300 mb-1">Nombre completo</label>
                                    <input type="text" id="doctorName" disabled
                                           class="w-full px-4 py-2 rounded-lg border border-gray-600 bg-gray-700 text-gray-300">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-300 mb-1">Especialidad</label>
                                    <input type="text" id="doctorSpecialty" disabled
                                           class="w-full px-4 py-2 rounded-lg border border-gray-600 bg-gray-700 text-gray-300">
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Formulario de horario -->
                    <div class="mb-8">
                        <div class="flex items-center mb-4">
                            <div class="bg-blue-900 bg-opacity-50 p-2 rounded-full mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h2 class="text-xl font-semibold text-white">Configuración de Horario</h2>
                        </div>

                        <form id="scheduleForm" action="" method="POST" enctype="multipart/form-data" class="space-y-4">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <label for="fecha" class="block text-sm font-medium text-gray-300 mb-1">
                                        Fecha de atención
                                        <span class="text-red-400">*</span>
                                    </label>
                                    <input type="date" name="fecha" id="fecha" value="{{ old('fecha') }}"
                                           class="w-full px-4 py-2 rounded-lg border border-gray-600 bg-gray-700 text-black focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200">

                                    @error('fecha')
                                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="hora_inicio" class="block text-sm font-medium text-gray-300 mb-1">
                                        Hora de inicio
                                        <span class="text-red-400">*</span>
                                    </label>
                                    <input type="time" name="hora_inicio" id="hora_inicio" value="{{ old('hora_inicio') }}"
                                           class="w-full px-4 py-2 rounded-lg border border-gray-600 bg-gray-700 text-black focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200">

                                    @error('hora_inicio')
                                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="hora_fin" class="block text-sm font-medium text-gray-300 mb-1">
                                        Hora de fin
                                        <span class="text-red-400">*</span>
                                    </label>
                                    <input type="time" name="hora_fin" id="hora_fin" value="{{ old('hora_fin') }}"
                                           class="w-full px-4 py-2 rounded-lg border border-gray-600 bg-gray-700 text-black focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200">

                                    @error('hora_fin')
                                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="intervalo" class="block text-sm font-medium text-gray-300 mb-1">
                                        Intervalo entre citas (minutos)
                                        <span class="text-red-400">*</span>
                                    </label>
                                    <div class="flex items-center space-x-2">
                                        <input type="number"
                                               name="intervalo"
                                               id="intervalo"
                                               value="15"
                                               min="5"
                                               max="120"
                                               step="5"
                                               class="w-full px-4 py-2 rounded-lg border border-gray-600 bg-gray-700 text-black focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200">
                                        <span class="text-gray-300 whitespace-nowrap">minutos</span>
                                    </div>
                                    <p class="mt-1 text-xs text-gray-400">Ingrese un valor entre 5 y 120 (múltiplos de 5)</p>
                                </div>
                            </div>

                            <div class="pt-2">
                                <button type="button" id="createSchedule"
                                        class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors shadow-md hover:shadow-lg flex items-center justify-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                    <span>Generar Horario</span>
                                </button>
                            </div>
                            <input type="hidden" id="intervalos" name="intervalos">
                        </form>
                    </div>

                    <!-- Resultado del horario generado -->
                    <div id="scheduleOutput" class="hidden mb-8 p-6 rounded-lg border border-gray-700 bg-gray-800">
                        <div class="flex items-center mb-4">
                            <div class="bg-green-900 bg-opacity-50 p-2 rounded-full mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h2 class="text-xl font-semibold text-white">Horario Generado</h2>
                        </div>

                        <div id="scheduleContent" class="space-y-4">
                            <!-- Contenido generado dinámicamente -->
                        </div>
                    </div>

                    <!-- Sección de confirmación -->
                    <div id="additionalSection" class="hidden p-6 rounded-lg border border-gray-700 bg-gray-800">
                        <div class="flex justify-end">
                            <button type="button" id="registerButton"
                                    class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition-colors shadow-md hover:shadow-lg flex items-center justify-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Confirmar y Registrar Horario</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Buscar doctor por DNI
            document.getElementById('buscarDoctorForm').addEventListener('submit', function(e) {
                e.preventDefault();

                const dni = document.getElementById('dni').value;
                const csrfToken = document.querySelector('input[name="_token"]').value;

                // Mostrar carga
                const buscarBtn = this.querySelector('button[type="submit"]');
                buscarBtn.innerHTML = '<span class="animate-spin">↻</span> Buscando...';
                buscarBtn.disabled = true;

                fetch('{{ route('buscardoctor') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({
                        dni: dni
                    })
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Error en la respuesta del servidor');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            document.getElementById('doctorName').value = data.nombre + ' ' + data.apellido;
                            document.getElementById('doctorSpecialty').value = data.especialidad;

                            // Mostrar notificación de éxito
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Doctor encontrado',
                                showConfirmButton: false,
                                timer: 1500,
                                background: '#1F2937',
                                color: '#ffffff'
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Doctor no encontrado',
                                text: data.message || 'Verifique el DNI e intente nuevamente',
                                background: '#1F2937',
                                color: '#ffffff',
                                confirmButtonColor: '#3B82F6'
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Ha ocurrido un error. Por favor, intenta nuevamente.',
                            background: '#1F2937',
                            color: '#ffffff',
                            confirmButtonColor: '#3B82F6'
                        });
                    })
                    .finally(() => {
                        buscarBtn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg><span class="ml-1">Buscar</span>';
                        buscarBtn.disabled = false;
                    });
            });

            // Generar horario
            document.getElementById('createSchedule').addEventListener('click', function() {
                // Obtener valores
                const dni = document.getElementById('dni').value;
                const nombre = document.getElementById('doctorName').value;
                const especialidad = document.getElementById('doctorSpecialty').value;
                const fecha = document.getElementById('fecha').value;
                const horaInicio = document.getElementById('hora_inicio').value;
                const horaFin = document.getElementById('hora_fin').value;
                const intervalo = parseInt(document.getElementById('intervalo').value);

                // Validar campos
                if (!dni || !nombre || !especialidad || !fecha || !horaInicio || !horaFin || !intervalo) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Campos incompletos',
                        text: 'Por favor complete todos los campos requeridos',
                        background: '#1F2937',
                        color: '#ffffff',
                        confirmButtonColor: '#3B82F6'
                    });
                    return;
                }

                // Convertir horas a minutos
                const [horaInicioHoras, horaInicioMinutos] = horaInicio.split(':').map(Number);
                const [horaFinHoras, horaFinMinutos] = horaFin.split(':').map(Number);

                const inicioEnMinutos = horaInicioHoras * 60 + horaInicioMinutos;
                const finEnMinutos = horaFinHoras * 60 + horaFinMinutos;

                // Validar que la hora de fin sea mayor que la de inicio
                if (finEnMinutos <= inicioEnMinutos) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Horario inválido',
                        text: 'La hora de fin debe ser mayor que la hora de inicio',
                        background: '#1F2937',
                        color: '#ffffff',
                        confirmButtonColor: '#3B82F6'
                    });
                    return;
                }

                // Generar intervalos
                let intervalos = [];
                for (let tiempo = inicioEnMinutos; tiempo < finEnMinutos; tiempo += intervalo) {
                    const horasInicio = Math.floor(tiempo / 60);
                    const minutosInicio = tiempo % 60;
                    const horasFin = Math.floor((tiempo + intervalo) / 60);
                    const minutosFin = (tiempo + intervalo) % 60;

                    const horasInicioStr = horasInicio.toString().padStart(2, '0');
                    const minutosInicioStr = minutosInicio.toString().padStart(2, '0');
                    const horasFinStr = horasFin.toString().padStart(2, '0');
                    const minutosFinStr = minutosFin.toString().padStart(2, '0');

                    const intervaloStr = `${horasInicioStr}:${minutosInicioStr} - ${horasFinStr}:${minutosFinStr}`;
                    intervalos.push(intervaloStr);
                }
// SOLUCIÓN CORRECTA: Manejo preciso de fechas sin ajustes manuales
                const fechaObj = new Date(fecha + 'T12:00:00'); // Agregamos hora del día neutral

// Mostrar resultados con la fecha exacta
                const fechaCita = fechaObj.toLocaleDateString('es-ES', {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric',
                    timeZone: 'America/Lima' // Ajusta esto a tu zona horaria específica
                });

// Para almacenamiento (formato ISO sin zona horaria)
                const fechaParaEnvio = fechaObj.toISOString().split('T')[0];

                let outputHtml = `
    <div class="space-y-2">
        <p><span class="font-semibold text-blue-400">Doctor:</span> <span class="text-gray-300">${nombre}</span></p>
        <p><span class="font-semibold text-blue-400">Especialidad:</span> <span class="text-gray-300">${especialidad}</span></p>
        <p><span class="font-semibold text-blue-400">Fecha:</span> <span class="text-gray-300">${fechaCita}</span></p>
        <p><span class="font-semibold text-blue-400">Horario:</span> <span class="text-gray-300">${horaInicio} - ${horaFin}</span></p>
        <p><span class="font-semibold text-blue-400">Duración por cita:</span> <span class="text-gray-300">${intervalo} minutos</span></p>
    </div>

    <div class="mt-6">
        <h3 class="text-lg font-semibold text-white mb-3">Turnos generados:</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
    `;

                intervalos.forEach(intervalo => {
                    outputHtml += `
        <div class="bg-gray-700 rounded-lg p-3 border border-gray-600">
            <div class="flex items-center justify-between">
                <span class="text-white">${intervalo}</span>
                <span class="text-green-400 text-xs">Disponible</span>
            </div>
        </div>
        `;
                });

                outputHtml += `
        </div>
        <p class="mt-3 text-sm text-gray-400">Total de turnos: ${intervalos.length}</p>
    </div>
    `;

                // Mostrar contenido
                document.getElementById('scheduleContent').innerHTML = outputHtml;
                document.getElementById('scheduleOutput').classList.remove('hidden');
                document.getElementById('additionalSection').classList.remove('hidden');

                // Guardar intervalos para enviar (con fecha corregida)
                const intervalosData = {
                    fecha: fechaObj.toISOString().split('T')[0], // Formato YYYY-MM-DD
                    intervalos: intervalos,
                    // otros datos necesarios...
                };
                document.getElementById('intervalos').value = JSON.stringify(intervalosData);
            });

            // Registrar horario
            document.getElementById('registerButton').addEventListener('click', function() {
                const registerBtn = this;
                registerBtn.innerHTML = '<span class="animate-spin">↻</span> Registrando...';
                registerBtn.disabled = true;

                const dni = document.getElementById('dni').value;
                const fecha = document.getElementById('fecha').value;
                const horaInicio = document.getElementById('hora_inicio').value;
                const horaFin = document.getElementById('hora_fin').value;
                const intervalo = document.getElementById('intervalo').value;
                const intervalos = JSON.parse(document.getElementById('intervalos').value);
                const csrfToken = document.querySelector('input[name="_token"]').value;

                fetch('{{ route('horarios.store') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({
                        dni: dni,
                        fecha: fecha,
                        hora_inicio: horaInicio,
                        hora_fin: horaFin,
                        intervalo: intervalo,
                        intervalos: intervalos
                    })
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Error en la respuesta del servidor');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            Swal.fire({
                                icon: 'success',
                                title: '¡Éxito!',
                                text: 'Horario registrado correctamente',
                                background: '#1F2937',
                                color: '#ffffff',
                                confirmButtonColor: '#3B82F6'
                            }).then(() => {
                                // Limpiar formulario
                                document.getElementById('buscarDoctorForm').reset();
                                document.getElementById('scheduleForm').reset();
                                document.getElementById('doctorName').value = '';
                                document.getElementById('doctorSpecialty').value = '';
                                document.getElementById('scheduleOutput').classList.add('hidden');
                                document.getElementById('additionalSection').classList.add('hidden');
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: data.message || 'No se pudo registrar el horario',
                                background: '#1F2937',
                                color: '#ffffff',
                                confirmButtonColor: '#3B82F6'
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Ha ocurrido un error al registrar el horario',
                            background: '#1F2937',
                            color: '#ffffff',
                            confirmButtonColor: '#3B82F6'
                        });
                    })
                    .finally(() => {
                        registerBtn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg><span class="ml-1">Confirmar y Registrar Horario</span>';
                        registerBtn.disabled = false;
                    });
            });
        });
    </script>
@endsection
