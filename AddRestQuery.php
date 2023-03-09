<?php

	require_once  'RARDB-directory.php';

	$conn = new mysqli($hn, $un, $pw, $db);
	if($conn->connect_error) die($conn->connect_error);

	if(isset($_POST['add'])){
	
	$key = $_POST['rest_name'];

	$query = "SELECT * FROM restaurants WHERE rest_name = '$key' ";
	
	//Run the query
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	$rows = $result->num_rows;
	
	//Store the result in a session variable
	session_start();
	
	if(!isset($_SESSION['query_result'])){
	$_SESSION['query_result'] = array();
	}
	
	for($j=0; $j<$rows; $j++){
		$result->data_seek($j); 
		$_SESSION['query_result'][] = $result->fetch_assoc();
	}
	
	//Redirect to the other PHP file
	header('Location: MemRestsRAR.php');
	exit;
}

$conn->close();

?>






