<?php
/*

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
PATH MODULE
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

thisfile();
ao($condiciones = '');
hdr($ruta = '');

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
*/
function thisfile(){

    return basename($_SERVER['PHP_SELF']);

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