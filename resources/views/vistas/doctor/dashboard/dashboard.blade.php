@extends('plantillas.doctor.plantilladoc')

@section('title', 'Dashboard')

@section('header')
    @include('header.doctor.header')
@endsection

@section('menu')
    @include('vistas.doctor.menu')
@endsection

@section('content')
<div class="relative">
    <!-- Imagen de fondo -->
    <div class="absolute inset-x-0 top-0 z-10">
        <img src="{{ asset('logo/doctor.png') }}" class="w-full h-auto" alt="Login Background Image">
    </div>

    <!-- Contenedores sobre la imagen -->
    <div class="absolute inset-x-8 z-20 pt-20">
        <!-- Contenedor de datos -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-6">
            <!-- Contenedor 1: Citas Programadas -->
            <div class="bg-white p-4 rounded-lg shadow-md flex items-center space-x-4">
                <i class="fas fa-calendar-alt text-blue-500 text-2xl"></i>
                <div>
                    <h3 class="text-lg font-semibold">Citas Programadas</h3>
                    <p class="text-gray-600" id="count-programadas">{{ $citasTotales->where('estado', 0)->count() }}</p>
                </div>
            </div>

            <!-- Contenedor 2: Citas Atendidas -->
            <div class="bg-white p-4 rounded-lg shadow-md flex items-center space-x-4">
                <i class="fas fa-user-md text-green-500 text-2xl"></i>
                <div>
                    <h3 class="text-lg font-semibold">Citas Atendidas</h3>
                    <p class="text-gray-600" id="count-atendidas">{{ $citasTotales->where('estado', 1)->count() }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contenedor central blanco -->
<div class="absolute inset-x-8 top-3/4 transform -translate-y-2/3 mx-auto max-w-8xl bg-white p-6 shadow-lg rounded-lg z-30">
    <h2 class="mb-4 text-3xl font-bold text-gray-900">Mis Pacientes</h2>

    <!-- Botón de alternancia dentro del contenedor de citas -->
    <div class="flex justify-end mb-4">
        <button id="toggle-citas" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">
            Mostrar Citas Atendidas
        </button>
    </div>

    <!-- Contenedor de citas -->
    <h3 class="text-xl font-semibold text-gray-800">Citas</h3>
    <div class="p-6 space-y-4 max-h-96 overflow-y-auto" id="citas-container">
        <!-- Inicialmente se muestran las citas con estado 0 (programadas) -->
        @include('partials.citas', ['citas' => $citas])
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const button = document.getElementById('toggle-citas');
        let currentState = '{{ request('estado') == 1 ? 1 : 0 }}';

        button.addEventListener('click', function() {
            let newState = currentState == 1 ? 0 : 1;
            currentState = newState; // Actualiza el estado actual

            fetch('{{ url('doctor/dashboard') }}?estado=' + newState)
                .then(response => response.text())
                .then(html => {
                    // Actualizar el contenido del contenedor de citas
                    document.getElementById('citas-container').innerHTML = new DOMParser().parseFromString(html, 'text/html').querySelector('#citas-container').innerHTML;

                    // Actualizar el texto del botón
                    button.textContent = newState == 1 ? 'Mostrar Citas Programadas' : 'Mostrar Citas Atendidas';

                    // Actualizar los contadores
                    let citasProgramadas = document.querySelectorAll('.cita.estado-0').length;
                    let citasAtendidas = document.querySelectorAll('.cita.estado-1').length;

                    document.getElementById('count-programadas').textContent = citasProgramadas;
                    document.getElementById('count-atendidas').textContent = citasAtendidas;
                });
        });
    });
</script>
@endsection
