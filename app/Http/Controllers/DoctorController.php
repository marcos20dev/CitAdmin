<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function doctor()
    {
        $doctores = Doctor::all();
        return view('init.doctor.AñadirDoctor', compact('doctores'));
    }

    public function agregar(Request $request)
    {
        // Validar la solicitud y los datos del formulario
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'correo' => 'required|email',
            'dni' => 'required',
            'especialidad' => 'required',
            // Otras reglas de validación según sea necesario
        ]);

        // Crear una nueva instancia del modelo Doctor
        $doctor = new Doctor();

        // Asignar los datos del formulario al modelo Doctor
        $doctor->nombre = $request->nombre;
        $doctor->apellido = $request->apellido;
        $doctor->correo = $request->correo;
        $doctor->dni = $request->dni;
        $doctor->especialidad = $request->especialidad;

        // Guardar el nuevo doctor en la base de datos
        $doctor->save();

        // Redirigir a la página deseada después de guardar el doctor
        return back();
    }



    public function update(Request $request, $id)
    {
     
        $doctor = Doctor::findOrFail($id);

       
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'correo' => 'required|email',
            'dni' => 'required',
            'especialidad' => 'required',
            // Otras reglas de validación según sea necesario
        ]);

        // Actualizar los datos del doctor con los datos del formulario
        $doctor->nombre = $request->nombre;
        $doctor->apellido = $request->apellido;
        $doctor->correo = $request->correo;
        $doctor->dni = $request->dni;
        $doctor->especialidad = $request->especialidad;

        // Guardar los cambios en la base de datos
        $doctor->save();

        // Redirigir a la página deseada después de actualizar el doctor
        return redirect()->route('añadirdoctor')->with('success', 'Doctor actualizado exitosamente');
    }


    public function eliminarDoctor($id)
    {
        // Buscar el doctor por su ID en la base de datos
        $doctor = Doctor::findOrFail($id);

        // Eliminar el doctor
        $doctor->delete();

        // Redirigir a la página deseada después de eliminar el doctor
        return redirect()->route('añadirdoctor')->with('success', 'Doctor eliminado exitosamente');
    }
}
