<?php include('searchfield.php'); ?>
<br>
<div class="row">
    <div class="col-12">
        <div style="width: 100%; min-height: 800px; background: #FFF;">
            <br>
            <br>
            <div style="width: 950px; height: 150px; text-align: center; margin: 0 auto; background: #CCC;"><br><br>Annonse
                her som vises uansett om du har adblock eller ikke
            </div>
            <br>
            <br>
            <section id="pictures" class="pictures_area">
                <div class="container">
                    <div class="category_filter text-uppercase">
                        <ul>
                            <li class="active" data-filter="*">Alle</li>
                            <li data-filter=".category1">Kategori 1</li>
                            <li data-filter=".category2">Kategori 2</li>
                            <li data-filter=".category3">Kategori 3</li>
                            <li data-filter=".category4">Kategori 4</li>
                        </ul>
                    </div>
                    <div class="category_items">
                        <div class="grid-sizer"></div>
                        <?php
                        $antall = 40;
                        for ($i = 0; $i < $antall; $i++) {
                            $random = rand(50, 300);
                            $categoryID = rand(0, 3);
                            $category = array("category1", "category2", "category3", "category4");

                            echo "
                                    <div class='single_pictures $category[$categoryID]'>
                                        <img class='lazy' data-original='http://placehold.it/$random.x100' width='$random' height='100'>
                                    </div>
                                    ";
                        }
                        ?>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>