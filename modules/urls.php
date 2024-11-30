<?php
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
/*

DOCUMENTACION (DE STRING A URL AMIGABLE)

Funcion: string2url($texto);

1-Argumento:
    -STRING.

Dante.
26-2-2017

*/
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
/*
function string2url($string){
    
  if(!empty($url)){
    
      $url = mb_strtolower(trim($url));
      $find = array('á', 'é', 'í', 'ó', 'ú', 'ñ', 'ß', 'ä', 'ë','ï', 'ö', 'ü');
      $repl = array('a', 'e', 'i', 'o', 'u', 'n', 'fz', 'a', 'e','i', 'o', 'u');
      $url = str_replace ($find, $repl, $url);
      $find = array(' ', '&', '\r\n', '\n', '+');
      $url = str_replace ($find, '-', $url);
      $find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
      $repl = array('', '-', '');
      $url = preg_replace($find, $repl, $url);
      return $url;
  
  }
  
}//End function.
*/
function string2url($url) {
 
      // Tranformamos todo a minusculas
 
      $url = strtolower($url);
 
      //Rememplazamos caracteres especiales latinos
 
      $find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');
 
      $repl = array('a', 'e', 'i', 'o', 'u', 'n');
 
      $url = str_replace ($find, $repl, $url);
 
      // Añadimos los guiones
 
      $find = array(' ', '&', 'rn', 'n', '+');
      $url = str_replace ($find, '-', $url);
 
      // Eliminamos y Reemplazamos otros carácteres especiales
 
      $find = array('/[^a-z0-9-<>]/', '/[-]+/', '/<[^>]*>/');
 
      $repl = array('', '-', '');
 
      $url = preg_replace ($find, $repl, $url);
 
      return $url;
 
}
function beautiful_url($url){

    $url = str_replace('http://', '', $url);
    $url = str_replace('https://', '', $url);
    $url = str_replace('www.', '', $url);
    $url = str_replace('/', '', $url);

    return $url;

}

































?>