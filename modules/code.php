<?php

function count_code_caracters($content){

    if(!empty($content)){

        $content = str_replace(array("\r", "\n"), '', $content);
		$content = preg_replace('/\s+/', '', $content);
		$content = strlen($content);

    }else{

        $content = 0;

    }

    return $content;

}

function clearcomments($txt){
    
    if(!empty($txt)){
    
        //Eliminar comentarios html
        $txt = preg_replace('/\h*<!--.*?-->\h*/s', '', $txt);
        
        //Eliminar comentarios /* */
        $txt = preg_replace('/\h*\/\*.*?\*\/\h*/s', '', $txt);
        
        //Eliminar comentarios //
        $txt = preg_replace('/^\h*(?|(.*"[^"]*\/\/[^"]*".*)|(.*)\/\/.*\h*)$/m', '$1', $txt);
    
    }
    
    return $txt;

}

function codecompress($cadena){

    if(!empty($cadena)){
        
        $cadena = str_replace('"', 'escx@1@1@1@1@1@1@1@1@1@xesc', $cadena);
        $cadena = str_replace("'", 'escx@2@2@2@2@2@2@2@2@2@xesc', $cadena);

        //Eliminar comentarios html
        $cadena = preg_replace('/\h*<!--.*?-->\h*/s', '', $cadena);
        
        //Eliminar comentarios /* */
        $cadena = preg_replace('/\h*\/\*.*?\*\/\h*/s', '', $cadena);
        
        //Eliminar comentarios //
        $cadena = preg_replace('/^\h*(?|(.*"[^"]*\/\/[^"]*".*)|(.*)\/\/.*\h*)$/m', '$1', $cadena);

        /* remove tabs, spaces, newlines, etc. */
        $cadena = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $cadena);

        $cadena = str_replace('escx@1@1@1@1@1@1@1@1@1@xesc', '"', $cadena);
        $cadena = str_replace('escx@2@2@2@2@2@2@2@2@2@xesc', "'", $cadena);

    }

    return $cadena;
    
}

function sanitizeTXT($cadena){

    if(!empty($cadena)){
        
        $cadena = str_replace('"', 'escx@1@1@1@1@1@1@1@1@1@xesc', $cadena);
        $cadena = str_replace("'", 'escx@2@2@2@2@2@2@2@2@2@xesc', $cadena);
        $cadena = str_replace("<", 'escx@3@3@3@3@3@3@3@3@3@xesc', $cadena);
        $cadena = str_replace(">", 'escx@4@4@4@4@4@4@4@4@4@xesc', $cadena);
        $cadena = str_replace("/", 'escx@5@5@5@5@5@5@5@5@5@xesc', $cadena);

    }

    return $cadena;
    
}

function nomalizeTXT($cadena){

    if(!empty($cadena)){
        
        $cadena = str_replace('escx@1@1@1@1@1@1@1@1@1@xesc', '"', $cadena);
        $cadena = str_replace('escx@2@2@2@2@2@2@2@2@2@xesc', "'", $cadena);
        $cadena = str_replace('escx@3@3@3@3@3@3@3@3@3@xesc', "<", $cadena);
        $cadena = str_replace('escx@4@4@4@4@4@4@4@4@4@xesc', ">", $cadena);
        $cadena = str_replace('escx@5@5@5@5@5@5@5@5@5@xesc', "/", $cadena);

    }

    return $cadena;
    
}
?>