<?php
/**
 * Created by PhpStorm.
 * User: roed
 * Date: 28.04.2016
 * Time: 15.41
 */

$nbrofpictures = $_POST['nbrofpictures'];

$es->search([
    'size' => 50,
    'from' => $nbrofpictures,
    'body' => [
        'query' => [
            'bool' => [
                'should' => [
                    ['match' => ['category' => $searchtxt] ],
                    ['match' => ['title' => $searchtxt] ],
                ]
            ]
        ]
    ]
]);

if($esquery['hits']['total'] >= 1) {
    $esresults = $esquery['hits']['hits'];
}

foreach($esresults as $image) {
    $category = $image['_source']['category'];
    $url = $image['_source']['url'];
    $width = $image['_source']['width'];
    $dbnr = $image['_id'];

    echo '
    <a href="?side=bilde&id='.$dbnr.'">
        <div class="single_pictures '. $category .'">
            <img class="lazy" data-original="'.$url.'" width="'.$width.'" height="100">
        </div>
    </a>
    ';
}