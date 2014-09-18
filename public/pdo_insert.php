<?php
// Get new instance of PDO object
$dbc = new PDO('mysql:host=127.0.0.1;dbname=codeup_pdo_test_db', 'codeup', 'codeuprocks');

// Tell PDO to throw exceptions on error
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




$query = 'CREATE TABLE national_parks (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	name VARCHAR (250) NOT NULL,
	location VARCHAR(250) NOT NULL,
	date_established DATE NOT NULL,
	area_in_acres DECIMAL(8,2) NOT NULL,
	PRIMARY KEY (id)
)';


// Run query, if there are errors they will be thrown as PDOExceptions
$dbc->exec($query);



$parks = [

	['name' => 'Arches', 'location' => 'Utah', 'date_established' => '1971-11-12', 'area_in_acres' => 76518.98],
	['name' => 'Badlands', 'location' => 'South Dakota', 'date_established' => '1978-11-10', 'area_in_acres' => 242755.94],
	['name' => 'Big Bend', 'location' => 'Texas', 'date_established' => '1944-06-12', 'area_in_acres' => 801163.21],
	['name' => 'Biscayne', 'location' => 'Florida', 'date_established' => '1980-06-28', 'area_in_acres' => 172924.07],
	['name' => 'Black Canyon', 'location' => 'Utah', 'date_established' => '1928-02-25', 'area_in_acres' => 32950.03],
	['name' => 'Canyonlands', 'location' => 'Utah', 'date_established' => '1964-09-12', 'area_in_acres' => 337597.83],
	['name' => 'Capitol Reef', 'location' => 'Utah', 'date_established' => '1971-12-18', 'area_in_acres' => 241904.26],
	['name' => 'Carlsbad Caverns', 'location' => 'California', 'date_established' => '1930-05-14', 'area_in_acres' => 46766.45],
	['name' => 'Channel Islands', 'location' => 'California', 'date_established' => '1980-04-05', 'area_in_acres' => 249561.00],
	['name' => 'Congaree', 'location' => 'South Carolina', 'date_established' => '2003-11-10', 'area_in_acres' => 26545.86],
];


foreach ($parks as $park) {
    $query = "INSERT INTO national_parks (name, location, date_established, area_in_acres) VALUES ('{$park['name']}', '{$park['location']}', '{$park['date_established']}', '{$park['area_in_acres']}')";
    // referencing the query above
    $dbc->exec($query);

    echo "Inserted ID: " . $dbc->lastInsertId() . PHP_EOL;
}


?>