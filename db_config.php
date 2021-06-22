<?php  
$host = "localhost";
$user = "username";
$password = "admin";
$db = "db_barangay";
$conn = mysqli_connect($host, $user, $password, $db);
		//connection secured
		if(!$conn){
			echo '<script>alert("Connection error.")</script>'.mysqli_connect_error();
		}

?>