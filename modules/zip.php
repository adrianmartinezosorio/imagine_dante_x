<?php

function agregar_zip($dir, $zip) {
  //verificamos si $dir es un directorio
  if (is_dir($dir)) {
    //abrimos el directorio y lo asignamos a $da
    if ($da = opendir($dir)) {
      //leemos del directorio hasta que termine
      while (($archivo = readdir($da)) !== false) {
        /*Si es un directorio imprimimos la ruta
         * y llamamos recursivamente esta función
         * para que verifique dentro del nuevo directorio
         * por mas directorios o archivos
         */
        if (is_dir($dir . $archivo) && $archivo != "." && $archivo != "..") {

           agregar_zip($dir . $archivo . "/", $zip);
 
          /*si encuentra un archivo imprimimos la ruta donde se encuentra
           * y agregamos el archivo al zip junto con su ruta 
           */

        } elseif (is_file($dir . $archivo) && $archivo != "." && $archivo != "..") {
          //echo "Agregando archivo: $dir$archivo <br/>";
          $zip->addFile($dir . $archivo, $dir . $archivo);
        }
      }
      //cerramos el directorio abierto en el momento
      closedir($da);
    }
  }
}


function zip($dir,$rutaFinal,$archivoZip){

	$zip = new ZipArchive();
	 
	if(!file_exists($rutaFinal)){
	  mkdir($rutaFinal);
	}
	 
	$archivoZip = $archivoZip.'.zip';
	 
	if ($zip->open($archivoZip, ZIPARCHIVE::CREATE) === true) {
	  agregar_zip($dir, $zip);
	  $zip->close();
	 
	  //Muevo el archivo a una ruta
	  //donde no se mezcle los zip con los demas archivos
	  rename($archivoZip, "$rutaFinal/$archivoZip");
	 
	  //Hasta aqui el archivo zip ya esta creado
	  //Verifico si el archivo ha sido creado
	  if (file_exists($rutaFinal. "/" . $archivoZip)) {

	    return true;        

	  } else {

	    return false;  

	  }
	}



}
?>