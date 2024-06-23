<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SoporteController extends Controller
{
    public function soporte()
    {
        return view('login.loginsoporte');
    }

    public function MenuSoporte()
    {
        return view('soporte.añadircuentas');
    }


}




