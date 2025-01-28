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



function change_file_extension($directorio,$extensionAntigua,$nuevaExtension){

	// Carpeta en la que se encuentran los archivos
	//$directorio = "memory/cache/tw";

	// Extensión antigua que quieres cambiar (sin el punto)
	//$extensionAntigua = "txt"; // Ejemplo: "txt", "jpg", etc.

	// Nueva extensión a asignar
	//$nuevaExtension = "memory"; // Ejemplo: "pdf", "png", etc.

	// Asegúrate de que la carpeta exista
	if (!is_dir($directorio)) {
		die("El directorio especificado no existe.");
	}

	// Abrir la carpeta
	if ($handle = opendir($directorio)) {
		while (false !== ($archivo = readdir($handle))) {
			// Ignorar los directorios "." y ".."
			if ($archivo != "." && $archivo != "..") {
				// Ruta completa del archivo
				$rutaCompleta = $directorio . DIRECTORY_SEPARATOR . $archivo;

				// Asegurarse de que sea un archivo
				if (is_file($rutaCompleta)) {
					// Obtener información del archivo
					$infoArchivo = pathinfo($rutaCompleta);

					// Verificar si la extensión coincide con la antigua
					if (isset($infoArchivo['extension']) && $infoArchivo['extension'] === $extensionAntigua) {
						// Crear el nuevo nombre con la nueva extensión
						$nuevoNombre = $infoArchivo['filename'] . '.' . $nuevaExtension;

						// Ruta completa del nuevo archivo
						$nuevaRuta = $directorio . DIRECTORY_SEPARATOR . $nuevoNombre;

						// Renombrar el archivo
						if (rename($rutaCompleta, $nuevaRuta)) {
							echo "Archivo renombrado: $archivo a $nuevoNombre\n";
						} else {
							echo "Error al renombrar: $archivo\n";
						}
					}
				}
			}
		}
		closedir($handle);
	}
    
} 
?>