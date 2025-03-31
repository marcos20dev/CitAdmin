@extends('plantillas.doctor.plantilladoc')

@section('title', 'Dashboard')

@section('header')
    @include('header.doctor.header')
@endsection

@section('menu')
    @include('vistas.doctor.menu')
@endsection

@section('content')
    <div class="relative min-h-screen bg-gradient-to-br from-blue-50 to-indigo-50">
        <!-- Hero Section con gradiente -->
        <div class="relative h-48 md:h-56 bg-gradient-to-r from-indigo-600 to-blue-500 overflow-hidden">
            <div class="absolute inset-0 flex items-center justify-center px-6">
                <div class="text-center">
                    <h1 class="text-2xl md:text-3xl font-bold text-white mb-2">Bienvenido, Dr. {{ Auth::guard('doctor')->user()->nombre }}</h1>
                    <p class="text-blue-100">Panel de control médico</p>
                </div>
            </div>
        </div>

        <!-- Estadísticas resumen -->
        <div class="relative z-10 -mt-12 px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Tarjeta Citas Programadas -->
                <div class="bg-white rounded-xl shadow-lg p-6 transform transition-all hover:scale-[1.02] hover:shadow-xl border border-blue-100">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 rounded-full bg-indigo-100 text-indigo-600">
                            <i class="fas fa-calendar-alt text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-gray-500 text-sm font-medium">Citas Programadas</h3>
                            <p class="text-2xl font-bold text-gray-800" id="count-programadas">{{ $citasTotales->where('estado', 0)->count() }}</p>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-100">
                        <a href="#" class="text-indigo-600 text-sm font-medium flex items-center">
                            Ver todas
                            <i class="fas fa-chevron-right ml-1 text-xs"></i>
                        </a>
                    </div>
                </div>

                <!-- Tarjeta Citas Atendidas -->
                <div class="bg-white rounded-xl shadow-lg p-6 transform transition-all hover:scale-[1.02] hover:shadow-xl border border-blue-100">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 rounded-full bg-green-100 text-green-600">
                            <i class="fas fa-user-md text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-gray-500 text-sm font-medium">Citas Atendidas</h3>
                            <p class="text-2xl font-bold text-gray-800" id="count-atendidas">{{ $citasTotales->where('estado', 1)->count() }}</p>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-100">
                        <a href="#" class="text-indigo-600 text-sm font-medium flex items-center">
                            Ver historial
                            <i class="fas fa-chevron-right ml-1 text-xs"></i>
                        </a>
                    </div>
                </div>

                <!-- Tarjeta Próxima Cita -->
                <div class="bg-white rounded-xl shadow-lg p-6 transform transition-all hover:scale-[1.02] hover:shadow-xl border border-blue-100">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 rounded-full bg-amber-100 text-amber-600">
                            <i class="fas fa-clock text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-gray-500 text-sm font-medium">Próxima Cita</h3>
                            <p class="text-lg font-bold text-gray-800">
                                @isset($proximaCita)
                                    {{ \Carbon\Carbon::parse($proximaCita->fecha_hora)->format('d M, H:i') }}
                                    <span class="block text-sm text-gray-500 mt-1">Paciente: {{ $proximaCita->paciente->nombre }}</span>
                                @else
                                    Sin citas programadas
                                @endisset
                            </p>
                        </div>
                    </div>
                    @isset($proximaCita)
                        <div class="mt-4 pt-4 border-t border-gray-100">
                            <a href="#" class="text-indigo-600 text-sm font-medium flex items-center">
                                Ver detalles
                                <i class="fas fa-chevron-right ml-1 text-xs"></i>
                            </a>
                        </div>
                    @endisset
                </div>
            </div>
        </div>

        <!-- Sección principal de contenido -->
        <div class="container mx-auto px-4 py-8">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-blue-100">
                <!-- Header de la sección -->
                <div class="border-b border-gray-200 px-6 py-4 flex flex-col md:flex-row md:items-center md:justify-between bg-gradient-to-r from-blue-50 to-indigo-50">
                    <div>
                        <h2 class="text-xl md:text-2xl font-bold text-gray-800">Gestión de Citas</h2>
                        <p class="text-gray-600 text-sm">Revisa y gestiona tus citas médicas</p>
                    </div>

                    <div class="mt-4 md:mt-0">
                        <div class="flex flex-col sm:flex-row gap-3">
                            <button id="toggle-citas" class="flex items-center justify-center px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-all shadow-md">
                                <i class="fas fa-sync-alt mr-2"></i>
                                <span>Mostrar Citas Atendidas</span>
                            </button>

                            @if(isset($canCreateCita) && $canCreateCita)
                                <a href="{{ route('doctor.citas.create') }}" class="flex items-center justify-center px-4 py-2 bg-white border border-indigo-600 text-indigo-600 rounded-lg hover:bg-indigo-50 transition-all shadow-sm">
                                    <i class="fas fa-plus mr-2"></i>
                                    <span>Nueva Cita</span>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Contenedor de citas -->
                <div class="p-6">
                    <div class="overflow-hidden rounded-lg border border-gray-200">
                        <div id="citas-container">
                            @include('partials.citas', ['citas' => $citas])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const button = document.getElementById('toggle-citas');
            let currentState = '{{ request('estado') == 1 ? 1 : 0 }}';

            button.addEventListener('click', async function() {
                try {
                    // Mostrar estado de carga
                    const originalText = button.innerHTML;
                    button.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Cargando...';
                    button.disabled = true;

                    const newState = currentState == 1 ? 0 : 1;
                    currentState = newState;

                    // Realizar petición
                    const response = await fetch('{{ url('doctor/dashboard') }}?estado=' + newState);

                    if (!response.ok) {
                        throw new Error('Error en la respuesta del servidor');
                    }

                    const html = await response.text();

                    // Actualizar el contenido
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const citasContainer = doc.querySelector('#citas-container');

                    if (citasContainer) {
                        document.getElementById('citas-container').innerHTML = citasContainer.innerHTML;
                    }

                    // Actualizar texto del botón
                    button.innerHTML = `<i class="fas fa-sync-alt mr-2"></i>${
                        newState == 1 ? 'Mostrar Citas Programadas' : 'Mostrar Citas Atendidas'
                    }`;

                    // Actualizar contadores
                    const updateCounter = (id, value) => {
                        const element = document.getElementById(id);
                        if (element) element.textContent = value;
                    };

                    updateCounter('count-programadas', document.querySelectorAll('.cita.estado-0').length);
                    updateCounter('count-atendidas', document.querySelectorAll('.cita.estado-1').length);

                } catch (error) {
                    console.error('Error:', error);
                    // Mostrar notificación de error
                    alert('Ocurrió un error al cargar las citas');
                } finally {
                    button.disabled = false;
                }
            });
        });
    </script>
@endsection
