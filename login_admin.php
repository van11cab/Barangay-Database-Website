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
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>127</title>
	<link rel="stylesheet" href="https://maxst.icons8.com/vue
	-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="barangay_info.css">
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
				Dashboard
			</h2>

		</header>
		
	</div>
	
	<div>
		<table align="center" width="430px" height="50px"style="border:5px #9AAE09 solid; border-radius: 10px;margin:25vh 0 0 35vw;position:relative;">
			<tr>
			<td align="center" style="display:block;"> 			
			<br>
			<img src="profile.png" height="50px">
			<br> <br> <font font="5"> L O G &nbsp I N &nbsp F O R &nbsp A D M I N</font> 
			<br> <br>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
				<input class="input" type="text" name="user" placeholder="Username"style="display:block;border-bottom:0.5pt solid black;" required/> <br> <br>
				<input class="input" type="password" name="password" placeholder="Password" style="border-bottom:0.5pt solid black;" required/> <br> <br>
				

				<input  type="submit" name="submit" value="Log In" class="moreinfo" style="opacity: 0.8; border:none; font-size:15px; font-weight: bold; height:45px; width:150px; border-radius:3px">
			</form>
			<br><br>


			<br><br>
				</td>
			</tr>
			</table>
	
	</div>
	
	
	
</body>
</html>