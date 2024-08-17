@extends('plantillas.doctor.plantilladoc')

@section('title', 'Historial de citas')

@section('header')
    @include('header.doctor.header')
@endsection

@section('menu')
    @include('vistas.doctor.menu')
@endsection

@section('content')

<div class="flex flex-col items-center justify-center h-full p-6 bg-gray-100">
    <h2 class="mb-4 text-3xl font-bold text-gray-900">estas en historial</h2>
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
