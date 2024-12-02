<?php
/*--------------------------------------------------------------------------*/
/*

	Adrián Martínez Osorio.

		imagine_dante 1.0. Diciembre 2015.

		imagine_dante 2.0. Febrero 2017.

		imagine_dante 3.0. Marzo 2018.

		imagine_dante 4.0. Enero 2020.

		imagine_dante 5.0. Marzo 2021.

		imagine_dante X. Noviembre 2021.

*/
/*--------------------------------------------------------------------------*/

include("modules/basic.php");

/*--------------------------------------------------------------------------*/
/* IMAGINE DANTE CONFIG */
/*--------------------------------------------------------------------------*/
$IMAGINE_ENABLE = true;

/*--------------------------------------------------------------------------*/
/* CONFIG */
/*--------------------------------------------------------------------------*/
if(is_summer_time()){
	$SERVER_TIME_DIFERENT = (3600 * 0);
}else{
	$SERVER_TIME_DIFERENT = (3600 * 1);
}

/*---------------------------------------------------------------------------------------------*/
/* MODULES */
/*---------------------------------------------------------------------------------------------*/
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
/*---------------------------------------------------------------------------------------------*/
/* /MODULES */
/*---------------------------------------------------------------------------------------------*/





?>