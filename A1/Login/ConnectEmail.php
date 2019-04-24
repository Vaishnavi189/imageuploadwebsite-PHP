<?php 

	session_start(); 

	$host = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "login";

	if($_SESSION["email"] == true) {

		$email = $_SESSION["email"];
		$otp = rand(123456,987654);
		$otpt = "OTP to change password for your Online Rentals account is ". $otp;
		$subject = "Password Reset for your account of online rentals";
		$from = "Form ";
		
	}
	else {

		header("location: Login.php");

	}

	

	$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
	$sql = "UPDATE demo SET otp = '$otp' WHERE email = '$email' ";

	if ($conn->query($sql)) {

		if(mail("Email: ".$email, $subject, $otpt, "From: ". $from)) {

			$_SESSION["email"] = $email;
			header("location: ChangePassword.php");

		}

	}
	else {

			$valid_err = "* Enter a valid Email-Id";

	}

	$conn->close();
	
?>
