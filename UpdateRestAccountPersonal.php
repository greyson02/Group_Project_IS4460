<html>

<?php

require_once  'RARDB-directory.php';
require_once 'checksession2.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_GET['rest_id'])){

$rest_id = $_GET['rest_id'];

$query = "SELECT * FROM restaurants WHERE rest_id=$rest_id";

$result = $conn->query($query); 
if(!$result) die($conn->error);

$rows = $result->num_rows;

for($j=0; $j<$rows; $j++)
{
	//$result->data_seek($j); 
	$row = $result->fetch_array(MYSQLI_ASSOC);
	$premium = $row['premium_member'];
	$checked = '';
	if($premium==1) $checked='checked';
	
echo <<<_END

	<pre>
	<form action='UpdateRestAccountPersonal.php' method='post'>
	Restaurant Name: <input type='text' name='rest_name' value='$row[rest_name]'>
	Address: <input type='text' name='address' value='$row[address]'>
	Phone: <input type='text' name='phone' value='$row[phone]'>
	Email: <input type='text' name='email' value='$row[email]'>
	Owner: <input type='text' name='owner_name' value='$row[owner_name]'>
	Premium: Yes <input type='checkbox' name='premium' $checked>
	ID: $row[rest_id]			
	</pre>
	
	
		<input type='hidden' name='update' value='yes'>
		<input type='hidden' name='rest_id' value='$row[rest_id]'>
		<input type='submit' value='Update Restaurant'>	
	</form>
	
_END;

}

}

if(isset($_POST['update'])){
	
	$rest_id = mysql_entities_fix_string($conn, $_POST['rest_id']);
	$rest_name = mysql_entities_fix_string($conn, $_POST['rest_name']);
	$address = mysql_entities_fix_string($conn, $_POST['address']);
	$phone = mysql_entities_fix_string($conn, $_POST['phone']);
	$email = mysql_entities_fix_string($conn, $_POST['email']);
	$owner = mysql_entities_fix_string($conn, $_POST['owner_name']);
	
	$premium=0;
	if(isset($_POST['premium'])) $premium=1;
		
	$query = "UPDATE restaurants set rest_name='$rest_name', address='$address', phone='$phone', email='$email', owner_name='$owner', premium_member='$premium' WHERE rest_id=$rest_id";
	
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	header("Location: RestViewAccountRAR.php");
	
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