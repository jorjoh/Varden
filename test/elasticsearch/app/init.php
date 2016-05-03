<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 5/3/2016
 * Time: 8:40 PM
 */

require_once 'vendor/autoload.php';

$es = new Elasticsearch\Client([
    'hosts' => ['127.0.0.1:9200']
]);