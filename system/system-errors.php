<?php
function ierror($id,$msg){
	
	global $IMAGINE_ERROR_LOG;

	if($IMAGINE_ERROR_LOG){

		$msg = '@imaginedante | ' . date('d/m/Y H:i:s',time()) . ' | '. $id .' | ' . $msg . ' | Exe: ' . basename($_SERVER['PHP_SELF']) . ' | '.'Error Id: '.uniqid();

		$file = fopen('ilog.html', 'a');

		fwrite($file, '<br>'.$msg . '<br>-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------');

		fclose($file);

	}

}
function initierror(){

	if(!file_exists('ilog.html')){

		$msg = '@imaginedante | ' . date('d/m/Y H:i:s',time()) . ' | eyectproyect<br>-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------';

		$file = fopen('ilog.html', 'a');

		fwrite($file,$msg);

		fclose($file);

	}

}

if($IMAGINE_ERROR_LOG){
	initierror();
}
?>