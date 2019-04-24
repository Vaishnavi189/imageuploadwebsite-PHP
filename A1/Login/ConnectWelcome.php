<?php 

	SESSION_start(); 

	$host = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "login";

	if($_SESSION["email"] == true) {

		

	}
	else {

		header("location: Login.php");

	}

	$email = $_SESSION["email"];

	$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
	$sql = "SELECT * FROM demo WHERE email = '$email' ";
	$result = mysqli_fetch_array($conn->query($sql));
	
?>
