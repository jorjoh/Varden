<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 5/3/2016
 * Time: 8:40 PM
 */

require_once 'vendor/autoload.php';

$es = new Elasticsearch\Client([
    'hosts' => ['134.213.218.27:9200']
]);
