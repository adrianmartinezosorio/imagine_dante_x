<?php

$IMAGINE_ENABLE = true;

if($IMAGINE_ENABLE){

	$system = [
		'ierror.php',
		'time-change.php'
	];

	$modules = [
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
		'plugin-entities.php',
		'plugin-scraping.php',
		'plugin-interface.php',
		'plugin-exif.php',
		'plugin-youtube.php',
		'plugin-translate.php',
		'plugin-mail.php'
	];

	foreach ($system as $sys) {

		if(file_exists("system/".$sys)){

			include("system/".$sys);
			
		}
		
	}

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

}

?>