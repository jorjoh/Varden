<?php
    $sql = "SELECT count(id) AS number FROM images;";
    $result = mysqli_query($connect, $sql);
    $number = mysqli_fetch_array($result);
    $numberOfPictures = $number['number'];
?>
<h1 id="title">Velkommen til Vardens <br> digitale bildearkiv</h1>
<p id="introTxt">
    Du kan nå søke i <strong><?php echo $numberOfPictures ?></strong> bilder via vårt bildearkiv på nett. <br>
    Bildearkivet vil få fler bilder etterhvert som løsningen blir ferdigstilt og er klar.
</p>

<?php
    include('searchfield.php');
    include('mwpictures.php');
?>

<br>
<!--
<div id="abonnement">
    <div id="text">
        <h2 style="text-align: left;">Digital tilgang</h2>
        <p>Få full tilgang til vårt bildearkiv ut året for kun 79kr,-
            <a href="#" id="orderButton">Bestill her</a>
        </p>
    </div>
</div> -->