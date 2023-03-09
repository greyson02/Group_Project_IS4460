<html>
	<head>
		<title>My Restaurants Page</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="bootstrap-styles.css" > 
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 	
	
	</head>
	
		<!-- Navbar -->
<?php
	require 'navbarRAR.php';
	require_once 'checksession2.php';
?>
	
	<!-- Add a Restaurant link TOP -->
		<div class="jumbotron text-center">
			<h1 style='color:crimson;'>Restaurant List</h1> 
		</div>
		
		<div class="text-center">
			<h3 style='color:crimson;'>
				<form action='AddRestaurantRAR.php'>
					<button>Add a Restaurant</button>
				</form>
			</h3>
		</div>
		
<?php

	include 'AddRestQuery.php';
	
	//Start the session
	session_start();

	//Get the query result from the session variable
	$query_result = $_SESSION['query_result'];

	//Display the query result
	foreach($query_result as $row) {
	echo $row['rest_name'].'<br>';
	echo $row['address'].'<br>';
	echo $row['phone'].'<br>';
	echo $row['email'].'<br>';
	echo '<br>';
}

?>

	<!-- Add a Restaurant link BOTTOM -->
		<div class="text-center">
			<h3 style='color:crimson;'>
				<form action='AddRestaurantRAR.php'>
					<button>Add a Restaurant</button>
				</form>
			</h3>
		</div>
	
	<!-- Pictures -->
	<div class="text-center">
	<h2> <img src='spaghetti.jpeg'></img> <img src='pancakes.jpeg'></img> <img src='salad.jpeg'></img> <img src='chicken.jpeg'></img>
	<br> <br> <br>
    
</html>