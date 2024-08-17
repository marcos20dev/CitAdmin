<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Horario;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HorarioController extends Controller
{
    public function horario()
    {

        return view('vistas.administrador.horario.AñadirHorario');
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
        $intervalos = $request->input('intervalos');
        $dni_doctor = $request->input('dni');
        $fecha = $request->input('fecha');
        $intervaloTiempo = $request->input('intervalo');

        foreach ($intervalos as $intervalo) {
            Horario::create([
                'dni_doctor' => $dni_doctor,
                'fecha' => $fecha,
                'hora' => $intervalo,
                'intervalo' => $intervaloTiempo,
            ]);
        }

        return response()->json(['success' => true, 'message' => 'Horarios registrados exitosamente.']);
    }

    public function update()
    {
    }

    public function eliminarhorario()
    {
    }
}
