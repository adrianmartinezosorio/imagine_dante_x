<?php
/*
-----------------------------------------
MODULE DATA
-----------------------------------------

STRING MODULE 1.0
Modulo de procesado de strings.

UPDATES LOG
--------------
20/06/2016
02/08/2017
19/07/2018
29/11/2018
16/01/2019
23/04/2019
29/04/2019
12/05/2022

-----------------------------------------
FUNCTION REFERENCE
-----------------------------------------

PRINCIPALES
cut($texto,$maxcaracteres); //Corta el texto y añade puntos suspensivos a partir de un limite.
in_string($string,$excludes); //Saber si una o mas subcadenas estan en una cadena.

FILTROS
onlynumbers($cadena); //Elimina todos los caracteres menos los numeros.
onlyletters($cadena); //Elimina todos los caracteres menos las letras.
onlycapitals($cadena); //Elimina todos los caracteres menos las letras mayusculas.
onlylowercase($cadena); //Elimina todos los caracteres menos las letras minusculas.
scapenumbers($cadena); //Elimina los caracteres numericos de un string.
scapeletters($cadena);	//Elimina las letras de un string.
scapeaccents($string); //Sustituye los caracteres con acento por el mismo sin acento

FILTROS PARA CÓDIGO DE PROGRAMACIÓN
clearcomments($txt); //Elimina cometarios de un codigo cualquiera.
codecompress($cadena); //Remove comments, tabs, spaces, newlines, etc.
sanitizeTXT($cadena); //Escapa el código de programacion de un texto para ser guardado.
nomalizeTXT($cadena); //Desescapa el código de programacion de la funcion sanitizeTXT.

REEMPLAZO AVANZADO
first_replace($aguja, $sustituta, $pajar); //Sustituye solo la primera aparicion de una aguja.
advanced_replace($aguja,$reemplazo,$str);  //Sustituye buscando variables mayusculas, minusculas.

--------------------------------------------------------------------------------------------------
*/



function onlynumbers($cadena){

    $nueva_cadena = ereg_replace("[^0-9]", "", $cadena);
    return $nueva_cadena;

}

function onlyletters($cadena){

    $nueva_cadena = ereg_replace("[^A-Za-z]", "", $cadena);
    return $nueva_cadena;

}

function onlycapitals($cadena){

    $nueva_cadena = ereg_replace("[^A-Z]", "", $cadena);
    return $nueva_cadena;

}

function onlylowercase($cadena){

    $nueva_cadena = ereg_replace("[^a-z]", "", $cadena);
    return $nueva_cadena;

}


function scapenumbers($cadena){
	
	if(!empty($texto)){

		return preg_replace('/[0-9]+/', '', $texto);

	}
	
}
function scapeletters($cadena){
	
	if(!empty($texto)){

		return preg_replace('/[A-Za-z]+/', '', $texto);

	}
	
}




function clearcomments($txt){
    
    if(!empty($txt)){
    
        //Eliminar comentarios html
        $txt = preg_replace('/\h*<!--.*?-->\h*/s', '', $txt);
        
        //Eliminar comentarios /* */
        $txt = preg_replace('/\h*\/\*.*?\*\/\h*/s', '', $txt);
        
        //Eliminar comentarios //
        $txt = preg_replace('/^\h*(?|(.*"[^"]*\/\/[^"]*".*)|(.*)\/\/.*\h*)$/m', '$1', $txt);
    
    }
    
    return $txt;

}

function codecompress($cadena){

    if(!empty($cadena)){
        
        $cadena = str_replace('"', 'escx@1@1@1@1@1@1@1@1@1@xesc', $cadena);
        $cadena = str_replace("'", 'escx@2@2@2@2@2@2@2@2@2@xesc', $cadena);

        //Eliminar comentarios html
        $cadena = preg_replace('/\h*<!--.*?-->\h*/s', '', $cadena);
        
        //Eliminar comentarios /* */
        $cadena = preg_replace('/\h*\/\*.*?\*\/\h*/s', '', $cadena);
        
        //Eliminar comentarios //
        $cadena = preg_replace('/^\h*(?|(.*"[^"]*\/\/[^"]*".*)|(.*)\/\/.*\h*)$/m', '$1', $cadena);

        /* remove tabs, spaces, newlines, etc. */
        $cadena = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $cadena);

        $cadena = str_replace('escx@1@1@1@1@1@1@1@1@1@xesc', '"', $cadena);
        $cadena = str_replace('escx@2@2@2@2@2@2@2@2@2@xesc', "'", $cadena);

    }

    return $cadena;
    
}



/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
/*
DOCUMENTACION (ACORTAR TEXTO CON PUNTOS SUSPENSIVOS)

Funcion: ct($texto,$maxcaracteres);

1-Argumento:
	-STRING.
	
2-Argumento:
	-La cantidad maxima de caracteres que se mostrara.

Dante.
26-2-2017


*/
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
function cut($texto,$maxcaracteres){
  
  if(!empty($texto)){
  
	  $texto = trim($texto);

	  $texto = strip_tags($texto);
		
	  if(strlen($texto) > $maxcaracteres){

		$texto = substr($texto, 0, ($maxcaracteres - 3)) . '...';

	  }

	  return $texto;
  
  }

}

/*-----------------------------------------------------------------------*/
/*

FUNCIÓN: first_replace($aguja, $sustituta, $pajar);

DETALLE: Reemplaza la primera aparicion de un string.

*/
/*-----------------------------------------------------------------------*/
function first_replace($aguja, $sustituta, $pajar){
    return ($pos=strpos($pajar, $aguja))!==FALSE?substr_replace($pajar, $sustituta, $pos, strlen($aguja)):$pajar;
}

/*-----------------------------------------------------------------------*/
/*

FUNCIÓN: advanced_replace($aguja,$reemplazo,$str);

DETALLE: Reemplaza un string por otro indiferentemente de mayusculas y minusculas.

FECHA: 29-11-2018

*/
/*-----------------------------------------------------------------------*/
function advanced_replace($aguja,$reemplazo,$str){

	$str = str_replace($aguja, $reemplazo,$str);
	$str = str_replace(mb_strtoupper($aguja), $reemplazo,$str);
	$str = str_replace(mb_strtolower($aguja), $reemplazo,$str);
	$str = str_replace(ucfirst($aguja), $reemplazo,$str);
	$str = str_replace(lcfirst($aguja), $reemplazo,$str);

	return $str;

}


/*-----------------------------------------------------------------------*/
/*

FUNCIÓN: scapeaccents($string);

DETALLE: Reemplaza los caracteres con acentos habituales por el mismo caracter sin acento.

FECHA: 29-04-2019

*/
/*-----------------------------------------------------------------------*/
function scapeaccents($string){

    if(!empty($string)){

        $string = str_replace('á', 'a', $string);
        $string = str_replace('é', 'e', $string);
        $string = str_replace('í', 'i', $string);
        $string = str_replace('ó', 'o', $string);
        $string = str_replace('ú', 'u', $string);

    }

    return $string;
    
}



function sanitizeTXT($cadena){

    if(!empty($cadena)){
        
        $cadena = str_replace('"', 'escx@1@1@1@1@1@1@1@1@1@xesc', $cadena);
        $cadena = str_replace("'", 'escx@2@2@2@2@2@2@2@2@2@xesc', $cadena);
        $cadena = str_replace("<", 'escx@3@3@3@3@3@3@3@3@3@xesc', $cadena);
        $cadena = str_replace(">", 'escx@4@4@4@4@4@4@4@4@4@xesc', $cadena);
        $cadena = str_replace("/", 'escx@5@5@5@5@5@5@5@5@5@xesc', $cadena);

    }

    return $cadena;
    
}
function nomalizeTXT($cadena){

    if(!empty($cadena)){
        
        $cadena = str_replace('escx@1@1@1@1@1@1@1@1@1@xesc', '"', $cadena);
        $cadena = str_replace('escx@2@2@2@2@2@2@2@2@2@xesc', "'", $cadena);
        $cadena = str_replace('escx@3@3@3@3@3@3@3@3@3@xesc', "<", $cadena);
        $cadena = str_replace('escx@4@4@4@4@4@4@4@4@4@xesc', ">", $cadena);
        $cadena = str_replace('escx@5@5@5@5@5@5@5@5@5@xesc', "/", $cadena);

    }

    return $cadena;
    
}

/*

Saber si en un string hay alguna subcadena del conjunto.

exclude($string,array("aaa","bbb","ccc")); 
//Comprobamos si aaa, bbb o ccc estan en $string.
//Con la primera aparicion de uno de ellos devolvera true.

return boolean.

Mayo 2022.

*/
function in_string($string,$excludes){

    if(!empty($excludes) && !empty($string) && is_array($excludes)){
    
      $count = 0;
      
      for($i = 0; $i < count($excludes); $i++){
          
          $pos = strpos($string, $excludes[$i]);
          
          if($pos !== false){
              $count++;
          }
          
      }
      
      if($count != 0){
          return true; //En el $string si que habia alguno de los excludes.
      }else{
          return false; //En el $string no habia excludes.
      }

    }

    if(!is_array($excludes)){
        ierror('imaginequery_in_string','El parámetro $excludes debe ser un array.');
    }
    
}
?>