<?php
	var_dump($_POST);
	
	var_dump($_GET);
?>

<html>
<head>
	<title>My First Form</title>
</head>
<body>
	<h1>User Login</h1>
	<form method="POST">
	<p>
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Enter username">
        <!-- name= is the KEY in the array -->
    </p>
    <p>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter password">
    </p>
    <p>
        <input type="submit" value="Login">
    </p>
	</form>

	<h1>Compose an Email</h1>
	<form method="POST">
	<p> 
		<label for="To">To</label>
		<input type="text" id="to" name="to">
	</p>
	<p>
		<label for="From">From</label>
		<input type="text" id="from" name="from">
	</p>
	<p>
		<label for="Subject">Subject</label>
		<input type="subject" id="subject" name="subject">
	</p>
	<p>
		<label for="Email">Email</label>
		<textarea id="email_body" name="email_body" rows="10" cols="40" placeholder="Content Here"></textarea>
		<label><input type="checkbox" name="copy" value="Yes" checked>Copy of Email</label>
		<input type="submit" value="send">
	</p>
	</form>
	
	<h2>Multiple Choice Questions</h2>
	<form method="POST">
	<p>
		Who is the best superhero?
	</p>
	<p>
		<label><input type="radio" id="q1a" name="q1" value="Superman">Superman</label>
		<label><input type="radio" id="q1b" name="q1" value="Superman">Superman</label>
		<label><input type="radio" id="q1c" name="q1" value="Superman">Superman</label>
		<label><input type="radio" id="q1d" name="q1" value="Superman">Superman</label>
	</p>

	<p>
		What is the best superhero power?
	</p>
	<p>
		<label><input type="radio" id="q2a" name="q2" value="x-ray vision">X-ray Vision</label>
		<label><input type="radio" id="q2b" name="q2" value="flying">Flying</label>
		<label><input type="radio" id="q2c" name="q2" value="super strength">super strength</label>
		<label><input type="radio" id="q2d" name="q2" value="mind control">mind control</label>
	</p>
	<p>
		Worst superhero movie?
	</p>
	<p>
		<label><input type="checkbox" name="q4[]" value="Yes">Dark Knight</label>
		<label><input type="checkbox" name="q4[]" value="Yes" checked>Green Lantern</label>
		<label><input type="checkbox" name="q4[]" value="Yes">Iron Man</label>
		<label><input type="checkbox" name="q4[]" value="Yes">Spider-Man</label>
	</p>
	
	<p>
		<label for="theme music">What is your superhero theme music like?</label>
		<select id="music" name="music[]" multiple>
		<option value="1">Rock</option>
		<option value="2">Rap</option>
		<option value="3">Country</option>
		<option value="4">Dance</option>
	</select>
	</p>

	<h2>Select Testing</h2>
	<form method="POST">
	<label for="codeup">Are you enjoying Codeup?</label>
	<select id="codeup" name="codeup[]">
		<option value="0">---Pick One---</option>
		<option value="1">YES!!</option>
		<option value="2" selected>Hell YES!</option>
		<option value="3">NO</option>
	</select>

	
	<input type="submit" value="Submit">
	</form>

</body>
</html>

