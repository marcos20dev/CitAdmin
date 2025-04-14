@extends('plantillas.soporte.menu')

@section('title', 'Gestión de Doctores | Panel Avanzado')

@section('menu')
    @include('vistas.soporte.menu_soporte')
@endsection

@section('soprote')
    <div class="min-h-screen bg-gray-50 dark:bg-gray-900 p-4 md:p-8 transition-colors duration-300">
        <div class="max-w-8xl mx-auto">
            <!-- Header con controles avanzados -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-6">
                <div class="flex-1">
                    <div class="flex items-center gap-4">
                        <h1 class="text-3xl font-bold text-gray-800 dark:text-white">Gestión de Doctores</h1>
                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-indigo-100 text-indigo-800 dark:bg-indigo-900 dark:text-indigo-200">v3.5.2</span>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 mt-2">Panel avanzado de administración de profesionales médicos</p>

                    <!-- Breadcrumb -->
                    <nav class="flex mt-4" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 md:space-x-3">
                            <li class="inline-flex items-center">
                                <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-indigo-600 dark:text-gray-400 dark:hover:text-white">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                                    Inicio
                                </a>
                            </li>
                            <li>
                                <div class="flex items-center">
                                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                    <a href="#" class="ml-1 text-sm font-medium text-gray-700 hover:text-indigo-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Soporte</a>
                                </div>
                            </li>
                            <li aria-current="page">
                                <div class="flex items-center">
                                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                    <span class="ml-1 text-sm font-medium text-indigo-500 md:ml-2 dark:text-indigo-400">Doctores</span>
                                </div>
                            </li>
                        </ol>
                    </nav>
                </div>

                <!-- Controles superiores -->
                <div class="flex flex-col sm:flex-row gap-4 w-full md:w-auto">
                    <button class="flex items-center justify-center gap-2 px-4 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg transition-all duration-300 shadow-md hover:shadow-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Nuevo Doctor
                    </button>
                    <button class="flex items-center justify-center gap-2 px-4 py-2.5 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-200 rounded-lg transition-all duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                        </svg>
                        Exportar
                    </button>
                    <div class="relative">
                        <button id="dropdownFilterButton" class="flex items-center justify-center gap-2 px-4 py-2.5 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-200 rounded-lg transition-all duration-300 w-full">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                            </svg>
                            Filtros
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdownFilter" class="z-10 hidden w-56 p-3 bg-white rounded-lg shadow dark:bg-gray-800 absolute right-0 mt-2">
                            <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">Filtros avanzados</h6>
                            <ul class="space-y-2 text-sm">
                                <li class="flex items-center">
                                    <input id="filter-active" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="filter-active" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Solo activos</label>
                                </li>
                                <li class="flex items-center">
                                    <input id="filter-verified" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="filter-verified" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Verificados</label>
                                </li>
                                <li class="flex items-center">
                                    <input id="filter-new" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="filter-new" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Nuevos (7 días)</label>
                                </li>
                                <li class="pt-2 border-t border-gray-200 dark:border-gray-600">
                                    <button class="w-full px-3 py-1.5 text-sm bg-indigo-600 hover:bg-indigo-700 text-white rounded-md transition-colors duration-200">
                                        Aplicar Filtros
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tarjetas de métricas -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-gradient-to-br from-indigo-50 to-indigo-100 dark:from-indigo-900 dark:to-indigo-950 rounded-xl shadow-sm p-6 border border-indigo-100 dark:border-indigo-800 transition-all duration-300 hover:shadow-md">
                    <div class="flex justify-between">
                        <div>
                            <p class="text-sm font-medium text-indigo-600 dark:text-indigo-300">Total Doctores</p>
                            <p class="text-3xl font-bold text-gray-800 dark:text-white mt-2">{{ count($doctores) }}</p>
                            <p class="text-xs text-indigo-500 dark:text-indigo-400 mt-1">+5.2% vs mes anterior</p>
                        </div>
                        <div class="h-12 w-12 rounded-lg bg-indigo-100 dark:bg-indigo-800 flex items-center justify-center">
                            <svg class="h-6 w-6 text-indigo-600 dark:text-indigo-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-green-50 to-green-100 dark:from-green-900 dark:to-green-950 rounded-xl shadow-sm p-6 border border-green-100 dark:border-green-800 transition-all duration-300 hover:shadow-md">
                    <div class="flex justify-between">
                        <div>
                            <p class="text-sm font-medium text-green-600 dark:text-green-300">Activos</p>
                            <p class="text-3xl font-bold text-gray-800 dark:text-white mt-2">{{ count($doctores) }}</p>
                            <p class="text-xs text-green-500 dark:text-green-400 mt-1">100% del total</p>
                        </div>
                        <div class="h-12 w-12 rounded-lg bg-green-100 dark:bg-green-800 flex items-center justify-center">
                            <svg class="h-6 w-6 text-green-600 dark:text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900 dark:to-blue-950 rounded-xl shadow-sm p-6 border border-blue-100 dark:border-blue-800 transition-all duration-300 hover:shadow-md">
                    <div class="flex justify-between">
                        <div>
                            <p class="text-sm font-medium text-blue-600 dark:text-blue-300">Nuevos (7d)</p>
                            <p class="text-3xl font-bold text-gray-800 dark:text-white mt-2">0</p>
                            <p class="text-xs text-blue-500 dark:text-blue-400 mt-1">+0% vs semana anterior</p>
                        </div>
                        <div class="h-12 w-12 rounded-lg bg-blue-100 dark:bg-blue-800 flex items-center justify-center">
                            <svg class="h-6 w-6 text-blue-600 dark:text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-red-50 to-red-100 dark:from-red-900 dark:to-red-950 rounded-xl shadow-sm p-6 border border-red-100 dark:border-red-800 transition-all duration-300 hover:shadow-md">
                    <div class="flex justify-between">
                        <div>
                            <p class="text-sm font-medium text-red-600 dark:text-red-300">Inactivos</p>
                            <p class="text-3xl font-bold text-gray-800 dark:text-white mt-2">0</p>
                            <p class="text-xs text-red-500 dark:text-red-400 mt-1">0% del total</p>
                        </div>
                        <div class="h-12 w-12 rounded-lg bg-red-100 dark:bg-red-800 flex items-center justify-center">
                            <svg class="h-6 w-6 text-red-600 dark:text-red-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M5.636 5.636l3.536 3.536m0 5.656l-3.536 3.536"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Barra de búsqueda y filtros avanzados -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 mb-8 border border-gray-200 dark:border-gray-700 transition-all duration-300">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <div class="relative w-full md:w-auto flex-1">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="text" id="table-search" class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 p-2.5 transition-all duration-300" placeholder="Buscar doctores...">
                    </div>

                    <div class="flex flex-wrap gap-3 w-full md:w-auto">
                        <select class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 transition-all duration-300">
                            <option selected>Especialidad médica</option>
                            <option>Cardiología</option>
                            <option>Pediatría</option>
                            <option>Neurología</option>
                            <option>Dermatología</option>
                        </select>

                        <select class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 transition-all duration-300">
                            <option selected>Estado</option>
                            <option>Activo</option>
                            <option>Inactivo</option>
                            <option>Verificado</option>
                            <option>Pendiente</option>
                        </select>

                        <select class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 transition-all duration-300">
                            <option selected>Ordenar por</option>
                            <option>Nombre (A-Z)</option>
                            <option>Nombre (Z-A)</option>
                            <option>Recientes primero</option>
                            <option>Antiguos primero</option>
                        </select>

                        <button class="flex items-center justify-center gap-2 px-4 py-2.5 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-200 rounded-lg transition-all duration-300 whitespace-nowrap">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                            </svg>
                            Más filtros
                        </button>
                    </div>
                </div>
            </div>

            <!-- Notificación de éxito -->
            @if(session('success'))
                <div class="bg-green-50 dark:bg-green-900/30 border-l-4 border-green-500 dark:border-green-400 text-green-700 dark:text-green-100 p-4 mb-6 rounded-lg shadow-sm animate-fade-in-down">
                    <div class="flex items-center">
                        <svg class="h-5 w-5 text-green-500 dark:text-green-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <p class="font-medium">{{ session('success') }}</p>
                            <p class="text-sm mt-1">La operación se completó exitosamente.</p>
                        </div>
                        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 dark:bg-green-900/30 text-green-500 dark:text-green-400 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-100 dark:hover:bg-green-900/50 inline-flex h-8 w-8 transition-all duration-300">
                            <span class="sr-only">Cerrar</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            @endif

            <!-- Tarjeta de tabla -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm overflow-hidden border border-gray-200 dark:border-gray-700 transition-all duration-300 hover:shadow-md">
                <!-- Header de tabla -->
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center p-4 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-700/50">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Listado de Doctores</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300">{{ count($doctores) }} profesionales registrados</p>
                    </div>
                    <div class="flex items-center space-x-3 mt-3 md:mt-0">
                        <div class="relative">
                            <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction" class="inline-flex items-center text-gray-500 dark:text-gray-300 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-600 focus:outline-none font-medium rounded-lg text-sm px-4 py-2 transition-all duration-300" type="button">
                                Acciones en lote
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="dropdownAction" class="z-10 hidden bg-white dark:bg-gray-700 divide-y divide-gray-100 dark:divide-gray-600 rounded-lg shadow w-44 border border-gray-200 dark:border-gray-600">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownActionButton">
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Exportar selección</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Activar selección</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Desactivar selección</a>
                                    </li>
                                </ul>
                                <div class="py-1">
                                    <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-red-400 dark:hover:text-white">Eliminar selección</a>
                                </div>
                            </div>
                        </div>
                        <button class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg transition-all duration-300">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Nuevo doctor
                        </button>
                    </div>
                </div>

                <!-- Tabla responsive -->
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-300">
                        <tr>
                            <th scope="col" class="p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-all" type="checkbox" class="w-4 h-4 text-indigo-600 bg-gray-100 border-gray-300 rounded focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-all" class="sr-only">checkbox</label>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Doctor
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Contacto
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Especialidad
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Estado
                            </th>
                            <th scope="col" class="px-6 py-3 text-right">
                                Acciones
                            </th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($doctores as $doctor)
                            <tr class="bg-white hover:bg-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 transition-colors duration-150">
                                <td class="w-4 p-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-table-{{ $doctor->id }}" type="checkbox" class="w-4 h-4 text-indigo-600 bg-gray-100 border-gray-300 rounded focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-table-{{ $doctor->id }}" class="sr-only">checkbox</label>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-indigo-100 dark:bg-indigo-900 flex items-center justify-center">
                                            <span class="text-indigo-600 dark:text-indigo-300 font-medium">{{ substr($doctor->nombre, 0, 1) }}{{ substr($doctor->apellido, 0, 1) }}</span>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $doctor->nombre }} {{ $doctor->apellido }}</div>
                                            <div class="text-sm text-gray-500 dark:text-gray-400">ID: {{ $doctor->id }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 dark:text-white">{{ $doctor->correo }}</div>
                                    <div class="text-sm text-gray-500 dark:text-gray-400">+1 234 567 890</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex flex-wrap gap-1">
                                    <span class="px-2 py-1 text-xs font-semibold leading-tight rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                        Cardiología
                                    </span>
                                        <span class="px-2 py-1 text-xs font-semibold leading-tight rounded-full bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200">
                                        Pediatría
                                    </span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs font-semibold leading-tight rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                    Activo
                                </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex justify-end space-x-3">
                                        <a href="#" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300" data-tooltip-target="tooltip-view-{{ $doctor->id }}">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                        </a>
                                        <div id="tooltip-view-{{ $doctor->id }}" role="tooltip" class="inline-block absolute invisible z-10 py-1 px-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                                            Ver detalles
                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                        </div>

                                        <a href="#" class="text-yellow-600 hover:text-yellow-900 dark:text-yellow-400 dark:hover:text-yellow-300" data-tooltip-target="tooltip-edit-{{ $doctor->id }}">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                        </a>
                                        <div id="tooltip-edit-{{ $doctor->id }}" role="tooltip" class="inline-block absolute invisible z-10 py-1 px-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                                            Editar
                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                        </div>

                                        <form action="{{ route('soporte.eliminarDoctor', $doctor->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este doctor?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300" data-tooltip-target="tooltip-delete-{{ $doctor->id }}">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </form>
                                        <div id="tooltip-delete-{{ $doctor->id }}" role="tooltip" class="inline-block absolute invisible z-10 py-1 px-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                                            Eliminar
                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Paginación avanzada -->
                <div class="bg-white dark:bg-gray-800 px-4 py-3 flex items-center justify-between border-t border-gray-200 dark:border-gray-700 sm:px-6 rounded-b-xl">
                    <div class="flex-1 flex justify-between sm:hidden">
                        <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 dark:hover:bg-gray-700">
                            Anterior
                        </a>
                        <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 dark:hover:bg-gray-700">
                            Siguiente
                        </a>
                    </div>
                    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm text-gray-700 dark:text-gray-300">
                                Mostrando
                                <span class="font-medium">1</span>
                                a
                                <span class="font-medium">10</span>
                                de
                                <span class="font-medium">{{ count($doctores) }}</span>
                                resultados
                            </p>
                        </div>
                        <div>
                            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                                <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-700">
                                    <span class="sr-only">Anterior</span>
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                                <a href="#" aria-current="page" class="z-10 bg-indigo-50 border-indigo-500 text-indigo-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium dark:bg-indigo-900/30 dark:border-indigo-700 dark:text-indigo-300">
                                    1
                                </a>
                                <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-700">
                                    2
                                </a>
                                <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-700">
                                    3
                                </a>
                                <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300">
                                ...
                            </span>
                                <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-700">
                                    8
                                </a>
                                <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-700">
                                    <span class="sr-only">Siguiente</span>
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Panel de estadísticas -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-8">
                <!-- Gráfico de registro de doctores -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 border border-gray-200 dark:border-gray-700 transition-all duration-300 hover:shadow-md">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Registro de Doctores</h3>
                        <select class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block p-2 transition-all duration-300">
                            <option selected>Últimos 12 meses</option>
                            <option>Últimos 6 meses</option>
                            <option>Últimos 3 meses</option>
                            <option>Últimos 30 días</option>
                        </select>
                    </div>
                    <div class="h-64">
                        <!-- Espacio para gráfico (se implementaría con Chart.js o similar) -->
                        <div class="flex items-center justify-center h-full bg-gray-50 dark:bg-gray-700/50 rounded-lg">
                            <p class="text-gray-500 dark:text-gray-400">Gráfico de registros mensuales</p>
                        </div>
                    </div>
                </div>

                <!-- Distribución por especialidad -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 border border-gray-200 dark:border-gray-700 transition-all duration-300 hover:shadow-md">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Distribución por Especialidad</h3>
                        <button class="flex items-center gap-1 text-sm text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-300">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                            </svg>
                            Exportar
                        </button>
                    </div>
                    <div class="h-64">
                        <!-- Espacio para gráfico de pastel -->
                        <div class="flex items-center justify-center h-full bg-gray-50 dark:bg-gray-700/50 rounded-lg">
                            <p class="text-gray-500 dark:text-gray-400">Gráfico de distribución por especialidad</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal base (oculto por defecto) -->
    <div id="modal" class="hidden fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-indigo-100 sm:mx-0 sm:h-10 sm:w-10">
                            <svg class="h-6 w-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Confirmación requerida</h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">¿Estás seguro de que deseas eliminar este doctor? Esta acción no puede deshacerse.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Eliminar
                    </button>
                    <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts para interactividad -->
    <script>
        // Dropdown de filtros
        document.getElementById('dropdownFilterButton').addEventListener('click', function() {
            document.getElementById('dropdownFilter').classList.toggle('hidden');
        });

        // Cerrar dropdown al hacer clic fuera
        window.addEventListener('click', function(e) {
            if (!e.target.matches('#dropdownFilterButton')) {
                var dropdown = document.getElementById('dropdownFilter');
                if (!dropdown.classList.contains('hidden')) {
                    dropdown.classList.add('hidden');
                }
            }
        });

        // Tooltips
        document.querySelectorAll('[data-tooltip-target]').forEach(element => {
            element.addEventListener('mouseenter', function() {
                const tooltipId = this.getAttribute('data-tooltip-target');
                const tooltip = document.getElementById(tooltipId);
                tooltip.classList.remove('invisible', 'opacity-0');
                tooltip.classList.add('visible', 'opacity-100');
            });

            element.addEventListener('mouseleave', function() {
                const tooltipId = this.getAttribute('data-tooltip-target');
                const tooltip = document.getElementById(tooltipId);
                tooltip.classList.add('invisible', 'opacity-0');
                tooltip.classList.remove('visible', 'opacity-100');
            });
        });

        // Modales (ejemplo básico)
        function openModal() {
            document.getElementById('modal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('modal').classList.add('hidden');
        }
    </script>

    <style>
        /* Animaciones */
        .animate-fade-in-down {
            animation: fadeInDown 0.5s ease-out;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Transiciones suaves */
        .transition-all {
            transition-property: all;
        }

        .duration-300 {
            transition-duration: 300ms;
        }

        /* Efectos hover */
        .hover\:shadow-lg:hover {
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        /* Tooltips */
        .tooltip {
            position: absolute;
            top: -40px;
            left: 50%;
            transform: translateX(-50%);
            white-space: nowrap;
        }

        .tooltip-arrow {
            position: absolute;
            bottom: -5px;
            left: 50%;
            margin-left: -5px;
            border-width: 5px 5px 0;
            border-style: solid;
            border-color: #1F2937 transparent transparent;
        }
    </style>
@endsection
