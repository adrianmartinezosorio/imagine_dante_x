<?php
/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
ARRAYS MODULE
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

array_clear($array); 		//Elimina las entradas duplicadas de un array y reaordena las claves.
ver($array); 				//Lanza un var_dump formateado visualmente con html.
array_sort_by(&$arrIni, $col, $order = SORT_ASC);

Updates:
17-05-2018
18-02-2020

*/
//-----------------------------------------------------------------------
//-----------------------------------------------------------------------
/*

ELIMINA LAS ENTRADAS DUPLICADAS DE UN ARRAY Y REAORDENA LAS CLAVES
17-05-2018

*/
function array_clear($array){

    if(isset($array) && is_array($array) && !empty($array)){

        $array = array_unique($array);
        $array = array_values($array);

        return $array;

    }

}
//-----------------------------------------------------------------------
//-----------------------------------------------------------------------
/*

LANZA UN VAR_DUMP FORMATEADO VISUALMENTE CON HTML
18-02-2020

*/
function ver($array){

	echo '<pre>';
	var_dump($array);
	echo '</pre>';

}



function array_sort_by(&$arrIni, $col, $order = SORT_ASC)
{
    $arrAux = array();
    foreach ($arrIni as $key=> $row)
    {
        $arrAux[$key] = is_object($row) ? $arrAux[$key] = $row->$col : $row[$col];
        $arrAux[$key] = strtolower($arrAux[$key]);
    }
    array_multisort($arrAux, $order, $arrIni);
}