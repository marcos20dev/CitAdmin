<?php

namespace App\Http\Controllers;
use App\Models\Noticias;
use Illuminate\Http\Request;
use App\Models\Noticia;


class NoticiaController extends Controller
{
    public function noticias(Request $request)
    {
        $noticias = Noticias::latest()->take(10)->get(); // o paginate si quieres

        $totalVisitas = Noticias::sum('vistas');
        $totalNoticias = Noticias::where('publicada', 1)->count();
        $totalComentarios = Noticias::sum('comentarios');
        $totalCompartidas = Noticias::sum('compartidos');
        $totalNoPublicadas = Noticias::where('publicada', 0)->count();

        $noticiaEdit = null;
        if ($request->has('edit')) {
            $noticiaEdit = Noticias::find($request->edit);
        }

        return view('vistas.administrador.noticias.AñadirNoticia', compact(
            'noticias', 'totalVisitas', 'totalNoticias', 'totalComentarios', 'totalCompartidas', 'totalNoPublicadas', 'noticiaEdit'
        ));
    }



    public function mostrar()
    {
        $noticias = Noticias::orderBy('created_at', 'desc')->paginate(10);
        return view('vistas.administrador.noticias.mostrarnoticias', compact('noticias'));
    }


      public function dashboardStats()
    {
        $totalVisitas = Noticias::sum('vistas');
        $totalNoticias = Noticias::count();
        $totalComentarios = Noticias::sum('comentarios');
        $totalCompartidas = Noticias::sum('compartidos');

        return view('vistas.administrador.dashboard', compact(
            'totalVisitas', 'totalNoticias', 'totalComentarios', 'totalCompartidas'
        ));
    }

    public function agregar(Request $request)
    {
        // Validar entrada
        $request->validate([
            'title' => 'required|max:200|unique:noticias,titulo',
            'category' => 'required|string',
            'contenido' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:51200',
            'publicada' => 'nullable|in:1',
            'tags' => 'nullable|string',
        ]);

        // Crear instancia
        $noticia = new Noticias();
        $noticia->titulo = $request->input('title');
        $noticia->categoria = $request->input('category');
        $noticia->descripcion = $request->input('contenido');
        $noticia->etiquetas = $request->input('tags');
        $noticia->publicada = $request->has('publicada');

        // Imagen sin usar GD
        if ($request->hasFile('foto')) {
            $imagen = $request->file('foto');
            $contenido = file_get_contents($imagen->getRealPath());

            // Limitar manualmente el tamaño si fuera necesario (ejemplo: 300 KB)
            $maxBytes = 300 * 1024;
            if (strlen($contenido) > $maxBytes) {
                $contenido = substr($contenido, 0, $maxBytes);
            }

            $noticia->foto = base64_encode($contenido);
        }

        $noticia->save();

        return redirect()->back()->with('publicada', 'Tu noticia se ha publicado correctamente.');
    }


    public function updateNoticia(Request $request, $id)
    {
        $noticia = Noticias::findOrFail($id);

        $noticia->titulo = $request->input('title');
        $noticia->categoria = $request->input('category');
        $noticia->descripcion = $request->input('contenido');
        $noticia->etiquetas = $request->input('tags'); // ← usar como string plano
        $noticia->publicada = $request->has('publicada');

        if ($request->hasFile('foto')) {
            $noticia->foto = base64_encode(file_get_contents($request->file('foto')->getRealPath()));
        }

        $noticia->save();

        return redirect()->route('noticias')->with('success', 'Noticia actualizada correctamente.');
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
