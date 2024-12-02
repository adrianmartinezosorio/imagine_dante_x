<?php
/*

INTERFACE MODULE 1.0

table($filas,$arrayvalues,$id);
multiplicador($veces,$elemento);
archivos_cabezera($carpeta);

2020
2016 

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (GENERA TABLA HTML CON UN ARRAY)

Funcion:  table(5,array(1,2,3,4,5,6,7,8,9,10),'table1');
Argumentos: Columnas, Array Contenido, Id Html

CREACIÓN: 07-11-2020

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------

function table($filas,$arrayvalues,$id){

	$table = '
<table id="'.$id.'" width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
<tr>
  <td>
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
	';

	for($i=0;$i<count($arrayvalues);$i++){


		if($i == 0){
			$table .= '	<tr>'  . PHP_EOL;
		}else if(( $i % $filas ) == 0){
			$table .= '	</tr>
			<tr>'  . PHP_EOL;
		}

		$table .= '		<td width="'. 100 / $filas .'">'.$arrayvalues[$i].'</td>' . PHP_EOL;



	}
	$table .= '</tr>';

	$table .= '
    </table>
  </td>
</tr>
</table>

	';

	return $table;

}
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (MULTIPLICA ELEMENTOS TANTAS VECES COMO SE LE INDIQUE)

Funcion:  multiplicador(3,'<i class="fa fa-star"></i>');
Argumentos: veces que se multiplicara, elemento a multiplicar.

En este caso en el que $veces es 3 y el $elemento es: <i class="fa fa-star"></i>

EL resultado sera:
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>

Dante.
http://dantecreations.com/
18-4-2016

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function multiplicador($veces,$elemento){
	
	if(!empty($veces) && !empty($elemento)){
	
		if(is_numeric($veces)){
		
			$retorno = '';
			
			for($i = 0;$i < $veces;$i++){
				
				$retorno .= $elemento;
				
			}
			
			return $retorno;
		
		}else{

			ierror('interface_multiplicador','Argumento no numerico.');
			
		}
	
	}else{
		
		ierror('interface_multiplicador','Argumento vacio.');
		
	}

}
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (LISTAR ARCHIBOS DE CABEZERA)

Esta funcion acoplara automaticamente todos los archivos .js y .css de la carpeta dada.

Funcion:  archivos_cabezera('app/');
Argumentos: ruta de los archivos.

Dante.
http://dantecreations.com/
11-1-2016

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function archivos_cabezera($carpeta){
    if(is_dir($carpeta)){
        if($dir = opendir($carpeta)){
            while(($archivo = readdir($dir)) !== false){

				if(!empty($archivo)){
					
					$analizar_ruta = pathinfo($carpeta . $archivo);
					$extension = $analizar_ruta['extension'];
					
					if($extension == 'css'){
						
						echo '<link rel="stylesheet" type="text/css" href="'.$carpeta . $archivo.'">';
						
					}else if($extension == 'js'){
						
						echo '<script type="text/javascript" src="'.$carpeta . $archivo.'"></script>';
						
					}
					
				}//Endif.
                
            }
            closedir($dir);
        }
    }
}
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (COLOCAR MINIATURAS EN CAJAS CUADRADAS)

Esta funcion acoplara por css una miniatura en una caja cuadrada.

Funcion:  colocar_miniaturas($colocacion);
Argumentos: tipo de imagen.

Dante.
http://dantecreations.com/
23-2-2016

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
function colocar_miniaturas($colocacion){
						
		if($colocacion == 'vertical_superior'){
							
			$posicion = 'background-size: 100% auto;background-position: center 0px;';
							
		}else if($colocacion == 'vertical_centrada'){
							
			$posicion = 'background-size: 100% auto;background-position: center;';
							
		}else if($colocacion == 'horizontal'){
							
			$posicion = 'background-size: auto 100%;background-position: center;';
							
		}else if($colocacion == 'horizontal_izquierda'){
							
			$posicion = 'background-size: auto 100%;background-position: 0px center;';
							
		}else if($colocacion == 'horizontal_derecha'){
							
			$posicion = 'background-size: auto 100%;background-position: center 0px;';
							
		}
		
		return $posicion;
		
}
*/
/*
Detecta si la imagen es horizontal o vertical y devulebe los estilos para encajarla.
29-3-2016
*/
/*
function traducir_posicion_css($imagen){
	
	$ancho = dimensiones_imagen($imagen,'ancho');
	$alto = dimensiones_imagen($imagen,'alto');
	
	if($ancho > $alto){ //horizontal
		
		return 'background-size: auto 100%;background-position: center;';
		
	}else if($ancho < $alto){ //vertical
		
		return 'background-size: 100% auto;background-position: center;';
		
	}else if($ancho == $alto){ //cuadrada
		
		return 'background-size: 100% auto;background-position: center;';
		
	}
	
}
*/
?>