<?php
if(isset($_POST['submit']) && $_POST['submit'] == 'Log In'){
	$host = "localhost";
	$user = test_input($_POST['user']);
	$password = test_input($_POST['password']);
	$db = "db_barangay";

	$conn = mysqli_connect($host, $user, $password, $db);
		//connection secured
	if($conn){
		echo 'success';
		//to be changed to another page to edit database
		header('Location: http://localhost/phpmyadmin/index.php', TRUE, 303);
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
	<title>127</title>
	<link rel="stylesheet" href="https://maxst.icons8.com/vue
	-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<input type="checkbox" id="nav-toggle">
	<div class= "sidebar">
		<div class="sidebar-brand">
			<h2><span class="lab la-accusoft"></span> <span>Barangay Ambot</span></h2>
		</div>
		
		<div class = "sidebar-menu">
		<ul>
			<li>  
				<a href="index.html" class="active"><span class="las la-igloo"></span>
				<span>Dashboard	</span></a>
			</li>
			
			<li>
				<a href="registration.html"><span class="las la-laptop"></span>
				<span>Registration</span></a>
			</li>
			
			<li>
				<a href="household.html"><span class="las la-home"></span>
				<span>Household</span></a>
			</li>
			
			<li>
				<a href="profile1.html"><span class="las la-users"></span>
				<span>Profile Page</span></a>
			</li>
			
			<li>
				<a href=""><span class="las la-clipboard-list"></span>
				<span>Barangay Information</span></a>
			</li>
		
			<li>
				<a href="dl1.html"><span class="las la-receipt"></span>
				<span>Downloadable Files</span></a>
			</li>
			
			<li>
				<a href="contact1.html"><span class="las la-user-circle"></span>
				<span>Contact Us</span></a>
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
				Dashboard
			</h2>
			
			<div class="search-wrapper">
				<span class="las la-search"></span>
				<input type="search" placeholder="Search here" />
			</div>
			
			<div class="user-wrapper">
				<img src="icon.png" width="30px" height="30px" alt="">
				<div>
					<h4>John Doe</h4>
					<small>Super admin</small>
				</div>
			</div>
		</header>
		
	</div>

	<div class="sulod">
		<br><br>
		
		<div class="form">
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
				<h2 style="text-align: center;">Log In to Database</h2>

				<div class="inputbox">
					<input type="text" name="user" placeholder="Username">	
				</div>
				
				<br>
				<div class="inputbox">
					<input type="password" name="password" placeholder="Password">
				</div>
				
				<div>
					<input type="submit" name="submit" value="Log In" class="moreinfo">
				</div>
			</form>
		</div>
	</div>
</body>
</html>
