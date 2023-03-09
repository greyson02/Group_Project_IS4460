<?php

//import credentials for db
require_once  'RARDB-directory.php';
require_once 'checksession2.php';

//connect to db
$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_GET['follow_id']))
{
	$follow_id = $_GET['follow_id'];

	$query = "DELETE FROM follower WHERE follow_id = '$follow_id' ";
	
	//Run the query
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	//Return to the viewAllClassics page
	header("Location: RestViewFollowerRAR.php");
	
}

?>