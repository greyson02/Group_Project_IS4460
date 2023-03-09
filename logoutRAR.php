<?php

session_start();

if(isset($_SESSION['user'])){
	destroy_session_and_data();
}

function destroy_session_and_data(){
	$_SESSION = array();
	setcookie(session_name(), '', time()-2592000, '/');
	session_destroy();
}

echo "Logout successful! Please login <a href='LogInRAR.php'> HERE </a>";

?>