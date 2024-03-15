@extends('layouts.plantilla')

@section('title', 'añadircuent')

@section('content')

<div class="flex justify-center"> <!-- Contenedor principal con flexbox y centrado -->
    <div class="max-w-md w-full py-8 px-4"> <!-- Contenedor del formulario -->
        <h1 class="text-3xl font-bold text-white mb-6 text-center">Añadir Cuenta</h1> <!-- Título centrado -->

        <form action="{{ route('agregar') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <!-- Campo de Nombre -->
            <div>
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" name="nombre" value="{{ old('nombre') }}"
                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('nombre')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Campo de Apellido -->
            <div>
                <label for="apellido" class="block text-sm font-medium text-gray-700">Apellido</label>
                <input type="text" name="apellido" value="{{ old('apellido') }}"
                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('apellido')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Campo de Correo -->
            <div>
                <label for="correo" class="block text-sm font-medium text-gray-700">Correo</label>
                <input type="email" name="correo" value="{{ old('correo') }}"
                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('correo')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Campo de Contraseña -->
            <div class="relative">
                <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                <input type="password" name="password" id="password"
                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                <!-- Icono de ojo para mostrar/ocultar contraseña -->
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-700">
                    <svg onclick="togglePasswordVisibility()" class="w-6 h-6 cursor-pointer" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0zM12 14l9-5-9-5-9 5 9 5z"></path>
                    </svg>
                </div>
                @error('password')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Campo de Foto -->
            <div>
                <label for="foto" class="block text-sm font-medium text-gray-700">Foto</label>
                <input type="file" name="foto" id="foto" accept="image/*"
                    class="mt-1 block w-full rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('foto')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Botón de Publicar -->
            <div>
                <button type="submit"
                    class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:bg-indigo-700">
                    Guardar cuenta
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function togglePasswordVisibility() {
        var passwordInput = document.getElementById("password");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    }
</script>

@endsection
