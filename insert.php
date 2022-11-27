<!DOCTYPE html>
<html>
<head>
	<title>Submit</title>
</head>

<body>
	<center>
		<?php
	
		$servername = "localhost";
		$username = "root";
		$password = "";
		$database = "db_contact";
		
		$conn = new mysqli($servername, $username, $password, $database);
		
		// Check connection
		if($conn === false){	
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
		// Taking all values from the form data(input)	
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$ip_address = $_POST['ip_address'];
		$host_name = $_POST['host_name'];	
		$latitude = $_POST['latitude'];
		$longitude = $_POST['longitude'];
			
			
		// Performing insert query execution
		$sql = mysqli_query($conn, "SELECT host_name FROM user_info where host_name = '$host_name'");
		if(mysqli_num_rows($sql) > 0){
			echo('Host name Already exists');
		}
		else{
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$result = mysqli_query($conn, "INSERT INTO user_info VALUES ('$first_name','$last_name','$ip_address','$host_name','$latitude', '$longitude')");
		}
			echo('Record Entered Successfully');
		}

		//$sql = "INSERT INTO tbl_contact VALUES ('$latitude','$longitude')";
		
		//if(mysqli_query($conn, $sql)){
		//	echo "<h3>Submitted successfully.</h3>";
		//} 
		//else{
		//	echo "ERROR: Hush! Sorry $sql. "
		//		. mysqli_error($conn);
		//}
		
		// Close connection
		mysqli_close($conn);
		?>
	</center>
</body>

</html>
