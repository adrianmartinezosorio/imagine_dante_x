<?php
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
/*
FUNCION: ENCRIPTACION DE IDS O NUMEROS EN GENERAL

Esta funcion se crea bajo la idea de ocutar los ids reales de cara al usuario.

echo cid($id); //Encripta el numero id.

echo did($id); //Desencripta el numero id. Devuelbe false en caso de no recibir un cid valido.

1-Argumento:
EL numero o id.

16-6-2016
Dante.

*/
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/

function cid($id){

	if(is_numeric($id)){
	
		$numero_original = $id;

		$id = str_replace('1','z',$id);
		$id = str_replace('2','x',$id);
		$id = str_replace('3','y',$id);
		$id = str_replace('4','d',$id);
		$id = str_replace('5','k',$id);
		$id = str_replace('6','w',$id);
		$id = str_replace('7','h',$id);
		$id = str_replace('8','n',$id);
		$id = str_replace('9','a',$id);
		$id = str_replace('0','s',$id);

		$id = strrev(strtoupper($id));

		return $id;

	}else{

		return false;
		
	}

}

function did($id){ 

	$datos = $id;

	$permitidos = "ZXYDKWHNAS";

	for ($i=0;$i<strlen($datos);$i++){

		if(strpos($permitidos, substr($datos,$i,1))===false){ 
			return false;
 		}
	}
 
	$id = strtolower($id);

	$id = str_replace('z','1',$id);
	$id = str_replace('x','2',$id);
	$id = str_replace('y','3',$id);
	$id = str_replace('d','4',$id);
	$id = str_replace('k','5',$id);
	$id = str_replace('w','6',$id);
	$id = str_replace('h','7',$id);
	$id = str_replace('n','8',$id);
	$id = str_replace('a','9',$id);
	$id = str_replace('s','0',$id);

	$id = strrev($id);

	return $id;

}

/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
/*
FUNCION: ENCRIPTACION DE INFORMACION CON LLAVE

Funcion de encriptacion en general, usara una key unica para encriptar y desencriptar informacion.

echo encrypt($id);

echo decrypt($id); 

1-Argumento:
La informacion string.

2-Argumento:
La llave de encriptacion y desencriptacion

1-3-2017
Dante.
*/
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/

function encrypt($string,$key) {
	
	if(!empty($string) && !empty($key)){

	  $result = '';
	  $string = trim($string);
	  for($i=0; $i<strlen($string); $i++){
		 $char = substr($string, $i, 1);
		 $keychar = substr($key, ($i % strlen($key))-1, 1);
		 $char = chr(ord($char)+ord($keychar));
		 $result.=$char;
	  }
	  
	  return base64_encode($result);
	  
	}
	  
}
	
function decrypt($string,$key) {


	
	if(!empty($string) && !empty($key)){
	
	  $result = '';
	  $string = trim($string);
	  $string = base64_decode($string);
	  for($i=0; $i<strlen($string); $i++){
		 $char = substr($string, $i, 1);
		 $keychar = substr($key, ($i % strlen($key))-1, 1);
		 $char = chr(ord($char)-ord($keychar));
		 $result.=$char;
	  }
	  
	  return $result;
	  
	}
	
}

function encrypt_file($archivo_original,$archivo_cifrado,$clave){

    $contenido_archivo = file_get_contents($archivo_original);
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));

    $cifrado = openssl_encrypt($contenido_archivo, 'aes-256-cbc', $clave, OPENSSL_RAW_DATA, $iv);

    file_put_contents($archivo_cifrado, $iv . $cifrado);

}

function decrypt_file($archivo_cifrado,$archivo_descifrado,$clave){

    $contenido_archivo = file_get_contents($archivo_cifrado);
    $iv = substr($contenido_archivo, 0, openssl_cipher_iv_length('aes-256-cbc'));

    $contenido_descifrado = openssl_decrypt(substr($contenido_archivo, openssl_cipher_iv_length('aes-256-cbc')), 'aes-256-cbc', $clave, OPENSSL_RAW_DATA, $iv);

    file_put_contents($archivo_descifrado, $contenido_descifrado);

}
?>