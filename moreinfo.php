<?php  

include('db_config.php');

if(isset($_GET['id'])){
	$id = mysqli_real_escape_string($conn, $_GET['id']);

	//sql
	$sql = "SELECT * FROM resident WHERE resident_id = $id";
	//results
	$result = mysqli_query($conn, $sql);
	//fetch array
	$resident = mysqli_fetch_assoc($result);

	mysqli_close($conn);
	//print_r($resident);
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
		<style>

		.main {
			width:65%;
			margin:15vh 15vw 5vw;
			background-color:#9aae09;
			animation-name:intro2;
			animation-duration:1s;
			padding:15px;
		}
		.main_txt{
			text-align:left;
			line-height:30px;
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
				<a href="profile1.php"><span></span>
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
	</div>
	<div class="main-content">
		<header>
			<h2>
				<label for="nav-toggle">
					<span class="las la-bars"></span>
				</label>
				Barangay Database - Residential Information
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
	
	<div class = "main">
    <div class="main_txt">
    	<?php if($resident){?>
    	<h1 style="font-size:3vw;"><b><?php echo $resident['LastName'];?>, <?php echo $resident['FirstName']; ?> <?php echo $resident['MI']; ?></b></h1>
    	<p>ID Number: <?php echo $resident['resident_id']; ?></p>
    	<p>Date of Birth: <?php echo $resident['Birthdate']; ?> </p>
    	<p>Age: <?php echo $resident['Age']; ?></p>
    </div>
    <br>

    <div class="details" style="color:white;">
    	<p>Address: <?php 
    		echo $resident['House_Num'];?>: 
    		<?php  if($resident['purok_id']){
                	//to recognize purok name
                	switch ($resident['purok_id']) {
                		case '1':
                			echo 'Purok Mangga';
                			break;
                		case '2':
                			echo 'Purok Santol';
                			break;
                		case '3':
                			echo 'Purok Sampaguita';
                			break;
                		case '4':
                			echo 'Purok Santan';
                			break;
                		case '5':
                			echo 'Purok Magbago';
                			break;
                	}
    	} ?>, Barangay Ambot, In City, Some Province, Philippines</p>
    	<br>
    	<p>Status: <?php echo $resident['Civil_Status']; ?></p>
    	<br>
    	<p>Gender: <?php echo $resident['Gender']; ?></p>
    	<br>
    	<p>Contact Number: <?php echo $resident['Contact_Num']; ?></p>
    	<br>
    	<p>Occupation: <?php echo $resident['Occupation']; ?></p>
    <?php } //end if
		else{
		?>
			<h3>No such resident in the database.</h3>
		<?php }//end else?>
    </div>


</body>
</html>