<?php
    include('searchfield.php');
    $searchtxt = $_POST['searchInput'];
?>


<br>
<div class="row">
    <div class="col-12">
        <div style="width: 100%; min-height: 800px; background: #FFF;">
            <section id="pictures" class="pictures_area">
                <div class="container">
                    <br>
                        <?php

                        if(!empty($searchtxt)) {
                            $sql = "SELECT id, url, thumb_w FROM images WHERE picturetext LIKE '%$searchtxt%' OR filename LIKE '%$searchtxt%';";
                            $result = mysqli_query($connect, $sql) or die("Kunne ikke sende spørring til DB ". mysqli_error($connect));
                            $rows = mysqli_num_rows($result);

                            if($rows < 1) {
                                echo "<p style='background: #ffffcc; color: #FF0000; padding: 20px;'>Vi klarte dessverre ikke finne noen bilder på ditt søk! <br> Prøv med et annet søkeord</p>";
                            }
                            else {
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
                                <div class="category_items">
                                    <div class="grid-sizer"></div>
                                ';
                                for ($i = 0; $i < $rows; $i++) {
                                    $row = mysqli_fetch_array($result);
                                    $id = $row['id'];
                                    $url = $row['url'];
                                    $width = $row['thumb_w'];
                                    $categoryID = rand(0, 3);
                                    $category = array("nyheter", "kultur", "sport", "steder");

                                    echo "
                                    <a href='?side=bilde&id=$id'>
                                        <div class='single_pictures $category[$categoryID]'>
                                            <img class='lazy' data-original='$url' width='$width' height='100'>
                                        </div>
                                    </a>
                                    ";
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>