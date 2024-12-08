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
DOCUMENTACION (FUNCION DE PORCENTAJE DE NUMERO)

Funcion: (echo) $numero = porcentaje(2003,21);
Argumentos: numero, tanto por ciento.

1ºer Argumento:
	-El numero del cual se quiere sacar el tanto por ciento.
	
2º Argumento:
	-El porcentaje de la cantidad.

Dante.
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



?>