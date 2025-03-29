<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Horario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HorarioController extends Controller
{
    public function horario()
    {
        return view('vistas.administrador.horario.AñadirHorario');
    }

    public function mostrar()
    {
        // Obtener doctores paginados con sus horarios (5 por página)
        $doctores = Doctor::with(['horarios' => function($query) {
            $query->orderBy('fecha', 'desc')
                ->orderBy('hora', 'asc');
        }])->orderBy('nombre')->paginate(7);

        return view('vistas.administrador.horario.MostrarHorario', compact('doctores'));
    }
    public function buscardoctor(Request $request)
    {
        $dni = $request->input('dni');
        $doctor = Doctor::where('dni', $dni)->first();

        if ($doctor) {
            return response()->json([
                'success' => true,
                'nombre' => $doctor->nombre . ' ' . $doctor->apellido,
                'especialidad' => $doctor->especialidad
            ]);
        } else {
            return response()->json(['success' => false, 'message' => 'Doctor no encontrado']);
        }
    }

    public function store(Request $request)
    {
        $intervalos = json_decode($request->input('intervalos'));
        $dni_doctor = $request->input('dni');
        $fecha = $request->input('fecha');
        $intervaloTiempo = $request->input('intervalo');

        $doctor = Doctor::where('dni', $dni_doctor)->first();

        if (!$doctor) {
            return response()->json(['success' => false, 'message' => 'Doctor no encontrado'], 404);
        }

        foreach ($intervalos as $intervalo) {
            Horario::create([
                'doctor_id' => $doctor->id,
                'dni_doctor' => $dni_doctor,
                'fecha' => $fecha,
                'hora' => $intervalo,
                'intervalo' => $intervaloTiempo,
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Horarios registrados exitosamente',
            'redirect' => route('horarios.mostrar')
        ]);
    }

    public function duplicate($id)
    {
        try {
            $horarioOriginal = Horario::findOrFail($id);

            $nuevoHorario = $horarioOriginal->replicate();
            $nuevoHorario->created_at = now();
            $nuevoHorario->updated_at = now();
            $nuevoHorario->save();

            return response()->json([
                'success' => true,
                'message' => 'Horario duplicado exitosamente',
                'redirect' => route('horarios.mostrar')
            ]);

        } catch (\Exception $e) {
            Log::error('Error al duplicar horario: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error al duplicar el horario'
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        // Tu implementación existente para actualizar
    }

    public function eliminarhorario($id)
    {
        try {
            $horario = Horario::findOrFail($id);
            $horario->delete();

            return response()->json([
                'success' => true,
                'message' => 'Horario eliminado correctamente'
            ]);

        } catch (\Exception $e) {
            Log::error('Error al eliminar horario: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el horario'
            ], 500);
        }
    }
}
