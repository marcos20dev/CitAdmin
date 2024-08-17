<?php

namespace App\Http\Controllers;

use App\Models\Noticias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InitController extends Controller
{
 

    public function agregardoc(){
        return view('vistas.administrador.doctor.AñadirDoctor');
    }


  
}
