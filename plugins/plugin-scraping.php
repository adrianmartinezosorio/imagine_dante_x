<?php

/*
Obtiene todos los valores del atributo de la etiqueta html indicada.
2020
*/
function scraping_html_attribute_value($html,$etiqueta_,$atributo_){

	if(!empty($html) && !empty($etiqueta_) && !empty($atributo_)){

		//Instantiate the DOMDocument class.
		$htmlDom = new DOMDocument;

		//Parse the HTML of the page using DOMDocument::loadHTML
		@$htmlDom->loadHTML($html);

		//Extract the links from the HTML.
		$links = $htmlDom->getElementsByTagName($etiqueta_);

		//Array that will contain our extracted links.
		$extractedLinks = array();

		//Loop through the DOMNodeList.
		//We can do this because the DOMNodeList object is traversable.
		foreach($links as $link){

		    //Get the link in the href attribute.
		    $linkHref = $link->getAttribute($atributo_);
		    
		    $extractedLinks[] = array(
		        $atributo_ => $linkHref
		    );

		}

		return $extractedLinks;

	}

}

?>