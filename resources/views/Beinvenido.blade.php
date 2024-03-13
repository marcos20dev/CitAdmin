@extends('layouts.plantilla')

@section('title', 'Bienvenido')

@section('menu')
    @include('menu.menu')
@endsection

@section('content')
<div class="flex flex-col items-center justify-center h-full">
    <h1 class="text-4xl font-bold mb-4 text-center">¡Bienvenido a nuestro sitio!</h1>
    <img src="{{ asset('images/welcome.gif') }}" alt="Bienvenido" class="w-64 h-64 mb-6">
    <p class="text-lg text-center">Aquí encontrarás información emocionante y útil sobre nuestros servicios. ¡Explora y descubre todo lo que tenemos para ofrecerte!</p>
</div>
@endsection
