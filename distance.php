<?php

$quote='';
$l1='http://maps.googleapis.com/maps/api/distancematrix/json?origins=';
$src=$_POST['source'];
$l2='&destinations=';
$dest=$_POST['dest'];
$l3='&mode=driving&language=en&sensor=false';
$url=$l1.$src.$l2.$dest.$l3;

$data = file_get_contents($url);
$data = utf8_decode($data);
$obj = json_decode($data);

echo($obj->rows[0]->elements[0]->distance->text)."<br>"; //km
echo($obj->rows[0]->elements[0]->distance->value)."<br>"; // meters
echo($obj->rows[0]->elements[0]->duration->text)."<br>";
echo($obj->rows[0]->elements[0]->duration->value)."<br>";

?>