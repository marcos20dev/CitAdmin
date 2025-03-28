@extends('plantillas.administrador.plantilla')

@section('title', 'Reasignar Pacientes')

@section('menu')
    @include('vistas.administrador.menu')
@endsection

@section('content')



    <div class="flex justify-center">
        <div class="max-w-3xl mx-auto py-8 px-6 rounded-lg shadow-md flex-grow" style="background-color: rgb(34, 37, 42);">
            <h1 class="text-3xl font-bold text-white mb-6">Reasignación de Pacientes</h1>

            <!-- Sección para buscar el doctor que transfiere -->
            <div class="mb-8">
                <h2 class="text-2xl text-white mb-4">Doctor que Transfiere Pacientes</h2>
                <form id="buscarDoctorAnteriorForm">
                    @csrf
                    <div class="p-4 rounded-lg space-y-4" style="background-color: rgb(46, 49, 54);">
                        <!-- Buscar doctor anterior -->
                        <div class="flex items-center space-x-4">
                            <label class="block flex-grow">
                                <span class="text-white">DNI del Doctor:</span>
                                <input type="text" name="dni_doctor_anterior" id="dni_doctor_anterior"
                                    value="{{ old('dni') }}"
                                    class="mt-1 block w-full rounded-md border-red-500 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                                    required>
                            </label>
                            <button type="submit"
                                class="bg-red-600 text-white px-3 py-2 rounded hover:bg-red-500">Buscar</button>
                        </div>
                        @error('dni_doctor_anterior')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror

                        <!-- Datos del doctor anterior -->
                        <div>
                            <label class="block">
                                <span class="text-white">Nombre y Apellido:</span>
                                <input type="text" id="doctorAnteriorName" disabled
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm p-2 bg-gray-700 text-white">
                            </label>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Sección para seleccionar el día y cargar pacientes -->
            <div class="mb-8">
                <h2 class="text-2xl text-white mb-4">Seleccionar Día para Mostrar Pacientes</h2>
                <form id="seleccionarDiaForm">
                    @csrf
                    <div class="p-4 rounded-lg space-y-4" style="background-color: rgb(46, 49, 54);">
                        <!-- Selección del día -->
                        <div class="flex items-center space-x-4">
                            <label class="block flex-grow">
                                <span class="text-white">Selecciona el Día:</span>
                                <input type="date" name="dia_seleccionado" id="dia_seleccionado"
                                    class="mt-1 block w-full rounded-md border-blue-500 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                                    required>
                            </label>
                            <button type="button" id="buscarPacientesBtn"
                                class="bg-blue-600 text-white px-3 py-2 rounded hover:bg-blue-500">Mostrar
                                Pacientes</button>
                        </div>
                    </div>
                </form>
            </div>


            <div id="pacientesDisponibles" class="mb-8" style="display: none;">
                <h2 class="text-2xl text-white mb-4">Pacientes Asignados para el Día Seleccionado</h2>
                <div class="p-4 rounded-lg" style="background-color: rgb(255, 255, 255);">
                    <div class="flex items-center mb-2">
                        <input type="checkbox" id="selectAll" class="mr-2">
                        <label for="selectAll" class="text-gray-700">Seleccionar Todo</label>
                    </div>
                    <ul id="listaPacientes" class="space-y-2">
                        <!-- Aquí se cargará la lista de pacientes dinámicamente -->
                    </ul>
                    <div id="noPacientes" class="mt-4 text-center text-white" style="display: none;">
                        <p>No hay pacientes asignados para el día seleccionado.</p>
                    </div>
                </div>
            </div>


            <!-- Sección para filtrar y mostrar doctores disponibles -->
            <!-- Sección para filtrar y mostrar doctores disponibles -->
            <div class="mb-8">
                <h2 class="text-2xl text-white mb-4">Doctores Disponibles para el Día Seleccionado</h2>
                <form id="buscarDoctoresForm">
                    @csrf
                    <div class="p-4 rounded-lg space-y-4" style="background-color: rgb(46, 49, 54);">
                        <!-- Filtrar doctores -->
                        <div class="flex items-center space-x-4">
                            <label class="block flex-grow">
                                <span class="text-white">Selecciona un Doctor:</span>
                                <select name="doctor_seleccionado" id="doctor_seleccionado"
                                    class="mt-1 block w-full rounded-md border-blue-500 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                                    required>
                                    <!-- Opciones de doctores disponibles se cargarán dinámicamente -->
                                </select>
                            </label>
                            <button type="button" id="realizarCambioBtn"
                                class="bg-green-600 text-white px-3 py-2 rounded hover:bg-green-500">Buscar
                                Doctores</button>
                            <button type="button" id="buscarHorariosBtn"
                                class="bg-yellow-600 text-white px-3 py-2 rounded hover:bg-yellow-500">Buscar
                                Horarios</button>
                        </div>
                    </div>
                </form>

                <!-- Contenedor para mostrar los horarios disponibles -->
                <!-- Contenedor para mostrar los horarios disponibles -->
                <div id="horarios_disponibles" class="mt-6 p-4 rounded-lg" style="background-color: rgb(13, 15, 20);">
                    <h3 class="text-xl text-white mb-2">Horarios Disponibles:</h3>
                    <div id="horarios_list" class="space-y-2">
                        <!-- Los horarios disponibles se mostrarán aquí -->
                    </div>
                    <!-- Botón para realizar la reprogramación -->
                    <button id="realizarReprogramacionBtn"
                        class="mt-4 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-500">
                        Realizar Reprogramación
                    </button>
                </div>


                <script>
                    document.getElementById('buscarDoctorAnteriorForm').addEventListener('submit', function(e) {
                        e.preventDefault(); // Prevenir el envío del formulario

                        // Obtener el DNI del formulario
                        const dni = document.getElementById('dni_doctor_anterior').value;

                        // Realizar la solicitud AJAX
                        fetch('{{ route('buscar.doctor') }}', {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify({
                                    dni_doctor_anterior: dni
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    // Llenar los campos con el nombre y apellido del doctor encontrado
                                    document.getElementById('doctorAnteriorName').value = `${data.nombre} ${data.apellido}`;
                                } else {
                                    // Manejar el caso donde no se encuentra el doctor
                                    alert(data.message);
                                    document.getElementById('doctorAnteriorName').value = '';
                                }
                            })
                            .catch(error => console.error('Error:', error));
                    });
                </script>
                <script>
                    document.getElementById('selectAll').addEventListener('change', function() {
                        const checkboxes = document.querySelectorAll('.paciente-checkbox');
                        checkboxes.forEach((checkbox) => {
                            checkbox.checked = this.checked;
                        });
                    });

                    document.getElementById('buscarPacientesBtn').addEventListener('click', function() {
                        // Obtener la fecha seleccionada y el DNI del doctor
                        const diaSeleccionado = document.getElementById('dia_seleccionado').value;
                        const doctorId = document.getElementById('dni_doctor_anterior').value; // DNI del doctor

                        // Realizar la solicitud AJAX
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
                                listaPacientes.innerHTML = ''; // Limpiar la lista existente

                                // Verificar si hay pacientes
                                if (data.length === 0) {
                                    noPacientes.style.display = 'block'; // Mostrar mensaje si no hay pacientes
                                } else {
                                    noPacientes.style.display = 'none'; // Ocultar mensaje
                                    // Mostrar pacientes en la lista
                                    data.forEach(cita => {
                                        const paciente = cita.user; // Obtener el paciente de la cita
                                        const horario = cita.horario; // Obtener el horario de la cita

                                        const listItem = document.createElement('li');
                                        listItem.classList.add('flex', 'items-center', 'space-x-2');

                                        // Crear checkbox para cada paciente con el ID de la cita como valor
                                        const checkbox = document.createElement('input');
                                        checkbox.type = 'checkbox';
                                        checkbox.classList.add('paciente-checkbox');
                                        checkbox.value = cita.id; // Aquí establecemos el ID de la cita

                                        // Crear label para mostrar el nombre del paciente, la fecha y la hora de la cita
                                        const label = document.createElement('label');
                                        label.textContent =
                                            `${paciente.Nombre} ${paciente.ApePaterno} ${paciente.ApeMaterno} - Fecha: ${horario.fecha} - Hora: ${horario.hora}`;

                                        listItem.appendChild(checkbox);
                                        listItem.appendChild(label);
                                        listaPacientes.appendChild(listItem);
                                    });
                                    // Mostrar la sección de pacientes disponibles
                                    document.getElementById('pacientesDisponibles').style.display = 'block';
                                }
                            })
                            .catch(error => console.error('Error:', error));
                    });



                    document.getElementById('realizarCambioBtn').addEventListener('click', function() {
                        // Obtener la fecha seleccionada y el DNI del doctor
                        const diaSeleccionado = document.getElementById('dia_seleccionado').value;
                        const doctorId = document.getElementById('dni_doctor_anterior').value; // DNI del doctor

                        // Realizar la solicitud AJAX
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
                                select.innerHTML = ''; // Limpiar opciones existentes

                                if (data.length === 0) {
                                    // Manejar el caso donde no se encuentran doctores
                                    alert('No se encontraron doctores disponibles.');
                                } else {
                                    data.forEach(doctor => {
                                        const option = document.createElement('option');
                                        option.value = doctor.dni; // Asignar el DNI del doctor como valor
                                        option.textContent =
                                            `${doctor.nombre} ${doctor.apellido}`; // Mostrar el nombre y apellido
                                        select.appendChild(option);
                                    });
                                }
                            })
                            .catch(error => console.error('Error:', error));
                    });
                </script>


                <script>
                    document.getElementById('buscarHorariosBtn').addEventListener('click', function() {
                        const doctorId = document.getElementById('doctor_seleccionado')
                            .value; // Obtener el DNI del doctor seleccionado

                        // Realizar la solicitud AJAX
                        fetch('{{ route('buscar.horarios') }}', {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify({
                                    doctor_id: doctorId
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                const horariosList = document.getElementById('horarios_list');
                                horariosList.innerHTML = ''; // Limpiar la lista existente

                                if (data.length === 0) {
                                    horariosList.innerHTML = '<p class="text-white">No hay horarios disponibles.</p>';
                                } else {
                                    data.forEach(horario => {
                                        if (horario.ocupado === 0) { // Solo mostrar horarios no ocupados
                                            const listItem = document.createElement('div');
                                            listItem.classList.add('flex', 'items-center', 'space-x-2', 'p-2',
                                                'bg-gray-700', 'rounded', 'hover:bg-gray-600');

                                            // Crear checkbox para cada horario
                                            const checkbox = document.createElement('input');
                                            checkbox.type = 'checkbox';
                                            checkbox.classList.add('horario-checkbox');
                                            checkbox.value = horario.id; // Asignar el ID del horario como valor

                                            // Crear label para mostrar el horario
                                            const label = document.createElement('label');
                                            label.textContent = `${horario.fecha} - ${horario.hora}`;
                                            label.classList.add('text-white');

                                            listItem.appendChild(checkbox);
                                            listItem.appendChild(label);
                                            horariosList.appendChild(listItem);
                                        }
                                    });
                                }
                            })
                            .catch(error => console.error('Error:', error));
                    });
                </script>




                <script>
                    document.getElementById('realizarReprogramacionBtn').addEventListener('click', function() {
                        // Obtener los pacientes seleccionados
                        const pacientesSeleccionados = Array.from(document.querySelectorAll('.paciente-checkbox:checked'))
                            .map(checkbox => checkbox.value); // Obtener los IDs de las citas seleccionadas

                        const nuevoDoctorId = document.getElementById('doctor_seleccionado').value;
                        const nuevoHorarioSeleccionado = document.querySelector('.horario-checkbox:checked');
                        const horarioId = nuevoHorarioSeleccionado ? nuevoHorarioSeleccionado.value : null;

                        // Verificar los datos antes de enviarlos
                        console.log({
                            pacientesSeleccionados,
                            nuevoDoctorId,
                            horarioId
                        });

                        if (pacientesSeleccionados.length === 0 || !nuevoDoctorId || !horarioId) {
                            alert('Selecciona pacientes, un doctor y un horario.');
                            return;
                        }

                        // Enviar los datos al servidor para realizar la reasignación
                        fetch('{{ route('reasignar.pacientes') }}', {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify({
                                    pacientes: pacientesSeleccionados, // Enviar IDs de las citas
                                    nuevo_doctor_id: nuevoDoctorId,
                                    horario_id: horarioId
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                console.log('Respuesta del servidor:', data); // Añade un log para revisar la respuesta
                                if (data.success) {
                                    // Mostrar alerta de éxito
                                    alert('Pacientes reasignados correctamente.');

                                    // Limpiar los formularios y listas
                                    document.getElementById('dni_doctor_anterior').value =
                                    ''; // Limpiar el DNI del doctor anterior
                                    document.getElementById('doctorAnteriorName').value =
                                    ''; // Limpiar el nombre del doctor
                                    document.getElementById('dia_seleccionado').value = ''; // Limpiar la fecha
                                    document.getElementById('listaPacientes').innerHTML =
                                    ''; // Limpiar la lista de pacientes
                                    document.getElementById('doctor_seleccionado').innerHTML =
                                    ''; // Limpiar la selección de doctores
                                    document.getElementById('horarios_list').innerHTML = ''; // Limpiar la lista de horarios

                                    // Recargar la página después de 2 segundos
                                    setTimeout(function() {
                                        window.location.reload(); // Recargar la página
                                    }, 2000); // Puedes ajustar el tiempo si deseas
                                } else {
                                    alert('Error al reasignar pacientes.');
                                }
                            })
                            .catch(error => console.error('Error:', error));
                    });
                </script>




            @endsection
