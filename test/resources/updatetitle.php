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
            $document_category_name = $document['_source']['category'];
            $document_id = $document['_id'];

            if($document_id = $image_id) {
                if($document_category_name == '') {
                    $document_category_name = 'Sport';
                }
                $updatesql = "UPDATE images SET title = '$document_category_name' WHERE id = $document_id;";
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