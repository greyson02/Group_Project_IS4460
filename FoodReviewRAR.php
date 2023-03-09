<?php

require_once 'RARDB-directory.php';
require_once 'checksession2.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_GET['rest_id']) && isset($_GET['rest_name']) && isset($_GET['food_id']) && isset($_GET['food_name'])){

    $rest_id = $_GET['rest_id'];
    $rest_name = $_GET['rest_name'];
    $food_id = $_GET['food_id'];
    $food_name = $_GET['food_name'];

    $query = "SELECT * FROM review JOIN restaurants ON review.rest_id = restaurants.rest_id JOIN food_item ON review.food_id = food_item.food_id WHERE restaurants.rest_id = '$rest_id' AND food_item.food_id = '$food_id'";

    $result = $conn->query($query); 
    if(!$result) die($conn->error);

    $rows = $result->num_rows;

    $row = $result->fetch_array(MYSQLI_ASSOC);

    echo <<<_END

    <form action='FoodReviewRAR.php' method='post'>
    <pre>
    Restaurant ID: $row[rest_id]
    Restaurant Name: $row[rest_name]
    Food ID: $row[food_id]
    Food Name: $row[food_name]
    Review Rating:
    <select name='rating_score' id='rating'>
        <option value='1'>1</option>
        <option value='2'>2</option>
        <option value='3'>3</option>
        <option value='4'>4</option>
        <option value='5'>5</option>
    </select>
    Please enter your username: <input type='text' name='user_name'>
    </pre>

    <input type='hidden' name='rest_id' value='$rest_id'>
    <input type='hidden' name='food_id' value='$food_id'>
    <input type='submit' name='submit' value='Go'>
    </form>

_END;


}

if(isset($_POST['user_name'])){

    $user_name = mysql_entities_fix_string($conn, $_POST['user_name']);
    $rest_id = $_POST['rest_id'];
    $food_id = $_POST['food_id'];

    $query = "SELECT member_id FROM member WHERE user_name = '$user_name'";

    $result = $conn->query($query); 
    if(!$result) die($conn->error);

    $row = $result->fetch_array(MYSQLI_ASSOC);

    $member_id = $row['member_id'];

    
    echo <<<_END

    <pre>
    Member ID: $member_id
    </pre>

_END;

    if(isset($_POST['submit']) && $_POST['submit'] == 'Go'){

        $rating_score = $_POST['rating_score'];

        $query = "INSERT INTO review (rest_id, food_id, member_id, rating_score) VALUES ('$rest_id', '$food_id', '$member_id', '$rating_score')";

        $result = $conn->query($query); 
        if(!$result) die($conn->error);

        echo "Review added successfully.";

    }

}

$conn->close();

function mysql_entities_fix_string($conn, $string){
	return htmlentities(mysql_fix_string($conn, $string));	
}

function mysql_fix_string($conn, $string){
	$string = stripslashes($string);
	return $conn->real_escape_string($string);
}

?>

<p><a href='ReviewPageRAR.php'>Back to Reviews</a></p>