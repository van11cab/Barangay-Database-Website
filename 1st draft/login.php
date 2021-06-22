<?php
echo 'php';
if(isset($_POST['submit']) && $_POST['submit'] == 'Log In'){
	echo 'in';
	$host = "localhost";
	$user = test_input($_POST['user']);
	$password = test_input($_POST['password']);
	$db = "db_barangay";

	$conn = mysqli_connect($host, $user, $password, $db);
		//connection secured
	if($conn){
		echo 'success';
		//to be changed to another page to edit database
		header('Location: edits.php', TRUE, 303);
		prompt("Success");
	}
	else{
		echo '<script>alert("Wrong username or password.")</script>';
		//echo '<script type = "text/javascript/JS">alert("Wrong username or password")</script>';
	}

}

function test_input($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
</head>
<body>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
		<label>Username: </label>
		<input type="text" name="user">
		<label>Password:</label>
		<input type="password" name="password">
		<input type="submit" name="submit" value="Log In">
	</form>
</body>
</html>