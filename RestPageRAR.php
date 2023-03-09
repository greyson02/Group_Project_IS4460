<html>

	<head>
		<title>Restaurant List Page</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="bootstrap-styles.css" > 
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 	
	</head>
	
<?php
	include 'navbarAdminRAR.php';
	require_once 'checksession2.php';
?>

	<body>
		<div class="jumbotron text-center">
			<h1 style='color:crimson;'>Restaurants</h1> 
		</div>
		
		<div class="text-center">
			<form action="RestAddRAR.php">
				<button class="btn">Add Restauarant</button>
			</form>
		</div>
	</body>

</html>

<?php

	require 'RARDB-directory.php';
	
	$conn = new mysqli($hn, $un, $pw, $db);
	if($conn->connect_error) die($conn->connect_error);
	
	$query = "SELECT * FROM restaurants";
	
	$result = $conn->query($query);
	if(!$result) die($conn->error);
	
	$rows = $result->num_rows;
	
	for($j=0; $j<$rows; $j++){
	
		$row = $result->fetch_array(MYSQLI_ASSOC);
		
		echo <<<_END
		<pre>
		ID: $row[rest_id]
		Restaurant: $row[rest_name]
		Address: $row[address]
		Phone Number: $row[phone]
		Email: $row[email]
		Owner: $row[owner_name]
		Premium: $row[premium_member]
		<a href='UpdateRestRAR.php?rest_id=$row[rest_id]'>Edit Restaurant</a>
		</pre>
		
		<form action='RemoveRestRAR.php' method='post'>
			<input type='hidden' name='delete' value='yes'>
			<input type='hidden' name='rest_id' value='$row[rest_id]'>
			<input type='submit' value='Delete Restauarant'>	
		</form>

_END;
		
	}
	
	$conn->close();

?>