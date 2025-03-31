@extends('plantillas.doctor.plantilladoc')

@section('title', 'Doctor')

@section('header')
    @include('header.doctor.header')
@endsection

@section('menu')
    <!-- Logo con animación y branding -->
    <div class="flex flex-col items-center py-6 px-4 border-b border-gray-100">
        <a href="{{ route('doctor.dashboard') }}" class="transition-all duration-300 hover:scale-105 active:scale-95">
            <img src="{{ asset('imagen/icon2.png') }}" alt="Logo Médico"
                 class="w-20 h-20 md:w-24 md:h-24 drop-shadow-md rounded-full p-2 bg-white border-2 border-blue-50">
        </a>
        @auth('doctor')
            <div class="mt-3 text-center">
                <h2 class="text-sm font-semibold text-gray-700">Dr. {{ Auth::guard('doctor')->user()->nombre }}</h2>
                <p class="text-xs text-gray-500">Especialidad</p>
            </div>
        @endauth
    </div>

    <!-- Menú de navegación mejorado -->
    <nav class="px-2 py-4 space-y-1">
        <!-- Elemento 1: Dashboard -->
        <div class="relative">
            <a href="{{ route('doctor.dashboard') }}"
               class="flex items-center p-3 rounded-xl transition-all duration-200 group
                      {{ request()->routeIs('doctor.dashboard') || Str::startsWith(request()->url(), route('doctor.dashboard')) || request()->routeIs('editar') || request()->routeIs('eliminar') ?
                         'bg-blue-50/80 text-blue-600 font-medium shadow-inner' :
                         'text-gray-600 hover:bg-gray-50' }}">
                <div class="relative w-8 h-8 flex items-center justify-center mr-3">
                    <div class="absolute inset-0 bg-blue-100 rounded-lg
                              {{ request()->routeIs('doctor.dashboard') || Str::startsWith(request()->url(), route('doctor.dashboard')) || request()->routeIs('editar') || request()->routeIs('eliminar') ?
                                 'opacity-100' : 'opacity-0 group-hover:opacity-100' }}
                              transition-opacity duration-200"></div>
                    <i class="fas fa-calendar-check relative z-10
                       {{ request()->routeIs('doctor.dashboard') || Str::startsWith(request()->url(), route('doctor.dashboard')) || request()->routeIs('editar') || request()->routeIs('eliminar') ?
                          'text-blue-600' : 'text-gray-500' }}"></i>
                </div>
                <span class="flex-1">Mis Citas</span>
                <div class="w-5 h-5 flex items-center justify-center bg-blue-100 rounded-full group-hover:bg-blue-200 transition-colors">
                    <i class="fas fa-chevron-right text-xs text-blue-600 opacity-70
                             group-hover:opacity-100 group-hover:translate-x-0.5 transition-all"></i>
                </div>
            </a>
        </div>

        <!-- Elemento 2: Historial -->
        <div class="relative">
            <a href="{{ route('doctor.historial') }}"
               class="flex items-center p-3 rounded-xl transition-all duration-200 group
                      {{ request()->routeIs('doctor.historial') ?
                         'bg-blue-50/80 text-blue-600 font-medium shadow-inner' :
                         'text-gray-600 hover:bg-gray-50' }}">
                <div class="relative w-8 h-8 flex items-center justify-center mr-3">
                    <div class="absolute inset-0 bg-blue-100 rounded-lg
                              {{ request()->routeIs('doctor.historial') ?
                                 'opacity-100' : 'opacity-0 group-hover:opacity-100' }}
                              transition-opacity duration-200"></div>
                    <i class="fas fa-history relative z-10
                       {{ request()->routeIs('doctor.historial') ?
                          'text-blue-600' : 'text-gray-500' }}"></i>
                </div>
                <span class="flex-1">Historial</span>
                <div class="w-5 h-5 flex items-center justify-center bg-blue-100 rounded-full group-hover:bg-blue-200 transition-colors">
                    <i class="fas fa-chevron-right text-xs text-blue-600 opacity-70
                             group-hover:opacity-100 group-hover:translate-x-0.5 transition-all"></i>
                </div>
            </a>
        </div>

        <!-- Elemento 3: Pacientes -->
        <div class="relative">
            <a href="#"
               class="flex items-center p-3 rounded-xl transition-all duration-200 group text-gray-600 hover:bg-gray-50">
                <div class="relative w-8 h-8 flex items-center justify-center mr-3">
                    <div class="absolute inset-0 bg-blue-100 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-200"></div>
                    <i class="fas fa-user-injured relative z-10 text-gray-500"></i>
                </div>
                <span class="flex-1">Pacientes</span>
                <div class="w-5 h-5 flex items-center justify-center bg-blue-100 rounded-full group-hover:bg-blue-200 transition-colors">
                    <i class="fas fa-chevron-right text-xs text-blue-600 opacity-70
                             group-hover:opacity-100 group-hover:translate-x-0.5 transition-all"></i>
                </div>
            </a>
        </div>

        <!-- Elemento 4: Perfil -->
        <div class="relative">
            <a href="#"
               class="flex items-center p-3 rounded-xl transition-all duration-200 group text-gray-600 hover:bg-gray-50">
                <div class="relative w-8 h-8 flex items-center justify-center mr-3">
                    <div class="absolute inset-0 bg-blue-100 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-200"></div>
                    <i class="fas fa-user-md relative z-10 text-gray-500"></i>
                </div>
                <span class="flex-1">Mi Perfil</span>
                <div class="w-5 h-5 flex items-center justify-center bg-blue-100 rounded-full group-hover:bg-blue-200 transition-colors">
                    <i class="fas fa-chevron-right text-xs text-blue-600 opacity-70
                             group-hover:opacity-100 group-hover:translate-x-0.5 transition-all"></i>
                </div>
            </a>
        </div>
    </nav>

    <!-- Footer del menú -->
    <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-gray-100">
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
           class="flex items-center p-2 text-gray-500 hover:text-red-500 transition-colors">
            <i class="fas fa-sign-out-alt mr-2"></i>
            <span>Cerrar Sesión</span>
        </a>
    </div>

    <!-- Efectos y animaciones -->
    <style>
        .group:hover .group-hover\:translate-x-0\.5 {
            transform: translateX(0.125rem);
        }
        nav a {
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }
        nav a:hover {
            transform: translateX(4px);
        }
        .shadow-inner {
            box-shadow: inset 2px 2px 4px rgba(0,0,0,0.05);
        }
    </style>
@endsection
