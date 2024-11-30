<?php
/* -------------------------------------------------------------- */
/* MODULO FREEQUERY 1.0 */
/* Modulo creado para agilizar la escritura de querys manuales. */

/* Dante */
/* 28-6-2016 */
/* 3-2-2017 */
/* 9-2-2017 */
/* -------------------------------------------------------------- */

function q($c,$query){
	
	if(!empty($query) && isset($query)){

		return mysqli_query($c,$query);	

	}
	
}


function n($query){
	
	if(!empty($query) && isset($query)){

		return mysqli_num_rows($query);

	}
	
}

function f($query){
	
	if(!empty($query) && isset($query)){

		return mysqli_fetch_assoc($query);

	}
	
}

function qn($c,$query){
	
	if(!empty($query) && isset($query)){

		$query = mysqli_query($c,$query);

		return mysqli_num_rows($query);

	}
	
}

function qf($c,$query){

	if(!empty($query) && isset($query)){
	
		$query = mysqli_query($c,$query);

		return mysqli_fetch_assoc($query);

	}
	
}

function cc($c){

	mysqli_close($c);

}

?>