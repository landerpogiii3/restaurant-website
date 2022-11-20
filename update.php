<?php
require 'vendor/autoload.php';

$client = new MongoDB\Client;
$companydb = $client->companydb;
$empcollection = $companydb->empcollection;

$replaceResult = $empcollection->replaceOne(
    ['_id' => '4'],
    ['_id' => '4', 'favColor' => 'blue']
);

printf("Matched %d documents \n", $replaceResult->getMatchedCount());
printf("Modified %d documents \n", $replaceResult->getModifiedCount());


// $updateResult = $empcollection->updateMany(
//     ['skill' => 'mongoDB'],
//     ['$set' => ['manager' => 'Tim']]
// );
// printf("Matched %d documents \n", $updateResult->getMatchedCount());
// printf("Modified %d documents \n", $updateResult->getModifiedCount());

// $updateResult = $empcollection->updateOne(
//     ['age' => '26'],
//     ['$set' => ['age' => '28']]
// );
// printf("Matched %d documents \n", $updateResult->getMatchedCount());
// printf("Modified %d documents \n", $updateResult->getModifiedCount());


?>