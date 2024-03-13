<?php

use App\Http\Controllers\InicioController;
use App\Http\Controllers\InitController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\NoticiaController;
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


//RUTA PARA EL MENU
Route::get('menu',[MenuController::class, 'menu'])->name('menu');


//para noticias
Route::get('menu/noticias', [NoticiaController::class, 'noticias'])->name('noticias');
Route::post('agregar', [NoticiaController::class, 'agregar'])->name('agregar');

Route::put('menu/noticias/{id}/editar', [NoticiaController::class, 'updateNoticia'])->name('actualizar.noticia');

Route::delete('menu/noticias/{id}/eliminar', [NoticiaController::class, 'eliminarNoticia'])->name('eliminar.noticia');

//





//temporal el doctoro  osea eso se va a cambiar
Route::get('menu/agregardoctor',[InitController::class, 'agregardoc'])->name('agregar_doctor');




//Route::get('menu/edit', [InitController::class, 'editar'])->name('editar');


