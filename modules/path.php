<?php
/*

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
PATH MODULE
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

path_full();
path_protocol();
path_host();
path_route();
path_file();
path_redirect($ruta = '');

thisfile();
ao($condiciones = '');
hdr($ruta = '');

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
*/

function path_full(){

    // Protocolo (http o https)
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";

    // Nombre del servidor (ejemplo: www.ejemplo.com)
    $host = $_SERVER['HTTP_HOST'];

    // URI de la solicitud (ejemplo: /ruta/pagina.php)
    $uri = $_SERVER['REQUEST_URI'];

    // Construcción de la URL completa
    $fullUrl = $protocol . $host . $uri;

    return $fullUrl;

}

function path_protocol(){

    // Protocolo (http o https)
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";

    return $protocol;

}

function path_host(){

    // Nombre del servidor (ejemplo: www.ejemplo.com)
    $host = $_SERVER['HTTP_HOST'];

    return $host;

}

function path_route(){

    // URI de la solicitud (ejemplo: /ruta/pagina.php)
    $uri = $_SERVER['REQUEST_URI'];

    return $uri;

}

function path_file(){

    return basename($_SERVER['PHP_SELF']);

}

function path_redirect($ruta = ''){
	
	if(!empty($ruta)){

		Header('Location:'.$ruta);

	}else{

		Header('Location:'.$_SERVER['PHP_SELF']);

	}
	
}

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
DOCUMENTACION (REDIRECCIONAMIENTO)

Redireccionara a la ruta dada.

Funcion: hdr($ruta);

Es un alias de Header('Location:index.php');

Dante.
18-4-2016

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function hdr($ruta = ''){
	
	if(!empty($ruta)){

		Header('Location:'.$ruta);

	}else{

		Header('Location:'.$_SERVER['PHP_SELF']);

	}
	
}
?>