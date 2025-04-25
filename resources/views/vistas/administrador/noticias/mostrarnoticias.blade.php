@extends('plantillas.administrador.plantilla')

@section('title', 'Gestión de Noticias')

@section('menu')
    @include('vistas.administrador.menu')
@endsection

@section('content')
    <div class="min-h-screen" style="background-color: rgb(34, 37, 42); padding: 2rem;">
        <div class="max-w-8xl mx-auto">

            <!-- Barra de acciones mejorada -->
            <div class="mb-6 bg-gray-800 p-4 rounded-lg shadow-sm border border-gray-700">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <!-- Buscador y Filtros -->
                    <div class="flex flex-col md:flex-row gap-4 flex-1">
                        <div class="relative flex-1">
                            <input type="text" id="searchInput" class="w-full pl-10 pr-3 py-2 border border-gray-600 rounded-md bg-gray-700 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Buscar noticias...">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                        </div>

                        <select id="filterCategory" class="bg-gray-700 border border-gray-600 text-white rounded-md px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Todas las categorías</option>

                        </select>

                        <select id="filterStatus" class="bg-gray-700 border border-gray-600 text-white rounded-md px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Todos los estados</option>
                            <option value="1">Publicadas</option>
                            <option value="0">Ocultas</option>
                        </select>
                    </div>

                    <!-- Acciones principales -->
                    <div class="flex items-center gap-4">
                        <button id="bulkActionsButton" class="hidden px-4 py-2 bg-gray-700 border border-gray-600 text-white rounded-md hover:bg-gray-600">
                            Acciones en lote
                        </button>
                        <a href="{{ route('noticias') }}" class="flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md transition-colors">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            Nueva Noticia
                        </a>
                    </div>
                </div>
            </div>

            <!-- Tabla de noticias mejorada -->
            <div class="bg-gray-800 shadow overflow-hidden sm:rounded-lg border border-gray-700">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-700">
                        <thead class="bg-gray-800">
                        <tr>
                            <th class="px-4 py-3 w-12 text-center">
                                <input type="checkbox" id="selectAll" class="rounded border-gray-500 bg-gray-700 text-blue-600 focus:ring-blue-500">
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider cursor-pointer sortable" data-sort="titulo">
                                Título <span class="sort-indicator"></span>
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Imagen</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider cursor-pointer sortable" data-sort="categoria">
                                Categoría <span class="sort-indicator"></span>
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider cursor-pointer sortable" data-sort="created_at">
                                Fecha <span class="sort-indicator"></span>
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Etiquetas</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Estadísticas</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider cursor-pointer sortable" data-sort="activo">
                                Estado <span class="sort-indicator"></span>
                            </th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-300 uppercase tracking-wider">Acciones</th>
                        </tr>
                        </thead>
                        <tbody class="bg-gray-800 divide-y divide-gray-700">
                        @forelse($noticias as $noticia)
                            <tr class="hover:bg-gray-750 transition-colors" data-category="{{ $noticia->categoria }}" data-status="{{ $noticia->activo ? '1' : '0' }}">
                                <td class="px-4 py-4 text-center">
                                    <input type="checkbox" class="rowCheckbox rounded border-gray-500 bg-gray-700 text-blue-600 focus:ring-blue-500">
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium text-white">{{ $noticia->titulo }}</div>
                                    <div class="text-sm text-gray-400 mt-1">{{ Str::limit($noticia->descripcion, 70) }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="relative group">
                                        <img class="h-16 w-16 rounded-md object-cover cursor-zoom-in"
                                             src="data:image/jpeg;base64,{{ $noticia->foto }}"
                                             alt="Imagen de noticia"
                                             @click="openLightbox('{{ $noticia->foto }}')">
                                        <div class="absolute inset-0 bg-black bg-opacity-50 hidden group-hover:flex items-center justify-center rounded-md">
                                            <span class="text-white text-sm">Click para ampliar</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                        <span class="px-2 py-1 bg-gray-700 text-gray-300 rounded-md text-sm">
                                            {{ $noticia->categoria ?? 'Sin categoría' }}
                                        </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-300">
                                        {{ $noticia->created_at->format('d M Y') }}
                                    </div>
                                    <div class="text-xs text-gray-500">
                                        {{ $noticia->created_at->diffForHumans() }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-wrap gap-2">
                                        @foreach(explode(',', $noticia->etiquetas) as $etiqueta)
                                            <span class="px-2 py-1 bg-blue-900/20 text-blue-300 rounded-full text-xs">
                                                    {{ trim($etiqueta) }}
                                                </span>
                                        @endforeach
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-col gap-1 text-xs">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/>
                                            </svg>
                                            {{ $noticia->comentarios }}
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                            {{ $noticia->vistas }}
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                            </svg>
                                            {{ $noticia->likes }}
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <button onclick="toggleStatus({{ $noticia->id }})" class="relative inline-flex items-center cursor-pointer">
                                        <span class="sr-only">Toggle status</span>
                                        <div class="w-11 h-6 bg-gray-700 rounded-full shadow-inner transition-colors duration-300 {{ $noticia->activo ? 'bg-green-600' : 'bg-red-600' }}"></div>
                                        <div class="absolute left-0 top-0 w-6 h-6 bg-white rounded-full shadow transform transition-transform duration-300 {{ $noticia->activo ? 'translate-x-6' : 'translate-x-0' }}"></div>
                                    </button>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end space-x-2">
                                        <!-- Botón Editar -->
                                        <a href="{{ route('noticias') }}?edit={{ $noticia->id }}" class="text-blue-400 hover:text-blue-300">
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                        </a>

                                        <!-- Formulario Eliminar -->
                                        <form action="{{ route('eliminar.noticia', $noticia->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-400 hover:text-red-300 transition-colors" onclick="return confirm('¿Estás seguro de eliminar esta noticia?')">
                                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="px-6 py-4 text-center text-gray-400">
                                    No se encontraron noticias
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Paginación -->
                <div class="bg-gray-800 px-4 py-3 border-t border-gray-700 sm:px-6">
                    {{ $noticias->appends(request()->query())->links() }}
                </div>
            </div>
        </div>

        <!-- Modal de confirmación -->
        <div id="confirmationModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50">
            <div class="flex items-center justify-center min-h-screen">
                <div class="bg-gray-800 rounded-lg p-6 max-w-md w-full border border-gray-700">
                    <h3 class="text-lg font-semibold text-white mb-4">¿Confirmar acción?</h3>
                    <p class="text-gray-400 mb-6">Esta acción no se puede deshacer.</p>
                    <div class="flex justify-end gap-4">
                        <button onclick="closeModal()" class="px-4 py-2 text-gray-400 hover:text-white">
                            Cancelar
                        </button>
                        <button id="confirmAction" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                            Confirmar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            // Funcionalidades mejoradas
            document.addEventListener('DOMContentLoaded', function() {
                // Búsqueda y filtrado combinado
                const searchInput = document.getElementById('searchInput');
                const filterCategory = document.getElementById('filterCategory');
                const filterStatus = document.getElementById('filterStatus');

                const filterTable = () => {
                    const searchValue = searchInput.value.toLowerCase();
                    const categoryValue = filterCategory.value.toLowerCase();
                    const statusValue = filterStatus.value;

                    document.querySelectorAll('tbody tr').forEach(row => {
                        const title = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                        const category = row.dataset.category.toLowerCase();
                        const status = row.dataset.status;
                        const matchSearch = title.includes(searchValue);
                        const matchCategory = categoryValue ? category === categoryValue : true;
                        const matchStatus = statusValue ? status === statusValue : true;

                        row.style.display = (matchSearch && matchCategory && matchStatus) ? '' : 'none';
                    });
                };

                [searchInput, filterCategory, filterStatus].forEach(element => {
                    element.addEventListener('input', filterTable);
                });

                // Selección múltiple
                const selectAll = document.getElementById('selectAll');
                const checkboxes = document.querySelectorAll('.rowCheckbox');

                selectAll.addEventListener('change', (e) => {
                    checkboxes.forEach(checkbox => {
                        checkbox.checked = e.target.checked;
                    });
                    toggleBulkActions();
                });

                checkboxes.forEach(checkbox => {
                    checkbox.addEventListener('change', toggleBulkActions);
                });

                function toggleBulkActions() {
                    const checkedCount = document.querySelectorAll('.rowCheckbox:checked').length;
                    document.getElementById('bulkActionsButton').classList.toggle('hidden', checkedCount === 0);
                }

                // Ordenamiento
                document.querySelectorAll('.sortable').forEach(header => {
                    header.addEventListener('click', function() {
                        const sortField = this.dataset.sort;
                        const isAsc = this.classList.contains('asc');
                        window.location.href = "" + `?sort=${sortField}&direction=${isAsc ? 'desc' : 'asc'}`;
                    });
                });

                // Atajo de teclado para búsqueda
                document.addEventListener('keydown', (e) => {
                    if (e.key === '/' && e.target.tagName !== 'INPUT') {
                        e.preventDefault();
                        searchInput.focus();
                    }
                });
            });

            // Toggle estado
            function toggleStatus(id) {
                fetch(`/noticias/${id}/toggle-status`, {
                    method: 'PATCH',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    }
                }).then(response => {
                    if (response.ok) window.location.reload();
                });
            }

            // Manejo de modal de confirmación
            let currentForm;
            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', function() {
                    currentForm = this.closest('form');
                    document.getElementById('confirmationModal').classList.remove('hidden');
                });
            });

            document.getElementById('confirmAction').addEventListener('click', () => {
                currentForm.submit();
            });

            function closeModal() {
                document.getElementById('confirmationModal').classList.add('hidden');
            }

            // Lightbox para imágenes
            function openLightbox(base64Image) {
                // Implementar lógica de lightbox aquí
                console.log('Abrir lightbox con imagen:', base64Image);
            }
        </script>
    @endpush
@endsection
