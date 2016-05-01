<div style="padding-top: 7%;"></div>
<?php
    //$searchquery = $_SESSION['searchtxt'];
    include('searchfield.php');
    $searchtxt = mysqli_real_escape_string($connect, $_GET['query']);
    $page = intval($_GET['page']);
    //En sjekk for at sidenr ikke er tomt
    if(empty($page) || $page = 0) {
        $page = 1;
    }
    else {
        $page = intval($_GET['page']);
    }
    $per_page = 50; // Antall bilder per side
    $start_from = ($page - 1) * $per_page; // Regner ut hvor den skal starte limiten i LIMIT delen i SQL setningen
?>


<br>
<div id="subpage-bg">
    <section id="pictures" class="pictures_area">
        <div class="container">
            <br>
                <?php

                    if(!empty($searchtxt)) {
                        $sql = "SELECT id, thumb_url, thumb_w FROM images WHERE picturetext LIKE '%$searchtxt%' OR filename LIKE '%$searchtxt%' LIMIT $start_from, $per_page;";
                        $query = "SELECT count(id) AS nbr FROM images WHERE picturetext LIKE '%$searchtxt%' OR filename LIKE '%$searchtxt%';";
                        $result = mysqli_query($connect, $sql) or die("Kunne ikke sende spørring til DB ". mysqli_error($connect));
                        $nbrresult = mysqli_query($connect, $query) or die ('Kunne ikke telle antall treff'. mysqli_error($connect));
                        $rows = mysqli_num_rows($result);
                        $totalrows = mysqli_fetch_array($nbrresult);
                        $nbrofrows = $totalrows['nbr'];
                        $total_pages = ceil($nbrofrows / $per_page); // Runder av til nærmeste hele sidetallet

                        if($rows < 1) {
                            echo "<p style='background: #ffffcc; color: #FF0000; padding: 20px;'>Vi klarte dessverre ikke finne noen bilder på ditt søk! <br> Prøv med et annet søkeord</p>";
                        }
                        else {
                            echo '
                            <!-- <div style="width: 950px; height: 150px; text-align: center; margin: 0 auto; background: #CCC;"><br><br>Annonse
                                her som vises uansett om du har adblock eller ikke
                            </div> -->
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
                            $category = array("nyheter", "kultur", "sport", "steder");
                            while($row = mysqli_fetch_array($result)) {
                                $id = $row['id'];
                                $url = $row['thumb_url'];
                                $width = $row['thumb_w'];
                                $categoryID = rand(0, 3);

                                echo "
                                <a href='?side=bilde&id=$id'>
                                    <div class='single_pictures $category[$categoryID]'>
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

                        ?>
                        <script>
                            $(document).ready(function() {
                                var load = 0;
                                var nbr = <?php echo $nbrofrows; ?>;
                                var queryword = "<?php echo $searchtxt; ?>";
                                if (load * 2 > nbr) {
                                    $('.loader').hide();
                                } else {
                                    $('#btn').click(function () {
                                        load++;
                                        $.ajax({
                                                method: 'POST',
                                                url: 'inc/functions/ajax.php',
                                                data: {
                                                    load: load,
                                                    searchtxt: queryword
                                                },
                                            })
                                            .done(function (data) {
                                                $('.pictures_area').append(data);
                                            });
                                    });
                                }
                            });
                        </script>
                        <?php
                    }
                ?>
        </div>
    </section>
    <br style="clear: both;">
    <br>
    <div class='loader'>
        <a id='btn' style='padding: 0 50px;'>Se flere</a>
    </div>
</div>