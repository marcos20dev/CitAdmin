<?php

namespace App\Http\Controllers;

use App\Models\Noticias;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    public function noticias()
    {
        $noticias = Noticias::all(); // Obtener todas las noticias desde la base de datos
        return view('vistas.administrador.noticias.AñadirNoticia', compact('noticias'));
    }
    
    public function agregar(Request $request){

        // Validar la solicitud y los datos del formulario
        $request->validate([
            'titulo' => 'required|unique:noticias,titulo',
            'descripcion' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Asegúrate de tener una regla de validación para la foto
            // Otras reglas de validación según sea necesario
        ]);

        // Crear una nueva instancia del modelo Noticias
        $noticia = new Noticias();
         
        
        $noticia->titulo = $request->titulo;
        $noticia->descripcion = $request->descripcion;

        // Verificar si se cargó un archivo de imagen y procesarlo si es necesario
        if ($request->hasFile('foto')) {
            // Leer el archivo de imagen en base64
            $imagen = $request->file('foto');
            $base64Image = base64_encode(file_get_contents($imagen));

            // Asignar la imagen en formato base64 a la propiedad correspondiente en el modelo Noticias
            $noticia->foto = $base64Image;
        }

        // Guardar la noticia en la base de datos
        $noticia->save();

        // Redirigir a la página deseada después de guardar la noticia
        return back();
    }



    public function updateNoticia(Request $request, $id)
    {
        $noticia = Noticias::findOrFail($id); // Buscar la noticia por su ID

        // Validar la solicitud y los datos del formulario
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Modificar la regla de validación para la foto
            // Otras reglas de validación según sea necesario
        ]);

        // Actualizar los campos de la noticia con los datos del formulario
        $noticia->titulo = $request->titulo;
        $noticia->descripcion = $request->descripcion;

        // Verificar si se ha enviado una nueva imagen
        if ($request->hasFile('foto')) {
            // Obtener el archivo de imagen
            $imagen = $request->file('foto');

            // Convertir la imagen a base64
            $base64Image = base64_encode(file_get_contents($imagen));

            // Actualizar la propiedad de la imagen con el nuevo valor en base64
            $noticia->foto = $base64Image;
        }

        // Guardar los cambios en la base de datos
        $noticia->save();

        return redirect()->route('noticias')->with('success', 'Noticia actualizada exitosamente');
    }

    public function eliminarNoticia($id)
    {
        // Buscar la noticia por su ID
        $noticia = Noticias::findOrFail($id);

        // Eliminar la noticia de la base de datos
        $noticia->delete();

        // Redirigir a la página de noticias o a donde desees
        return redirect()->route('noticias')->with('success', 'Noticia eliminada exitosamente.');
    }

    
}
