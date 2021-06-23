<?php 
include('db_config.php');

	//write query for all residents
	$sql = "SELECT `LastName`,`FirstName`,`MI`,`resident_id`,`purok_id`,`House_Num`,`resident_id`,`Gender` FROM `resident` ORDER BY `resident_id`";

	//make query and get the results
	$result = mysqli_query($conn, $sql);
	if(!$result){
		echo 'Connection error'.mysqli_connect_error();
	}
	$residents = mysqli_fetch_all($result, MYSQLI_ASSOC);

	//close connection
	mysqli_close($conn);

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
		.body{
			margin-top:15vh;
		}
		
		.main {
			width:65%;
			margin:-50px 15vw 5vw;
			background-color:#9aae09;
			color:#9aae09;
			animation-name:intro;
			animation-duration:1s;
			transition:.2s all ease-in;
		}
		.main:hover{
			padding:20px 0 20px 0;
			background-color:#586119;
			transition:.2s all ease-in;
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
				Barangay Database - List of all Residents
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


	<div class="body" >
		
		<br><br>
		<?php
            	foreach ($residents as $resident) {
            ?>
        <div class="main">
            <a href="moreinfo.php?id=<?php echo $resident['resident_id'] ?>" >
            <div class="main_txt" >
                <h2><?php echo $resident['LastName']; ?>, <?php echo $resident['FirstName']; ?> <?php echo $resident['MI']; ?></h2>
                <h4>ID Number: <?php echo $resident['resident_id']; ?></h4>
                <p>Gender: <?php echo $resident['Gender']; ?></p>
                <p>Address: <?php echo $resident['House_Num']; ?>: <?php //purok id
                if($resident['purok_id']){
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
                } ?> </p>
				<p> Click For More Information</p>
		   </div>

        	
        </div>
            <?php } //end of foreach
            ?>
		
        
		</div>
    </div>

</body>
</html>