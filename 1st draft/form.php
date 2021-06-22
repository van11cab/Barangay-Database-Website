<?php
$LastName=$FirstName=$MI=$Age=$Gender=$Birthdate=$Contact_Num=$Civil_Status=$Occupation=$Year_Residency=$House_Num=$Purok_id_Num="";
$host = "localhost";
$user = "username";
$password = "admin";
$db = "db_barangay";
$head_of_hh = "";
$resident_id;
$holder = $House_Num_pid = "";
	$conn = mysqli_connect($host, $user, $password, $db);
		//connection secured
		if(!$conn){
			echo 'Connection error' . mysqli_connect_error();
		}

	if(isset($_POST['submit']) && $_POST['submit'] == 'Submit'){
		echo 'isset';
		

		$LastName=test_input($_POST['LastName']);
		$FirstName=test_input($_POST['FirstName']);
		$MI=test_input($_POST['MI']);
		$Age=test_input($_POST['Age']);
		$Gender=test_input($_POST['Gender']);
		$Birthdate=test_input($_POST['Birthdate']);
		$Contact_Num=test_input($_POST['Contact_Num']);
		$Civil_Status=test_input($_POST['Civil_Status']);
		$Occupation=test_input($_POST['Occupation']);
		$House_Num=test_input($_POST['House_Num']);
		$Purok_id_Num=test_input($_POST['Purok_id_Num']);
		$House_Num_pid = $House_Num.", ".$Purok_id_Num;

	//write query
	$sql = "INSERT INTO resident(LastName, FirstName, MI, Age, Gender, Birthdate, Contact_Num,  Civil_Status ,  Occupation ,  House_Num , purok_id ) VALUES ('$LastName', '$FirstName', '$MI', '$Age', '$Gender', '$Birthdate', '$Contact_Num', '$Civil_Status', '$Occupation', '$House_Num_pid', '$Purok_id_Num')";


	//query
	$result = mysqli_query($conn, $sql);

	if($result){
			echo "success";
	}
	else{
		echo 'query error: '. mysqli_error($conn);
	}
	
	$head_of_hh = test_input($_POST['head_of_hh']);
	if($head_of_hh == '1'){
		echo 'enter hh';
		
		//write query
		$sql1 = "SELECT resident_id FROM resident ORDER BY resident_id DESC ";
		$result = mysqli_query($conn, $sql1);
		$resident_id = mysqli_fetch_array($result, MYSQLI_ASSOC);
		
		foreach($resident_id as $key => $value){
    	$holder = (int)$value;
		}
		echo $holder;
		$sql = "INSERT INTO `head of household`(`resident_id`, `House_Num`) VALUES ('$holder','$House_Num_pid')";
		$result = mysqli_query($conn, $sql);

		if($result){
			echo "success";
		}
		else{
			echo 'query error: '. mysqli_error($conn);
		}
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
	<title>Form</title>
</head>
<body>
	<h4>Sample Form Resident</h4>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
		<label>Last Name: </label>
		<input type="text" name="LastName">
		<label>First Name: </label>
		<input type="text" name="FirstName">
		<label>Middle Initial:</label>
		<input type="text" name="MI">
		<br>
		<label>Age: </label>
		<input type="number" name="Age">
		<br>
		<label>Gender: </label>
		<input type="radio" name="Gender" id="male" value="male">
		<label for="male">Male</label>
		<input type="radio" name="Gender" id="female" value="female">
		<label for="female">Female</label>
		<br>
		<label>Birthdate: </label>
		<input type="date" name="Birthdate" id="Birthdate">
		<br>
		<label>Contact Number: </label>
		<input type="number" name="Contact_Num" placeholder="09*********">
		<br>
		<label>Civil Status:</label>
		<input type="text" name="Civil_Status">
		<label>Occupation:</label>
		<input type="text" name="Occupation">
		<br>
		

		<label>House Number: </label>
		<input type="text" name="House_Num" placeholder="Block 11, Lot 10">

		<label for="Purok_id_Num">Purok ID: </label>
		<select name="Purok_id_Num">
			<option value="1">Purok Mangga</option>
			<option value="2">Purok Santol</option>
			<option value="3">Purok Sampaguita</option>
			<option value="4">Purok Santan</option>
			<option value="5">Purok Magbago</option>
		</select>

		<input type="checkbox" id="head_of_hh" name="head_of_hh" value="1">
		<label for="head_of_hh">Are you head of household?</label>

		<br>
		<input type="submit" name="submit" value="Submit">
	</form>

	<button onclick="location.href='index.html';">Go Back</button>
</body>
</body>
</html>