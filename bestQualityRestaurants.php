<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurants</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body style="margin: 50px;">
<div class="menu-bar">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                  <a class="navbar-brand" href="#"><img src="restaurant-logo-design-template_79169-56.webp"></a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto text-right">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.html">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="index.php">Restaurants</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="bestQualityRestaurants.php">Quality Restaurants</a>
                      </li>
                     </ul>
                  </div>
                </div>
              </nav>
        </div>
    </div>

    <h1>Quality Restaurants</h1>
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
            $client = new MongoDB\Client("mongodb+srv://phpCodeUser:HR2y8tQUSEfD4@restaurantcluster.hjdmnjz.mongodb.net/?retryWrites=true&w=majority");
            $dbResto = $client->dbResto;
            $restoCollection = $dbResto->colResto;
            $pipeline = [
                ['$match' => ['grades.score' => ['$gt' => 90]]],
                ['$project' => [
                    'name' => 1,
                    'restaurant_id' => 1,
                    'cuisine' => 1,
                    'grades' => 1,
                    'borough' => 1,
                    'address' => 1
                ]
            ],
            ];

            $documentlist = $restoCollection->aggregate(
                $pipeline
                //shows all restaurants with grades greater than 90
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