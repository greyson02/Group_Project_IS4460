<html>

	<head>
		<title>Add a Restaurant</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="bootstrap-styles.css" > 
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	
<?php

	require_once 'checksession2.php';
	require 'navbarRAR.php';
?>
	
	<body>
		<div class='jumbotron text-center'>
			<h1 style='color:crimson;'>Restaurant List</h1>
	</body>
	
</html>
	
<?php

	require_once  'RARDB-directory.php';

	$conn = new mysqli($hn, $un, $pw, $db);
	if($conn->connect_error) die($conn->connect_error);

	$query = "Select * from restaurants"; //this is the query 
	$result = $conn->query($query); //this will run the query
	if(!$result) die($conn->error);

	$rows = $result->num_rows;

	for($j=0; $j<$rows; $j++){

	$row = $result->fetch_array(MYSQLI_ASSOC);

	echo <<<_END
	
		<pre style='text-align:left;'>
		$row[rest_id]
		$row[rest_name]
		$row[address]
		$row[phone]
		$row[email]
		Owner: $row[owner_name]
		</pre>
		<form action='AddRestQuery.php' method='post'>
			<input type='hidden' name='add' value='yes'>
			<input type='hidden' name='rest_name' value='$row[rest_name]'>
			<input type='submit' value='Add'>
		</form>

_END;

}

	$result->close();
	$conn->close();
	
?>


