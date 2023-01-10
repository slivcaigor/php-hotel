<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <title>PHP Hotel</title>

    <?php
    $isParking = $_GET['isParking'];
    $getVote = $_GET['getVote'];
    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];
    ?>
</head>

<body>
    <div class="ms_wrapper">
        <form class="d-flex justify-content-between mb-4">
            <div class="form-group fs-4">
                <label for="isParking">Show hotels with parking:</label>
                <!--  "onchange" con valore "this.form.submit()" indica che ogni volta che l'utente cambia lo stato della casella di controllo (seleziona o deseleziona), la form deve essere inviata automaticamente -->
                <!-- controllo condizionale "isset($isParking) ? 'checked' : ''"  verifica se la variabile $isParking esiste e se è impostata su true-->
                <input type="checkbox" name="isParking" id="isParking" value="1" onchange="this.form.submit()"
                    <?php echo isset($isParking) ? 'checked' : '' ?>>
            </div>
            <div class="form-group fs-4">
                <label for="getVote">Filter hotels by vote:</label>
                <input type="number" name="getVote" id="getVote" value="<?php echo isset($getVote) ? $getVote : '' ?>">
                <input class="ms_btn" type="submit" value="Filter">
            </div>
        </form>
        <table class="table table-striped table-success fs-5">
            <ul class="nav nav-tabs fs-5 fw-bold">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Hotels</a>
                </li>
                <li class="nav-item px-1">
                    <a class="nav-link active" href="#">Resorts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">Restaurants</a>
                </li>
            </ul>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Hotel Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Parking</th>
                    <th scope="col">Vote</th>
                    <th scope="col">Distance to center</th>
                </tr>
            </thead>
            <tbody>
                <?php
            // " $counter = 1;", inizializza un contatore utilizzato per numerare le righe della tabella.
            $counter = 1;
            foreach ($hotels as $hotel) {
                // esegue un controllo condizionale che verifica se l'array di input "isParking" è stato impostato oppure no,  Se non c'è nessun valore impostato, allora la tabella verrà generata senza alcun filtro. In caso contrario verifica se l'hotel ha parcheggio, se è vero allora mostrerà l'hotel altrimenti non lo mostrerà
                if (!isset($isParking) || (isset($isParking) && $hotel['parking'])) {
                    //verifica se esiste il getVote e se il valore del vote dell'hotel è maggiore o uguale del voto richiesto
                    if (!isset($getVote) || (isset($getVote) && $hotel['vote'] >= $getVote)) {
                        ?>
                <tr>
                    <th scope="row">
                        <?= $counter ?>
                    </th>
                    <td>
                        <?= $hotel['name'] ?>
                    </td>
                    <td>
                        <?= $hotel['description'] ?>
                    </td>
                    <td>
                        <?= $hotel['parking'] 
                    ? "Available" 
                    : "Not available" ?>
                    </td>
                    <td>
                        <?= $hotel['vote'] ?>
                    </td>
                    <td>
                        <?= $hotel['distance_to_center'] ?>
                    </td>
                </tr>
                <?php
            $counter++;
                    }
                }
            }
            ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
    </script>
</body>

</html>