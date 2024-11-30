<?php
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
?>