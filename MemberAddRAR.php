<!-- Admin adding a member -->

<html>

	<head>
		<title>Add Member Page</title>
	</head>
	
	<body>
		<form method='post' action='MemberAddRAR.php'>
			<pre>
			First Name: <input type='text' name='firstname'>
			Last Name: <input type='text' name='lastname'>
			Username: <input type='text' name='username'>
			Password: <input type='password' name='password'>
			Email: <input type='text' name='email'>
			Phone Number: <input type='text' name='phone'>
			<input type ='submit' value='Register'>
			</pre>
		</form>
	</body>
	
</html>

<?php
//import credentials for db
require_once  'RARDB-directory.php';
require_once 'checksession2.php';

//connect to db
$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

//check if ISBN exists
if(isset($_POST['username'], $_POST['password'], $_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['phone'])) 
{
	//Get data from POST object
	$firstname = mysql_entities_fix_string($conn, $_POST['firstname']);
	$lastname = mysql_entities_fix_string($conn, $_POST['lastname']);
	$username = mysql_entities_fix_string($conn, $_POST['username']);
	$password = mysql_entities_fix_string($conn, $_POST['password']);
	$email = mysql_entities_fix_string($conn, $_POST['email']);
	$phone = mysql_entities_fix_string($conn, $_POST['phone']);
	$role = "member";
	
	$token = password_hash($password, PASSWORD_DEFAULT);
	
	$query = "INSERT INTO member (first_name, last_name, user_name, password, email, phone, role) VALUES ('$firstname', '$lastname','$username', '$token', '$email', '$phone', '$role')";
	
	//echo $query.'<br>';
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	//Forward to main member home page
	header("Location: MemberPageRAR.php");
		
}

$conn->close();

function mysql_entities_fix_string($conn, $string){
	return htmlentities(mysql_fix_string($conn, $string));	
}

function mysql_fix_string($conn, $string){
	$string = stripslashes($string);
	return $conn->real_escape_string($string);
}

?>