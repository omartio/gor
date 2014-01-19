<?php
session_start();

$znak = $_GET['znak'] +1;

$xml = simplexml_load_file("http://horoscope.ra-project.net/api/$znak");
if($xml)
	echo $xml->item->text;

?>