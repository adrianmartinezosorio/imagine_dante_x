<?php

$IMAGINE_ENABLE = true;

$IMAGINE_DEBUG = true; 
$IMAGINE_DEBUG_LOG = true; 
$IMAGINE_DEBUG_DISPLAY = false; 

$IMAGINE_TIME_CHANGE = true; //Cambio automático de hora entre horarios de invierno y de verano.
$IMAGINE_TIME_ZONE = 'Europe/Madrid';

if($IMAGINE_ENABLE){

	$IMAGINE_SYSTEM = [
		'system-errors.php',
		'system-timechange.php'
	];

	$IMAGINE_MODULES = [
		'connect.php',
		'database.php',
		'bbdd.php',
		'freequery.php',
		'imaginequery.php',
		'math.php',
		'string.php',
		'validate.php',
		'file.php',
		'folder.php',
		'time.php',
		'random.php',
		'format.php',
		'encrypt.php',
		'array.php',
		'session.php',
		'path.php',
		'url.php',
		'image.php',
		'json.php',
		'zip.php'
	];

	$IMAGINE_PLUGINS = [
		'plugin-legacy.php',
		'plugin-shortcuts.php',
		'plugin-phpmyadmin.php',
		'plugin-entities.php',
		'plugin-scraping.php',
		'plugin-interface.php',
		'plugin-exif.php',
		'plugin-youtube.php',
		'plugin-translate.php',
		'plugin-mail.php',
		'plugin-binary.php'
	];

	foreach ($IMAGINE_SYSTEM as $system_file) {

		include("system/".$system_file);
		
	}

	foreach ($IMAGINE_MODULES as $module_file) {

		include("modules/".$module_file);
		
	}

	foreach ($IMAGINE_PLUGINS as $plugin_file) {

		include("plugins/".$plugin_file);

	}

}

?>