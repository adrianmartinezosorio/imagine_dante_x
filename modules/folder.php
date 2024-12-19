<?php
/*

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
FOLDER MODULE
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

folder($path, $permissions = 0777);                         *Crea una carpeta.
folder_copy($origin_path, $destination_path);               *Copiar una carpeta completa.
folder_delete($path);                                       *Elimina una carpeta completa.
folder_size($path);                                         *Obtiene el peso de una carpeta.
folder_list($path);                                         *Listamos todos los archivos de una carpeta.
folder_is_empty($path);                                     *Comprobamos si una carpeta contiene archivos.

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

*/


/*
Crea carpeta si no existe.
09/04/2021

*/
function folder($path, $permissions = 0777){

    if (!empty($path) && !file_exists($path)) {
        mkdir($path, $permissions, true);
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
function folder_list($path){

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
function folder_is_empty($ruta){
	
	$carpeta = @scandir($ruta);
	
	if (count($carpeta) > 2){
		
		return true;
		
	}else{
		
		return false;
		
	}
	
}

?>