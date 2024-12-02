<?php
/*

FILE MODULE 1.0
16-4-2018

*/

//filecompress($nombre_archivo,$nombre_salida); //Comprimir un archivo.
//filessize($ruta);	//Devuelbe el tamaño de un archivo.
//filewrite($ruta,$contenido,$metodo = 'w'); //Escribe un archivo.
//filedownload($remoto,$local); //Descarga un archivo de un servidor remoto.
//filelinecount($file); //Cuenta las filas de un archivo de texto
//filename($prefijo); devuelbe un nombre de archivo unico.
//thisfile(); //Devuelbe el nombre del archivo actual en el que estamos trabajando.

function get_data($path){

    if(file_exists($path)){

        return file_get_contents($path);

    }

}


//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (FUNCION OBTENCION DE TAMAÑO DE ARCHIBO FORMATEADO)

Funcion: (echo) tamano_archivo('prueba.jpg');
Argumentos: archibo o ruta de archibo.

1ºer Argumento:
	-El archibo del que se obtienes el peso.

Dante.
22-11-2015
02-08-2017
*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function filessize($ruta) {
	
	if(!empty($ruta)){	
		
		$peso = filesize($ruta);
		
		$clase = array(" Bytes", " KB", " MB", " GB", " TB"); 
		
		return round($peso/pow(1024,($i = floor(log($peso, 1024)))),2 ).$clase[$i];
		
	}
	
}
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (ESCRIBIR TEXTO EN ARCHIBO)

Funcion: escribir_archivo('facebook.html','Lo que sea.');
Argumentos: ruta del archivo, contenido del archivo.

Si no existe creara el archivo, en caso de existir lo sobreescribira.

Dante.
16-11-2015

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------	
function filewrite($ruta,$contenido,$metodo = 'w'){
	
	$file = fopen($ruta, $metodo);

	fwrite($file, $contenido);

	fclose($file);

}
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (OBTENER ARCHIVO DE SERVIDOR REMOTO)

Funcion: descargar_archivo_remoto('http://rootsofsmoke.com/img/logo.png','logo.png');
Argumentos: ruta del archivo remoto, ruta en la que se guardara el archivo en nuestro servidor.

Dante.
29-2-2016

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function filedownload($remoto,$local){
 
	if(!empty($remoto) && !empty($local)){
	 
		ini_set('max_execution_time', 600);
		 
		$datos = file_get_contents($remoto);
		 
		file_put_contents($local, $datos);

		return true;

	}else{
		
		return false;
		
	}

}
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (CONTAR LAS LINEAS DE UN ARCHIVO DE TEXTO)

Funcion: linecount($file);
Argumentos: Ruta del archivo.

Devolbera la cantidad de lineas escritas del archivo.

Dante.
02-08-2017

*/	
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function filelinecount($file){

	$archivo = $file;
	$lineas = count(file($archivo));
	return $lineas;

}
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (NOMBRE ESTANDART PARA ARCHIVOS)

Funcion: filename($prefijo);
Argumentos: Un prefijo cualquiera.

Devolbera un nombre de archivo sin extensión.

Dante.
07-05-2018

*/	
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function filename($prefijo){

    return $prefijo.'_'.date("Y").'_'.date("m").'_'.date("d").'_'.time().'_'.rand(1,9000);

}
function thisfile(){

    return basename($_SERVER['PHP_SELF']);

}
?>