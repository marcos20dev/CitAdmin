<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Soporte;
class SoporteController extends Controller
{
    public function soporte()
    {
        return view('login.loginsoporte');
    }

    public function MenuSoporte()
    {
        return view('soporte.añadircuentas');
    }

    public function agregarcuentas() {
        
         // Validar la solicitud y los datos del formulario
         $request->validate([
            'Nombre' => 'required|unique:soporte,Nombre',
            'Apellido' => 'required',
            'Correo' => 'requiered',
            'Contraseña' => 'requiered',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Asegúrate de tener una regla de validación para la foto
            // Otras reglas de validación según sea necesario
        ]);

        // Crear una nueva instancia del modelo Noticias
        $soporte = new Soporte();
         
        
        $soporte-> = $request->Nombre;
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


}
