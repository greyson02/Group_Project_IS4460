<html>
	<body>
		<h3>Please enter your restaurant details below</h3>
		<div class="text-center">
			<form method='post' action='RestViewAccountRAR.php'>
				Restaurant Name: <br><input type='text' name='rest_name'><br>
				Restaurant Password: <br><input type='password' name='rest_password'><br><br>
				</div>
				<div class="text-center">
				<input type='submit' value='Login'>
				</div>
			</form>
	</body>
</html>

<?php

	require_once 'RARDB-directory.php';
	require_once 'checksession2.php';
	
	$conn = new mysqli($hn, $un, $pw, $db);
	if($conn->connect_error) die($conn->connect_error);
	
	if(isset($_POST['rest_name']) && ($_POST['rest_password'])){
	
	$tmp_username = mysql_entities_fix_string($conn, $_POST['rest_name']);
	$tmp_password = mysql_entities_fix_string($conn, $_POST['rest_password']);
	
	//Get values from login screen
	
	$query = "SELECT rest_password FROM restaurants WHERE rest_name = '$tmp_username'";
	
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	$rows = $result->num_rows;
	$passwordFromDB="";
	for($j=0; $j<$rows; $j++)
	{
		
		$row = $result->fetch_array(MYSQLI_ASSOC);
		$passwordFromDB = $row['rest_password'];
	}
	
	if(password_verify($tmp_password,$passwordFromDB))
	{
		echo "successful login<br>";
		
		$tmp_username = mysql_entities_fix_string($conn, $_POST['rest_name']);
		
		$query_0 = "SELECT * FROM restaurants WHERE rest_name = '$tmp_username'";
		
		$result_0 = $conn->query($query_0); 
		if(!$result_0) die($conn->error);
		
		$rows_0 = $result_0->num_rows;
		for($j=0; $j<$rows_0; $j++){
		
			$row_0 = $result_0->fetch_array(MYSQLI_ASSOC);
			
			echo <<<_END
			
			<pre>
			ID: $row_0[rest_id]
			Restaurant Name: $row_0[rest_name]
			Address: $row_0[address]
			Phone: $row_0[phone]
			Email: $row_0[email]
			Owner: $row_0[owner_name]
			Premium: $row_0[premium_member]
			Restaurant Password: $row_0[rest_password]
			<a href='UpdateRestAccountPersonal.php?rest_id=$row_0[rest_id]'>Edit Restaurant</a>
			<a href='RemoveRestAccountPersonal.php?rest_id=$row_0[rest_id]'>Remove Restaurant</a>
			</pre>

_END;
		
		}
		
	}
	else
	{
		echo "login error<br>";
	}

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

<h3>Select below to create a new restaurant</h3>
	<form action='AddRestPersonalRAR.php'>
		<input type='submit' value='Create Restaurant'>
	</form

<p><a href='logoutRAR.php'>Sign Out</a></p>