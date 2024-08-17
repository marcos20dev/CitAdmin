@extends('plantillas.administrador.plantilla')

@section('title', 'Añadir Cuenta de Administrador')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="max-w-md w-full bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-4">Añadir Cuenta de Administrador</h2>
        <form action="{{ route('soporte.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>
            <div class="mb-4">
                <label for="apellidos" class="block text-sm font-medium text-gray-700">Apellidos:</label>
                <input type="text" name="apellidos" id="apellidos" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>
            <div class="mb-4">
                <label for="dni" class="block text-sm font-medium text-gray-700">DNI:</label>
                <input type="text" name="dni" id="dni" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>
            <div class="mb-4">
                <label for="cargo" class="block text-sm font-medium text-gray-700">Cargo:</label>
                <input type="text" name="cargo" id="cargo" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>
            <div class="mb-4">
                <label for="usuario" class="block text-sm font-medium text-gray-700">Usuario:</label>
                <input type="text" name="usuario" id="usuario" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Contraseña:</label>
                <input type="password" name="password" id="password" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>
            <div class="mb-4">
                <label for="foto_perfil" class="block text-sm font-medium text-gray-700">Foto de perfil:</label>
                <input type="file" name="foto_perfil" id="foto_perfil" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md text-sm text-gray-700">
            </div>
            <div class="flex items-center justify-end">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700">Guardar</button>
            </div>
        </form>
    </div>
</div>
@endsection
