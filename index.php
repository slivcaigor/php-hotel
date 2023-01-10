<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>PHP Hotel</title>

    <?php
    $parkingYes = $_GET['parkingYes'];
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
    <form>
        <div class="form-group">
            <label for="parkingYes">Show hotels with parking:</label>
            <!--  "onchange" con valore "this.form.submit()" indica che ogni volta che l'utente cambia lo stato della casella di controllo (seleziona o deseleziona), la form deve essere inviata automaticamente -->
            <!-- controllo condizionale "isset($parkingYes) ? 'checked' : ''"  verifica se la variabile $parkingYes esiste e se è impostata su true-->
            <input type="checkbox" name="parkingYes" id="parkingYes" value="1" onchange="this.form.submit()"
                <?php echo isset($parkingYes) ? 'checked' : '' ?>>
        </div>
    </form>
    <table class="table">
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
        // esegue un controllo condizionale che verifica se l'array di input "parkingYes" è stato impostato oppure no,  Se non c'è nessun valore impostato, allora la tabella verrà generata senza alcun filtro. In caso contrario verifica se l'hotel ha parcheggio, se è vero allora mostrerà l'hotel altrimenti non lo mostrerà
        if (!isset($parkingYes) || (isset($parkingYes) && $hotel['parking'])) {
        ?>
            <tr>
                <th scope="row"><?= $counter ?></th>
                <td><?= $hotel['name'] ?></td>
                <td><?= $hotel['description'] ?></td>
                <td><?= $hotel['parking'] ? "Available" : "Not available" ?></td>
                <td><?= $hotel['vote'] ?></td>
                <td><?= $hotel['distance_to_center'] ?></td>
            </tr>
            <?php 
            $counter++;
        }
    } 
    ?>
        </tbody>
    </table>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
    </script>
</body>

</html>