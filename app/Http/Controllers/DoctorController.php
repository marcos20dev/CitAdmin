<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{

    public function logindoctor()
    {
        return view('login.doctor.logindoctor');
    }

    public function doctor()
    {
        $doctores = Doctor::all();
        return view('vistas.administrador.doctor.AñadirDoctor', compact('doctores'));
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
            'password' => 'required'
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
        $doctor->password = Hash::make($request->password); // Cifrar la contraseña

        // Guardar el nuevo doctor en la base de datos
        $doctor->save();

        // Redirigir a la página deseada después de guardar el doctor
        return back();
    }



    public function update(Request $request, $id)
    {
        $doctor = Doctor::findOrFail($id);

        // Validar la solicitud y los datos del formulario
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'correo' => 'required|email',
            'dni' => 'required',
            'especialidad' => 'required',
            'password' => 'nullable'  // La contraseña es opcional
        ]);

        // Actualizar los datos del doctor con los datos del formulario
        $doctor->nombre = $request->nombre;
        $doctor->apellido = $request->apellido;
        $doctor->correo = $request->correo;
        $doctor->dni = $request->dni;
        $doctor->especialidad = $request->especialidad;

        // Cifrar la nueva contraseña si se proporciona
        if ($request->filled('password')) {
            $doctor->password = Hash::make($request->password);
        }

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





    //login doctor controller

    public function login(Request $request)
    {

        $credentials = $request->validate([
            'correo' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);
    

        if (Auth::guard('doctor')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('doctor.dashboard');
        }
    
        return back()->withErrors([
            'correo' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ]);
    }
    

    public function logout(Request $request)
    {
        Auth::guard('doctor')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('doctor')->with('status', 'Sesión cerrada correctamente');
    }


    public function cita()
    {
        return view('vistas.doctor.cita.cita');
    }

    public function dashboard()
    {
        return view('vistas.doctor.dashboard.dashboard');
    }

    public function historial()
    {
        return view('vistas.doctor.historial.historial');
    }

 

}
