<?php
require 'vendor/autoload.php';

$client = new MongoDB\Client;
$companydb = $client->companydb;
$empcollection = $companydb->empcollection;

$documentlist = $empcollection->find([
    [],
    [
        'limit' => 2
    ]
]);

foreach($documentlist as $doc){
    var_dump($doc);
}

?>