<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    public function destroy(Cita $cita)
    {
        $cita->delete();
    
        return redirect()->back()->with('status');
    }
    
    public function marcarAtendida($id)
    {
        $cita = Cita::findOrFail($id);
        $cita->estado = 1; 
        $cita->save();
    
        return redirect()->back()->with('status');
    }
    
    
    public function filtrar(Request $request)
    {
        $fecha = $request->input('fecha');
        $citas = Cita::whereDate('horarios->fecha', $fecha)->get();
        
        return view('citas.index', compact('citas'));
    }
    
}
