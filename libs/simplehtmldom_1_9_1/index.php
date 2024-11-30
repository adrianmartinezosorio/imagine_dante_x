<?php

//https://simplehtmldom.sourceforge.io/manual.htm#section_quickstart

// example of how to use basic selector to retrieve HTML contents
include('simple_html_dom.php');


function findLinks($url, $depth, $maxDepth) {

  echo $url;

  $html = file_get_html($url);

  if ($depth <= $maxDepth)
    foreach($html->find('a') as $element)
      findLinks($element->href, $depth + 1, $maxDepth);
}
findLinks("https://wordcodepress.com/", 1, 5);
?>