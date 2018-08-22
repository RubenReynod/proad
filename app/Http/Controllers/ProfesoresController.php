<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Profesores;

//Validador de peticiones
use App\Http\Requests\UserFormRequest;
//Manejo de archivos
use Illuminate\Support\Facades\Storage;
//Has para contraseñas
use Illuminate\Support\Facades\Hash;

class ProfesoresController extends Controller
{
    
    

    public function index(){
    	//$id = Auth::id();
       // $forecast = Forecast::where('user_id', $id)->get();
        //return response()->json();
    }

}
