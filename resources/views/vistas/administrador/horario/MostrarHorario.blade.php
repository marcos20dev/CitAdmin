@extends('plantillas.administrador.plantilla')

@section('title', 'Gestión de Horarios por Doctor')

@section('menu')
    @include('vistas.administrador.menu')
@endsection

@section('content')
    <div class="min-h-screen bg-gray-900">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <!-- Encabezado -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-white">Horarios Médicos por Doctor</h1>
                    <p class="text-gray-400 mt-1">Organizados por profesional</p>
                </div>
                <div class="flex space-x-3">
                    <a href="#" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Nuevo Horario
                    </a>
                </div>
            </div>

            <!-- Lista de Doctores -->
            <div class="space-y-4">
                @foreach($doctores as $doctor)
                    <div class="bg-gray-800 rounded-lg shadow-md overflow-hidden border border-gray-700">
                        <!-- Cabecera del Doctor - Clickable -->
                        <button onclick="toggleSchedule({{ $doctor->id }})" class="w-full p-4 bg-gray-700 border-b border-gray-600 flex items-center justify-between hover:bg-gray-600 transition-colors">
                            <div class="flex items-center space-x-4">
                                <div class="h-12 w-12 rounded-full bg-blue-900 flex items-center justify-center text-blue-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <div class="text-left">
                                    <h3 class="text-lg font-semibold text-white">{{ $doctor->nombre }} {{ $doctor->apellido }}</h3>
                                    <p class="text-sm text-gray-300">{{ $doctor->especialidad }}</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <span class="px-3 py-1 bg-blue-900 text-blue-200 text-sm rounded-full mr-3">
                                    {{ $doctor->horarios->count() }} horarios
                                </span>
                                <svg id="icon-{{ $doctor->id }}" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 transform transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </button>

                        <!-- Horarios del Doctor - Initially hidden -->
                        <div id="schedule-{{ $doctor->id }}" class="hidden divide-y divide-gray-700">
                            @if($doctor->horarios->isNotEmpty())
                                @foreach($doctor->horarios as $horario)
                                    <div class="p-4 hover:bg-gray-700 transition-colors">
                                        <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                                            <!-- Información del Horario -->
                                            <div class="flex items-center space-x-4 mb-3 md:mb-0">
                                                <div class="flex-shrink-0">
                                                    <div class="h-10 w-10 rounded-full bg-green-900 flex items-center justify-center text-green-300">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="flex items-center text-sm text-gray-400">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                        </svg>
                                                        {{ \Carbon\Carbon::parse($horario->fecha)->isoFormat('dddd, D [de] MMMM [de] YYYY') }}
                                                    </div>
                                                    <div class="mt-1">
                                                        <span class="px-2 py-1 bg-green-900 text-green-200 text-sm rounded-full">
                                                            Hora: {{ $horario->hora }}
                                                        </span>
                                                        <span class="px-2 py-1 bg-blue-900 text-blue-200 text-sm rounded-full ml-2">
                                                            Intervalo: {{ $horario->intervalo }} min
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Acciones -->
                                            <div class="flex space-x-2">
                                                <a href="#" class="p-2 text-blue-400 hover:bg-gray-600 rounded-full" title="Editar">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                </a>
                                                <button onclick="confirmarEliminacion({{ $horario->id }})" class="p-2 text-red-400 hover:bg-gray-600 rounded-full" title="Eliminar">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="p-4 text-center text-gray-400">
                                    Este doctor no tiene horarios registrados.
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Paginación simple -->
            <div class="mt-6 flex justify-between items-center text-gray-300">
                <div>
                    @if($doctores->currentPage() > 1)
                        <a href="{{ $doctores->previousPageUrl() }}" class="px-4 py-2 bg-gray-700 rounded-lg hover:bg-gray-600">
                            Anterior
                        </a>
                    @endif
                </div>
                <div class="text-sm">
                    Página {{ $doctores->currentPage() }} de {{ $doctores->lastPage() }}
                </div>
                <div>
                    @if($doctores->hasMorePages())
                        <a href="{{ $doctores->nextPageUrl() }}" class="px-4 py-2 bg-gray-700 rounded-lg hover:bg-gray-600">
                            Siguiente
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de confirmación -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function toggleSchedule(doctorId) {
            const schedule = document.getElementById(`schedule-${doctorId}`);
            const icon = document.getElementById(`icon-${doctorId}`);

            if (schedule.classList.contains('hidden')) {
                schedule.classList.remove('hidden');
                icon.classList.add('rotate-180');
            } else {
                schedule.classList.add('hidden');
                icon.classList.remove('rotate-180');
            }
        }

        function confirmarEliminacion(id) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esta acción!",
                icon: 'warning',
                background: '#1f2937',
                color: '#fff',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Simulación de eliminación
                    Swal.fire({
                        title: '¡Eliminado!',
                        text: 'El horario ha sido eliminado.',
                        icon: 'success',
                        background: '#1f2937',
                        color: '#fff'
                    }).then(() => {
                        window.location.reload();
                    });
                }
            });
        }
    </script>

    <style>
        .rotate-180 {
            transform: rotate(180deg);
        }
    </style>
@endsection
