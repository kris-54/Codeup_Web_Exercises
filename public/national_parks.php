<?php

require '../dbc.php';

// Create a page that lists the national parks from your database. 
// On each page load, it should retrieve all records from the database and display them.

// Modify your page to only load four parks at a time and add links to go the next or previous pages.

// Modify your query to load the appropriate parks given which page the user is on. 
// You should accept one or two parameters from $_GET and use them to load the appropriate parks.
$offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;

$stmt = $dbc->prepare("SELECT name, location, area_in_acres, date_established, description FROM national_parks LIMIT :num OFFSET :offset");
$stmt->bindValue(':num', 4, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$parks = $stmt->fetchALL(PDO::FETCH_ASSOC);

$count = $dbc->query('SELECT count(*) FROM national_parks');
$number = $count->fetchColumn();

$valid = FALSE;
if (isset($_POST)) {
    foreach ($_POST as $value ) {
        if (empty($value)) {
            $valid = FALSE;
            break;
        }
        else {
            $valid = TRUE;
        }
    }
}

if($valid) {
    $stmt = $dbc->prepare('INSERT INTO national_parks (name, location, area_in_acres, date_established, description) VALUES (:name, :location, :area_in_acres, :date_established, :description)');
    $stmt->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
    $stmt->bindValue(':location', $_POST['location'], PDO::PARAM_STR);
    $stmt->bindValue(':area_in_acres', $_POST['area_in_acres'], PDO::PARAM_STR);
    $stmt->bindValue(':date_established', $_POST['date_established'], PDO::PARAM_STR);
    $stmt->bindValue(':description', $_POST['description'], PDO::PARAM_STR);
    $stmt->execute();
}





?>


<html>
<head>
	<title>National Parks</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>

           
	<h1>National Parks</h1>


    <table class="table table-hover">
        <tr>
            <th>Name</th>
            <th>Location</th>
            <th>Date Established</th>
            <th>Acres</th>
            <th>Description</th>
        </tr>

        <? foreach ($parks as $park) : ?>
        <tr>
            <? foreach($park as $value) : ?>
                <td><?= $value ?></td>
            <?endforeach; ?>           
        </tr>
        <? endforeach; ?>  
             
    </table>

    <ul class="pager">
        <?php if($offset != 0):?>
            <li class="previous"><a href="?offset=<?=$offset-4?>" class='btn'>Previous</a></li>
        <?php endif;?>
        <?php if($offset + 4 < $number):?>
            <li class="next"><a href="?offset=<?=$offset + 4?>" class='btn'>Next</a></li>
        <?php endif;?>
    </ul>

    <form method='POST'action='national_parks.php'>
         <p>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Add Here">
        

            <label for="location">Location</label>
            <input type="text" id="location" name="location" placeholder="Add Here">

            <label for="date_established">Date Established</label>
            <input type="text" id="date_established" name="date_established" placeholder="Add Here">

            <label for="area_in_acres">Acres</label>
            <input type="text" id="area_in_acres" name="area_in_acres" placeholder="Add Here">

            <label for="description">Description</label>
            <textarea name="description" id='description' placeholder='description'></textarea>



            <input type="submit" value="Add">
        </p>



    </form>
	    


</body>
</html>





