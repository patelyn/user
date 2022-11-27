<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Locate Me</title>
<?php
$localIP = getHostByName(getHostName());
//echo $localIP;
//echo "<br>";
//get host by name
//echo gethostname();
?>
<script>
function getLocation()
{
  // Check whether browser supports Geolocation API or not
  if (navigator.geolocation) { // Supported
  
    // To add PositionOptions
	
	navigator.geolocation.getCurrentPosition(getPosition);
  } else { // Not supported
	alert("Oops! This browser does not support HTML Geolocation.");
  }
}
function getPosition(position)
{
  document.getElementById("location").value = + position.coords.latitude;
  document.getElementById("location1").value = + position.coords.longitude;
  //document.getElementById("Name").value= + position.coords.longitude;  
}
function revFunction() {
  document.getElementById("submit").disabled = false;
}
document.getElementById("ip_address").value= + position.coords.localIP;
    
</script>
</head>
<body>
<center>
<button onclick="getLocation();revFunction();">Locate Me</button><br><br>
<form action="insert.php" method="post">
<input name="first_name" id="first_name" placeholder="First name"><br><br>
<input name="last_name" id="last_name" placeholder="Last name"><br><br>
<input type="hidden" name="latitude" id="location" readonly="readonly">
<input type="hidden" name="longitude" id="location1" readonly="readonly">
<input name="ip_address" id="ip_address" readonly="readonly" value="<?php echo $localIP; ?>"><br><br>
<input name="host_name" id="host_name" readonly="readonly" value="<?php echo gethostname(); ?>"><br><br>
<button id="submit" type="Submit" disabled>Submit</button>
</form>
</center>
</body>
</html>