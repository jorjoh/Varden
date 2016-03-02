<?php
/**
 * Created by PhpStorm.
 * User: Jørgen Johansen
 * Date: 19.01.2016
 * Time: 09:17
 */
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Online Bildearkiv - adminpanel</title>
    <link rel="stylesheet" type="text/css" href="styleBackend.css">
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <link rel="icon" type="image/png" href="../frontend/img/VA-fav-icon-152.png">
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.1.0.js"></script>
    <script>
        $(function () {
            var pull = $('#pull');
            menu = $('nav ul');
            menuHeight = menu.height();

            $(pull).on('click', function (e) {
                e.preventDefault();
                menu.slideToggle();
            });
        });
        $(window).resize(function () {
            var w = $(window).width();
            if (w > 320 && menu.is(':hidden')) {
                menu.removeAttr('style');
            }
        });
    </script>
</head>
<body>
<div class="row">
    <div class="col-3">
        <img src="img/vardenlogo.PNG">
    </div>
</div>
<div class="row">
    <div class="col-8">
        <h1 class="intro">Velkommen til administreringssiden til Onlinebildearkiv</h1>
    </div>
    <div class="col-4">
        <img src="img/userPicture.JPG" width="35px" height="30px"/>
        <h2>$fullName</h2>
    </div>

</div>
<div class="row">
    <div class="col-10">
        <!--<nav id="nav">
            <li class="current"><a href="?side=forside">Hjem</a></li>
            <li><a href="?side=lastOppBilde"#">Last opp et bilde</a>
                        <ul>
                            <li><a href="#">Samling</a></li>
                            <li><a href="#">Jørgen</a></li>
                            <li><a href="#">Erik</a></li>
                            <li><a href="#">Nok en under-element</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Nytt punkt på menyen</a>
                        <ul>
                            <li><a href="#">Dette er en my undermeny</a></li>
                        </ul>
                    </li>
                    <li><a href="#">IconDock</a></li>
                    <li><a href="#">Beste Web BildeGalleri</a></li>
                </ul>
            </li>
            <li><a href="#">Forslag</a>
                <ul>
                    <li><a href="?side=historikk">Historikk</a>
                        <ul>
                            <li><a href="#">Sub-Level Item</a></li>
                            <li><a href="#">Sub-Level Item</a>
                                <ul>
                                    <li><a href="#">Sub-Level Item</a></li>
                                    <li><a href="#">Sub-Level Item</a></li>
                                    <li><a href="#">Sub-Level Item</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Sub-Level Item</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Historikk bilder</a></li>
                    <li><a href="#">Test statestikk</a></li>
                    <li><a href="#">Popcorn</a>
                        <ul>
                            <li><a href="#">Sub-Level Item</a></li>
                            <li><a href="#">Sub-Level Item</a></li>
                            <li><a href="#">Sub-Level Item</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="#">Om</a></li>
            <li><a href="#">Kontakt oss</a></li>
        </nav> -->
        <nav class="clearfix">
            <ul class="clearfix">
                <li><a href="#">Home</a></li>
                <li><a href="#">How-to</a></li>
                <li><a href="#">Icons</a></li>
                <li><a href="#">Design menu with long name</a></li>
                <li><a href="#">Web 2.0</a></li>
                <li><a href="#">Tools</a></li>
            </ul>
            <a href="#" id="pull">Menu</a>
        </nav>
    </div>
</div>
<article>
    <?php include("inc/hoved.php"); ?>
</article>
</body>
<footer>
</footer>
</html>
