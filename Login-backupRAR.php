<?php

	require_once 'RARDB-directory.php';
	
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
		$row = $result->fetch_array(MYSQLI_ASSOC);
		$passwordFromDB = $row['password'];
	}
	
	if(password_verify($tmp_password,$passwordFromDB))
	{
		echo "successful login<br>";
		session_start();
		$_SESSION['username'] = $tmp_username;
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