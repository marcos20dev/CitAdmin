<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Cita;
use Carbon\Carbon;
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
 
public function mostrarCitas(Request $request)
{
    $estado = $request->input('estado', 0); // Obtiene el estado de la consulta o por defecto 0
    $hoy = Carbon::today()->toDateString(); // Obtiene la fecha actual

    // Filtra las citas para que solo se muestren las del día actual
    $citas = Cita::with('user', 'horario')
                ->whereHas('horario', function($query) use ($hoy) {
                    $query->whereDate('fecha', $hoy);
                })
                ->get();

    if ($request->ajax()) {
        return view('partials.citas', [
            'citas' => $citas->where('estado', $estado)
        ])->render();
    }

    return view('vistas.doctor.dashboard.dashboard', [
        'citas' => $citas->where('estado', $estado),
        'citasTotales' => $citas // Pasar todas las citas para los contadores
    ]);
}
    public function actualizarEstado(Request $request, $id)
{
    $cita = Cita::find($id);

    if ($cita) {
        $cita->estado = 1; // Cambia el estado a atendido
        $cita->save();

        // Obtén todas las citas actualizadas para la vista
        $citas = Cita::where('doctor_id', auth()->id())->get();

        // Calcula los nuevos contadores
        $citasProgramadas = $citas->where('estado', 0)->count();
        $citasAtendidas = $citas->where('estado', 1)->count();

        // Renderiza el HTML actualizado para las citas
        $html = view('partials.citas', compact('citas'))->render();

        return response()->json([
            'success' => true,
            'html' => $html,
            'citasProgramadas' => $citasProgramadas,
            'citasAtendidas' => $citasAtendidas
        ]);
    }

    return response()->json(['success' => false], 404);
}

    
    
 



    public function historial1(Request $request)
    {
        $doctor = Auth::guard('doctor')->user();
        
        // Obtén la fecha desde el parámetro de consulta
        $fecha = $request->query('fecha', date('Y-m-d')); // Por defecto, usa la fecha actual si no se proporciona
    
        // Filtra las citas por la fecha proporcionada
        $citas = Cita::where('doctor_id', $doctor->id)
                     ->whereHas('horario', function($query) use ($fecha) {
                         $query->whereDate('fecha', $fecha);
                     })
                     ->with('horario', 'user')
                     ->get();
    // Pasa las citas a la vista
    return view('vistas.doctor.historial.historial', compact('citas'));
}
public function verTodo()
{
    $doctor = Auth::guard('doctor')->user();
    $citas = Cita::where('doctor_id', $doctor->id)
                 ->with('horario', 'user')
                 ->get();

    // Define una fecha predeterminada, si es necesario
    $fecha = date('Y-m-d');

    // Pasa las citas y la fecha a la vista
    return view('vistas.doctor.historial.historial', compact('citas', 'fecha'));
}

    
     }

