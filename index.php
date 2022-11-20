<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurants</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body style="margin: 50px;">
    <h1>List of Restaurants</h1>
    <br>
    <table class="table">
        <thead>
            <tr>
            <th>Name</th>
            <th>Restaurant ID</th>
            <th>Cuisine</th>
            <th>Grade</th>
            <th>Borough</th>
            <th>Address</th>
            </tr>
        </thead>

        <tbody>
            <?php
            //PHP-MongoDB connection dbResto-colResto
            require 'vendor/autoload.php';
            $client = new MongoDB\Client;
            $dbResto = $client->dbResto;
            $restoCollection = $dbResto->colResto;

            $documentlist = $restoCollection->find(
                // ['borough' => 'Bronx']
            );

            foreach($documentlist as $doc){
                foreach($doc['grades'] as $grades){
            ?>
                <tr>
                    <td>
                        <?= $doc['name'] ?>
                    </td>
                    <td>
                        <?= $doc['restaurant_id'] ?>
                    </td>
                    <td>
                        <?= $doc['cuisine'] ?>
                    </td>
                    <td>
                        <?= $doc['grades'][0]['date'] ?>
                        <br>
                        <?= $doc['grades'][0]['grade'] ?>
                        <br>
                        <?= $doc['grades'][0]['score'] ?>
                        <br>
                        
                    </td>
                    <td>
                        <?= $doc['borough'] ?>
                    </td>
                    <td>
                        <?= $doc['address']['building'] ?>
                        <br>
                        <?= $doc['address']['street'] ?>
                        <br>
                        <?= $doc['address']['zipcode'] ?>
                        <br>
                    </td>
                </tr>
                <?php
                }
            }
            ?>
        </tbody>
    </table>
    
</body>
</html>