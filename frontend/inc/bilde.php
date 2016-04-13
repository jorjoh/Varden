<?php

$id = $_GET['id'];
if(empty($id)) {
    header("Location: ?side=forside");
    echo "Denne har ingen ID";
}
else {
    include('searchfield.php');
    echo "<br>
    <div class='row'>
            <div style='width: 100%; background: #FFF;'>
                <br>
                <br>
                <div style='width: 950px; height: 150px; text-align: center; margin: 0 auto; background: #CCC;'><br><br>Annonse
                    her som vises uansett om du har adblock eller ikke
                </div>
                <br>
                <br>
                <div style='width: 60%; height: 450px; margin: 0 auto; background: #e6eef1;'>
                    <img class='lazy' style='float: left;' data-original='http://placehold.it/450x450'>
                    <br>
                    <p style='float: right; margin-right: 100px;'>Her kommer bildeinfo</p>
                </div>
                <br>
            </div>
        </div>
    ";
}