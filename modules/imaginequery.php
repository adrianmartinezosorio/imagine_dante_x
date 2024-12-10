<?php
/*

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
IMAGINEQUERY MODULE
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

Concepto original programado en un tren entre Guadalajara y Madrid a finales de 2015.

Ultima actulización: 15-12-2020

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

//FUNCIONES PRINCIPALES
insert($c,$campos,$parametros,$tabla);
update($c,$campos,$parametros,$id,$tabla);
delet($c,$tabla,$id);
deleteall($c,$tabla);

//FUNCIONES PRINCIPALES "SELECT"
get($c,$params);
select($c,$tabla,$id);
selectall($c,$tabla,$extra);
selectval($c,$tabla,$id,$campo);
selectrand($c,$tabla);

//FUNCIONES SECUNDARIAS
existid($c,$tabla,$id);
returnmaxid($c,$tabla);
returninsertid($c);

//FUNCIONES TERCIARIAS
binary_update($c,$tabla,$campo,$id);
masval($c,$tabla,$campo,$id,$value);
menosval($c,$tabla,$campo,$id,$value);
sumaval($c,$tabla,$campo);

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
*/

/*---------------------------------------------------------------------------------------------*/
/*---------------------------------------------------------------------------------------------*/
//FUNCIONES PRIMARIAS
/*---------------------------------------------------------------------------------------------*/
/*---------------------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
/*

$params = [
    "params" => [
        "table" => "users",
        "condition" => "AND",
        "order" => "age DESC"
    ],
    "select" => [
        "name" => "John",
        "status" => "active"
    ]
];

*/
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
function get($c,$params){

    $table = $params["params"]["table"];

    if(!empty($table)){

        $condition = $params["params"]["condition"];
        $order = $params["params"]["order"];

        if(empty($condition)){
            $condition = "AND";
        }

        $exit = "SELECT * FROM ".$table;

        if(!empty($params["select"])){

            $select = $params["select"];

            $count = 0;

            foreach ($select as $item => $value){

                if(!empty($item) && !empty($value)){

                    $count++;

                    if($count == 1){
                        $exit .= " WHERE ";
                    }else{
                        $exit .= " ".$condition." ";
                    }

                    $exit .= $item." = '".$value."'";

                }

            }

        }

        if(!empty($order)){

            $exit .= " ORDER BY ".$order;

        }

        $query = mysqli_query($c,$exit);

        if($query){
            return $query;    
        }else{
            ierror('get','La consulta no se ejecuto correctamente.');
            return false;
        }

    }else{
         ierror('get','La tabla no esta especificada.');
         return false;
    }

}
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
/*
DOCUMENTACION (FUNCION INSERTAR REGISTRO)

Funcion: insert($c,array("momento"),array('1111'),'grupos_elyon');

1-Argumento:
	-Conexion.
	
2-Argumento:
	-Un array con los nombres de los campos de la base de dato a insertar.
	
3-Argumento:
	-Un array con los valores con los que se insertaran.
	
4-Argumento:
	-Tabla de la base de datos.

Updates:
30-11-2015
10-2-2017
14-2-2017
15-12-2020

*/
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
function insert($c,$campos,$parametros,$tabla){
	
	if(!empty($tabla)){

		if(exist_table($c,$tabla)){

			if(is_array($campos) && is_array($parametros)){
			
				$cantidad_campos = count($campos);
				$cantidad_parametros = count($parametros);
				
				if($cantidad_campos == $cantidad_parametros){
					
					$query = "INSERT INTO " . $tabla;
					
					for ($i = 0; $i <= ($cantidad_campos - 1); $i++) {
						
						if($cantidad_campos == 1){
							
							$query .= ' (' . trim($campos[$i]) . ') ';
							
						}else{
								
							if($i == 0){
								
								$query .= ' (' . trim($campos[$i]) . ', ';
								
							}else if($i == $cantidad_campos - 1){
								
								$query .= trim($campos[$i]) . ')';
								
							}else{
								
								$query .= trim($campos[$i]) . ', ';
								
							}
							
						}
					 
							
					}//End for
					
					$query .= " VALUES";
					
					
					for ($i = 0; $i <= ($cantidad_parametros - 1); $i++) {
						
						if($cantidad_campos == 1){
							
							$query .= ' ("' . trim($parametros[$i]) . '") ';
							
						}else{
						
							if($i == 0){
								
								$query .= ' (' . "'" . trim($parametros[$i]) . "'" . ', ';
								
							}else if($i == $cantidad_parametros - 1){
								
								$query .= "'" . trim($parametros[$i]) . "'" . ')';
								
							}else{
								
								$query .= "'" . trim($parametros[$i]) . "'" . ', ';
								
							}
							
						}
							
					}//End for

					//return $query;
					
					if(mysqli_query($c, $query)){

						 return $c->insert_id;

					}else{
						ierror('imaginequery_insert','La consulta no se ejecuto correctamente: '.mysqli_error($c).'<br> QUERY: '.$query);
	 					return false;
					}
				}else{	
					ierror('imaginequery_insert','Los campos y los parametros no coinciden.');
					return false;
				}
			}else{
				ierror('imaginequery_insert','Los argumentos $campos y $parametros deven ser arrays.');
				return false;	
			}

		}else{
			ierror('imaginequery_insert','La tabla no existe.');
			return false;
		}
	}else{
		ierror('imaginequery_insert','La tabla no esta especificada.');
		return false;
	}

}//End
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
/*
DOCUMENTACION (FUNCION ACTUALIZAR REGISTRO)

Funcion: update($c,array("tipo"),array($tipo),$id,'preguntas_elyon');

1-Argumento:
	-Conexion.
	
2-Argumento:
	-Un array con los nombres de los campos de la base de dato a actualizar.
	
3-Argumento:
	-Un array con los valores con los que se actualizara.
	
4-Argumento:
	-Id del registro que se actualizara.
	
5-Argumento:
	-Tabla de la base de datos.

Updates:
28-11-2015
10-2-2017
14-2-2017
15-12-2020

*/
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
function update($c,$campos,$parametros,$id,$tabla,$idprimary = 'id'){ global $error_key_imagine;

	if(!empty($tabla) && !empty($id)){

		if(is_array($campos) && is_array($parametros)){

			if(is_numeric($id)){
			
				$cantidad_campos = count($campos);
				$cantidad_parametros = count($parametros);
				
				if($cantidad_campos == $cantidad_parametros){
					
					$query = "UPDATE ".$tabla." SET ";
					
					for ($i = 0; $i <= ($cantidad_campos - 1); $i++) {
						
						if($i == $cantidad_campos - 1){
							
							$query .= trim($campos[$i]) . ' = ' . "'" .trim($parametros[$i]) . "'" . ' ';
							
						}else{
							
							$query .= trim($campos[$i]) . ' = ' . "'" . trim($parametros[$i])  . "'" . ', ';
							
						}
							
					}//End for
					
					$query .= "WHERE ".$idprimary."='$id'";

					if(!mysqli_query($c, $query)){


						ierror('imaginequery_update','La consulta no se ejecuto correctamente.<br>'.$query);

					}
				}else{

					ierror('imaginequery_update','Los campos y los parametros no coinciden.');
					
				}
			}else{

				ierror('imaginequery_update','El Id tiene que ser numerico.');
				
			}
		}else{

			ierror('imaginequery_update','Los campos o los valores no son un array.');

		}

	}else{

		ierror('imaginequery_update','La tabla no esta especificada o no existe. El id puede estar vacio.');

	}

}
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
/*
DOCUMENTACION (FUNCION ELIMINAR REGISTRO)

Funcion: delet($c,'preguntas_elyon',20);

1-Argumento:
	-Conexion.
	
2-Argumento:
	-La tabla del registro que se eliminara.
	
3-Argumento:
	-Id del registro que se eliminara.
	
Updates:
2-12-2015
14-2-2017
15-12-2020

*/
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
function delet($c,$tabla,$id,$idprimary = 'id'){ global $error_key_imagine;
	
	if(!empty($tabla) && !empty($id) && exist_table($c,$tabla)){

		if(is_numeric($id)){
		
			$query = "DELETE from $tabla WHERE ".$idprimary." = '$id'";
			
			if(!mysqli_query($c, $query)){


				ierror('imaginequery_delet','La consulta no se ejecuto correctamente.<br>'.$query);

			}
		}else{

			ierror('imaginequery_delet','El Id tiene que ser numerico.');
			
		}
	}else{

		ierror('imaginequery_delet','La tabla no esta especificada o no existe. El id puede estar vacio.');

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


11-1-2016

*/
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
function deleteall($c,$tabla){
	
	if(!empty($tabla)){

		if(mysqli_query($c,"truncate $tabla")){
			
			return true;
			
		}else{
			
			return false;
			
		}

	}else{

		ierror('imaginequery_deleteall','No hay tabla definida.');

	}

}
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
/*
DOCUMENTACION (SELECCION DE UN REGISTRO SQL)

Funcion: $registro = select( $c, 'usuarios', $id);
Argumentos: conexion, tabla, id.

Debuelbe un registro determinado por la id en este caso.

Se convertira en un array asociativo y se podra recorrer haciendo referencia a el nombre de la columna de la tabla.
Ejemlo: $registro['nombre'],$registro['apellidos'],$registro['id'] ...


1-11-2015
14-2-2017
1-8-2017
15-12-2020
*/
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
function select($c,$tabla,$id,$idprimary = 'id') { global $error_key_imagine;
	
	if(!empty($tabla) && !empty($id) && exist_table($c,$tabla)){

		if(is_numeric($id)){
		
			$id = mysqli_real_escape_string($c,$id);
					
			$resultado = mysqli_query($c, "SELECT * FROM $tabla WHERE ".$idprimary." = '$id'" );
			
			if($resultado){
				return mysqli_fetch_assoc($resultado);
			}else{
				ierror('imaginequery_select','La consulta no se ejecuto correctamente.');
				return false;
			}

			
		}else{

			ierror('imaginequery_select','El Id tiene que ser numerico.');
			return false;
			
		}
	}else{

		ierror('imaginequery_select','La tabla no esta especificada o no existe. El id puede estar vacio.');
		return false;

	}
		
}
function selectall($c,$tabla,$extra = "none"){

	if($extra == "none"){
		$query = "SELECT * FROM ".$tabla;
		$query = mysqli_query($c,$query);
	}else if($extra != "none"){
		$query = "SELECT * FROM ".$tabla . " " .$extra;
		$query = mysqli_query($c,$query);
	}

	if($query){
		return $query;	
	}else{
		ierror('imaginequery_selectall','La consulta no se ejecuto correctamente. '.mysqli_error($c));
	}

	

}
function selectval($c,$tabla,$id,$campo){

	$select = select($c,$tabla,$id);

	return $select[$campo];

}
/*---------------------------------------------------------------------------------------------*/
/*---------------------------------------------------------------------------------------------*/
//FUNCIONES SECUNDARIAS
/*---------------------------------------------------------------------------------------------*/
/*---------------------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
/*
DOCUMENTACION (SELECCION DE UN REGISTRO SQL AL AZAR)

Funcion: select_rand($conexion,'tabla');
Argumentos: conexion, tabla.

Debuelbe un registro aleatorio de la tabla de la base de datos dada.

Se convertira en un array asociativo y se podra recorrer haciendo referencia a el nombre de la columna de la tabla.
Ejemlo: $registro['nombre'],$registro['apellidos'],$registro['id'] ...


12-1-2016

*/
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
function selectrand($c,$tabla){ global $error_key_imagine;
	
	if(!empty($tabla)){

		$query = "SELECT * FROM $tabla ORDER BY RAND() LIMIT 1";
		
		$resultado = mysqli_query($c,$query);
		
		return mysqli_fetch_assoc($resultado);

	}else{

		ierror('imaginequery_selectrand','Parametros vacios.');

	}
	
}

/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
/*
DOCUMENTACION (COMPRUEBA SI EL ID DADO EXISTE EN LA TABLA)

Funcion: exist_id($c,paradise('productos'),39);
Argumentos: conexion,id,tabla.

Debuelbe true en caso de que exista y false en caso de que no o haya mas de uno que no es posible se supone.


17-5-2016

*/
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
function existid($c,$tabla,$id){ global $error_key_imagine;
	
	if(!empty($tabla) && !empty($id)){

		if(is_numeric($id)){
		
			$comprovar_existencia= "SELECT * FROM $tabla WHERE id= '$id'";
			
			$comprovar_existencia = mysqli_query($c,$comprovar_existencia);
			
			$comprovar_existencia = mysqli_num_rows($comprovar_existencia);
			
			if($comprovar_existencia != 1){
				
				return false;
				
			}else{
				
				return true;
				
			}
		
		}else{  

			ierror('imaginequery_existid','El Id debe ser numerico.');
			
		}

	}else{

		ierror('imaginequery_existid','Parametros vacios.');

	}
	
}
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
/*
DOCUMENTACION (SELECCION DE EL ID MAYOR QUE HAY EN LA TABLA)

Funcion: return_max_id($c,$tabla);
Argumentos: conexion, tabla.

Debuelbe el id de la tabla mayor.


9-4-2016

*/
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
function returnmaxid($c,$tabla){ global $error_key_imagine;
		
	if(!empty($tabla)){

		$query = mysqli_query($c, "SELECT id FROM $tabla order by id desc limit 0,1" );
						
		$query = mysqli_fetch_assoc($query);
		
		return $query['id'];

	}else{

		ierror('imaginequery_returnmaxid','Parametros vacios.');

	}
		
}
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
/*
DOCUMENTACION (SELECCION DE EL ID DEL ULTIMO REGISTRO SUBIDO A LA TABLA)

Funcion: return_insert_id($c);
Argumentos: conexion.

Debuelbe el id generado tras un insert.


27-4-2016

*/
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
function returninsertid($c){
		
	return $c->insert_id;
		
}

/*---------------------------------------------------------------------------------------------*/
/*---------------------------------------------------------------------------------------------*/
//FUNCIONES TERCIARIAS
/*---------------------------------------------------------------------------------------------*/
/*---------------------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
/*
DOCUMENTACION (CONMUTA DEPENDIENDO SI EL VALOR DE LA TABLA ES 1 O 0, CAMBIA DE UNO A OTRO)

Funcion: binary_update($c,$tabla,$campo,$id);

29-10-2023

*/
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
function binary_update($c,$tabla,$campo,$id){

	$select = select($c,$tabla,$id);

	$valor = $select[$campo];

	if($valor == 0 || $valor == 1){

		if($valor == 0){
			$valores = array(1);
		}else if($valor == 1){
			$valores = array(0);
		}

		$campos = array($campo);

		update($c,$campos,$valores,$id,$tabla);

		return true;

	}else{

		ierror('binary_update','El valor debe ser 0 o 1.');
		return false;

	}

}

/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
/*
DOCUMENTACION (SUMA 1 A UN CAMPO NUMERICO DE UNA TABLA)

Funcion: mas_bbdd($c,'usuarios','accesos',$id);
Argumentos: conexion,tabla,campo tabla,id registro.


24-7-2016

*/
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
function masval($c,$tabla,$campo,$id,$value = 1){ global $error_key_imagine;
		
		if(is_numeric($id)){
		
			$seleccionar_registro = mysqli_query($c,"SELECT * FROM $tabla WHERE id = '$id'");
			
			if(mysqli_num_rows($seleccionar_registro) != 0){
				
				$registro = mysqli_fetch_assoc($seleccionar_registro);
				
				$cantidad_inicial = $registro[$campo];
				
				if(is_numeric($cantidad_inicial)){
				
					$cantidad_final = $cantidad_inicial + $value;
					
					$update = "UPDATE $tabla SET $campo = '$cantidad_final' WHERE id='$id'";
					
					$update = mysqli_query($c,$update);
				
				}else if(empty($cantidad_inicial)){
					
					$update = "UPDATE $tabla SET $campo = '1' WHERE id='$id'";
					
					$update = mysqli_query($c,$update);
					
				}else{

					ierror('imaginequery_masval','El campo contiene datos no operables.');
					
				}
				
			}else{

				ierror('imaginequery_masval','El registro con id '.$id.' no existe en la tabla '.$tabla);
				
			}
		
		}else{

			ierror('imaginequery_masval','El Id tiene que ser numerico.');
			
		}
			
}
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
/*
DOCUMENTACION (RESTA 1 A UN CAMPO NUMERICO DE UNA TABLA)

Funcion: mas_bbdd($c,'usuarios','accesos',$id);
Argumentos: conexion,tabla,campo tabla,id registro.


24-7-2016

*/
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/

function menosval($c,$tabla,$campo,$id,$value = 1){ global $error_key_imagine;
		
		if(is_numeric($id)){
		
			$seleccionar_registro = mysqli_query($c,"SELECT * FROM $tabla WHERE id = '$id'");
			
			if(mysqli_num_rows($seleccionar_registro) != 0){
				
				$registro = mysqli_fetch_assoc($seleccionar_registro);
				
				$cantidad_inicial = $registro[$campo];
				
				if(is_numeric($cantidad_inicial)){
				
					$cantidad_final = $cantidad_inicial - $value;
					
					$update = "UPDATE $tabla SET $campo = '$cantidad_final' WHERE id='$id'";
					
					$update = mysqli_query($c,$update);
				
				}else if(empty($cantidad_inicial)){
					
					$update = "UPDATE $tabla SET $campo = '0' WHERE id='$id'";
					
					$update = mysqli_query($c,$update);
					
				}else{

					ierror('imaginequery_menosval','El campo contiene datos no operables.');
					
				}
				
				
			}else{
				
				ierror('imaginequery_menosval','El registro con id '.$id.' no existe en la tabla '.$tabla);
				
			}
		
		}else{

			ierror('imaginequery_menosval','El Id tiene que ser numerico.');
			
		}
			
}

function sumaval($c,$tabla,$campo){

	$query = "SELECT * FROM ".$tabla;
	$query = mysqli_query($c,$query);

	$cuenta = 0;

	while($reg = mysqli_fetch_assoc($query)){

		if(is_numeric($reg[$campo])){

			$cuenta += $reg[$campo];

		}

	}

	return $cuenta;

}








?>