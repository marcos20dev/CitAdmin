<?php

use App\Http\Controllers\CitaController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\InitController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\SoporteController;
use Illuminate\Support\Facades\Route;

use function Ramsey\Uuid\v1;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//login adminsitrador
Route::get('/', InicioController::class)->name('inicio');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//login
//-----------------------------------------------

//LOGIN DE SOPORTE
Route::get('login/soporte', [SoporteController::class, 'login'])->name('soporte');
Route::post('login/soporte', [SoporteController::class, 'inicio'])->name('soporte.login.submit');

Route::middleware('auth:soporte')->group(function () {
    Route::get('menu/soporte', [SoporteController::class, 'MenuSoporte'])->name('añadircuentas');

    // Rutas en web.php
    Route::get('/ver-doctores', [SoporteController::class, 'verCuentasDoctor'])->name('ver.doctores');
    Route::delete('/soporte/doctores/{id}', [SoporteController::class, 'destroyDoctor'])->name('soporte.eliminarDoctor');


    Route::post('/ver/especialidades', [EspecialidadController::class, 'verEspecialidades'])->name('ver.especialidades');
    Route::post('/especialidades', [EspecialidadController::class, 'store'])->name('especialidades.store');
    Route::post('/especialidades/{id}/toggle', [EspecialidadController::class, 'toggleEstado'])->name('especialidades.toggle');
// Eliminar
    Route::delete('/especialidades/{id}', [EspecialidadController::class, 'destroy'])->name('especialidades.destroy');

// Editar (mostrar formulario de edición)
    Route::get('/especialidades/{id}/editar', [EspecialidadController::class, 'edit'])->name('especialidades.edit');

// Editar (guardar cambios)
    Route::put('/especialidades/{id}', [EspecialidadController::class, 'update'])->name('especialidades.update');



    Route::get('/ver-administradores', [SoporteController::class, 'verCunetasAdministrador'])->name('ver.administradores');
    Route::delete('/soporte/administradores/{id}', [SoporteController::class, 'destroyAdministrador'])->name('soporte.eliminarAdministrador');

    Route::get('/agregar/especiaidades', [SoporteController::class, 'especialidades'])->name('add.especialidades');


    Route::post('/soporte/añadircuentas', [SoporteController::class, 'store'])->name('soporte.store');
});


//--------------------------------------------------------------------------------------------------
//RUTA PARA EL MENU
// Utiliza el middleware 'auth' para proteger las rutas
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/menu', [MenuController::class, 'menu'])->name('menu');

    // Rutas para noticias
    Route::get('menu/noticias', [NoticiaController::class, 'noticias'])->name('noticias');
    Route::post('menu/noticias/agregar', [NoticiaController::class, 'agregar'])->name('agregar');
    Route::put('menu/noticias/{id}/editar', [NoticiaController::class, 'updateNoticia'])->name('actualizar.noticia');
    Route::delete('menu/noticias/{id}/eliminar', [NoticiaController::class, 'eliminarNoticia'])->name('eliminar.noticia');
    Route::get('mostrar/noticias', [NoticiaController::class, 'mostrar'])->name('noticias.mostrar');

    // Rutas para el doctor
    Route::get('menu/doctor', [DoctorController::class, 'doctor'])->name('añadirdoctor');
    Route::post('menu/doctor/agregar', [DoctorController::class, 'agregar'])->name('agregarDoctor');
    Route::get('menu/doctor/buscar', [DoctorController::class, 'mostrarsearch'])->name('mostrarDoctor');

    Route::put('menu/doctor/{id}/editardoctor', [DoctorController::class, 'update'])->name('actualizar.Doctor');
    Route::delete('menu/doctor/{id}/eliminardoctor', [DoctorController::class, 'eliminarDoctor'])->name('eliminar.Doctor');
    Route::get('mostrar/doctor', [DoctorController::class, 'mostrar'])->name('doctor.mostrar');

    //añadir nuevos pacientes al doctor
    Route::get('menu/doctor/reasignar', [DoctorController::class, 'asignar'])->name('asignardoctor');
// web.php
Route::post('reasignar-pacientes', [DoctorController::class, 'reasignarPacientes'])->name('reasignar.pacientes');



    // Rutas para el horario
    Route::get('menu/horairo', [HorarioController::class, 'horario'])->name('añadirhorario');
    Route::post('/buscardoctor', [HorarioController::class, 'buscardoctor'])->name('buscardoctor');
    Route::post('/horarios', [HorarioController::class, 'store'])->name('horarios.store');
    // routes/web.php
    Route::get('/horarios', [HorarioController::class, 'mostrar'])->name('horarios.mostrar');
    Route::post('/horarios/duplicar/{id}', [HorarioController::class, 'duplicate'])->name('horarios.duplicate');
    Route::delete('/horarios/{id}', [HorarioController::class, 'eliminarhorario'])->name('horarios.eliminar');

});


Route::get('login/doctor', [DoctorController::class, 'logindoctor'])->name('doctor');
Route::post('login/doctor', [DoctorController::class, 'login'])->name('doctor.login.submit');


Route::middleware('auth:doctor')->group(function () {
    Route::get('doctor/dashboard', [DoctorController::class, 'dashboard'])->name('doctor.dashboard');
    Route::get('doctor/citas', [DoctorController::class, 'cita'])->name('doctor.cita');
    Route::get('doctor/historial', [DoctorController::class, 'historial'])->name('doctor.historial');


    Route::delete('citas/{cita}', [CitaController::class, 'destroy'])->name('citas.destroy');
    Route::put('citas/{id}/atendida', [CitaController::class, 'marcarAtendida'])->name('citas.atender');
    Route::get('citas/filtrar', [CitaController::class, 'filtrar'])->name('citas.filtrar');
    Route::post('doctor/logout', [DoctorController::class, 'logout'])->name('doctor.logout');


    // web.php
    Route::get('doctor/dashboard', [DoctorController::class, 'mostrarCitas'])->name('doctor.dashboard');
    Route::post('cita/{id}/actualizar', [DoctorController::class, 'actualizarEstado'])->name('cita.actualizar');





    Route::get('doctor/historial', [DoctorController::class, 'historial1'])->name('doctor.historial');
    Route::get('doctor/citas/historial', [DoctorController::class, 'historial1'])->name('historial.citas');
    Route::get('doctor/ver-todo', [DoctorController::class, 'verTodo'])->name('doctor.ver-todo');
});
//-----------------------------------------------


// Ruta para buscar un doctor por DNI
Route::post('buscar-doctor', [DoctorController::class, 'buscarDoctor'])->name('buscar.doctor');
// Ruta para buscar pacientes por fecha y doctor
Route::post('buscar-pacientes', [DoctorController::class, 'buscarPacientes'])->name('buscar.pacientes');
Route::post('buscar-doctores', [DoctorController::class, 'buscarDoctores'])->name('buscar.doctores');


Route::post('buscar/horarios', [DoctorController::class, 'buscarHorarios'])->name('buscar.horarios');

