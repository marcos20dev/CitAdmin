@extends('plantillas.soporte.menu')

@section('title', 'Ver Cuentas de Doctores')

@section('menu')
    @include('vistas.soporte.menu_soporte')
@endsection

@section('soprote')
    <div class="h-screen w-full bg-gradient-to-br from-gray-50 to-blue-50 p-6 overflow-hidden">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Gestión de Especialidades Médicas</h1>
                <p class="text-gray-600">Administra las especialidades disponibles en el sistema</p>
            </div>
            <div class="flex items-center space-x-4">
                <form method="GET" action="{{ route('add.especialidades') }}" class="flex items-center space-x-2">
                    <div class="relative">
                        <input type="text" name="buscar" placeholder="Buscar especialidad..."
                               value="{{ request('buscar') }}"
                               class="pl-10 pr-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent w-64">
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    </div>

                    <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow-md transition-all duration-300">
                        Buscar
                    </button>

                    @if(request()->has('buscar'))
                        <a href="{{ route('add.especialidades') }}"
                           class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg shadow-md transition-all duration-300">
                            Limpiar
                        </a>
                    @endif
                </form>
            </div>

        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 xl:grid-cols-12 gap-6 h-[calc(100%-120px)]">
            <!-- Add Speciality Card -->
            <div class="xl:col-span-4 bg-white rounded-2xl shadow-xl p-6 border border-gray-100 overflow-y-auto">
                @php
                    $editando = isset($especialidad);
                @endphp

                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-semibold text-gray-800 flex items-center">
        <span class="w-8 h-8 {{ $editando ? 'bg-red-100' : 'bg-blue-100' }} rounded-full flex items-center justify-center mr-3">
            <i class="fas {{ $editando ? 'fa-edit text-red-600' : 'fa-plus text-blue-600' }}"></i>
        </span>
                        {{ $editando ? 'Actualizando Especialidad' : 'Nueva Especialidad' }}
                    </h2>
                    <div class="{{ $editando ? 'bg-red-100 text-red-800' : 'bg-blue-100 text-blue-800' }} text-xs font-medium px-2.5 py-0.5 rounded-full">
                        {{ $editando ? 'Modo edición' : 'Paso 1 de 2' }}
                    </div>
                </div>


                @php
                    $editando = isset($especialidad);
                @endphp

                <form method="POST"
                      action="{{ $editando ? route('especialidades.update', $especialidad->id) : route('especialidades.store') }}"
                      class="space-y-5">
                    @csrf
                    @if($editando)
                        @method('PUT')
                    @endif

                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">Nombre de la especialidad</label>
                        <div class="relative">
                            <input type="text" name="nombre" placeholder="Ej: Pediatría"
                                   value="{{ $editando ? $especialidad->nombre : old('nombre') }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <i class="fas fa-stethoscope text-gray-400"></i>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">Descripción</label>
                        <textarea name="descripcion" rows="4"
                                  placeholder="Área médica que atiende a niños y adolescentes..."
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">{{ $editando ? $especialidad->descripcion : old('descripcion') }}</textarea>
                    </div>

                    <div class="flex items-center justify-between">
                        <label class="toggle-switch">
                            <input type="checkbox" name="estado" value="1"
                                {{ $editando ? ($especialidad->estado ? 'checked' : '') : 'checked' }}>
                            <span class="slider"></span>
                            <span class="toggle-text">Activar especialidad</span>
                        </label>
                        <button type="submit"
                                class="bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-700 hover:to-blue-600 text-white font-medium px-6 py-2.5 rounded-lg shadow-md transition-all duration-300 flex items-center">
                            <i class="fas fa-save mr-2"></i> {{ $editando ? 'Actualizar Especialidad' : 'Guardar Especialidad' }}
                        </button>
                    </div>
                </form>

                @if(Session::has('success'))
                    <div id="notification"
                         class="fixed top-24 right-6 w-80 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-lg flex items-center justify-between animate-slideIn">
                        <div>
                            <i class="fas fa-check-circle mr-2"></i>
                            {{ Session::get('success') }}
                        </div>
                        <button onclick="closeNotification()" class="text-green-700 hover:text-green-900">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                @endif

                <div id="errorNotification"
                     class="hidden fixed top-36 right-6 w-80 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg shadow-lg flex items-center justify-between animate-slideIn">
                    <div id="errorMessage" class="flex items-center">
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        <span></span>
                    </div>
                    <button onclick="closeErrorNotification()" class="text-red-700 hover:text-red-900">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <div class="mt-8 pt-6 border-t border-gray-200">
                    <h3 class="text-sm font-medium text-gray-500 mb-3">Especialidades sugeridas</h3>
                    <div class="flex flex-wrap gap-2">
                        @php
                            $sugeridas = [
                                ['Pediatría', 'Especialidad médica dedicada a la salud infantil y adolescente'],
                                ['Cardiología', 'Especialidad médica del corazón y sistema cardiovascular'],
                                ['Neurología', 'Especialidad médica del sistema nervioso'],
                                ['Dermatología', 'Especialidad médica de la piel y sus enfermedades'],
                                ['Ginecología', 'Salud reproductiva y del sistema genital femenino'],
                                ['Oncología', 'Diagnóstico y tratamiento del cáncer'],
                                ['Oftalmología', 'Estudio de enfermedades de los ojos'],
                                ['Otorrinolaringología', 'Oído, nariz y garganta'],
                                ['Traumatología', 'Lesiones del sistema musculoesquelético'],
                                ['Urología', 'Aparato urinario y sistema reproductor masculino'],
                                ['Neumología', 'Sistema respiratorio y pulmones'],
                                ['Endocrinología', 'Sistema endocrino y hormonas'],
                                ['Gastroenterología', 'Tracto digestivo y órganos asociados'],
                                ['Hematología', 'Estudio de la sangre y sus enfermedades'],
                                ['Psiquiatría', 'Trastornos mentales y emocionales'],
                            ];
                        @endphp

                        @foreach ($sugeridas as [$nombre, $descripcion])
                            <span
                                class="suggested-specialty bg-gray-100 hover:bg-gray-200 text-gray-800 text-xs font-medium px-3 py-1.5 rounded-full cursor-pointer transition"
                                data-nombre="{{ $nombre }}"
                                data-descripcion="{{ $descripcion }}">
                {{ $nombre }}
            </span>
                        @endforeach
                    </div>
                </div>


            </div>

            <!-- Specialities Table -->
            <div class="xl:col-span-8 bg-white rounded-2xl shadow-xl p-6 border border-gray-100 overflow-hidden">
                <div class="flex flex-col h-full">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-semibold text-gray-800 flex items-center">
            <span class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                <i class="fas fa-list text-blue-600"></i>
            </span>
                            Especialidades Registradas
                        </h2>
                        <div class="text-sm text-gray-500">
                            <span class="font-medium text-blue-600">{{ $especialidades->count() }}</span> especialidades registradas
                        </div>
                    </div>

                    <div class="overflow-auto flex-grow">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descripción</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($especialidades as $esp)
                                <tr class="hover:bg-gray-50 transition-colors duration-150">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $esp->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 font-medium">{{ $esp->nombre }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500 max-w-xs truncate">{{ $esp->descripcion }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                    {{ $esp->estado ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $esp->estado ? 'Activo' : 'Inactivo' }}
                                </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex justify-end space-x-2">
                                            <!-- Editar -->
                                            <a href="{{ route('especialidades.edit', $esp->id) }}"
                                               class="text-blue-600 hover:text-blue-900 p-1.5 rounded-full hover:bg-blue-50 transition"
                                               title="Editar">
                                                <i class="fas fa-pen fa-sm"></i>
                                            </a>

                                            <!-- Cambiar estado -->
                                            <form method="POST" action="{{ route('especialidades.toggle', $esp->id) }}">
                                                @csrf
                                                <button type="submit" class="text-yellow-600 hover:text-yellow-900 p-1.5 rounded-full hover:bg-yellow-50 transition" title="Cambiar estado">
                                                    <i class="fas fa-toggle-{{ $esp->estado ? 'on' : 'off' }} fa-sm"></i>
                                                </button>
                                            </form>

                                            <!-- Eliminar -->
                                            <form method="POST" action="{{ route('especialidades.destroy', $esp->id) }}"
                                                  onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta especialidad?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900 p-1.5 rounded-full hover:bg-red-50 transition" title="Eliminar">
                                                    <i class="fas fa-trash fa-sm"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-gray-500 py-4">No hay especialidades registradas.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        <div class="mt-4">
                            {{ $especialidades->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



    <style>
        /* Custom scrollbar for the table container */
        .overflow-auto::-webkit-scrollbar {
            height: 8px;
            width: 8px;
        }

        .overflow-auto::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .overflow-auto::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 10px;
        }

        .overflow-auto::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }

        .toggle-switch {
            display: flex;
            align-items: center;
            cursor: pointer;
            gap: 8px;
        }

        .toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
            position: absolute;
        }

        .slider {
            position: relative;
            display: inline-block;
            width: 44px;
            height: 24px;
            background-color: #ccc;
            border-radius: 24px;
            transition: .4s;
        }

        .slider:before {
            content: "";
            position: absolute;
            height: 16px;
            width: 16px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            border-radius: 50%;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #3b82f6; /* Azul */
        }

        input:checked + .slider:before {
            transform: translateX(20px);
        }

        .toggle-text {
            font-family: sans-serif;
            font-size: 14px;
            color: #333;
        }

        @keyframes slideIn {
            from {
                transform: translateX(100%);
            }
            to {
                transform: translateX(0);
            }
        }

        @keyframes slideOut {
            from {
                transform: translateX(0);
            }
            to {
                transform: translateX(100%);
            }
        }

        .animate-slideIn {
            animation: slideIn 0.3s ease-out forwards;
        }
    </style>

    <script>
        // Simple animation for the FAB
        document.querySelector('.fixed button').addEventListener('mouseover', function () {
            this.classList.add('rotate-90');
        });
        document.querySelector('.fixed button').addEventListener('mouseout', function () {
            this.classList.remove('rotate-90');
        });
    </script>
    <script>
        function closeNotification() {
            const notification = document.getElementById('notification');
            notification.style.animation = 'slideOut 0.5s forwards';
            setTimeout(() => {
                notification.style.display = 'none';
            }, 500);
        }

        // Cerrar automáticamente después de 5 segundos
        document.addEventListener('DOMContentLoaded', function () {
            const notification = document.getElementById('notification');
            if (notification) {
                setTimeout(() => {
                    closeNotification();
                }, 5000);
            }
        });

    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.querySelector('form[action="{{ route('especialidades.store') }}"]');

            form.addEventListener('submit', function (e) {
                const nombre = this.elements['nombre'].value.trim();
                const descripcion = this.elements['descripcion'].value.trim();

                if (!nombre || !descripcion) {
                    e.preventDefault();
                    const errorMessage = !nombre
                        ? 'Por favor ingresa el nombre de la especialidad'
                        : 'Por favor ingresa la descripción';
                    showErrorNotification(errorMessage);
                }
            });
        });

        function showErrorNotification(mensaje) {
            const errorBox = document.getElementById('errorNotification');
            const errorMsg = errorBox.querySelector('#errorMessage span');

            errorMsg.textContent = mensaje;
            errorBox.classList.remove('hidden');

            // Reiniciar animación
            errorBox.style.animation = 'none';
            void errorBox.offsetHeight; // Trigger reflow
            errorBox.style.animation = 'slideIn 0.3s ease-out forwards';

            setTimeout(closeErrorNotification, 5000);
        }

        function closeErrorNotification() {
            const errorBox = document.getElementById('errorNotification');
            errorBox.style.animation = 'slideOut 0.5s forwards';
            setTimeout(() => {
                errorBox.classList.add('hidden');
            }, 500);
        }
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Selecciona todos los elementos de especialidades sugeridas
            const suggestedSpecialties = document.querySelectorAll('.suggested-specialty');

            // Agrega el evento click a cada uno
            suggestedSpecialties.forEach(specialty => {
                specialty.addEventListener('click', function () {
                    // Obtiene los datos del elemento clickeado
                    const nombre = this.dataset.nombre;
                    const descripcion = this.dataset.descripcion;

                    // Selecciona los campos del formulario
                    const nombreInput = document.querySelector('input[name="nombre"]');
                    const descripcionTextarea = document.querySelector('textarea[name="descripcion"]');

                    // Asigna los valores
                    nombreInput.value = nombre;
                    descripcionTextarea.value = descripcion;

                    // Enfoca el campo de nombre y coloca el cursor al final
                    nombreInput.focus();
                    nombreInput.setSelectionRange(nombre.length, nombre.length);
                });
            });
        });
    </script>

@endsection
