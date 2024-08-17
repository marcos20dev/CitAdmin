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
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 p-6">
            <!-- Contenedor 1 -->
            <div class="bg-white p-4 rounded-lg shadow-md flex items-center space-x-4">
                <i class="fas fa-calendar-alt text-blue-500 text-2xl"></i>
                <div>
                    <h3 class="text-lg font-semibold">Citas</h3>
                    <p class="text-gray-600">15</p>
                </div>
            </div>

            <!-- Contenedor 2 -->
            <div class="bg-white p-4 rounded-lg shadow-md flex items-center space-x-4">
                <i class="fas fa-user-md text-green-500 text-2xl"></i>
                <div>
                    <h3 class="text-lg font-semibold">Doctores</h3>
                    <p class="text-gray-600">8</p>
                </div>
            </div>

            <!-- Contenedor 3 -->
            <div class="bg-white p-4 rounded-lg shadow-md flex items-center space-x-4">
                <i class="fas fa-hospital text-red-500 text-2xl"></i>
                <div>
                    <h3 class="text-lg font-semibold">Hospitales</h3>
                    <p class="text-gray-600">5</p>
                </div>
            </div>
                   <div class="bg-white p-4 rounded-lg shadow-md flex items-center space-x-4">
                <i class="fas fa-hospital text-red-500 text-2xl"></i>
                <div>
                    <h3 class="text-lg font-semibold">Hospitales</h3>
                    <p class="text-gray-600">5</p>
                </div>
            </div>
        </div>

    </div>

</div>

<!-- Contenedor central blanco -->
<div class="absolute inset-x-8 top-3/4 transform -translate-y-2/3 mx-auto max-w-8xl bg-white p-6 shadow-lg rounded-lg z-30">
 
        <h2 class="mb-4 text-3xl font-bold text-gray-900">Mis Pacientes</h2>
        <div class="w-full max-w-4xl bg-white rounded-lg shadow-md">
            <div class="p-6 border-b border-gray-200">
                <h3 class="text-xl font-semibold text-gray-800">Citas Programadas</h3>
            </div>
            <div class="p-6 space-y-4">
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg shadow hover:bg-gray-100">
                    <div class="flex items-center">
                        <img class="w-12 h-12 rounded-full" src="https://placehold.co/48x48/eeeeee/4B5563/png?text=Paciente" alt="Paciente">
                        <div class="ml-4">
                            <h4 class="text-lg font-medium text-gray-800">Juan Pérez</h4>
                            <p class="text-sm text-gray-500">Fecha: 2023-10-15</p>
                            <p class="text-sm text-gray-500">Hora: 10:00 AM</p>
                        </div>
                    </div>
                    <button class="text-blue-600 hover:underline">Ver Detalles</button>
                </div>
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg shadow hover:bg-gray-100">
                    <div class="flex items-center">
                        <img class="w-12 h-12 rounded-full" src="https://placehold.co/48x48/eeeeee/4B5563/png?text=Paciente" alt="Paciente">
                        <div class="ml-4">
                            <h4 class="text-lg font-medium text-gray-800">María López</h4>
                            <p class="text-sm text-gray-500">Fecha: 2023-10-16</p>
                            <p class="text-sm text-gray-500">Hora: 11:30 AM</p>
                        </div>
                    </div>
                    <button class="text-blue-600 hover:underline">Ver Detalles</button>
                </div>
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg shadow hover:bg-gray-100">
                    <div class="flex items-center">
                        <img class="w-12 h-12 rounded-full" src="https://placehold.co/48x48/eeeeee/4B5563/png?text=Paciente" alt="Paciente">
                        <div class="ml-4">
                            <h4 class="text-lg font-medium text-gray-800">Carlos Martínez</h4>
                            <p class="text-sm text-gray-500">Fecha: 2023-10-17</p>
                            <p class="text-sm text-gray-500">Hora: 2:00 PM</p>
                        </div>
                    </div>
                    <button class="text-blue-600 hover:underline">Ver Detalles</button>
                </div>
            </div>
        </div>

</div>
@endsection

<!-- Asegúrate de incluir FontAwesome en tu proyecto para los íconos -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
