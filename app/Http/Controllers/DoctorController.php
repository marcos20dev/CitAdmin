<?php
namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function doctor()
    {
        return view('doctor.añadirdoctor');
    }

    public function añadirdoctor(Request $request)
    {
        // Validar la solicitud y los datos del formulario
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'correo' => 'required|email|unique:doctores,correo',
            'dni' => 'required|unique:doctores,dni|numeric',
            'especialidad' => 'required',
        ]);

        // Crear una nueva instancia del modelo Doctor
        $doctor = new Doctor();
        
        // Asignar los valores de los campos desde la solicitud
        $doctor->nombre = $request->nombre;
        $doctor->apellido = $request->apellido;
        $doctor->correo = $request->correo;
        $doctor->dni = $request->dni;
        $doctor->especialidad = $request->especialidad;

        // Guardar el nuevo doctor en la base de datos
        $doctor->save();

        // Redirigir a la página deseada después de agregar al doctor
        return redirect()->route('doctor')->with('success', 'Doctor agregado exitosamente.');
    }

    public function eliminarDoctor($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();
        return redirect()->route('doctor')->with('success', 'Doctor eliminado exitosamente.');
    }
}
