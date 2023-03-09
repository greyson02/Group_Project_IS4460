<html>

	<head>
	
	</head>
	
	<body>
		<form method='post' action='AddRestPersonalRAR.php'>
			<pre>
				Restaurant Name: <input type='text' name='rest_name'>
				Restaurant Password: <input type='password' name='rest_password'>
				Address: <input type='text' name='address'>
				Phone: <input type='text' name='phone'>
				Email: <input type='text' name='email'>
				Owner Name: <input type='text' name='owner_name'>
				Premium: <select name='premium'>
					<option value='1'>1</option>
					<option value='0'>0</option>
					</select>
				<input type='submit' value='Add Restaurant'>
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
if(isset($_POST['rest_name']) && isset($_POST['rest_password'])) 
{

	$tmp_restname = mysql_entities_fix_string($conn, $_POST['rest_name']);
	$tmp_password = mysql_entities_fix_string($conn, $_POST['rest_password']);
	
	$token = password_hash($tmp_password, PASSWORD_DEFAULT);

	//Get data from POST object
	$address = mysql_entities_fix_string($conn, $_POST['address']);
	$phone = mysql_entities_fix_string($conn, $_POST['phone']);
	$email = mysql_entities_fix_string($conn, $_POST['email']);
	$owner_name = mysql_entities_fix_string($conn, $_POST['owner_name']);
	$premium = $_POST['premium'];	
	
	$query = "INSERT INTO restaurants (rest_name, address, phone, email, owner_name, premium_member, rest_password) VALUES ('$tmp_restname', '$address','$phone', '$email', '$owner_name', '$premium', '$token')";
	
	//echo $query.'<br>';
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	header("Location: RestViewAccountRAR.php");//this will return you to the view all page
		
}

//sanitization functions
function mysql_entities_fix_string($conn, $string){
	return htmlentities(mysql_fix_string($conn, $string));	
}

function mysql_fix_string($conn, $string){
	$string = stripslashes($string);
	return $conn->real_escape_string($string);
}


?>
