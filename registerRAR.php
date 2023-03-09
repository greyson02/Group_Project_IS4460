<html>
	<head></head>
	
	<body>
		<form method='post' action='registerRAR.php'>
			First Name: <input type='text' name='firstname'><br>
			Last Name: <input type='text' name='lastname'><br>
			Username: <input type='text' name='username'><br>
			Password: <input type='text' name='password'><br>
			Email: <input type='text' name='email'>
			Phone Number: <input type='text' name='phone'>
			<input type='submit' value='Register'>
		</form>
	</body>

</html>



<?php

require_once 'RARDB-directory.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_POST['username'])){

	$firstname = sanitizeMySQL($conn, $_POST['firstname']);
	$lastname = sanitizeMySQL($conn, $_POST['lastname']);
	$username = sanitizeMySQL($conn, $_POST['username']);
	$password = sanitizeMySQL($conn, $_POST['password']);
	$email = sanitizeMySQL($conn, $_POST['email']);
	$phone = sanitizeMySQL($conn, $_POST['phone']);
	$role = "member";
	
	//password_hash code here
	$token = password_hash($password, PASSWORD_DEFAULT);

	//code to add user here
	$query = "insert into member(first_name, last_name, user_name, password, email, phone, role) values ('$firstname', '$lastname', '$username', '$token', '$email', '$phone', '$role')";
	$result = $conn->query($query);
	if(!$result) die($conn->error);
}

$conn->close();

function sanitizeString($var){
	$var = stripslashes($var);
	$var = strip_tags($var);
	$var = htmlentities($var);
	return $var;
}

function sanitizeMySQL($conn, $var){
	$var = sanitizeString($var);
	$var = $conn->real_escape_string($var);
	return $var;
}

?>

<p><a href='logoutRAR.php'>Return to Login</a></p>
