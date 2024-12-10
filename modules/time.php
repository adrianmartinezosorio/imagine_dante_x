<?php
/*

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
TIME MODULE
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

//ATAJOS
t(); //Obtiene el timestamp actual.
dd($timestamp,$formato = 'd/m/Y - H:i:s'); //Formatea un timestampo por defecto.

//FUNCIONES PRINCIPALES
datetotime($dia,$mes,$ano);//De fecha a timestamp.

time_diferent($inicio,$final); //Tiempo transcurrido entre dos timestamp (d/h/m/s).
time_diferentd($inicio,$final); //Tiempo transcurrido entre dos timestamp en dias.
time_dhms($seg); //De segundos a Dias:Horas:Minutos:Segundos.
time_hms($seg); //De segundos a Horas:Minutos:Segundos.
time_d($seg); //De segundos a Dias.
time_before($seg); //Obtendra el tiempo transcurrido desde un timestamp tipo "Hace x tiempo"
date_interval_years_and_months($fechaInicio,$fechaFin);

diasFinalMes(); //Devuelve la cantidad de dias restates hasta final de mes.
MesesFinalAno(); //Cantidad de meses hasta final de año.
transcurrido_mes_actual_porcent();//Porcentaje de mes actual transscurrido.

birthdaytoage($dianaz,$mesnaz,$anonaz); //Fecha nacimiento a edad.

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (OBTENER TIMESTAMP)

Obtendra el timestamp actual.

Funcion: (echo) t();

Dante.
3-3-2016

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function t(){
	
	global $SERVER_TIME_DIFERENT;
	
	return time() + $SERVER_TIME_DIFERENT;
	
}

function dd($timestamp,$formato = 'd/m/Y - H:i:s'){

	if(!empty($timestamp) && is_numeric($timestamp)){

		return date($formato,$timestamp);

	}

}


//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (FUNCION DE CONVERSION DE FECHA A TIMESTAMP)

Funcion: (echo) $fecha = fecha_a_timestamp(5,4,2015);
Argumentos: DIA, MES, AÑO.

1ºer Argumento:
	-Dia expresado en numero.
	
2º Argumento:
	-Mes: Se puede expresar como numero entero (1,2,3...), como cadena enpezando en minusculas o mayusculas (Mayo,Junio,abril).

3º Argumento:
	-Año expresado en numero entero (2015).

En caso de acierto devolvera el timestamp de la fecha, en caso de error devolvera false.
	
Dante.
19-1-2016
11-6-2018

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function datetotime($dia,$mes,$ano){

	$fecha = $ano."-".$mes."-".$dia;
	return $final = strtotime($fecha);

}

//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (FUNCION DE FORMATEO DE SEGUNDOS)

Formateara una cantidad de segundos a dias:horas:minutos:segundos.

Funcion: (echo) formatear_segundos(123546);
Argumentos: segundos.

1ºer Argumento:
	-La cantidad de segundos a formatear.
	
Dante.
27-12-2015

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function time_diferent($inicio,$final){
		
		$intervalo = $final - $inicio;
		
		$d = floor($intervalo / 86400);
		$h = floor(($intervalo - ($d * 86400)) / 3600);
		$m = floor(($intervalo - ($d * 86400) - ($h * 3600)) / 60);
		$s = $intervalo % 60;
		
		return "$d:$h:$m:$s";
		
}

function time_diferentd($inicio,$final){
	
	$intervalo_tiempo = $final - $inicio;
								
	$dias = $intervalo_tiempo / (60 * 60 * 24);
	
	return $dias;
	
}
function time_dhms($seg) {
		
		$d = floor($seg / 86400);
		$h = floor(($seg - ($d * 86400)) / 3600);
		$m = floor(($seg - ($d * 86400) - ($h * 3600)) / 60);
		$s = $seg % 60;
		
		return "$d:$h:$m:$s";
}
function time_hms($seg){
		
		$d = floor($seg / 86400);
		$h = floor(($seg - ($d * 86400)) / 3600);
		$m = floor(($seg - ($d * 86400) - ($h * 3600)) / 60);
		$s = $seg % 60;
		
		return "$h:$m:$s";
}
function time_d($seg){
		
		$d = floor($seg / 86400);
		
		return "$d";
}

//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (DIAS TRANSCURRIDOS ENTRE 2 TIMESTAMP)

Obtendra la diferencia de dias entre dos timestamp.

Funcion: (echo) timestamp_interval_dias($desde,$hasta);
Argumentos: timestamp,timestamp.

1ºer Argumento:
	-Un timestamp de inicio.
	
2ºer Argumento:
	-Un timestamp final.
	
Dante.
11-4-2016

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*
DOCUMENTACION (TIEMPO TRANSCURRIDO DESDE UN TIMESTAMP CON TRADUCCION PARA USUARIOS)

Funcion: (echo) timestamp_interval_dias($desde,$hasta);
Argumentos: timestamp,timestamp.

1ºer Argumento:
	-Un timestamp.
	
	
Dante.
15-4-2016

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function time_before($seg,$string = "Hace"){
		
		$seg = t() - $seg;
		
		$ano = floor($seg / 31536000);
		$mes = floor($seg / 2592000);
		$d = floor($seg / 86400);
		$h = floor(($seg - ($d * 86400)) / 3600);
		$m = floor(($seg - ($d * 86400) - ($h * 3600)) / 60);
		$s = $seg % 60;
		
		if($seg < 60){ //Menor de un minuto
			
			if($s == 1){
				
				return $string." $s segundo";
				
			}else{
				
				return $string." $s segundos";
				
			}
			
		}else if($seg < 3600){ //menor de una hora
			
			if($m == 1){
				
				return $string." $m minuto";
				
			}else{
				
				return $string." $m minutos";
				
			}
			
		}else if($seg < 86400){ //menor de un dia (24 horas)
			
			if($h == 1){
				
				return $string." $h hora";
				
			}else{
				
				return $string." $h horas";
				
			}
			
		}else if($seg < 2592000){ //Menor d un mes
			
			if($d == 1){
				
				return $string." $d día";
				
			}else{
				
				return $string." $d días";
				
			}

		}else if($seg < 31536000){ //Menor de una año
			
			if($mes == 1){
				
				return $string." $mes mes";
				
			}else{
				
				return $string." $mes meses";
				
			}
			
		}else if($seg > 31536000){ //Mayor de un año
			
			if($ano == 1){
				
				return $string." $ano año";
				
			}else{
				
				return $string." $ano años";
				
			}
			
		}

}
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
/*

DOCUMENTACION (TIEMPO TRANSCURRIDO DESDE UNA FECHA HASTA HOTRA EN AÑOS Y MESES)

Funcion: (echo) date_interval_years_and_months('2016-11-16','2019-05-31');
Argumentos: fecha, fecha.
	
Dante.
09-03-2020

*/
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
function date_interval_years_and_months($fechaInicio,$fechaFin)
{
    $fecha1 = new DateTime($fechaInicio);
    $fecha2 = new DateTime($fechaFin);
    $fecha = $fecha1->diff($fecha2);
    $tiempo = "";
         
    //años
    if($fecha->y > 0)
    {
        $tiempo .= $fecha->y;
             
        if($fecha->y == 1)
            $tiempo .= " año y ";
        else
            $tiempo .= " años y ";
    }
         
    //meses
    if($fecha->m > 0)
    {
        $tiempo .= $fecha->m;
             
        if($fecha->m == 1)
            $tiempo .= " mes";
        else
            $tiempo .= " meses";
    }
         
    return $tiempo;
}




function date_interval_years_and_months_timestamp($fechaInicio,$fechaFin)
{
    $fecha1 = new DateTime($fechaInicio);
    $fecha2 = new DateTime($fechaFin);
    $fecha = $fecha1->diff($fecha2);
    $tiempo = "";
         
    //años
    if($fecha->y > 0)
    {
        $tiempo .= $fecha->y;
             
        if($fecha->y == 1)
            $tiempo .= " año y ";
        else
            $tiempo .= " años y ";
    }
         
    //meses
    if($fecha->m > 0)
    {
        $tiempo .= $fecha->m;
             
        if($fecha->m == 1)
            $tiempo .= " mes";
        else
            $tiempo .= " meses";
    }
         
    return $tiempo;
}







function birthdaytoage($dianaz,$mesnaz,$anonaz){

	$dia=date('j');
	$mes=date('n');
	$ano=date('Y');

	if (($mesnaz == $mes) && ($dianaz > $dia)) { $ano=($ano-1); }

	if ($mesnaz > $mes) { $ano=($ano-1);}

	$edad=($ano-$anonaz);

	return $edad;

}

function diasFinalMes(){

	$diasmes = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
	$diaactual = date('d');

	$diasrestantesmes = $diasmes - $diaactual;

	return $diasrestantesmes;

}
function MesesFinalAno(){

	return (12 - date('m'));

}
function transcurrido_mes_actual_porcent(){

	$total_mes = cal_days_in_month(CAL_GREGORIAN, date("m"), date("Y"));

	$transcurrido = date("d");

	return ($transcurrido * 100) / $total_mes;

}

	function num_to_month($mes){
        
		if(!empty($mes) && is_numeric($mes)){

			if($mes == 1){
				$mes = 'Enero';
			}else if($mes == 2){
				$mes = 'Febrero';
			}else if($mes == 3){
				$mes = 'Marzo';
			}else if($mes == 4){
				$mes = 'Abril';
			}else if($mes == 5){
				$mes = 'Mayo';
			}else if($mes == 6){
				$mes = 'Junio';
			}else if($mes == 7){
				$mes = 'Julio';
			}else if($mes == 8){
				$mes = 'Agosto';
			}else if($mes == 9){
				$mes = 'Septiembre';
			}else if($mes == 10){
				$mes = 'Octubre';
			}else if($mes == 11){
				$mes = 'Noviembre';
			}else if($mes == 12){
				$mes = 'Diciembre';
			}

			return $mes;

		}

	}



function minutes_to_seconds($minutes){

    if(is_numeric($minutes)){

        return $minutes * 60;

    }

}
function minutes_to_milliseconds($minutes){

    if(is_numeric($minutes)){

        return $minutes * 60000;

    }

}
?>