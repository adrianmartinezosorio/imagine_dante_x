<?php
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (COMPROVAR VARIABLES DE SESION)

Funcion: sesion($_SESSION['id_usuario'],'index.php');
Argumentos: variable de sesion, ruta de escape.

1-Argumento:
	-La variable de sesion que se comprobara.
	
2-Argumento:
	-La ruta a la que se redireccionara en caso de que no exista.
	
	
En caso de existir debuelbe true, si no exsite redireccioa a la ruta de escape
	
Dante.
http://dantecreations.com/
30-11-2015


Actualizado 21-12-2015.
Actualizado 2-8-2017.
*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function sesion($sesion,$escape){
	
	if(!isset($sesion) || empty($sesion)){
	 	
		unset($sesion);
		Header('Location:' . $escape);
	 
	}else{
	
		return true;
	
	}
	
}



function auto_closesesion($momento_entrada,$tiempo_maximo_estancia,$sesion,$escape){
	
	if(!empty($sesion) && isset($sesion)){
	
		$cuenta_tiempo = time() - $momento_entrada;
		
		if($cuenta_tiempo < $tiempo_maximo_estancia){
			
			unset($sesion);
			Header('Location:' . $escape);
			
		}
	
	}else{
		
		unset($sesion);
		Header('Location:' . $escape);
		
	}
			
}


function login($c,$user,$pass,$table){

	$query = "SELECT * FROM $table WHERE user = '$user' AND pass = '$pass'";
	$query = mysqli_query($c,$query);

	$querynum = mysqli_num_rows($query);

	if($querynum == 1){

		$reg = mysqli_fetch_assoc($query);
		$id = $reg['id'];
		$last_access = time();
		$count_access = $reg['count_access'] + 1;
		$ip_access = $_SERVER['REMOTE_ADDR'];
		$agent_access = $_SERVER['HTTP_USER_AGENT'];

		$query_update = "UPDATE $table SET last_access = '$last_access', count_access = '$count_access' , ip_access = '$ip_access', agent_access = '$agent_access' WHERE id = '$id'";

		mysqli_query($c,$query_update);

		$_SESSION['user'] = $id;

		return true;

	}else{

		return false;

	}

}


function st(){
	return session_start();
}
function sd(){
	return session_destroy();
}






?>