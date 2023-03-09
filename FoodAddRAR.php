<!-- Admin adding a food item -->

<html>

	<head>
		<title>Add Food Item Page</title>
	</head>
	
	<body>
		<form method='post' action='FoodAddRAR.php'>
			<pre>
			Food Name: <input type='text' name='foodname'>
			<input type ='submit' value='Add'>
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
if(isset($_POST['foodname'])) 
{
	//Get data from POST object
	$foodname = mysql_entities_fix_string($conn, $_POST['foodname']);
	
	$query = "INSERT INTO food_item (food_name) VALUES ('$foodname')";
	
	//echo $query.'<br>';
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	//Forward to main member home page
	header("Location: FoodPageRAR.php");
		
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