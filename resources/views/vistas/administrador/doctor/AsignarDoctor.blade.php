@extends('plantillas.administrador.plantilla')

                @section('title', 'Reasignar Pacientes')

                @section('menu')
                    @include('vistas.administrador.menu')
                @endsection

                @section('content')
                    <div class="min-h-screen bg-gradient-to-br from-[#272a30] via-[#1e2030] to-[#1a1c28] py-12 px-4 sm:px-6 lg:px-8">
                        <div class="particles-container absolute inset-0 overflow-hidden z-0">
                            <div class="particles"></div>
                        </div>

                        <div class="max-w-6xl mx-auto relative z-10">
                            <!-- Encabezado con efecto neón -->
                            <div class="text-center mb-12">
                                <span class="inline-block text-sm font-bold tracking-widest text-purple-400 uppercase mb-3 neon-text">Gestión Clínica</span>
                                <h1 class="text-4xl font-light text-gray-100 mb-3">
                                    <span class="font-medium bg-clip-text text-transparent bg-gradient-to-r from-purple-400 to-blue-400">Reasignación</span> de Pacientes
                                </h1>
                                <p class="text-md text-gray-400 max-w-lg mx-auto">Sistema avanzado de transferencia entre especialistas</p>
                            </div>

                            <!-- Tarjetas flotantes con efecto vidrio -->
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-10">
                                <!-- Tarjeta Doctor Origen -->
                                <div class="glass-card hover:transform hover:-translate-y-1 transition-all duration-300">
                                    <div class="h-2 bg-gradient-to-r from-purple-500 to-indigo-600 rounded-t-xl"></div>
                                    <div class="p-6">
                                        <div class="flex items-center space-x-4 mb-6">
                                            <div class="p-2 rounded-xl bg-purple-500/10 border border-purple-500/20">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                                                </svg>
                                            </div>
                                            <h2 class="text-xl font-semibold text-gray-200">Doctor Origen</h2>
                                        </div>

                                        <form id="buscarDoctorAnteriorForm" class="space-y-5">
                                            @csrf
                                            <div>
                                                <label class="block text-sm font-medium text-gray-400 mb-2">Identificación</label>
                                                <div class="flex space-x-3">
                                                    <input type="text" name="dni_doctor_anterior" id="dni_doctor_anterior"
                                                           class="flex-grow px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent text-gray-200 placeholder-gray-500 transition-all duration-200"
                                                           placeholder="Ingrese DNI del doctor">
                                                    <button type="submit" class="px-5 py-3 bg-purple-600 hover:bg-purple-700 text-white font-medium rounded-xl transition-all duration-200 flex items-center shadow-lg hover:shadow-purple-500/20">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                                        </svg>
                                                        Buscar
                                                    </button>
                                                </div>
                                                @error('dni_doctor_anterior')
                                                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div>
                                                <label class="block text-sm font-medium text-gray-400 mb-2">Datos del Doctor</label>
                                                <div class="bg-gray-800/50 p-4 rounded-xl border border-gray-700">
                                                    <div class="flex items-center space-x-4">
                                                        <div class="flex-shrink-0">
                                                            <div class="h-12 w-12 rounded-full bg-purple-500/10 flex items-center justify-center border border-purple-500/20">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                </svg>
                                                            </div>
                                                        </div>
                                                        <div class="min-w-0 flex-1">
                                                            <input type="text" id="doctorAnteriorName" disabled
                                                                   class="w-full bg-transparent border-none text-gray-200 font-medium text-md focus:ring-0 p-0 placeholder-gray-500 truncate" placeholder="No seleccionado">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- Tarjeta Selección de Fecha -->
                                <div class="glass-card hover:transform hover:-translate-y-1 transition-all duration-300">
                                    <div class="h-2 bg-gradient-to-r from-blue-500 to-cyan-600 rounded-t-xl"></div>
                                    <div class="p-6">
                                        <div class="flex items-center space-x-4 mb-6">
                                            <div class="p-2 rounded-xl bg-blue-500/10 border border-blue-500/20">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                            <h2 class="text-xl font-semibold text-gray-200">Selección de Fecha</h2>
                                        </div>

                                        <form id="seleccionarDiaForm" class="space-y-5">
                                            @csrf
                                            <div>
                                                <label class="block text-sm font-medium text-gray-400 mb-2">Fecha de Citas</label>
                                                <div class="flex space-x-3">
                                                    <input type="date" name="dia_seleccionado" id="dia_seleccionado"
                                                           class="flex-grow px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-200 transition-all duration-200">
                                                    <button type="button" id="buscarPacientesBtn" class="px-5 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-xl transition-all duration-200 flex items-center shadow-lg hover:shadow-blue-500/20">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                                        </svg>
                                                        Buscar
                                                    </button>
                                                </div>
                                            </div>
                                        </form>

                                        <!-- Lista de pacientes -->
                                        <div id="pacientesDisponibles" class="hidden transition-all duration-300 mt-6">
                                            <div class="flex items-center justify-between mb-4">
                                                <h3 class="text-md font-medium text-gray-300">Pacientes Asignados</h3>
                                                <div class="flex items-center space-x-3">
                                                    <input type="checkbox" id="selectAll" class="h-5 w-5 text-blue-500 rounded focus:ring-blue-500 border-gray-600 bg-gray-700 transition duration-150">
                                                    <label for="selectAll" class="text-sm text-gray-400">Seleccionar todos</label>
                                                </div>
                                            </div>

                                            <div class="bg-gray-800/50 rounded-xl border border-gray-700 p-4 max-h-80 overflow-y-auto custom-scroll">
                                                <ul id="listaPacientes" class="space-y-3">
                                                    <!-- Pacientes se cargarán aquí -->
                                                </ul>
                                                <div id="noPacientes" class="hidden py-8 text-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                    <p class="mt-3 text-gray-400">No hay pacientes asignados</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Tarjeta Doctores Destino -->
                            <div class="glass-card hover:transform hover:-translate-y-1 transition-all duration-300">
                                <div class="h-2 bg-gradient-to-r from-green-500 to-emerald-600 rounded-t-xl"></div>
                                <div class="p-6">
                                    <div class="flex items-center space-x-4 mb-6">
                                        <div class="p-2 rounded-xl bg-green-500/10 border border-green-500/20">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                            </svg>
                                        </div>
                                        <h2 class="text-xl font-semibold text-gray-200">Doctores Destino</h2>
                                    </div>

                                    <form id="buscarDoctoresForm" class="space-y-6">
                                        @csrf
                                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                                            <div class="md:col-span-3">
                                                <label class="block text-sm font-medium text-gray-400 mb-2">Doctor Destino</label>
                                                <select name="doctor_seleccionado" id="doctor_seleccionado"
                                                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent text-gray-200 transition-all duration-200">
                                                    <option value="">Seleccionar doctor...</option>
                                                    <!-- Opciones se cargarán dinámicamente -->
                                                </select>
                                            </div>

                                            <div class="flex items-end space-x-3">
                                                <button type="button" id="realizarCambioBtn" class="px-5 py-3 bg-green-600 hover:bg-green-700 text-white font-medium rounded-xl transition-all duration-200 flex items-center shadow-lg hover:shadow-green-500/20 flex-1 justify-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                                    </svg>
                                                    Buscar
                                                </button>

                                                <button type="button" id="buscarHorariosBtn" class="px-5 py-3 bg-amber-600 hover:bg-amber-700 text-white font-medium rounded-xl transition-all duration-200 flex items-center shadow-lg hover:shadow-amber-500/20 flex-1 justify-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                    Horarios
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                    <!-- Horarios disponibles -->
                                    <div id="horarios_disponibles" class="hidden bg-gray-800/50 rounded-xl border border-gray-700 p-5 mt-6 transition-all duration-300">
                                        <h3 class="text-md font-medium text-gray-300 mb-4 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            Horarios Disponibles
                                        </h3>

                                        <div id="horarios_list" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3">
                                            <!-- Horarios se cargarán aquí -->
                                        </div>

                                        <div class="mt-6 pt-5 border-t border-gray-700 flex justify-end">
                                            <button id="realizarReprogramacionBtn" class="px-6 py-3 bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white font-medium rounded-xl transition-all duration-200 flex items-center shadow-lg hover:shadow-green-500/20">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>
                                                Confirmar Reasignación
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <style>
                        /* Efecto glass moderno */
                        .glass-card {
                            background: rgba(39, 42, 48, 0.7);
                            backdrop-filter: blur(12px);
                            -webkit-backdrop-filter: blur(12px);
                            border-radius: 16px;
                            border: 1px solid rgba(255, 255, 255, 0.05);
                            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
                            transition: all 0.3s ease;
                        }

                        /* Efecto neón para textos */
                        .neon-text {
                            text-shadow: 0 0 8px rgba(192, 132, 252, 0.4);
                        }

                        /* Scrollbar personalizado */
                        .custom-scroll::-webkit-scrollbar {
                            width: 6px;
                        }
                        .custom-scroll::-webkit-scrollbar-track {
                            background: rgba(255,255,255,0.05);
                            border-radius: 10px;
                        }
                        .custom-scroll::-webkit-scrollbar-thumb {
                            background: rgba(192, 132, 252, 0.3);
                            border-radius: 10px;
                        }
                        .custom-scroll::-webkit-scrollbar-thumb:hover {
                            background: rgba(192, 132, 252, 0.5);
                        }

                        /* Animación de partículas */
                        .particles {
                            position: absolute;
                            width: 100%;
                            height: 100%;
                            background-image: radial-gradient(circle at 20% 30%, rgba(139, 92, 246, 0.1) 0%, transparent 25%),
                            radial-gradient(circle at 80% 70%, rgba(16, 185, 129, 0.1) 0%, transparent 25%);
                            background-size: 100% 100%;
                            animation: particlePulse 15s infinite alternate;
                        }

                        @keyframes particlePulse {
                            0% { opacity: 0.1; }
                            100% { opacity: 0.2; }
                        }
                    </style>

                    <script>
                        // Script para animaciones y funcionalidades
                        document.addEventListener('DOMContentLoaded', function() {
                            // Efecto hover en tarjetas
                            const cards = document.querySelectorAll('.glass-card');
                            cards.forEach(card => {
                                card.addEventListener('mouseenter', () => {
                                    card.style.boxShadow = '0 12px 40px rgba(0, 0, 0, 0.4)';
                                });
                                card.addEventListener('mouseleave', () => {
                                    card.style.boxShadow = '0 8px 32px rgba(0, 0, 0, 0.3)';
                                });
                            });
                        });
                    </script>

                    <!-- Scripts -->
                    <script>
                        // Buscar doctor anterior
                        document.getElementById('buscarDoctorAnteriorForm').addEventListener('submit', function(e) {
                            e.preventDefault();
                            const dni = document.getElementById('dni_doctor_anterior').value;

                            fetch('{{ route('buscar.doctor') }}', {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify({ dni_doctor_anterior: dni })
                            })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        document.getElementById('doctorAnteriorName').value = `${data.nombre} ${data.apellido}`;
                                    } else {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Doctor no encontrado',
                                            text: data.message,
                                            confirmButtonColor: '#EF4444',
                                            background: '#1F2937',
                                            color: '#FFFFFF'
                                        });
                                        document.getElementById('doctorAnteriorName').value = '';
                                    }
                                })
                                .catch(error => console.error('Error:', error));
                        });

                        // Buscar pacientes
                        document.getElementById('buscarPacientesBtn').addEventListener('click', function() {
                            const diaSeleccionado = document.getElementById('dia_seleccionado').value;
                            const doctorId = document.getElementById('dni_doctor_anterior').value;

                            if (!doctorId) {
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Seleccione un doctor',
                                    text: 'Primero debe buscar y seleccionar un doctor',
                                    confirmButtonColor: '#3B82F6',
                                    background: '#1F2937',
                                    color: '#FFFFFF'
                                });
                                return;
                            }

                            fetch('{{ route('buscar.pacientes') }}', {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify({
                                    dia_seleccionado: diaSeleccionado,
                                    doctor_id: doctorId
                                })
                            })
                                .then(response => response.json())
                                .then(data => {
                                    const listaPacientes = document.getElementById('listaPacientes');
                                    const noPacientes = document.getElementById('noPacientes');
                                    listaPacientes.innerHTML = '';

                                    if (data.length === 0) {
                                        noPacientes.classList.remove('hidden');
                                        document.getElementById('pacientesDisponibles').classList.add('hidden');
                                    } else {
                                        noPacientes.classList.add('hidden');
                                        data.forEach(cita => {
                                            const paciente = cita.user;
                                            const horario = cita.horario;

                                            const listItem = document.createElement('li');
                                            listItem.className = 'flex items-start p-3 bg-gray-600 rounded-lg hover:bg-gray-500 transition duration-200';

                                            const checkbox = document.createElement('input');
                                            checkbox.type = 'checkbox';
                                            checkbox.className = 'paciente-checkbox mt-1 h-5 w-5 text-blue-600 rounded focus:ring-blue-500 border-gray-600 bg-gray-700';
                                            checkbox.value = cita.id;

                                            const label = document.createElement('div');
                                            label.className = 'ml-3 flex-1';
                                            label.innerHTML = `
                        <p class="text-sm font-medium text-white">${paciente.Nombre} ${paciente.ApePaterno} ${paciente.ApeMaterno}</p>
                        <p class="text-xs text-gray-300">Fecha: ${horario.fecha} - Hora: ${horario.hora}</p>
                    `;

                                            listItem.appendChild(checkbox);
                                            listItem.appendChild(label);
                                            listaPacientes.appendChild(listItem);
                                        });
                                        document.getElementById('pacientesDisponibles').classList.remove('hidden');
                                    }
                                })
                                .catch(error => console.error('Error:', error));
                        });

                        // Seleccionar todos los pacientes
                        document.getElementById('selectAll').addEventListener('change', function() {
                            const checkboxes = document.querySelectorAll('.paciente-checkbox');
                            checkboxes.forEach(checkbox => {
                                checkbox.checked = this.checked;
                            });
                        });

                        // Buscar doctores disponibles
                        document.getElementById('realizarCambioBtn').addEventListener('click', function() {
                            const diaSeleccionado = document.getElementById('dia_seleccionado').value;
                            const doctorId = document.getElementById('dni_doctor_anterior').value;

                            if (!diaSeleccionado) {
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Seleccione una fecha',
                                    text: 'Debe seleccionar un día para buscar doctores disponibles',
                                    confirmButtonColor: '#3B82F6',
                                    background: '#1F2937',
                                    color: '#FFFFFF'
                                });
                                return;
                            }

                            fetch('{{ route('buscar.doctores') }}', {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify({
                                    dia_seleccionado: diaSeleccionado,
                                    doctor_id: doctorId
                                })
                            })
                                .then(response => response.json())
                                .then(data => {
                                    const select = document.getElementById('doctor_seleccionado');
                                    select.innerHTML = '<option value="">-- Seleccione --</option>';

                                    if (data.length === 0) {
                                        Swal.fire({
                                            icon: 'info',
                                            title: 'No hay doctores disponibles',
                                            text: 'No se encontraron doctores disponibles para la fecha seleccionada',
                                            confirmButtonColor: '#3B82F6',
                                            background: '#1F2937',
                                            color: '#FFFFFF'
                                        });
                                    } else {
                                        data.forEach(doctor => {
                                            const option = document.createElement('option');
                                            option.value = doctor.dni;
                                            option.textContent = `${doctor.nombre} ${doctor.apellido}`;
                                            select.appendChild(option);
                                        });
                                    }
                                })
                                .catch(error => console.error('Error:', error));
                        });

                        // Buscar horarios disponibles
                        document.getElementById('buscarHorariosBtn').addEventListener('click', function() {
                            const doctorId = document.getElementById('doctor_seleccionado').value;

                            if (!doctorId) {
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Seleccione un doctor',
                                    text: 'Debe seleccionar un doctor para ver sus horarios disponibles',
                                    confirmButtonColor: '#3B82F6',
                                    background: '#1F2937',
                                    color: '#FFFFFF'
                                });
                                return;
                            }

                            fetch('{{ route('buscar.horarios') }}', {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify({ doctor_id: doctorId })
                            })
                                .then(response => response.json())
                                .then(data => {
                                    const horariosList = document.getElementById('horarios_list');
                                    horariosList.innerHTML = '';

                                    if (data.length === 0) {
                                        horariosList.innerHTML = `
                    <div class="col-span-3 py-4 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mx-auto text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="mt-2 text-gray-400">No hay horarios disponibles</p>
                    </div>
                `;
                                    } else {
                                        data.forEach(horario => {
                                            if (horario.ocupado === 0) {
                                                const horarioItem = document.createElement('div');
                                                horarioItem.className = 'flex items-center p-3 bg-gray-600 rounded-lg hover:bg-gray-500 transition duration-200';

                                                const checkbox = document.createElement('input');
                                                checkbox.type = 'radio';
                                                checkbox.name = 'horario_seleccionado';
                                                checkbox.className = 'horario-checkbox h-5 w-5 text-green-500 focus:ring-green-500 border-gray-600 bg-gray-700';
                                                checkbox.value = horario.id;

                                                const label = document.createElement('label');
                                                label.className = 'ml-3 flex-1 cursor-pointer';
                                                label.innerHTML = `
                            <p class="text-sm font-medium text-white">${horario.fecha}</p>
                            <p class="text-xs text-gray-300">${horario.hora}</p>
                        `;

                                                horarioItem.appendChild(checkbox);
                                                horarioItem.appendChild(label);
                                                horariosList.appendChild(horarioItem);
                                            }
                                        });
                                    }
                                    document.getElementById('horarios_disponibles').classList.remove('hidden');
                                })
                                .catch(error => console.error('Error:', error));
                        });

                        // Realizar reprogramación
                        document.getElementById('realizarReprogramacionBtn').addEventListener('click', function() {
                            const pacientesSeleccionados = Array.from(document.querySelectorAll('.paciente-checkbox:checked')).map(cb => cb.value);
                            const nuevoDoctorId = document.getElementById('doctor_seleccionado').value;
                            const horarioSeleccionado = document.querySelector('.horario-checkbox:checked');

                            if (pacientesSeleccionados.length === 0 || !nuevoDoctorId || !horarioSeleccionado) {
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Datos incompletos',
                                    html: `
                    <div class="text-left">
                        <p class="mb-2">Por favor complete:</p>
                        <ul class="list-disc pl-5 space-y-1">
                            ${!pacientesSeleccionados.length ? '<li>Seleccione al menos un paciente</li>' : ''}
                            ${!nuevoDoctorId ? '<li>Seleccione un doctor destino</li>' : ''}
                            ${!horarioSeleccionado ? '<li>Seleccione un horario disponible</li>' : ''}
                        </ul>
                    </div>
                `,
                                    confirmButtonColor: '#3B82F6',
                                    background: '#1F2937',
                                    color: '#FFFFFF'
                                });
                                return;
                            }

                            Swal.fire({
                                title: 'Confirmar reprogramación',
                                text: `¿Está seguro de reasignar ${pacientesSeleccionados.length} paciente(s) al nuevo horario?`,
                                icon: 'question',
                                showCancelButton: true,
                                confirmButtonColor: '#10B981',
                                cancelButtonColor: '#EF4444',
                                confirmButtonText: 'Sí, reprogramar',
                                cancelButtonText: 'Cancelar',
                                background: '#1F2937',
                                color: '#FFFFFF'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    fetch('{{ route('reasignar.pacientes') }}', {
                                        method: 'POST',
                                        headers: {
                                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                                            'Content-Type': 'application/json'
                                        },
                                        body: JSON.stringify({
                                            pacientes: pacientesSeleccionados,
                                            nuevo_doctor_id: nuevoDoctorId,
                                            horario_id: horarioSeleccionado.value
                                        })
                                    })
                                        .then(response => response.json())
                                        .then(data => {
                                            if (data.success) {
                                                Swal.fire({
                                                    title: '¡Éxito!',
                                                    text: data.message,
                                                    icon: 'success',
                                                    confirmButtonColor: '#10B981',
                                                    background: '#1F2937',
                                                    color: '#FFFFFF'
                                                }).then(() => {
                                                    location.reload();
                                                });
                                            } else {
                                                Swal.fire({
                                                    title: 'Error',
                                                    text: data.message,
                                                    icon: 'error',
                                                    confirmButtonColor: '#EF4444',
                                                    background: '#1F2937',
                                                    color: '#FFFFFF'
                                                });
                                            }
                                        })
                                        .catch(error => {
                                            console.error('Error:', error);
                                            Swal.fire({
                                                title: 'Error',
                                                text: 'Ocurrió un error al procesar la solicitud',
                                                icon: 'error',
                                                confirmButtonColor: '#EF4444',
                                                background: '#1F2937',
                                                color: '#FFFFFF'
                                            });
                                        });
                                }
                            });
                        });
                    </script>
@endsection
