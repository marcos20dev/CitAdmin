@extends('plantillas.administrador.plantilla')

@section('title', 'Menu Administrativo')

@section('header')
    @include('header.administrador.header')
@endsection

@section('menu')
    <div class="flex flex-col h-full">
        <!-- Logo con efecto hover -->
        <a href="{{ route('menu') }}" class="mx-auto mt-4 mb-8 transition-transform duration-300 hover:scale-110">
            <img src="{{ asset('logo/logo.png') }}" alt="Logo" class="w-24 md:w-32">
        </a>

        <!-- Contenedor de opciones del menú -->
        <div class="flex flex-col flex-grow px-2 space-y-1">
            <!-- Botón "Agregar Noticias" -->
            <div class="group relative">
                <a href="{{ route('noticias') }}" id="btnNoticias"
                   class="flex items-center text-white font-medium py-3 px-4 rounded-lg transition-all duration-300
                           @if (request()->routeIs('noticias') || Str::startsWith(request()->url(), route('noticias')) || request()->routeIs('editar') || request()->routeIs('eliminar'))
                               bg-gray-700 shadow-lg
                           @else
                               hover:bg-gray-700 hover:shadow-lg
                           @endif">
                    <div id="bar-btnNoticias"
                         class="absolute top-0 left-0 h-full bg-blue-400 rounded-r-lg
                               {{ request()->routeIs('noticias') || Str::startsWith(request()->url(), route('noticias')) || request()->routeIs('editar') || request()->routeIs('eliminar') ? 'block' : 'hidden' }}"
                         style="width: 4px;"></div>
                    <i class="fas fa-newspaper mr-3 text-lg text-blue-300 group-hover:text-blue-200"></i>
                    <span class="group-hover:text-blue-100">Agregar Noticias</span>
                </a>
            </div>

            <!-- Botón "Agregar Doctor" -->
            <div class="group relative">
                <a href="{{ route('añadirdoctor') }}" id="btnDoctor"
                   class="flex items-center text-white font-medium py-3 px-4 rounded-lg transition-all duration-300
                           @if (request()->routeIs('añadirdoctor') || request()->routeIs('guardardoctor'))
                               bg-gray-700 shadow-lg
                           @else
                               hover:bg-gray-700 hover:shadow-lg
                           @endif">
                    <div id="bar-btnDoctor"
                         class="absolute top-0 left-0 h-full bg-green-400 rounded-r-lg
                               {{ request()->routeIs('añadirdoctor') || request()->routeIs('guardardoctor') ? 'block' : 'hidden' }}"
                         style="width: 4px;"></div>
                    <i class="fas fa-user-md mr-3 text-lg text-green-300 group-hover:text-green-200"></i>
                    <span class="group-hover:text-green-100">Agregar Doctor</span>
                </a>
            </div>

            <!-- Botón "Agregar Horario" -->
            <div class="group relative">
                <a href="{{ route('añadirhorario') }}" id="btnHorario"
                   class="flex items-center text-white font-medium py-3 px-4 rounded-lg transition-all duration-300
                           @if (request()->routeIs('añadirhorario'))
                               bg-gray-700 shadow-lg
                           @else
                               hover:bg-gray-700 hover:shadow-lg
                           @endif">
                    <div id="bar-btnHorario"
                         class="absolute top-0 left-0 h-full bg-purple-400 rounded-r-lg
                               {{ request()->routeIs('añadirhorario') ? 'block' : 'hidden' }}"
                         style="width: 4px;"></div>
                    <i class="far fa-calendar-alt mr-3 text-lg text-purple-300 group-hover:text-purple-200"></i>
                    <span class="group-hover:text-purple-100">Agregar Horarios</span>
                </a>
            </div>

            <!-- Botón "Asignar Doctor" -->
            <div class="group relative">
                <a href="{{ route('asignardoctor') }}" id="btnAsignar"
                   class="flex items-center text-white font-medium py-3 px-4 rounded-lg transition-all duration-300
                           @if (request()->routeIs('asignardoctor'))
                               bg-gray-700 shadow-lg
                           @else
                               hover:bg-gray-700 hover:shadow-lg
                           @endif">
                    <div id="bar-btnAsignar"
                         class="absolute top-0 left-0 h-full bg-yellow-400 rounded-r-lg
                               {{ request()->routeIs('asignardoctor') ? 'block' : 'hidden' }}"
                         style="width: 4px;"></div>
                    <i class="fas fa-calendar-check mr-3 text-lg text-yellow-300 group-hover:text-yellow-200"></i>
                    <span class="group-hover:text-yellow-100">Asignar Doctor</span>
                </a>
            </div>
        </div>

        <!-- Espacio para posible footer o botón de salida -->
        <div class="mt-auto mb-4 px-2">
            <a href="#" class="flex items-center text-gray-300 hover:text-white py-2 px-4 rounded-lg transition-all">
                <i class="fas fa-sign-out-alt mr-3"></i>
                <span>Cerrar Sesión</span>
            </a>
        </div>
    </div>

    <script>
        // Función para resaltar el botón
        function resaltarBoton(btnId) {
            // Remover la clase de fondo gris de los botones anteriores
            document.querySelectorAll('.bg-gray-700').forEach(btn => {
                btn.classList.remove('bg-gray-700', 'shadow-lg');
            });

            // Establecer el color de fondo gris para el botón clicado
            const btn = document.getElementById(btnId);
            if (btn) {
                btn.classList.add('bg-gray-700', 'shadow-lg');
            }

            // Ocultar todas las barras de indicador
            document.querySelectorAll('[id^="bar-"]').forEach(bar => {
                bar.classList.remove('block');
                bar.classList.add('hidden');
            });

            // Mostrar la barra del botón clicado
            const redBar = document.getElementById('bar-' + btnId);
            if (redBar) {
                redBar.classList.remove('hidden');
                redBar.classList.add('block');
            }
        }

        // Ejecutar la función al cargar la página para resaltar el botón adecuado
        document.addEventListener('DOMContentLoaded', function() {
            const currentRoute = '{{ request()->route()->getName() }}';
            switch (currentRoute) {
                case 'noticias':
                case 'editar':
                case 'eliminar':
                    resaltarBoton('btnNoticias');
                    break;
                case 'añadirdoctor':
                case 'guardardoctor':
                    resaltarBoton('btnDoctor');
                    break;
                case 'añadirhorario':
                    resaltarBoton('btnHorario');
                    break;
                case 'asignardoctor':
                    resaltarBoton('btnAsignar');
                    break;
                default:
                    break;
            }

            // Función para cambiar el resaltado del botón cuando se hace clic
            document.querySelectorAll('[id^="btn"]').forEach(item => {
                item.addEventListener('click', event => {
                    const btnId = event.currentTarget.id;
                    resaltarBoton(btnId);
                });
            });
        });
    </script>
@endsection
