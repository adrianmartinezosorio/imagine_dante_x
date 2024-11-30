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
/* LIBS ENABLE */
/*--------------------------------------------------------------------------*/
$IMAGINE_SIMPLEHTMLDOM_LIBS = true;
$IMAGINE_PHPSECLIB_LIBS = false;

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

	include('modules/ierror.php');

	include('modules/connect.php');
	include('modules/databases.php');
	include('modules/bbdd.php');
	include('modules/freequery.php');
	include('modules/imaginequery.php');

	include('modules/math.php');
	include('modules/string.php');
	include('modules/validate.php');
	include('modules/files.php');
	include('modules/folders.php');
	include('modules/time.php');
	include('modules/zip.php');

	include('modules/json.php');
	include('modules/random.php');
	include('modules/parsedata.php');
	include('modules/encrypt.php');
	include('modules/arrays.php');
	include('modules/session.php');
	include('modules/entidades.php');
	include('modules/atajos.php');
	include('modules/scraping.php');
	include('modules/interface.php');
	include('modules/urls.php');

	if($IMAGINE_IMAGE_MODULE):
		include('modules/exif.php');
		include('modules/images.php');
	endif;

	if($IMAGINE_YOUTUBE_MODULE):
		include('modules/youtube.php');
	endif;

	if($IMAGINE_MAIL_MODULE):
		include('modules/mail.php');
	endif;

	if($IMAGINE_TRANSLATE_MODULE):
		include('modules/translate.php');
	endif;


endif;
/*---------------------------------------------------------------------------------------------*/
/* /MODULES */
/*---------------------------------------------------------------------------------------------*/

//----

/*---------------------------------------------------------------------------------------------*/
/* LIBS */
/*---------------------------------------------------------------------------------------------*/
	if($IMAGINE_SIMPLEHTMLDOM_LIBS):
		include('libs/simplehtmldom_1_9_1/simple_html_dom.php');
	endif;

	if($IMAGINE_PHPSECLIB_LIBS):
		include('libs/phpseclib_1_0_19/Net/SFTP.php');
	endif;



?>