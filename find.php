<?php
require 'vendor/autoload.php';

$client = new MongoDB\Client;
$dbResto = $client->dbResto;
$empcollection = $dbResto->colResto;

$documentlist = $empcollection->find(
    ['borough' => 'Bronx'],
    ['limit' => 2]
);

foreach($documentlist as $doc){
    var_dump($doc);
}
printf("Matched %d documents \n", $documentlist->getMatchedCount());

// $document = $empcollection->findOne(
//     ['_id'=> '1']
// );
// var_dump($document);

?>