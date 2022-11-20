<?php
require 'vendor/autoload.php';

$client = new MongoDB\Client;
$companydb = $client->companydb;
$empcollection = $companydb->empcollection;

$insertManyResult = $empcollection->insertMany([
    ['_id' => '2', 'name' => 'Brad', 'age' => '26', 'skill' => 'mongoDB'],
    ['_id' => '3', 'name' => 'Chris', 'age' => '30', 'skill' => 'node.js'],
    ['_id' => '4', 'name' => 'Debbie', 'age' => '22', 'skill' => 'angular'],
]);

// $insert1Result = $empcollection->insertOne(
//     [
//         '_id' => '1',
//         'name' => 'Andrew',
//         'age' => '26',
//         'skill' => 'mongoDB'
//     ]
// );

printf("Inserted %d documents", $insertManyResult->getInsertedCount());
var_dump($insertManyResult->getInsertedIds());
?>