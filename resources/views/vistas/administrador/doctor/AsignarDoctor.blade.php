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
                            <input type="text" name="dni_doctor_anterior" id="dni_doctor_anterior" value="{{ old('dni') }}"
                                class="mt-1 block w-full rounded-md border-red-500 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                                required>
                        </label>
                        <button type="submit" class="bg-red-600 text-white px-3 py-2 rounded hover:bg-red-500">Buscar</button>
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

                    <div>
                        <label class="block">
                            <span class="text-white">Especialidad:</span>
                            <input type="text" id="doctorAnteriorSpecialty" disabled
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
                            class="bg-blue-600 text-white px-3 py-2 rounded hover:bg-blue-500">Mostrar Pacientes</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Sección para mostrar los pacientes disponibles -->
        <div id="pacientesDisponibles" class="mb-8" style="display: none;">
            <h2 class="text-2xl text-white mb-4">Pacientes Asignados para el Día Seleccionado</h2>
            <div class="p-4 rounded-lg space-y-4" style="background-color: rgb(46, 49, 54);">
                <ul id="listaPacientes" class="space-y-2">
                    <!-- Aquí se cargará la lista de pacientes dinámicamente -->
                </ul>
            </div>
        </div>

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
                            class="bg-green-600 text-white px-3 py-2 rounded hover:bg-green-500">Realizar Cambio</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Mensajes de éxito o error -->
        <div id="mensajeResultado" class="mt-6 text-white" style="display: none;">
            <!-- Aquí se mostrará el mensaje después de realizar el cambio -->
        </div>
    </div>
</div>

<!-- Script para manejar la búsqueda de pacientes y doctores -->
<script>
document.getElementById('buscarDoctorAnteriorForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const dni = document.getElementById('dni_doctor_anterior').value;
    const csrfToken = document.querySelector('input[name="_token"]').value;

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
                document.getElementById('doctorAnteriorName').value = data.nombre;
                document.getElementById('doctorAnteriorSpecialty').value = data.especialidad;
            } else {
                alert(data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Ha ocurrido un error. Por favor, intenta nuevamente.');
        });
});

document.getElementById('buscarPacientesBtn').addEventListener('click', function() {
    const diaSeleccionado = document.getElementById('dia_seleccionado').value;

    if (diaSeleccionado) {
        fetch(`{{ route('pacientes.asignados') }}?dia=${diaSeleccionado}`)
            .then(response => response.json())
            .then(data => {
                const listaPacientes = document.getElementById('listaPacientes');
                listaPacientes.innerHTML = ''; // Limpiar la lista anterior

                if (data.pacientes.length > 0) {
                    data.pacientes.forEach(paciente => {
                        const li = document.createElement('li');
                        li.className = 'text-white p-2 bg-gray-700 rounded-md';
                        li.textContent = `${paciente.nombre} ${paciente.apellido} - DNI: ${paciente.dni}`;
                        listaPacientes.appendChild(li);
                    });
                    document.getElementById('pacientesDisponibles').style.display = 'block';
                } else {
                    listaPacientes.innerHTML = '<li class="text-red-500">No hay pacientes asignados en el día seleccionado.</li>';
                }
            })
            .catch(error => {
                console.error('Error al cargar pacientes:', error);
            });
    } else {
        alert('Por favor selecciona un día.');
    }
});

document.getElementById('buscarDoctoresBtn').addEventListener('click', function() {
    const diaSeleccionado = document.getElementById('dia_seleccionado').value;

    if (diaSeleccionado) {
        fetch(`{{ route('doctores.disponibles') }}?dia=${diaSeleccionado}`)
            .then(response => response.json())
            .then(data => {
                const doctorSelect = document.getElementById('doctor_seleccionado');
                doctorSelect.innerHTML = ''; // Limpiar el select anterior

                if (data.doctores.length > 0) {
                    data.doctores.forEach(doctor => {
                        const option = document.createElement('option');
                        option.value = doctor.id;
                        option.textContent = `${doctor.nombre} ${doctor.apellido} - Especialidad: ${doctor.especialidad}`;
                        doctorSelect.appendChild(option);
                    });
                } else {
                    doctorSelect.innerHTML = '<option>No hay doctores disponibles</option>';
                }
            })
            .catch(error => {
                console.error('Error al cargar doctores:', error);
            });
    } else {
        alert('Por favor selecciona un día.');
    }
});

document.getElementById('realizarCambioBtn').addEventListener('click', function() {
    const doctorSeleccionado = document.getElementById('doctor_seleccionado').value;
    const diaSeleccionado = document.getElementById('dia_seleccionado').value;
    const csrfToken = document.querySelector('input[name="_token"]').value;

    fetch(`{{ route('reasignar.pacientes') }}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({
                doctor_id: doctorSeleccionado,
                dia: diaSeleccionado
            })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Error al reasignar los pacientes');
            }
            return response.json();
        })
        .then(data => {
            const mensajeResultado = document.getElementById('mensajeResultado');
            if (data.success) {
                mensajeResultado.textContent = 'Los pacientes han sido reasignados correctamente.';
                mensajeResultado.className = 'text-green-500';
            } else {
                mensajeResultado.textContent = 'Error al reasignar los pacientes.';
                mensajeResultado.className = 'text-red-500';
            }
            mensajeResultado.style.display = 'block';
        })
        .catch(error => {
            console.error('Error al reasignar pacientes:', error);
        });
});
</script>
@endsection
