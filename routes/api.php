<?php

use Illuminate\Http\Request;

require('basics.php');

Route::post('/profesores/','AuthenticateController@authenticate');
//Grupo de rutas que requieren autentificacion
Route::middleware(["jwt.auth"])->group(function(){
	//Rutas
});