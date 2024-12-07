<?php
/*

    Cambio automático de hora entre horarios de invierno y de verano.

*/
function is_summer_time(){

    date_default_timezone_set('Europe/Madrid');

    $fechaHoraActual = new DateTime();

    $esHorarioDeVerano = $fechaHoraActual->format('I'); 

    if($esHorarioDeVerano){

        return true;

    }else{

        return false;

    }

}


if($IMAGINE_TIME_CHANGE){

    if(is_summer_time()){
        $SERVER_TIME_DIFERENT = (3600 * 1);
    }else{
        $SERVER_TIME_DIFERENT = 0;
    }

}else{
    $SERVER_TIME_DIFERENT = 0;
}



?>