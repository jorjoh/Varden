<?php
/**
 * Created by PhpStorm.
 * User: Jørgen Johansen
 * Date: 17.04.2016
 * Time: 11:24
 */

$xml= new DOMDocument();
$xml->load("postnummer.xml");

$x = $xml->documentElement;
/*foreach($x->childNodes AS $item) {
    if($item->nodeName == 'postcode') {
        $nodeValue = explode(" ", $item->nodeValue)."<br>";
        echo $nodeValue[$item];
    }
    //echo $item->nodeName . " = " . $item->nodeValue . "<br>";
    //echo $item->city_district."<br>";
}*/

for($i = 0; $i < count($x->nodeValue); $i++) {
    if($x->nodeName == 'postcode') {
        $nodeValue = explode(" ", $x->nodeValue)."<br>";
        echo $nodeValue[$i];
    }
}

?>