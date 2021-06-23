<?php
$hh_num =$h_contribution=$Purok_id=$house_num_pid="";
$host = "localhost";
$user = "username";
$password = "admin";
$db = "db_barangay";


$conn = mysqli_connect($host, $user, $password, $db);
	//connection secured
	if(!$conn){
		prompt('Connection error' . mysqli_connect_error());
	}

if(isset($_POST['submit']) && $_POST['submit'] == 'Register'){
	//echo 'register';
	echo '<script>alert(entered);</script>';
	$hh_num = test_input($_POST['hh_num']);
	$h_contribution = test_input($_POST['h_contribution']);
	$Purok_id = test_input($_POST['Purok_id']);

	$house_num_pid = $hh_num.", ".$Purok_id;

	$sql = "INSERT INTO household(House_Num_plus_purok_id, Monthly_Contribution ) VALUES('$house_num_pid', $h_contribution)";
	$result = mysqli_query($conn, $sql);
	
	
	if($result){
		header('Location: registration.php', TRUE, 303);
		prompt("Success");
	}
	else{
		header('Location: registration.php', TRUE, 303);
		echo '<script>alert(repeat);</script>';
		echo 'query error: '. mysqli_error($conn);
	}

	mysqli_close($conn);

	
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
	<title>Household</title>
</head>
<body>
	<h4>Register Household</h4>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

		<label>Add Household Number: </label>
		<input type="text" name="hh_num">

		<label for="Purok_id">Purok ID: </label>
		<select name="Purok_id">
			<option value="1">Purok Mangga</option>
			<option value="2">Purok Santol</option>
			<option value="3">Purok Sampaguita</option>
			<option value="4">Purok Santan</option>
			<option value="5">Purok Magbago</option>
		</select>

		<label>Monthly Household contribution: </label>
		<input type="text" name="h_contribution">
		<input type="submit" name="submit" value="Register">

	</form>
</body>
</html>