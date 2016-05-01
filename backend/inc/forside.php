<h1 class="page-header">Oversikt uke - <?php echo date("W"); ?></h1>

<?php
if($user) {
    echo "Hei på deg $user";
}
else {
    echo "Du er ikke logget inn";
}
?>

<form method="post" action="">
    <input type="submit" name="logout" value="logg ut">
</form>

<?php
    if(isset($_POST['logout'])) {
        @ob_start();
        session_destroy();
        header('Location: login.php');
    }
?>

<div class="row placeholders">
    <div class="col-xs-5 col-sm-5 placeholder">
        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200"
             height="200" class="img-responsive" alt="Generic placeholder thumbnail">
        <h4>Behandlede forslag</h4>
        <span class="text-muted">Antall forslag behandlet denne uken</span>
    </div>
    <div class="col-xs-5 col-sm-5 placeholder">
        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200"
             height="200" class="img-responsive" alt="Generic placeholder thumbnail">
        <h4>Mest sett</h4>
        <span class="text-muted">Mest viste bilde denne uken</span>
    </div>
</div>

<h2 class="sub-header">Ubehandlede forslag</h2>
<div class="table-responsive">
<table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp" style="width:100%" >
    <thead>
    <tr>
        <th class="mdl-data-table__cell--non-numeric">#</th>
        <th>Bildetittel</th>
        <th>Innsendt av</th>
        <th>Klokkeslett</th>
        <th>Dato</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td class="mdl-data-table__cell--non-numeric">1</td>
        <td>25</td>
        <td>$2.90</td>
        <td>$2.90</td>
        <td>$2.90</td>
    </tr>
    <tr>
        <td class="mdl-data-table__cell--non-numeric">2</td>
        <td>50</td>
        <td>$1.25</td>
        <td>$1.25</td>
        <td>$1.25</td>
    </tr>
    <tr>
        <td class="mdl-data-table__cell--non-numeric">3</td>
        <td>10</td>
        <td>$2.35</td>
        <td>$2.35</td>
        <td>$2.35</td>
    </tr>
    <td class="mdl-data-table__cell--non-numeric">4</td>
    <td>libero</td>
    <td>Sed</td>
    <td>cursus</td>
    <td>ante</td>
    </tr>
    <tr>
        <td class="mdl-data-table__cell--non-numeric">5</td>
        <td>dapibus</td>
        <td>diam</td>
        <td>Sed</td>
        <td>nisi</td>
    </tr>
    <tr>
        <td class="mdl-data-table__cell--non-numeric">6</td>
        <td>Nulla</td>
        <td>quis</td>
        <td>sem</td>
        <td>at</td>
    </tr>
    <tr>
        <td class="mdl-data-table__cell--non-numeric">7</td>
        <td>nibh</td>
        <td>elementum</td>
        <td>imperdiet</td>
        <td>Duis</td>
    </tr>
    <tr>
        <td class="mdl-data-table__cell--non-numeric">8</td>
        <td>sagittis</td>
        <td>ipsum</td>
        <td>Praesent</td>
        <td>mauris</td>
    </tr>
    <tr>
        <td class="mdl-data-table__cell--non-numeric">9</td>
        <td>Fusce</td>
        <td>nec</td>
        <td>tellus</td>
        <td>sed</td>
    </tr>
    <tr>
        <td>10</td>
        <td>augue</td>
        <td>semper</td>
        <td>porta</td>
        <td>Mauris</td>
    </tr>
    <tr>
        <td class="mdl-data-table__cell--non-numeric">11</td>
        <td>massa</td>
        <td>Vestibulum</td>
        <td>lacinia</td>
        <td>arcu</td>
    </tr>
    <tr>
        <td class="mdl-data-table__cell--non-numeric">12</td>
        <td>eget</td>
        <td>nulla</td>
        <td>Class</td>
        <td>aptent</td>
    </tr>
    <tr>
        <td class="mdl-data-table__cell--non-numeric">13</td>
        <td>taciti</td>
        <td>sociosqu</td>
        <td>ad</td>
        <td>litora</td>
    </tr>
    <tr>
        <td class="mdl-data-table__cell--non-numeric">14</td>
        <td>torquent</td>
        <td>per</td>
        <td>conubia</td>
        <td>nostra</td>
    </tr>
    <tr>
        <td class="mdl-data-table__cell--non-numeric">15</td>
        <td>per</td>
        <td>inceptos</td>
        <td>himenaeos</td>
        <td>Curabitur</td>
    </tr>
    <tr>
        <td class="mdl-data-table__cell--non-numeric">16</td>
        <td>sodales</td>
        <td>ligula</td>
        <td>in</td>
        <td>libero</td>
    </tr>
    </tbody>
</table>
</div>

<link rel="stylesheet" href="css/material.min.css"/>
<link rel="stylesheet" href="css/custom.css"/>

