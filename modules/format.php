<?php
/*

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
FORMAT MODULE
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

format_euro($euros);
format_zeros($numero,$cantidad_ceros,$posicion = "left");
format_bytes($bytes); 
format_roman($integer);
format_ordinal($numero,$sexo = 'o'); 

*/

//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (FORMATEAR COMO EUROS)

Funcion: (echo) euro($euros);
Argumentos: NUMERO.

1ºer Argumento:
	-El numero a formatear como euro.
	

Dante.

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function format_euro($euros){

    if(!empty($euros)){

        if(is_numeric($euros)){

            return number_format($euros, 2, '.', '');

        }else{

            ierror('format_euro','El parametro no es un numero (no_number:'.$euros.').');

        }

    }else{

        ierror('format_euro','Parametro vacio.');

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
3-11-2015

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function format_zeros($numero,$cantidad_ceros,$posicion = "left"){

    if($posicion == 'left'){
        
        return str_pad($numero, $cantidad_ceros, "0", STR_PAD_LEFT);
        
    }else if($posicion == 'right'){
        
        return str_pad($numero, $cantidad_ceros, "0", STR_PAD_RIGHT);
        
    }else{
        
        ierror('format_ceros','El tercer argumento de la funcion "ceros" esta mal configurado.');
        
    }

}


/*--------------------------------------------------*/
/*--------------------------------------------------*/
/*

Function: format_bytes($bytes);

Date: 8-1-2019

Arguments: Una cantidad de bytes.

Response: Tamaño formateado segun proceda.

*/
/*--------------------------------------------------*/
/*--------------------------------------------------*/
function format_bytes($bytes){
  
    if(!empty($bytes) && is_numeric($bytes)){ 
      
      $peso = $bytes;
      
      $clase = array(" Bytes", " KB", " MB", " GB", " TB"); 
      
      return round($peso/pow(1024,($i = floor(log($peso, 1024)))),2 ).$clase[$i];
      
    }else{
  
      ierror('format_bytes','El parametro esta vacio o no es un numero.');
  
    }
    
  }

/*--------------------------------------------------*/
/*--------------------------------------------------*/
/*

Function: format_roman($integer);

Date: 12-04-2018

Arguments: Numero decimal.

Response: Numero romano.

*/
/*--------------------------------------------------*/
/*--------------------------------------------------*/
function format_roman($integer){

        $table = array('M'=>1000, 'CM'=>900, 'D'=>500, 'CD'=>400, 'C'=>100, 
                       'XC'=>90, 'L'=>50, 'XL'=>40, 'X'=>10, 'IX'=>9,   
                       'V'=>5, 'IV'=>4, 'I'=>1);

        $return = '';

        while($integer > 0) 
        {
            foreach($table as $rom=>$arb) 
            {
                if($integer >= $arb)
                {
                    $integer -= $arb;
                    $return .= $rom;
                    break;
                }
            }
        }

        return $return;

}//End function.
/*--------------------------------------------------*/
/*--------------------------------------------------*/
/*

Function: format_ordinal($numero,$sexo = 'o');

Date: 12-04-2018

Arguments: Numero decimal.

Response: Numero ordinal.

*/
/*--------------------------------------------------*/
function format_ordinal($numero,$sexo = 'o'){ 

    if($sexo == 'a' || $sexo == 'o'){

        if(is_numeric($numero)){

            if($numero == 1){

                return 'Primer'.$sexo;

            }else if($numero == 2){

                return 'Segund'.$sexo;

            }else if($numero == 3){

                return 'Tercer'.$sexo;

            }else if($numero == 4){

                return 'Cuart'.$sexo;

            }else if($numero == 5){

                return 'Quint'.$sexo;

            }else if($numero == 6){

                return 'Sext'.$sexo;

            }else if($numero == 7){

                return 'Séptim'.$sexo;

            }else if($numero == 8){

                return 'Octav'.$sexo;

            }else if($numero == 9){

                return 'Noven'.$sexo;

            }else if($numero == 10){

                return 'Décim'.$sexo;

            }else if($numero == 11){

                return 'Undécimo'.$sexo;

            }else{

                ierror('format_ordinal','No existe soporte para este numero.');

            }

        }else{

            ierror('format_ordinal','El parametro no es un numero.');

        }

    }else{

         ierror('format_ordinal','El parametro sexo no esta bien definido.');

    }

}//End function.






































?>