<?php
/*

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
CONNECT MODULE
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

connect($server,$user,$pass,$bbdd);
cc($c);
connect_data($return = false);

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (CONEXION SQL FUNCION VITAL)

Funcion: $conexion;

Modo de conexion ($modo_conexion):
	-El modo de conexion se establecera con los argumentos local o server. Local en caso de que el entorno sea xaamp (Localhost) o server 
	en caso de estar en un servidor real.
	
Argumentos:
	$local_server = 'localhost';    //Host del servidor.
	$local_user = 'root';           //Nombre de usuario.
	$local_pass = '';               //Contraseña de usuario.
	$local_bbdd = 'roots_store';    //Nombre de la base de datos.
	
	(Lo mismo para modo server.)
	
Dante.
Creación: 2-11-2015
Actualizado: 16-12-15
Actualizado: 9-2-17
Actualizado: 26-6-22

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function connect($server,$user,$pass,$bbdd) {
		
	$conexion = @mysqli_connect($server, $user, $pass,$bbdd);
	
	if ( mysqli_connect_errno() ) {
		
		die( 'Error: ' . mysqli_connect_error() );
		
	}
	
	mysqli_query($conexion, "SET NAMES utf8" );
	
	return $conexion;
	
}

function cc($c){

	mysqli_close($c);

}

function connect_data($return = false){

	global $IMAGINE_CONNECT;
	global $IMAGINE_CONNECT_PASS_ENABLE;
	global $IMAGINE_CONNECT_MODE;
	global $IMAGINE_CONNECT_ANONYMOUS;

	global $IMAGINE_CONNECT_SERVER;
	global $IMAGINE_CONNECT_USER;
	global $IMAGINE_CONNECT_PASS;
	global $IMAGINE_CONNECT_BBDD;
	global $IMAGINE_CONNECT_PORT;

	$data = array(
		"IMAGINE_CONNECT" => $IMAGINE_CONNECT,
		"IMAGINE_CONNECT_MODE" => $IMAGINE_CONNECT_MODE,
		"IMAGINE_CONNECT_PASS_ENABLE" => $IMAGINE_CONNECT_PASS_ENABLE,
		"IMAGINE_CONNECT_ANONYMOUS" => $IMAGINE_CONNECT_ANONYMOUS,
		"CONNECT" => array(
			"IMAGINE_CONNECT_BBDD" => $IMAGINE_CONNECT_BBDD,
			"IMAGINE_CONNECT_SERVER" => $IMAGINE_CONNECT_SERVER,
			"IMAGINE_CONNECT_USER" => $IMAGINE_CONNECT_USER,
			"IMAGINE_CONNECT_PASS" => $IMAGINE_CONNECT_PASS,
			"IMAGINE_CONNECT_PORT" => $IMAGINE_CONNECT_PORT
		)
	);

	if($return){
		return $data;
	}else{
		var_dump($data);
	}

}

if(isset($IMAGINE_CONNECT_ANONYMOUS) && !$IMAGINE_CONNECT_ANONYMOUS):

	if($IMAGINE_CONNECT_PASS_ENABLE):
		if(!empty($IMAGINE_CONNECT_SERVER) && !empty($IMAGINE_CONNECT_USER) && !empty($IMAGINE_CONNECT_PASS) && !empty($IMAGINE_CONNECT_BBDD)):

			$c = connect($IMAGINE_CONNECT_SERVER, $IMAGINE_CONNECT_USER, $IMAGINE_CONNECT_PASS, $IMAGINE_CONNECT_BBDD);

		else:

			ierror('datosconexion','(1) Los datos de conexión están incompletos.');

		endif;
	endif;

	if(!$IMAGINE_CONNECT_PASS_ENABLE):
		if(!empty($IMAGINE_CONNECT_SERVER) && !empty($IMAGINE_CONNECT_USER) && !empty($IMAGINE_CONNECT_BBDD)):

			$c = connect($IMAGINE_CONNECT_SERVER, $IMAGINE_CONNECT_USER, $IMAGINE_CONNECT_PASS, $IMAGINE_CONNECT_BBDD);

		else:

			ierror('datosconexion','(2) Los datos de conexión están incompletos.');

		endif;
	endif;

endif;

?>