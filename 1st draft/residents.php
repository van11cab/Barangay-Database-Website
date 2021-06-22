<?php 
include('db_config.php');

	//write query for all residents
	$sql = "SELECT `LastName`, `FirstName`, `MI`, `resident_id` FROM `resident` ORDER BY `resident_id`";

	//make query and get the results
	$result = mysqli_query($conn, $sql);
	if(!$result){
		echo 'Connection error'.mysqli_connect_error();
	}
	$residents = mysqli_fetch_all($result, MYSQLI_ASSOC);

	//mysli_free_result($result);
	mysqli_close($conn);
	//print_r($residents);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Residents</title>
</head>
<body>
	<h4>Sample view of residents</h4>
	<div>
		<div>
			<?php
				foreach ($residents as $resident) {
			?> 
				
				<div>
					<?php
					echo $resident['LastName'].", ";
					echo $resident['FirstName']. " ";
					echo $resident['MI'];
					?>
				</div>
				<div>
					<a href="details.php?id=<?php echo $resident['resident_id'] ?>">More info</a>
				</div>
			
			<?php 

			} //closing for for each

			?>
		
		</div>
	</div>
</body>
</html>