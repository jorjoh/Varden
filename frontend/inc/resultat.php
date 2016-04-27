<div style="padding-top: 7%;"
<?php
    $searchquery = $_SESSION['searchtxt'];
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
                        if($page == $total_pages) {
                            echo '
                                Ditt søk etter "'.$searchtxt.'" ga '. $nbrofrows.' resultater <br>
                                Viser resultat: '.($start_from + 1). " - ".$nbrofrows.'  av totalt '. $nbrofrows .' bilder<br>
                            ';
                        }
                        else if($page == 1) {
                            echo '
                                Ditt søk etter "'.$searchtxt.'" ga '. $nbrofrows.' resultater <br>
                                Viser resultat: '.($start_from + 1) . " - ".$per_page * $page.'  av totalt '. $nbrofrows .' bilder<br>
                            ';
                        }
                        else {
                            echo '
                            Ditt søk etter "'.$searchtxt.'" ga '. $nbrofrows.' resultater <br>
                            Viser resultat: '.($start_from + 1). " - ".$per_page * $page.'  av totalt '. $nbrofrows .' bilder<br>
                            ';
                        }
                        echo '
                        <!-- <div style="width: 950px; height: 150px; text-align: center; margin: 0 auto; background: #CCC;"><br><br>Annonse
                            her som vises uansett om du har adblock eller ikke
                        </div> -->
                        <br>
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
                        if($page == 1 && $total_pages > 1) {
                            echo '<a href="?side=resultat&query='.$searchtxt.'&page='.($page + 1).'"><button style="position: absolute; right: 25px; top: 40%;" id="paginationbtn"> &gt; </button></a>';
                        }
                        else if($page == $total_pages && $total_pages > 1) {
                            echo '<a href="?side=resultat&query='.$searchtxt.'&page='.($page - 1).'"><button style="position: absolute; left: 25px; top: 40%;" id="paginationbtn">&lt;</button></a>';
                        }
                        else {
                            if($total_pages > 1) {
                                echo '<a href="?side=resultat&query='.$searchtxt.'&page='.($page - 1).'"><button style="position: absolute; left: 25px; top: 40%;" id="paginationbtn">&lt;</button></a>
                                <a href="?side=resultat&query='.$searchtxt.'&page='.($page + 1).'"><button style="position: absolute; right: 25px; top: 40%;" id="paginationbtn"> &gt; </button></a>
                                ';
                            }
                        }

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
                        ";
                    }
                }
                ?>
        </div>
    </section>
</div>