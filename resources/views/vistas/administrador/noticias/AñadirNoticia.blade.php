@extends('plantillas.administrador.plantilla')

@section('title', 'Gestión de Noticias - Dashboard Moderno')

@section('menu')
    @include('vistas.administrador.menu')
@endsection

@section('content')
    <!-- Header -->
    <div
        class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-6 rounded-xl px-6 py-5 shadow-inner"
        style="background-color: rgb(55,64,80);">
        <div>
            <h1 class="text-4xl md:text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-purple-600 animate-gradient-x pb-2">
                Gestión de Noticias
            </h1>
            <p class="text-gray-300 dark:text-gray-400 text-lg">Crea, edita y administra tu contenido.</p>
        </div>

    </div>


    <!-- Estatísticas Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        @php
            $stats = [
                ['icon' => 'fa-eye', 'title' => 'Total de visitas', 'value' => '45.2K', 'change' => '+12.5%', 'change_color' => 'text-green-500 dark:text-green-400', 'arrow' => 'fa-arrow-up', 'gradient' => 'from-blue-500 to-cyan-400', 'width' => '75%', 'shadow' => 'shadow-blue-500/30'],
                ['icon' => 'fa-newspaper', 'title' => 'Noticias publicadas', 'value' => '237', 'change' => '+8.3%', 'change_color' => 'text-green-500 dark:text-green-400', 'arrow' => 'fa-arrow-up', 'gradient' => 'from-indigo-500 to-purple-500', 'width' => '65%', 'shadow' => 'shadow-indigo-500/30'],
                ['icon' => 'fa-comment-alt', 'title' => 'Comentarios', 'value' => '3.1K', 'change' => '+5.7%', 'change_color' => 'text-green-500 dark:text-green-400', 'arrow' => 'fa-arrow-up', 'gradient' => 'from-purple-500 to-pink-500', 'width' => '45%', 'shadow' => 'shadow-purple-500/30'],
                ['icon' => 'fa-share-alt', 'title' => 'Compartidas', 'value' => '1.8K', 'change' => '-2.3%', 'change_color' => 'text-red-500 dark:text-red-400', 'arrow' => 'fa-arrow-down', 'gradient' => 'from-teal-500 to-emerald-500', 'width' => '35%', 'shadow' => 'shadow-teal-500/30'],
            ];
        @endphp

        @foreach ($stats as $stat)
            <div
                class="p-3 rounded-xl dark:bg-slate-800 shadow-sm transition-all duration-300 hover:scale-[1.02] {{ $stat['shadow'] }} hover:{{ $stat['shadow'] }}"
                style="background-color: rgb(55,64,80);">
                <div class="flex justify-between items-center mb-1">
                    <div
                        class="rounded-lg p-2 bg-gradient-to-br {{ $stat['gradient'] }} text-white shadow {{ $stat['shadow'] }}">
                        <i class="fas {{ $stat['icon'] }} text-sm fa-fw"></i>
                    </div>
                    <span class="text-[10px] font-semibold {{ $stat['change_color'] }} flex items-center">
                    <i class="fas {{ $stat['arrow'] }} mr-1 text-[10px]"></i> {{ $stat['change'] }}
                </span>
                </div>
                <div>
                    <h3 class="text-[11px] font-medium text-slate-400 mb-0.5">{{ $stat['title'] }}</h3>
                    <span class="text-xl font-bold text-white">{{ $stat['value'] }}</span>
                </div>
                <div class="mt-3">
                    <div class="w-full h-1 bg-slate-700 rounded-full overflow-hidden">
                        <div
                            class="h-full bg-gradient-to-r {{ $stat['gradient'] }} rounded-full transition-all duration-500 ease-out"
                            style="width: {{ $stat['width'] }}"></div>
                    </div>
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
                    class="relative p-7 border-b border-white/10 flex items-center gap-6 rounded-t-2xl backdrop-blur-lg overflow-hidden shadow-2xl shadow-purple-900/20 hover:shadow-violet-900/30 transition-all duration-500 group"
                    style="background-color: rgb(55,64,80);">
                    <!-- Luces flotantes -->
                    <div class="absolute -top-16 -left-16 w-32 h-32 rounded-full opacity-20"
                         style="background: radial-gradient(ellipse, #8b5cf6, transparent 70%); animation: float 12s ease-in-out infinite;"></div>
                    <div class="absolute bottom-8 right-12 w-28 h-28 rounded-full opacity-25"
                         style="background: radial-gradient(ellipse, #ec4899, transparent 70%); animation: float 8s ease-in-out infinite reverse;"></div>
                    <div class="absolute top-1/4 left-1/3 w-20 h-20 rounded-full opacity-15"
                         style="background: radial-gradient(ellipse, #3b82f6, transparent 70%); animation: float 6s ease-in-out infinite;"></div>

                    <!-- Partículas -->
                    <div class="absolute inset-0 z-0 bg-[length:200px_200px]"
                         style="animation: particle-move 20s linear infinite; background: radial-gradient(1px 1px at 20% 30%, white 1%, transparent 100%), radial-gradient(1px 1px at 40% 70%, white 1%, transparent 100%), radial-gradient(1px 1px at 60% 20%, white 1%, transparent 100%), radial-gradient(1px 1px at 80% 50%, white 1%, transparent 100%), radial-gradient(1px 1px at 30% 80%, white 1%, transparent 100%);"></div>

                    <!-- Ícono -->
                    <div
                        class="relative p-4 rounded-2xl text-white shadow-xl shadow-violet-900/50 hover:shadow-fuchsia-900/60 transition-all duration-500 transform group-hover:-translate-y-1 group-hover:rotate-[10deg] group-hover:scale-105 z-10"
                        style="background: conic-gradient(from 180deg at 50% 50%, #6366f1, #8b5cf6, #ec4899);">
                        <div
                            class="absolute inset-0 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-700"
                            style="background: conic-gradient(from 180deg at 50% 50%, #818cf8, #a78bfa, #f472b6);"></div>
                        <i class="fas fa-plus-circle text-3xl relative z-10 transition-all duration-700 group-hover:text-white"></i>
                        <div
                            class="absolute inset-0 rounded-2xl border-[3px] border-white/10 group-hover:border-white/30 transition-all duration-700"></div>
                        <div
                            class="absolute inset-0 rounded-2xl bg-white/5 group-hover:bg-white/10 transition-all duration-700"></div>
                    </div>

                    <!-- Contenido -->
                    <div class="relative z-10 space-y-2">
                        <h2 class="text-3xl font-extrabold bg-clip-text tracking-tight animate-[text-shimmer_3s_linear_infinite] bg-[length:200%_100%]">
                            Crear Nueva Noticia
                        </h2>
                        <p class="text-sm font-medium text-white mt-1 flex items-center gap-2">
                            <span class="inline-flex w-2.5 h-2.5 rounded-full animate-pulse shadow-[0_0_8px_#10b981]"
                                  style="background: conic-gradient(at right, #34d399, #10b981, #059669);"></span>
                            <span class="text-white">Completa todos los campos para publicar</span>
                        </p>
                    </div>

                    <!-- Hover extra -->
                    <div class="absolute inset-0 pointer-events-none">
                        <div class="absolute inset-0 opacity-0 group-hover:opacity-30 transition-opacity duration-700"
                             style="background: radial-gradient(ellipse at center, rgba(168, 85, 247, 0.3) 0%, transparent 70%);"></div>
                        <div
                            class="absolute inset-0 rounded-t-2xl border border-transparent group-hover:border-white/10 transition-all duration-700"></div>
                    </div>
                </div>


                <!-- Formulario -->
                <form class="p-6 space-y-8" style="background-color: rgb(55,64,80);">
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
                                class="w-full px-4 py-3 pl-10 rounded-xl bg-transparent text-white placeholder-slate-300/80 focus:border-cyan-300 focus:ring-2 focus:ring-cyan-400/30 transition-all duration-200 shadow-sm group-hover:border-slate-500/50 outline-none"
                                placeholder="Escribe el título aquí"
                                style="background: linear-gradient(135deg,
                rgba(70,77,91,0.9) 0%,
                rgba(62,68,80,0.95) 100%);"
                            >
                        </div>
                        <p class="text-xs text-slate-400/80 mt-1">Máx. 120 caracteres</p>
                    </div>

                    <!-- Categorías -->
                    <div class="space-y-4">
                        <label class="block text-sm font-medium text-slate-300/90 mb-3 transition-colors">Categorías
                            <span class="text-red-400/90">*</span>
                        </label>

                        <div class="grid grid-cols-2 md:grid-cols-3 lg:flex lg:flex-wrap gap-3">
                            @php
                                $categories = [
                                    ['name' => 'Tecnología', 'icon' => 'fa-microchip', 'color' => 'sky'],
                                    ['name' => 'Deportes', 'icon' => 'fa-trophy', 'color' => 'emerald'],
                                    ['name' => 'Cultura', 'icon' => 'fa-masks-theater', 'color' => 'purple'],
                                    ['name' => 'Economía', 'icon' => 'fa-chart-pie', 'color' => 'amber'],
                                    ['name' => 'Salud', 'icon' => 'fa-heart-pulse', 'color' => 'rose'],
                                    ['name' => 'Política', 'icon' => 'fa-landmark-dome', 'color' => 'red'],
                                ];
                            @endphp

                            @foreach($categories as $category)
                                <button type="button"
                                        class="category-btn group relative px-5 py-3 rounded-2xl text-sm font-semibold flex items-center gap-3
                           bg-gradient-to-br from-{{$category['color']}}-600/20 to-{{$category['color']}}-900/30
                           text-{{$category['color']}}-200 hover:text-white
                           hover:border-{{$category['color']}}-400/60
                           transform transition-all duration-300
                           hover:scale-[1.03] hover:shadow-lg hover:shadow-{{$category['color']}}-900/20
                           focus:outline-none focus:ring-2 focus:ring-{{$category['color']}}-400/60
                           active:scale-95"
                                        data-selected="false" style="background: linear-gradient(135deg,
                rgba(92,100,117,0.9) 0%,
                rgb(119,115,121) 100%);">
                                    <div class="flex items-center gap-3">
                                        <div class="relative">
                                            <div
                                                class="absolute inset-0 bg-{{$category['color']}}-400/10 blur-[2px] rounded-full"></div>
                                            <i class="fas {{ $category['icon'] }} text-{{$category['color']}}-400/90 text-lg relative z-10
                              group-hover:text-{{$category['color']}}-200 transition-colors"></i>
                                        </div>
                                        <span class="tracking-wide">{{ $category['name'] }}</span>
                                    </div>
                                    <div class="absolute top-1 right-1 w-2 h-2 bg-{{$category['color']}}-500 rounded-full
                           opacity-0 group-data-[selected=true]:opacity-100 transition-opacity"></div>
                                </button>
                            @endforeach

                            <button type="button"
                                    class="group px-5 py-3 rounded-2xl text-sm font-semibold flex items-center gap-3
                       bg-gradient-to-br from-slate-800/40 to-slate-900/60
                       text-slate-400 hover:text-indigo-200
                       border border-slate-700/50 hover:border-indigo-500/60
                       transform transition-all duration-300
                       hover:scale-[1.03] hover:shadow-lg hover:shadow-indigo-900/20
                       focus:outline-none focus:ring-2 focus:ring-indigo-500/50
                       active:scale-95">
                                <i class="fas fa-plus text-xs transform transition-transform duration-300
                   group-hover:rotate-90 group-hover:scale-125"></i>
                                <span class="tracking-wide">Nueva categoría</span>
                            </button>
                        </div>

                        <input type="hidden" name="category" id="selected-category">
                        <p class="mt-1 text-xs text-slate-500/80 animate-pulse">✨ Selecciona la categoría que mejor
                            represente tu contenido</p>
                    </div>

                    <!-- Editor -->
                    <div class="space-y-4">
                        <label class="block text-sm font-medium text-slate-300/90 mb-3">Contenido <span
                                class="text-rose-400/90">*</span></label>
                        <div
                            class="editor-container rounded-xl overflow-hidden border-2 border-slate-700/60 shadow-xl hover:shadow-2xl transition-all duration-300 group hover:border-indigo-500/50">
                            <!-- Toolbar Mejorado -->
                            <div
                                class="editor-toolbar bg-slate-900/95 p-3 border-b border-slate-700/40 flex flex-wrap gap-3 backdrop-blur-sm">
                                <!-- Formato básico -->
                                <button class="toolbar-btn p-2 hover:bg-indigo-500/20 rounded-md" data-command="bold"
                                        title="Negrita (Ctrl+B)">
                                    <i class="fas fa-bold text-slate-300 hover:text-indigo-400"></i>
                                </button>
                                <button class="toolbar-btn p-2 hover:bg-indigo-500/20 rounded-md" data-command="italic"
                                        title="Cursiva (Ctrl+I)">
                                    <i class="fas fa-italic text-slate-300 hover:text-indigo-400"></i>
                                </button>
                                <button class="toolbar-btn p-2 hover:bg-indigo-500/20 rounded-md"
                                        data-command="underline"
                                        title="Subrayado (Ctrl+U)">
                                    <i class="fas fa-underline text-slate-300 hover:text-indigo-400"></i>
                                </button>

                                <!-- Listas e indent -->
                                <button class="toolbar-btn p-2 hover:bg-indigo-500/20 rounded-md"
                                        data-command="insertUnorderedList"
                                        title="Viñetas">
                                    <i class="fas fa-list-ul text-slate-300 hover:text-indigo-400"></i>
                                </button>
                                <button class="toolbar-btn p-2 hover:bg-indigo-500/20 rounded-md"
                                        data-command="insertOrderedList"
                                        title="Numerado">
                                    <i class="fas fa-list-ol text-slate-300 hover:text-indigo-400"></i>
                                </button>
                                <button class="toolbar-btn p-2 hover:bg-indigo-500/20 rounded-md" data-command="indent"
                                        title="Aumentar sangría">
                                    <i class="fas fa-indent text-slate-300 hover:text-indigo-400"></i>
                                </button>
                                <button class="toolbar-btn p-2 hover:bg-indigo-500/20 rounded-md" data-command="outdent"
                                        title="Reducir sangría">
                                    <i class="fas fa-outdent text-slate-300 hover:text-indigo-400"></i>
                                </button>

                                <!-- Enlace, imagen, video -->
                                <button class="toolbar-btn p-2 hover:bg-indigo-500/20 rounded-md insert-link"
                                        title="Enlace">
                                    <i class="fas fa-link text-slate-300 hover:text-indigo-400"></i>
                                </button>
                                <button class="toolbar-btn p-2 hover:bg-indigo-500/20 rounded-md insert-image"
                                        title="Imagen">
                                    <i class="fas fa-image text-slate-300 hover:text-indigo-400"></i>
                                </button>
                                <button class="toolbar-btn p-2 hover:bg-indigo-500/20 rounded-md insert-youtube"
                                        title="YouTube">
                                    <i class="fab fa-youtube text-slate-300 hover:text-indigo-400"></i>
                                </button>

                                <!-- Color texto/fondo -->
                                <div class="relative">
                                    <button
                                        class="p-2 hover:bg-indigo-500/20 rounded-md text-slate-300 hover:text-indigo-400"
                                        title="Color texto">
                                        <i class="fas fa-palette"></i>
                                    </button>
                                    <input type="color" class="color-picker" data-command="foreColor"
                                           aria-label="Color texto"/>
                                </div>
                                <div class="relative">
                                    <button
                                        class="p-2 hover:bg-indigo-500/20 rounded-md text-slate-300 hover:text-indigo-400"
                                        title="Color fondo">
                                        <i class="fas fa-highlighter"></i>
                                    </button>
                                    <input type="color" class="color-picker" data-command="backColor"
                                           aria-label="Color fondo"/>
                                </div>


                                <!-- Insertar tabla -->
                                <button class="toolbar-btn p-2 hover:bg-indigo-500/20 rounded-md insert-table"
                                        title="Insertar tabla">
                                    <i class="fas fa-table text-slate-300 hover:text-indigo-400"></i>
                                </button>
                                <!-- Cambiar color tabla -->
                                <button class="toolbar-btn p-2 hover:bg-indigo-500/20 rounded-md change-table-color"
                                        title="Cambiar color de tabla">
                                    <i class="fas fa-fill-drip text-slate-300 hover:text-indigo-400"></i>
                                </button>


                                <!-- Insertar emoji -->
                                <button class="toolbar-btn p-2 hover:bg-indigo-500/20 rounded-md insert-emoji"
                                        title="Insertar emoji">
                                    <i class="fas fa-smile text-slate-300 hover:text-indigo-400"></i>
                                </button>

                                <!-- Limpiar formato -->
                                <button class="toolbar-btn p-2 hover:bg-indigo-500/20 rounded-md clear-format"
                                        title="Limpiar formato">
                                    <i class="fas fa-eraser text-slate-300 hover:text-indigo-400"></i>
                                </button>


                                <!-- Encabezados, fuente y tamaño de letra -->
                                <select
                                    class="headings-selector bg-slate-800/50 text-slate-300 rounded-md px-2 py-1 text-sm"
                                    title="Formato párrafo/título">
                                    <option value="p">Párrafo</option>
                                    <option value="h1">Título 1</option>
                                    <option value="h2">Título 2</option>
                                </select>
                                <select
                                    class="font-selector bg-slate-800/50 text-slate-300 rounded-md px-2 py-1 text-sm"
                                    title="Tipo de letra">
                                    <option value="font-sans">Sans-serif</option>
                                    <option value="font-serif">Serif</option>
                                    <option value="font-mono">Monospace</option>
                                </select>
                                <select
                                    class="font-size-selector bg-slate-800/50 text-slate-300 rounded-md px-2 py-1 text-sm"
                                    title="Tamaño de letra">
                                    <option value="1">10px</option>
                                    <option value="2">13px</option>
                                    <option value="3" selected>16px</option>
                                    <option value="4">18px</option>
                                    <option value="5">24px</option>
                                    <option value="6">32px</option>
                                    <option value="7">48px</option>
                                </select>
                            </div>

                            <!-- Editor Content -->
                            <div id="editor-content"
                                 class="editor-content bg-slate-900/50 min-h-[400px] p-6 text-slate-200 focus:outline-none"
                                 contenteditable="true" data-placeholder="Escribe aquí..." spellcheck="false"></div>
                            <div
                                class="bg-slate-900/80 border-t border-slate-700/40 p-3 flex justify-between items-center text-sm">
                                <span class="char-count">Caracteres: 0</span>
                                <span class="word-count">Palabras: 0</span>
                                <button class="undo-btn px-3 py-1 rounded-md bg-slate-800/50 hover:bg-indigo-500/20"><i
                                        class="fas fa-undo-alt"></i></button>
                                <button class="redo-btn px-3 py-1 rounded-md bg-slate-800/50 hover:bg-indigo-500/20"><i
                                        class="fas fa-redo-alt"></i></button>
                            </div>

                        </div>
                        <input type="hidden" id="contenido_final" name="contenido">

                    </div>


                    <!-- Tags -->
                    <div>
                        <label class="block text-sm font-medium text-slate-400 mb-3">Etiquetas (Tags)</label>
                        <div
                            class="tags-container flex flex-wrap items-center gap-3 p-4 rounded-xl bg-slate-800/70 border-2 border-slate-700 focus-within:ring-4 focus-within:ring-indigo-500/20 transition-all duration-300 hover:border-slate-600">
                    <span
                        class="tag-item px-3 py-1.5 rounded-lg text-xs font-medium bg-indigo-900/40 text-indigo-300 flex items-center gap-1 border border-indigo-800/50">
                        <i class="fas fa-tag text-indigo-400 text-[10px]"></i>
                        blockchain
                        <button type="button" class="ml-1.5 text-indigo-400 hover:text-indigo-200 text-xs">
                            <i class="fas fa-times"></i>
                        </button>
                    </span>
                            <span
                                class="tag-item px-3 py-1.5 rounded-lg text-xs font-medium bg-emerald-900/40 text-emerald-300 flex items-center gap-1 border border-emerald-800/50">
                        <i class="fas fa-tag text-emerald-400 text-[10px]"></i>
                        criptomonedas
                        <button type="button" class="ml-1.5 text-emerald-400 hover:text-emerald-200 text-xs">
                            <i class="fas fa-times"></i>
                        </button>
                    </span>
                            <input type="text" id="tag-input" placeholder="Escribe y presiona Enter..."
                                   class="tag-input flex-1 min-w-[120px] bg-transparent text-sm text-slate-300 placeholder-slate-500 py-1 outline-none">
                        </div>
                        <p class="mt-2 text-xs text-slate-500">Añade hasta 10 etiquetas para mejorar la
                            clasificación</p>
                    </div>

                    <!-- Multimedia -->
                    <div>
                        <label class="block text-sm font-medium text-slate-400 mb-3">Imagen Principal <span
                                class="text-red-500">*</span></label>
                        <div class="relative">
                            <div id="drag-drop-zone"
                                 class="border-2 border-dashed border-slate-700 rounded-2xl p-8 text-center transition-all duration-300 hover:border-indigo-500 hover:bg-indigo-900/10 cursor-pointer group">
                                <input type="file" multiple
                                       class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                                       id="file-upload-input">
                                <div class="flex flex-col items-center justify-center space-y-4">
                                    <div
                                        class="p-4 rounded-full bg-gradient-to-br from-indigo-500 to-purple-600 text-white shadow-lg shadow-indigo-500/40 group-hover:shadow-indigo-600/60 transition-shadow duration-300">
                                        <i class="fas fa-cloud-upload-alt text-3xl"></i>
                                    </div>
                                    <p class="text-slate-400"><span class="text-indigo-400 font-medium">Haz clic para subir</span>
                                        o arrastra y suelta archivos aquí</p>
                                    <p class="text-xs text-slate-500">Formatos: PNG, JPG, GIF, WEBP | Tamaño máximo:
                                        50MB</p>
                                </div>
                            </div>
                            <div id="upload-preview" class="grid grid-cols-2 sm:grid-cols-3 gap-4 mt-6">
                                <!-- Preview items would appear here -->
                            </div>
                        </div>
                    </div>

                    <!-- Programación -->
                    <div
                        class="p-6 rounded-xl bg-slate-800/60 border-2 border-slate-700 hover:border-slate-600 transition-colors duration-300">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center gap-3">
                                <div class="p-2.5 rounded-lg bg-indigo-900/30 text-indigo-400">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                                <div>
                                    <h3 class="text-sm font-medium text-slate-300">Programar publicación</h3>
                                    <p class="text-xs text-slate-500">Publica automáticamente en fecha y hora
                                        específicas</p>
                                </div>
                            </div>
                            <label for="schedule-toggle" class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" id="schedule-toggle" class="sr-only peer">
                                <div
                                    class="w-12 h-6 bg-slate-700 rounded-full peer peer-checked:bg-indigo-600 relative transition-colors duration-300">
                                    <div
                                        class="absolute top-0.5 left-0.5 bg-white rounded-full w-5 h-5 transition-transform duration-300 peer-checked:translate-x-6"></div>
                                </div>
                            </label>
                        </div>
                        <div id="schedule-controls"
                             class="grid grid-cols-1 sm:grid-cols-2 gap-4 max-h-0 opacity-0 overflow-hidden transition-all duration-300">
                            <div>
                                <label class="block text-xs text-slate-400 mb-1">Fecha</label>
                                <input type="date"
                                       class="w-full p-3 rounded-lg bg-slate-800 border-2 border-slate-700 text-sm text-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20">
                            </div>
                            <div>
                                <label class="block text-xs text-slate-400 mb-1">Hora</label>
                                <input type="time"
                                       class="w-full p-3 rounded-lg bg-slate-800 border-2 border-slate-700 text-sm text-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20">
                            </div>
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="flex flex-wrap justify-between gap-4 pt-6 border-t border-slate-700/50">
                        <div class="flex gap-3">
                            <button type="button"
                                    class="px-5 py-3 rounded-xl bg-slate-800/60 text-slate-300 hover:bg-slate-700/80 transition-all hover:shadow-md focus:outline-none focus:ring-2 focus:ring-slate-600 border border-slate-700 hover:border-slate-600 flex items-center gap-2">
                                <i class="fas fa-save"></i>
                                <span>Guardar Borrador</span>
                            </button>
                            <button type="button"
                                    class="px-5 py-3 rounded-xl bg-slate-800/60 text-slate-300 hover:bg-slate-700/80 transition-all hover:shadow-md focus:outline-none focus:ring-2 focus:ring-slate-600 border border-slate-700 hover:border-slate-600 flex items-center gap-2">
                                <i class="fas fa-eye"></i>
                                <span>Vista Previa</span>
                            </button>
                        </div>
                        <button type="submit"
                                class="px-7 py-3 rounded-xl bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold shadow-lg hover:shadow-xl hover:shadow-indigo-500/20 transition-all transform hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-indigo-500/50 flex items-center gap-3 group">
                            <span>Publicar Noticia</span>
                            <i class="fas fa-paper-plane group-hover:translate-x-1 transition-transform duration-300"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>


        <!-- Noticias Recientes -->
        <div class="xl:col-span-4">
            <div
                class="bg-gray-700 dark:bg-gray-800 rounded-3xl shadow-xl border border-gray-600 hover:shadow-2xl transition-all duration-300 overflow-hidden" style="background-color: rgb(55,64,80);">
                <div class="flex justify-between items-center p-6 border-b border-gray-600">
                    <h2 class="text-2xl font-bold text-white">Noticias Recientes</h2>
                    <div class="flex items-center space-x-3">
                        <input type="text" placeholder="Buscar..."
                               class="px-4 py-2 rounded-lg bg-gray-600 border border-gray-600 text-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 transition-all duration-300"/>
                        <button
                            class="p-3 rounded-lg bg-gray-600 border border-gray-600 hover:border-indigo-500 transition-all duration-300">
                            <i class="fas fa-filter text-white"></i>
                        </button>
                    </div>
                </div>
                <div class="overflow-x-auto max-h-[60vh]" style="background-color: rgb(55,63,79);">
                    <table class="w-full text-sm text-white divide-y divide-gray-600">
                        <thead class="bg-gray-700">
                        <tr>
                            <th class="px-6 py-3">Título</th>
                            <th class="px-6 py-3 text-center">Categoría</th>
                            <th class="px-6 py-3 text-center">Estado</th>
                            <th class="px-6 py-3 text-center">Fecha</th>
                            <th class="px-6 py-3 text-center">Acciones</th>
                        </tr>
                        </thead>
                        <tbody class="bg-gray-800 divide-y divide-gray-600">
                        <!-- Filas de ejemplo -->
                        @for ($i = 1; $i <= 10; $i++)
                            <tr class="hover:bg-gray-700 transition-colors">
                                <td class="px-6 py-4">Noticia de Ejemplo Número {{ $i }}</td>
                                <td class="px-6 py-4 text-center">
                                    <span
                                        class="inline-flex items-center px-2 py-1 rounded-full bg-indigo-500 text-white text-xs">Tech</span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <span
                                        class="inline-flex items-center px-2 py-1 rounded-full bg-green-500 text-white text-xs">Publicado</span>
                                </td>
                                <td class="px-6 py-4 text-center">{{ now()->subDays($i)->format('d/m/Y') }}</td>
                                <td class="px-6 py-4 text-center space-x-2">
                                    <button
                                        class="p-2 rounded-lg bg-gray-600 hover:bg-indigo-500 transition-colors text-white">
                                        <i class="fas fa-edit"></i></button>
                                    <button
                                        class="p-2 rounded-lg bg-gray-600 hover:bg-red-500 transition-colors text-white">
                                        <i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
