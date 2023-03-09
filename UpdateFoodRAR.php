<html>

<?php

require_once  'RARDB-directory.php';
require_once 'checksession2.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_GET['food_id'])){

$food_id = $_GET['food_id'];

$query = "SELECT * FROM food_item WHERE food_id=$food_id";

$result = $conn->query($query); 
if(!$result) die($conn->error);

$rows = $result->num_rows;

for($j=0; $j<$rows; $j++)
{
	//$result->data_seek($j); 
	$row = $result->fetch_array(MYSQLI_ASSOC); 
	
echo <<<_END

	<pre>
	<form action='UpdateFoodRAR.php' method='post'>
	Food Name: <input type='text' name='food_name' value='$row[food_name]'>
	ID: $row[food_id]			
	</pre>
	
	
		<input type='hidden' name='update' value='yes'>
		<input type='hidden' name='food_id' value='$row[food_id]'>
		<input type='submit' value='Update Food Item'>	
	</form>
	
_END;

}

}

if(isset($_POST['update'])){
	
	$food_id = $_POST['food_id'];
	$food_name = mysql_entities_fix_string($conn, $_POST['food_name']);
	
	$query = "UPDATE food_item set food_name='$food_name' WHERE food_id=$food_id";
	
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
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

</html>