<html>
	<head>
		<title>Preliminary Question</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="bootstrap-styles.css" > 
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 	
	
	</head>

	<!-- Header -->
		<div class="jumbotron text-center">
		<h1 style='color:crimson;'>Select Homepage</h1> 
		<p>Please select your homepage</p> 
		</div>
	
	<!-- User Select Button List -->
	<form action="MemberHomeRAR.php">
	<div class="text-center">
    <button type="submit">Member</button>
	</div>
    </form> 
    <form action="RestHomeRAR.php">
	<div class="text-center">
    <button type="submit">Restaurant</button>
	</div>
    </form>
    <form action="AdminHomeRAR.php">
	<div class="text-center">
    <button type="submit">Administrator</button>
	</div>
    </form>
    
    <p style='text-align:center;'><a href="logoutRAR.php">Sign Out</a></p>
    
</html>


<!-- authorization -->
<?php

$page_roles = array('admin', 'member', 'rest');

require_once 'checksessionRAR.php';

?>