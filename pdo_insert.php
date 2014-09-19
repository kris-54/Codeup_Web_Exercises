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
    description TEXT  NOT NULL,
    PRIMARY KEY (id)
)';


// Run query, if there are errors they will be thrown as PDOExceptions
$dbc->exec($query);




$parks = [

    ['name' => 'Arches', 'location' => 'Utah', 'date_established' => '1971-11-12', 'area_in_acres' => 76518.98, 'description' => 'This site features more than 2,000 natural sandstone arches, including the famous Delicate Arch. In a desert climate, millions of years of erosion have led to these structures, and the arid ground has life-sustaining soil crust and potholes, which serve as natural water-collecting basins.'],
    ['name' => 'Badlands', 'location' => 'South Dakota', 'date_established' => '1978-11-10', 'area_in_acres' => 242755.94, 'description' => 'The Badlands are a collection of buttes, pinnacles, spires, and grass prairies. It has the worlds richest fossil beds from the Oligocene epoch, and the wildlife includes bison, bighorn sheep, black-footed ferrets, and swift foxes.'],
    ['name' => 'Big Bend', 'location' => 'Texas', 'date_established' => '1944-06-12', 'area_in_acres' => 801163.21, 'description' => 'Named for the prominent bend in the Rio Grande along the US–Mexico border, this park encompasses a large and remote part of the Chihuahuan Desert.'],
    ['name' => 'Biscayne', 'location' => 'Florida', 'date_established' => '1980-06-28', 'area_in_acres' => 172924.07, 'description' => 'Located in Biscayne Bay, this park at the north end of the Florida Keys has four interrelated marine ecosystems: mangrove forest, the Bay, the Keys, and coral reefs.'],
    ['name' => 'Black Canyon', 'location' => 'Utah', 'date_established' => '1928-02-25', 'area_in_acres' => 32950.03, 'description' => 'The park protects a quarter of the Gunnison River, which slices sheer canyon walls from dark Precambrian-era rock. The canyon features incredibly steep descents, and is a popular site for river rafting and rock climbing.'],
    ['name' => 'Canyonlands', 'location' => 'Utah', 'date_established' => '1964-09-12', 'area_in_acres' => 337597.83, 'description' => 'This landscape was eroded into a maze of canyons, buttes, and mesas by the combined efforts of the Colorado River, Green River, and their tributaries, which divide the park into three districts.'],
    ['name' => 'Capitol Reef', 'location' => 'Utah', 'date_established' => '1971-12-18', 'area_in_acres' => 241904.26, 'description' => 'The parks Waterpocket Fold is a 100-mile (160 km) monocline that exhibits the Earths diverse geologic layers. '],
    ['name' => 'Carlsbad Caverns', 'location' => 'California', 'date_established' => '1930-05-14', 'area_in_acres' => 46766.45,'description' => 'Carlsbad Caverns has 117 caves, the longest of which is over 120 miles (190 km) long.'],
    ['name' => 'Channel Islands', 'location' => 'California', 'date_established' => '1980-04-05', 'area_in_acres' => 249561.00,'description' => 'Five of the eight Channel Islands are protected, and half of the parks area is underwater. The islands have a unique Mediterranean ecosystem originally settled by the Chumash people.'],
    ['name' => 'Congaree', 'location' => 'South Carolina', 'date_established' => '2003-11-10', 'area_in_acres' => 26545.86,'description' => 'On the Congaree River, this park is the largest portion of old-growth floodplain forest left in North America.'],
];

$stmt = $dbc->prepare('INSERT INTO national_parks (name, location, date_established, area_in_acres, description) VALUES (:name, :location, :date_established, :area_in_acres, :description)');

foreach ($parks as $park) {
    $stmt->bindValue(':name', $park['name'], PDO::PARAM_STR);
    $stmt->bindValue(':location', $park['location'], PDO::PARAM_STR);
    $stmt->bindValue(':date_established', $park['date_established'], PDO::PARAM_STR);
    $stmt->bindValue(':area_in_acres', $park['area_in_acres'], PDO::PARAM_STR);
    $stmt->bindValue(':description', $park['description'], PDO::PARAM_STR);

    $stmt->execute();
}

?>