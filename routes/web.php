<?php

use App\Http\Controllers\InicioController;
use App\Http\Controllers\InitController;
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

Route::get('noticias', [InitController::class, 'noticias'])->name('noticias');

Route::get('reset',[InitController::class, 'reset'])->name('Restablecer');

Route::get('menu',[InitController::class, 'menu'])->name(('menu'));




