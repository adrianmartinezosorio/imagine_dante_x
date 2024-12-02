<?php

$IMAGINE_ENABLE = true;

if($IMAGINE_ENABLE):

	$modules = [
		'ierror.php',
		'connect.php',
		'databases.php',
		'bbdd.php',
		'freequery.php',
		'imaginequery.php',
		'math.php',
		'string.php',
		'validate.php',
		'files.php',
		'folders.php',
		'time.php',
		'zip.php',
		'json.php',
		'random.php',
		'parsedata.php',
		'encrypt.php',
		'arrays.php',
		'session.php',
		'atajos.php',
		'urls.php',
		'images.php'
	];

	$plugins = [
		'entidades.php',
		'scraping.php',
		'interface.php',
		'exif.php',
		'youtube.php',
		'translate.php',
		'mail.php'
	];

	foreach ($modules as $module) {

		if(file_exists("modules/".$module)){

			include("modules/".$module);
			
		}
		
	}

	foreach ($plugins as $plugin) {

		if(file_exists("plugins/".$plugin)){

			include("plugins/".$plugin);
			
		}
		
	}

endif;

?>