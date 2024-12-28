<?php
function ilog($id,$msg){

		global $IMAGINE_LOG;

		$msg = '@imaginedante | ' . date('d/m/Y H:i:s',time()) . ' | '. $id .' | ' . $msg . ' | Exe: ' . basename($_SERVER['PHP_SELF']) . ' | '.'Error Id: '.uniqid();

		if($IMAGINE_LOG){

			$file = fopen('ilog.html', 'a');

			fwrite($file, '<br>'.$msg . '<br>-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------');

			fclose($file);

		}

}
function ierror($id,$msg){
	
	global $IMAGINE_DEBUG;
	global $IMAGINE_DEBUG_LOG;
	global $IMAGINE_DEBUG_DISPLAY;

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

?>