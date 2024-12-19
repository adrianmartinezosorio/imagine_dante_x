<?php
/*

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
IMAGE MODULE
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

image_upload($archivo,$ruta);
image_size($ruta,$metodo);
image_resize($originalpath, $originalpath, 1000, 2000);
image_rotate($originalpath, $originalpath, -90); 

is_image($archivo);
is_jpg($imagepath);
is_png($imagepath);
is_gif($imagepath);
is_webp($imagepath);

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

*/



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
function image_size($ruta,$metodo){
	
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
function image_upload($archivo,$ruta) {
		
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
function image_resize($sourcePath, $targetPath, $maxWidth, $maxHeight) {
    // Obtenemos las dimensiones de la imagen original
    list($origWidth, $origHeight) = getimagesize($sourcePath);

    // Calculamos la nueva altura y anchura de la imagen manteniendo la relación de aspecto original
    $aspectRatio = $origWidth / $origHeight;
    if ($maxWidth / $maxHeight > $aspectRatio) {
        $maxWidth = $maxHeight * $aspectRatio;
    } else {
        $maxHeight = $maxWidth / $aspectRatio;
    }

    $maxWidth = intval($maxWidth);
    $maxHeight = intval($maxHeight);

    // Creamos la imagen de destino con las nuevas dimensiones
    $targetImage = imagecreatetruecolor($maxWidth, $maxHeight);

    // Cargamos la imagen original
    switch (exif_imagetype($sourcePath)) {
        case IMAGETYPE_JPEG:
            $sourceImage = imagecreatefromjpeg($sourcePath);
            break;
        case IMAGETYPE_PNG:
            $sourceImage = imagecreatefrompng($sourcePath);
            break;
        case IMAGETYPE_GIF:
            $sourceImage = imagecreatefromgif($sourcePath);
            break;
        case IMAGETYPE_WEBP:
            $sourceImage = imagecreatefromwebp($sourcePath);
            break;
        default:
            return false;
    }

    // Redimensionamos la imagen original y la copiamos en la nueva imagen de destino
    imagecopyresampled($targetImage, $sourceImage, 0, 0, 0, 0, $maxWidth, $maxHeight, $origWidth, $origHeight);

    // Guardamos la imagen redimensionada en el archivo de destino
    switch (exif_imagetype($sourcePath)) {
        case IMAGETYPE_JPEG:
            imagejpeg($targetImage, $targetPath, 90);
            break;
        case IMAGETYPE_PNG:
            imagepng($targetImage, $targetPath, 9);
            break;
        case IMAGETYPE_GIF:
            imagegif($targetImage, $targetPath);
            break;
        case IMAGETYPE_WEBP:
            imagewebp($targetImage, $targetPath);
            break;
        default:
            return false;
    }

    // Liberamos la memoria utilizada por las imágenes
    imagedestroy($sourceImage);
    imagedestroy($targetImage);

    return true;
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
function image_rotate($ruta_original, $ruta_rotada, $angulo) {
	// Obtener la extensión de la imagen
	$extension = pathinfo($ruta_original, PATHINFO_EXTENSION);
  
	// Cargar la imagen original según su extensión
	switch($extension) {
	  case 'jpg':
	  case 'jpeg':
		$imagen = imagecreatefromjpeg($ruta_original);
		break;
	  case 'png':
		$imagen = imagecreatefrompng($ruta_original);
		break;
	  case 'gif':
		$imagen = imagecreatefromgif($ruta_original);
		break;
	  default:
		die('Error: formato de imagen no válido');
	}
  
	// Rotar la imagen según el ángulo especificado
	$imagen_rotada = imagerotate($imagen, $angulo, 0);
  
	// Guardar la imagen rotada según su extensión
	switch($extension) {
	  case 'jpg':
	  case 'jpeg':
		imagejpeg($imagen_rotada, $ruta_rotada);
		break;
	  case 'png':
		imagepng($imagen_rotada, $ruta_rotada);
		break;
	  case 'gif':
		imagegif($imagen_rotada, $ruta_rotada);
		break;
	}
  
	// Liberar la memoria utilizada por las imágenes
	imagedestroy($imagen);
	imagedestroy($imagen_rotada);
}


/*-----------------------------------------------------------------------*/
/*
Saber si una imagen es jpg o png.
25-11-2021
*/
/*-----------------------------------------------------------------------*/
function is_image($archivo) {
    $extensionesPermitidas = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    $extension = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

    if (!in_array($extension, $extensionesPermitidas)) {
        return false; // La extensión no es de una imagen
    }

    // Confirma que el archivo es una imagen
    return getimagesize($archivo) !== false;
}
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
function is_gif($imagepath){

	if(exif_imagetype($imagepath) == IMAGETYPE_GIF){
    	return true;
    }else{
    	return false;
    }

}
function is_webp($imagepath){

	if(exif_imagetype($imagepath) == IMAGETYPE_WEBP){
    	return true;
    }else{
    	return false;
    }

}







?>