<?php
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (MAIL HTML)

Esta funcion enviara un E-Mail con la caracteristica de que se puede escribir en HTML.

Funcion:  mailhtml($mensaje,$asunto,$denombre,$deemail,$paramail);

-Los estilos ai que darlos en la propia etiqueta con style="".
-Se pueden insertar imagenes usando un link.

Dante.
1-2-2016

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function mailhtml($mensaje,$asunto,$denombre,$deemail,$paramail){
	
	$denombre = utf8_decode($denombre);

	$para  = $paramail;
	$asunto = $asunto;
	$encabezados  = "MIME-Version: 1.0\n";
	$encabezados .= "Content-type: text/html; charset=UTF-8\n";
	$encabezados .= "From: $denombre <$deemail>\n";
	$encabezados .= "X-Sender: <website@tupagina.com>\n";
	$encabezados .= "X-Mailer: PHP\n";
	$encabezados .= "X-Priority: 3\n";
	$encabezados .= "Return-Path: <$deemail>\n";
	
	mail($para, $asunto, $mensaje, $encabezados);

}


?>