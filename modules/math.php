<?php

//parximpar(3);
//formato(120,2);
//porcentaje(2003,21);
//media($array);
//ceros(26,10,'left');
//intervalo_numerico($referencia,$inicio_intervalo,$fin_intervalo);


//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (FUNCION COMPROVAR SI UN NUMERO ES PAR O IMPAR)

Determinara si un numero es par o impar.

Funcion: (echo) parximpar(3);
Argumentos: Numero.

1ºer Argumento:
	-El numero a comprovar.

Devolvera:

	Numero Par: par
	Numero Impar: impar
	
Dante.
http://dantecreations.com/
26-6-2016

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function parximpar($numero){
		
	if(!empty($numero) && is_numeric($numero)){
		
		return ($numero % 2 ? 'impar' : 'par');
		
	}else{
			
		ierror('matematicas_parximpar','Error en los argumentos de la funcion. No numerico o vacio.');

	}
		
}
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (FUNCION DE FORMATEO DE NUMERO)

Funcion: (echo) $numero = formato(120,2);
Argumentos: numero a formatear, cantidad de decimales.

1ºer Argumento:
	-El numero que se formateara por ejemplo 120 con dos decimales = 120.00
	
2º Argumento:
	-Es la cantidad de decimales que tendra.

Dante.
http://dantecreations.com/
5-11-2015

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function formato($numero,$formateo){
	
	if(!is_numeric($numero) || !is_numeric($formateo)){
		
		ierror('matematicas_formato','Alguno de los argumentos de la funcion "formato" no es numerico.');
		
	}else{
		
		return number_format($numero, $formateo, '.', '.' );
		
	}
	
}
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (FUNCION DE PORCENTAJE DE NUMERO)

Funcion: (echo) $numero = porcentaje(2003,21);
Argumentos: numero, tanto por ciento.

1ºer Argumento:
	-El numero del cual se quiere sacar el tanto por ciento.
	
2º Argumento:
	-El porcentaje de la cantidad.

Dante.
http://dantecreations.com/
5-11-2015

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function porcentaje($cantidad,$porciento){
	
	if(!is_numeric($cantidad) || !is_numeric($porciento)){
		
		ierror('matematicas_porcentaje','Alguno de los argumentos de la funcion "porcentaje" no es numerico.');
		
	}else{
		
		return number_format($cantidad*$porciento/100 , 2, '.', '.' );
		
	}
			
}
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (OBTIENE LA MEDIA DE UN CONJUNTO DE NUMEROS)

Funcion: (echo) media($array);
Argumentos: array.

1ºer Argumento:
	-Habra que pasarle un array con los numeros con los que se hara la media.
	

Dante.
http://dantecreations.com/
17-4-2016

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function media($array){
	
	if(is_array($array)){
	
		if(empty($array)){

			ierror('matematicas_media','La funcion "media" esta recibiendo un array vacio.');
			
		}else{
		
				$conteo = count($array);
	
				$suma = 0;
				
				for($i = 0;$i < $conteo;$i++){
					
					$suma += $array[$i];
					
				}
				
				$suma = $suma  / $conteo;
				
				return $suma;
			
		}
	
	}else{
		
		ierror('matematicas_media','La funcion "media" solo admite arrays.');
		
	}
	
}
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (FUNCION DE FORMATEO DE NUMERO CON CEROS)

Funcion: (echo) $numero = ceros(26,10,'left');
Argumentos: numero a formatear, cantidad de ceros que se añadiran, la posicion de los ceros.

1ºer Argumento:
	-El numero que se formateara por ejemplo 26 = 00000026.
	
2º Argumento:
	-Es la cantidad de ceros que se añadiran.
	
3ºer Argumento:
	-la posicion de los ceros. Puede ser "left" o "right".


Dante.
http://dantecreations.com/
3-11-2015

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function ceros($numero,$cantidad_ceros,$posicion = "left"){
	
	if($posicion == 'left'){
		
		return str_pad($numero, $cantidad_ceros, "0", STR_PAD_LEFT);
		
	}else if($posicion == 'right'){
		
		return str_pad($numero, $cantidad_ceros, "0", STR_PAD_RIGHT);
		
	}else{
		
		ierror('matematicas_ceros','El tercer argumento de la funcion "ceros" esta mal configurado.');
		
	}
	
}
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (COMPROVAR SI UN NUMERO ESTA ENTRE OTROS DOS).

Funcion de truo o false.

Funcion: intervalo_numerico($referencia,$inicio_intervalo,$fin_intervalo);

1-Argumento:
	El primer argumento sera el numero a comprovar. La referencia. El numero el cual se comprovara si esta entre los otros dos.

2-Argumento:
	El numerto inicial del intervalo.
	
3-Argumento:
	El numero final del intervalo.

Por lo tanto se comprovara si la referencia esta entre el numero inicial y el numero final.
Devolbera true en caso de que si este. false en caso de que no este en el intervalo.

Dante.
http://dantecreations.com/
06-4-2016

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function intervalo_numerico($referencia,$inicio_intervalo,$fin_intervalo){
	
	if(!is_numeric($referencia) || !is_numeric($inicio_intervalo) || !is_numeric($fin_intervalo)){
		
		ierror('matematicas_intervalo_numerico','Alguno de los argumentos de la funcion "intervalo_numerico" no es numerico.');
		
	}else{
	
		if($referencia > $inicio_intervalo && $referencia < $fin_intervalo){
		
			return true;
		
		}else{
		
			return false;
		
		}
		
	}

}
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (FORMATEAR COMO EUROS)

Funcion: (echo) euro($euros);
Argumentos: NUMERO.

1ºer Argumento:
	-El numero a formatear como euro.
	

Dante.
http://dantecreations.com/
*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function euro($euros){
	
	if(!empty($euros)){

		if(is_numeric($euros)){

			return number_format($euros, 2, '.', '');

		}else{

			ierror('matematicas_euro','El parametro no es un numero (no_number:'.$euros.').');

		}

	}else{

		ierror('matematicas_euro','Parametro vacio.');

	}
	
}


?>