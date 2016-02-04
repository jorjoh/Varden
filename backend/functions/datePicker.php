<?php

function getWeekNumber(){
    $dateToday=getdate(date("U"));
    $datenow = "$dateToday[month] $dateToday[mday], $dateToday[year]";

    $date = $datenow;
    $cur_date = new DateTime($date);
    $week = $cur_date->format("W");

    echo ("$week");

}


function getdateTime(){
    $dateToday=getdate(date("U"));
    $datenow = "$dateToday[month] $dateToday[mday], $dateToday[year]";

    $date = $datenow;
    $cur_date = new DateTime($date);
    $week = $cur_date->format("W");
    $day = $cur_date->format("D");

    echo ("$date");
    //echo $datenow;


}
