@extends('plantillas.administrador.plantilla')

@section('title', 'Añadir Noticias ')

@section('menu')
    @include('vistas.administrador.menu')
@endsection

@section('submenu')
    @include('vistas.administrador.noticias.nav')
@endsection



@section('content')

    <div class="flex"> <!-- Contenedor principal con flexbox -->
        <div class="max-w-4xl mx-auto py-8 px- flex-grow"> <!-- Aumento de ancho del primer div -->
            <h1 class="text-3xl font-bold text-white mb-6">Ingresar Noticias</h1>
            <!-- Cambio de color del título a blanco -->

            <form id="noticiaForm" action="{{ route('agregar') }}" method="POST" enctype="multipart/form-data"
                class="space-y-4">
                @csrf
                <div class="p-4 rounded-lg space-y-4" style="background-color: rgb(46, 49, 54);">

                    <div>
                        <label class="block">
                            <span class="text-white">Título:</span> <!-- Cambio de color del texto del título a blanco -->
                            <input type="text" name="titulo" value="{{ old('titulo') }}"
                                class="mt-1 block w-full rounded-md border-red-500 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2">

                        </label>
                        @error('titulo')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block">
                            <span class="text-white">Descripción:</span>

                            <textarea name="descripcion" id="descripcion"
                                class="mt-1 block w-full rounded-md border-2 border-red-500 
                                       shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 
                                       focus:ring-opacity-50 resize-none 
                                       px-3 py-2 placeholder-gray-400 text-gray-700 
                                       focus:outline-none focus:shadow-outline"
                                placeholder="Escribe aquí...">{{ old('descripcion') }}</textarea>
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

                </div>

            </form>

        </div>
    </div>


    <script src="https://cdn.ckeditor.com/4.17.1/full/ckeditor.js"></script>


    <script>
        CKEDITOR.replace('descripcion');
    </script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
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

        document.addEventListener('DOMContentLoaded', function() {
            const noticiaForm = document.getElementById('noticiaForm');

            noticiaForm.addEventListener('submit', function(event) {
                // Aquí puedes agregar más validaciones si es necesario antes de enviar el formulario

                // Ejemplo: Validar que el título, descripción y foto estén completos
                const titulo = document.querySelector('input[name="titulo"]').value;
                const descripcion = document.querySelector('textarea[name="descripcion"]').value;
                const foto = document.querySelector('input[name="foto"]').value;

                if (!titulo || !descripcion || !foto) {
                    event.preventDefault(); // Evita que el formulario se envíe

                    // Mostrar alerta de error con SweetAlert2
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Por favor completa todos los campos: Título, Descripción y Foto.',
                        confirmButtonText: 'OK'
                    });
                } else {
                    // Mostrar alerta de éxito después de que el formulario se envíe correctamente
                    Swal.fire({
                        icon: 'success',
                        title: '¡Noticia registrada!',
                        text: 'La noticia se ha registrado correctamente.',
                        confirmButtonText: 'OK'
                    });
                }
            });
        });
    </script>
@endsection
