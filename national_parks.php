<?php

// Create a page that lists the national parks from your database. 
// On each page load, it should retrieve all records from the database and display them.

require '../dbc.php';

$stmt = $dbc->query('SELECT name, location, area_in_acres, date_established FROM national_parks');
$parks = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<html>
<head>
	<title>National Parks</title>
</head>
<body>

	<h1>National Parks</h1>
    
    <ul>
    <?php foreach($parks as $park) : ?>
            <li>$park['name']</li> 
     		<li>$park['location']</li> 
     		<li>$park['date_established']</li> 
     		<li>$park['area_in_acres']</li>         
    <?php endforeach; ?>	n       
    </ul>
	    


</body>
</html>





