@extends('plantillas.doctor.plantilladoc')

@section('title', 'Historial de citas')

@section('header')
    @include('header.doctor.header')
@endsection

@section('menu')
    @include('vistas.doctor.menu')
@endsection

@section('content')

    <div class="min-h-screen bg-gray-50 py-8 px-4 sm:px-6">
        <div class="max-w-screen-xl mx-auto"> <!-- Contenedor más ancho -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <!-- Encabezado -->
                <div class="px-8 py-6 border-b border-gray-200">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800">Historial de Citas</h2>
                            <p class="mt-1 text-gray-600">Consulta el registro de tus atenciones médicas</p>
                        </div>

                        <!-- Filtros -->
                        <div class="mt-4 sm:mt-0">
                            <form method="GET" action="{{ route('doctor.historial') }}" class="flex flex-col sm:flex-row gap-3">
                                <div class="relative">
                                    <input
                                        type="date"
                                        name="fecha"
                                        value="{{ $fecha ?? date('Y-m-d') }}"
                                        class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2 px-4 border"
                                    >
                                </div>
                                <button
                                    type="submit"
                                    class="inline-flex justify-center items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                                >
                                    Filtrar
                                </button>
                                <a
                                    href="{{ route('doctor.ver-todo') }}"
                                    class="inline-flex justify-center items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-lg shadow-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                                >
                                    Ver Todo
                                </a>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Contenido -->
                <div class="px-8 py-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-medium text-gray-800">
                            @if(isset($fecha))
                                Citas para el {{ \Carbon\Carbon::parse($fecha)->isoFormat('D [de] MMMM [de] YYYY') }}
                            @else
                                Todas tus citas
                            @endif
                        </h3>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                        {{ count($citas) }} {{ count($citas) === 1 ? 'cita' : 'citas' }}
                    </span>
                    </div>

                    <!-- Lista de citas -->
                    @if($citas->isEmpty())
                        <div class="text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <h3 class="mt-2 text-lg font-medium text-gray-900">No hay citas registradas</h3>
                            <p class="mt-1 text-gray-500">
                                {{ isset($fecha) ? 'No hay citas para la fecha seleccionada.' : 'No tienes citas en tu historial.' }}
                            </p>
                        </div>
                    @else
                        <div class="space-y-4">
                            @foreach($citas as $cita)
                                <div class="flex items-center justify-between p-5 bg-white rounded-lg border border-gray-200 hover:border-blue-300 transition-colors duration-150">
                                    <div class="flex items-center min-w-0">
                                        <div class="flex-shrink-0 h-12 w-12 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-medium">
                                            {{ strtoupper(substr($cita->user->Nombre, 0, 1) . substr($cita->user->ApePaterno, 0, 1)) }}
                                        </div>
                                        <div class="ml-4 min-w-0">
                                            <h4 class="text-base font-medium text-gray-800 truncate">
                                                {{ $cita->user->Nombre }} {{ $cita->user->ApePaterno }}
                                            </h4>
                                            <div class="mt-1 flex flex-wrap gap-x-4 gap-y-1 text-sm text-gray-500">
                                                <div class="flex items-center">
                                                    <svg class="flex-shrink-0 mr-1.5 h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                    <span>{{ \Carbon\Carbon::parse($cita->horario->fecha)->isoFormat('D MMM YYYY') }}</span>
                                                </div>
                                                <div class="flex items-center">
                                                    <svg class="flex-shrink-0 mr-1.5 h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                    <span>{{ $cita->horario->hora }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $cita->estado == 0 ? 'bg-amber-100 text-amber-800' : 'bg-green-100 text-green-800' }}">
                                {{ $cita->estado == 0 ? 'Pendiente' : 'Completada' }}
                            </span>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
