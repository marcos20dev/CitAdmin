<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
use Illuminate\Http\Request;
use App\Models\Administrador; // Asegúrate de importar tu modelo de Administrador
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;


class SoporteController extends Controller
{
    public function buscar(Request $request)
    {
        $query = Administrador::query();

        if ($request->filled('buscar')) {
            $buscar = $request->buscar;
            $query->where(function ($q) use ($buscar) {
                $q->where('nombre', 'like', "%$buscar%")
                    ->orWhere('apellidos', 'like', "%$buscar%")
                    ->orWhere('usuario', 'like', "%$buscar%");
            });
        }

        $administradores = $query->get();

        return view('vistas.soporte.añadircuentas', compact('administradores'));
    }

    public function especialidades(Request $request)
    {
        $busqueda = $request->input('buscar');

        $especialidades = Especialidad::when($busqueda, function ($query, $busqueda) {
            return $query->where('nombre', 'like', "%{$busqueda}%")
                ->orWhere('descripcion', 'like', "%{$busqueda}%");
        })->paginate(8)->withQueryString(); // mantiene la búsqueda al cambiar de página

        return view('vistas.soporte.especialiades', compact('especialidades', 'busqueda'));
    }



    public function login()
    {
        return view('login.soporte.loginSoporte');
    }

    public function MenuSoporte()
    {
        $administradores = Administrador::latest()->paginate(10);
        return view('vistas.soporte.añadircuentas', compact('administradores'));
    }

    public function toggle($id)
    {
        $admin = Administrador::findOrFail($id);
        $admin->activo = !$admin->activo;
        $admin->save();

        return redirect()->back()->with('success', 'Estado de la cuenta actualizado correctamente.');
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
    return redirect()->back()->with('success', 'Administrador eliminado correctamente.');
}

    public function edit($id)
    {
        $adminEditar = Administrador::findOrFail($id);
        $administradores = Administrador::latest()->paginate(10);

        return view('vistas.soporte.añadircuentas', compact('adminEditar', 'administradores'));
    }
    public function update(Request $request, $id)
    {
        $admin = Administrador::findOrFail($id);

        $validated = $request->validate([
            'nombre' => 'required|string|max:255|regex:/^[A-Za-zÁ-Úá-ú\s]+$/',
            'apellidos' => 'required|string|max:255|regex:/^[A-Za-zÁ-Úá-ú\s]+$/',
            'dni' => ['required', 'string', 'size:8', 'regex:/^\d{8}$/', Rule::unique('administradores')->ignore($id)],
            'cargo' => 'required|string|max:255',
            'usuario' => ['required', 'email', 'max:255', Rule::unique('administradores')->ignore($id)],
            'password' => 'nullable|sometimes|string|min:6|confirmed',
            'foto_perfil' => 'nullable|image|mimes:jpeg,png|max:2048',
        ], [
            'nombre.required' => 'El campo nombres es obligatorio.',
            'nombre.regex' => 'Los nombres solo pueden contener letras y espacios.',
            'apellidos.required' => 'El campo apellidos es obligatorio.',
            'apellidos.regex' => 'Los apellidos solo pueden contener letras y espacios.',
            'dni.required' => 'El campo DNI es obligatorio.',
            'dni.size' => 'El DNI debe tener exactamente 8 dígitos.',
            'dni.regex' => 'El DNI debe contener solo números.',
            'dni.unique' => 'Ya existe un administrador con este DNI.',
            'cargo.required' => 'El cargo es obligatorio.',
            'usuario.required' => 'El correo electrónico es obligatorio.',
            'usuario.email' => 'Debe ingresar un correo electrónico válido.',
            'usuario.unique' => 'Ya existe una cuenta con este correo.',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'foto_perfil.image' => 'El archivo debe ser una imagen.',
            'foto_perfil.mimes' => 'Solo se permiten imágenes JPEG y PNG.',
            'foto_perfil.max' => 'La imagen no debe pesar más de 2MB.',
        ]);

        try {
            $admin->nombre = $validated['nombre'];
            $admin->apellidos = $validated['apellidos'];
            $admin->dni = $validated['dni'];
            $admin->cargo = $validated['cargo'];
            $admin->usuario = $validated['usuario'];

            if (!empty($validated['password'])) {
                $admin->password = Hash::make($validated['password']);
            }

            $admin->activo = $request->input('estado') == '1';

            if ($request->hasFile('foto_perfil')) {
                $image = $request->file('foto_perfil');
                $imageData = file_get_contents($image->getRealPath());
                $admin->foto_perfil = base64_encode($imageData);
            }

            $admin->save();

            return redirect()->route('añadircuentas')->with('success', 'Administrador actualizado correctamente.');

        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors([
                'error' => 'Error al actualizar el administrador: ' . $e->getMessage()
            ]);
        }
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255|regex:/^[A-Za-zÁ-Úá-ú\s]+$/',
            'apellidos' => 'required|string|max:255|regex:/^[A-Za-zÁ-Úá-ú\s]+$/',
            'dni' => [
                'required',
                'string',
                'size:8',
                'regex:/^\d{8}$/',
                Rule::unique('administradores', 'dni')
            ],
            'cargo' => 'required|string|max:255',
            'usuario' => [
                'required',
                'email',
                'max:255',
                Rule::unique('administradores', 'usuario')
            ],
            'password' => 'required|string|min:6|confirmed',
            'foto_perfil' => 'nullable|image|mimes:jpeg,png|max:2048',
            'estado' => 'nullable|boolean', // Se puede incluir para validarlo
        ], [
            'nombre.required' => 'El campo nombres es obligatorio.',
            'nombre.regex' => 'Los nombres solo pueden contener letras y espacios.',
            'apellidos.required' => 'El campo apellidos es obligatorio.',
            'apellidos.regex' => 'Los apellidos solo pueden contener letras y espacios.',
            'dni.required' => 'El campo DNI es obligatorio.',
            'dni.size' => 'El DNI debe tener exactamente 8 dígitos.',
            'dni.regex' => 'El DNI debe contener solo números.',
            'dni.unique' => 'Ya existe un administrador con este DNI.',
            'cargo.required' => 'El cargo es obligatorio.',
            'usuario.required' => 'El correo electrónico es obligatorio.',
            'usuario.email' => 'Debe ingresar un correo electrónico válido.',
            'usuario.max' => 'El correo no debe exceder los 255 caracteres.',
            'usuario.unique' => 'Ya existe una cuenta con este correo.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'foto_perfil.image' => 'El archivo debe ser una imagen.',
            'foto_perfil.mimes' => 'Solo se permiten imágenes JPEG y PNG.',
            'foto_perfil.max' => 'La imagen no debe pesar más de 2MB.',
        ]);

        try {
            $administrador = new Administrador();
            $administrador->nombre = $validated['nombre'];
            $administrador->apellidos = $validated['apellidos'];
            $administrador->dni = $validated['dni'];
            $administrador->cargo = $validated['cargo'];
            $administrador->usuario = $validated['usuario'];
            $administrador->password = Hash::make($validated['password']);

            // ✅ Esto detecta correctamente si estado = 1 o 0
            $administrador->activo = $request->input('estado') == '1';

            if ($request->hasFile('foto_perfil')) {
                $image = $request->file('foto_perfil');
                $imageData = file_get_contents($image->getRealPath());
                $administrador->foto_perfil = base64_encode($imageData);
            }

            $administrador->save();

            return redirect()->route('añadircuentas')
                ->with('success', 'Cuenta de administrador creada correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Error al crear el administrador: ' . $e->getMessage()]);
        }
    }


    public function inicio(Request $request)
    {
        $credentials = $request->only('email', 'password'); // Obtener credenciales

        if (Auth::guard('soporte')->attempt($credentials)) {
            session()->regenerate(); // Asegura que la sesión se mantenga

            logger()->info('Usuario autenticado correctamente:', ['user' => Auth::guard('soporte')->user()]);

            return redirect()->intended(route('añadircuentas')); // Redirige después del login
        }

        logger()->error('Error de autenticación: Credenciales incorrectas');

        // Si la autenticación falla
        return redirect()->back()->withErrors(['email' => 'Las credenciales no coinciden con nuestros registros.']);
    }





    public function logout(Request $request)
    {
        Auth::guard('soporte')->logout();
        return redirect()->route('soporte.login');
    }
}
