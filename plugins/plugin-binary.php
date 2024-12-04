<?php

/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
/*
DOCUMENTACION (DE STRING A BINARIO Y VICEBERSA)

Funcion: binaryencode($str);

1-Argumento:
  -STRING O STRING BINARIO.

Dante.
http://dantecreations.com/
24-2-2017
*/
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
function binaryencode($str){
  
    if(!empty($str)){
    
      $binario = '';
        
      $str = trim($str);
        
      $str_arr = str_split($str, 4);
        
      for($i = 0; $i<count($str_arr); $i++)
          
        $binario = $binario.str_pad(decbin(hexdec(bin2hex($str_arr[$i]))), strlen($str_arr[$i])*8, "0", STR_PAD_LEFT);
        
        return $binario;
      
    }
      
  }
  
  function binarydecode($bin_str){
    
    if(!empty($bin_str)){
    
      $text_str = '';
      
      $chars = explode("\n", chunk_split(str_replace("\n", '', $bin_str), 8));
      
      $_I = count($chars);
      
      for($i = 0; $i < $_I; $text_str .= chr(bindec($chars[$i])), $i++  );
      
        return utf8_decode($text_str);
      
    }
      
  }

?>