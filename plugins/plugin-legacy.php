<?php

function euro($euros){
	
	if(!empty($euros)){

		if(is_numeric($euros)){

			return number_format($euros, 2, '.', '');

		}else{

			ierror('format_euro','El parametro no es un numero (no_number:'.$euros.').');

		}

	}else{

		ierror('format_euro','Parametro vacio.');

	}
	
}

function ceros($numero,$cantidad_ceros,$posicion = "left"){
	
	if($posicion == 'left'){
		
		return str_pad($numero, $cantidad_ceros, "0", STR_PAD_LEFT);
		
	}else if($posicion == 'right'){
		
		return str_pad($numero, $cantidad_ceros, "0", STR_PAD_RIGHT);
		
	}else{
		
		ierror('format_ceros','El tercer argumento de la funcion "ceros" esta mal configurado.');
		
	}
	
}

function formato($numero,$formateo){
    
    if(!is_numeric($numero) || !is_numeric($formateo)){
        
        ierror('matematicas_formato','Alguno de los argumentos de la funcion "formato" no es numerico.');
        
    }else{
        
        return number_format($numero, $formateo, '.', '.' );
        
    }
    
}

function ralfa(){

	return mt_rand() . uniqid() . uniqid() . time();

}
function rnum(){

	return mt_rand() . mt_rand()  . mt_rand() . time();

}

function filecompress($nombre_archivo,$nombre_salida){
	 
	$zip = new ZipArchive();
	 
	$filename = $nombre_salida;
	 
	if($zip->open($filename,ZIPARCHIVE::CREATE)===true) {
			$zip->addFile($nombre_archivo);
			$zip->close();
			return true;
	}
	else {
		
			return false;
			
	}
	
}
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