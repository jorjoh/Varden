<?php
/**
 * Created by PhpStorm.
 * User: Jørgen Johansen
 * Date: 05.02.2016
 * Time: 09:25
 */

?>

<div class="row">
    <div class="col-5" style="width: 650px; height: 300px; border: solid 2px black;">
        <?php for($i = 0; $i<10; $i++){
            echo "<a href='' id='exampleText' style='left: 2px; position: relative; display: block;'>Eksempel historikk av bilder som er registrert<br/></a>";
        }

        ?>
    </div>
    <div class="col-3">

    </div>
</div>

<div class="row">
    <div class="col-6" style="width: 550px; height: 400px; border: solid 2px black;">
        <h3>Tittel: Eksempel tittel på bilde</h3>
        <img src="http://artistsofutah.org/15Bytes/wp-content/uploads/2013/02/35collage1.jpg" style="width: 150px; height: 150px;">
        <h3>Forslag: Dette er et utrolig rart bilde</h3>
        <h3>Endret til: Forslagstekst til bilde endret til...</h3>
        <h3>Endert av:$userID</h3>
    </div>
</div>
