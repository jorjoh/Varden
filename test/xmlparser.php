<?php
/**
 * Created by PhpStorm.
 * User: Jørgen Johansen
 * Date: 17.04.2016
 * Time: 11:24
 */

$xml=simplexml_load_file("postnummer.xml") or die("Error: Cannot create object");

//print_r($xml);
echo($xml->postcode[0]);
//print_r($xml->location[1141]);
//print_r($xml->coordinates);
?>