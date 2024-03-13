<?php

namespace App\Http\Controllers;

use App\Models\Noticias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InitController extends Controller
{
 
    //TEMPORAL
    public function agregardoc(){
        return view('init.AñadirDoctor');
    }


  
}
