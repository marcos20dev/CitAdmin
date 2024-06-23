@extends('layouts.plantilla')

@section('title', 'Noticias ')

@section('menu')
    @include('menu.menu')
@endsection


@section('submenu')
@include('init.doctor.nav')
@endsection


@section('content')


    <div class="flex"> <!-- Contenedor principal con flexbox -->
        <div class="max-w-2xl mx-auto py-8 px-4 flex-grow"> <!-- Primer div más grande -->
            <h1 class="text-3xl font-bold text-white mb-6">Registrar doctor</h1>
            <!-- Cambio de color del título a blanco -->

            <form action="{{ route('agregarDoctor') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
            
                <div>
                    <label class="block">
                        <span class="text-white">Nombre:</span>
                        <input type="text" name="nombre" value="{{ old('nombre') }}"
                            class="mt-1 block w-full rounded-md border-red-500 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-base px-3 py-2">
                        <!-- Tamaño de texto base y padding moderado -->
                    </label>
                    @error('nombre')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            
                <div>
                    <label class="block">
                        <span class="text-white">Apellido:</span>
                        <input type="text" name="apellido" value="{{ old('apellido') }}"
                            class="mt-1 block w-full rounded-md border-red-500 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-base px-3 py-2">
                        <!-- Tamaño de texto base y padding moderado -->
                    </label>
                    @error('apellido')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            
                <div>
                    <label class="block">
                        <span class="text-white">Correo electrónico:</span>
                        <input type="email" name="correo" value="{{ old('correo') }}"
                            class="mt-1 block w-full rounded-md border-red-500 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-base px-3 py-2">
                        <!-- Tamaño de texto base y padding moderado -->
                    </label>
                    @error('correo')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            
                <div>
                    <label class="block">
                        <span class="text-white">DNI:</span>
                        <input type="text" name="dni" value="{{ old('dni') }}"
                            class="mt-1 block w-full rounded-md border-red-500 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-base px-3 py-2">
                        <!-- Tamaño de texto base y padding moderado -->
                    </label>
                    @error('dni')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            
                <div>
                    <label class="block">
                        <span class="text-white">Especialidad:</span>
                        <select name="especialidad"
                            class="mt-1 block w-full rounded-md border-red-500 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-base px-3 py-2">
                            <option value="" disabled selected>Selecciona una especialidad</option>
                            <option value="Cardiología">Cardiología</option>
                            <option value="Dermatología">Dermatología</option>
                            <option value="Gastroenterología">Gastroenterología</option>
                            <!-- Agrega más opciones según sea necesario -->
                        </select>
                    </label>
                    @error('especialidad')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            
                <div>
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500">Registrar</button>
                </div>
            </form>
            
            
        </div>

      
    
    </div>

    <script>
        // Función para ajustar la altura del textarea dinámicamente
        function autoSizeTextarea() {
            const textarea = document.getElementById('descripcion');
            textarea.style.height = 'auto'; // Restablecer la altura para recalcular
            textarea.style.height = textarea.scrollHeight + 'px'; // Ajustar la altura según el contenido
        }

        // Llamar a la función al cargar la página y en cada cambio de contenido
        window.addEventListener('DOMContentLoaded', autoSizeTextarea);
        document.getElementById('descripcion').addEventListener('input', autoSizeTextarea);

        function previewImage(event) {
            const preview = document.getElementById('preview');
            preview.innerHTML = '';
            const file = event.target.files[0];
            const reader = new FileReader();
            reader.onloadend = function() {
                const img = document.createElement('img');
                img.src = reader.result;
                img.className = 'w-full mt-2 rounded-md';
                preview.appendChild(img);
            }
            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>


@endsection
