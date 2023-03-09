<?php

require_once 'RARDB-directory.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

class User{
	
	public $username;
	public $roles = array();
	
	function __construct($username){
		global $conn;
		
		$this->username = $username;
		
		$query = "select * from member where user_name='$username' ";
		
		$result = $conn->query($query);
		if(!$result) die($conn->error);
			
		$rows = $result->num_rows;	
		
		$roles = array();
		for($i=0; $i<$rows; $i++){
			$row = $result->fetch_array(MYSQLI_ASSOC);
			//echo $row['role']; echo '<br>';
			$roles[] = $row['role'];
		}	
		
		$this->roles = $roles;
	}
	
	function getRoles(){
		return $this->roles;
	}
}

//$user = new User('pjones');
//$roles = $user->getRoles();
//print_r($roles);


