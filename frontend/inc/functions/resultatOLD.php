/*$sql = "SELECT images.id, images.thumb_url, images.thumb_w, category.name FROM images JOIN category ON images.id = category.id WHERE picturetext LIKE '%$searchtxt%' OR filename LIKE '%$searchtxt%' LIMIT 0, $per_page;";
$query = "SELECT count(id) AS nbr FROM images WHERE picturetext LIKE '%$searchtxt%' OR filename LIKE '%$searchtxt%';";
$result = mysqli_query($connect, $sql) or die("Kunne ikke sende spørring til DB ". mysqli_error($connect));
$nbrresult = mysqli_query($connect, $query) or die ('Kunne ikke telle antall treff'. mysqli_error($connect));
$rows = mysqli_num_rows($result);
$totalrows = mysqli_fetch_array($nbrresult);
$nbrofrows = $totalrows['nbr'];

if($rows < 1) {
echo "<p style='background: #ffffcc; color: #FF0000; padding: 20px;'>Vi klarte dessverre ikke finne noen bilder på ditt søk! <br> Prøv med et annet søkeord</p>";
}
else {
echo '
<div style="width: 950px; height: 150px; text-align: center; margin: 0 auto; background: #CCC;"><br><br>
    Annonse her
</div>
<br>
<p>Ditt søk etter "'.$searchtxt.'" ga '. $nbrofrows.' resultater </p><br>
<div class="category_filter text-uppercase">
    <ul>
        <li class="active" data-filter="*">Alle</li>
        <li data-filter=".nyheter">Nyheter</li>
        <li data-filter=".kultur">Kultur</li>
        <li data-filter=".sport">Sport</li>
        <li data-filter=".steder">Steder</li>
    </ul>
</div>
';

echo '
<div class="category_items">
    <div class="grid-sizer"></div>
    ';
    while($row = mysqli_fetch_array($result)) {
    $id = $row['id'];
    $category = $row['name'];
    $url = $row['thumb_url'];
    $width = $row['thumb_w'];

    echo "
    <a href='?side=bilde&id=$id'>
        <div class='single_pictures $category'>
            <img class='lazy' data-original='$url' width='$width' height='100'>
        </div>
    </a>
    ";
    }
    echo "
</div>
<br style='clear: both;'>
<br>
";
}

*/?>
<script>
    $(document).ready(function() {
        var load = 50;
        var nbr = <?php echo $nbrofrows; ?>;
        var queryword = "<?php echo $searchtxt; ?>";

        $('#btn').click(function () {
            if(load > nbr) {
                $('.loader').hide();
                $('.messages').text("Kunne ikke finne flere bilder å laste");
            }
            else {
                $.ajax({
                    method: 'POST',
                    url: 'inc/functions/ajax.php',
                    data: {
                        load: load,
                        searchtxt: queryword
                    },
                })
                    .done(function (data) {
                        $('.category_items').append(data);
                        $('.category_items').isotope('reloadItems').isotope({sortBy: 'original-order'});
                        $('img.lazy').lazyload();
                    });
            }
            load += 50;
        });
    });
</script>