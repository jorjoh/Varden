<?php $searchquery = $_SESSION['searchtxt']; ?>
<form method="get" action="?side=resultat" name="searchfield" id="searchfield">
    <input type="hidden" name="side" value="resultat">
    <input type="text" name="query" id="search" autofocus="autofocus" placeholder="Søk her..." value="<?php echo $searchquery; ?>" required/>
    <input type="submit" id="submit" style="background: url('img/searchbutton.svg');" value=" "/>
    <br>
    <br>
    <input type="checkbox" name="news" id="news">
    <label for="news">Nyheter</label>
    <input type="checkbox" name="culture" id="culture">
    <label for="culture">Kultur</label>
    <input type="checkbox" name="sport" id="sport">
    <label for="sport">Sport</label>
    <input type="checkbox" name="places" id="places">
    <label for="places">Steder</label><br>
</form>

<?php
    $_SESSION['searchtxt'] = mysqli_real_escape_string($connect, $_GET['query']);
    $_SESSION['page'] = intval($_GET['page']);
?>