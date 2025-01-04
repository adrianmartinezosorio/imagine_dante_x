<?php
/*

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
FILE MODULE
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

file_data($path);
file_size($ruta);											*Devuelbe el tamaño de un archivo.
file_write($ruta,$contenido,$metodo = 'w'); 				*Escribe un archivo.
file_download($remoto,$local); 								*Descarga un archivo de un servidor remoto.
file_linecount($file); 										*Cuenta las filas de un archivo de texto
file_name($prefijo); 										*Devuelbe un nombre de archivo unico.

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

*/

function file_data($path){

    if(file_exists($path)){

		ilog("file_data",'Se cargo el contenido de: '.$path);

        return file_get_contents($path);

    }else{

		ierror('file_data','La ruta no existe: '.$path);

    	return false;

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
function file_size($ruta) {
	
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
function file_write($ruta,$contenido,$metodo = 'w'){
	
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
function file_download($remoto,$local){
 
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
function file_linecount($file){

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
function file_name($prefijo = ""){

	if(!empty($prefijo)){

		return $prefijo.'_'.date("Y").'_'.date("m").'_'.date("d").'_'.time().'_'.rand(1,9000);
		
	}else{

		return date("Y").'_'.date("m").'_'.date("d").'_'.time().'_'.rand(1,9000);

	}

    

}

?>