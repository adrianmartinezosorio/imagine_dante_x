<?php

//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (FUNCIONES DE ATAJOS)

Funciones para resumir los tipicos empty e isset.

Dante.
2-08-2017

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function e($data){

	return empty($data);

}
function i($data){

	return isset($data);

}
function ie($data){

	if(isset($data) && !empty($data)){

		return true;

	}else{

		return false;

	}

}

//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (LA PRIMERA LETRA DE UN STRING EN MAYUSCULA)

Convertira la primera letra en mayuscula.

Funcion: (echo) my($cadena);

Dante.
12-4-2016

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function my($cadena){
	
	return ucfirst($cadena);
	
}





function r(){

	return $_SERVER['PHP_SELF'];

}
function ip(){
	
	return $_SERVER['REMOTE_ADDR'];
	
}
function agent(){

	return $_SERVER['HTTP_USER_AGENT'];

}

function enc($string,$key) {
	
	return encrypt($string,$key);
	  
}

function dec($string,$key) {
	
	return decrypt($string,$key);
	  
}
?>