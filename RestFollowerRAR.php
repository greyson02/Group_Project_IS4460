<html>

<head></head>


<h3>Select a Restaurant: (*just select from the first five restaurants)</h3>

<?php

require_once  'RARDB-directory.php';
require_once 'checksession2.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM restaurants";

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
	Restaurant Name: <a href='RestViewFollowerRAR.php?rest_id=$row[rest_id]'>$row[rest_name]</a>
	</pre>
	
_END;

}

$conn->close();

?>

<p><a href='RestHomeRAR.php'>Return to Restaurant Home</a></p>

</html>