<html>
	<body>
		<h3>Please enter your account details below</h3>
		<div class="text-center">
			<form method='post' action='MemViewAccountPersonalRAR.php'>
				Username: <br><input type='text' name='user_name'><br>
				Password: <br><input type='password' name='password'><br><br>
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
	
	if(isset($_POST['user_name']) && ($_POST['password'])){
	
	$tmp_username = mysql_entities_fix_string($conn, $_POST['user_name']);
	$tmp_password = mysql_entities_fix_string($conn, $_POST['password']);
	
	//Get values from login screen
	
	$query = "SELECT password FROM member WHERE user_name = '$tmp_username'";
	
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	$rows = $result->num_rows;
	$passwordFromDB="";
	for($j=0; $j<$rows; $j++)
	{
		
		$row = $result->fetch_array(MYSQLI_ASSOC);
		$passwordFromDB = $row['password'];
	}
	
	if(password_verify($tmp_password,$passwordFromDB))
	{
		echo "successful login<br>";
		
		$tmp_username = mysql_entities_fix_string($conn, $_POST['user_name']);
		
		$query_0 = "SELECT * FROM member WHERE user_name = '$tmp_username'";
		
		$result_0 = $conn->query($query_0); 
		if(!$result_0) die($conn->error);
		
		$rows_0 = $result_0->num_rows;
		for($j=0; $j<$rows_0; $j++){
		
			$row_0 = $result_0->fetch_array(MYSQLI_ASSOC);
			
			echo <<<_END
			
			<pre>
			ID: $row_0[member_id]
			Username: $row_0[user_name]
			Password: $row_0[password]
			First Name: $row_0[first_name]
			Last Name: $row_0[last_name]
			Email: $row_0[email]
			Phone: $row_0[phone]
			Role: $row_0[role]
			<a href='UpdateMemAccountPersonal.php?member_id=$row_0[member_id]'>Edit Account</a>
			<a href='RemoveMemAccountPersonal.php?member_id=$row_0[member_id]'>Remove Account</a>
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

<p><a href='logoutRAR.php'>Sign Out</a></p>