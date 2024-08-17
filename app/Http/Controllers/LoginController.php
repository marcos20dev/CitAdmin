<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{

    public function OlvidoContraseña()
    {

        return view('init.reset');
    }


    

    public function login(Request $request)
    {
        // Registrar la entrada al método
        Log::info('Inicio del proceso de login');

        // Validación de credenciales de usuario.
        $credentials = $request->validate([
            'usuario' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        // Registrar las credenciales recibidas (opcionalmente puedes omitir esto para evitar problemas de seguridad)
        Log::info('Credenciales recibidas: ', ['usuario' => $credentials['usuario']]);

        // Intento de autenticación con el guard 'admin'.
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            Log::info('Usuario autenticado:', ['id' => Auth::guard('admin')->id()]);
            return redirect()->route('menu');
        }
        

        // Si la autenticación falla, registrar este evento
        Log::warning('Falló la autenticación para el usuario: ' . $credentials['usuario']);

        // En caso de fallo en la autenticación, retorno al formulario con errores.
        return back()->withErrors([  'usuario' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ]);
    }


    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
