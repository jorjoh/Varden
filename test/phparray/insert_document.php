<?php
    ini_set('max_execution_time', 2400); //600 seconds = 10 minutes
    ini_set('memory_limit', '-1');
    require_once ('app/init.php');
    include('images.php');

    $number = 0;

    foreach($images as $item) {
        $number++;
        $thumb_url = "../frontend/uploads/thumbnails/".$item['file'].".jpg";
        $time_taken = date('Y-m-d H:i:s', $item['datenew']);
        $photographer = $item['photograph'];
        $bildeid = $item['id'];
        $tittel = $item['category'];
        $place = $item['location'];
        $thumb_width = $item['w_thumb'];

        $indexed = [
            'index' => 'images',
            'type' => 'image',
            'id' => $number,
            'body' => [
                'picture_id' => $bildeid,
                'title' => $tittel,
                'category' => $tittel,
                'photographer' => $photographer,
                'time_taken' => $time_taken,
                'place' => $place,
                'width' => $thumb_width,
                'url' => $thumb_url
            ]
        ];

        $response = $es->index($indexed);

        if($response) {
            print_r($indexed);
        }
/*
        echo "------------ START INFO --------------- <br>";
        echo "id = $bildeid <br>";
        echo "tittel = $tittel <br>";
        echo "Kategori = $tittel <br>";
        echo "photographer = $photographer <br>";
        echo "datenew = $time_taken <br>";
        echo "Sted = $place <br>";
        echo "Bredde = $thumb_width <br>";
        echo "url = $thumb_url <br>";
        echo "------------ SLUTT INFO ---------------<br>";
*/
    }

?>