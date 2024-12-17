<?php
/*

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
IMAGE MODULE
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

-CONVERTIR IMAGEN A BLANCO Y NEGRO - blanconegro('colores.jpg');
-INVERTIR LOS COLORES DE UNA IMAGEN - negativo('1.png');
-CAMBIAR BRILLO DE IMAGEN - brillo('1.png',20);
-CAMBIAR CONTRASTE DE IMAGEN - contraste('1.png',20);
-MANIPULAR EL COLOR DE UNA IMAGEN - color('1.png',100,255,80);
-FUNCION PARA DAR RELIEVE BUSCANDO BORDES A LA IMAGEN - relieve('1.png');

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (FUNCION CONVERSION DE IMAGEN A BLANCO Y NEGRO)

La imagen se pondra en blanco y negro.

Funcion: blanconegro('colores.jpg');
Argumentos: ruta de la imagen.


1ºer Argumento:
	-Se le pasara la ruta de la imagen.
	-Estan permitidas las extensiones jpg, png y gif.

Dante.
4-11-2015

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function blanconegro($ruta){
	
	$analizar_ruta = pathinfo($ruta);
	$extension = $analizar_ruta['extension'];
	
	if($extension == 'jpg'){
		
		$im = imagecreatefromjpeg($ruta);
		
	}else if($extension == 'png'){
		
		$im = imagecreatefrompng($ruta);
		
	}else if($extension == 'gif'){
		
		$im = imagecreatefromgif($ruta);
		
	}else{
		
		echo 'La extension del archibo no es correcta.';
		
	}
						
	if($im && imagefilter($im, IMG_FILTER_GRAYSCALE)){
		
		if($extension == 'jpg'){
		
			imagejpeg($im, $ruta);
		
		}else if($extension == 'png'){
			
			imagepng($im, $ruta);
			
		}else if($extension == 'gif'){
			
			imagegif($im, $ruta);
			
		}else{
		
			echo 'La extension del archibo no es correcta.';
		
		}
							
	}else{
							
		echo 'La imagen no se convirtio a escala de grises.';
							
	}
	
	imagedestroy($im);
	
}
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (FUNCION CONVERSION DE IMAGEN A INVERTIDA)

Se invertiran los colores de la imagen.

Funcion: negativo('1.png');
Argumentos: ruta de la imagen.


1ºer Argumento:
	-Se le pasara la ruta de la imagen.
	-Estan permitidas las extensiones jpg, png y gif.

Dante.
4-11-2015

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function negativo($ruta){
	
	$analizar_ruta = pathinfo($ruta);
	$extension = $analizar_ruta['extension'];
	
	if($extension == 'jpg'){
		
		$im = imagecreatefromjpeg($ruta);
		
	}else if($extension == 'png'){
		
		$im = imagecreatefrompng($ruta);
		
	}else if($extension == 'gif'){
		
		$im = imagecreatefromgif($ruta);
		
	}else{
		
		echo 'La extension del archibo no es correcta.';
		
	}
						
	if($im && imagefilter($im, IMG_FILTER_NEGATE)){
		
		if($extension == 'jpg'){
		
			imagejpeg($im, $ruta);
		
		}else if($extension == 'png'){
			
			imagepng($im, $ruta);
			
		}else if($extension == 'gif'){
			
			imagegif($im, $ruta);
			
		}else{
		
			echo 'La extension del archibo no es correcta.';
		
		}
							
	}else{
							
		echo 'La imagen no se convirtio a invertida.';
							
	}
	
	imagedestroy($im);
	
}
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (FUNCION FUNCION MANIPULAR BRILLO DE IMAGEN)

Se cambiara el brillo de la imagen.

Funcion: brillo('1.png',20);
Argumentos: ruta de la imagen, valor de brillo (de -255 a 255 siendo 0 el valor pro defecto).


1ºer Argumento:
	-Se le pasara la ruta de la imagen.
	-Estan permitidas las extensiones jpg, png y gif.
	
2º Argumento:
	-Se le pasara la cantidad de brillo en forma de numero.
	-De 0 a 255 para aumentar el brillo.
	-De 0 a -255 para disminuir el brillo.
	
Dante.
4-11-2015

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function brillo($ruta,$valor){
	
	$analizar_ruta = pathinfo($ruta);
	$extension = $analizar_ruta['extension'];
	
	if($extension == 'jpg'){
		
		$im = imagecreatefromjpeg($ruta);
		
	}else if($extension == 'png'){
		
		$im = imagecreatefrompng($ruta);
		
	}else if($extension == 'gif'){
		
		$im = imagecreatefromgif($ruta);
		
	}else{
		
		echo 'La extension del archibo no es correcta.';
		
	}
						
	if($im && imagefilter($im, IMG_FILTER_BRIGHTNESS, $valor)){
		
		if($extension == 'jpg'){
		
			imagejpeg($im, $ruta);
		
		}else if($extension == 'png'){
			
			imagepng($im, $ruta);
			
		}else if($extension == 'gif'){
			
			imagegif($im, $ruta);
			
		}else{
		
			echo 'La extension del archibo no es correcta.';
		
		}
							
	}else{
							
		echo 'La imagen no cambio de brillo.';
							
	}
	
	imagedestroy($im);
	
}
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (FUNCION PARA MANIPULAR EL CONTRASTE DE IMAGEN)

Se cambiara el contraste de la imagen.

Funcion: contraste('1.png',20);
Argumentos: ruta de la imagen, valor de contraste (de -255 a 255 siendo 0 el valor pro defecto).


1ºer Argumento:
	-Se le pasara la ruta de la imagen.
	-Estan permitidas las extensiones jpg, png y gif.
	
2º Argumento:
	-Se le pasara la cantidad de contraste en forma de numero.
	-De 0 a 255 para aumentar el contraste.
	-De 0 a -255 para disminuir el contraste.
	
Dante.
4-11-2015

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function contraste($ruta,$valor){
	
	$analizar_ruta = pathinfo($ruta);
	$extension = $analizar_ruta['extension'];
	
	if($extension == 'jpg'){
		
		$im = imagecreatefromjpeg($ruta);
		
	}else if($extension == 'png'){
		
		$im = imagecreatefrompng($ruta);
		
	}else if($extension == 'gif'){
		
		$im = imagecreatefromgif($ruta);
		
	}else{
		
		echo 'La extension del archibo no es correcta.';
		
	}
						
	if($im && imagefilter($im, IMG_FILTER_CONTRAST, $valor)){
		
		if($extension == 'jpg'){
		
			imagejpeg($im, $ruta);
		
		}else if($extension == 'png'){
			
			imagepng($im, $ruta);
			
		}else if($extension == 'gif'){
			
			imagegif($im, $ruta);
			
		}else{
		
			echo 'La extension del archibo no es correcta.';
		
		}
							
	}else{
							
		echo 'La imagen no cambio de brillo.';
							
	}
	
	imagedestroy($im);
	
}
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (FUNCION PARA MANIPULAR EL COLOR DE UNA IMAGEN)

Se cambiara el color de la imagen.

Funcion: color($ruta,$red,$green,$blue); -- color('1.png',100,255,80);
Argumentos: ruta de la imagen, valor de rojo, valor de verde, valor de azul.


1ºer Argumento:
	-Se le pasara la ruta de la imagen.
	-Estan permitidas las extensiones jpg, png y gif.
	
2º Argumento:
	-La cantidad de rojo en la imagen (0 a 255);
	
3º Argumento:
	-La cantidad de verde en la imagen (0 a 255);
	
4º Argumento:
	-La cantidad de azul en la imagen (0 a 255);
	

	
Dante.
4-11-2015

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function color($ruta,$red,$green,$blue){
	
	$analizar_ruta = pathinfo($ruta);
	$extension = $analizar_ruta['extension'];
	
	if($extension == 'jpg'){
		
		$im = imagecreatefromjpeg($ruta);
		
	}else if($extension == 'png'){
		
		$im = imagecreatefrompng($ruta);
		
	}else if($extension == 'gif'){
		
		$im = imagecreatefromgif($ruta);
		
	}else{
		
		echo 'La extension del archibo no es correcta.';
		
	}
						
	if($im && imagefilter($im, IMG_FILTER_COLORIZE, $red, $green, $blue)){
		
		if($extension == 'jpg'){
		
			imagejpeg($im, $ruta);
		
		}else if($extension == 'png'){
			
			imagepng($im, $ruta);
			
		}else if($extension == 'gif'){
			
			imagegif($im, $ruta);
			
		}else{
		
			echo 'La extension del archibo no es correcta.';
		
		}
							
	}else{
							
		echo 'La imagen no cambio de brillo.';
							
	}
	
	imagedestroy($im);
	
}
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (FUNCION PARA DAR RELIEVE BUSCANDO BORDES A LA IMAGEN)

Se cromara en gris y se pondra en relieve.

Funcion: relieve('1.png');
Argumentos: ruta de la imagen.


1ºer Argumento:
	-Se le pasara la ruta de la imagen.
	-Estan permitidas las extensiones jpg, png y gif.

	
Dante.
4-11-2015

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function relieve($ruta){
	
	$analizar_ruta = pathinfo($ruta);
	$extension = $analizar_ruta['extension'];
	
	if($extension == 'jpg'){
		
		$im = imagecreatefromjpeg($ruta);
		
	}else if($extension == 'png'){
		
		$im = imagecreatefrompng($ruta);
		
	}else if($extension == 'gif'){
		
		$im = imagecreatefromgif($ruta);
		
	}else{
		
		echo 'La extension del archibo no es correcta.';
		
	}
						
	if($im && imagefilter($im, IMG_FILTER_EMBOSS)){
		
		if($extension == 'jpg'){
		
			imagejpeg($im, $ruta);
		
		}else if($extension == 'png'){
			
			imagepng($im, $ruta);
			
		}else if($extension == 'gif'){
			
			imagegif($im, $ruta);
			
		}else{
		
			echo 'La extension del archibo no es correcta.';
		
		}
							
	}else{
							
		echo 'La imagen no se convirtio a relieve.';
							
	}
	
	imagedestroy($im);
	
}
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------



?>