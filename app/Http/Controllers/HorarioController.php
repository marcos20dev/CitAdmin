<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HorarioController extends Controller
{
    public function horario()
    {

        return view('init.horario.AñadirHorario');
    }
    
}
