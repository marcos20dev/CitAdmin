<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administrador; // Asegúrate de importar tu modelo de Administrador
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


class SoporteController extends Controller
{

    public function login()
    {
        return view('login.soporte.loginSoporte');
    }

    public function MenuSoporte()
    {
        return view('vistas.soporte.añadircuentas');
    }

    public function verCuentasDoctor()
    {
        $doctores = Doctor::all(); // Asegúrate de que el modelo Doctor está correctamente definido y el namespace importado
        return view('vistas.soporte.ver_cuentasDoctor', compact('doctores'));
    }
    
    public function destroyDoctor($id)
    {
        // Encuentra al doctor por su ID y elimínalo
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();
    
        // Redirecciona de vuelta con un mensaje de éxito
        return redirect()->route('ver.doctores')->with('success', 'Doctor eliminado correctamente.');
    }
    
    public function verCunetasAdministrador() {
        $administradores = Administrador::all(); // Obtiene todos los administradores
        return view('vistas.soporte.ver_cuentas_admins', ['administradores' => $administradores]);
    }
    public function destroyAdministrador($id)
{
    // Encuentra al administrador por su ID y elimínalo
    $administrador = Administrador::findOrFail($id);
    $administrador->delete();

    // Redirecciona de vuelta con un mensaje de éxito
    return redirect()->route('ver.administradores')->with('success', 'Administrador eliminado correctamente.');
}



    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'dni' => 'required|string|max:8|unique:administradores,dni',
            'cargo' => 'required|string|max:255',
            'usuario' => 'required|string|max:255|unique:administradores,usuario',
            'password' => 'required|string|min:6',
            'foto_perfil' => 'nullable|image|max:2048',
        ]);
    
        $administrador = new Administrador($request->all());
        $administrador->password = Hash::make($request['password']);
    
        if ($request->hasFile('foto_perfil')) {
            $imagePath = $request->file('foto_perfil');
            $imageData = file_get_contents($imagePath);
            $administrador->foto_perfil = base64_encode($imageData);
        }
    
        $administrador->save();
    
        return redirect()->route('añadircuentas')->with('success', 'Cuenta de administrador creada correctamente.');
    }
    

    public function inicio(Request $request)
    {
        $credentials = $request->only('email', 'password'); // Asegúrate de que 'email' esté en el formulario de inicio de sesión
    
        if (Auth::guard('soporte')->attempt($credentials)) {
            // Autenticación exitosa
            return redirect()->intended(route('añadircuentas'));
        }
    
        // Autenticación fallida
        return redirect()->back()->withErrors(['email' => 'Las credenciales no coinciden con nuestros registros.']);
    }
    



    public function logout(Request $request)
    {
        Auth::guard('soporte')->logout();
        return redirect()->route('soporte.login');
    }
}
