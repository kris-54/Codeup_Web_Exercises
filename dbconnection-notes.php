<?php

// Get new instance of PDO object
$dbc = new PDO('mysql:host=127.0.0.1;dbname=codeup_pdo_test_db', 'codeup', 'codeuprocks');

// Tell PDO to throw exceptions on error
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Create the query and assign to var
$query = 'CREATE TABLE users (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	email VARCHAR(240) NOT NULL,
	name VARCHAR(50) NOT NULL,
	PRIMARY KEY (id)
)';

// Run query, if there are errors they will be thrown as PDOExceptions
$dbc->exec($query);

$query = "INSERT INTO users (email, name) VALUES ('ben@codeup.com', 'Ben Batschelet')";

$numRows = $dbc->exec($query);
echo "Inserted $numRows row." . PHP_EOL;


$users = [
	['email' => 'jason@codeup.com',   'name' => 'Jason Straughan'],
	['email' => 'chris@codeup.com',   'name' => 'Chris Turner'],
	['email' => 'michael@codeup.com', 'name' => 'Michael Girdley']
];

foreach ($users as $user) {
	$query = "INSERT INTO users (email, name) VALUES ('{$user['email']}', '{$user['name']}')";
	// referencing the query above
	$dbc->exec($query);

	echo "Inserted ID: " . $dbc->lastInsertId() . PHP_EOL;
}


$stmt = $dbc->query('SELECT id, name, email FROM users');

echo "Columns: " . $stmt->columnCount() . PHP_EOL;
echo "Rows: " . $stmt->rowCount() . PHP_EOL;


$stmt = $dbc->query('SELECT * FROM users');

echo "Columns: " . $stmt->columnCount() . PHP_EOL;
while ($row = $stmt->fetch()) {
	print_r($row);
}

prints out
Columns: 3
Array
(
	[id] => 1
	[0] => 1
	[email] => ben@codeup.com
	[1] => ben@codeup.com
	[name] => Ben Batschelet
	[2] => Ben Batschelet
)
Array
(
	[id] => 2
	[0] => 2
	[email] => jason@codeup.com
	[1] => jason@codeup.com
	[name] => Jason Straughan
	[2] => Jason Straughan
)
Array
(
	[id] => 3
	[0] => 3
	[email] => chris@codeup.com
	[1] => chris@codeup.com
	[name] => Chris Turner
	[2] => Chris Turner
)
Array
(
	[id] => 4
	[0] => 4
	[email] => michael@codeup.com
	[1] => michael@codeup.com
	[name] => Michael Girdley
	[2] => Michael Girdley
)

$stmt = $dbc->query('SELECT * FROM users');

print_r($stmt->fetch());
print_r($stmt->fetch(PDO::FETCH_ASSOC));
print_r($stmt->fetch(PDO::FETCH_NUM));
print_r($stmt->fetch(PDO::FETCH_BOTH));


function getUsers($dbc) {
	// Bring the $dbc variable into scope somehow

	$stmt = $dbc->query('SELECT * FROM users');

	$rows = array();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$rows[] = $row;
	}

	return $rows;
}

var_dump(getUsers($dbc));

 does the same as above function but with only one line
function getUsers($dbc) {

	return $dbc->query('SELECT * FROM users')->fetchAll(PDO::FETCH_ASSOC);
}



$stmt = $dbc->query('SELECT count(*) FROM users');

echo 'There are ' . $stmt->fetchColumn() . ' users in our database' . PHP_EOL;


var_dump(getUsers($dbc));

