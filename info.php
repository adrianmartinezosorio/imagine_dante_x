<?php

include("imagine_dante.php");

?>

<h1>Función t().</h1>

<?php

echo "<b>RESULTADO:</b> " . t();

?>

<br><br>

<?php

echo "<b>HORA Y FECHA:</b> " . dd(t());

?>

<br><br>

<?php

if(is_summer_time()){
	
	echo "<b>HORARIO AUTOMATICO:</b> De verano (TIMESTAMP + 0H).";

}else{
	
	echo "<b>HORARIO AUTOMATICO:</b> De invierno (TIMESTAMP + 1H).";

}

?>

<h1>Limites del servidor</h1>

<p><b>max_file_uploads:</b> <?php echo ini_get("max_file_uploads"); ?></p>
<p><b>upload_max_filesize:</b> <?php echo ini_get("upload_max_filesize"); ?></p>
<p><b>post_max_size :</b> <?php echo ini_get("post_max_size"); ?></p>
<p><b>memory_limit:</b> <?php echo ini_get("memory_limit"); ?></p>
<p><b>max_execution_time:</b> <?php echo ini_get("max_execution_time"); ?></p>
<p><b>max_input_time:</b> <?php echo ini_get("max_input_time"); ?></p>
