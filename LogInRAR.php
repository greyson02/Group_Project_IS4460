<html>
	<head>
		<title>Log-In</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="bootstrap-styles.css" > 
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 	
	
	</head>
	
	<!-- Header -->
		<div class="jumbotron text-center">
		<h1 style='color:crimson;'>Log In</h1> 
		<p>Log in below. New to our site? Sign up now!</p> 
		</div>
	
	<!-- Log In Info -->
	<body>
		<div class="text-center">
			<form method='post' action='LogInRAR.php'>
				Username: <br><input type='text' name='username'><br>
				</div>
				<div class="text-center">
				Password: <br><input type='password' name='password'><br><br>
				</div>
				<div class="text-center">
				<input type='submit' value='Login'>
				</div>
			</form>
	</body>
	
	<body>
	
	<br>
	<div class="text-center">
	<h3 style='color:crimson;'>Create new account below</h3> 
	</div>
	<!-- New User Button -->
	<form action="registerRAR.php">
	<div class="text-center">
    <button type="submit">Sign Up</button>
	</div>
    </form> 
    
    </body>
    
</html>

<?php

	require_once "RARDB-directory.php";
	require_once "userRAR.php";
	
	$conn = new mysqli($hn, $un, $pw, $db);
	if($conn->connect_error) die($conn->connect_error);
	
	if (isset($_POST['username']) && isset($_POST['password'])){
	
	$tmp_username = mysql_entities_fix_string($conn, $_POST['username']);
	$tmp_password = mysql_entities_fix_string($conn, $_POST['password']);
	
	//Get values from login screen
	
	$query = "SELECT password FROM member WHERE user_name = '$tmp_username'";
	
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	$rows = $result->num_rows;
	$passwordFromDB="";
	for($j=0; $j<$rows; $j++)
	{
		$result->data_seek($j);
		$row = $result->fetch_array(MYSQLI_ASSOC);
		$passwordFromDB = $row['password'];
	}
	
	if(password_verify($tmp_password,$passwordFromDB))
	{
		echo "successful login<br>";

		session_start();
		$user = new User($tmp_username);
		$_SESSION['user'] = $user;
		header('Location: PreliminaryRAR.php');
	}
	else
	{
		echo "login error<br>";
	}

}

$conn->close();

//sanitization functions
function mysql_entities_fix_string($conn, $string){
	return htmlentities(mysql_fix_string($conn, $string));	
}

function mysql_fix_string($conn, $string){
	$string = stripslashes($string);
	return $conn->real_escape_string($string);
}

?>