@extends('plantillas.administrador.plantilla')

@section('title', 'Reasignación Masiva de Pacientes')

@section('menu')
    @include('vistas.administrador.menu')
@endsection

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="bg-gray-800 rounded-lg shadow-xl p-6">
            <!-- Encabezado -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-white mb-2">Reasignación de Pacientes</h1>
                <p class="text-gray-400">Seleccione pacientes y transfiéralos a otro médico</p>
            </div>

            <!-- Contenedor Principal -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Sección Origen -->
                <div class="bg-gray-700 p-4 rounded-lg">
                    <h2 class="text-xl text-white mb-4">Pacientes Actuales</h2>

                    <!-- Filtros Origen -->
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div>
                            <label class="block text-gray-300 mb-2">Doctor Origen</label>
                            <select id="doctorOrigen" class="w-full bg-gray-600 text-white rounded p-2">
                                <option value="">Seleccionar médico</option>
                                <option value="DOC001">Dra. Ana Pérez (Cardiología)</option>
                                <option value="DOC002">Dr. Luis Gómez (Cardiología)</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-300 mb-2">Fecha de Citas</label>
                            <input type="date" id="fechaCitas" class="w-full bg-gray-600 text-white rounded p-2">
                        </div>
                    </div>

                    <!-- Lista de Pacientes con Selección -->
                    <div class="pacientes-container">
                        <div class="flex justify-between items-center mb-3">
                            <h3 class="text-lg text-white">Listado de Pacientes</h3>
                            <button id="seleccionarTodos" class="text-blue-400 hover:text-blue-300 text-sm">
                                Seleccionar Todos
                            </button>
                        </div>

                        <div class="space-y-2" id="listaPacientes">
                            <!-- Ejemplo de paciente -->
                            <div class="paciente-item bg-gray-600 p-3 rounded flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <input type="checkbox" class="paciente-checkbox">
                                    <div>
                                        <span class="text-white">Carlos Sánchez</span>
                                        <div class="text-sm text-gray-400">09:00 AM - Cardiología</div>
                                    </div>
                                </div>
                                <span class="text-sm text-gray-400">Cita #123</span>
                            </div>
                            <!-- Más pacientes... -->
                        </div>
                    </div>
                </div>

                <!-- Sección Destino -->
                <div class="bg-gray-700 p-4 rounded-lg">
                    <h2 class="text-xl text-white mb-4">Destino de Reasignación</h2>

                    <!-- Selector Doctor Destino -->
                    <div class="mb-6">
                        <label class="block text-gray-300 mb-2">Doctor Destino</label>
                        <select id="doctorDestino" class="w-full bg-gray-600 text-white rounded p-2">
                            <option value="">Seleccionar médico destino</option>
                            <option value="DOC002">Dr. Luis Gómez (Cardiología)</option>
                            <option value="DOC003">Dra. Marta Ríos (Cardiología)</option>
                        </select>
                    </div>

                    <!-- Horarios Disponibles -->
                    <div class="mb-6">
                        <h3 class="text-lg text-white mb-3">Horarios Disponibles</h3>
                        <div class="grid grid-cols-3 gap-2" id="horariosDisponibles">
                            <!-- Ejemplo de horario -->
                            <div class="bg-gray-600 p-2 text-center rounded cursor-pointer hover:bg-gray-500 horario-disponible">
                                <div class="text-white">10:00 AM</div>
                                <div class="text-xs text-gray-400">Disponible</div>
                            </div>
                            <!-- Más horarios... -->
                        </div>
                    </div>

                    <!-- Resumen y Acciones -->
                    <div class="mt-6 border-t border-gray-600 pt-4">
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-gray-300">Pacientes seleccionados:</span>
                            <span id="contadorPacientes" class="text-white bg-blue-600 px-2 py-1 rounded">0</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-300">Horarios disponibles:</span>
                            <span id="contadorHorarios" class="text-white bg-green-600 px-2 py-1 rounded">5</span>
                        </div>

                        <button id="confirmarReasignacion"
                                class="w-full bg-green-600 text-white p-3 rounded mt-4 hover:bg-green-500 disabled:opacity-50"
                                disabled>
                            Reasignar Pacientes Seleccionados
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkboxes = document.querySelectorAll('.paciente-checkbox');
            const btnSeleccionarTodos = document.getElementById('seleccionarTodos');
            const btnConfirmar = document.getElementById('confirmarReasignacion');
            const contadorPacientes = document.getElementById('contadorPacientes');
            const contadorHorarios = document.getElementById('contadorHorarios');

            // Selección múltiple
            btnSeleccionarTodos.addEventListener('click', function() {
                const todosSeleccionados = Array.from(checkboxes).every(checkbox => checkbox.checked);
                checkboxes.forEach(checkbox => {
                    checkbox.checked = !todosSeleccionados;
                });
                actualizarContadores();
            });

            // Actualizar estado del botón
            function actualizarContadores() {
                const pacientesSeleccionados = document.querySelectorAll('.paciente-checkbox:checked').length;
                const horariosDisponibles = document.querySelectorAll('.horario-disponible:not(.ocupado)').length;

                contadorPacientes.textContent = pacientesSeleccionados;
                contadorHorarios.textContent = horariosDisponibles;

                btnConfirmar.disabled = pacientesSeleccionados === 0 || pacientesSeleccionados > horariosDisponibles;
            }

            // Event listeners
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', actualizarContadores);
            });

            document.getElementById('doctorDestino').addEventListener('change', function() {
                // Simular carga de horarios
                actualizarContadores();
            });

            // Confirmar reasignación
            btnConfirmar.addEventListener('click', function() {
                const pacientesSeleccionados = Array.from(document.querySelectorAll('.paciente-checkbox:checked'))
                    .map(checkbox => {
                        return {
                            id: checkbox.closest('.paciente-item').dataset.id,
                            nombre: checkbox.closest('.paciente-item').querySelector('.text-white').textContent
                        };
                    });

                const doctorDestino = document.getElementById('doctorDestino').value;
                const horariosSeleccionados = Array.from(document.querySelectorAll('.horario-disponible.seleccionado'))
                    .map(horario => horario.dataset.hora);

                // Validación
                if (pacientesSeleccionados.length !== horariosSeleccionados.length) {
                    alert('Debe asignar un horario a cada paciente seleccionado');
                    return;
                }

                // Enviar datos al servidor
                fetch('/reasignar-pacientes', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        pacientes: pacientesSeleccionados,
                        doctor_destino: doctorDestino,
                        horarios: horariosSeleccionados
                    })
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Reasignación exitosa');
                            location.reload();
                        } else {
                            alert('Error: ' + data.message);
                        }
                    });
            });

            // Selección de horarios
            document.querySelectorAll('.horario-disponible').forEach(horario => {
                horario.addEventListener('click', function() {
                    if (!this.classList.contains('ocupado')) {
                        this.classList.toggle('seleccionado');
                        this.classList.toggle('bg-blue-600');
                        actualizarContadores();
                    }
                });
            });
        });
    </script>

    <style>
        .paciente-item:hover {
            background-color: rgb(55, 65, 81);
        }

        .horario-disponible {
            transition: all 0.2s ease;
        }

        .horario-disponible.ocupado {
            background-color: rgb(239, 68, 68);
            cursor: not-allowed;
        }

        .horario-disponible.seleccionado {
            background-color: rgb(37, 99, 235);
        }
    </style>
@endsection
