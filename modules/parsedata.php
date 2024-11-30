<?php
/*

PARSEDATA MODULE 1.0

bytes2format($bytes); //De bytes a formato segun proceda.

dec2roman($integer); //De numeración DECIMAL a numeración ROMANA.

dec2ordinal($numero,$sexo = 'o'); De decimal a ordinal.

string2url($string); //De string a url amigable

*/

function gps2Num($coordPart){
    $parts = explode('/', $coordPart);
    if(count($parts) <= 0)
    return 0;
    if(count($parts) == 1)
    return $parts[0];
    return floatval($parts[0]) / floatval($parts[1]);
}
/*--------------------------------------------------*/
/*--------------------------------------------------*/
/*

Function: bytes2format($bytes);

Date: 8-1-2019

Arguments: Una cantidad de bytes.

Response: Tamaño formateado segun proceda.

*/
/*--------------------------------------------------*/
/*--------------------------------------------------*/
function bytes2format($bytes){
  
  if(!empty($bytes) && is_numeric($bytes)){ 
    
    $peso = $bytes;
    
    $clase = array(" Bytes", " KB", " MB", " GB", " TB"); 
    
    return round($peso/pow(1024,($i = floor(log($peso, 1024)))),2 ).$clase[$i];
    
  }else{

    ierror('parsedata_bytes2format','El parametro esta vacio o no es un numero.');

  }
  
}
/*--------------------------------------------------*/
/*--------------------------------------------------*/
/*

Function: dec2roman($integer);

Date: 12-04-2018

Arguments: Numero decimal.

Response: Numero romano.

*/
/*--------------------------------------------------*/
/*--------------------------------------------------*/
function dec2roman($integer){

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

Function: dec2ordinal($numero,$sexo = 'o');

Date: 12-04-2018

Arguments: Numero decimal.

Response: Numero ordinal.

*/
/*--------------------------------------------------*/
function dec2ordinal($numero,$sexo = 'o'){ global $error_key_imagine;

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

                ierror('parsedata_dec2ordinal','No existe soporte para este numero.');

            }

        }else{

            ierror('parsedata_dec2ordinal','El parametro no es un numero.');

        }

    }else{

         ierror('parsedata_dec2ordinal','El parametro sexo no esta bien definido.');

    }

}//End function.


/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
/*
DOCUMENTACION (DE STRING A BINARIO Y VICEBERSA)

Funcion: binaryencode($str);

1-Argumento:
  -STRING O STRING BINARIO.

Dante.
http://dantecreations.com/
24-2-2017
*/
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
function binaryencode($str){
  
  if(!empty($str)){
  
    $binario = '';
      
    $str = trim($str);
      
    $str_arr = str_split($str, 4);
      
    for($i = 0; $i<count($str_arr); $i++)
        
      $binario = $binario.str_pad(decbin(hexdec(bin2hex($str_arr[$i]))), strlen($str_arr[$i])*8, "0", STR_PAD_LEFT);
      
      return $binario;
    
  }
    
}

function binarydecode($bin_str){
  
  if(!empty($bin_str)){
  
    $text_str = '';
    
    $chars = explode("\n", chunk_split(str_replace("\n", '', $bin_str), 8));
    
    $_I = count($chars);
    
    for($i = 0; $i < $_I; $text_str .= chr(bindec($chars[$i])), $i++  );
    
      return utf8_decode($text_str);
    
  }
    
}



































?>