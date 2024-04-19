@extends('layouts.plantilla')

@section('title', 'Noticias ')

@section('menu')
    @include('menu.menu')
@endsection

@section('content')
<br>
<br>
<br>
<br>
<div class="max-w-2xl mx-auto py-8 px-4"> <!-- Ajusta el ancho aquí -->


<div class="flex"> <!-- Contenedor principal con flexbox -->
    <div class="max-w-2xl mx-auto py-8 px-4 flex-grow"> <!-- Primer div más grande -->
        <h1 class="text-3xl font-bold text-white mb-6">Añadir Doctor</h1>
        <!-- Cambio de color del título a blanco -->

        <form action="{{ route('añadirdoctor') }}" method="POST" enctype="multipart/form-data" class="space-y-4">

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

           <!-- Campo de Especialidad -->
            <div>
                <label class="block">
                    <span class="text-white">Especialidad:</span> <!-- Cambio de color del texto del título a blanco -->
                    <select name="especialidad" class="mt-1 block w-full rounded-md border-red-500 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <!-- Cambio de color del borde a rojo -->
                        <option value="">Seleccionar especialidad</option>
                        <option value="Cardiología">Cardiología</option>
                        <option value="Dermatología">Dermatología</option>
                        <option value="Ginecología">Ginecología</option>
                        <!-- Agrega más opciones según sea necesario -->
                    </select>
                </label>
                @error('especialidad')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>



            <!-- Botón de Publicar -->
            <div>
                <button type="submit"
                    class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500">Crear</button>
            </div>

        </form>
    </div>
</div>

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
