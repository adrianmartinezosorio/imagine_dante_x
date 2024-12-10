<?php
/*

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
BBDD MODULE
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

*/
/*
Funciones para simplificar la gestion de las tablas de la base de datos.
Dante. Noviembre 2015. Creado en un tren entre Madrid y Guadalajara.
*/
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
/*
DOCUMENTACION (FUNCION COMPROVAR EXISTENCIA DE TABLA)

Funcion: comprovar_bbdd($conexion,'roots_store_galeria');

1-Argumento:
	-Conexion.
	
2-Argumento:
	-El nombre de la tabla de la base de datos qu se comprovara.

Dante.
2-1-2016
10-2-2017

*/
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
function exist_table($c,$nombretabla){
	
	if(!empty($nombretabla)){

		if(mysqli_num_rows(mysqli_query($c,"SHOW TABLES LIKE '$nombretabla'")) == 1){

			return true;
					
		}else{
					
			return false;
				
		}

	}else{

		return false;

	}
	
}
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
/*
DOCUMENTACION (FUNCION ELIMINAR TABLA EN CASO DE QUE EXISTA)

Funcion: eliminar_bbdd($conexion,'roots_store_galeria');

1-Argumento:
	-Conexion.
	
2-Argumento:
	-El nombre de la tabla de la base de datos qu se eliminara.

Dante.
11-1-2016

*/
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
function delete_table($c,$nombretabla){
	
	if(!empty($nombretabla)){

		if(mysqli_query($c,"DROP TABLE IF EXISTS $nombretabla")){
			
			return true;
			
		}else{
			
			return false;
			
		}

	}else{

		return false;

	}

}
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
/*
DOCUMENTACION (FUNCION VACIAR TABLA EN CASO DE QUE EXISTA)

Funcion: vaciar_bbdd($conexion,'roots_store_galeria');

1-Argumento:
	-Conexion.
	
2-Argumento:
	-El nombre de la tabla de la base de datos qu se vaciara.

Dante.
11-1-2016

*/
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
function empty_table($conexion,$tabla){
	
	if(!empty($tabla)){

		if(mysqli_query($conexion,"truncate $tabla")){
			
			return true;
			
		}else{
			
			return false;
			
		}

	}else{

		ierror('bbdd_empty_table','No hay tabla definida.');

	}

}
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
/*
DOCUMENTACION (FUNCION LISTAR CAMPOS DE TABLA)

Funcion: $campos = campos_bbdd($c,'dante_autores','nombre'); echo $campos[0];

1-Argumento:
	-Conexion.
	
2-Argumento:
	-El nombre de la tabla con la que se trabajara.
	
3-Argumento:
	-El dato que se recibira:
	
		nombre = Field (Nombre del campo).
		tipo = Type (Tipo de campo).
		null = Null (Si el campo esta NULL).
		key = Key (Si es un campo de clave primaria tipo id).
		default = Default (Ni idea).
		extra = Extra (Si es auto_increment por ejempo).
	
Devolbera un array con los campos de la tabla de la base de datos.
	
Dante.
12-2-2016
Update:
18-04-2020

*/
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
function campos_bbdd($conexion,$tabla){
	
	$resultado = mysqli_query($conexion,"SHOW FULL COLUMNS FROM $tabla");
	if (!$resultado) {

		ierror('bbdd_campos_bbdd','No se pudo ejecutar la consulta en la funcion campos_bbdd: ' . mysql_error());
		
		exit;
	}

	$result = array();

	if (mysqli_num_rows($resultado) > 0) {
		while ($fila = mysqli_fetch_assoc($resultado)) {

			$array = array(
				"NOMBRE"=>$fila['Field'],
				"TIPO"=>$fila['Type'],
				"ISNULL"=>$fila['Null'],
				"COLLACTION"=>$fila['Collation'],
				"KEY"=>$fila['Key'],
				"DEFAULT"=>$fila['Default'],
				"EXTRA"=>$fila['Extra']
			);

			$result[] = $array;
			
		}
	
	}
	
	return array("TABLA"=>$tabla,"CAMPOS"=>$result);
	
} 
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
/*
DOCUMENTACION (FUNCION LISTAR TABLAS BBDD)

Funcion: $tablas = listar_bbdd($conexion,'roots_store_online'); echo $tablas[0];

1-Argumento:
	-Conexion.
	
2-Argumento:
	-El nombre de la base de datos con la que se trabajara.
	
Devolbera un array con los nombres de las tablas de la base de datos.
	
Dante.
3-2-2016

*/
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
function listar_bbdd($conexion,$tabla){
	
	$array_resul = array();
	
	$sql = "SHOW TABLES FROM " . $tabla;

	$resultado = mysqli_query($conexion,$sql);

	if (!$resultado) {
		
		ierror('bbdd_listar_bbdd','Error de BD, no se pudieron listar las tablas');

		exit;
	}

	while ($fila = mysqli_fetch_row($resultado)) {
		
		$array_resul[] = $fila[0];
		
	}
	
	return $array_resul;

}
/* -----------------------------------------------------------------------------------*/
/* BBDD MODULE 2 */
/* 2020 */
/* -----------------------------------------------------------------------------------*/
function table_charset($c,$table){

 	$query = "SHOW TABLE STATUS WHERE NAME = '$table'";
 	$query = mysqli_query($c,$query);
 	$query = mysqli_fetch_assoc($query);

 	return $query['Collation'];

}
function table_engine($c,$table){

 	$query = "SHOW TABLE STATUS WHERE NAME = '$table'";
 	$query = mysqli_query($c,$query);
 	$query = mysqli_fetch_assoc($query);

 	return $query['Engine'];

}
function table_autoincrement($c,$table){

 	$query = "SHOW TABLE STATUS WHERE NAME = '$table'";
 	$query = mysqli_query($c,$query);
 	$query = mysqli_fetch_assoc($query);

 	return $query['Auto_increment'];

}





?>