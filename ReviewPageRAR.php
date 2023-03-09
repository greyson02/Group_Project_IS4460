<html>

	<head>
		<title>Reviews Page</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="bootstrap-styles.css" > 
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 	
	</head>
	
<?php
	include 'navbarRAR.php';
	require_once 'checksession2.php';
?>

	<body>
		<div class="jumbotron text-center">
			<h1 style='color:crimson;'>Reviews</h1> 
		</div>
		
		<div class="text-center">
			<form action="ReviewAddRAR.php">
				<button class="btn">Add Review</button>
			</form>
		</div>
	</body>

</html>

<?php

	require 'RARDB-directory.php';
	
	$conn = new mysqli($hn, $un, $pw, $db);
	if($conn->connect_error) die($conn->connect_error);
	
	$query = "SELECT * FROM review JOIN member ON review.member_id = member.member_id JOIN restaurants ON review.rest_id = restaurants.rest_id JOIN food_item ON review.food_id = food_item.food_id ORDER BY review_id ASC;";
	
	$result = $conn->query($query);
	if(!$result) die($conn->error);
	
	$rows = $result->num_rows;
	
	for($j=0; $j<$rows; $j++){
	
		$row = $result->fetch_array(MYSQLI_ASSOC);
		
		echo <<<_END
		<pre>
		ID: $row[review_id]
		Restaurant Name: $row[rest_name]
		Food Name: $row[food_name]
		Rating: $row[rating_score]
		User: $row[user_name]
		</pre>

_END;
		
	}
	
	$conn->close();

?>