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
/* MODULES ENABLE */
/*--------------------------------------------------------------------------*/
$IMAGINE_IMAGE_MODULE = true;
$IMAGINE_YOUTUBE_MODULE = false;
$IMAGINE_MAIL_MODULE = false;
$IMAGINE_TRANSLATE_MODULE = true;

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
		'entidades.php',
		'atajos.php',
		'scraping.php',
		'interface.php',
		'urls.php',
	];
	
	if($IMAGINE_IMAGE_MODULE):
		$modules[] = 'exif.php';
		$modules[] = 'images.php';
	endif;

	if($IMAGINE_YOUTUBE_MODULE):
		$modules[] = 'youtube.php';
	endif;

	if($IMAGINE_MAIL_MODULE):
		$modules[] = 'mail.php';
	endif;

	if($IMAGINE_TRANSLATE_MODULE):
		$modules[] = 'translate.php';
	endif;

	foreach ($modules as $module) {

		if(file_exists("modules/".$module)){

			include("modules/".$module);
			
		}
		
	}

endif;
/*---------------------------------------------------------------------------------------------*/
/* /MODULES */
/*---------------------------------------------------------------------------------------------*/





?>