<?php

    $handlername = 'side';
    $defaultSide = 'forside.php';
    $includePath = 'inc/';
    $errorPage = '404.php';
    $filendelse = '.php';

    $URLside = $_GET[$handlername];

    $rep = opendir($includePath);
    while ($file = readdir($rep)) {
        if ($file != '..' && $file != '.' && $file != '' && !is_dir($file)) {
            $filer[] = $file;
        }
    }
    closedir($rep);


    if (!isset($URLside)) {
        $side = $includePath . $defaultSide;
    } else {
        $side = $URLside . $filendelse;

        if (in_array($side, $filer)) {
            $side = $includePath . $side;
        } else {
            $side = $includePath . $errorPage;
        }
    }

    include_once $side;

?>