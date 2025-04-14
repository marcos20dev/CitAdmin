<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especialidad;

class EspecialidadController extends Controller
{
    // Eliminar
    public function destroy($id)
    {
        Especialidad::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Especialidad eliminada correctamente');
    }

// Mostrar formulario de edición
    public function edit($id)
    {
        $especialidad = Especialidad::findOrFail($id);
        $especialidades = \App\Models\Especialidad::paginate(5); // o all(), como lo uses en tu vista
        return view('vistas.soporte.especialiades', compact('especialidad', 'especialidades'));
    }



// Actualizar datos
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'estado' => 'nullable|boolean',
        ]);

        $especialidad = Especialidad::findOrFail($id);
        $especialidad->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'estado' => $request->has('estado'),
        ]);

        return redirect()->route('add.especialidades')->with('success', 'Especialidad actualizada correctamente');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'estado' => 'nullable|boolean',
        ]);

        // Si el checkbox está marcado, 'estado' vendrá como "1", si no, será null
        $estado = $request->has('estado');

        $especialidad = Especialidad::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'estado' => $estado,
        ]);

        return redirect()->back()->with('success', 'Especialidad creada correctamente');
    }

    public function toggleEstado($id)
    {
        $especialidad = Especialidad::findOrFail($id);
        $especialidad->estado = !$especialidad->estado; // Cambia de 1 a 0 o de 0 a 1
        $especialidad->save();

        return redirect()->back()->with('success', 'Estado actualizado correctamente');
    }


}
