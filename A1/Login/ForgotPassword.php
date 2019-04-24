<?php include('ForgotPasswordValidate.php'); ?>

<!DOCTYPE html>

<html>

<head>

	<link rel="stylesheet" type="text/css" href="Style.css">
	
</head>

<body>

	<h1> Enter your Credentials </h1>

	<fieldset>

		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

			<span style="color: red"> <?php echo $valid_err; ?> </span> <br> <br>
		
			<label>
			
				<strong> Email: <span style="color: red"> * </span> </strong> <br> <br>
				<input type="text" name="email" placeholder="Enter your Email-ID"> <br> <br>
				<span style="color: red"> <?php echo $email_err; ?> </span> <br> <br>
			
			</label>
			
			<label>
			
				<input type="submit" value="Send OTP"> <br> <br>
			
			</label>
			
		</form>

		<p> Not yet a Member ? <a href="Signup.php"> Sign up </a> </p>
		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		<p> Remembered Password ? <a href="Login.php"> Login </a> </p>
		
	</fieldset>

</body>

</html>