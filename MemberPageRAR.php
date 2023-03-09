<html>

	<head>
		<title>Member List Page</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="bootstrap-styles.css" > 
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 	
	</head>
	
<?php

	require_once 'checksession2.php';
	include 'navbarAdminRAR.php';
?>

	<body>
		<div class="jumbotron text-center">
			<h1 style='color:crimson;'>Members</h1> 
		</div>
		
		<div class="text-center">
			<form action="MemberAddRAR.php">
				<button class="btn">Add Member</button>
			</form>
		</div>
	</body>

</html>

<?php

	require 'RARDB-directory.php';
	
	$conn = new mysqli($hn, $un, $pw, $db);
	if($conn->connect_error) die($conn->connect_error);
	
	$query = "SELECT * FROM member";
	
	$result = $conn->query($query);
	if(!$result) die($conn->error);
	
	$rows = $result->num_rows;
	
	for($j=0; $j<$rows; $j++){
	
		$row = $result->fetch_array(MYSQLI_ASSOC);
		
		echo <<<_END
		<pre>
		ID: $row[member_id]
		Firsname: $row[first_name]
		Lastname: $row[last_name]
		Username: $row[user_name]
		Password: $row[password]
		Email: $row[email]
		Phone: $row[phone]
		<a href='UpdateMember.php?member_id=$row[member_id]'>Edit Member</a>
		</pre>
		
		<form action='RemoveMember.php' method='post'>
			<input type='hidden' name='delete' value='yes'>
			<input type='hidden' name='password' value='$row[password]'>
			<input type='submit' value='Delete User'>	
		</form>
		
_END;
		
	}
	
	$conn->close();

?>