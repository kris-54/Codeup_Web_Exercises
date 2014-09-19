<?php

require '../dbc.php';

// Create a page that lists the national parks from your database. 
// On each page load, it should retrieve all records from the database and display them.

// Modify your page to only load four parks at a time and add links to go the next or previous pages.

// Modify your query to load the appropriate parks given which page the user is on. 
// You should accept one or two parameters from $_GET and use them to load the appropriate parks.
$offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;



$stmt = $dbc->query("SELECT name, location, date_established, area_in_acres 
        FROM national_parks LIMIT 4 OFFSET $offset");

$parks = $stmt->fetchAll(PDO::FETCH_ASSOC);


$count = $dbc->query('SELECT count(*) FROM national_parks');
$number = $count->fetchColumn();




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

    
	    


</body>
</html>





