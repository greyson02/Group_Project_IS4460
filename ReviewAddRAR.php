<?php

require_once 'RARDB-directory.php';
require_once 'checksession2.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM restaurants";

$result = $conn->query($query); 
if(!$result) die($conn->error);

$rows = $result->num_rows;

for($j=0; $j<$rows; $j++)
{
	$result->data_seek($j); 
	$row = $result->fetch_array(MYSQLI_ASSOC); 

echo <<<_END
	
	<pre>
	Restaurant Name: <a href='FoodLookup.php?rest_id=$row[rest_id]'>$row[rest_name]</a>
	ID: $row[rest_id]	
	</pre>
	
_END;


}

?>