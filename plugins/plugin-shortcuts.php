<?php


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