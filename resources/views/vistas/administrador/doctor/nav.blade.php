@extends('plantillas.administrador.plantilla')

@section('title', 'Doctores')

@section('submenu')

<div class="max-w-2xl py-5 px-8 flex-grow flex justify-end"> <!-- Alinear el div de doctores a la derecha -->
    <div class="flex flex-wrap justify-center"> <!-- Alinear el contenido de los doctores al centro -->
        @foreach ($doctores as $doctor)
            <div class="w-72 max-w-sm rounded overflow-hidden shadow-lg bg-white mx-4 my-4">
                <div class="px-6 py-4">
                    <div class="font-bold text-lg mb-2">{{ $doctor->nombre }} {{ $doctor->apellido }}</div>
                    <p class="text-sm text-gray-700 mb-2"><strong>Especialidad:</strong> {{ $doctor->especialidad }}</p>
                    <p class="text-sm text-gray-700 mb-2"><strong>DNI:</strong> {{ $doctor->dni }}</p>
                    <p class="text-sm text-gray-700 mb-2"><strong>Correo:</strong> {{ $doctor->correo }}</p>
                    <div class="flex justify-between">
                        <button class="bg-red-700 hover:bg-red-500 text-white font-bold py-1 px-2 rounded"
                            onclick="expandirFormulario({{ $doctor->id }})">
                            Editar
                        </button>
                        <form action="{{ route('eliminar.Doctor', ['id' => $doctor->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-gray-700 hover:bg-gray-500 text-white font-bold py-1 px-2 rounded">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div id="formulario{{ $doctor->id }}"
                class="fixed top-2/3 left-1/2 transform -translate-x-1/2 -translate-y-1/2 md:top-1/2 w-full max-w-lg bg-gray-800 bg-opacity-75 flex justify-center items-center"
                style="display: none;" onclick="cerrarFormulario({{ $doctor->id }})">
                <div class="bg-white p-8 rounded-lg overflow-y-auto" onclick="event.stopPropagation()">
                    <div class="flex justify-between">
                        <h2 class="text-2xl font-bold mb-4">Editar Doctor</h2>
                        <button class="text-gray-700 text-2xl" onclick="cerrarFormulario({{ $doctor->id }})">X</button>
                    </div>
                    <form id="form{{ $doctor->id }}" action="{{ route('actualizar.Doctor', ['id' => $doctor->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <!-- Campos de edición -->
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="nombre">
                                Nombre:
                            </label>
                            <input type="text" name="nombre" value="{{ $doctor->nombre }}"
                                class="w-full border rounded-md px-3 py-2">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="apellido">
                                Apellido:
                            </label>
                            <input type="text" name="apellido" value="{{ $doctor->apellido }}"
                                class="w-full border rounded-md px-3 py-2">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="correo">
                                Correo:
                            </label>
                            <input type="email" name="correo" value="{{ $doctor->correo }}"
                                class="w-full border rounded-md px-3 py-2">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="dni">
                                DNI:
                            </label>
                            <input type="text" name="dni" value="{{ $doctor->dni }}"
                                class="w-full border rounded-md px-3 py-2">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="especialidad">
                                Especialidad:
                            </label>
                            <input type="text" name="especialidad" value="{{ $doctor->especialidad }}"
                                class="w-full border rounded-md px-3 py-2">
                        </div>
                        <div class="flex justify-end">
                            <button type="submit"
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Actualizar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <script>
                // Función para mostrar el formulario de edición
                function expandirFormulario(id) {
                    var formulario = document.getElementById("formulario" + id);
                    formulario.style.display = "flex";
                }
                // Función para cerrar el formulario de edición
                function cerrarFormulario(id) {
                    var formulario = document.getElementById("formulario" + id);
                    formulario.style.display = "none";
                }
            </script>
        @endforeach
    </div>
</div>
@endsection
