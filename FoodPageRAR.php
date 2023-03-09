<html>

	<head>
		<title>Food Item List Page</title>
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
			<h1 style='color:crimson;'>Food Items</h1> 
		</div>
		
		<div class="text-center">
			<form action="FoodAddRAR.php">
				<button class="btn">Add Food Item</button>
			</form>
		</div>
	</body>

</html>

<?php

	require 'RARDB-directory.php';
	
	$conn = new mysqli($hn, $un, $pw, $db);
	if($conn->connect_error) die($conn->connect_error);
	
	$query = "SELECT * FROM food_item";
	
	$result = $conn->query($query);
	if(!$result) die($conn->error);
	
	$rows = $result->num_rows;
	
	for($j=0; $j<$rows; $j++){
	
		$row = $result->fetch_array(MYSQLI_ASSOC);
		
		echo <<<_END
		<pre>
		ID: $row[food_id]
		Food Name: $row[food_name]
		<a href='UpdateFoodRAR.php?food_id=$row[food_id]'>Edit Food Item</a>
		</pre>
		
		<form action='RemoveFoodRAR.php' method='post'>
			<input type='hidden' name='delete' value='yes'>
			<input type='hidden' name='food_name' value='$row[food_name]'>
			<input type='submit' value='Delete Food Item'>	
		</form>
_END;
		
	}
	
	$conn->close();

?>