<?php

//import credentials for db
require_once  'RARDB-directory.php';
require_once 'checksession2.php';

//connect to db
$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_GET['member_id']))
{
	$member_id = $_GET['member_id'];

	$query = "DELETE FROM member WHERE member_id='$member_id' ";
	
	//Run the query
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	//Return to the viewAllClassics page
	header("Location: MemViewAccountPersonalRAR.php");
	
}


?>