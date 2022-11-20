<?php
require 'vendor/autoload.php';

$client = new MongoDB\Client;
$companydb = $client->companydb;
$empcollection = $companydb->empcollection;

$documentlist = $empcollection->find(
    ['skill' => 'mongoDB']
);

foreach($documentlist as $doc){
    var_dump($doc);
}

// $document = $empcollection->findOne(
//     ['_id'=> '1']
// );
// var_dump($document);

?>