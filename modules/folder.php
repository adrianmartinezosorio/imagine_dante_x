<?php
/*

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
FOLDER MODULE
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

folder($path);
folder_copy( $source, $target );
folder_delete($carpeta);
folder_size($path);

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
*/
/*
Crea carpeta si no existe.
09/04/2021

*/
function folder($path){

    if (!empty($path) && !file_exists($path)) {
        mkdir($path, 0777, true);
    }

}
/*---------------------------------------------------------------------------*/
/* Copiamos una carpeta completa. */
/* 2020 */
/*---------------------------------------------------------------------------*/
function folder_copy( $source, $target ){
    if ( is_dir( $source ) ) {
        @mkdir( $target );
        $d = dir( $source );
        while ( FALSE !== ( $entry = $d->read() ) ) {
            if ( $entry == '.' || $entry == '..' ) {
                continue;
            }
            $Entry = $source . '/' . $entry; 
            if ( is_dir( $Entry ) ) {
                folder_full_copy( $Entry, $target . '/' . $entry );
                continue;
            }
            copy( $Entry, $target . '/' . $entry );

        }
 
        $d->close();
    }else {
        copy( $source, $target );
    }
}
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (ELIMINAR CARPETA Y CONTENIDOS).

Eliminara una carpeta y todas sus subcarpetas y archivos.

Funcion:  eliminar_carpeta('paradise_data/');
Argumentos: ruta de la carpeta.


Dante.
8-2-2016

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function folder_delete($carpeta){
		
	foreach(glob($carpeta . "/*") as $archivos_carpeta){
				 
		if (is_dir($archivos_carpeta)){
							
			folder_delete($archivos_carpeta);
							
		}else{
			
			unlink($archivos_carpeta);
			
		}
						
	}
				 
	rmdir($carpeta);
	
}
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION

Obtiene el peso de una carpeta.

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function folder_size($path){
    $bytestotal = 0;
    $path = realpath($path);
    if($path!==false && $path!='' && file_exists($path)){
        foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS)) as $object){
            $bytestotal += $object->getSize();
        }
    }
    return $bytestotal;
}
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (COMPROVAR SI UNA CARPETA ESTA VACIA O NO)

Comprovara si una carpeta contiene archivos o no.

Funcion:  carpeta_llena('paradise_data/backups/');
Argumentos: ruta de la carpeta.

Funcion de true o false.

true: Contiene archivos
false: No contiene archivos

Dante.
7-2-2016

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function carpeta_llena($ruta){
	
	$carpeta = @scandir($ruta);
	
	if (count($carpeta) > 2){
		
		return true;
		
	}else{
		
		return false;
		
	}
	
}
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (LISTAR ARCHIVOS DE UNA CARPETA).

Devolvera un array con los nombres de todos los archivos de la carpeta.

Funcion:  $array = listar_archivos('paradise_data/backups/'); echo $array[0];
Argumentos: ruta de la carpeta.

Excepciones de los archivos con los nombres:
-.
-..
-.htaccess

Dante.
7-2-2016

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function listar_archivos($carpeta){
    if(is_dir($carpeta)){
        if($dir = opendir($carpeta)){
			
			$array_archivos = array();
			
            while(($archivo = readdir($dir)) !== false){
                if($archivo != '.' && $archivo != '..' && $archivo != '.htaccess'){
					
					
					array_push($array_archivos, $archivo);
					
					
                }
            }
			
			return $array_archivos;
			
            closedir($dir);
        }
    }
}






/*---------------------------------------------------------------------------*/
/* Listamos una carpeta completa. */
/* 2020 */
/*---------------------------------------------------------------------------*/
function folder_full_list_in_array_cachewrite($ruta,$contenido,$metodo = 'w'){
    
    $file = fopen($ruta, $metodo);

    fwrite($file, $contenido);

    fclose($file);

}
function folder_full_list_process($ruta,$uniqidname)
     {
     // abrir un directorio y listarlo recursivo
     if (is_dir($ruta))
     {
     if ($dh = opendir($ruta))
     {
     //echo "<br /><strong>$ruta</strong>"; // Aqui se imprime el nombre de la carpeta o directorio

     while (($file = readdir($dh)) !== false)
     {
     //if (is_dir($ruta . $file) && $file!="." && $file!="..") // Si se desea mostrar solo directorios
     if ($file!="." && $file!=".." && $file!=".DS_Store") // Si se desea mostrar directorios y archivos
     {
     //solo si el archivo es un directorio, distinto que "." y ".."
     //echo "<br />$ruta$file"; // Aqui se imprime el nombre del Archivo con su ruta relativa


     if(is_file($ruta.$file) && file_exists($ruta.$file) && !empty($ruta.$file)){


        folder_full_list_in_array_cachewrite($uniqidname.'.txt',$ruta.$file.'+X####--Y1Y--####X+','a');
        //echo $ruta.$file.'+X####--Y1Y--####X+<br>';


     }

     folder_full_list_process($ruta . $file . '/',$uniqidname); // Ahora volvemos a llamar la función
     }
     }
     closedir($dh);
     }
     }

}
function folder_full_list($path){

             $uniqidname = uniqid().uniqid();

             folder_full_list_process($path,$uniqidname);

             if(file_exists($uniqidname.'.txt')){

                 $cache = file_get_contents($uniqidname.'.txt');

                 if(!empty($cache)){

                     $cache_to_array = explode('+X####--Y1Y--####X+',$cache);

                     $final = $cache_to_array;
                     $final = array_filter($final);
                     $final = array_values($final);

                     unlink($uniqidname.'.txt');

                     return $final;

                 }

             }

}

?>