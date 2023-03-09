<?php

require_once 'RARDB-directory.php';
require_once 'checksession2.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_GET['rest_id'])){

$rest_id = $_GET['rest_id'];

$query = "SELECT * FROM follower JOIN restaurants ON follower.rest_id = restaurants.rest_id JOIN member ON follower.member_id = member.member_id WHERE restaurants.rest_id = '$rest_id'";

$result = $conn->query($query); 
if(!$result) die($conn->error);

$rows = $result->num_rows;

for($j=0; $j<$rows; $j++)
{
	//$result->data_seek($j); 
	$row = $result->fetch_array(MYSQLI_ASSOC); 

echo <<<_END
	
	<pre>
	Track ID: $row[follow_id]
	Restaurant ID: $row[rest_id]
	Restaurant Name: $row[rest_name]
	Follower: $row[user_name]
	<a href='RemoveFollowerRAR.php?follow_id=$row[follow_id]'>Remove Follower</a>
	</pre>
	
_END;

}

}

$conn->close();

?>

<p><a href='RestFollowerRAR.php'>Return</a></p>