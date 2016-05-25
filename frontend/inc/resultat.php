<div style="padding-top: 7%;"></div>
<?php
    require_once('app/init.php');
    include('searchfield.php');
    $searchtxt = mysqli_real_escape_string($connect, $_GET['q']);
    $page = intval($_GET['page']);
    $per_page = 50; // Antall bilder per side
?>

<br>
<div id="subpage-bg">
    <section id="pictures" class="pictures_area">
        <div class="container">
            <br>
                <?php

                    if(!empty($searchtxt)) {

//                        if(isset($_GET['news'])) {
//                            echo "Nyheter = CHECK <br>";
//                        }
//                        if(isset($_GET['culture'])) {
//                            echo "Kultur = CHECK <br>";
//                        }
//                        if(isset($_GET['sport'])) {
//                            echo "Sport = CHECK <br>";
//                        }
//                        if(isset($_GET['places'])) {
//                            echo "Steder = CHECK <br>";
//                        }


                        $params = [
                            'body' => [
                                'size' => $per_page,
                                'from' => ($per_page * $page),
                                'query' => [
                                   'bool' => [
                                       'should' => [
                                           [ 'match' => ['category' => $searchtxt] ],
                                           [ 'match' => ['tags' => $searchtxt] ]
                                       ]
                                   ]
                               ]
                           ]
                        ];

                        $response = $es->search($params);

                        if($response['hits']['total'] >= 1) {
                            $results = $response['hits']['hits'];
                        }

                        echo "
                            <p>Ditt søk etter $searchtxt ga ".$response['hits']['total']." resultater </p><br>
                            <div class=\"category_filter text-uppercase\">
                                <ul>
                                    <li class=\"active\" data-filter=\"*\">Alle</li>
                                    <li data-filter=\".nyheter\">Nyheter</li>
                                    <li data-filter=\".kultur\">Kultur</li>
                                    <li data-filter=\".sport\">Sport</li>
                                    <li data-filter=\".steder\">Steder</li>
                                </ul>
                            </div>
                        ";

                        echo "
                            <div class='category_items'>
                                <div class='grid-sizer'></div>
                        ";

                        foreach($results as $image) {
                            $category = $image['_source']['category'];
                            $url = $image['_source']['url'];
                            $width = $image['_source']['width'];
                            $dbnr = $image['_id'];

                            echo "
                                <a href='?side=bilde&id=$dbnr' style='text-decoration: none;'>
                                    <div class='single_pictures $category'>
                                        <img class='lazy' data-original='$url' width='$width' height='100'>
                                    </div>
                                </a>";
                        }

                        echo "
                            </div>
                        ";
                    }
                ?>
        </div>
    </section>
    <br style="clear: both;">
    <br>
    <div class='loader'>
        <?php
            if($page < 1) {
                echo "<a href='?side=resultat&q=$searchtxt&page=".($page + 1)."' id='btn' style='padding: 0 50px;'>Se flere</a>";
            }
            else {
                echo"
                    <a href='?side=resultat&q=$searchtxt&page=".($page - 1)."' id='btn' style='padding: 0 50px;'>Gå tilbake</a>
                    <a href='?side=resultat&q=$searchtxt&page=".($page + 1)."' id='btn' style='padding: 0 50px;'>Se flere</a>
                ";
            }
        ?>
    </div>
    <p class="messages"></p>
</div>

<script>
    $(window).keydown(function(e) {
        var page = <?php echo $page; ?>;
        if(page < 1) {
            if(e.keyCode == 39) {
                window.location.href = "?side=resultat&q=<?php echo $searchtxt; ?>&page=<?php echo ($page+1);?>";
            }
        }
        else {
            if(e.keyCode == 39) {
                window.location.href = "?side=resultat&q=<?php echo $searchtxt; ?>&page=<?php echo ($page+1);?>";
            }
            if(e.keyCode == 37) {
                window.history.back();
            }
        }
    });
</script>