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
			echo '<script>alert("oh yey");</script>';
		}
		else{
			echo '<script>alert("oh no");</script>';
			//echo '<script>alert(query error: )</script>'. mysqli_error($conn);
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
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>127</title>
	<link rel="stylesheet" href="https://maxst.icons8.com/vue
	-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
	<link rel="stylesheet" href="registration.css">
	 <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"></script>
</head>
<body>
	<input type="checkbox" id="nav-toggle">
	<div class= "sidebar">
		<div class="sidebar-brand" style="shite-space:no-wrap;">
			<span></span><h2><img src="img\pointlogo.png" width="40px"> <span>Barangay Ambot</span></h2>
		</div>
		
		<div class = "sidebar-menu">
			<ul>
		
			<li>  
				<a href="index.html" class="active"><span></span>
				<img src="img/menu.png" width="25px"><span>&nbsp&nbsp Dashboard	</span></a>
			</li>
			
			<li>
				<a href="household.php"><span></span>
				<img src="img/reg.gif" width="25px"><span> &nbspRegistration</span></a>
			</li>

			<li>
				<a href="profile1.html"><span></span>
				<img src="img/profile.png" width="25px"><span> &nbspProfile Page</span></a>
			</li>
			
			<li>
				<a href="barangay_info.html"><span></span>
				<img src="img/barangay_info.png" width="25px"> <span>&nbspBarangay Information</span></a>
			</li>
		
			<li>
				<a href="dl1.html"><span></span>
				<img src="img/download.png" width="25px"><span>  &nbspDownloadable Files</span></a>
			</li>
			
			</ul>
	
		<ul style="position:absolute; bottom:0; ">
			<li>
				<a><span><em><b>Contact Us</b></em>
				
					<p style="color:white;	font-family: 'Poppins', sans-serif;font-size:60%;">
						Phone number - 09X-XXX-XXXX<br>
						Landline - XXX-XXXX<br>
						Email- XXXXX@gmail.com<br>
					</p>
				</span></a>
			</li>
			</ul>
		</div>
	</div>	
	
	<div class="main-content">
		<header>
			<h2>
				<label for="nav-toggle">
					<span class="las la-bars"></span>
				</label>
				Barangay Database
			</h2>
			
			<div class="user-wrapper">
				<a href="login_admin.php">
				<div>
					<h4>Log in</h4>
					<small>for Admin</small>
				</div></a>
			</div>
		</header>
	</div>
		
	<section>
		<div class="color"></div>
		<div class="color"></div>
		<div class="color"></div>
		<div class="box">
			<div class="square" style="--i:0"></div>
			<div class="square" style="--i:1"></div>
			<div class="square" style="--i:2"></div>
			<div class="square" style="--i:3"></div>
			<div class="square" style="--i:4"></div>
			<div class="container">
				<div class="form">
					<h2>Registration Form</h2>
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
						
						<div class="inputBox">
							<input type="text" placeholder="Last Name" name="LastName">
						</div>
			
						<div class="inputBox">
							<input type="text" placeholder="First Name"  name="FirstName">
						</div>
						<div class="inputBox">
							<input type="text" placeholder="Middle Initial" name="MI">
						</div>
						<br>
						<div class="inputBox">
							<input type="number" placeholder="Age" name="Age">
						</div>
						
						<div class="inputbox">
							  <p class="gender">Gender:</p>	 <br>
							 <input type="radio" name="Gender" id="male" value="male">
							<label for="male">Male</label><br>
							
							<input type="radio" name="Gender" id="female" value="female">
							<label for="female">Female</label>
						</div>
						
						<br>
						<div class="inputBox">
							<input type="date" placeholder="Birthdate" name="Birthdate" id="Birthdate">
						</div>
						<br>
						<div class="inputBox">
							<input type="number" placeholder="09*********" name="Contact_Num">
						</div>
						
						<div class="inputBox">
							<input type="text" placeholder="Civil Status" name="Civil_Status">
						</div>

						<div class="inputBox">
							<input type="text" placeholder="Occupation"  name="Occupation">
						</div>

						<div class="inputBox">
							<input type="text" placeholder="House Number" name="House_Num" placeholder="Block 11, Lot 10">
						</div>
						
						<br>
						<select name="Purok_id_Num" id="select">
							<option disabled hidden selected>Select your Purok</option>
							<option value="1">Purok Mangga</option>
							<option value="2">Purok Santol</option>
							<option value="3">Purok Sampaguita</option>
							<option value="4">Purok Santan</option>
							<option value="5">Purok Magbago</option>
						</select>

						
						<label class="container1"><label for="head_of_hh">Are you head of household?</label>
						<input input type="checkbox" id="head_of_hh" name="head_of_hh" value="1">
						<span class="checkmark"></span>
						</label>

						<br>
						<div class="inputBox">
							<input type="submit" name="submit" value="Submit">
						</div>
					</form>
				</div>
			</div>
		</div>
					
	</section> 
</body>
</html>