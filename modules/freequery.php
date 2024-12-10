<?php
/*

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
FREEQUERY MODULE
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

*/

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