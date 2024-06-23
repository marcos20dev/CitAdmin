<?php

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\InitController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\SoporteController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', InicioController::class)->name('inicio');


//login

//LOGIN DE SOPORTE
Route::get('login/soporte', [SoporteController::class, 'soporte'])->name('soporte');
Route::get('menu/soporte', [SoporteController::class, 'MenuSoporte'])->name('añadircuentas');
//--------------------------------------------------------------------------------------------------


//RUTA PARA EL MENU
Route::get('menu',[MenuController::class, 'menu'])->name('menu');


//para noticias------------------------------------------------------------------------------------------------------
Route::get('menu/noticias', [NoticiaController::class, 'noticias'])->name('noticias');
Route::post('menu/noticias/agregar', [NoticiaController::class, 'agregar'])->name('agregar');
Route::put('menu/noticias/{id}/editar', [NoticiaController::class, 'updateNoticia'])->name('actualizar.noticia');
Route::delete('menu/noticias/{id}/eliminar', [NoticiaController::class, 'eliminarNoticia'])->name('eliminar.noticia');
//--------------------------------------------------------------------------------------------------------------------


//rutas para el doctoro
Route::get('menu/doctor', [DoctorController::class, 'doctor'])->name('añadirdoctor');
Route::post('menu/doctor/agregar', [DoctorController::class, 'agregar'])->name('agregarDoctor');
Route::put('menu/doctor/{id}/editardoctor', [DoctorController::class, 'update'])->name('actualizar.Doctor');
Route::delete('menu/doctor/{id}/eliminardoctor', [DoctorController::class, 'eliminarDoctor'])->name('eliminar.Doctor');
//--------------------------------------------------------------------------------------------------------------------

//rutas para el horaurio
Route::get('menu/horairo', [HorarioController::class, 'horario'])->name('añadirhorario');

//Route::get('menu/edit', [InitController::class, 'editar'])->name('editar');



