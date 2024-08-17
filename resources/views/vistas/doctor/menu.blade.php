@extends('plantillas.doctor.plantilladoc')

@section('title', 'Doctor')

@section('header')
    @include('header.doctor.header')
@endsection

@section('menu')


    <a href="{{ route('doctor.dashboard') }}" class="mx-auto mt-4 mb-8">
        <img src="{{ asset('imagen/icon2.png') }}" alt="Logo" class="w-24 md:w-32">
    </a>
    <br>

    <div class="flex flex-col">

        <div class="w-full mb-2">
            <a href="{{ route('doctor.dashboard')}}" id="btnNoticias"
                class="inline-block text-black font-normal py-2 px-4 transition-all transform hover:scale-105 @if (request()->routeIs('doctor.dashboard') ||
                        Str::startsWith(request()->url(), route('doctor.dashboard')) ||
                        request()->routeIs('editar') ||
                        request()->routeIs('eliminar')) bg-gray-300 @else bg-transparent @endif w-full relative">
                <div id="bar-btnNoticias"
                    class="absolute top-0 left-0 h-full bg-red-500 {{ request()->routeIs('doctor.dashboard') || Str::startsWith(request()->url(), route('doctor.dashboard')) || request()->routeIs('editar') || request()->routeIs('eliminar') ? 'block' : 'hidden' }}"
                    style="width: 3px;"></div>
                <i class="fas fa-newspaper mr-2 text-gray-600"></i>
                Dashboard
            </a>
            <hr class="border-b border-gray-200 my-2">
        </div>


        <!-- Botón "Agregar Doctor" -->
        <div class="w-full mb-2">
            <a href="{{ route('doctor.cita')}}" id="btnDoctor"
                class="inline-block text-black font-normal py-2 px-4 transition-all transform hover:scale-105 @if (request()->routeIs('doctor.cita')
                 || request()->routeIs('guardardoctor')) bg-gray-300  @else bg-transparent @endif w-full relative">
                <div id="bar-btnDoctor"
                    class="absolute top-0 left-0 h-full bg-red-500 {{ request()->routeIs('doctor.cita') || request()->routeIs('guardardoctor') ? 'block' : 'hidden' }}"
                    style="width: 3px;"></div>
                <i class="fas fa-user-md mr-2 text-gray-600"></i>
                Ver citas
            </a>
            <hr class="border-b border-gray-200 my-2">
        </div>


        <!-- Botón "Agregar Horario" -->
        <div class="w-full mb-2">
            <a href="{{ route('doctor.historial') }}" id="btnHorario"
                class="inline-block text-black font-normal py-2 px-4 transition-all transform hover:scale-105 @if (request()->routeIs('doctor.historial')) bg-gray-300  @else bg-transparent @endif w-full relative">
                <div id="bar-btnHorario"
                    class="absolute top-0 left-0 h-full bg-red-500 {{ request()->routeIs('doctor.historial') ? 'block' : 'hidden' }}"
                    style="width: 3px;"></div>
                <i class="far fa-calendar-alt mr-2 text-gray-600"></i>
                Historial de citas
            </a>
            <hr class="border-b border-gray-200 my-2">
        </div>
    </div>


    <script>
        // Función para resaltar el botón
        function resaltarBoton(btnId) {
            // Remover la clase de fondo gris de los botones anteriores
            document.querySelectorAll('.bg-gray-300').forEach(bar => {
                bar.classList.remove('bg-gray-300');
            });

            // Establecer el color de fondo gris para el botón clicado
            const btn = document.getElementById(btnId);
            btn.classList.add('bg-gray-300');

            // Remover el estilo de la barra roja de los botones anteriores
            document.querySelectorAll('.bg-red-500').forEach(bar => {
                bar.classList.remove('block');
                bar.classList.add('hidden');
            });

            // Mostrar la barra roja en el botón clicado
            const redBar = document.getElementById('bar-' + btnId);
            redBar.classList.remove('hidden');
            redBar.classList.add('block');
        }

        // Ejecutar la función al cargar la página para resaltar el botón adecuado
        const currentRoute = '{{ request()->route()->getName() }}';
        switch (currentRoute) {
            case 'noticias':
                resaltarBoton('btnNoticias');

                break;
            case 'editar':
                resaltarBoton('btnNoticias');
                break;
            case 'eliminar':
                resaltarBoton('btnNoticias');
                break;
            case 'agregar_doctor':
                resaltarBoton('btnDoctor');
                break;
                // Agrega más casos para otros botones si es necesario

            default:
                // Agregar acciones predeterminadas si es necesario
                break;
        }

        // Función para cambiar el resaltado del botón cuando se hace clic
        document.querySelectorAll('.flex a').forEach(item => {
            item.addEventListener('click', event => {
                const btnId = event.target.id;
                resaltarBoton(btnId);
            });
        });
    </script>


@endsection
