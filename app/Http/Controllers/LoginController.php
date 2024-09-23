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
        // Validación de credenciales de usuario.
        $credentials = $request->validate([
            'usuario' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);
    
        // Capturar el estado del checkbox 'remember'.
        $remember = $request->filled('remember');
    
        // Intento de autenticación con el guard 'admin'.
        if (Auth::guard('admin')->attempt($credentials, $remember)) {
            $request->session()->regenerate();
            Log::info('Usuario autenticado:', ['id' => Auth::guard('admin')->id()]);
            return redirect()->route('menu');
        }
    
        // En caso de fallo en la autenticación, retorno al formulario con errores.
        return back()->withErrors([
            'usuario' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
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
