<?php

require_once 'userRAR.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
    
}

if(!isset($_SESSION['user'])){
	header("Location: LogInRAR.php");
	exit();
}