<?php
/*

ENTIDADES MODULE 1.0

escapehtml($string);
escapestrangecaracters($string);
entidades_html($string);

*/


/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
/*
DOCUMENTACION (ESCAPAR CODIGO HTML DE UN TEXTO)

Escapara el texto html para mostrarllo talcual.

Funcion: escapehtml($string);

1-Argumento:
	-STRING.

Dante.
26-2-2017


*/
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
function escapehtml($string){

	if(!empty($string)){

		$string = str_replace('/', '&#47;', $string); 
		$string = str_replace('<', '&lt;', $string); 
		$string = str_replace('>', '&gt;', $string);
		$string = str_replace('"', '&#34;', $string);
		$string = str_replace("'", '&#39;', $string);   

		return $string;

	}
	
}
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
/*
DOCUMENTACION (ESCAPAR CODIGO HTML DE UN TEXTO)

Escapara todos los posibles caracteres extraños de un texto.

Funcion: escapestrangecaracters($string);

1-Argumento:
	-STRING.

Dante.
26-2-2017
*/
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
function escapestrangecaracters($string){

	if(!empty($string)){

		
		$string = str_replace('€', '&#8364;', $string); 
		$string = str_replace('©', '&#169;', $string); 
		$string = str_replace('®', '&#174;', $string); 

		$string = str_replace('À', '&#192;', $string);
		$string = str_replace('Á', '&#193;', $string);
		$string = str_replace('Â', '&#194;', $string);
		$string = str_replace('Ã', '&#195;', $string);
		$string = str_replace('Ä', '&#196;', $string);
		$string = str_replace('Å', '&#197;', $string);
		$string = str_replace('Æ', '&#198;', $string);
		$string = str_replace('Ç', '&#199;', $string);
		$string = str_replace('È', '&#200;', $string);
		$string = str_replace('É', '&#201;', $string);
		$string = str_replace('Ê', '&#202;', $string);
		$string = str_replace('Ë', '&#203;', $string);
		$string = str_replace('Ì', '&#204;', $string);
		$string = str_replace('Í', '&#205;', $string);
		$string = str_replace('Î', '&#206;', $string);
		$string = str_replace('Ï', '&#207;', $string);
		$string = str_replace('Ð', '&#208;', $string);
		$string = str_replace('Ñ', '&#209;', $string);
		$string = str_replace('Ò', '&#210;', $string);
		$string = str_replace('Ó', '&#211;', $string);
		$string = str_replace('Ô', '&#212;', $string);
		$string = str_replace('Õ', '&#213;', $string);
		$string = str_replace('Ö', '&#214;', $string);
		$string = str_replace('×', '&#215;', $string);
		$string = str_replace('Ø', '&#216;', $string);
		$string = str_replace('Ù', '&#217;', $string);
		$string = str_replace('Ú', '&#218;', $string);
		$string = str_replace('Û', '&#219;', $string);
		$string = str_replace('Ü', '&#220;', $string);
		$string = str_replace('Ý', '&#221;', $string);
		$string = str_replace('Þ', '&#222;', $string);
		$string = str_replace('ß', '&#223;', $string);
		
		$string = str_replace('à', '&#224;', $string);
		$string = str_replace('á', '&#225;', $string);
		$string = str_replace('â', '&#226;', $string);
		$string = str_replace('ã', '&#227;', $string);
		$string = str_replace('ä', '&#228;', $string);
		$string = str_replace('å', '&#229;', $string);
		$string = str_replace('æ', '&#230;', $string);
		$string = str_replace('ç', '&#231;', $string);
		$string = str_replace('è', '&#232;', $string);
		$string = str_replace('é', '&#233;', $string);
		$string = str_replace('ê', '&#234;', $string);
		$string = str_replace('ë', '&#235;', $string);
		$string = str_replace('ì', '&#236;', $string);
		$string = str_replace('í', '&#237;', $string);
		$string = str_replace('î', '&#238;', $string);
		$string = str_replace('ï', '&#239;', $string);
		$string = str_replace('ð', '&#240;', $string);
		$string = str_replace('ñ', '&#241;', $string);
		$string = str_replace('ò', '&#242;', $string);
		$string = str_replace('ó', '&#243;', $string);
		$string = str_replace('ô', '&#244;', $string);
		$string = str_replace('õ', '&#245;', $string);
		$string = str_replace('ö', '&#246;', $string);
		$string = str_replace('÷', '&#247;', $string);
		$string = str_replace('ø', '&#248;', $string);
		$string = str_replace('ù', '&#249;', $string);
		$string = str_replace('ú', '&#250;', $string);
		$string = str_replace('û', '&#251;', $string);
		$string = str_replace('ü', '&#252;', $string);
		$string = str_replace('ý', '&#253;', $string);
		$string = str_replace('þ', '&#254;', $string);
		$string = str_replace('ÿ', '&#255;', $string);
		
		$string = str_replace('Š', '&#352;', $string); 
		$string = str_replace('š', '&#353;', $string); 
		$string = str_replace('Ÿ', '&#376;', $string); 
		$string = str_replace('ƒ', '&#402;', $string); 

		return $string;

	}

}
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
/*
DOCUMENTACION (ESCAPAR CODIGO HTML DE UN TEXTO)

Conversion de un texto a sus entidades html.

Funcion: escapestrangecaracters($string);

1-Argumento:
	-STRING.

Dante.
26-2-2017
*/
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
function entidades_html($string){
	
	//Sistituir asteriscos.
	$string = str_replace(';', '&#59;', $string); 
	
	//Sustituir simbolos
	$string = str_replace(' ', '&#32;', $string); 
	$string = str_replace('!', '&#33;', $string); 
	$string = str_replace('"', '&#34;', $string); 
	$string = str_replace('$', '&#36;', $string); 
	$string = str_replace('%', '&#37;', $string); 
	$string = str_replace("'", '&#39;', $string); 
	$string = str_replace('(', '&#40;', $string); 
	$string = str_replace(')', '&#41;', $string); 
	$string = str_replace('*', '&#42;', $string); 
	$string = str_replace('+', '&#43;', $string); 
	$string = str_replace(',', '&#44;', $string); 
	$string = str_replace('-', '&#45;', $string); 
	$string = str_replace('.', '&#46;', $string); 
	$string = str_replace('/', '&#47;', $string);
	$string = str_replace(':', '&#58;', $string); 
	$string = str_replace('<', '&#60;', $string); 
	$string = str_replace('=', '&#61;', $string); 
	$string = str_replace('>', '&#62;', $string); 
	$string = str_replace('?', '&#63;', $string);
	$string = str_replace('@', '&#64;', $string); 
	$string = str_replace('`', '&#96;', $string); 
	$string = str_replace('{', '&#123;', $string); 
	$string = str_replace('|', '&#124;', $string); 
	$string = str_replace('}', '&#125;', $string); 
	$string = str_replace('~', '&#126;', $string); 
	$string = str_replace('–', '&#8211;', $string); 
	$string = str_replace('—', '&#8212;', $string); 
	$string = str_replace('‘', '&#8216;', $string); 
	$string = str_replace('’', '&#8217;', $string); 
	$string = str_replace('‚', '&#8218;', $string); 
	$string = str_replace('“', '&#8220;', $string); 
	$string = str_replace('”', '&#8221;', $string); 
	$string = str_replace('„', '&#8222;', $string); 
	$string = str_replace('†', '&#8224;', $string); 
	$string = str_replace('‡', '&#8225;', $string); 
	$string = str_replace('•', '&#8226;', $string); 
	$string = str_replace('…', '&#8230;', $string); 
	$string = str_replace('‰', '&#8240;', $string); 
	$string = str_replace('€', '&#8364;', $string); 
	$string = str_replace('™', '&#8482;', $string); 
	$string = str_replace('¡', '&#161;', $string); 
	$string = str_replace('¢', '&#162;', $string); 
	$string = str_replace('£', '&#163;', $string); 
	$string = str_replace('¤', '&#164;', $string); 
	$string = str_replace('¥', '&#165;', $string); 
	$string = str_replace('¦', '&#166;', $string); 
	$string = str_replace('§', '&#167;', $string); 
	$string = str_replace('¨', '&#168;', $string); 
	$string = str_replace('©', '&#169;', $string); 
	$string = str_replace('ª', '&#170;', $string); 
	$string = str_replace('«', '&#171;', $string); 
	$string = str_replace('¬', '&#172;', $string); 
	$string = str_replace('®', '&#174;', $string); 
	$string = str_replace('¯', '&#175;', $string); 
	$string = str_replace('°', '&#176;', $string); 
	$string = str_replace('±', '&#177;', $string); 
	$string = str_replace('²', '&#178;', $string); 
	$string = str_replace('³', '&#179;', $string); 
	$string = str_replace('´', '&#180;', $string); 
	$string = str_replace('μ', '&#181;', $string); 
	$string = str_replace('¶', '&#182;', $string); 
	$string = str_replace('·', '&#183;', $string); 
	$string = str_replace('¸', '&#184;', $string); 
	$string = str_replace('¹', '&#185;', $string); 
	$string = str_replace('º', '&#186;', $string); 
	$string = str_replace('»', '&#187;', $string); 
	$string = str_replace('¼', '&#188;', $string); 
	$string = str_replace('½', '&#189;', $string); 
	$string = str_replace('¾', '&#190;', $string); 
	$string = str_replace('¿', '&#191;', $string);
	
	$string = str_replace('[', '&#91;', $string);
	$string = str_replace(']', '&#93;', $string);
	$string = str_replace('^', '&#94;', $string);
	$string = str_replace('_', '&#95;', $string);
	
	//Sustituir mayusculas
	$string = str_replace('A', '&#65;', $string); 
	$string = str_replace('B', '&#66;', $string); 
	$string = str_replace('C', '&#67;', $string); 
	$string = str_replace('D', '&#68;', $string); 
	$string = str_replace('E', '&#69;', $string); 
	$string = str_replace('F', '&#70;', $string); 
	$string = str_replace('G', '&#71;', $string); 
	$string = str_replace('H', '&#72;', $string); 
	$string = str_replace('I', '&#73;', $string); 
	$string = str_replace('J', '&#74;', $string); 
	$string = str_replace('K', '&#75;', $string); 
	$string = str_replace('L', '&#76;', $string); 
	$string = str_replace('M', '&#77;', $string); 
	$string = str_replace('N', '&#78;', $string); 
	$string = str_replace('O', '&#79;', $string);
	$string = str_replace('P', '&#80;', $string); 
	$string = str_replace('Q', '&#81;', $string); 
	$string = str_replace('R', '&#82;', $string); 
	$string = str_replace('S', '&#83;', $string); 
	$string = str_replace('T', '&#84;', $string); 
	$string = str_replace('U', '&#85;', $string); 
	$string = str_replace('V', '&#86;', $string); 
	$string = str_replace('W', '&#87;', $string); 
	$string = str_replace('X', '&#88;', $string); 
	$string = str_replace('Y', '&#89;', $string); 
	$string = str_replace('Z', '&#90;', $string); 
	
	//Sustituir minusculas
	$string = str_replace('a', '&#97;', $string); 
	$string = str_replace('b', '&#98;', $string); 
	$string = str_replace('c', '&#99;', $string); 
	$string = str_replace('d', '&#100;', $string); 
	$string = str_replace('e', '&#101;', $string); 
	$string = str_replace('f', '&#102;', $string); 
	$string = str_replace('g', '&#103;', $string); 
	$string = str_replace('h', '&#104;', $string); 
	$string = str_replace('i', '&#105;', $string); 
	$string = str_replace('j', '&#106;', $string); 
	$string = str_replace('k', '&#107;', $string); 
	$string = str_replace('l', '&#108;', $string); 
	$string = str_replace('m', '&#109;', $string); 
	$string = str_replace('n', '&#110;', $string); 
	$string = str_replace('o', '&#111;', $string);
	$string = str_replace('p', '&#112;', $string); 
	$string = str_replace('q', '&#113;', $string); 
	$string = str_replace('r', '&#114;', $string); 
	$string = str_replace('s', '&#115;', $string); 
	$string = str_replace('t', '&#116;', $string); 
	$string = str_replace('u', '&#117;', $string); 
	$string = str_replace('v', '&#118;', $string); 
	$string = str_replace('w', '&#119;', $string); 
	$string = str_replace('x', '&#120;', $string); 
	$string = str_replace('y', '&#121;', $string); 
	$string = str_replace('z', '&#122;', $string);
	
	//Sustituir caracteres extraños mayusculas.
	$string = str_replace('À', '&#192;', $string);
	$string = str_replace('Á', '&#193;', $string);
	$string = str_replace('Â', '&#194;', $string);
	$string = str_replace('Ã', '&#195;', $string);
	$string = str_replace('Ä', '&#196;', $string);
	$string = str_replace('Å', '&#197;', $string);
	$string = str_replace('Æ', '&#198;', $string);
	$string = str_replace('Ç', '&#199;', $string);
	$string = str_replace('È', '&#200;', $string);
	$string = str_replace('É', '&#201;', $string);
	$string = str_replace('Ê', '&#202;', $string);
	$string = str_replace('Ë', '&#203;', $string);
	$string = str_replace('Ì', '&#204;', $string);
	$string = str_replace('Í', '&#205;', $string);
	$string = str_replace('Î', '&#206;', $string);
	$string = str_replace('Ï', '&#207;', $string);
	$string = str_replace('Ð', '&#208;', $string);
	$string = str_replace('Ñ', '&#209;', $string);
	$string = str_replace('Ò', '&#210;', $string);
	$string = str_replace('Ó', '&#211;', $string);
	$string = str_replace('Ô', '&#212;', $string);
	$string = str_replace('Õ', '&#213;', $string);
	$string = str_replace('Ö', '&#214;', $string);
	$string = str_replace('×', '&#215;', $string);
	$string = str_replace('Ø', '&#216;', $string);
	$string = str_replace('Ù', '&#217;', $string);
	$string = str_replace('Ú', '&#218;', $string);
	$string = str_replace('Û', '&#219;', $string);
	$string = str_replace('Ü', '&#220;', $string);
	$string = str_replace('Ý', '&#221;', $string);
	$string = str_replace('Þ', '&#222;', $string);
	$string = str_replace('ß', '&#223;', $string);
	
	//Sustituir caracteres extraños minusculas.
	$string = str_replace('à', '&#224;', $string);
	$string = str_replace('á', '&#225;', $string);
	$string = str_replace('â', '&#226;', $string);
	$string = str_replace('ã', '&#227;', $string);
	$string = str_replace('ä', '&#228;', $string);
	$string = str_replace('å', '&#229;', $string);
	$string = str_replace('æ', '&#230;', $string);
	$string = str_replace('ç', '&#231;', $string);
	$string = str_replace('è', '&#232;', $string);
	$string = str_replace('é', '&#233;', $string);
	$string = str_replace('ê', '&#234;', $string);
	$string = str_replace('ë', '&#235;', $string);
	$string = str_replace('ì', '&#236;', $string);
	$string = str_replace('í', '&#237;', $string);
	$string = str_replace('î', '&#238;', $string);
	$string = str_replace('ï', '&#239;', $string);
	$string = str_replace('ð', '&#240;', $string);
	$string = str_replace('ñ', '&#241;', $string);
	$string = str_replace('ò', '&#242;', $string);
	$string = str_replace('ó', '&#243;', $string);
	$string = str_replace('ô', '&#244;', $string);
	$string = str_replace('õ', '&#245;', $string);
	$string = str_replace('ö', '&#246;', $string);
	$string = str_replace('÷', '&#247;', $string);
	$string = str_replace('ø', '&#248;', $string);
	$string = str_replace('ù', '&#249;', $string);
	$string = str_replace('ú', '&#250;', $string);
	$string = str_replace('û', '&#251;', $string);
	$string = str_replace('ü', '&#252;', $string);
	$string = str_replace('ý', '&#253;', $string);
	$string = str_replace('þ', '&#254;', $string);
	$string = str_replace('ÿ', '&#255;', $string);
	
	//Otros
	$string = str_replace('Š', '&#352;', $string); 
	$string = str_replace('š', '&#353;', $string); 
	$string = str_replace('Ÿ', '&#376;', $string); 
	$string = str_replace('ƒ', '&#402;', $string); 

	return $string;
	
}


?>