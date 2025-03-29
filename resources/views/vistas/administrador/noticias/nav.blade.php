@extends('plantillas.administrador.plantilla')

@section('title', 'Gestión de Noticias')

@section('submenu')
    <div class="max-w-3xl mx-auto py-4 px-4">
        <div class="space-y-2">
            @foreach ($noticias->reverse()->take(8) as $noticia)
                <!-- Tarjeta estilo WhatsApp -->
                <div class="flex items-center bg-white p-3 rounded-lg shadow hover:bg-gray-50 transition-colors duration-200">
                    <!-- Foto circular pequeña -->
                    <div class="w-12 h-12 rounded-full overflow-hidden flex-shrink-0 mr-3">
                        <img class="w-full h-full object-cover"
                             src="data:image/jpeg;base64,{{ $noticia->foto }}"
                             alt="{{ $noticia->titulo }}">
                    </div>

                    <!-- Contenido principal -->
                    <div class="flex-1 min-w-0">
                        <h3 class="font-medium text-gray-900 truncate">{{ $noticia->titulo }}</h3>
                        <p class="text-sm text-gray-500 truncate">{{ \Illuminate\Support\Str::limit($noticia->descripcion, 50, $end='...') }}</p>
                    </div>

                    <!-- Botones de acción -->
                    <div class="flex space-x-2 ml-3">
                        <button onclick="expandirFormulario({{ $noticia->id }})"
                                class="w-8 h-8 flex items-center justify-center bg-blue-100 text-blue-600 rounded-full hover:bg-blue-200 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </button>

                        <button onclick="confirmarEliminacion({{ $noticia->id }})"
                                class="w-8 h-8 flex items-center justify-center bg-red-100 text-red-600 rounded-full hover:bg-red-200 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Modal de Edición (se mantiene igual) -->
                <div id="formulario{{ $noticia->id }}" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4 bg-black/70 backdrop-blur-sm">
                    <div class="bg-white rounded-xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto transform transition-all" onclick="event.stopPropagation()">
                        <!-- Encabezado del modal -->
                        <div class="sticky top-0 bg-white p-4 sm:p-6 border-b flex justify-between items-center">
                            <h2 class="text-xl sm:text-2xl font-bold text-gray-800">Editar Noticia</h2>
                            <button onclick="cerrarFormulario({{ $noticia->id }})"
                                    class="text-gray-500 hover:text-gray-700 transition-colors p-1 rounded-full hover:bg-gray-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <!-- Formulario de edición -->
                        <form id="form{{ $noticia->id }}" action="{{ route('actualizar.noticia', ['id' => $noticia->id]) }}" method="POST" enctype="multipart/form-data" class="p-4 sm:p-6 space-y-4 sm:space-y-6">
                            @csrf
                            @method('PUT')

                            <!-- Sección adaptable -->
                            <div class="flex flex-col space-y-4 sm:space-y-0 sm:flex-row sm:space-x-6">
                                <!-- Columna izquierda - Campos de texto -->
                                <div class="flex-1 space-y-4 sm:space-y-6">
                                    <!-- Campo Título -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1 sm:mb-2">Título:</label>
                                        <input type="text" name="titulo" value="{{ $noticia->titulo }}"
                                               class="w-full px-3 py-2 sm:px-4 sm:py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 text-black">
                                    </div>


                                    <!-- Campo Descripción -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1 sm:mb-2">Descripción:</label>
                                        <textarea name="descripcion" rows="4"
                                                  class="w-full px-3 py-2 sm:px-4 sm:py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 min-h-[100px] sm:min-h-[150px] text-black">{{ $noticia->descripcion }}</textarea>
                                    </div>

                                </div>

                                <!-- Columna derecha - Imágenes (sección compacta) -->
                                <div class="flex-1 space-y-4 sm:space-y-6">
                                    <!-- Área de carga compacta -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1 sm:mb-2">Imagen:</label>

                                        <!-- Imagen Actual (pequeña) -->
                                        <div class="relative mb-3" style="max-width: 150px;">
                                            <img class="w-full h-auto rounded-lg border border-gray-300"
                                                 src="data:image/jpeg;base64,{{ $noticia->foto }}"
                                                 alt="Imagen actual">
                                            <div class="absolute -bottom-2 -right-2 bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">
                                                Actual
                                            </div>
                                        </div>

                                        <!-- Selector de archivo integrado con vista previa -->
                                        <div class="flex items-center space-x-3">
                                            <label class="cursor-pointer bg-gray-100 hover:bg-gray-200 text-gray-700 px-3 py-2 rounded-lg transition duration-200 flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                Cambiar
                                                <input type="file" name="foto" id="fotoInput{{ $noticia->id }}" accept="image/*" class="hidden" onchange="mostrarMiniatura(this, {{ $noticia->id }})">
                                            </label>

                                            <!-- Vista previa en miniatura -->
                                            <div id="previewThumbnail{{ $noticia->id }}" class="hidden relative" style="max-width: 80px;">
                                                <img id="imagenThumbnail{{ $noticia->id }}" class="w-full h-auto rounded-lg border border-blue-300">
                                                <div class="absolute -bottom-2 -right-2 bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">
                                                    Nueva
                                                </div>
                                            </div>
                                        </div>
                                        <p class="text-xs text-gray-500 mt-1">Formatos: JPEG, PNG (Max. 5MB)</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Botón de enviar -->
                            <div class="flex justify-end pt-4">
                                <button type="submit"
                                        class="px-4 py-2 sm:px-6 sm:py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow transition-all duration-300">
                                    Guardar Cambios
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <script>
                    // Función para mostrar miniatura
                    function mostrarMiniatura(input, id) {
                        const preview = document.getElementById(`previewThumbnail${id}`);
                        const thumbnail = document.getElementById(`imagenThumbnail${id}`);

                        if (input.files && input.files[0]) {
                            const reader = new FileReader();

                            reader.onload = function(e) {
                                thumbnail.src = e.target.result;
                                preview.classList.remove('hidden');
                            }

                            reader.readAsDataURL(input.files[0]);
                        } else {
                            preview.classList.add('hidden');
                        }
                    }

                    // Funciones para abrir/cerrar el modal
                    function expandirFormulario(id) {
                        const formulario = document.getElementById(`formulario${id}`);
                        formulario.classList.remove('hidden');
                        document.body.style.overflow = 'hidden';
                    }

                    function cerrarFormulario(id) {
                        const formulario = document.getElementById(`formulario${id}`);
                        formulario.classList.add('hidden');
                        document.body.style.overflow = 'auto';
                    }
                </script>
                <form id="eliminar-form{{ $noticia->id }}" action="{{ route('eliminar.noticia', ['id' => $noticia->id]) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            @endforeach

            <!-- Botón "Ver más" en blanco -->
            <div class="pt-6 text-center">
                <a href="{{ route('noticias.mostrar') }}"
                   class="inline-flex items-center px-4 py-2 text-white hover:text-gray-200 transition-colors duration-200 font-medium">
                    Ver más noticias
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Función para mostrar la imagen seleccionada en la vista previa
        function mostrarImagenSeleccionada(input, id) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var imagen = document.getElementById("imagen" + id);
                if(imagen) {
                    imagen.src = e.target.result;
                    imagen.classList.remove('hidden');
                }
            }
            if(input.files && input.files[0]) {
                reader.readAsDataURL(input.files[0]);
            }
        }

        // Función para mostrar el formulario de edición
        function expandirFormulario(id) {
            var formulario = document.getElementById("formulario" + id);
            formulario.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        // Función para cerrar el formulario de edición
        function cerrarFormulario(id) {
            var formulario = document.getElementById("formulario" + id);
            formulario.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Función para confirmar la eliminación de la noticia
        function confirmarEliminacion(id) {
            Swal.fire({
                title: '¿Eliminar noticia?',
                text: "Esta acción no se puede deshacer",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar',
                background: '#fff',
                backdrop: `
                rgba(0,0,0,0.4)
            `
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('eliminar-form' + id).submit();
                }
            })
        }
    </script>
@endsection
