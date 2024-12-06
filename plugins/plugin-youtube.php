<?php
/*

YOUTUBE MODULE 1.0
13-04-2018

youtube_title($idyoutube); //Obtiene el titulo de un video.
youtube_id($url); //Obtiene el codigo clave del video a partir de la url.

*/
/*--------------------------------------------------*/
/*--------------------------------------------------*/
/*

Function: youtube_title($idyoutube);

Date: 13-04-2018

Arguments: Id video Youtube.

Response: Titulo del video.

*/
/*--------------------------------------------------*/
/*--------------------------------------------------*/
function youtube_title($idyoutube){
	
	$content = file_get_contents("http://youtube.com/get_video_info?video_id=".$id_youtube);
	parse_str($content, $info);
	return $titulo = $info['title'];
				
}
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (FUNCION ENLACE DE YOUTUBE 2)

Funcion: youtube('https://www.youtube.com/watch?v=qqeiB8uXpgI&spfreload=5&load=7&read=198');
Argumentos: enlace de youtube.
	
1º Argumento:
	-Enlace de youtube.

Esta funcion detectara el tipo de enlace de youtube y devolvera el codigo clave.
En caso de no ser un enlace de youtube reconocido devolbera false.

Formatos admitidos:
-https://www.youtube.com/watch?v=qqeiB8uXpgI
-https://www.youtube.com/watch?v=qqeiB8uXpgI&spfreload=5
-https://youtu.be/qqeiB8uXpgI

Se puede usar http o https indiferentemente.

Dante.
11-4-2016

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function youtube_id($url){
	
	$resultado_1 = strpos($enlace,'https://www.youtube.com/watch?v=');
	$resultado_2 = strpos($enlace,'http://www.youtube.com/watch?v=');
	$resultado_3 = strpos($enlace,'https://youtu.be/');
	$resultado_4 = strpos($enlace,'http://youtu.be/');
	
	if($resultado_1 !== false || $resultado_2 !== false){
		
		$enlace_escapado = explode('&',$enlace);
		
		if(count($enlace_escapado) != 1){
			
			$enlace_escapado = explode('=',$enlace_escapado[0]);
		
			return $enlace_escapado[1];
			
		}else{
			
			$enlace_escapado = explode('=',$enlace);
		
			return $enlace_escapado[1];
				
		}
		
	}else if($resultado_3 !== false || $resultado_4 !== false){
		
		$enlace_escapado = explode('/',$enlace);
		
		return $enlace_escapado[3];
		
	}else{
		
		return false;
		
	}
	
}
?>