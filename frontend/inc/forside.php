<?php
    $sql = "SELECT count(id) AS number FROM images;";
    $result = mysqli_query($connect, $sql);
    $number = mysqli_fetch_array($result);
    $numberOfPictures = $number['number'];
?>
<h1 class="Article-heading-1" style="padding-top: 150px; font-size: 40pt; font-family: 'FlamaFont Slab', 'Roboto Slab', georgia, serif;">Velkommen til Vardens <br> digitale bildearkiv</h1>
<br>
<p class="Article-header-entering" style="font-family: FlamaFont, Roboto, helvetica, arial, sans-serif;">
    Du kan nå søke i <strong style="font-weight: 600;"><?php echo $numberOfPictures ?></strong> bilder via vårt bildearkiv på nett. <br>
    Bildearkivet vil få fler bilder etterhvert som løsningen blir ferdigstilt og er klar.
</p>

<?php
    include('searchfield.php');
    echo "<div id='subpage-bg'>";
    include('mwpictures.php');
    echo "</div>";
?>
