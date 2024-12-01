<?php
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (OBTENER ARCHIVO ACTUAL)

Obtendra el nombre del archivo actual.

Se le puede pasar un array con gets.

Funcion: (echo) ao();

ao(array("seccion=fotografia","accion=eliminar","id=5"));

Obtendra:

usuarios_eliminar.php?seccion=fotografia&accion=eliminar&id=5 

Dante.
http://dantecreations.com/
29-2-2016

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function ao($condiciones = ''){
	
	if(empty($condiciones)){
	
		return basename($_SERVER['PHP_SELF']);
	
	}else{
		
		if( is_array ( $condiciones )){
		
		$salida = '';
		
		$cantidad_condiciones = count($condiciones);
		
		for($i=0;$i < $cantidad_condiciones;$i++){
			
			if($i == 0){
				
				$salida .= '?' . $condiciones[$i];
				
			}else{
				
				$salida .= '&' . $condiciones[$i];
				
			}
			
		}
		
		$archivo = $_SERVER['PHP_SELF'];
		
		return $archivo . $salida;
		
		}else{
			
			ierror('atajos_ao','Necesita un arrays como argumento');
			
		}
		
	}
	
}

//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (LA PRIMERA LETRA DE UN STRING EN MAYUSCULA)

Convertira la primera letra en mayuscula.

Funcion: (echo) my($cadena);

Dante.
http://dantecreations.com/
12-4-2016

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function my($cadena){
	
	return ucfirst($cadena);
	
}
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (REDIRECCIONAMIENTO)

Redireccionara a la ruta dada.

Funcion: hdr($ruta);

Es un alias de Header('Location:index.php');

Dante.
http://dantecreations.com/
18-4-2016

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------


function r(){

	return $_SERVER['PHP_SELF'];

}
function ip(){
	
	return $_SERVER['REMOTE_ADDR'];
	
}
function agent(){

	return $_SERVER['HTTP_USER_AGENT'];

}
function hdr($ruta = ''){
	
	if(!empty($ruta)){

		Header('Location:'.$ruta);

	}else{

		Header('Location:'.$_SERVER['PHP_SELF']);

	}
	
}

?>