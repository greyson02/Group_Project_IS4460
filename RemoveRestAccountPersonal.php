<?php

//import credentials for db
require_once  'RARDB-directory.php';
require_once 'checksession2.php';

//connect to db
$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_GET['rest_id']))
{
	$rest_id = $_GET['rest_id'];

	$query = "DELETE FROM restaurants WHERE rest_id='$rest_id' ";
	
	//Run the query
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	//Return to the viewAllClassics page
	header("Location: RestViewAccountRAR.php");
	
}


?>