<html>

<?php

require_once  'RARDB-directory.php';
require_once 'checksession2.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_GET['review_id'])){

$review_id = $_GET['review_id'];

$query = "SELECT rating_score FROM review WHERE review_id=$review_id";

$result = $conn->query($query); 
if(!$result) die($conn->error);

$rows = $result->num_rows;

for($j=0; $j<$rows; $j++)
{
	//$result->data_seek($j); 
	$row = $result->fetch_array(MYSQLI_ASSOC);
	
	$rating_score = $row['rating_score'];
	$A=$B=$C=$D=$E='';
	if($rating_score=='1') $A = 'selected';
	if($rating_score=='2') $B = 'selected';
	if($rating_score=='3') $C = 'selected';
	if($rating_score=='4') $D = 'selected';
	if($rating_score=='5') $E = 'selected';
	
echo <<<_END

	<pre>
	<form action='UpdateReviewRAR.php' method='post'>
	
	Rating Score:
	<select name='rating_score' id='rating_score'>
		<option value='1' $A>1</option>
		<option value='2' $B>2</option>
		<option value='3' $C>3</option>
		<option value='4' $D>4</option>
		<option value='5' $E>5</option>
    </select>
	
		<input type='hidden' name='update' value='yes'>
		<input type='hidden' name='review_id' value='$review_id'>
		<input type='submit' value='Update Review'>	
	</form>
	</pre>
	
_END;

}

}

if(isset($_POST['update'])){
	
	$review_id = $_POST['review_id'];
	$rating_score = $_POST['rating_score'];
	
	$query = "Update review set rating_score='$rating_score' WHERE review_id = '$review_id' ";
	
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	header("Location: ReviewPageRAR.php");
	
	
}

$conn->close();

?>

</html>