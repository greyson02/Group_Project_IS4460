

<html>

	<head></head>

	<h3>Please enter your username:</h3>

	<body>
	
	<form action='ReviewAddRAR.php' method='post'>
	Username: <input type='text' name='user_name'>
	<input type='submit' value='Submit'>
	</form>
	
	</body>

</html>

<?php

require_once 'RARDB-directory.php';
require_once 'checksession2.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_POST['user_name'])){
	
	$tmp_username = $_POST['user_name'];
	
	$query = "SELECT member_id FROM member WHERE user_name = '$tmp_username'";
	
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	$rows = $result->num_rows;
	
	for($j=0; $j<$rows; $j++)
{
	$row = $result->fetch_array(MYSQLI_ASSOC); 
	
	echo <<<_END
	
	<pre>
	Member ID: <a href='SelectRestPageRAR.php?member_id=$row[member_id]'>$row[member_id]</a>
	</pre>
	
_END;

}

}



$conn->close();


?>