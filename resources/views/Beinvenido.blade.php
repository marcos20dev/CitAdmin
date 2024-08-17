@extends('plantillas.administrador.plantilla')

@section('title', 'Dashboard')

@section('menu')
    @include('vistas.administrador.menu')
@endsection

@section('content')
    <br>
    <div class="flex flex-col items-center justify-center h-full text-white">
        <h1 class="text-4xl font-bold mb-4 text-center">¡Bienvenido a nuestro sitio!</h1>
        <img src="{{ asset('recursos/bienvenido.png') }}" alt="Bienvenido" class="w-full h-64 mb-6">
    </div>
@endsection
