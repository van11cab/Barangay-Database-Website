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

	$hh_num = test_input($_POST['hh_num']);
	$h_contribution = test_input($_POST['h_contribution']);
	$Purok_id = test_input($_POST['Purok_id']);

	if($h_contribution == "") $h_contribution = 0;
	$house_num_pid = $hh_num.", ".$Purok_id;

	$sql = "INSERT INTO household(House_Num_plus_purok_id, Monthly_Contribution ) VALUES('$house_num_pid', $h_contribution)";
	$result = mysqli_query($conn, $sql);
	if($result){
		header('Location: registration.php', TRUE, 303);
		prompt("Success");
	}
	else{
		
		header('Location: household.php', TRUE, 303);
		//echo 'query error: '. mysqli_error($conn);
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
	<link rel="stylesheet" href="household.css">
	 <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"></script>
	 <style>
		select{
			width: 100%;
			background: rgba(255,255,255);
			border: none;
			border-radius:15px;
			outline: none;
			padding: 10px 20px;
			font-family: 'Poppins', sans-serif;;
		}
	 </style>
	  
	  
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

			<div class="container">
				<div class="form">
					
				</div>
			</div>
		</div>
				
		<div class="box2">
			<div class="square2" style="--i:0"></div>
			<div class="square2" style="--i:1"></div>
			<div class="square2" style="--i:2"></div>
			<div class="square2" style="--i:3"></div>
			<div class="square2" style="--i:4"></div>
			<div class="container">
				<div class="form">
					<h2 style="color:#696969;">Household</h2>
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
						
						<div class="inputBox">
							<input type="text" placeholder="Add Household Number" name="hh_num">
						</div>

						<br>
						<select name="Purok_id" id="select">
							<option disabled hidden selected>Select your Purok</option>
							<option value="1">Purok Mangga</option>
							<option value="2">Purok Santol</option>
							<option value="3">Purok Sampaguita</option>
							<option value="4">Purok Santan</option>
							<option value="5">Purok Magbago</option>
						</select>
											
						<div class="inputBox">
							<input type="number" placeholder="Monthly Household Income"  name="h_contribution">
						</div>
						
						<div class="inputBox">
							<input type="submit" name="submit" value="Register">
						</div>



					</form>
				</div>
			</div>
		</div>
		
	</section> 
</body>
</html>