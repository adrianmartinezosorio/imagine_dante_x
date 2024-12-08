<?php

function euro($euros){
	
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

function ceros($numero,$cantidad_ceros,$posicion = "left"){
	
	if($posicion == 'left'){
		
		return str_pad($numero, $cantidad_ceros, "0", STR_PAD_LEFT);
		
	}else if($posicion == 'right'){
		
		return str_pad($numero, $cantidad_ceros, "0", STR_PAD_RIGHT);
		
	}else{
		
		ierror('format_ceros','El tercer argumento de la funcion "ceros" esta mal configurado.');
		
	}
	
}

function formato($numero,$formateo){
    
    if(!is_numeric($numero) || !is_numeric($formateo)){
        
        ierror('matematicas_formato','Alguno de los argumentos de la funcion "formato" no es numerico.');
        
    }else{
        
        return number_format($numero, $formateo, '.', '.' );
        
    }
    
}
?>