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
    <h2 class="mb-4 text-3xl font-bold text-gray-900">Historial de Citas</h2>
    <div class="w-full max-w-6xl bg-white rounded-lg shadow-md p-8"> <!-- Aumentar el tamaño aquí -->
        <div class="border-b border-gray-200 mb-4">
            <h3 class="text-xl font-semibold text-gray-800">Filtrar por Fecha</h3>
            <form method="GET" action="{{ route('doctor.historial') }}" class="flex items-center space-x-4">
                <input type="date" name="fecha" value="{{ $fecha ?? date('Y-m-d') }}" class="border border-gray-300 p-2 rounded-lg w-full max-w-xs">
                <button type="submit" class="bg-blue-500 text-white p-2 rounded-lg">Filtrar</button>
                <a href="{{ route('doctor.ver-todo') }}" class="bg-gray-500 text-white p-2 rounded-lg ml-4">Ver Todo</a>
            </form>
        </div>

        <h3 class="text-xl font-semibold text-gray-800 mb-4">Citas</h3>
        <div class="space-y-4">
            @forelse($citas as $cita)
            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg shadow hover:bg-gray-100">
                <div class="flex items-center">
                    <img class="w-12 h-12 rounded-full" src="https://placehold.co/48x48/eeeeee/4B5563/png?text=Paciente" alt="Paciente">
                    <div class="ml-4">
                        <h4 class="text-lg font-medium text-gray-800">{{ $cita->user->Nombre }} {{ $cita->user->ApePaterno }}</h4>
                        <p class="text-sm text-gray-500">Fecha: {{ $cita->horario->fecha }}</p>
                        <p class="text-sm text-gray-500">Hora: {{ $cita->horario->hora }}</p>
                    </div>
                </div>
                <span class="text-sm font-semibold {{ $cita->estado == 0 ? 'text-red-500' : 'text-green-500' }}">
                    {{ $cita->estado == 0 ? 'Sin atender' : 'Atendida' }}
                </span>
            </div>
            @empty
            <p class="text-gray-500">No hay citas para la fecha seleccionada.</p>
            @endforelse
        </div>
    </div>
</div>

@endsection
