@extends('layouts.plantilla')

@section('title', 'añadircuent')

@section('content')


<div class="flex"> <!-- Contenedor principal con flexbox -->
    <div class="max-w-2xl mx-auto py-8 px-4 flex-grow"> <!-- Primer div más grande -->
        <h1 class="text-3xl font-bold text-white mb-6">Añadir Cuentas</h1>
        <!-- Cambio de color del título a blanco -->

        <form action="{{ route('agregar') }}" method="POST" enctype="multipart/form-data" class="space-y-4">

            @csrf

            <!-- Campo de Nombre -->
            <div>
                <label class="block">
                    <span class="text-white">Nombre:</span> <!-- Cambio de color del texto del título a blanco -->
                    <input type="text" name="nombre" value="{{ old('nombre') }}"
                        class="mt-1 block w-full rounded-md border-red-500 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <!-- Cambio de color del borde a rojo -->
                </label>
                @error('nombre')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Campo de Apellido -->
            <div>
                <label class="block">
                    <span class="text-white">Apellido:</span> <!-- Cambio de color del texto del título a blanco -->
                    <input type="text" name="apellido" value="{{ old('apellido') }}"
                        class="mt-1 block w-full rounded-md border-red-500 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <!-- Cambio de color del borde a rojo -->
                </label>
                @error('apellido')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Campo de Correo -->
            <div>
                <label class="block">
                    <span class="text-white">Correo:</span> <!-- Cambio de color del texto del título a blanco -->
                    <input type="email" name="correo" value="{{ old('correo') }}"
                        class="mt-1 block w-full rounded-md border-red-500 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <!-- Cambio de color del borde a rojo -->
                </label>
                @error('correo')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Campo de Contraseña -->
            <div class="relative">
                <label class="block">
                    <span class="text-white">Contraseña:</span> <!-- Cambio de color del texto del título a blanco -->
                    <input id="password" type="password" name="password"
                        class="mt-1 block w-full rounded-md border-red-500 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 pr-10">
                    <!-- Cambio de color del borde a rojo -->
                    <span id="togglePassword" class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer">
                        <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0zM12 14l9-5-9-5-9 5 9 5z"></path>
                        </svg>
                    </span>
                </label>
                @error('password')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>


            <!-- Campo de Foto -->
            <div class="flex items-center justify-center w-full h-full bg-gray-100 rounded-md">
                <label for="foto"
                    class="cursor-pointer flex items-center justify-center w-full h-full p-6 border-2 border-gray-300 rounded-md hover:border-indigo-300">
                    <svg class="w-8 h-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    <span class="ml-2 text-gray-600">Selecciona una imagen</span>
                </label>
                <input id="foto" type="file" name="foto" class="hidden" onchange="previewImage(event)">
            </div>

            <div id="preview" class="mt-4"></div>

            <!-- Botón de Publicar -->
            <div>
                <button type="submit"
                    class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500">Crear</button>
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

    // Toggle para mostrar/ocultar la contraseña
    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    togglePassword.addEventListener('click', function() {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.classList.toggle('text-gray-400');
        this.classList.toggle('text-indigo-400');
    });

</script>


@endsection
