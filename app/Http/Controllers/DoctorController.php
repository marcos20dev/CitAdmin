<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Especialidad;
use App\Models\Noticias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Cita;
use App\Models\Paciente;
use App\Models\Horario;
use Carbon\Carbon;

use Illuminate\Support\Facades\Log;


class DoctorController extends Controller
{

public function mostrar()
{

    $doctores = Doctor::orderBy('created_at', 'desc')->paginate(10);
    return view('vistas.administrador.doctor.MostrarDoctor', compact('doctores'));

}
    public function mostrarsearch(Request $request)
    {
        $search = $request->input('search');

        $doctores = Doctor::when($search, function($query, $search) {
            return $query->where('nombre', 'like', "%{$search}%")
                ->orWhere('apellido', 'like', "%{$search}%")
                ->orWhere('dni', 'like', "%{$search}%")
                ->orWhere('especialidad', 'like', "%{$search}%");
        })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('vistas.administrador.doctor.MostrarDoctor', compact('doctores'));
    }
    public function logindoctor()
    {
        return view('login.doctor.logindoctor');
    }

    public function doctor()
    {
        $doctores = Doctor::all();
        $especialidades = Especialidad::where('estado', 1)->orderBy('nombre')->get();

        // Aquí le mandamos doctores + especialidades
        return view('vistas.administrador.doctor.AñadirDoctor', compact('doctores', 'especialidades'));
    }



    public function agregar(Request $request)
    {
        try {
            $request->validate([
                'nombre' => 'required',
                'apellido' => 'required',
                'correo' => 'required|email|unique:doctor,correo',
                'dni' => 'required|unique:doctor,dni',
                'especialidad' => 'required',
                'password' => 'required'
            ]);

            $doctor = new Doctor();
            $doctor->nombre = $request->nombre;
            $doctor->apellido = $request->apellido;
            $doctor->correo = $request->correo;
            $doctor->dni = $request->dni;
            $doctor->especialidad = $request->especialidad;
            $doctor->password = Hash::make($request->password);

            $doctor->save();

            return redirect()->route('añadirdoctor')->with('success', 'Doctor registrado exitosamente');

        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                // Verificar si el error es por correo o DNI
                if (strpos($e->getMessage(), 'doctor_correo_unique') !== false) {
                    return back()->with('duplicate_error', 'El correo electrónico ya está registrado en el sistema.');
                } elseif (strpos($e->getMessage(), 'doctor_dni_unique') !== false) {
                    return back()->with('duplicate_error', 'El DNI ya está registrado en el sistema.');
                }
            }
            return back()->with('error', 'Ocurrió un error al registrar el doctor.');
        }
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

        // Capturar el estado del checkbox 'remember'.
        $remember = $request->has('remember');

        // Intento de autenticación con el guard 'doctor'.
        if (Auth::guard('doctor')->attempt($credentials, $remember)) {
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
        $estadoPerdido = $request->input('estado_perdido', 0); // Obtiene el estado perdido de la consulta o por defecto 0

        // Obtén todas las citas, sin filtrar por fecha
        $citas = Cita::with('user', 'horario')->get();

        // Filtrar las citas por estado y estado_perdido
        $citasFiltradas = $citas->filter(function($cita) use ($estado, $estadoPerdido) {
            return ($cita->estado == $estado) && ($cita->estado_perdido == $estadoPerdido);
        });

        // Log para verificar las citas obtenidas
        if ($citasFiltradas->isEmpty()) {
            Log::info('No se encontraron citas.');
        } else {
            Log::info('Citas encontradas:', $citasFiltradas->toArray());
        }

        if ($request->ajax()) {
            return view('partials.citas', [
                'citas' => $citasFiltradas
            ])->render();
        }

        return view('vistas.doctor.dashboard.dashboard', [
            'citas' => $citasFiltradas,
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

        // Filtra las citas por la fecha proporcionada y el DNI del doctor
        $citas = Cita::where('doctor_id', $doctor->dni) // Aquí usamos el 'dni' del doctor autenticado
            ->whereHas('horario', function ($query) use ($fecha) {
                $query->whereDate('fecha', $fecha);
            })
            ->with('horario', 'user')
            ->get();

        // Pasa las citas y la fecha a la vista
        return view('vistas.doctor.historial.historial', compact('citas', 'fecha'));
    }

    public function verTodo()
    {
        $doctor = Auth::guard('doctor')->user();

        // Cambiamos para comparar con el DNI del doctor autenticado
        $citas = Cita::where('doctor_id', $doctor->dni)
            ->with('horario', 'user')
            ->get();

        // Define una fecha predeterminada, si es necesario
        $fecha = date('Y-m-d');

        // Pasa las citas y la fecha a la vista
        return view('vistas.doctor.historial.historial', compact('citas', 'fecha'));
    }


    public function mostrarHorarios()
    {
        // Obtiene todos los horarios y los doctores relacionados
        $horarios = Cita::with('doctor')->get(); // Aquí asegúrate de que la relación 'doctor' está bien definida en el modelo Cita

        // Pasa los horarios a la vista
        return view('vistas.administrador.horarios.ver_horarios', compact('horarios'));
    }

    public function asignar()
    {
        $doctores = Doctor::all();
        return view('vistas.administrador.doctor.AsignarDoctor', compact('doctores'));
    }

    public function buscarDoctor(Request $request)
    {
        // Validar el DNI
        $request->validate([
            'dni_doctor_anterior' => 'required|string',
        ]);

        // Buscar el doctor por su DNI
        $doctor = Doctor::where('dni', $request->dni_doctor_anterior)->first();

        // Retornar la respuesta
        if ($doctor) {
            return response()->json([
                'success' => true,
                'nombre' => $doctor->nombre,
                'apellido' => $doctor->apellido,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Doctor no encontrado.',
            ]);
        }
    }


    public function buscarPacientes(Request $request)
    {
        // Validar la fecha y el DNI del doctor
        $request->validate([
            'dia_seleccionado' => 'required|date',
            'doctor_id' => 'required|string', // Esperamos que el DNI se envíe
        ]);

        // Obtener citas para la fecha seleccionada, doctor, y con estado 0 (no atendidas)
        $citas = Cita::where('doctor_id', $request->doctor_id)
            ->where('estado', 0) // Filtrar por citas no atendidas (estado 0)
            ->whereHas('horario', function ($query) use ($request) {
                $query->whereDate('fecha', $request->dia_seleccionado); // Filtrar por la fecha del horario
            })
            ->with(['user', 'horario']) // Incluir la relación de 'horario' para obtener la fecha y hora
            ->get();

        // Retornar la respuesta
        return response()->json($citas);
    }




    public function buscarDoctores(Request $request)
    {
        $request->validate([
            'dia_seleccionado' => 'required|date',
            'doctor_id' => 'required|string', // Suponiendo que el DNI del doctor es un string
        ]);

        // Obtener el DNI del doctor anterior
        $dniDoctorAnterior = $request->doctor_id;

        // Obtener el horario para el doctor anterior en la fecha seleccionada
        $horarioDoctorAnterior = Horario::where('dni_doctor', $dniDoctorAnterior)
            ->where('fecha', $request->dia_seleccionado)
            ->first();

        // Verificar si existe el horario y obtener la especialidad
        if ($horarioDoctorAnterior) {
            $especialidad = Doctor::where('dni', $dniDoctorAnterior)->value('especialidad');

            $doctores = Doctor::where('especialidad', $especialidad)
                ->where('dni', '<>', $dniDoctorAnterior) // Excluir el doctor buscado
                ->whereHas('horarios', function ($query) use ($request) {
                    $query->where('fecha', $request->dia_seleccionado);
                })
                ->get();

            return response()->json($doctores);
        }

        return response()->json(['success' => false, 'message' => 'No se encontró horario para el doctor especificado.']);
    }

    public function buscarHorarios(Request $request)
    {
        $doctorId = $request->input('doctor_id');

        $horarios = Horario::where('dni_doctor', $doctorId)
            ->where('ocupado', 0)
            ->get();

        return response()->json($horarios);
    }



    public function reasignarPacientes(Request $request)
    {

        // Validar los datos recibidos
        $request->validate([
            'pacientes' => 'required|array', // Lista de IDs de pacientes
            'nuevo_doctor_id' => 'required|string', // DNI del nuevo doctor
            'horario_id' => 'required|integer', // ID del nuevo horario
        ]);

        // Obtener los pacientes seleccionados
        $pacientes = $request->pacientes;

        // Iterar sobre los pacientes seleccionados y reasignar sus citas
        foreach ($pacientes as $citaId) {
            $cita = Cita::find($citaId);

            if ($cita) {
                // Reasignar al nuevo doctor y horario
                $cita->doctor_id = $request->nuevo_doctor_id;
                $cita->horario_id = $request->horario_id;
                $cita->save();
            }
        }

        return response()->json(['success' => true, 'message' => 'Pacientes reasignados correctamente.']);
    }
}
