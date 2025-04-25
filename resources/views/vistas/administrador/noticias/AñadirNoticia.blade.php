@extends('plantillas.administrador.plantilla')


@section('title', isset($noticiaEditar) ?
 'Editar Noticia' :
  'Gestión de Noticias - Dashboard Moderno')

@section('menu')
    @include('vistas.administrador.menu')
@endsection

@section('content')
    @if(session('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)"
             x-show="show"
             class="fixed top-5 right-5 bg-green-600 text-white px-6 py-3 rounded shadow-lg z-50 transition-all duration-300 ease-in-out"
             style="display: none;">
            {{ session('success') }}
        </div>
    @endif

    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-6 rounded-xl px-6 py-5 shadow-inner"
         style="background-color: rgb(55,64,80);">
        <div>
            <h1 class="text-4xl md:text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-purple-600 animate-gradient-x pb-2">
                @isset($noticiaEditar)
                    Editar Noticia: {{ $noticiaEditar->titulo }}
                @else
                    Gestión de Noticias
                @endisset
            </h1>
            <p class="text-gray-300 dark:text-gray-400 text-lg">
                @isset($noticiaEditar)
                    Modifica el contenido existente
                @else
                    Crea, edita y administra tu contenido
                @endisset
            </p>
        </div>
    </div>

    <!-- Estatísticas Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 mb-6" >
        @php
            $stats = [
                [
                    'icon' => 'fa-eye',
                    'title' => 'Total de visitas',
                    'value' => number_format($totalVisitas ?? 0),
                    'gradient' => 'from-blue-500 to-cyan-400',
                    'width' => '75%',
                    'shadow' => 'shadow-blue-500/30'
                ],
                [
                    'icon' => 'fa-newspaper',
                    'title' => 'Noticias publicadas',
                    'value' => number_format($totalNoticias ?? 0),
                    'gradient' => 'from-indigo-500 to-purple-500',
                    'width' => '65%',
                    'shadow' => 'shadow-indigo-500/30'
                ],
                [
                    'icon' => 'fa-eye-slash',
                    'title' => 'No Publicadas',
                    'value' => number_format($totalNoPublicadas ?? 0),
                    'gradient' => 'from-yellow-500 to-orange-400',
                    'width' => '30%',
                    'shadow' => 'shadow-yellow-500/30'
                ],
                [
                    'icon' => 'fa-comment-alt',
                    'title' => 'Comentarios',
                    'value' => number_format($totalComentarios ?? 0),
                    'gradient' => 'from-purple-500 to-pink-500',
                    'width' => '45%',
                    'shadow' => 'shadow-purple-500/30'
                ],
                [
                    'icon' => 'fa-share-alt',
                    'title' => 'Compartidas',
                    'value' => number_format($totalCompartidas ?? 0),
                    'gradient' => 'from-teal-500 to-emerald-500',
                    'width' => '35%',
                    'shadow' => 'shadow-teal-500/30'
                ],
            ];
        @endphp

        @foreach ($stats as $stat)
            <div class="p-4 rounded-xl bg-slate-800 shadow-md hover:shadow-lg transition-all duration-300 hover:scale-[1.02] {{ $stat['shadow'] }}" style="background-color: rgb(55,64,80);">
                <div class="flex items-center space-x-4 mb-3">
                    <div class="p-3 rounded-lg bg-gradient-to-br {{ $stat['gradient'] }} text-white shadow-inner">
                        <i class="fas {{ $stat['icon'] }} text-lg"></i>
                    </div>
                    <div>
                        <h3 class="text-xs font-semibold text-slate-400 uppercase tracking-wide">{{ $stat['title'] }}</h3>
                        <p class="text-xl font-bold text-white">{{ $stat['value'] }}</p>
                    </div>
                </div>
                <div class="w-full h-1 bg-slate-700 rounded-full overflow-hidden">
                    <div class="h-full bg-gradient-to-r {{ $stat['gradient'] }} rounded-full transition-all duration-500" style="width: {{ $stat['width'] }}"></div>
                </div>
            </div>
        @endforeach
    </div>


    <!-- Sección Principal -->
    <div class="grid grid-cols- xl:grid-cols-12 gap-5">

        <!-- Crear Nueva Noticia -->
        <div class="xl:col-span-8 space-y-8">
            <div
                class="rounded-3xl overflow-hidden transition-all duration-500 bg-gradient-to-br from-slate-900/50 to-slate-800/60 backdrop-blur-xl shadow-2xl hover:shadow-indigo-700/30 hover:-translate-y-1">
                <!-- Encabezado -->
                <div
                    class="relative py-3 border-b border-white/10 flex items-center gap-6 rounded-t-2xl backdrop-blur-lg overflow-hidden shadow-2xl transition-all duration-500 group {{ isset($noticiaEdit) ? 'shadow-red-900/20 hover:shadow-red-700/30' : 'shadow-purple-900/20 hover:shadow-violet-900/30' }}"
                    style="background-color: {{ isset($noticiaEdit) ? 'rgb(80,55,55)' : 'rgb(55,64,80)' }};">

                    @if(isset($noticiaEdit))
                        <!-- Luces flotantes edición -->
                        <div class="absolute -top-16 -left-16 w-32 h-32 rounded-full opacity-20"
                             style="background: radial-gradient(ellipse, #ef4444, transparent 70%); animation: float 12s ease-in-out infinite;"></div>
                        <div class="absolute bottom-8 right-12 w-28 h-28 rounded-full opacity-25"
                             style="background: radial-gradient(ellipse, #f87171, transparent 70%); animation: float 8s ease-in-out infinite reverse;"></div>
                        <div class="absolute top-1/4 left-1/3 w-20 h-20 rounded-full opacity-15"
                             style="background: radial-gradient(ellipse, #fecaca, transparent 70%); animation: float 6s ease-in-out infinite;"></div>
                    @else
                        <!-- Luces flotantes normales -->
                        <div class="absolute -top-16 -left-16 w-32 h-32 rounded-full opacity-20"
                             style="background: radial-gradient(ellipse, #8b5cf6, transparent 70%); animation: float 12s ease-in-out infinite;"></div>
                        <div class="absolute bottom-8 right-12 w-28 h-28 rounded-full opacity-25"
                             style="background: radial-gradient(ellipse, #ec4899, transparent 70%); animation: float 8s ease-in-out infinite reverse;"></div>
                        <div class="absolute top-1/4 left-1/3 w-20 h-20 rounded-full opacity-15"
                             style="background: radial-gradient(ellipse, #3b82f6, transparent 70%); animation: float 6s ease-in-out infinite;"></div>
                    @endif

                    <!-- Partículas -->
                    <div class="absolute inset-0 z-0 bg-[length:200px_200px]"
                         style="animation: particle-move 20s linear infinite; background: radial-gradient(1px 1px at 20% 30%, white 1%, transparent 100%), radial-gradient(1px 1px at 40% 70%, white 1%, transparent 100%), radial-gradient(1px 1px at 60% 20%, white 1%, transparent 100%), radial-gradient(1px 1px at 80% 50%, white 1%, transparent 100%), radial-gradient(1px 1px at 30% 80%, white 1%, transparent 100%);"></div>

                    <!-- Ícono -->
                    <div class="relative p-4 rounded-2xl text-white transition-all duration-500 transform group-hover:-translate-y-1 group-hover:rotate-[10deg] group-hover:scale-105 z-10 {{ isset($noticiaEdit) ? 'hover:shadow-red-900/60' : 'hover:shadow-fuchsia-900/60' }}">
                        <i class="fas fa-plus-circle text-3xl relative z-10 transition-all duration-700 group-hover:text-white"></i>
                    </div>

                    <!-- Contenido -->
                    <div class="relative z-10 space-y-2">
                        <h2 class="text-3xl font-extrabold bg-clip-text tracking-tight animate-[text-shimmer_3s_linear_infinite] bg-[length:200%_100%] text-transparent {{ isset($noticiaEdit) ? 'bg-gradient-to-r from-red-400 via-pink-500 to-red-600' : 'bg-gradient-to-r from-purple-400 via-indigo-500 to-purple-600' }}">
                            {{ isset($noticiaEdit) ? 'Actualizar Noticia' : 'Crear Nueva Noticia' }}
                        </h2>

                        <p class="text-sm font-medium text-white mt-1 flex items-center gap-2">
            <span class="inline-flex w-2.5 h-2.5 rounded-full animate-pulse shadow-[0_0_8px_{{ isset($noticiaEdit) ? '#ef4444' : '#10b981' }}]"
                  style="background: conic-gradient(at right, {{ isset($noticiaEdit) ? '#f87171, #ef4444, #dc2626' : '#34d399, #10b981, #059669' }});"></span>
                            <span class="text-white">Completa todos los campos para publicar</span>
                        </p>
                    </div>

                    <!-- Hover extra -->
                    <div class="absolute inset-0 pointer-events-none">
                        <div class="absolute inset-0 opacity-0 group-hover:opacity-30 transition-opacity duration-700"
                             style="background: radial-gradient(ellipse at center, {{ isset($noticiaEdit) ? 'rgba(239, 68, 68, 0.3)' : 'rgba(168, 85, 247, 0.3)' }} 0%, transparent 70%);"></div>
                        <div class="absolute inset-0 rounded-t-2xl border border-transparent group-hover:border-white/10 transition-all duration-700"></div>
                    </div>
                </div>


            @if ($errors->any())
                    <div class="fixed top-4 right-4 bg-red-600 text-white text-sm px-4 py-3 rounded shadow-lg z-50">
                        <strong>Errores al guardar:</strong>
                        <ul class="mt-1 list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Formulario -->
                <form
                    method="POST"
                    action="{{ isset($noticiaEdit) ? route('actualizar.noticia', $noticiaEdit->id) : route('agregar') }}"
                    enctype="multipart/form-data"
                    class="p-6 space-y-8"
                    style="background-color: rgb(55,64,80);">
                    @csrf
                    @if(isset($noticiaEdit))
                        @method('PUT')
                    @endif

                    <!-- Título -->
                    <div class="space-y-2">
                        <label for="news-title" class="block text-sm font-medium text-white/90">
                            Título principal <span class="text-red-400" aria-hidden="true">*</span>
                            <span class="sr-only">(requerido)</span>
                        </label>

                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg
                                    class="w-5 h-5 text-cyan-300/90 group-focus-within:text-cyan-200 transition-colors duration-200"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linecap="round" stroke-width="2"
                                          d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                </svg>
                            </div>
                            <input
                                type="text"
                                id="news-title"
                                name="title"
                                required
                                aria-required="true"
                                value="{{ old('title', $noticiaEdit->titulo ?? '') }}"
                                class="w-full px-4 py-3 pl-10 rounded-xl bg-transparent text-white placeholder-slate-300/80 focus:border-cyan-300 focus:ring-2 focus:ring-cyan-400/30 transition-all duration-200 shadow-sm group-hover:border-slate-500/50 outline-none"
                                placeholder="Escribe el título aquí"
                                style="background: linear-gradient(135deg, rgba(70,77,91,0.9) 0%, rgba(62,68,80,0.95) 100%);"
                            />

                        </div>
                        <p class="text-xs text-slate-400/80 mt-1">Máx. 120 caracteres</p>
                    </div>



                    @php
                        $categoriaActual = old('category', $noticiaEdit->categoria ?? '');
                    @endphp

                    <div class="space-y-4">
                        <label class="block text-sm font-medium text-slate-300/90 mb-3 transition-colors">Categorías
                            <span class="text-red-400/90">*</span>
                        </label>

                        <div class="category-btn-list grid grid-cols-2 md:grid-cols-3 lg:flex lg:flex-wrap gap-3 items-start">
                            @php
                                $categories = [
                                    ['name' => 'Cultura', 'icon' => 'fa-masks-theater', 'color' => 'purple'],
                                    ['name' => 'Economía', 'icon' => 'fa-chart-pie', 'color' => 'amber'],
                                    ['name' => 'Salud', 'icon' => 'fa-heart-pulse', 'color' => 'rose'],
                                    ['name' => 'Política', 'icon' => 'fa-landmark-dome', 'color' => 'red'],
                                ];
                            @endphp

                            @foreach($categories as $category)
                                @php
                                    $isActive = $categoriaActual === $category['name'];
                                @endphp
                                <button type="button"
                                        data-category="{{ $category['name'] }}"
                                        class="category-btn group relative px-5 py-3 rounded-2xl text-sm font-semibold flex items-center gap-3
                text-{{ $category['color'] }}-200 hover:text-white
                border border-slate-600 bg-transparent
                transition-all duration-300 transform
                hover:scale-[1.03] hover:shadow-lg hover:shadow-{{ $category['color'] }}-900/20
                focus:outline-none focus:ring-2 focus:ring-{{ $category['color'] }}-400/60
                active:scale-95
                {{ $isActive ? 'border-2 border-'.$category['color'].'-500 bg-'.$category['color'].'-900/40' : '' }}">
                                    <div class="flex items-center gap-3">
                                        <i class="fas {{ $category['icon'] }} text-{{ $category['color'] }}-400/90 text-lg z-10"></i>
                                        <span class="tracking-wide">{{ $category['name'] }}</span>
                                        @if ($isActive)
                                            <span class="ml-2 text-green-400 text-sm">✔</span>
                                        @endif
                                    </div>
                                </button>
                            @endforeach

                            <!-- Botón nueva categoría -->
                            <div id="new-category-btn-container" class="flex flex-col gap-1 min-w-[150px]">
                                <button type="button" id="new-category-btn"
                                        class="group px-5 py-3 rounded-2xl text-sm font-semibold flex items-center gap-3
                bg-gradient-to-br from-slate-800/40 to-slate-900/60
                text-slate-400 hover:text-indigo-200
                border border-slate-700/50 hover:border-indigo-500/60
                transform transition-all duration-300
                hover:scale-[1.03] hover:shadow-lg hover:shadow-indigo-900/20
                focus:outline-none focus:ring-2 focus:ring-indigo-500/50
                active:scale-95">
                                    <i class="fas fa-plus text-xs transition-transform group-hover:rotate-90 group-hover:scale-125"></i>
                                    <span class="tracking-wide">Nueva categoría</span>
                                </button>
                            </div>
                        </div>

                        <input type="hidden" name="category" id="selected-category" value="{{ $categoriaActual }}">
                        <p class="mt-1 text-xs text-slate-500/80 animate-pulse">✨ Selecciona la categoría que mejor represente tu contenido</p>
                    </div>




                    <!-- Editor -->
                    @php
                        $contenidoActual = old('contenido', $noticiaEdit->descripcion ?? '');
                    @endphp

                    <div class="space-y-4">
                        <label class="block text-sm font-medium text-slate-300/90 mb-3">Contenido <span class="text-rose-400/90">*</span></label>
                        <div class="editor-container rounded-xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 group hover:border-indigo-500/50" style="background-color: rgb(67,74,88);">
                            <!-- Toolbar Mejorado -->
                            <div class="editor-toolbar bg-slate-900/95 p-3 border-b border-slate-700/40 flex flex-wrap gap-3 backdrop-blur-sm">
                                <div class="editor-toolbar bg-slate-900/95 p-3 border-b border-slate-700/40 flex flex-wrap gap-3 backdrop-blur-sm">
                                    <!-- Formato básico -->
                                    <button type="button" class="toolbar-btn p-2 hover:bg-indigo-500/20 rounded-md" data-command="bold" title="Negrita (Ctrl+B)">
                                        <i class="fas fa-bold text-slate-300 hover:text-indigo-400"></i>
                                    </button>
                                    <button type="button" class="toolbar-btn p-2 hover:bg-indigo-500/20 rounded-md" data-command="italic" title="Cursiva (Ctrl+I)">
                                        <i class="fas fa-italic text-slate-300 hover:text-indigo-400"></i>
                                    </button>
                                    <button type="button" class="toolbar-btn p-2 hover:bg-indigo-500/20 rounded-md" data-command="underline" title="Subrayado (Ctrl+U)">
                                        <i class="fas fa-underline text-slate-300 hover:text-indigo-400"></i>
                                    </button>

                                    <!-- Listas e indent -->
                                    <button type="button" class="toolbar-btn p-2 hover:bg-indigo-500/20 rounded-md" data-command="insertUnorderedList" title="Viñetas">
                                        <i class="fas fa-list-ul text-slate-300 hover:text-indigo-400"></i>
                                    </button>
                                    <button type="button" class="toolbar-btn p-2 hover:bg-indigo-500/20 rounded-md" data-command="insertOrderedList" title="Numerado">
                                        <i class="fas fa-list-ol text-slate-300 hover:text-indigo-400"></i>
                                    </button>
                                    <button type="button" class="toolbar-btn p-2 hover:bg-indigo-500/20 rounded-md" data-command="indent" title="Aumentar sangría">
                                        <i class="fas fa-indent text-slate-300 hover:text-indigo-400"></i>
                                    </button>
                                    <button type="button" class="toolbar-btn p-2 hover:bg-indigo-500/20 rounded-md" data-command="outdent" title="Reducir sangría">
                                        <i class="fas fa-outdent text-slate-300 hover:text-indigo-400"></i>
                                    </button>

                                    <!-- Enlace, imagen, video -->
                                    <button type="button" class="toolbar-btn p-2 hover:bg-indigo-500/20 rounded-md insert-link" title="Enlace">
                                        <i class="fas fa-link text-slate-300 hover:text-indigo-400"></i>
                                    </button>
                                    <button type="button" class="toolbar-btn p-2 hover:bg-indigo-500/20 rounded-md insert-image" title="Imagen">
                                        <i class="fas fa-image text-slate-300 hover:text-indigo-400"></i>
                                    </button>
                                    <button type="button" class="toolbar-btn p-2 hover:bg-indigo-500/20 rounded-md insert-youtube" title="YouTube">
                                        <i class="fab fa-youtube text-slate-300 hover:text-indigo-400"></i>
                                    </button>

                                    <!-- Color texto/fondo -->
                                    <div class="relative">
                                        <button type="button" class="p-2 hover:bg-indigo-500/20 rounded-md text-slate-300 hover:text-indigo-400" title="Color texto">
                                            <i class="fas fa-palette"></i>
                                        </button>
                                        <input type="color" class="color-picker" data-command="foreColor" aria-label="Color texto"/>
                                    </div>
                                    <div class="relative">
                                        <button type="button" class="p-2 hover:bg-indigo-500/20 rounded-md text-slate-300 hover:text-indigo-400" title="Color fondo">
                                            <i class="fas fa-highlighter"></i>
                                        </button>
                                        <input type="color" class="color-picker" data-command="backColor" aria-label="Color fondo"/>
                                    </div>

                                    <!-- Insertar tabla -->
                                    <button type="button" class="toolbar-btn p-2 hover:bg-indigo-500/20 rounded-md insert-table" title="Insertar tabla">
                                        <i class="fas fa-table text-slate-300 hover:text-indigo-400"></i>
                                    </button>
                                    <!-- Cambiar color tabla -->
                                    <button type="button" class="toolbar-btn p-2 hover:bg-indigo-500/20 rounded-md change-table-color" title="Cambiar color de tabla">
                                        <i class="fas fa-fill-drip text-slate-300 hover:text-indigo-400"></i>
                                    </button>

                                    <!-- Insertar emoji -->
                                    <button type="button" class="toolbar-btn p-2 hover:bg-indigo-500/20 rounded-md insert-emoji" title="Insertar emoji">
                                        <i class="fas fa-smile text-slate-300 hover:text-indigo-400"></i>
                                    </button>

                                    <!-- Limpiar formato -->
                                    <button type="button" class="toolbar-btn p-2 hover:bg-indigo-500/20 rounded-md clear-format" title="Limpiar formato">
                                        <i class="fas fa-eraser text-slate-300 hover:text-indigo-400"></i>
                                    </button>

                                    <!-- Encabezados, fuente y tamaño de letra -->
                                    <select
                                        class="headings-selector bg-slate-800/50 text-slate-300 rounded-md px-2 py-1 text-sm"
                                        style="background-color: #434a58; color: #e2e8f0;"

                                        title="Formato párrafo/título">
                                        <option value="p">Párrafo</option>
                                        <option value="h1">Título 1</option>
                                        <option value="h2">Título 2</option>
                                    </select>
                                    <select
                                        class="font-selector bg-slate-800/50 text-slate-300 rounded-md px-2 py-1 text-sm"
                                        style="background-color: #434a58; color: #e2e8f0;"

                                        title="Tipo de letra">
                                        <option value="font-sans">Sans-serif</option>
                                        <option value="font-serif">Serif</option>
                                        <option value="font-mono">Monospace</option>
                                    </select>
                                    <select
                                        class="font-size-selector bg-slate-800/50 text-slate-300 rounded-md px-2 py-1 text-sm"
                                        style="background-color: #434a58; color: #e2e8f0;"

                                        title="Tamaño de letra">
                                        <option value="1">10px</option>
                                        <option value="2">13px</option>
                                        <option value="3" selected>16px</option>
                                        <option value="4">18px</option>
                                        <option value="5">24px</option>
                                        <option value="6">32px</option>
                                        <option value="7">48px</option>
                                    </select>
                                    <button type="button" id="toggleFullscreen"
                                            class="group flex items-center gap-3 px-5 py-2.5 bg-white hover:bg-gray-50 text-gray-800 font-medium rounded-lg transition-all duration-200 border hover:border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200/50 shadow-sm hover:shadow-md">

                                        <!-- Icono simplificado -->
                                        <i class="fas fa-expand text-gray-600 group-hover:text-gray-800 text-sm"></i>

                                        <!-- Texto limpio -->
                                        <span class="text-sm tracking-tight">
        Ver completo
    </span>
                                    </button>

                                </div>
                            </div>

                            <!-- Editor Content con contenido precargado -->
                            <div id="editor-content"
                                 class="editor-content bg-white min-h-[400px] p-6 text-black focus:outline-none"
                                 contenteditable="true"
                                 data-placeholder="Escribe aquí..."
                                 spellcheck="false">{!! $contenidoActual !!}</div>

                            <!-- Footer del editor -->
                            <div class="bg-slate-900/80 border-t border-slate-700/40 p-3 flex justify-between items-center text-sm">
                                <span class="char-count">Caracteres: 0</span>
                                <span class="word-count">Palabras: 0</span>
                                <button class="undo-btn px-3 py-1 rounded-md bg-slate-800/50 hover:bg-indigo-500/20"><i class="fas fa-undo-alt"></i></button>
                                <button class="redo-btn px-3 py-1 rounded-md bg-slate-800/50 hover:bg-indigo-500/20"><i class="fas fa-redo-alt"></i></button>
                            </div>
                        </div>

                        <!-- Campo oculto que se llenará con el contenido del editor -->
                        <input type="hidden" id="contenido_final" name="contenido">
                    </div>

                    <!-- Script para sincronizar el editor con el input oculto -->
                    <script>
                        document.addEventListener('DOMContentLoaded', () => {
                            const editor = document.getElementById('editor-content');
                            const input = document.getElementById('contenido_final');

                            function updateHiddenInput() {
                                input.value = editor.innerHTML;
                            }

                            editor.addEventListener('input', updateHiddenInput);
                            updateHiddenInput(); // Inicializa al cargar
                        });
                    </script>


                    <!-- Tags -->
                    @php
                        $tags = [];

                        if (isset($noticiaEdit)) {
                            $tags = old('tags', explode(',', $noticiaEdit->etiquetas));
                        } else {
                            $tags = ['Salud', 'Laredo'];
                        }
                    @endphp

                    <div>
                        <label class="block text-sm font-medium text-slate-400 mb-3">Etiquetas (Tags)</label>
                        <div
                            class="tags-container flex flex-wrap items-center gap-3 p-4 rounded-xl bg-slate-800/70 border-2 border-slate-700 focus-within:ring-4 focus-within:ring-indigo-500/20 transition-all duration-300 hover:border-slate-600"
                            id="tags-box">
                            @foreach($tags as $tag)
                                @php $tag = trim($tag); @endphp
                                <span class="tag-item px-3 py-1.5 rounded-lg text-xs font-medium bg-indigo-900/40 text-indigo-300 flex items-center gap-1 border border-indigo-800/50">
                <i class="fas fa-tag text-indigo-400 text-[10px]"></i>
                <span>{{ $tag }}</span>
                <button type="button" class="ml-1.5 text-indigo-400 hover:text-indigo-200 text-xs">
                    <i class="fas fa-times"></i>
                </button>
            </span>
                            @endforeach

                            <input type="text" id="tag-input" placeholder="Escribe y presiona Enter..."
                                   class="tag-input flex-1 min-w-[120px] bg-transparent text-sm text-slate-300 placeholder-slate-500 py-1 outline-none">
                        </div>
                        <input type="hidden" name="tags" id="hidden-tags" value="{{ implode(',', $tags) }}">
                        <p class="mt-2 text-xs text-slate-500">Añade hasta 10 etiquetas para mejorar la clasificación</p>
                    </div>

                    <script>
                        const tagInput = document.getElementById('tag-input');
                        const tagContainer = document.getElementById('tags-box');
                        const hiddenTagField = document.getElementById('hidden-tags');

                        let tags = [];

                        function updateHiddenField() {
                            hiddenTagField.value = tags.join(',');
                        }

                        function renderTag(tag) {
                            const span = document.createElement('span');
                            span.className = 'tag-item px-3 py-1.5 rounded-lg text-xs font-medium bg-indigo-900/40 text-indigo-300 flex items-center gap-1 border border-indigo-800/50';
                            span.innerHTML = `
            <i class="fas fa-tag text-indigo-400 text-[10px]"></i>
            <span>${tag}</span>
            <button type="button" class="ml-1.5 text-indigo-400 hover:text-indigo-200 text-xs" data-tag="${tag}">
                <i class="fas fa-times"></i>
            </button>
        `;
                            tagContainer.insertBefore(span, tagInput);

                            span.querySelector('button').addEventListener('click', function () {
                                tags = tags.filter(t => t !== tag);
                                span.remove();
                                updateHiddenField();
                            });
                        }

                        tagInput.addEventListener('keydown', function (e) {
                            if (e.key === 'Enter') {
                                e.preventDefault();
                                const tag = tagInput.value.trim();

                                if (tag && !tags.includes(tag) && tags.length < 10) {
                                    tags.push(tag);
                                    renderTag(tag);
                                    updateHiddenField();
                                }

                                tagInput.value = '';
                            }
                        });

                        document.querySelectorAll('.tag-item').forEach(tagElement => {
                            const tagName = tagElement.querySelector('span')?.innerText.trim();
                            if (tagName && !tags.includes(tagName)) {
                                tags.push(tagName);
                            }

                            const btn = tagElement.querySelector('button');
                            if (btn) {
                                btn.addEventListener('click', function () {
                                    tags = tags.filter(t => t !== tagName);
                                    tagElement.remove();
                                    updateHiddenField();
                                });
                            }
                        });

                        updateHiddenField();
                    </script>



                    <!-- Multimedia -->
                    <div>
                        <label class="block text-sm font-medium text-slate-400 mb-3">Imagen Principal <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div id="drag-drop-zone"
                                 class="border-2 border-dashed border-slate-700 rounded-2xl p-8 text-center transition-all duration-300 hover:border-indigo-500 hover:bg-indigo-900/10 cursor-pointer group relative">

                                <!-- Input archivo -->
                                <input type="file" name="foto" accept="image/*"
                                       class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                                       id="file-upload-input">

                                <!-- Icono y texto -->
                                <div class="flex flex-col items-center justify-center space-y-4 z-0 pointer-events-none">
                                    <div
                                        class="p-4 rounded-full bg-gradient-to-br from-indigo-500 to-purple-600 text-white shadow-lg shadow-indigo-500/40 group-hover:shadow-indigo-600/60 transition-shadow duration-300">
                                        <i class="fas fa-cloud-upload-alt text-3xl"></i>
                                    </div>
                                    <p class="text-slate-400"><span class="text-indigo-400 font-medium">Haz clic para subir</span>
                                        o arrastra y suelta archivos aquí</p>
                                    <p class="text-xs text-slate-500">Formatos: PNG, JPG, GIF, WEBP | Tamaño máximo: 50MB</p>
                                </div>

                                <!-- Vista previa existente (modo edición) -->
                                @if(isset($noticiaEdit) && $noticiaEdit->foto)
                                    <div id="upload-preview" class="mt-6 flex justify-center">
                                        <img src="data:image/jpeg;base64,{{ $noticiaEdit->foto }}"
                                             alt="Vista previa"
                                             class="rounded-xl max-h-48 object-contain border border-slate-600 shadow">
                                    </div>
                                @else
                                    <div id="upload-preview" class="mt-6"></div>
                                @endif
                            </div>
                        </div>
                    </div>




                    <div class="flex items-center gap-3 mt-6">
                        <input id="togglePublish" name="publicada" type="checkbox" value="1"
                               class="w-5 h-5 text-green-600 bg-gray-700 border-gray-600 rounded focus:ring-green-500 focus:ring-2 transition-all"
                               @if(old('publicada', isset($noticiaEdit) ? $noticiaEdit->activo : false)) checked @endif>
                        <label for="togglePublish" class="text-slate-300 text-sm font-medium cursor-pointer">
                            ¿Publicar ahora?
                        </label>
                    </div>





                    <!-- Botones -->
                    <button type="submit"
                            class="px-7 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all transform hover:scale-[1.02] focus:outline-none focus:ring-2 flex items-center gap-3 group
        @if(isset($noticiaEdit))
            bg-gradient-to-r from-green-600 to-emerald-600 text-white focus:ring-green-500/50
        @else
            bg-gradient-to-r from-indigo-600 to-purple-600 text-white focus:ring-indigo-500/50
        @endif">
                        <span>{{ isset($noticiaEdit) ? 'Actualizar Noticia' : 'Publicar Noticia' }}</span>
                        <i class="fas fa-paper-plane group-hover:translate-x-1 transition-transform duration-300"></i>
                    </button>


                </form>


            </div>
        </div>


        <!-- Noticias Recientes -->
        <div class="xl:col-span-4">
            <div class="bg-gray-800 rounded-2xl shadow-xl border border-gray-700 overflow-hidden h-full flex flex-col">
                <!-- Header -->
                <div class="p-4 border-b border-gray-700 space-y-4 bg-gray-700">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-3">
                            <h2 class="text-xl font-bold text-gray-200 flex items-center gap-2">
                                <i class="fas fa-newspaper"></i>
                                Últimas Noticias
                                <span class="text-xs bg-gray-600 text-gray-300 px-2 py-1 rounded-full ml-2">12 nuevas</span>
                            </h2>
                        </div>
                        <div class="flex items-center gap-3">
                            <button class="p-2 hover:bg-gray-600 rounded-lg transition-all">
                                <i class="fas fa-sliders-h text-gray-400"></i>
                            </button>
                            <a href="{{ route('noticias.mostrar') }}" class="px-3 py-2 hover:bg-gray-600 rounded-lg flex items-center gap-2">
                                <i class="fas fa-tasks text-gray-400"></i>
                                <span class="text-sm text-gray-300">Gestionar</span>
                            </a>
                        </div>
                    </div>

                    <!-- Buscador -->
                    <div class="relative">
                        <input
                            type="text"
                            placeholder="Buscar en noticias..."
                            class="w-full pl-11 pr-4 py-3 rounded-xl bg-gray-600 border-2 border-gray-500 text-sm text-gray-200"
                        >
                        <i class="fas fa-search absolute left-3 top-4 text-gray-400 text-sm"></i>
                    </div>
                </div>

                <!-- Lista de Noticias -->
                <div class="flex-1 overflow-y-auto bg-gray-700">
                    <div class="divide-y divide-gray-600">
                        @foreach ($noticias as $noticia)
                            <div class="p-3 hover:bg-gray-600 transition-all cursor-pointer">
                                <div class="flex items-start gap-3">
                                    <div class="w-12 h-12 flex-shrink-0 rounded-lg overflow-hidden bg-gray-600">
                                        <img src="data:image/jpeg;base64,{{ $noticia->foto }}" alt="Imagen de noticia"
                                             class="w-full h-full object-cover">
                                    </div>


                                    <div class="flex-1 min-w-0 space-y-1.5">
                                        <div class="flex items-center gap-2">
                                            <h3 class="text-sm font-semibold text-gray-100 truncate" title="{{ $noticia->titulo }}">
                                                {{ Str::limit($noticia->titulo, 10, '...') }}
                                            </h3>



                                        </div>
                                        <p class="text-xs text-gray-400 line-clamp-2 leading-relaxed">
                                            {{ Str::limit(strip_tags($noticia->descripcion), 100, '...') }}
                                            <span class="text-blue-300 cursor-pointer">Leer más</span>
                                        </p>
                                        <div class="flex items-center gap-3 flex-wrap">
                    <span class="text-xs px-2 py-1 rounded-md bg-gray-600 text-gray-300">
                        <i class="fas fa-tag text-[0.6rem]"></i>
                        {{ $noticia->categoria ?? 'Sin categoría' }}
                    </span>
                                            <div class="flex items-center gap-2 text-xs text-gray-400">
                                                <i class="fas fa-calendar"></i> {{ $noticia->created_at->format('d/m/Y') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

                <!-- Footer -->
                <div class="p-3 border-t border-gray-700 bg-gray-800 flex justify-between items-center">
                    <div class="text-xs space-y-1">
                        <div class="text-gray-300">Noticias este mes: <span class="font-bold">89</span></div>
                    </div>
                    <div class="flex items-center gap-3">
                        <button class="text-xs px-3 py-1.5 rounded-lg bg-gray-700 text-gray-300 flex items-center gap-2">
                            <i class="fas fa-layer-group"></i>
                            Categorías
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Estilos -->
    <style>
        .selected-category {
            background-color: rgb(34, 37, 42) !important;
            border: 2px solid rgba(129, 140, 248, 0.9) !important;
            box-shadow: 0 0 15px rgba(99, 102, 241, 0.4);
            color: white !important;
            transform: scale(1.04);
            transition: all 0.3s ease;
        }

        .selected-category i,
        .selected-category span {
            color: white !important;
        }

        .selected-check {
            position: absolute;
            top: 6px;
            right: 6px;
            background-color: #34d399;
            color: white;
            font-size: 0.75rem;
            width: 1.25rem;
            height: 1.25rem;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 9999px;
            box-shadow: 0 0 6px rgba(52, 211, 153, 0.5);
        }
        .editor-content {
            word-wrap: break-word;
            overflow-wrap: break-word;
            white-space: pre-wrap;
        }

    </style>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const editor = document.getElementById('editor-content');

            editor.addEventListener('keypress', function (e) {
                if (e.key === 'Enter') {
                    document.execCommand('formatBlock', false, 'p');
                }
            });

            // Forzar que el contenido comience con un bloque <p>
            if (editor.innerHTML.trim() === '') {
                editor.innerHTML = '<p><br></p>';
            }

            // Auto wrap en <p> si solo hay texto suelto
            editor.addEventListener('input', () => {
                if (editor.childNodes.length === 1 && editor.childNodes[0].nodeType === 3) {
                    editor.innerHTML = `<p>${editor.innerHTML}</p>`;
                }
            });
        });
    </script>

    <!-- Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const categoryContainer = document.querySelector('.category-btn-list');
            const inputHidden = document.getElementById('selected-category');

            function selectCategory(button, name) {
                // Desmarcar todos los botones previos
                document.querySelectorAll('.category-btn').forEach(btn => {
                    btn.classList.remove('selected-category');
                    btn.classList.remove('ring-2', 'ring-indigo-500', 'bg-slate-900');
                    const check = btn.querySelector('.selected-check');
                    if (check) check.remove();
                });

                // Marcar el nuevo
                button.classList.add('selected-category');
                button.classList.add('ring-2', 'ring-indigo-500', 'bg-slate-900');

                const checkIcon = document.createElement('div');
                checkIcon.className = 'selected-check absolute -top-1.5 -right-1.5 w-5 h-5 bg-green-500 rounded-full flex items-center justify-center text-white text-xs shadow-lg';
                checkIcon.innerHTML = '<i class="fas fa-check"></i>';
                button.appendChild(checkIcon);

                // Actualizar hidden input
                inputHidden.value = name;
            }

            // Click en categoría
            categoryContainer.addEventListener('click', function (e) {
                if (e.target.closest('.category-btn')) {
                    const btn = e.target.closest('.category-btn');
                    const name = btn.querySelector('span')?.innerText.trim();
                    if (name) selectCategory(btn, name);
                }

                // Nueva categoría
                if (e.target.closest('#new-category-btn')) {
                    const existingInput = document.getElementById('new-category-input');
                    if (existingInput) return;

                    const input = document.createElement('input');
                    input.type = 'text';
                    input.id = 'new-category-input';
                    input.placeholder = 'Nueva categoría';
                    input.className = 'px-4 py-2 rounded-xl bg-slate-800 text-white text-sm border border-slate-600 focus:outline-none focus:ring focus:ring-indigo-500';
                    input.style.marginTop = '0.5rem';
                    input.style.width = '100%';

                    const container = e.target.closest('#new-category-btn-container');
                    container.appendChild(input);
                    input.focus();

                    input.addEventListener('keydown', function (e) {
                        if (e.key === 'Enter') {
                            e.preventDefault();
                            const value = input.value.trim();
                            if (!value) return;

                            const button = document.createElement('button');
                            button.type = 'button';
                            button.className = 'category-btn group relative px-5 py-3 rounded-2xl text-sm font-semibold flex items-center gap-3 text-black bg-white border border-indigo-400 hover:bg-indigo-50 transition-all duration-300';
                            button.innerHTML = `<i class="fas fa-star text-indigo-400"></i><span>${value}</span>`;

                            categoryContainer.insertBefore(button, document.getElementById('new-category-btn-container'));

                            selectCategory(button, value);
                            input.remove();
                        } else if (e.key === 'Escape') {
                            input.remove();
                        }
                    });
                }
            });

            // Auto seleccionar la categoría existente
            const current = inputHidden.value;
            if (current) {
                const currentBtn = [...document.querySelectorAll('.category-btn')].find(btn =>
                    btn.querySelector('span')?.innerText.trim() === current
                );
                if (currentBtn) selectCategory(currentBtn, current);
            }
        });
    </script>


    <script>
        const tagInput = document.getElementById('tag-input');
        const tagContainer = document.getElementById('tags-box');
        const hiddenTagField = document.createElement('input');
        hiddenTagField.type = 'hidden';
        hiddenTagField.name = 'tags';
        tagContainer.appendChild(hiddenTagField);

        let tags = [];

        function updateHiddenField() {
            hiddenTagField.value = tags.join(',');
        }

        function renderTag(tag) {
            const span = document.createElement('span');
            span.className = 'tag-item px-3 py-1.5 rounded-lg text-xs font-medium bg-indigo-900/40 text-indigo-300 flex items-center gap-1 border border-indigo-800/50';
            span.innerHTML = `
            <i class="fas fa-tag text-indigo-400 text-[10px]"></i>
            <span>${tag}</span>
            <button type="button" class="ml-1.5 text-indigo-400 hover:text-indigo-200 text-xs" data-tag="${tag}">
                <i class="fas fa-times"></i>
            </button>
        `;
            tagContainer.insertBefore(span, tagInput);

            span.querySelector('button').addEventListener('click', function () {
                tags = tags.filter(t => t !== tag);
                span.remove();
                updateHiddenField();
            });
        }

        // Permitir Enter para agregar tags nuevos
        tagInput.addEventListener('keydown', function (e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                const tag = tagInput.value.trim();

                if (tag && !tags.includes(tag) && tags.length < 10) {
                    tags.push(tag);
                    renderTag(tag);
                    updateHiddenField();
                }

                tagInput.value = '';
            }
        });

        // Manejar los tags ya existentes desde Blade
        document.querySelectorAll('.tag-item').forEach(tagElement => {
            const tagName = tagElement.querySelector('span')?.innerText.trim();
            if (tagName && !tags.includes(tagName)) {
                tags.push(tagName);
            }

            const btn = tagElement.querySelector('button');
            if (btn) {
                btn.addEventListener('click', function () {
                    tags = tags.filter(t => t !== tagName);
                    tagElement.remove();
                    updateHiddenField();
                });
            }
        });

        updateHiddenField();
    </script>

    <script>
        document.getElementById('togglePublish').addEventListener('change', function () {
            if (this.checked) {
                console.log("Publicación activada");
            } else {
                console.log("Publicación desactivada");
            }
        });
    </script>


    <script>
        document.getElementById('togglePublish').addEventListener('change', function() {
            if(this.checked) {
                console.log("Publicación activada");
            } else {
                console.log("Publicación desactivada");
            }
        });
    </script>


    <script>
        const inputFile = document.getElementById('file-upload-input');
        const previewContainer = document.getElementById('upload-preview');

        inputFile.addEventListener('change', function () {
            previewContainer.innerHTML = '';

            const file = this.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = function (event) {
                const img = new Image();
                img.src = event.target.result;

                img.onload = function () {
                    const canvas = document.createElement('canvas');
                    const ctx = canvas.getContext('2d');

                    const MAX_WIDTH = 1200;
                    const scaleSize = MAX_WIDTH / img.width;
                    canvas.width = MAX_WIDTH;
                    canvas.height = img.height * scaleSize;

                    ctx.drawImage(img, 0, 0, canvas.width, canvas.height);

                    let quality = 0.6;
                    let dataUrl = canvas.toDataURL('image/jpeg', quality);

                    // Reducir aún más si pasa de 1MB
                    while (dataUrl.length > 1024 * 1024 && quality > 0.2) {
                        quality -= 0.05;
                        dataUrl = canvas.toDataURL('image/jpeg', quality);
                    }

                    // Vista previa
                    const imageElement = document.createElement('img');
                    imageElement.src = dataUrl;
                    imageElement.className = 'max-w-xs w-full h-auto mx-auto rounded-lg border border-slate-700 shadow-md';
                    previewContainer.appendChild(imageElement);

                    // Reemplazar el archivo original en input con uno nuevo
                    fetch(dataUrl)
                        .then(res => res.blob())
                        .then(blob => {
                            const newFile = new File([blob], file.name, { type: 'image/jpeg' });
                            const dataTransfer = new DataTransfer();
                            dataTransfer.items.add(newFile);
                            inputFile.files = dataTransfer.files;
                        });
                };
            };

            reader.readAsDataURL(file);
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.execCommand('styleWithCSS', false, true);
            const editor = document.getElementById('editor-content');
            const toolbarBtns = document.querySelectorAll('.toolbar-btn');
            const colorPickers = document.querySelectorAll('.color-picker');
            const headingsSelector = document.querySelector('.headings-selector');
            const fontSelector = document.querySelector('.font-selector');
            const fontSizeSelector = document.querySelector('.font-size-selector');
            const insertLinkBtn = document.querySelector('.insert-link');
            const insertImageBtn = document.querySelector('.insert-image');
            const insertYoutubeBtn = document.querySelector('.insert-youtube');
            const charCount = document.querySelector('.char-count');
            const wordCount = document.querySelector('.word-count');
            const undoBtn = document.querySelector('.undo-btn');
            const redoBtn = document.querySelector('.redo-btn');
            const hiddenInput = document.getElementById('contenido_final');
            const insertTableBtn = document.querySelector('.insert-table');
            const insertEmojiBtn = document.querySelector('.insert-emoji');
            const clearFormatBtn = document.querySelector('.clear-format');
            const changeTableColorBtn = document.querySelector('.change-table-color');

            let history = [], step = -1, rangeBackup = null;

            function saveSelection() {
                const sel = window.getSelection();
                if (sel.rangeCount) rangeBackup = sel.getRangeAt(0).cloneRange();
            }

            function restoreSelection() {
                const sel = window.getSelection();
                sel.removeAllRanges();
                if (rangeBackup) sel.addRange(rangeBackup); else editor.focus();
            }

            function saveState() {
                const html = editor.innerHTML;
                if (step >= 0 && html === history[step]) return;
                if (step < history.length - 1) history = history.slice(0, step + 1);
                history.push(html);
                step = history.length - 1;
                hiddenInput.value = html;
                updateCounts();
            }

            function updateCounts() {
                const text = editor.innerText || '';
                document.querySelector('.char-count').textContent = `Caracteres: ${text.length}`;
                document.querySelector('.word-count').textContent = `Palabras: ${text.trim() ? text.trim().split(/\s+/).length : 0}`;
            }

            function exec(cmd, val = null) {
                document.execCommand(cmd, false, val);
                editor.focus();
                saveState();
            }

            toolbarBtns.forEach(btn => {
                btn.addEventListener('mousedown', e => e.preventDefault());
                btn.addEventListener('click', () => exec(btn.dataset.command, btn.dataset.value || null));
                btn.addEventListener('focus', saveSelection);
            });
            colorPickers.forEach(picker => {
                picker.addEventListener('input', e => exec(e.target.dataset.command, e.target.value));
                picker.addEventListener('mousedown', saveSelection);
            });
            headingsSelector.addEventListener('change', () => exec('formatBlock', `<${headingsSelector.value}>`));
            fontSelector.addEventListener('change', () => {
                editor.classList.remove('font-sans', 'font-serif', 'font-mono');
                editor.classList.add(fontSelector.value);
                editor.focus();
                saveState();
            });
            fontSizeSelector.addEventListener('change', () => exec('fontSize', fontSizeSelector.value));

            insertLinkBtn.addEventListener('click', async () => {
                saveSelection();
                editor.blur();
                const {value: url} = await Swal.fire({
                    title: 'Enlace',
                    input: 'url',
                    confirmButtonText: 'Insertar',
                    showCancelButton: true
                });
                if (url) {
                    restoreSelection();
                    exec('createLink', url);
                }
            });
            insertImageBtn.addEventListener('click', async () => {
                saveSelection();
                editor.blur();
                const {value: src} = await Swal.fire({
                    title: 'Imagen',
                    input: 'url',
                    confirmButtonText: 'Insertar',
                    showCancelButton: true
                });
                if (src) {
                    restoreSelection();
                    exec('insertImage', src);
                }
            });
            insertYoutubeBtn.addEventListener('click', async () => {
                saveSelection();
                editor.blur();
                const {value: vid} = await Swal.fire({
                    title: 'YouTube',
                    input: 'url',
                    confirmButtonText: 'Insertar',
                    showCancelButton: true
                });
                if (vid) {
                    restoreSelection();
                    const embed = `<iframe width="560" height="315" src="${vid.replace('watch?v=', 'embed/')}" frameborder="0" allowfullscreen></iframe>`;
                    exec('insertHTML', embed);
                }
            });
            changeTableColorBtn.addEventListener('click', async () => {
                const selection = window.getSelection();
                const node = selection.anchorNode?.closest?.('table') || selection.anchorNode?.parentNode?.closest?.('table');
                if (!node || !node.classList.contains('custom-table')) {
                    Swal.fire('Selecciona una tabla válida para aplicar colores');
                    return;
                }

                const {value: borderColor} = await Swal.fire({
                    title: 'Color del borde',
                    input: 'color',
                    confirmButtonText: 'Siguiente',
                    showCancelButton: true
                });
                if (!borderColor) return;

                const {value: bgColor} = await Swal.fire({
                    title: 'Color de fondo',
                    input: 'color',
                    confirmButtonText: 'Aplicar',
                    showCancelButton: true
                });
                if (!bgColor) return;

                node.querySelectorAll('td').forEach(td => {
                    td.style.borderColor = borderColor;
                    td.style.backgroundColor = bgColor;
                });
            });
            insertTableBtn.addEventListener('click', async () => {
                saveSelection();
                editor.blur();
                const {value: rows} = await Swal.fire({
                    title: 'Filas',
                    input: 'number',
                    inputAttributes: {min: 1},
                    confirmButtonText: 'Siguiente',
                    showCancelButton: true
                });
                if (!rows || rows < 1) return;
                const {value: cols} = await Swal.fire({
                    title: 'Columnas',
                    input: 'number',
                    inputAttributes: {min: 1},
                    confirmButtonText: 'Insertar',
                    showCancelButton: true
                });
                if (cols && cols > 0) {
                    restoreSelection();
                    let table = '<table class="custom-table" style="border-collapse:collapse;width:100%;margin:1rem 0;">';
                    for (let i = 0; i < rows; i++) {
                        table += '<tr>';
                        for (let j = 0; j < cols; j++) {
                            table += '<td style="padding:8px;border:1px solid #ccc;">&nbsp;</td>';
                        }
                        table += '</tr>';
                    }
                    table += '</table>';
                    exec('insertHTML', table);
                }
            });


            insertEmojiBtn.addEventListener('click', async () => {
                saveSelection();
                editor.blur();
                const {value: emoji} = await Swal.fire({
                    title: 'Emoji',
                    input: 'text',
                    inputLabel: 'Ingresa un emoji (ej. 😀)',
                    confirmButtonText: 'Insertar',
                    showCancelButton: true
                });
                if (emoji) {
                    restoreSelection();
                    exec('insertText', emoji);
                }
            });

            clearFormatBtn.addEventListener('click', () => {
                exec('removeFormat');
            });
            undoBtn.addEventListener('click', () => {
                if (step > 0) {
                    step--;
                    editor.innerHTML = history[step];
                    hiddenInput.value = history[step];
                    updateCounts();
                }
            });
            redoBtn.addEventListener('click', () => {
                if (step < history.length - 1) {
                    step++;
                    editor.innerHTML = history[step];
                    hiddenInput.value = history[step];
                    updateCounts();
                }
            });
            editor.addEventListener('input', saveState);
            editor.addEventListener('keydown', e => {
                if ((e.ctrlKey || e.metaKey) && ['b', 'i', 'u'].includes(e.key)) {
                    e.preventDefault();
                    const cmd = e.key === 'b' ? 'bold' : e.key === 'i' ? 'italic' : 'underline';
                    exec(cmd);
                }
            });
            // init
            editor.classList.add('font-sans');
            saveState();
            updateCounts();
        });
    </script>

    <script>
        const editorContainer = document.querySelector('.editor-container');
        const toggleBtn = document.getElementById('toggleFullscreen');
        const editorContent = editorContainer.querySelector('#editor-content');

        let isFullscreen = false;
        let fullscreenOverlay = null;
        let originalParent = editorContainer.parentElement;
        let originalNextSibling = editorContainer.nextElementSibling;

        toggleBtn.addEventListener('click', () => {
            isFullscreen = !isFullscreen;

            if (isFullscreen) {
                // Crear overlay de fondo
                fullscreenOverlay = document.createElement('div');
                fullscreenOverlay.className = 'fixed inset-0 z-50 bg-black/50 flex items-center justify-center';

                // Aplicar clases y estilos al editor
                editorContainer.classList.add(
                    'relative',
                    'm-auto',
                    'rounded-lg',
                    'shadow-2xl'
                );
                editorContainer.style.width = 'clamp(300px, 90%, 1000px)';
                editorContainer.style.maxHeight = '90vh';
                editorContainer.style.overflowY = 'auto';

                // Aumentar altura del contenido editable
                editorContent.style.minHeight = '600px'; // Puedes usar '70vh' si prefieres

                // Mover editor al overlay
                fullscreenOverlay.appendChild(editorContainer);
                document.body.appendChild(fullscreenOverlay);
                document.body.style.overflow = 'hidden';

                toggleBtn.textContent = 'Cerrar vista completa';
            } else {
                // Restaurar scroll del body
                document.body.style.overflow = '';

                // Remover overlay
                if (fullscreenOverlay) fullscreenOverlay.remove();

                // Restaurar editor al lugar original
                if (originalNextSibling) {
                    originalParent.insertBefore(editorContainer, originalNextSibling);
                } else {
                    originalParent.appendChild(editorContainer);
                }

                // Limpiar clases y estilos
                editorContainer.classList.remove('m-auto', 'rounded-lg', 'shadow-2xl');
                editorContainer.style.width = '';
                editorContainer.style.maxHeight = '';
                editorContainer.style.overflowY = '';
                editorContent.style.minHeight = '';

                toggleBtn.textContent = 'Ver completo';
            }
        });
    </script>



    <style>
        .editor-content:empty:before {
            content: attr(data-placeholder);
            color: #64748b;
            pointer-events: none;
            position: absolute;
        }

        .editor-content {
            position: relative;
        }

        .editor-content pre {
            background-color: rgba(30, 41, 59, 0.5);
            border-radius: .5rem;
            padding: 1rem;
            border: 1px solid rgba(51, 65, 85, 0.4);
            overflow-x: auto;
        }

        .editor-content blockquote {
            border-left: 4px solid rgba(99, 102, 241, 0.6);
            background-color: rgba(30, 41, 59, 0.3);
            color: #cbd5e1;
            padding: .5rem 1rem;
            margin: 1rem 0;
            font-style: italic;
        }

        .editor-content code {
            background-color: rgba(30, 41, 59, 0.7);
            color: #f43f5e;
            padding: .125rem .375rem;
            border-radius: .25rem;
            font-family: ui-monospace, Menlo, Consolas, monospace;
            font-size: .9em;
        }

        .editor-content.font-sans {
            font-family: ui-sans-serif, system-ui, sans-serif;
        }

        .editor-content.font-serif {
            font-family: ui-serif, Georgia, serif;
        }

        .editor-content.font-mono {
            font-family: ui-monospace, Menlo, Consolas, monospace;
        }

        .color-picker {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        .editor-content ol,
        .editor-content ul {
            padding-left: 2rem;
            margin: 1rem 0;
        }

        .editor-content ol {
            list-style: decimal;
        }

        .editor-content ul {
            list-style: disc;
        }

        .editor-content li {
            margin: .25rem 0;
        }
    </style>
    @if(session('publicada'))
        <div
            x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 4000)"
            x-show="show"
            class="fixed top-5 right-5 bg-green-600 text-white px-6 py-3 rounded-lg shadow-lg z-50 transition-all duration-300"
            style="display: none;"
        >
            <p class="font-semibold">✔ ¡Noticia Publicada!</p>
            <p class="text-sm">{{ session('publicada') }}</p>
        </div>
    @endif

    <script>
        document.querySelector('form').addEventListener('submit', function(e) {
            const titulo = document.querySelector('input[name="title"]').value.trim();
            const categoria = document.querySelector('input[name="category"]').value.trim();
            const contenido = document.querySelector('input[name="contenido"]').value.trim();
            const tags = document.querySelector('input[name="tags"]').value.trim();

            if (!titulo || !categoria || !contenido || !tags) {
                e.preventDefault();
                Swal.fire({
                    title: 'Campos incompletos',
                    text: 'Por favor, completa todos los campos requeridos antes de publicar.',
                    icon: 'warning',
                    confirmButtonColor: '#f59e0b'
                });
            }
        });
    </script>

@endsection


    <style>
        @keyframes gradient-x {
            0%, 100% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
        }

        .animate-gradient-x {
            background-size: 200% 200%;
            animation: gradient-x 5s ease infinite;
        }
    </style>
