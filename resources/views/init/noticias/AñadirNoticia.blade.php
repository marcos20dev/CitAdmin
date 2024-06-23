@extends('layouts.plantilla')

@section('title', 'Noticias ')

@section('menu')
    @include('menu.menu')
@endsection

@section('submenu')
    @include('init.noticias.nav')
@endsection

@section('content')
    <div class="flex"> <!-- Contenedor principal con flexbox -->
        <div class="max-w-2xl mx-auto py-8 px-4 flex-grow"> <!-- Primer div más grande -->
            <h1 class="text-3xl font-bold text-white mb-6">Ingresar Noticias</h1>
            <!-- Cambio de color del título a blanco -->

            <form action="{{ route('agregar') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf

                <div>
                    <label class="block">
                        <span class="text-white">Título:</span> <!-- Cambio de color del texto del título a blanco -->
                        <input type="text" name="titulo" value="{{ old('titulo') }}"
                            class="mt-1 block w-full rounded-md border-red-500 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <!-- Cambio de color del borde a rojo -->
                    </label>
                    @error('titulo')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block">
                        <span class="text-white">Descripción:</span> <!-- Cambio de color del texto del título a blanco -->
                        <textarea name="descripcion" id="descripcion"
                            class="mt-1 block w-full rounded-md border-red-500 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 resize-none">{{ old('descripcion') }}</textarea> <!-- Cambio de color del borde a rojo -->
                    </label>
                    @error('descripcion')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>

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

                <div>
                    <button type="submit"
                        class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500">Publicar</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/4.17.1/full/ckeditor.js"></script>
    <script>
        // Iniciar CKEditor en el textarea de descripción
        CKEDITOR.replace('descripcion');

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