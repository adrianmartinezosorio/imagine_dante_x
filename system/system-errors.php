<?php
function ilog($id,$msg){

		$msg = '@imaginedante | ' . date('d/m/Y H:i:s',time()) . ' | '. $id .' | ' . $msg . ' | Exe: ' . basename($_SERVER['PHP_SELF']) . ' | '.'Error Id: '.uniqid();

		$file = fopen('ilog.html', 'a');

		fwrite($file, '<br>'.$msg . '<br>-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------');

		fclose($file);

}
function ierror($id,$msg){
	
	global $IMAGINE_DEBUG;

	$msg = '@imaginedante | ' . date('d/m/Y H:i:s',time()) . ' | '. $id .' | ' . $msg . ' | Exe: ' . basename($_SERVER['PHP_SELF']) . ' | '.'Error Id: '.uniqid();

	if($IMAGINE_DEBUG && $IMAGINE_DEBUG_LOG){

		$file = fopen('ierror.html', 'a');

		fwrite($file, '<br>'.$msg . '<br>-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------');

		fclose($file);

	}

	if($IMAGINE_DEBUG && $IMAGINE_DEBUG_DISPLAY){

		echo $msg;

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

if($IMAGINE_DEBUG && $IMAGINE_DEBUG_LOG){
	initierror();
}
?>