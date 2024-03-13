@extends('layouts.plantilla')

@section('title', 'nav')

@section('submenu')

<div class="max-w-2xl py-5 px-8 flex-grow flex justify-end"> <!-- Alinear el div de noticias a la derecha -->
    <div class="flex flex-wrap justify-center"> <!-- Alinear el contenido de las noticias al centro -->
        @foreach ($noticias->reverse() as $noticia)
            <div class="w-72 max-w-sm rounded overflow-hidden shadow-lg bg-white mx-4 my-4">
                <img class="w-full h-48 object-cover" src="data:image/jpeg;base64,{{ $noticia->foto }}" alt="{{ $noticia->titulo }}">
                <div class="px-6 py-4">
                    <div class="font-bold text-lg mb-2">{{ $noticia->titulo }}</div>
                    <p class="text-sm text-gray-700 mb-2">{{ \Illuminate\Support\Str::limit($noticia->descripcion, 100, $end='...') }}</p>
                    <div class="flex justify-between">
                        <button class="bg-red-700 hover:bg-red-500 text-white font-bold py-1 px-2 rounded"
                            onclick="expandirFormulario({{ $noticia->id }})">
                            Editar
                        </button>
                        <form action="{{ route('eliminar.noticia', ['id' => $noticia->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-gray-700 hover:bg-gray-500 text-white font-bold py-1 px-2 rounded">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div id="formulario{{ $noticia->id }}"
                class="fixed top-2/3 left-1/2 transform -translate-x-1/2 -translate-y-1/2 md:top-1/2 w-full max-w-lg bg-gray-800 bg-opacity-75 flex justify-center items-center"
                style="display: none;" onclick="cerrarFormulario({{ $noticia->id }})">
                <div class="bg-white p-8 rounded-lg overflow-y-auto" onclick="event.stopPropagation()">
                    <div class="flex justify-between">
                        <h2 class="text-2xl font-bold mb-4">Editar Noticia</h2>
                        <button class="text-gray-700 text-2xl" onclick="cerrarFormulario({{ $noticia->id }})">X</button>
                    </div>
                    <form id="form{{ $noticia->id }}" action="{{ route('actualizar.noticia', ['id' => $noticia->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Campos de edición -->
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="titulo">
                                Título:
                            </label>
                            <input type="text" name="titulo" value="{{ $noticia->titulo }}"
                                class="w-full border rounded-md px-3 py-2">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="descripcion">
                                Descripción:
                            </label>
                            <textarea name="descripcion" class="w-full h-35 border rounded-md px-3 py-2 resize-y" style="max-height: 20rem;">{{ $noticia->descripcion }}</textarea>
                        </div>
                        <!-- Campo para cambiar la foto -->
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="foto">
                                Nueva Imagen:
                            </label>
                            <input type="file" name="foto" accept="image/*" class="mt-2" onchange="mostrarImagenSeleccionada(this, {{ $noticia->id }})">
                        </div>
                        <!-- Vista previa de la imagen que se va a actualizar -->
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">
                                Imagen a Actualizar:
                            </label>
                            <img id="imagen{{ $noticia->id }}" class="w-full mb-2" src="data:image/jpeg;base64,{{ $noticia->foto }}" alt="Vista previa de la imagen a actualizar">
                        </div>
                        <!-- Otros campos según sea necesario -->
                        <div class="flex justify-end">
                            <button type="submit"
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Actualizar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <script>
                // Función para mostrar la imagen seleccionada en la vista previa
                function mostrarImagenSeleccionada(input, id) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var imagen = document.getElementById("imagen" + id);
                        imagen.src = e.target.result;
                    }
                    reader.readAsDataURL(input.files[0]);
                }
                // Función para mostrar el formulario de edición
                function expandirFormulario(id) {
                    var formulario = document.getElementById("formulario" + id);
                    formulario.style.display = "flex";
                }
                // Función para cerrar el formulario de edición
                function cerrarFormulario(id) {
                    var formulario = document.getElementById("formulario" + id);
                    formulario.style.display = "none";
                }
            </script>
        @endforeach
    </div>
</div>
@endsection
