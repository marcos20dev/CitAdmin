@extends('plantillas.administrador.plantilla')

@section('title', 'Añadir Noticias')

@section('menu')
    @include('vistas.administrador.menu')
@endsection

@section('submenu')
    @include('vistas.administrador.noticias.nav')
@endsection

@section('content')
    <div class="flex justify-center min-h-screen py-8">
        <div class="w-full max-w-4xl px-4">
            <!-- Encabezado con efecto de gradiente -->
            <div class="mb-8 text-center">
                <h1 class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-red-300 mb-2">
                    Ingresar Noticias
                </h1>
                <p class="text-gray-400">Complete todos los campos para publicar una nueva noticia</p>
            </div>

            <!-- Formulario con diseño moderno -->
            <form id="noticiaForm" action="{{ route('agregar') }}" method="POST" enctype="multipart/form-data"
                  class="space-y-6 bg-gray-800 rounded-xl shadow-2xl p-6 border border-gray-700">
                @csrf

                <!-- Campo Título -->
                <div class="space-y-2">
                    <label class="block text-gray-300 font-medium">Título de la Noticia</label>
                    <input type="text" name="titulo" value="{{ old('titulo') }}"
                           class="w-full px-4 py-3 rounded-lg bg-gray-700 border border-gray-600 text-white
                               focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent
                               transition duration-300 placeholder-gray-500"
                           placeholder="Escribe el título aquí...">
                    @error('titulo')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Campo Descripción -->
                <div class="space-y-2">
                    <label class="block text-gray-300 font-medium">Descripción</label>
                    <textarea name="descripcion" id="descripcion"
                              class="w-full px-4 py-3 rounded-lg bg-gray-700 border border-gray-600 text-white
                               focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent
                               min-h-[200px] transition duration-300 placeholder-gray-500"
                              placeholder="Escribe la descripción completa aquí...">{{ old('descripcion') }}</textarea>
                    @error('descripcion')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Selector de Imagen con mejor diseño -->
                <div class="space-y-2">
                    <label class="block text-gray-300 font-medium">Imagen de la Noticia</label>
                    <div class="relative group">
                        <label for="foto" class="flex flex-col items-center justify-center w-full h-64
                            border-2 border-dashed border-gray-600 rounded-lg cursor-pointer
                            bg-gray-700 hover:bg-gray-700/50 transition duration-300
                            group-hover:border-red-400">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-10 h-10 mb-3 text-gray-400 group-hover:text-red-400 transition"
                                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <p class="mb-2 text-sm text-gray-400 group-hover:text-gray-300">
                                    <span class="font-semibold">Haz clic para subir</span> o arrastra una imagen
                                </p>
                                <p class="text-xs text-gray-500">Formatos: JPG, PNG, GIF (Max. 5MB)</p>
                            </div>
                            <input id="foto" type="file" name="foto" class="hidden" onchange="previewImage(event)" accept="image/*">
                        </label>
                    </div>
                    @error('foto')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror

                    <!-- Vista previa de la imagen -->
                    <div id="preview" class="mt-4 flex justify-center">
                        <div id="emptyPreview" class="text-gray-500 text-sm italic">
                            No se ha seleccionado ninguna imagen
                        </div>
                    </div>
                </div>

                <!-- Botón de enviar -->
                <div class="pt-4">
                    <button type="submit"
                            class="w-full bg-gradient-to-r from-red-600 to-red-500 text-white font-bold
                               py-3 px-6 rounded-lg hover:from-red-500 hover:to-red-400 transition
                               duration-300 shadow-lg hover:shadow-red-500/30
                               flex items-center justify-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                        </svg>
                        <span>Publicar Noticia</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/4.17.1/full/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Configuración de CKEditor
        CKEDITOR.replace('descripcion', {
            toolbar: [
                { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike'] },
                { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Blockquote'] },
                { name: 'links', items: ['Link', 'Unlink'] },
                { name: 'insert', items: ['Image', 'Table'] },
                { name: 'tools', items: ['Maximize'] },
                { name: 'styles', items: ['Styles', 'Format', 'Font', 'FontSize'] },
                { name: 'colors', items: ['TextColor', 'BGColor'] }
            ],
            removePlugins: 'resize',
            height: 300,
            contentsCss: 'body { color: #e5e7eb; background-color: #1f2937; }',
            bodyClass: 'bg-gray-800',
            uiColor: '#1f2937',
            removeDialogTabs: 'image:advanced;link:advanced'
        });

        // Vista previa de la imagen
        function previewImage(event) {
            const preview = document.getElementById('preview');
            const emptyPreview = document.getElementById('emptyPreview');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onloadend = function() {
                    emptyPreview.style.display = 'none';
                    preview.innerHTML = `
                        <div class="relative group">
                            <img src="${reader.result}"
                                 class="max-h-80 rounded-lg border-2 border-gray-600 shadow-lg object-cover">
                            <button type="button" onclick="removeImage()"
                                    class="absolute top-2 right-2 bg-red-600 text-white rounded-full p-1 opacity-0
                                           group-hover:opacity-100 transition-opacity duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    `;
                }
                reader.readAsDataURL(file);
            }
        }

        function removeImage() {
            const preview = document.getElementById('preview');
            const fileInput = document.getElementById('foto');
            const emptyPreview = document.getElementById('emptyPreview');

            fileInput.value = '';
            preview.innerHTML = '';
            emptyPreview.style.display = 'block';
        }

        // Validación del formulario
        document.getElementById('noticiaForm').addEventListener('submit', function(event) {
            const titulo = document.querySelector('input[name="titulo"]').value.trim();
            const descripcion = CKEDITOR.instances.descripcion.getData().trim();
            const foto = document.querySelector('input[name="foto"]').value;

            if (!titulo || !descripcion || !foto) {
                event.preventDefault();

                Swal.fire({
                    icon: 'error',
                    title: 'Campos incompletos',
                    html: `
                        <div class="text-left">
                            <p class="mb-2">Por favor completa todos los campos requeridos:</p>
                            <ul class="list-disc pl-5 space-y-1">
                                ${!titulo ? '<li>Título de la noticia</li>' : ''}
                                ${!descripcion ? '<li>Descripción de la noticia</li>' : ''}
                                ${!foto ? '<li>Imagen de la noticia</li>' : ''}
                            </ul>
                        </div>
                    `,
                    confirmButtonColor: '#EF4444',
                    confirmButtonText: 'Entendido'
                });
            }
        });
    </script>
@endsection
