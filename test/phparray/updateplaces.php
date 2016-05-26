<?php
    include('functions/dbcon.php');
    require_once('app/init.php');
    $imagesql = "SELECT id, place_id FROM images;";
    $imagesquery = mysqli_query($connect, $imagesql) or die(mysqli_error($connect));
    $nbrofrows = mysqli_num_rows($imagesquery);

    $placeparams = [
        'search_type' => 'scan',
        'scroll' => '1m',
        'body' => [
            'size' => 10000,
            'from' => 0,
            'query' => [
                "match_all" => []
            ]
        ]
    ];

    $response = $es->search($placeparams);
    $scroll_id = $response['_scroll_id'];

    while(true) {
        $response = $es->scroll([
            "scroll_id" => $scroll_id,
            "scroll" => "30s"
        ]);

        $number = 0;

        if(count($response['hits']['hits']) > 0) {
            $results = $response['hits']['hits'];
            foreach($results as $document) {
                $number++;
                $imagemeta = mysqli_fetch_array($imagesquery);

                $image_id = $imagemeta['id'];
                $image_place_id = $imagemeta['place_id'];
                $document_place_name = $document['_source']['place'];
                $document_id = $document['_id'];

                if($document_id = $image_id) {
                    if($document_place_name == '') {
                        $document_place_name = 'Porsgrunn';
                    }
                    $place_id_sql = "SELECT id FROM place WHERE name = '$document_place_name';";
                    $place_id_query = mysqli_query($connect, $place_id_sql) or die(mysqli_error($connect));
                    $place_id_row = mysqli_fetch_array($place_id_query);
                    $new_place_id = $place_id_row['id'];
                    if($new_place_id == '') {
                        $new_place_id = 1141;
                    }
                    $updatesql = "UPDATE images SET place_id = $new_place_id WHERE id = $document_id;";
                    echo $updatesql."<br>";
                    mysqli_query($connect, $updatesql) or die(mysqli_error($connect));
                    echo "Vellykket <br>";
                }
            }
            echo $number;
            $scroll_id = $response['_scroll_id'];
        }
        else {
            break;
        }
    }
?>