<?php
// Enter your Host, username, password, database below.
$conn = mysqli_connect("localhost","root","","data_base");
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		die();
		}
?>