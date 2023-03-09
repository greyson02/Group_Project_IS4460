<html>

<?php

require_once  'RARDB-directory.php';
require_once 'checksession2.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_GET['member_id'])){

$member_id = $_GET['member_id'];

$query = "SELECT * FROM member WHERE member_id=$member_id";

$result = $conn->query($query); 
if(!$result) die($conn->error);

$rows = $result->num_rows;

for($j=0; $j<$rows; $j++)
{
	//$result->data_seek($j); 
	$row = $result->fetch_array(MYSQLI_ASSOC); 
	
echo <<<_END

	<pre>
	<form action='UpdateMember.php' method='post'>
	First Name: <input type='text' name='first_name' value='$row[first_name]'>
	Last Name: <input type='text' name='last_name' value='$row[last_name]'>
	Username: <input type='text' name='user_name' value='$row[user_name]'>
	Password: <input type='text' name='password' value='$row[password]'>
	Email: <input type='text' name='email' value='$row[email]'>
	Phone: <input type='text' name='phone' value='$row[phone]'>
	ID: $row[member_id]			
	</pre>
	
	
		<input type='hidden' name='update' value='yes'>
		<input type='hidden' name='member_id' value='$row[member_id]'>
		<input type='submit' value='UPDATE RECORD'>	
	</form>
	
_END;

}

}

if(isset($_POST['update'])){
	
	$member_id = mysql_entities_fix_string($conn, $_POST['member_id']);
	$first_name = mysql_entities_fix_string($conn, $_POST['first_name']);
	$last_name = mysql_entities_fix_string($conn, $_POST['last_name']);
	$user_name = mysql_entities_fix_string($conn, $_POST['user_name']);
	$password = mysql_entities_fix_string($conn, $_POST['password']);
	$email = mysql_entities_fix_string($conn, $_POST['email']);
	$phone = mysql_entities_fix_string($conn, $_POST['phone']);
	
	$query = "UPDATE member set first_name='$first_name', last_name='$last_name', user_name='$user_name', password='$password', email='$email', phone='$phone' WHERE member_id=$member_id";
	
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	header("Location: MemberPageRAR.php");
	
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