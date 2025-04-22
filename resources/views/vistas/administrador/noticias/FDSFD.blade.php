@extends('plantillas.administrador.plantilla')

@section('title', 'Gestión de Noticias - Dashboard Moderno')

{{-- Asegúrate de incluir Font Awesome si aún no lo has hecho --}}
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> --}}

@section('menu')
    @include('vistas.administrador.menu')
@endsection

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-indigo-50 via-purple-50 to-pink-50 dark:from-slate-900 dark:via-black dark:to-indigo-950 …">
        <div class="max-w-8xl mx-auto space-y-8">

            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-10">
                <div>
                    <h1 class="text-4xl md:text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500 animate-gradient-x pb-2">
                        Gestión de Noticias
                    </h1>
                    <p class="text-slate-500 dark:text-slate-400 text-lg">Crea, edita y administra tu contenido.</p>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="relative group">
                        <button class="notification-btn p-3 rounded-full bg-white dark:bg-slate-800 shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300 ease-in-out">
                            <i class="fas fa-bell text-slate-500 dark:text-slate-400 group-hover:text-indigo-500 transition-colors"></i>
                            <span class="absolute -top-1 -right-1 h-5 w-5 flex items-center justify-center bg-red-500 text-white text-xs font-bold rounded-full border-2 border-white dark:border-slate-800">3</span>
                        </button>
                    </div>
                    <button class="dark-mode-toggle p-3 rounded-full bg-white dark:bg-slate-800 shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300 ease-in-out relative overflow-hidden group">
                        <i class="fas fa-moon text-indigo-500 dark:text-yellow-400 relative z-10 transition-colors duration-300"></i>
                        <span class="absolute inset-0 bg-gradient-to-tr from-yellow-300 to-orange-400 opacity-0 group-hover:opacity-20 dark:from-indigo-500 dark:to-purple-600 dark:group-hover:opacity-30 transition-opacity duration-300 rounded-full"></span>
                    </button>
                    {{-- Botón de Usuario (Ejemplo) --}}
                    <button class="flex items-center space-x-2 p-2 rounded-full bg-white dark:bg-slate-800 shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300 ease-in-out">
                        <img src="https://via.placeholder.com/32" alt="User Avatar" class="w-8 h-8 rounded-full border-2 border-indigo-200 dark:border-indigo-700">
                        <span class="text-sm font-medium hidden sm:inline">Admin</span>
                        <i class="fas fa-chevron-down text-xs text-slate-400 dark:text-slate-500"></i>
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    $stats = [
                        ['icon' => 'fa-eye', 'title' => 'Total de visitas', 'value' => '45.2K', 'change' => '+12.5%', 'change_color' => 'text-green-500 dark:text-green-400', 'arrow' => 'fa-arrow-up', 'gradient' => 'from-blue-500 to-cyan-400', 'width' => '75%', 'shadow' => 'shadow-blue-500/30'],
                        ['icon' => 'fa-newspaper', 'title' => 'Noticias publicadas', 'value' => '237', 'change' => '+8.3%', 'change_color' => 'text-green-500 dark:text-green-400', 'arrow' => 'fa-arrow-up', 'gradient' => 'from-indigo-500 to-purple-500', 'width' => '65%', 'shadow' => 'shadow-indigo-500/30'],
                        ['icon' => 'fa-comment-alt', 'title' => 'Comentarios', 'value' => '3.1K', 'change' => '+5.7%', 'change_color' => 'text-green-500 dark:text-green-400', 'arrow' => 'fa-arrow-up', 'gradient' => 'from-purple-500 to-pink-500', 'width' => '45%', 'shadow' => 'shadow-purple-500/30'],
                        ['icon' => 'fa-share-alt', 'title' => 'Compartidas', 'value' => '1.8K', 'change' => '-2.3%', 'change_color' => 'text-red-500 dark:text-red-400', 'arrow' => 'fa-arrow-down', 'gradient' => 'from-teal-500 to-emerald-500', 'width' => '35%', 'shadow' => 'shadow-teal-500/30'],
                    ];
                @endphp

                @foreach ($stats as $stat)
                    <div class="stats-card p-6 backdrop-blur-lg bg-white/60 dark:bg-slate-800/70 rounded-3xl shadow-xl dark:shadow-black/30 border border-white/20 dark:border-slate-700/30 transition-all duration-300 hover:scale-[1.03] hover:shadow-2xl {{ $stat['shadow'] }} hover:{{ $stat['shadow'] }}">
                        <div class="flex justify-between items-start mb-4">
                            <div class="rounded-2xl p-3 bg-gradient-to-br {{ $stat['gradient'] }} text-white shadow-lg {{ $stat['shadow'] }} transform group-hover:scale-110 transition-transform duration-300">
                                <i class="fas {{ $stat['icon'] }} text-xl fa-fw"></i>
                            </div>
                            <span class="text-xs font-semibold {{ $stat['change_color'] }} flex items-center">
                        <i class="fas {{ $stat['arrow'] }} mr-1 text-xs"></i> {{ $stat['change'] }}
                    </span>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-slate-500 dark:text-slate-400 mb-1">{{ $stat['title'] }}</h3>
                            <span class="text-3xl font-bold text-slate-800 dark:text-white">{{ $stat['value'] }}</span>
                        </div>
                        <div class="mt-5">
                            <div class="w-full h-2 bg-slate-100 dark:bg-slate-700 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r {{ $stat['gradient'] }} rounded-full transition-all duration-500 ease-out" style="width: {{ $stat['width'] }}"></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="grid grid-cols-1 xl:grid-cols-12 gap-8">

                <div class="xl:col-span-5 space-y-8">
                    <!-- Tarjeta principal con animación de pulso sutil -->
                    <div class="rounded-3xl overflow-hidden transition-all duration-500 bg-gradient-to-br from-slate-900/50 to-slate-800/60 backdrop-blur-xl shadow-2xl border border-slate-700/40 hover:shadow-indigo-700/30 animate-pulse-slow">
                        <!-- Encabezado con gradiente animado -->
                        <div class="p-6 border-b border-slate-700/50 flex items-center gap-4 bg-gradient-to-r from-slate-800/80 via-slate-900/60 to-slate-800/80 animate-gradient-x">
                            <div class="p-3 rounded-xl bg-gradient-to-br from-indigo-600 to-purple-700 text-white shadow-lg shadow-indigo-500/30 hover:shadow-indigo-600/50 transition-all duration-300">
                                <i class="fas fa-plus-circle text-2xl"></i>
                            </div>
                            <h2 class="text-2xl font-semibold text-white/90">Crear Nueva Noticia</h2>
                        </div>

                        <form class="p-6 space-y-6">
                            <!-- Input con placeholder flotante -->
                            <div class="space-y-1">
                                <label for="news-title" class="block text-sm font-medium text-white/90">
                                    Título principal <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="news-title" name="title" required
                                       class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white placeholder-slate-500 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 transition-all duration-300"
                                       placeholder="Escribe el título aquí">
                            </div>


                            <!-- Categorías -->
                            <div>
                                <label class="block text-sm font-medium text-slate-400 mb-2">Categorías</label>
                                <div class="flex flex-wrap gap-2">
                                    @php
                                        $categories = [
                                            ['name' => 'Tecnología', 'icon' => 'fa-laptop-code', 'color' => 'blue'],
                                            ['name' => 'Deportes', 'icon' => 'fa-futbol', 'color' => 'green'],
                                            ['name' => 'Cultura', 'icon' => 'fa-landmark', 'color' => 'purple'],
                                            ['name' => 'Economía', 'icon' => 'fa-chart-line', 'color' => 'amber'],
                                        ];
                                    @endphp
                                    @foreach($categories as $category)
                                        <button type="button"
                                                class="category-btn group px-3 py-1.5 rounded-full text-xs font-medium flex items-center gap-1.5 bg-{{$category['color']}}-900/40 text-{{$category['color']}}-300 hover:bg-{{$category['color']}}-800/70 hover:text-white hover:shadow-md transition-all duration-300 focus:ring-2 focus:ring-{{$category['color']}}-500 focus:outline-none">
                                            <i class="fas {{ $category['icon'] }}"></i>
                                            <span>{{ $category['name'] }}</span>
                                        </button>
                                    @endforeach
                                    <button type="button"
                                            class="group px-3 py-1.5 rounded-full text-xs font-medium flex items-center gap-1.5 bg-slate-700 text-slate-300 hover:bg-indigo-900/50 hover:text-indigo-300 hover:shadow-md transition-all duration-300 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                                        <i class="fas fa-plus text-[10px] group-hover:rotate-90 transition-transform duration-300"></i>
                                        <span>Nueva</span>
                                    </button>
                                </div>
                                <input type="hidden" name="category" id="selected-category">
                            </div>

                            <!-- Editor con placeholder personalizado -->
                            <div>
                                <label class="block text-sm font-medium text-slate-400 mb-2">Contenido</label>
                                <div class="editor-container rounded-xl overflow-hidden border border-slate-700 shadow-sm transition-all hover:shadow-lg">
                                    <div class="editor-toolbar bg-slate-900/70 p-2 border-b border-slate-700 flex flex-wrap gap-1">
                                        <div class="flex items-center bg-slate-800 rounded-lg p-0.5 space-x-0.5">
                                            <button type="button" class="toolbar-btn p-2 hover:bg-slate-700 rounded-md transition" data-command="bold" title="Negrita"><i class="fas fa-bold"></i></button>
                                            <button type="button" class="toolbar-btn p-2 hover:bg-slate-700 rounded-md transition" data-command="italic" title="Cursiva"><i class="fas fa-italic"></i></button>
                                            <button type="button" class="toolbar-btn p-2 hover:bg-slate-700 rounded-md transition" data-command="underline" title="Subrayado"><i class="fas fa-underline"></i></button>
                                        </div>
                                    </div>
                                    <div id="editor-content" class="editor-content bg-slate-800 min-h-[300px] p-5 text-white focus:outline-none"
                                         contenteditable="true"
                                         data-placeholder="Escribe tu contenido increíble aquí...">
                                    </div>
                                </div>
                            </div>

                            <!-- Tags -->
                            <div>
                                <label class="block text-sm font-medium text-slate-400 mb-2">Etiquetas (Tags)</label>
                                <div class="tags-container flex flex-wrap items-center gap-2 p-3 rounded-xl bg-slate-800 border border-slate-700 focus-within:ring-4 focus-within:ring-indigo-500/20 transition-all duration-300">
                    <span class="tag-item px-3 py-1 rounded-lg text-xs font-medium bg-indigo-900/40 text-indigo-300 flex items-center">
                        blockchain
                        <button type="button" class="ml-1.5 text-indigo-400 hover:text-indigo-200 text-xs">
                            <i class="fas fa-times-circle"></i>
                        </button>
                    </span>
                                    <input type="text" id="tag-input" placeholder="Añadir etiqueta y presionar Enter..."
                                           class="tag-input flex-1 min-w-[150px] bg-transparent text-sm text-slate-300 placeholder-slate-500 py-1 outline-none">
                                </div>
                            </div>

                            <!-- Multimedia -->
                            <div>
                                <label class="block text-sm font-medium text-slate-400 mb-2">Imagen Principal / Multimedia</label>
                                <div class="relative">
                                    <div id="drag-drop-zone"
                                         class="border-2 border-dashed border-slate-600 rounded-2xl p-8 text-center transition-all duration-300 hover:border-indigo-500 hover:bg-indigo-900/10 cursor-pointer">
                                        <input type="file" multiple class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" id="file-upload-input">
                                        <div class="flex flex-col items-center justify-center space-y-4 text-slate-400">
                                            <div class="p-4 rounded-full bg-gradient-to-br from-indigo-500 to-purple-600 text-white shadow-lg shadow-indigo-500/40">
                                                <i class="fas fa-cloud-upload-alt text-3xl"></i>
                                            </div>
                                            <p><span class="text-indigo-400">Haz clic</span> o <span class="font-semibold">arrastra y suelta</span> archivos aquí</p>
                                            <p class="text-xs text-slate-500">PNG, JPG, GIF, MP4 | Máx. 50MB</p>
                                        </div>
                                    </div>
                                    <div id="upload-preview" class="grid grid-cols-3 sm:grid-cols-4 gap-4 mt-4"></div>
                                </div>
                            </div>

                            <!-- Programación -->
                            <div class="p-5 rounded-xl bg-slate-800/60 border border-slate-700">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex items-center gap-2 text-slate-300">
                                        <i class="fas fa-calendar-alt text-indigo-400"></i>
                                        <span class="text-sm">Programar publicación</span>
                                    </div>
                                    <label for="schedule-toggle" class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" id="schedule-toggle" class="sr-only peer">
                                        <div class="w-11 h-6 bg-slate-700 rounded-full peer peer-checked:bg-indigo-600 relative">
                                            <div class="absolute top-0.5 left-0.5 bg-white rounded-full w-5 h-5 transition-transform peer-checked:translate-x-5"></div>
                                        </div>
                                    </label>
                                </div>
                                <div id="schedule-controls" class="grid grid-cols-1 sm:grid-cols-2 gap-3 max-h-0 opacity-0 overflow-hidden transition-all duration-300 peer-checked:max-h-40 peer-checked:opacity-100">
                                    <input type="date" class="w-full p-2.5 rounded-lg bg-slate-800 border border-slate-700 text-sm text-white">
                                    <input type="time" class="w-full p-2.5 rounded-lg bg-slate-800 border border-slate-700 text-sm text-white">
                                </div>
                            </div>

                            <!-- Botones -->
                            <div class="flex flex-wrap justify-end gap-3 pt-4">
                                <button type="button"
                                        class="px-5 py-2.5 rounded-xl bg-slate-700 text-slate-300 hover:bg-slate-600 transition hover:shadow-md transform hover:scale-105 focus:outline-none">
                                    Guardar Borrador
                                </button>
                                <button type="button"
                                        class="px-5 py-2.5 rounded-xl bg-slate-700 text-slate-300 hover:bg-slate-600 transition hover:shadow-md transform hover:scale-105 focus:outline-none">
                                    Vista Previa
                                </button>
                                <button type="submit"
                                        class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold shadow-lg hover:shadow-xl transition transform hover:scale-105 focus:outline-none">
                    <span class="flex items-center gap-2">
                        Publicar Noticia <i class="fas fa-rocket"></i>
                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <style>
                    /* Placeholder para editor de contenido */
                    .editor-content[contenteditable=true]:empty:before {
                        content: attr(data-placeholder);
                        color: #9ca3af; /* gris-400 */
                        pointer-events: none;
                        display: block;
                    }
                    .dark .editor-content[contenteditable=true]:empty:before {
                        color: #6b7280; /* gris-500 */
                    }

                    /* Animación Gradiente para el encabezado */
                    @keyframes gradient-x {
                        0%, 100% { background-position: 0% 50%; }
                        50% { background-position: 100% 50%; }
                    }
                    .animate-gradient-x {
                        background-size: 200% 200%;
                        animation: gradient-x 5s ease infinite;
                    }

                    /* Animación pulso lento para la tarjeta */
                    @keyframes pulse-slow {
                        0%, 100% { opacity: 1; transform: scale(1); }
                        50% { opacity: 0.95; transform: scale(1.005); }
                    }
                    .animate-pulse-slow {
                        animation: pulse-slow 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
                    }

                    /* Scrollbar personalizada */
                    ::-webkit-scrollbar {
                        width: 8px;
                        height: 8px;
                    }
                    ::-webkit-scrollbar-track {
                        background: transparent;
                    }
                    ::-webkit-scrollbar-thumb {
                        background-color: rgba(165, 180, 252, 0.5);
                        border-radius: 10px;
                        border: 2px solid transparent;
                        background-clip: content-box;
                    }
                    ::-webkit-scrollbar-thumb:hover {
                        background-color: rgba(129, 140, 248, 0.7);
                    }
                    .dark ::-webkit-scrollbar-thumb {
                        background-color: rgba(99, 102, 241, 0.4);
                    }
                    .dark ::-webkit-scrollbar-thumb:hover {
                        background-color: rgba(79, 70, 229, 0.6);
                    }

                    /* Efecto hover más suave para los botones */
                    .category-btn, .toolbar-btn, .tag-item {
                        transition: all 0.2s ease;
                    }

                    /* Mejora en el foco de los inputs */
                    input:focus, textarea:focus, [contenteditable]:focus {
                        outline: none;
                        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.3);
                    }
                </style>
                <div class="xl:col-span-7">
                    <div class="backdrop-blur-lg bg-white/60 dark:bg-slate-800/70 rounded-3xl shadow-2xl dark:shadow-black/30 border border-white/20 dark:border-slate-700/30 overflow-hidden transition-all duration-500 hover:shadow-indigo-500/10 dark:hover:shadow-indigo-700/20">
                        <div class="p-6 border-b border-slate-200/50 dark:border-slate-700/50">
                            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                                <div class="flex items-center space-x-4">
                                    <div class="p-3 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 text-white shadow-lg shadow-indigo-500/30">
                                        <i class="fas fa-list-alt text-2xl"></i>
                                    </div>
                                    <h2 class="text-2xl font-bold text-slate-800 dark:text-slate-100">
                                        Noticias Recientes
                                    </h2>
                                </div>
                                <div class="flex items-center gap-3 w-full md:w-auto">
                                    <div class="relative flex-1 md:w-72">
                                        <input type="text"
                                               class="w-full pl-10 pr-4 py-3 rounded-xl bg-white/80 dark:bg-slate-700/60 border-2 border-slate-200 dark:border-slate-600 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 dark:focus:ring-indigo-600/30 outline-none transition-all duration-300 text-slate-800 dark:text-slate-200 placeholder-slate-400 dark:placeholder-slate-500 text-sm"
                                               placeholder="Buscar por título, contenido...">
                                        <i class="fas fa-search absolute left-3.5 top-1/2 transform -translate-y-1/2 text-slate-400 dark:text-slate-500"></i>
                                    </div>
                                    <button id="filter-toggle-btn" class="filter-btn p-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-white/80 dark:bg-slate-700/60 hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors relative group shrink-0">
                                        <i class="fas fa-filter text-slate-500 dark:text-slate-400 group-hover:text-indigo-500 transition-colors"></i>
                                        {{-- Indicador de filtros activos (opcional) --}}
                                        {{-- <span class="absolute -top-1 -right-1 h-2.5 w-2.5 bg-indigo-500 rounded-full border border-white dark:border-slate-800"></span> --}}
                                    </button>
                                </div>
                            </div>

                            <div id="filter-panel" class="filter-panel transition-all duration-300 ease-in-out max-h-0 opacity-0 overflow-hidden mt-4 p-4 bg-slate-50 dark:bg-slate-700/50 rounded-xl border border-slate-200 dark:border-slate-600">
                                {{-- Contenido del panel aquí --}}
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div>
                                        <label for="filter-status" class="block text-xs font-medium text-slate-600 dark:text-slate-400 mb-1">Estado</label>
                                        <select id="filter-status" class="w-full p-2.5 rounded-lg bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                            <option value="">Todos</option>
                                            <option value="published">Publicado</option>
                                            <option value="draft">Borrador</option>
                                            <option value="scheduled">Programado</option>
                                            <option value="pending">Pendiente</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="filter-category" class="block text-xs font-medium text-slate-600 dark:text-slate-400 mb-1">Categoría</label>
                                        <select id="filter-category" class="w-full p-2.5 rounded-lg bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                            <option value="">Todas</option>
                                            <option value="tech">Tecnología</option>
                                            <option value="sports">Deportes</option>
                                            <option value="culture">Cultura</option>
                                            <option value="economy">Economía</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="filter-date" class="block text-xs font-medium text-slate-600 dark:text-slate-400 mb-1">Fecha</label>
                                        <select id="filter-date" class="w-full p-2.5 rounded-lg bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                            <option value="">Cualquier fecha</option>
                                            <option value="today">Hoy</option>
                                            <option value="week">Esta semana</option>
                                            <option value="month">Este mes</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="flex justify-end mt-4 space-x-3">
                                    <button type="button" class="px-4 py-2 rounded-lg bg-slate-200 dark:bg-slate-600 text-slate-700 dark:text-slate-300 text-sm hover:bg-slate-300 dark:hover:bg-slate-500 transition-colors">
                                        Limpiar
                                    </button>
                                    <button type="button" class="px-4 py-2 rounded-lg bg-gradient-to-r from-indigo-500 to-purple-600 text-white text-sm hover:opacity-90 transition-opacity">
                                        Aplicar Filtros
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="overflow-x-auto relative max-h-[calc(100vh-420px)] {{-- Ajusta esta altura según sea necesario --}}">
                            <table class="w-full text-sm text-left text-slate-500 dark:text-slate-400">
                                <thead class="text-xs text-slate-700 dark:text-slate-300 uppercase bg-slate-50 dark:bg-slate-700/50 sticky top-0 z-10 backdrop-blur-sm">
                                <tr>
                                    <th scope="col" class="px-6 py-3 font-semibold cursor-pointer hover:bg-slate-100 dark:hover:bg-slate-600/50 transition-colors">
                                        <span class="flex items-center">
                                            Título <i class="fas fa-sort ml-1.5 text-[10px] opacity-70"></i>
                                        </span>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center font-semibold cursor-pointer hover:bg-slate-100 dark:hover:bg-slate-600/50 transition-colors">
                                        <span class="flex items-center justify-center">
                                           Categoría <i class="fas fa-sort ml-1.5 text-[10px] opacity-70"></i>
                                        </span>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center font-semibold cursor-pointer hover:bg-slate-100 dark:hover:bg-slate-600/50 transition-colors">
                                        <span class="flex items-center justify-center">
                                           Estado <i class="fas fa-sort ml-1.5 text-[10px] opacity-70"></i>
                                        </span>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center font-semibold cursor-pointer hover:bg-slate-100 dark:hover:bg-slate-600/50 transition-colors">
                                        <span class="flex items-center justify-center">
                                           Fecha <i class="fas fa-sort-amount-down-alt ml-1.5 text-[10px] opacity-70"></i>
                                        </span>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center font-semibold">
                                        Acciones
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-200/50 dark:divide-slate-700/50">
                                {{-- Filas de ejemplo (reemplazar con datos reales de Blade) --}}
                                @for ($i = 1; $i <= 10; $i++)
                                    <tr class="bg-white dark:bg-slate-800/50 hover:bg-slate-50/50 dark:hover:bg-slate-700/40 transition-colors duration-150 ease-in-out">
                                        <td class="px-6 py-4 font-medium text-slate-900 dark:text-white whitespace-nowrap max-w-xs truncate">
                                            Noticia de Ejemplo Muy Larga Número {{ $i }} para Probar El Truncado
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            @php $cat = $categories[array_rand($categories)]; @endphp
                                            <span class="inline-flex items-center gap-1.5 rounded-full px-2 py-1 text-xs font-medium bg-{{$cat['color']}}-100 text-{{$cat['color']}}-800 dark:bg-{{$cat['color']}}-900/50 dark:text-{{$cat['color']}}-300">
                                            <i class="fas {{ $cat['icon'] }} text-{{$cat['color']}}-500"></i>
                                            {{ $cat['name'] }}
                                        </span>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            @php
                                                $statuses = [
                                                    'published' => ['text' => 'Publicado', 'color' => 'green', 'icon' => 'fa-check-circle'],
                                                    'draft' => ['text' => 'Borrador', 'color' => 'yellow', 'icon' => 'fa-pencil-alt'],
                                                    'scheduled' => ['text' => 'Programado', 'color' => 'blue', 'icon' => 'fa-clock'],
                                                    'pending' => ['text' => 'Pendiente', 'color' => 'orange', 'icon' => 'fa-hourglass-half'],
                                                ];
                                                $status = $statuses[array_rand($statuses)];
                                            @endphp
                                            <span class="inline-flex items-center rounded-full bg-{{$status['color']}}-100 dark:bg-{{$status['color']}}-900/50 px-2.5 py-0.5 text-xs font-medium text-{{$status['color']}}-800 dark:text-{{$status['color']}}-300">
                                            <i class="fas {{ $status['icon'] }} mr-1.5 text-{{$status['color']}}-500"></i>
                                            {{ $status['text'] }}
                                        </span>
                                        </td>
                                        <td class="px-6 py-4 text-center text-slate-500 dark:text-slate-400">
                                            {{ date('d/m/Y', strtotime("-$i days")) }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <div class="flex items-center justify-center space-x-2">
                                                <button class="p-2 rounded-lg text-blue-500 hover:bg-blue-100 dark:hover:bg-blue-900/50 transition-colors" title="Editar">
                                                    <i class="fas fa-pencil-alt fa-fw"></i>
                                                </button>
                                                <button class="p-2 rounded-lg text-red-500 hover:bg-red-100 dark:hover:bg-red-900/50 transition-colors" title="Eliminar">
                                                    <i class="fas fa-trash-alt fa-fw"></i>
                                                </button>
                                                <button class="p-2 rounded-lg text-gray-500 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors" title="Ver">
                                                    <i class="fas fa-eye fa-fw"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endfor
                                </tbody>
                            </table>
                        </div>
                        <div class="p-4 border-t border-slate-200/50 dark:border-slate-700/50 bg-slate-50/50 dark:bg-slate-800/20 flex items-center justify-between">
                         <span class="text-xs text-slate-500 dark:text-slate-400">
                            Mostrando 1-10 de 57 resultados
                        </span>
                            <div class="inline-flex rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 overflow-hidden">
                                <button class="px-3 py-1.5 text-sm font-medium text-slate-500 bg-white dark:bg-slate-800 hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors disabled:opacity-50" disabled>
                                    <i class="fas fa-chevron-left"></i>
                                </button>
                                <button class="px-3 py-1.5 text-sm font-medium text-slate-700 dark:text-slate-300 bg-white dark:bg-slate-800 border-l border-r border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors">
                                    1
                                </button>
                                <button class="px-3 py-1.5 text-sm font-medium text-slate-500 bg-white dark:bg-slate-800 border-r border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors">
                                    2
                                </button>
                                <button class="px-3 py-1.5 text-sm font-medium text-slate-500 bg-white dark:bg-slate-800 border-r border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors">
                                    3
                                </button>
                                <span class="px-3 py-1.5 text-sm font-medium text-slate-400 bg-white dark:bg-slate-800 border-r border-slate-200 dark:border-slate-700">...</span>
                                <button class="px-3 py-1.5 text-sm font-medium text-slate-500 bg-white dark:bg-slate-800 border-r border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors">
                                    6
                                </button>
                                <button class="px-3 py-1.5 text-sm font-medium text-slate-500 bg-white dark:bg-slate-800 hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div> </div> </div> </div> {{-- Scripts (necesitarás JS para interactividad) --}}
    <script>
        // --- Dark Mode Toggle (Ejemplo básico, usa tu implementación) ---
        const darkModeToggle = document.querySelector('.dark-mode-toggle');
        darkModeToggle.addEventListener('click', () => {
            document.documentElement.classList.toggle('dark');
            // Aquí guardarías la preferencia (localStorage, etc.)
        });

        // --- Toggle Panel de Filtros ---
        const filterBtn = document.getElementById('filter-toggle-btn');
        const filterPanel = document.getElementById('filter-panel');
        if (filterBtn && filterPanel) {
            filterBtn.addEventListener('click', () => {
                const isHidden = filterPanel.classList.contains('max-h-0');
                if (isHidden) {
                    filterPanel.classList.remove('max-h-0', 'opacity-0');
                    filterPanel.classList.add('max-h-96', 'opacity-100', 'mt-4', 'p-4'); // Ajusta max-h según necesites
                } else {
                    filterPanel.classList.remove('max-h-96', 'opacity-100', 'mt-4', 'p-4');
                    filterPanel.classList.add('max-h-0', 'opacity-0');
                }
            });
        }

        // --- Placeholder para Editor ContentEditable ---
        const editor = document.getElementById('editor-content');
        if(editor){
            const placeholder = editor.getAttribute('data-placeholder');
            editor.addEventListener('focus', () => {
                if (editor.textContent === placeholder) {
                    // Podrías querer limpiar el texto o manejarlo de otra forma
                }
                editor.style.color = ''; // Restaura color normal
            });
            editor.addEventListener('blur', () => {
                if (editor.textContent.trim() === '') {
                    // editor.textContent = placeholder;
                    // editor.style.color = '#9ca3af'; // Color del placeholder (ajusta)
                    // Mejor usar un pseudo-elemento ::before con CSS para el placeholder
                }
            });
            // Inicialización (opcional, mejor con CSS)
            // if (editor.textContent.trim() === '') {
            //     editor.textContent = placeholder;
            //     editor.style.color = '#9ca3af';
            // }
        }

        // --- Toggle de Programación ---
        const scheduleToggle = document.getElementById('schedule-toggle');
        const scheduleControls = document.getElementById('schedule-controls');
        if(scheduleToggle && scheduleControls) {
            scheduleToggle.addEventListener('change', function() {
                if (this.checked) {
                    scheduleControls.style.maxHeight = scheduleControls.scrollHeight + "px";
                    scheduleControls.style.opacity = 1;
                    scheduleControls.style.marginTop = '0.75rem'; // Ajusta si es necesario
                } else {
                    scheduleControls.style.maxHeight = '0';
                    scheduleControls.style.opacity = 0;
                    scheduleControls.style.marginTop = '0';
                }
            });
            // Para que funcione la animación inicial si está checked por defecto
            if (scheduleToggle.checked) {
                scheduleControls.style.maxHeight = scheduleControls.scrollHeight + "px";
                scheduleControls.style.opacity = 1;
                scheduleControls.style.marginTop = '0.75rem';
            }
        }

        // --- Lógica adicional necesaria (con JS más avanzado o Alpine.js): ---
        // - Manejo de comandos del editor enriquecido (document.execCommand o librerías como TipTap/Quill).
        // - Selección y almacenamiento de categoría activa.
        // - Añadir/eliminar etiquetas (tags).
        // - Manejo de subida de archivos (drag & drop, previsualización, eliminación).
        // - Aplicación real de filtros y búsqueda.
        // - Paginación y ordenamiento de la tabla.

        // --- Ejemplo básico para botones de categoría (solo visual) ---
        const categoryButtons = document.querySelectorAll('.category-btn');
        const selectedCategoryInput = document.getElementById('selected-category');

        categoryButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Quita la clase 'active' o estilo de selección de todos
                categoryButtons.forEach(btn => {
                    btn.classList.remove('ring-2', 'ring-offset-2', 'dark:ring-offset-slate-800'); // Quita estilos de selección
                    // Restaura colores base si los cambiaste mucho
                });

                // Añade estilo al seleccionado
                button.classList.add('ring-2', 'ring-offset-2', 'dark:ring-offset-slate-800'); // Añade anillo de selección
                // Extrae el color del botón para el anillo (más complejo, ejemplo con índigo)
                button.classList.add('ring-indigo-500');

                // Guarda el valor (ejemplo: texto del span)
                if (selectedCategoryInput) {
                    selectedCategoryInput.value = button.querySelector('span').textContent;
                }
            });
        });

    </script>

    {{-- Añade CSS para el placeholder del editor si prefieres esa técnica --}}
    <style>
        .editor-content[contenteditable=true]:empty:before {
            content: attr(data-placeholder);
            color: #9ca3af; /* gris-400 */
            pointer-events: none;
            display: block; /* or inline-block */
        }
        .dark .editor-content[contenteditable=true]:empty:before {
            color: #6b7280; /* gris-500 */
        }

        /* Animación Gradiente para el Título */
        @keyframes gradient-x {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        .animate-gradient-x {
            background-size: 200% 200%;
            animation: gradient-x 5s ease infinite;
        }

        /* Animación pulso lento */
        @keyframes pulse-slow {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.9; transform: scale(1.03); }
        }
        .animate-pulse-slow {
            animation: pulse-slow 2.5s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        /* Estilos para scrollbar (opcional, mejora estética) */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: transparent;
        }
        ::-webkit-scrollbar-thumb {
            background-color: rgba(165, 180, 252, 0.5); /* indigo-300/50 */
            border-radius: 10px;
            border: 2px solid transparent;
            background-clip: content-box;
        }
        ::-webkit-scrollbar-thumb:hover {
            background-color: rgba(129, 140, 248, 0.7); /* indigo-400/70 */
        }
        .dark ::-webkit-scrollbar-thumb {
            background-color: rgba(99, 102, 241, 0.4); /* indigo-500/40 */
        }
        .dark ::-webkit-scrollbar-thumb:hover {
            background-color: rgba(79, 70, 229, 0.6); /* indigo-600/60 */
        }
    </style>
@endsection
