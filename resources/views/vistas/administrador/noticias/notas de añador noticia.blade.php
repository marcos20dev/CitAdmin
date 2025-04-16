@extends('plantillas.administrador.plantilla')

@section('title', 'Añadir Noticias')

@section('menu')
    @include('vistas.administrador.menu')
@endsection

@section('submenu')
    @include('vistas.administrador.noticias.nav')
@endsection

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Encabezado mejorado -->
        <div class="mb-10 text-center">
            <h1 class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-red-400 to-purple-500 mb-3">
                Crear Nueva Noticia
            </h1>
            <p class="text-lg text-gray-400 max-w-2xl mx-auto">
                Completa todos los campos para publicar una noticia impactante en el portal institucional
            </p>
        </div>

        <!-- Formulario con diseño oscuro premium -->
        <form id="noticiaForm" action="{{ route('agregar') }}" method="POST" enctype="multipart/form-data"
              class="space-y-8 bg-gray-900/80 backdrop-blur-sm p-8 relative overflow-hidden transition-all duration-500 hover:shadow-purple-500/10">
            <!-- Efecto de borde animado -->
            <div class="absolute inset-0 border-t-2 border-b-2 border-transparent group-hover:border-t-red-500 group-hover:border-b-purple-500 transition-all duration-1000"></div>
            <div class="absolute inset-0 border-l-2 border-r-2 border-transparent group-hover:border-l-red-500 group-hover:border-r-purple-500 transition-all duration-1000 delay-200"></div>
            @csrf

            <!-- Sección de información básica -->
            <div class="bg-gray-700/50 p-2 rounded-xl">
                <h2 class="text-xl font-bold text-gray-300 mb-6 flex items-center">
                        <span class="flex items-center justify-center w-10 h-10 bg-gradient-to-br from-red-900/50 to-purple-900/30 text-red-400 rounded-lg mr-3 border border-red-800/30">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </span>
                    Información Básica
                </h2>

                <!-- Campo Título mejorado -->
                <div class="space-y-4">
                    <label class="block text-gray-300 font-medium text-lg">
                        Título de la Noticia
                        <span class="text-sm text-gray-500 ml-2">(Máximo 120 caracteres)</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5h10M11 9h7m-7 4h4m-4 4h1" />
                            </svg>
                        </div>
                        <input type="text" name="titulo" value="{{ old('titulo') }}" maxlength="120"
                               class="w-full pl-12 pr-6 py-4 text-lg rounded-lg bg-gray-700/50 border border-gray-600 text-black
               focus:outline-none focus:ring-2 focus:ring-purple-500/30 focus:border-red-400
               transition-all duration-300 placeholder-gray-500 hover:border-gray-500
               shadow-sm"
                               placeholder="Ej: 'Nuevo programa de becas 2024'">
                        <div class="absolute right-4 top-4 text-sm text-gray-400 font-medium">
                            <span id="charCount">0</span>/120
                        </div>
                    </div>
                    @error('titulo')
                    <div class="flex items-center mt-2 text-red-400 font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <!-- Sección de contenido -->
            <div class="bg-gray-800/50 p-6 rounded-xl">
                <h2 class="text-xl font-bold text-gray-300 mb-6 flex items-center">
                        <span class="flex items-center justify-center w-10 h-10 bg-gradient-to-br from-red-900/50 to-purple-900/30 text-purple-400 rounded-lg mr-3 border border-purple-800/30">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                            </svg>
                        </span>
                    Contenido Completo
                </h2>

                <!-- Campo Descripción mejorado -->
                <div class="space-y-4">
                    <div class="flex justify-between items-center">
                        <label class="block text-gray-300 font-medium text-lg">
                            Desarrollo de la Noticia
                        </label>
                        <span class="text-sm text-gray-500">Escribe al menos 300 palabras</span>
                    </div>
                    <div class="relative">
                            <textarea name="descripcion" id="descripcion"
                                      class="w-full px-6 py-4 rounded-lg bg-gray-700/50 border border-gray-600 text-gray-100
                                       focus:outline-none focus:ring-2 focus:ring-purple-500/30 focus:border-red-400
                                       min-h-[300px] transition-all duration-300 placeholder-gray-500 hover:border-gray-500
                                       shadow-sm"
                                      placeholder="Desarrolla aquí el contenido detallado...">{{ old('descripcion') }}</textarea>
                        <div class="absolute right-4 bottom-4 text-sm text-gray-400 font-medium">
                            <span id="wordCount">0</span> palabras
                        </div>
                    </div>
                    @error('descripcion')
                    <div class="flex items-center mt-2 text-red-400 font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <!-- Sección de multimedia -->
            <div class="bg-gray-800/50 p-6 rounded-xl">
                <h2 class="text-xl font-bold text-gray-300 mb-6 flex items-center">
                        <span class="flex items-center justify-center w-10 h-10 bg-gradient-to-br from-red-900/50 to-purple-900/30 text-red-400 rounded-lg mr-3 border border-red-800/30">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </span>
                    Multimedia
                </h2>

                <!-- Selector de Imagen mejorado -->
                <div class="space-y-4">
                    <label class="block text-gray-300 font-medium text-lg">
                        Imagen Destacada
                        <span class="text-sm text-gray-500 ml-2">(Requerido)</span>
                    </label>

                    <div class="relative group" id="dropZone">
                        <label for="foto" class="flex flex-col items-center justify-center w-full h-80
                                border-2 border-dashed border-gray-600 rounded-xl cursor-pointer
                                bg-gray-700/30 hover:bg-gray-700/50 transition-all duration-500
                                group-hover:border-red-400 group-hover:shadow-lg group-hover:shadow-red-500/10">
                            <div class="flex flex-col items-center justify-center pt-8 pb-10 px-6 text-center">
                                <svg class="w-16 h-16 mb-5 text-gray-500 group-hover:text-red-400 transition-all duration-500"
                                     fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                          d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                </svg>
                                <p class="mb-3 text-lg text-gray-400 group-hover:text-gray-300 font-medium">
                                    <span class="text-red-400 font-semibold">Haz clic para subir</span> o arrastra tu imagen aquí
                                </p>
                                <p class="text-sm text-gray-500">
                                    Formatos: JPEG, PNG, WEBP (Max. 15MB)<br>
                                    Dimensión recomendada: 1200×630px
                                </p>
                            </div>
                            <input id="foto" type="file" name="foto" class="hidden" onchange="previewImage(event)" accept="image/jpeg, image/png, image/webp">
                        </label>
                        <div class="absolute -bottom-3 -right-3">
                            <div class="bg-gradient-to-r from-red-600 to-purple-600 text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-lg transform group-hover:scale-105 transition-all duration-300">
                                Requerido
                            </div>
                        </div>
                    </div>
                    @error('foto')
                    <div class="flex items-center mt-2 text-red-400 font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                        {{ $message }}
                    </div>
                    @enderror

                    <!-- Vista previa de la imagen mejorada -->
                    <div id="preview" class="mt-8 transition-all duration-500">
                        <div id="emptyPreview" class="text-center py-12 px-8 rounded-xl bg-gray-700/30 border-2 border-dashed border-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-500 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <p class="text-gray-400 font-medium text-lg mb-1">Vista previa de la imagen</p>
                            <p class="text-gray-500 text-sm">Tu imagen aparecerá aquí con calidad profesional</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Botones de acción -->
            <div class="flex flex-col sm:flex-row justify-between gap-4 pt-6">
                <button type="button" onclick="window.location.href='{{ route('noticias') }}'"
                        class="flex-1 bg-transparent text-gray-300 font-bold py-4 px-8 rounded-xl border border-gray-600 hover:border-gray-400 hover:text-gray-100 transition-all duration-300 flex items-center justify-center space-x-3 text-lg shadow-sm hover:shadow-gray-500/10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    <span>Cancelar</span>
                </button>

                <button type="submit"
                        class="flex-1 bg-gradient-to-r from-red-600 to-purple-600 text-white font-bold
                               py-4 px-8 rounded-xl hover:from-red-500 hover:to-purple-500 transition-all
                               duration-300 shadow-lg hover:shadow-xl hover:shadow-red-500/20
                               flex items-center justify-center space-x-3 text-lg
                               transform hover:-translate-y-1 active:translate-y-0.5
                               border border-transparent hover:border-red-400/30
                               relative overflow-hidden group">
                    <span class="absolute inset-0 bg-gradient-to-r from-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 relative z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span class="relative z-10">PUBLICAR NOTICIA</span>
                </button>
            </div>
        </form>
    </div>

    <!-- Scripts mejorados -->
    <script src="https://cdn.ckeditor.com/4.17.1/full/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Configuración dark premium de CKEditor
        CKEDITOR.replace('descripcion', {
            toolbar: [
                { name: 'document', items: ['Source', '-', 'Templates'] },
                { name: 'clipboard', items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo'] },
                { name: 'editing', items: ['Find', 'Replace', '-', 'SelectAll', '-', 'Scayt'] },
                '/',
                { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat'] },
                { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'] },
                { name: 'links', items: ['Link', 'Unlink', 'Anchor'] },
                { name: 'insert', items: ['Image', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'Iframe'] },
                '/',
                { name: 'styles', items: ['Styles', 'Format'] },
                { name: 'colors', items: ['TextColor', 'BGColor'] },
                { name: 'tools', items: ['Maximize', 'ShowBlocks'] }
            ],
            height: 350,
            contentsCss: 'body { color: #f3f4f6; font-family: "Inter", sans-serif; line-height: 1.6; font-size: 16px; background-color: #1f2937; }',
            bodyClass: 'bg-gray-800',
            uiColor: 'rgba(255,255,255,0.17)',
            removeDialogTabs: 'image:advanced;link:advanced',
            extraPlugins: 'font,colorbutton,colordialog',
            filebrowserUploadMethod: 'form'
        });

        // Contador de caracteres para el título
        document.querySelector('input[name="titulo"]').addEventListener('input', function() {
            document.getElementById('charCount').textContent = this.value.length;
        });

        // Contador de palabras para el contenido
        CKEDITOR.instances.descripcion.on('change', function() {
            const text = CKEDITOR.instances.descripcion.getData().replace(/<[^>]*>/g, ' ').trim();
            const wordCount = text ? text.split(/\s+/).length : 0;
            document.getElementById('wordCount').textContent = wordCount;

            // Cambiar color según cantidad de palabras
            const wordCountElement = document.getElementById('wordCount');
            if(wordCount < 100) {
                wordCountElement.classList.add('text-red-400');
                wordCountElement.classList.remove('text-yellow-400', 'text-green-400');
            } else if(wordCount < 300) {
                wordCountElement.classList.add('text-yellow-400');
                wordCountElement.classList.remove('text-red-400', 'text-green-400');
            } else {
                wordCountElement.classList.add('text-green-400');
                wordCountElement.classList.remove('text-red-400', 'text-yellow-400');
            }
        });

        // Drag and drop mejorado
        const dropZone = document.getElementById('dropZone');
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            dropZone.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, unhighlight, false);
        });

        function highlight() {
            dropZone.classList.add('border-red-400', 'bg-gray-700/50');
            dropZone.classList.remove('border-gray-600');
        }

        function unhighlight() {
            dropZone.classList.remove('border-red-400', 'bg-gray-700/50');
            dropZone.classList.add('border-gray-600');
        }

        dropZone.addEventListener('drop', handleDrop, false);

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            if (files.length) {
                document.getElementById('foto').files = files;
                previewImage({ target: document.getElementById('foto') });
            }
        }

        // Vista previa de imagen mejorada
        function previewImage(event) {
            const preview = document.getElementById('preview');
            const emptyPreview = document.getElementById('emptyPreview');
            const file = event.target.files[0];
            const maxSize = 15 * 1024 * 1024; // 15MB

            if (file) {
                if (file.size > maxSize) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Archivo demasiado grande',
                        text: 'La imagen no debe exceder los 15MB',
                        confirmButtonColor: '#EF4444',
                        background: '#1f2937',
                        color: '#f3f4f6',
                        customClass: {
                            popup: 'rounded-xl border border-gray-700'
                        }
                    });
                    event.target.value = '';
                    return;
                }

                if (!file.type.match('image.*')) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Formato no soportado',
                        text: 'Por favor sube una imagen (JPEG, PNG, WEBP)',
                        confirmButtonColor: '#EF4444',
                        background: '#1f2937',
                        color: '#f3f4f6',
                        customClass: {
                            popup: 'rounded-xl border border-gray-700'
                        }
                    });
                    event.target.value = '';
                    return;
                }

                const reader = new FileReader();
                reader.onloadend = function() {
                    emptyPreview.style.display = 'none';
                    preview.innerHTML = `
                        <div class="relative group w-full overflow-hidden rounded-xl shadow-xl border border-gray-700 transition-all duration-500 hover:shadow-red-500/10">
                            <div class="aspect-w-16 aspect-h-9 bg-gray-900">
                                <img src="${reader.result}"
                                     class="w-full h-full object-cover object-center transition-transform duration-700 group-hover:scale-105">
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col justify-between p-6">
                                <div class="flex justify-end">
                                    <button type="button" onclick="removeImage()"
                                            class="bg-gray-800/90 hover:bg-gray-700 text-gray-100 font-medium py-2 px-4 rounded-lg flex items-center transition-all duration-300 transform translate-y-4 group-hover:translate-y-0 shadow-lg border border-gray-700 hover:border-red-400/50">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        Cambiar Imagen
                                    </button>
                                </div>
                                <div class="bg-gray-800/90 rounded-lg p-4 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500 border border-gray-700">
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <p class="font-bold text-gray-100 truncate">${file.name}</p>
                                            <p class="text-sm text-gray-400">${(file.size / (1024*1024)).toFixed(2)} MB • ${file.type.replace('image/', '').toUpperCase()}</p>
                                        </div>
                                        <span class="bg-gradient-to-r from-red-600 to-purple-600 text-white text-xs font-bold px-3 py-1 rounded-full">Previsualización</span>
                                    </div>
                                </div>
                            </div>
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

        // Validación mejorada del formulario
        document.getElementById('noticiaForm').addEventListener('submit', function(event) {
            const titulo = document.querySelector('input[name="titulo"]').value.trim();
            const descripcion = CKEDITOR.instances.descripcion.getData().trim();
            const foto = document.querySelector('input[name="foto"]').value;

            let errors = [];

            if (!titulo) errors.push('Título de la noticia');
            if (!descripcion || descripcion === '<p>&nbsp;</p>') errors.push('Contenido de la noticia');
            if (!foto) errors.push('Imagen destacada');

            if (errors.length > 0) {
                event.preventDefault();

                Swal.fire({
                    icon: 'error',
                    title: 'Información incompleta',
                    html: `
                        <div class="text-left">
                            <p class="mb-4 text-gray-300 font-medium">Por favor completa los siguientes campos requeridos:</p>
                            <ul class="space-y-3">
                                ${errors.map(error => `
                                    <li class="flex items-center text-red-400 font-medium">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                        </svg>
                                        ${error}
                                    </li>
                                `).join('')}
                            </ul>
                        </div>
                    `,
                    background: '#1f2937',
                    color: '#f3f4f6',
                    confirmButtonColor: '#EF4444',
                    confirmButtonText: 'Entendido',
                    customClass: {
                        popup: 'rounded-xl border border-gray-700 shadow-2xl'
                    }
                });
            }
        });
    </script>
@endsection
