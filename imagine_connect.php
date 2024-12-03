<?php
/*

Importante: Incluir este archivo siempre por encima de "imagine_dante.php" de la siguiente manera:

include("imagine_connect.php");
include("imagine_dante.php");

Se diferencian los datos de conexión del resto del framework para poder trabajar con diferentes conexiones en diferentes proyectos simultáneamente.

#Proyecto 1:

include("imagine_connect.php");
include("imagine_dante.php");

#Proyecto 2:

include("imagine_connect_2.php");
include("imagine_dante.php");

(Duplicamos el archivo)

*/

$IMAGINE_CONNECT = true; //false: no utilizamos conexion a base de datos.
$IMAGINE_CONNECT_PASS_ENABLE = false; //true: si se esta usando contraseña.
$IMAGINE_CONNECT_MODE = 'local'; //local - test - server
$IMAGINE_CONNECT_ANONYMOUS = false; //true: no nos conectamos a una base de datos concreta.

//DATOS DE LA CONEXION
if($IMAGINE_CONNECT_MODE == 'local'){
	
	$IMAGINE_CONNECT_SERVER = 'localhost';
	$IMAGINE_CONNECT_USER = 'root';
	$IMAGINE_CONNECT_PASS = '';
	$IMAGINE_CONNECT_PORT = '';

	$IMAGINE_CONNECT_BBDD = ''; 

}else if($IMAGINE_CONNECT_MODE == 'test'){
	
	$IMAGINE_CONNECT_SERVER = 'localhost';
	$IMAGINE_CONNECT_USER = 'root';
	$IMAGINE_CONNECT_PASS = '';
	$IMAGINE_CONNECT_PORT = '';

	$IMAGINE_CONNECT_BBDD = ''; 

}else if($IMAGINE_CONNECT_MODE == 'server'){
	
	$IMAGINE_CONNECT_SERVER = 'localhost';
	$IMAGINE_CONNECT_USER = 'root';
	$IMAGINE_CONNECT_PASS = '';
	$IMAGINE_CONNECT_PORT = '';

	$IMAGINE_CONNECT_BBDD = ''; 

}

?>