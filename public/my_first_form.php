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
	</p>
	<p>
		<input type="submit" value="send">
	</p>





</body>
</html>

