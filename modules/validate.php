<?php

/* VALIDATE DATA MODULE 1.0 */
/* 2-08-2017 */

//FUNCIONES PRIMARIAS
//emptys($array);
//gets($array);
//numbers($array);

//FUNCIONES SECUNDARIAS
//is_positive($numero);
//is_mail($correo);
//is_url($url);
//is_phone($numero);
//is_postalcode($numero);
//is_alphanumeric($datos);


//vcountstr($datos,$minimo,$maximo);

/*---------------------------------------------------------------------------------------------*/
/*---------------------------------------------------------------------------------------------*/
//FUNCIONES PRIMARIAS
/*---------------------------------------------------------------------------------------------*/
/*---------------------------------------------------------------------------------------------*/

//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (COMPROVAR VALORES)

Comprobar si alguno de los valores esta vacio.

Funcion: emptys(array($posicion,$seccion,$descripcion,$enlace,$autor));
Argumentos: un array con los valores a comprovar.

1-Argumento:
	-Array.
	
En caso de que alguno de los valores este vacio devuelbe false, sino true.
	
Dante.
7-1-2016

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function emptys($array){
	
	if(is_array($array)){

		$conteo = count($array);
		
		$key = 0;
		
		for ($i = 0; $i <= ($conteo - 1); $i++) {
			
			if(empty($array[$i])){
				
				$key++;
				
			}
			
		}
		
		if($key != 0){
			
			return false;
			
		}else{
			
			return true;
			
		}

	}else{
		
		ierror('validate_emptys','El argumento solo puede ser un array.');
		
	}
	
}
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (COMPROVAR CONJUNTO DE VALORES GET)

Comprobar si alguno de los valores $_GET[] no existe.

Funcion: gets(array("accion","id"));
Argumentos: un array con los valores get a comprovar.

1-Argumento:
	-Array.
	
En caso de que alguno de los valores este vacio o no exista devuelbe false, sino true.
	
Dante.
12-1-2016

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function gets($array){
	
	if(is_array($array)){

		$conteo = count($array);
		
		$key = 0;
		
		for ($i = 0; $i <= ($conteo - 1); $i++) {
			
			if(empty($_GET[$array[$i]]) || !isset($_GET[$array[$i]])){
				
				$key++;
				
			}
			
		}
		
		if($key != 0){
			
			return false;
			
		}else{
			
			return true;
			
		}

	}else{
		
		ierror('validate_gets','El argumento solo puede ser un array.');
		
	}
	
}
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (COMPROVAR CONJUNTO DE VALORES NUMERICOS)

Comprueba si todos los valores son numericos.

Funcion: numbers(array(1,2,3));
Argumentos: un array con los valores numericos a comprovar.

1-Argumento:
	-Array.
	
En caso de que alguno de los valores no sea numerico devolvera false.
	
Dante.
10-5-2016

*/
//------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------	
function numbers($array){
	
	if(is_array($array)){
	
		$cantidad = count($array);
		
		$errors = 0;
		
		for($i = 0;$i < $cantidad;$i++){
			
			if(!is_numeric($array[$i])){
				
				$errors++;
				
			}
			
		}//Endfor
		
		if($errors == 0){
			
			return true;
			
		}else{
			
			return false;
			
		}
	
	}else{
		
		ierror('validate_numbers','El argumento solo puede ser un array.');
		
	}
	
}

/*---------------------------------------------------------------------------------------------*/
/*---------------------------------------------------------------------------------------------*/
//FUNCIONES SECUNDARIAS
/*---------------------------------------------------------------------------------------------*/
/*---------------------------------------------------------------------------------------------*/

//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (FUNCION VALIDACION DE EMAIL)

Devolvera true si es una formato de email correcto, false si no.

Funcion: validar_mail('adrian.cfgm@gmail.com');
Argumentos: email.


Dante.
18-11-2015

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function is_mail($correo){
	
	if(!empty($correo)){

		if(filter_var($correo, FILTER_VALIDATE_EMAIL)){
					
			return true;
					
		}else{
			
			return false;
			
		}

	}else{

		return false;

	}

}
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (FUNCION VALIDACION DE URL)

Devolvera true si es una formato de url correcto, false si no.

Funcion: validar_url('http://testmulti.com/');
Argumentos: url.


Dante.
12-1-2017

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function is_url($url){

	if(!empty($url)){

		if(!filter_var($url, FILTER_VALIDATE_URL) === false) {

		    return true;

		}else{

		    return false;

		}

	}else{

		return false;

	}

}
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (FUNCION VALIDACION DE NUMERO MOVIL DE 9 DIGITOS)

Devolvera true si es una formato de numero correcto, false si no.

Funcion: validar_numero('617752799');
Argumentos: numero movil.


Dante.
18-11-2015

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function is_phone($numero){
	
	if(!empty($numero)){

		if(is_numeric($numero) && strlen($numero) == 9){
					
			return true;
					
		}else{
			
			return false;
			
		}

	}else{

		return false;

	}

}
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (FUNCION VALIDACION DE CODIGO POSTAL DE 5 DIGITOS)

Devolvera true si es una formato de CODIGO POSTAL correcto, false si no.

Funcion: validar_cp(19005);
Argumentos: codigo postal.


Dante.
18-11-2015

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function is_postalcode($numero){
	
	if(!empty($numero)){

		if(is_numeric($numero) && strlen($numero) == 5){
					
			return true;
					
		}else{
			
			return false;
			
		}

	}else{

		return false;

	}

}
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (FUNCION VALIDACION DE DATOS ALFANUMERICOS)

Devolvera true si es una formato correcto, si no false.

Funcion: valfa($nombreusuario);
Argumentos: datos.

Valida el nombre de usuario o contraseña de el usuario para login.

Dante.
21-1-2016
2-08-2017

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function is_alphanumeric($datos){

   $permitidos = "abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ0123456789-_ ";
   
   for ($i=0; $i<strlen($datos); $i++){
	   
      if (strpos($permitidos, substr($datos,$i,1))===false){
		  
         return false;
		 
      }
	  
   }

   return true;
   
}

//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (FUNCION VALIDACION TAMAÑO DE STRING)

Validara si el tamaño de un string esta dentro de un minimo y un maximo.

Funcion: vcountstr($datos,$minimo,$maximo);
Argumentos: datos, caracteres minimos, caracteres maximos.

Dante.
2-08-2017

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function vcountstr($datos,$minimo,$maximo){

	if(!empty($datos) && !empty($minimo) && !empty($maximo) && is_numeric($minimo) && is_numeric($maximo)){

		if(strlen($datos) < $minimo || strlen($datos) > $maximo){
		   
	        return false;
		  
	    }else{

	    	return true;

	    }

    }else{

    	return false;

    }

}	

/*---------------------------------------------------------------------------------------------*/
/*---------------------------------------------------------------------------------------------*/
//FUNCIONES TERCIARIAS
/*---------------------------------------------------------------------------------------------*/
/*---------------------------------------------------------------------------------------------*/






//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (SABER SI UN NUMERO ES POSITIVO)

SABER SI UN NUMERO ES POSITIVO (TRUE).

Funcion: (echo) is_positive($numero);
Argumentos: NUMERO.

1ºer Argumento:
	-numero a convertir.
	

Dante.
*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function is_positive($numero){

	if(!empty($numero)){

		if(is_numeric($numero)){

			if($numero > 0){

				return true;

			}else{

				return false;

			}

		}else{

			ierror('validate_is_positive','El parametro no es un numero (no_number:'.$numero.').');

		}
	}else{

		ierror('validate_is_positive','Parametro vacio.');
		
	}

}


?>