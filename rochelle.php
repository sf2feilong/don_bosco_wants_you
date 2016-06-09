<?php
include 'db.php';

$test_sql = "SELECT * FROM user_t";
$test_query = mysqli_query($conn, $test_sql);

while($row = mysqli_fetch_assoc($test_query)){
	$user_id = $row['user_id'];
	$user_pass = $row['user_pass'];

	echo "$user_id , $user_pass";

}

?>