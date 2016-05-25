<?php
    @ob_start();
    @session_start();
    date_default_timezone_get("Europa/Oslo");
    include('inc/functions/dbcon.php');
    include('inc/functions/sqlfunctions.php');
    $user = $_SESSION['username'];
    if(empty($user)) {
        header('Location: login.php');
    }
    else {
        echo '
            <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Sett inn favicon her -->
    <link rel="icon" href="#">

    <title>Online Bildearkiv - Varden - Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!--Material Design core CSS-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.indigo-pink.min.css">
    <script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.3/Chart.min.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don\'t actually copy these 2 lines! -->
    <!--[if lt IE 9]>
    <script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- DropZone biblioteket -->
    <script src="js/dropzone.min.js"></script>

    <!-- jQuery biblioteket -->
    <script src="js/jquery.min.js"></script>
    <!--CKeditor-->
    <script src="//cdn.ckeditor.com/4.5.9/basic/ckeditor.js"></script>
    <!-- Jquery-->
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    
    
    
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="nav navbar-nav navbar-right" style="margin: 10px 50px 0 0;">
    ';
    if($user) {
        echo "<p style='color: #fff; margin-right: 5px; display: inline;'>Velkommen $user</p>";
    }
    echo '
    
    <form method="post" action="" style="display: inline;">
        <input type="submit" class="btn-danger" style="padding: 5px;" name="logout" value="logg ut">
    </form>
    
    ';
    if(isset($_POST["logout"])) {
        @ob_start();
        session_destroy();
        header("Location: login.php");
    }

    echo '
    </div>
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Online Bildearkiv - Administrator</a>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li style="text-align: center;"><strong>Generell</strong></li>
                <li><a href="?side=forside">Oversikt <span class="sr-only">(current)</span></a></li>
                <li style="text-align: center;"><strong>Verktøy</strong></li>
                <li><a href="?side=lastoppbilder">Last opp bilder</a></li>
                <li><a href="?side=endrebilder">Behandle innsendte forslag</a></li>
                <li><a href="?side=slettebilder">Slett bilder</a></li>
                <li style="text-align: center;"><strong>Forslag</strong></li>
                <li><a href="?side=setidligereforslag">Se tidligere forslag</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            ';
            include('inc/hoved.php');
        echo '
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.jQuery || document.write(\'<script src="assets/js/vendor/jquery.min.js"><\/script>\')</script>
<script src="dist/js/bootstrap.min.js"></script>
<!-- Just to make our placeholder images work. Don\'t actually copy the next line! -->
<script src="assets/js/vendor/holder.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>

        ';
    }
?>