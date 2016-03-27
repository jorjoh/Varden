<p>Her kan vi hente ut thumbnail av bildene som er lastet opp, samt et skjema for å lagre informasjon vi ikke har i databasen fra før.</p>

<form method="post" action="" name="skjema" id="skjema">
    <input type="submit" name="submit" id="submit" value="Trykk her for å teste insert funksjonen">
</form>

<?php

    if(isset($_POST['submit'])) {

        $insData = array(
            'thumb_w' => 300,
            'filename' => 'bildenavn_på_opplastet_bilde.jpg',
        );

        insert($connect, 'images', $insData);

    }
?>