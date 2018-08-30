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
//Modelo de usuario

class AuthenticateController extends Controller
{
     protected $primaryKey = 'codigo';
    
    //Metodo de autentificacion
    public function authenticate(Request $Request)
    {
        //Obtiene credenciales mandadas en la peticion.
        $credentials = $Request->only(['codigo', 'password']);
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
    	$user=Auth::user();
    	$response = array(
    		'token' => "Bearer ".$token, 
    		'user'=>$user,
    	);
    	
    	return $response;
    }

    //Metodo de logout
    public function logout(){
        $token=JWTAuth::getToken();
    	JWTAuth::invalidate($token);
    	return response()->json(["msg"=>"Nos vemos!"],200);
    }

    //Metodo para obtener informacion del usuario loggeado
    public function session(){
        $user=JWTAuth::toUser(JWTAuth::getToken());
    	$response=array(
    		"user"=>$user
    	);
    	return $response;
    }

    //Metodo de actualizacion de usuario (usuario logeado)
    /*public function update(UserFormRequest $request)
    {
        $user=Auth::user();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->celphone=$request->celphone;
        $user->access=$request->access;

        if(isset($request->password)){
            $user->password=Hash::make($request->password);
        }

        $user->save();

        return response()->json($user->id);
    }*/

    //Metodo para refrescar un token
    /*public function generateToken(Request $request)
    {
        $user=Profesores::where('codigo',$request->email);
        if(empty($user))
            return response()->json(['msg'=>'Email no registrado!']);


    }*/
}
