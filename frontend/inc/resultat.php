<?php include('searchfield.php'); ?>
<br>
<article>
    <div class="row">
        <div class="col-12">
            <div style="width: 100%; background: #FFF;">
                <br>
                <br>
                <div style="width: 950px; height: 150px; text-align: center; margin: 0 auto; background: #CCC;"><br><br>Annonse
                    her som vises uansett om du har adblock eller ikke
                </div>
                <br>
                <br>
                <section id="portfolio" class="portfolio_area">
                    <div class="container">
                        <div class="portfolio_filter text-uppercase">
                            <ul>
                                <li class="active" data-filter="*">Alle</li>
                                <li data-filter=".web-design">Kategori 1</li>
                                <li data-filter=".graphic">Kategori 2</li>
                                <li data-filter=".photography">Kategori 3</li>
                                <li data-filter=".motion-video">Kategori 4</li>
                            </ul>
                        </div>
                        <div class="portfolio_items">
                            <div class="grid-sizer"></div>
                            <?php
                                $antall = 21;
                                for ($i = 0; $i < $antall; $i++) {
                                    $random = rand(50, 300);
                                    $categoryID = rand(0, 3);
                                    $category = array("web-design", "graphic", "photography", "motion-video");

                                    echo "
                                        <div class='single_item $category[$categoryID]'>
                                            <img src='http://placehold.it/$random.x100'>
                                        </div>
                                    ";
                                }
                            ?>
                        </div>
                    </div>
                </section>
                <br><br><br>
            </div>
        </div>
    </div>
</article>