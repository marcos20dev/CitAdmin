<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administrador; // Asegúrate de importar tu modelo de Administrador
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use PgSql\Lob;

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

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nombre' => 'required|string|max:255',
                'apellidos' => 'required|string|max:255',
                'dni' => 'required|string|max:8|unique:administradores,dni',
                'cargo' => 'required|string|max:255',
                'usuario' => 'required|string|max:255|unique:administradores,usuario',
                'password' => 'required|string|min:6',
                'foto_perfil' => 'nullable|image|max:2048',
            ]);

            $administrador = new Administrador($validatedData);
            $administrador->password = Hash::make($validatedData['password']);

            if ($request->hasFile('foto_perfil')) {
                $imagePath = $request->file('foto_perfil');
                $imageData = file_get_contents($imagePath);
                $administrador->foto_perfil = base64_encode($imageData);
            }

            $administrador->save();

            return redirect()->route('alguna.ruta.después.de.guardar')->with('success', 'Cuenta de administrador creada correctamente');
        } catch (\Exception $e) {
            Log::error('Error al crear el administrador: ' . $e->getMessage());
            return back()->withErrors('Error al crear el administrador: ' . $e->getMessage());
        }
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
