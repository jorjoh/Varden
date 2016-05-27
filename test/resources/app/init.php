<?php

require_once 'vendor/autoload.php';

$es = new Elasticsearch\Client([
    'hosts' => ['134.213.218.27:9200']
]);
