@extends('plantillas.soporte.menu')

@section('title', 'Añadir Cuenta de Administrador')

@section('menu')
    @include('vistas.soporte.menu_soporte')
@endsection

@section('soprote')
<div class="container mx-auto px-0 sm:px-8 max-w-lg"> <!-- Ajuste el ancho máximo a 'lg' para más espacio en los lados -->
    <div class="py-8">

        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-4">Añadir Cuenta de Administrador</h2>

        <!-- Alertas de Bootstrap para éxito o error -->
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <form id="adminForm" action="{{ route('soporte.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4"> <!-- Mantengo el espacio vertical entre campos -->
            @csrf
            <!-- Campos del formulario -->
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

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

@section('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: '¡Registro Completado!',
            text: '{{ session('success') }}',
            confirmButtonText: 'Entendido'
        });
    @endif

    @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Error al Registrar',
            text: '{{ session('error') }}',
            confirmButtonText: 'Entendido'
        });
    @endif
});

document.getElementById('adminForm').addEventListener('submit', function(event) {
    var dni = document.getElementById('dni').value;
    var password = document.getElementById('password').value;
    if (!/^\d{8}$/.test(dni) || !/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/.test(password)) {
        event.preventDefault();
        Swal.fire({
            icon: 'error',
            title: 'Errores en el Formulario',
            text: 'Asegúrate de llenar correctamente todos los campos requeridos.',
            confirmButtonText: 'Cerrar'
        });
    }
});
</script>
@endsection
