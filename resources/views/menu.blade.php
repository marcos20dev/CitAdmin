@extends('layouts.plantilla')

@section('title', 'Noticias ')

@section('login')
<div class="flex">
  <!-- Menú vertical -->
  <div class="w-1/4 bg-gray-200 p-4">
    <h2 class="text-lg font-semibold mb-4">Menú</h2>
    <ul class="space-y-2">
      <li>
        <a href="#" class="block text-blue-500 hover:text-blue-600">Noticia 1</a>
      </li>
      <li>
        <a href="#" class="block text-blue-500 hover:text-blue-600">Noticia 2</a>
      </li>
      <li>
        <a href="#" class="block text-blue-500 hover:text-blue-600">Noticia 3</a>
      </li>
      <li>
        <a href="#" class="block text-blue-500 hover:text-blue-600">Noticia 4</a>
      </li>
      <!-- Agrega más noticias si es necesario -->
    </ul>
  </div>

  <!-- Contenido de las noticias -->
  <div class="w-3/4 p-4">
    <h2 class="text-2xl font-semibold mb-4">Noticias</h2>
    <!-- Aquí puedes agregar el contenido de tus noticias -->
  </div>
</div>
@endsection
