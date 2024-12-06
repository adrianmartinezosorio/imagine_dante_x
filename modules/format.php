<?php
/*

PARSEDATA MODULE 1.0

format_bytes($bytes); //De bytes a formato segun proceda.

format_roman($integer); //De numeración DECIMAL a numeración ROMANA.

format_ordinal($numero,$sexo = 'o'); De decimal a ordinal.

*/


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

                ierror('parsedata_dec2ordinal','No existe soporte para este numero.');

            }

        }else{

            ierror('parsedata_dec2ordinal','El parametro no es un numero.');

        }

    }else{

         ierror('parsedata_dec2ordinal','El parametro sexo no esta bien definido.');

    }

}//End function.




function gps2Num($coordPart){
    $parts = explode('/', $coordPart);
    if(count($parts) <= 0)
    return 0;
    if(count($parts) == 1)
    return $parts[0];
    return floatval($parts[0]) / floatval($parts[1]);
}

































?>