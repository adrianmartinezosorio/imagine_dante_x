<?php

$IMAGINE_ENABLE = true;

$IMAGINE_ERROR_LOG = true; //Archivo de log de errores.
$IMAGINE_TIME_CHANGE = true; //Cambio automático de hora entre horarios de invierno y de verano.

if($IMAGINE_ENABLE){

	$IMAGINE_SYSTEM = [
		'ierror.php',
		'time-change.php'
	];

	$IMAGINE_MODULES = [
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

	$IMAGINE_PLUGINS = [
		'plugin-entities.php',
		'plugin-scraping.php',
		'plugin-interface.php',
		'plugin-exif.php',
		'plugin-youtube.php',
		'plugin-translate.php',
		'plugin-mail.php'
	];

	foreach ($IMAGINE_SYSTEM as $sys) {

		include("system/".$sys);
		
	}

	foreach ($IMAGINE_MODULES as $module) {

		include("modules/".$module);
		
	}

	foreach ($IMAGINE_PLUGINS as $plugin) {

		include("plugins/".$plugin);

	}

}

?>