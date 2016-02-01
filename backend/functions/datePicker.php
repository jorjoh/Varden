<?php

$dateToday=getdate(date("U"));
$datenow = "$dateToday[month] $dateToday[mday], $dateToday[year]";

$date = $datenow;
$cur_date = new DateTime($date);
$week = $cur_date->format("W");

echo ("$week");

?>