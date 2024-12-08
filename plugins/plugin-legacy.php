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

?>