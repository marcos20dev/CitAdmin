@extends('plantillas.administrador.plantilla')

@section('title', 'Añadir Noticias')

@section('menu')
    @include('vistas.administrador.menu')
@endsection

@section('submenu')
    @include('vistas.administrador.noticias.nav')
@endsection

@section('content')
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white/95 backdrop-blur-xl rounded-2xl shadow-2xl overflow-hidden border border-gray-100/50">
            <!-- Header con efecto de vidrio -->
            <div class="bg-gradient-to-r from-indigo-600 to-purple-600 p-6 border-b border-white/10 relative overflow-hidden">
                <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiPjxkZWZzPjxwYXR0ZXJuIGlkPSJwYXR0ZXJuIiB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHBhdHRlcm5Vbml0cz0idXNlclNwYWNlT25Vc2UiIHBhdHRlcm5UcmFuc2Zvcm09InJvdGF0ZSg0NSkiPjxyZWN0IHdpZHRoPSIyMCIgaGVpZ2h0PSIyMCIgZmlsbD0icmdiYSgyNTUsMjU1LDI1NSwwLjA1KSIvPjwvcGF0dGVybj48L2RlZnM+PHJlY3QgZmlsbD0idXJsKCNwYXR0ZXJuKSIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIvPjwvc3ZnPg==')] opacity-20"></div>
                <h1 class="text-2xl font-bold text-white relative z-10 flex items-center">
                    <i class="fas fa-newspaper mr-3 text-white/90"></i>
                    Crear Nueva Noticia
                </h1>
                <p class="text-white/80 mt-1 text-sm relative z-10">Completa el formulario para publicar una nueva noticia</p>
            </div>

            <!-- Formulario -->
            <div class="p-6 md:p-8">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Columna izquierda - Contenido principal -->
                    <div class="lg:col-span-2 space-y-6">
                        <!-- Título -->
                        <div class="group relative">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Título de la Noticia</label>
                            <div class="relative">
                                <input type="text"
                                       class="w-full px-4 py-3 rounded-xl border border-gray-200/80 bg-white/90 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 transition-all duration-300 outline-none shadow-sm text-gray-800 placeholder-gray-400/70"
                                       placeholder="Ej: Nuevo avance en tecnología médica">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400 group-focus-within:text-indigo-500 transition-colors">
                                    <i class="fas fa-heading"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Resumen -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Resumen</label>
                            <textarea
                                class="w-full px-4 py-3 rounded-xl border border-gray-200/80 bg-white/90 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 transition-all duration-300 outline-none shadow-sm text-gray-800 placeholder-gray-400/70 min-h-[120px]"
                                placeholder="Breve descripción que aparecerá en la lista de noticias"></textarea>
                        </div>

                        <!-- Contenido -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Contenido Completo</label>
                            <div class="border border-gray-200/80 rounded-xl overflow-hidden shadow-sm bg-white/90 transition-all duration-300 focus-within:border-indigo-400 focus-within:ring-2 focus-within:ring-indigo-100">
                                <!-- Barra de herramientas simulada -->
                                <div class="border-b border-gray-100 bg-gray-50 p-2 flex flex-wrap gap-1">
                                    <button type="button" class="w-8 h-8 flex items-center justify-center rounded hover:bg-gray-100 text-gray-600 hover:text-gray-900">
                                        <i class="fas fa-bold"></i>
                                    </button>
                                    <button type="button" class="w-8 h-8 flex items-center justify-center rounded hover:bg-gray-100 text-gray-600 hover:text-gray-900">
                                        <i class="fas fa-italic"></i>
                                    </button>
                                    <button type="button" class="w-8 h-8 flex items-center justify-center rounded hover:bg-gray-100 text-gray-600 hover:text-gray-900">
                                        <i class="fas fa-underline"></i>
                                    </button>
                                    <div class="w-px h-8 bg-gray-200 mx-1"></div>
                                    <button type="button" class="w-8 h-8 flex items-center justify-center rounded hover:bg-gray-100 text-gray-600 hover:text-gray-900">
                                        <i class="fas fa-list-ul"></i>
                                    </button>
                                    <button type="button" class="w-8 h-8 flex items-center justify-center rounded hover:bg-gray-100 text-gray-600 hover:text-gray-900">
                                        <i class="fas fa-list-ol"></i>
                                    </button>
                                    <div class="w-px h-8 bg-gray-200 mx-1"></div>
                                    <button type="button" class="w-8 h-8 flex items-center justify-center rounded hover:bg-gray-100 text-gray-600 hover:text-gray-900">
                                        <i class="fas fa-link"></i>
                                    </button>
                                    <button type="button" class="w-8 h-8 flex items-center justify-center rounded hover:bg-gray-100 text-gray-600 hover:text-gray-900">
                                        <i class="fas fa-image"></i>
                                    </button>
                                </div>
                                <!-- Área de texto -->
                                <textarea
                                    class="w-full px-4 py-3 outline-none text-gray-800 placeholder-gray-400/70 min-h-[200px] resize-none bg-transparent"
                                    placeholder="Escribe aquí el contenido completo de la noticia..."></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Columna derecha - Metadatos -->
                    <div class="space-y-6">
                        <!-- Imagen destacada -->
                        <div class="border-2 border-dashed border-gray-200/70 rounded-2xl p-4 bg-gray-50/50 hover:bg-gray-50 transition-colors duration-300 group">
                            <div class="flex flex-col items-center justify-center text-center py-6">
                                <div class="w-16 h-16 mb-3 rounded-full bg-indigo-50 flex items-center justify-center text-indigo-500 group-hover:text-indigo-600 transition-colors">
                                    <i class="fas fa-camera-retro text-2xl"></i>
                                </div>
                                <h3 class="text-sm font-medium text-gray-700">Imagen Destacada</h3>
                                <p class="text-xs text-gray-500 mt-1">Arrastra una imagen o haz clic para seleccionar</p>
                                <button type="button" class="mt-3 px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all">
                                    Seleccionar Imagen
                                </button>
                            </div>
                        </div>

                        <!-- Categorías -->
                        <div class="bg-white/90 border border-gray-200/80 rounded-xl p-5 shadow-sm">
                            <label class="block text-sm font-medium text-gray-700 mb-3">Categorías</label>
                            <div class="space-y-2">
                                <div class="flex items-center">
                                    <input id="cat-medicina" name="categories" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                    <label for="cat-medicina" class="ml-3 block text-sm text-gray-700">Medicina</label>
                                </div>
                                <div class="flex items-center">
                                    <input id="cat-tecnologia" name="categories" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                    <label for="cat-tecnologia" class="ml-3 block text-sm text-gray-700">Tecnología</label>
                                </div>
                                <div class="flex items-center">
                                    <input id="cat-investigacion" name="categories" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                    <label for="cat-investigacion" class="ml-3 block text-sm text-gray-700">Investigación</label>
                                </div>
                                <div class="flex items-center">
                                    <input id="cat-eventos" name="categories" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                    <label for="cat-eventos" class="ml-3 block text-sm text-gray-700">Eventos</label>
                                </div>
                            </div>
                        </div>

                        <!-- Fecha de publicación -->
                        <div class="bg-white/90 border border-gray-200/80 rounded-xl p-5 shadow-sm">
                            <label class="block text-sm font-medium text-gray-700 mb-3">Fecha de Publicación</label>
                            <div class="relative">
                                <input type="date"
                                       class="w-full px-4 py-2.5 rounded-lg border border-gray-200/80 bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 transition-all duration-300 outline-none shadow-sm text-gray-800">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400">
                                    <i class="far fa-calendar-alt"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Estado -->
                        <div class="bg-white/90 border border-gray-200/80 rounded-xl p-5 shadow-sm">
                            <label class="block text-sm font-medium text-gray-700 mb-3">Estado</label>
                            <div class="grid grid-cols-2 gap-2">
                                <div class="relative">
                                    <input id="status-published" name="status" type="radio" class="sr-only peer" checked>
                                    <label for="status-published" class="flex items-center justify-center px-3 py-2 border border-gray-200 rounded-lg cursor-pointer peer-checked:border-indigo-500 peer-checked:bg-indigo-50 peer-checked:text-indigo-700 hover:bg-gray-50 transition-colors">
                                        <span class="text-sm font-medium">Publicado</span>
                                    </label>
                                </div>
                                <div class="relative">
                                    <input id="status-draft" name="status" type="radio" class="sr-only peer">
                                    <label for="status-draft" class="flex items-center justify-center px-3 py-2 border border-gray-200 rounded-lg cursor-pointer peer-checked:border-indigo-500 peer-checked:bg-indigo-50 peer-checked:text-indigo-700 hover:bg-gray-50 transition-colors">
                                        <span class="text-sm font-medium">Borrador</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Botones de acción -->
                <div class="mt-8 pt-6 border-t border-gray-100 flex flex-col sm:flex-row justify-end gap-3">
                    <button type="button" class="px-6 py-3 rounded-xl border border-gray-300 bg-white text-gray-700 font-medium shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-300">
                        Cancelar
                    </button>
                    <button type="button" class="px-6 py-3 rounded-xl border border-transparent bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-medium shadow-lg hover:shadow-indigo-500/30 hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-300 flex items-center justify-center">
                        <i class="fas fa-save mr-2"></i>
                        Guardar Noticia
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de éxito (oculto por defecto) -->
    <div id="success-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50 opacity-0 pointer-events-none transition-opacity duration-300">
        <div class="bg-white rounded-2xl overflow-hidden shadow-xl transform transition-all duration-500 scale-95 max-w-md w-full">
            <div class="bg-gradient-to-r from-emerald-500 to-teal-600 p-5 text-white">
                <div class="flex items-center">
                    <div class="flex-shrink-0 h-10 w-10 flex items-center justify-center rounded-full bg-white/20">
                        <i class="fas fa-check"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-medium">¡Noticia guardada!</h3>
                        <p class="mt-1 text-sm opacity-90">La noticia se ha guardado correctamente.</p>
                    </div>
                </div>
            </div>
            <div class="p-6">
                <div class="flex justify-end">
                    <button type="button" onclick="document.getElementById('success-modal').classList.add('opacity-0', 'pointer-events-none')" class="px-4 py-2 bg-emerald-600 text-white text-sm font-medium rounded-lg hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition-colors">
                        Aceptar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Simulación de envío exitoso del formulario
        document.querySelector('button[type="button"]:last-child').addEventListener('click', function() {
            const modal = document.getElementById('success-modal');
            modal.classList.remove('opacity-0', 'pointer-events-none');
            modal.classList.add('opacity-100');

            // Ocultar después de 3 segundos
            setTimeout(() => {
                modal.classList.add('opacity-0', 'pointer-events-none');
            }, 3000);
        });
    </script>
@endsection
