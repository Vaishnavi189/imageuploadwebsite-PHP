<?php include('ChangePasswordInsert.php'); ?>

<!DOCTYPE html>

<html>

<head>

	<link rel="stylesheet" type="text/css" href="Style.css">
	
</head>

<body>

	<h1> Enter valid Credentials </h1>

	<fieldset>

		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

			<span style="color: red"> <?php echo $valid_err; ?> </span> <br> <br>

			<label>
			
				<strong> Email: <span style="color: red"> * </span> </strong> <br> <br>
				<input type="text" name="email" placeholder="Enter your Email-ID" value = "<?php if(isset($_SESSION['email'])) { echo $_SESSION['email']; } else { echo "Enter your Email-ID"; } ?>" disabled=""> <br> <br>
			
			</label>
		
			<label>
			
				<strong> Enter OTP: <span style="color: red"> * </span> </strong> <br> <br>
				<input type="password" name="otp" placeholder="Enter OTP sent to your Email-ID" > <br> <br>
				<span style="color: red"> <?php echo $otp_err; ?> </span> <br> <br>
			
			</label>
			
			<label>
			
				<strong> Enter your Password: <span style="color: red"> * </span> </strong> <br> <br>
				<input type="password" name="password1" placeholder="Enter your Password"> <br> <br>
				<span style="color: red"> <?php echo $password1_err; ?> </span> <br> <br>
			
			</label>
			
			<label>
			
				<strong> Re-Enter your Password: <span style="color: red"> * </span> </strong> <br> <br>
				<input type="password" name="password2" placeholder="Re-Enter your Password"> <br> <br>
				<span style="color: red"> <?php echo $password2_err; ?> </span> <br> <br>
			
			</label>
			
			<label>
			
				<input type="submit" value="Change Password"> <br> <br>
			
			</label>
		
		</form>

		<p> Not received OTP ? <a href="ConnectEmail.php"> Resend </a> </p>
		&nbsp&nbsp&nbsp&nbsp&nbsp
		<p> Remembered Password ? <a href="Login.php"> Login </a> </p>
		
	</fieldset>

</body>

</html>