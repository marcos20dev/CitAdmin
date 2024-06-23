@extends('layouts.plantilla')

@section('title', 'Noticias')

@section('menu')
    @include('menu.menu')
@endsection

@section('submenu')
@endsection

@section('content')

<div class="flex justify-center"> <!-- Centrar el contenedor principal -->
    <div class="max-w-2xl mx-auto py-8 px-6 rounded-lg shadow-md flex-grow" style="background-color: rgb(34, 37, 42);"> <!-- Contenedor con mejor diseño -->
        <h1 class="text-3xl font-bold text-white mb-6">Registrar Horario</h1>
        <!-- Cambio de color del título a blanco -->

        <form id="scheduleForm" action="" method="POST" enctype="multipart/form-data" class="space-y-6">

            @csrf

            <div class="p-4 rounded-lg space-y-4" style="background-color: rgb(46, 49, 54);"> <!-- Contenedor para la búsqueda -->
                <div class="flex items-center space-x-4">
                    <label class="block flex-grow">
                        <span class="text-white">DNI del doctor:</span>
                        <input type="text" name="dni" id="dni" value="{{ old('dni') }}"
                            class="mt-1 block w-full rounded-md border-red-500 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2">
                    </label>
                    <button type="button" id="searchDoctor" class="bg-red-600 text-white px-3 py-2 rounded hover:bg-red-500">Buscar</button>
                </div>
                @error('dni')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror

                <div>
                    <label class="block">
                        <span class="text-white">Nombre y Apellido:</span>
                        <input type="text" id="doctorName" disabled class="mt-1 block w-full rounded-md border-gray-300 shadow-sm p-2 bg-gray-700 text-white">
                    </label>
                </div>

                <div>
                    <label class="block">
                        <span class="text-white">Especialidad:</span>
                        <input type="text" id="doctorSpecialty" disabled class="mt-1 block w-full rounded-md border-gray-300 shadow-sm p-2 bg-gray-700 text-white">
                    </label>
                </div>
            </div>

            <div class="p-4 bg-gray-700 rounded-lg space-y-4" style="background-color: rgb(46, 49, 54);"> <!-- Contenedor para el registro de horario -->
                <div>
                    <label class="block">
                        <span class="text-white">Fecha de la cita:</span>
                        <input type="date" name="fecha" id="fecha" value="{{ old('fecha') }}"
                            class="mt-1 block w-full rounded-md border-red-500 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2">
                    </label>
                    @error('fecha')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block">
                        <span class="text-white">Hora de inicio de la cita:</span>
                        <input type="time" name="hora_inicio" id="hora_inicio" value="{{ old('hora_inicio') }}"
                            class="mt-1 block w-full rounded-md border-red-500 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2">
                    </label>
                    @error('hora_inicio')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block">
                        <span class="text-white">Hora de fin de la cita:</span>
                        <input type="time" name="hora_fin" id="hora_fin" value="{{ old('hora_fin') }}"
                            class="mt-1 block w-full rounded-md border-red-500 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2">
                    </label>
                    @error('hora_fin')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block">
                        <span class="text-white">Intervalo de tiempo (minutos):</span>
                        <input type="number" name="intervalo" id="intervalo" value="15" min="5" max="60" step="5" class="mt-1 block w-full rounded-md border-red-500 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2">
                    </label>
                    <p class="text-gray-400">Debe ser entre 5 y 60 minutos.</p>
                </div>

                <div>
                    <button type="button" id="createSchedule" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500">Crear</button>
                </div>
            </div>
        </form>

        <div id="scheduleOutput" class="mt-6 p-4 rounded-lg text-white" style="background-color: rgb(46, 49, 54);">
            <!-- Aquí se mostrará la información estructurada -->
        </div>
    </div>
</div>

<style>
    .intervalo {
        display: inline-block;
        background-color: rgba(255, 255, 255, 0.1);
        padding: 0.5rem;
        margin: 0.5rem;
        border-radius: 0.5rem;
    }
</style>

<script>
    document.getElementById('searchDoctor').addEventListener('click', function() {
        // Aquí puedes hacer una llamada AJAX para buscar la información del doctor por DNI
        // Esto es solo un ejemplo, ajusta según tu implementación

        // Ejemplo de datos de respuesta (esto vendría de tu servidor)
        const doctorData = {
            nombre: 'Juan Perez',
            especialidad: 'Dermatología' // Cambia la especialidad según tu necesidad
        };

        // Asignar los datos a los campos
        document.getElementById('doctorName').value = doctorData.nombre;
        document.getElementById('doctorSpecialty').value = doctorData.especialidad;
    });

    document.getElementById('createSchedule').addEventListener('click', function() {
        // Obtener los valores del formulario
        const dni = document.getElementById('dni').value;
        const nombre = document.getElementById('doctorName').value;
        const especialidad = document.getElementById('doctorSpecialty').value;
        const fecha = document.getElementById('fecha').value;
        const horaInicio = document.getElementById('hora_inicio').value;
        const horaFin = document.getElementById('hora_fin').value;
        const intervalo = parseInt(document.getElementById('intervalo').value);

        // Verificar que todos los campos estén llenos
        if (!dni || !nombre || !especialidad || !fecha || !horaInicio || !horaFin || !intervalo) {
            alert('Por favor, completa todos los campos.');
            return;
        }

        // Convertir horas a minutos para facilitar los cálculos
        const [horaInicioHoras, horaInicioMinutos] = horaInicio.split(':').map(Number);
        const [horaFinHoras, horaFinMinutos] = horaFin.split(':').map(Number);

        const inicioEnMinutos = horaInicioHoras * 60 + horaInicioMinutos;
        const finEnMinutos = horaFinHoras * 60 + horaFinMinutos;

        // Generar la lista de intervalos
        let intervalos = [];
        for (let tiempo = inicioEnMinutos; tiempo < finEnMinutos; tiempo += intervalo) {
            const horasInicio = Math.floor(tiempo / 60);
            const minutosInicio = tiempo % 60;
            const horasFin = Math.floor((tiempo + intervalo) / 60);
            const minutosFin = (tiempo + intervalo) % 60;
            const horasInicioStr = horasInicio >= 12 ? (horasInicio - 12 || 12) : horasInicio; // Convertir a formato 12 horas
            const amPmInicio = horasInicio >= 12 ? 'PM' : 'AM';
            const horasFinStr = horasFin >= 12 ? (horasFin - 12 || 12) : horasFin; // Convertir a formato 12 horas
            const amPmFin = horasFin >= 12 ? 'PM' : 'AM';
            const minutosInicioStr = minutosInicio.toString().padStart(2, '0');
            const minutosFinStr = minutosFin.toString().padStart(2, '0');
            const intervaloStr = `${horasInicioStr}:${minutosInicioStr} ${amPmInicio} - ${horasFinStr}:${minutosFinStr} ${amPmFin}`;
            intervalos.push(intervaloStr);
        }

        // Crear el contenido para mostrar
        let outputHtml = `
            <h2 class="text-xl font-bold mb-4">Verificación de Horario</h2>
            <p><strong>Doctor:</strong> ${nombre}</p>
            <p><strong>Especialidad:</strong> ${especialidad}</p>
            <p><strong>Fecha:</strong> ${new Date(fecha).toLocaleDateString('es-ES', { year: 'numeric', month: 'long', day: 'numeric' })}</p>
            <p><strong>Hora de inicio:</strong> ${horaInicio}</p>
            <p><strong>Hora de fin:</strong> ${horaFin}</p>
            <p><strong>Intervalo:</strong> ${intervalo} minutos</p>
            <h3 class="text-lg font-bold mt-4 mb-2">Intervalos Generados:</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        `;

        intervalos.forEach(intervalo => {
            outputHtml += `<span class="intervalo">${intervalo}</span>`;
        });

        outputHtml += '</div>';

        // Mostrar el contenido en el div
        const scheduleOutput = document.getElementById('scheduleOutput');
        scheduleOutput.innerHTML = outputHtml;
        scheduleOutput.style.display = 'block';
    });
</script>

@endsection
