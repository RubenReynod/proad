<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserFormRequest;

//Manejo de archivos
use Illuminate\Support\Facades\Storage;
//Has para contraseñas
use Illuminate\Support\Facades\Hash;

class ProfesoresController extends Controller
{
    public function index(){
    	$id = Auth::id();
        $forecast = Forecast::where('user_id', $id)->get();
        return response()->json();
    }

    public function login(Request $Request){
        $dd($Request);
    	//Obtiene credenciales mandadas en la peticion.
        $credentials = $Request->all();       
        //Intenta el loggeo con las credenciales
    	try {
    		if(!$token=JWTAuth::attempt($credentials)){
                //Respuesta en caso de credenciales incorrectas
    			return response()->json(["error"=>"Credenciales invalidas"],401);
    		}
    	} catch (JWTException $e) {
            //Respuesta en cualquier error del servidor
    		return response()->json(["error"=>"Ocurrio un error en el servidor."],500);
    	}
        //Esto solo se ejecutara en caso de que las credenciales sean correctas.
    	$user=Auth::profesores();
        $user->img;
        $user->getRoleNames();
    	$response = array(
    		'token' => "Bearer ".$token, 
    		'user'=>$user,
    	);
    	
    	return $response;
    }
}
