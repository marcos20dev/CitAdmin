@extends('plantillas.administrador.plantilla')

@section('title', 'Doctores')

@section('submenu')
    <div class="max-w-3xl mx-auto py-4 px-4">
        <div class="space-y-2">
            @foreach ($doctores->reverse()->take(8) as $doctor)
                <!-- Tarjeta estilo WhatsApp -->
                <div class="flex items-center bg-white p-3 rounded-lg shadow hover:bg-gray-50 transition-colors duration-200">
                    <!-- Foto circular pequeña -->
                    <div class="w-12 h-12 rounded-full overflow-hidden flex-shrink-0 mr-3 bg-blue-100 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>

                    <!-- Contenido principal -->
                    <div class="flex-1 min-w-0">
                        <h3 class="font-medium text-gray-900 truncate">{{ $doctor->nombre }} {{ $doctor->apellido }}</h3>
                        <p class="text-sm text-gray-500 truncate">{{ $doctor->especialidad }}</p>
                        <p class="text-xs text-gray-400 mt-1">{{ $doctor->dni }}</p>
                    </div>

                    <!-- Botones de acción -->
                    <div class="flex space-x-2 ml-3">
                        <button onclick="expandirFormulario({{ $doctor->id }})"
                                class="w-8 h-8 flex items-center justify-center bg-blue-100 text-blue-600 rounded-full hover:bg-blue-200 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </button>

                        <button onclick="confirmarEliminacion({{ $doctor->id }})"
                                class="w-8 h-8 flex items-center justify-center bg-red-100 text-red-600 rounded-full hover:bg-red-200 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Modal de Edición -->
                <div id="formulario{{ $doctor->id }}" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4 bg-black/70 backdrop-blur-sm">
                    <div class="bg-white rounded-xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto transform transition-all" onclick="event.stopPropagation()">
                        <!-- Encabezado del modal -->
                        <div class="sticky top-0 bg-white p-4 sm:p-6 border-b flex justify-between items-center">
                            <h2 class="text-xl sm:text-2xl font-bold text-gray-800">Editar Doctor</h2>
                            <button onclick="cerrarFormulario({{ $doctor->id }})"
                                    class="text-gray-500 hover:text-gray-700 transition-colors p-1 rounded-full hover:bg-gray-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <!-- Formulario de edición -->
                        <form id="form{{ $doctor->id }}" action="{{ route('actualizar.Doctor', ['id' => $doctor->id]) }}" method="POST" class="p-4 sm:p-6 space-y-4 sm:space-y-6">
                            @csrf
                            @method('PUT')

                            <!-- Sección adaptable -->
                            <div class="flex flex-col space-y-4 sm:space-y-0 sm:flex-row sm:space-x-6">
                                <!-- Columna izquierda - Campos de texto -->
                                <div class="flex-1 space-y-4 sm:space-y-6">
                                    <!-- Campo Nombre -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1 sm:mb-2">Nombre:</label>
                                        <input type="text" name="nombre" value="{{ $doctor->nombre }}"
                                               class="w-full px-3 py-2 sm:px-4 sm:py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 text-black">
                                    </div>

                                    <!-- Campo Apellido -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1 sm:mb-2">Apellido:</label>
                                        <input type="text" name="apellido" value="{{ $doctor->apellido }}"
                                               class="w-full px-3 py-2 sm:px-4 sm:py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 text-black">
                                    </div>
                                </div>

                                <!-- Columna derecha - Campos adicionales -->
                                <div class="flex-1 space-y-4 sm:space-y-6">
                                    <!-- Campo Correo -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1 sm:mb-2">Correo:</label>
                                        <input type="email" name="correo" value="{{ $doctor->correo }}"
                                               class="w-full px-3 py-2 sm:px-4 sm:py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 text-black">
                                    </div>

                                    <!-- Campo DNI -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1 sm:mb-2">DNI:</label>
                                        <input type="text" name="dni" value="{{ $doctor->dni }}"
                                               class="w-full px-3 py-2 sm:px-4 sm:py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 text-black">
                                    </div>
                                </div>
                            </div>

                            <!-- Campo Especialidad -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1 sm:mb-2">Especialidad:</label>
                                <select name="especialidad"
                                        class="w-full px-3 py-2 sm:px-4 sm:py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 text-black">
                                    <option value="Cardiología" {{ $doctor->especialidad == 'Cardiología' ? 'selected' : '' }}>Cardiología</option>
                                    <option value="Dermatología" {{ $doctor->especialidad == 'Dermatología' ? 'selected' : '' }}>Dermatología</option>
                                    <option value="Gastroenterología" {{ $doctor->especialidad == 'Gastroenterología' ? 'selected' : '' }}>Gastroenterología</option>
                                    <option value="Pediatría" {{ $doctor->especialidad == 'Pediatría' ? 'selected' : '' }}>Pediatría</option>
                                    <option value="Neurología" {{ $doctor->especialidad == 'Neurología' ? 'selected' : '' }}>Neurología</option>
                                </select>
                            </div>

                            <!-- Botón de enviar -->
                            <div class="flex justify-end pt-4">
                                <button type="submit"
                                        class="px-4 py-2 sm:px-6 sm:py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow transition-all duration-300">
                                    Guardar Cambios
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <form id="eliminar-form{{ $doctor->id }}" action="{{ route('eliminar.Doctor', ['id' => $doctor->id]) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            @endforeach

            <!-- Botón "Ver más" -->
            <div class="pt-6 text-center">
                <a href="{{ route('doctor.mostrar') }}"
                   class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
                    Ver más doctores
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Función para mostrar el formulario de edición
        function expandirFormulario(id) {
            const formulario = document.getElementById(`formulario${id}`);
            formulario.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        // Función para cerrar el formulario de edición
        function cerrarFormulario(id) {
            const formulario = document.getElementById(`formulario${id}`);
            formulario.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Función para confirmar la eliminación del doctor
        function confirmarEliminacion(id) {
            Swal.fire({
                title: '¿Eliminar doctor?',
                text: "Esta acción no se puede deshacer",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar',
                background: '#fff',
                backdrop: `
                rgba(0,0,0,0.4)
            `
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('eliminar-form' + id).submit();
                }
            })
        }
    </script>
@endsection
