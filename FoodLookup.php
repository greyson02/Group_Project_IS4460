<?php

require_once 'RARDB-directory.php';
require_once 'checksession2.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_GET['rest_id'])){

$rest_id = $_GET['rest_id'];

$query = "SELECT * FROM food_rest JOIN restaurants ON food_rest.rest_id = restaurants.rest_id JOIN food_item ON food_rest.food_id = food_item.food_id WHERE restaurants.rest_id=$rest_id ";

$result = $conn->query($query); 
if(!$result) die($conn->error);

$rows = $result->num_rows;

for($j=0; $j<$rows; $j++)
{
	//$result->data_seek($j); 
	$row = $result->fetch_array(MYSQLI_ASSOC); 

echo <<<_END
	
	<pre>
	Restaurant ID: $row[rest_id]
	Restaurant Name: $row[rest_name]
	Food ID: $row[food_id]
	Food Name: <a href='FoodReviewRAR.php?rest_id=$row[rest_id]&rest_name=$row[rest_name]&food_id=$row[food_id]&food_name=$row[food_name]'>$row[food_name]</a>
	</pre>
	
_END;

}

}

$conn->close();

?>