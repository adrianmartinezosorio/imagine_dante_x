<?php
/*

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
IMAGES MODULE
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

-OBTENER TAMAÑO DE IMAGEN - dimensiones_imagen('1.jpg','ancho');
-SUBIR IMAGEN AL SERVIDOR - subir_imagen($_FILES['imagen'],'imagenes/');
-REDIMENSIONAR IMAGEN SIN DEFORMAR - escalarimagen('imagen/12345.jpg',200,200);
-ROTACION DE IMAGEN - rotar('imagen/12345.jpg',90);
-CONVERTIR IMAGEN A BLANCO Y NEGRO - blanconegro('colores.jpg');
-INVERTIR LOS COLORES DE UNA IMAGEN - negativo('1.png');
-CAMBIAR BRILLO DE IMAGEN - brillo('1.png',20);
-CAMBIAR CONTRASTE DE IMAGEN - contraste('1.png',20);
-MANIPULAR EL COLOR DE UNA IMAGEN - color('1.png',100,255,80);
-FUNCION PARA DAR RELIEVE BUSCANDO BORDES A LA IMAGEN - relieve('1.png');
*/


/*-----------------------------------------------------------------------*/
/*
Saber si una imagen es jpg o png.
25-11-2021
*/
/*-----------------------------------------------------------------------*/
function is_jpg($imagepath){

	if(exif_imagetype($imagepath) == IMAGETYPE_JPEG){
    	return true;
    }else{
    	return false;
    }

}
function is_png($imagepath){

	if(exif_imagetype($imagepath) == IMAGETYPE_PNG){
    	return true;
    }else{
    	return false;
    }

}
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (CONVERTIR UNA IMAGEN A BASE 64)

Devolvera una imagen en base 64 lista para usar.
<img src="<?php $resultado_funcion; ?>">

Funcion: (echo) imagen_a_base64($ruta);

Argumentos: Ruta de la imagen.

1ºer Argumento:
	-Se le pasa la ruta en la que se encuentra el archibo original.
	

	
Dante.
22-2-2016

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function imagen_a_base64($ruta){
		
	$imagen_origen = file_get_contents($ruta);
		
	$conversion_64 = base64_encode($imagen_origen);
			
	$analizar_ruta = pathinfo($ruta);
	$extension = $analizar_ruta['extension'];
			
	return 'data:image/'.$extension.';base64,'.$conversion_64;
			
}
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (OBTENER MEDIDAS DE IMAGEN)

Funcion: tamano('1.jpg','ancho');

Argumentos: Ruta del archivo, metodo.

1ºer Argumento:
	-Se le pasa la ruta en la que se encuentra el archibo original.
	
2º Argumento:
	-ancho
	-alto
	
Dante.
24-11-2015

Antigua funcion "tamano" actualizada el 13-1-2016.
Disponible con retrocompatibilidad activada.

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function dimensiones_imagen($ruta,$metodo){
	
      $file = $ruta;
     
      $imagen = getimagesize($file);

	if($metodo == 'ancho'){
		
		return $imagen[0];
		
	}else if($metodo == 'alto'){
		
		return $imagen[1];
		
	}else{
		
		echo 'Segundo argumento de la función "dimensiones_imagen" mal configurado.';
		
	}
		
}
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (FUNCION PARA SUBIR UNA IMAGEN AL SERVIDOR)

La funcion deolvera el nombre de la imagen despuees de subirla, false en caso de error.

Funcion: (echo) subir_imagen($_FILES['imagen'],'imagenes/');

Argumentos: rarchibo de imagen subido ($_FILES['imagen']), la ruta de destino de la imagen.


1ºer Argumento:
	-Se le pasara el archibo subido mediante post por ejemplo.
	-Estan permitidas las extensiones jpg, png y gif.
	
2º Argumento:
	-La ruta donde se movera la imagen subida.
	
Importante!!! En la etiqueta <form> es necesario el atributo enctype="multipart/form-data".
	
Dante.
18-11-2015

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function subir_imagen($archivo,$ruta) {
		
		$formatos = array( 'image/gif', 'image/png', 'image/jpeg' );
		
		if ( $archivo['error'] != 0 ) {
			
			return false;
			
		} else {
			
			if ( !in_array( $archivo['type'], $formatos ) || !getimagesize( $archivo['tmp_name'] ) ) {
				
				return false;
				
			} else {
				
				$extension = '';
				
				if($archivo['type'] == 'image/gif'){
					
					$extension = '.gif';
					
				}else if($archivo['type'] == 'image/png'){
					
					$extension = '.png';
					
				}else if($archivo['type'] == 'image/jpeg'){
					
					$extension = '.jpg';
					
				}
				
				$destino = $ruta . time() . '_' . uniqid() . $extension;
				
				if ( move_uploaded_file( $archivo['tmp_name'], $destino ) ) {
					
					return str_replace( $ruta, '', $destino );
					
				} else {
					
					return false;
					
				}
				
			}
			
		}
		
	}	
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (FUNCION PARA REDIMENSIONAR IMAGEN SIN DEFORMAR)

Se cambiara el tamaño de la imagen sin alterar sus proporciones.

Funcion: escalarimagen('imagen/12345.jpg',200,200);
Argumentos: ruta de la imagen, ancho maximo, alto maximo.


1ºer Argumento:
	-Se le pasara la ruta de la imagen.
	-Estan permitidas las extensiones jpg, png y gif.
	
2º Argumento:
	-Se le pasara el ancho maximo que tendra la imagen.
	
3ºer Argumento:
	-Se le pasara el alto maximo que tendra la imagen.
	
Dante.
4-11-2015
22-11-2021

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function escalarimagen($ruta,$anchomax,$altomax){
	
	//se detecta la extension de la imagen.
	$analizar_ruta = pathinfo($ruta);
	$extension = $analizar_ruta['extension'];
	

	if(exif_imagetype($ruta) == IMAGETYPE_JPEG){
    	$extension = 'jpg';
    }


	//Ruta de la imagen original
	$rutaImagenOriginal = $ruta;
	
	//Creamos una variable imagen a partir de la imagen original
	if($extension == 'jpg'){
		
		$img_original = imagecreatefromjpeg($rutaImagenOriginal);
		
	}else if($extension == 'png'){
		
		$img_original = imagecreatefrompng($rutaImagenOriginal);
		
	}else if($extension == 'gif'){
		
		$img_original = imagecreatefromgif($rutaImagenOriginal);
		
	}else{
		
		echo 'La extension del archibo no es correcta.';
		
	}

	
	//Se define el maximo ancho o alto que tendra la imagen final
	$max_ancho = $anchomax;
	$max_alto = $altomax;
	
	//Ancho y alto de la imagen original
	list($ancho,$alto)=getimagesize($rutaImagenOriginal);
	
	//Se calcula ancho y alto de la imagen final
	$x_ratio = $max_ancho / $ancho;
	$y_ratio = $max_alto / $alto;
	
	//Si el ancho y el alto de la imagen no superan los maximos, 
	//ancho final y alto final son los que tiene actualmente
	if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){//Si ancho 
		$ancho_final = $ancho;
		$alto_final = $alto;
	}
	/*
	 * si proporcion horizontal*alto mayor que el alto maximo,
	 * alto final es alto por la proporcion horizontal
	 * es decir, le quitamos al alto, la misma proporcion que 
	 * le quitamos al alto
	 * 
	*/
	elseif (($x_ratio * $alto) < $max_alto){
		$alto_final = ceil($x_ratio * $alto);
		$ancho_final = $max_ancho;
	}
	/*
	 * Igual que antes pero a la inversa
	*/
	else{
		$ancho_final = ceil($y_ratio * $ancho);
		$alto_final = $max_alto;
	}
	
	//Creamos una imagen en blanco de tamaño $ancho_final  por $alto_final .
	$tmp=imagecreatetruecolor($ancho_final,$alto_final);	
	
	//Copiamos $img_original sobre la imagen que acabamos de crear en blanco ($tmp)
	imagecopyresampled($tmp,$img_original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
	
	//Se destruye variable $img_original para liberar memoria
	imagedestroy($img_original);
	
	//Se elimina la image original.
	unlink($ruta);
	
	//Definimos la calidad de la imagen final
	$calidad=90;
	
	//Se crea la imagen final en el directorio indicado
	if($extension == 'jpg'){
		$calidad=90;
		imagejpeg($tmp,$rutaImagenOriginal,$calidad);
		
	}else if($extension == 'png'){
		$calidad=9;
		imagepng($tmp,$rutaImagenOriginal,$calidad);
		
	}else if($extension == 'gif'){
		$calidad=90;
		imagegif($tmp,$rutaImagenOriginal,$calidad);
		
	}else{
		
		echo 'La extension del archibo no es correcta.';
		
	}
}
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (FUNCION ROTACION DE IMAGEN)

La imagen girara los grados indicados.

Funcion: rotar('imagen/12345.jpg',90);
Argumentos: ruta de la imagen,grados.


1ºer Argumento:
	-Se le pasara la ruta de la imagen.
	-Estan permitidas las extensiones jpg, png y gif.
	
2º Argumento:
	-Los grados que girara la imagen (90 para voltear una vez).

Dante.
4-11-2015

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function rotar($ruta,$grados){
	
	$analizar_ruta = pathinfo($ruta);
	$extension = $analizar_ruta['extension'];
	
    $image = $ruta;
     
    $degrees = $grados;
     
    
     if($extension == 'jpg'){
		
		$source = imagecreatefromjpeg($image);
		
	}else if($extension == 'png'){
		
		$source = imagecreatefrompng($image);
		
	}else if($extension == 'gif'){
		
		$source = imagecreatefromgif($image);
		
	}else{
		
		echo 'La extension del archibo no es correcta.';
		
	}
	
    $rotate = imagerotate($source, $degrees, 0) ;
      
	if($extension == 'jpg'){
		
		 imagejpeg($rotate, $image);
		
	}else if($extension == 'png'){
		
		 imagepng($rotate, $image);
		
	}else if($extension == 'gif'){
		
		 imagegif($rotate, $image);
		
	}else{
		
		echo 'La extension del archibo no es correcta.';
		
	}
	
}
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