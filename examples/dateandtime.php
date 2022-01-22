<?php
$nu = time();

var_dump($nu);
print "<br>";

$dedatum = date("d/m/Y", $nu);
print "$dedatum<br>";
$dedatum = date("Y-m-d", $nu);
print "$dedatum<br>";

$verjaardag = mktime(0,0,0,7,23,2021);
print "$verjaardag seconden<br>";
$dedatum = date("d/m/Y", $verjaardag);
print "$dedatum<br>";

$verjaardag_eenweeklater = mktime(0,0,0,7,23 + 7,2021);
print "$verjaardag_eenweeklater seconden<br>";
$dedatum = date("d/m/Y", $verjaardag_eenweeklater);
print "$dedatum<br>";

$verjaardag_eenmaandlater = mktime(0,0,0,7 + 1,23,2021);
print "$verjaardag_eenmaandlater seconden<br>";
$dedatum = date("d/m/Y", $verjaardag_eenmaandlater);
print "$dedatum<br>";

$verjaardag_veertienlater = mktime(0,0,0,7,23 + 14,2021);
$dedatum = date("d/m/Y", $verjaardag_veertienlater);
print "$dedatum<br>";

$laatstedag_vorigemaand= mktime(0,0,0,7,0,2021);
$dedatum = date("d/m/Y", $laatstedag_vorigemaand);
print "De laatste dag van de vorige maand is $dedatum<br>";

$schrikkeldag= mktime(0,0,0,3,0,2020);
$dedatum = date("d/m/Y", $schrikkeldag);
print "Dit was een schrikkeldag: $dedatum<br>";