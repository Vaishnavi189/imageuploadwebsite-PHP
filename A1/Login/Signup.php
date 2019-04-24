<?php include('ConnectInsert.php'); ?>

<!DOCTYPE html>

<html>

<head>

	<link rel="stylesheet" type="text/css" href="Style.css">
	
</head>

<body>

	<h1> Sign Up </h1>

	<fieldset>

		<span style="color: red"> <?php echo $valid_err; ?> </span> <br> <br>
		
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		
			<label>
			
				<strong> Name: <span style="color: red"> * </span> </strong> <br> <br>
				<input type="text" name="username" placeholder="Enter your name" value="<?php echo $username; ?>" > <br>
				<span style="color: red"> <?php echo $username_err; ?> </span> <br> <br>
			
			</label>
		
			<label>
			
				<strong> Email: <span style="color: red"> * </span> </strong> <br> <br> 
				<input type="text" name="email" placeholder="Enter your Email-ID" value="<?php echo $email; ?>" > <br> <br>
				<span style="color: red"> <?php echo $email_err; ?> </span> <br> <br>
				
			</label>
			
			<label>
			
				<strong> Enter your Password: <span style="color: red"> * </span> </strong> <br> <br>
				<input type="password" name="password1" placeholder="Enter your Password" value="<?php echo $password1; ?>" > <br> <br>
				<span style="color: red"> <?php echo $password1_err; ?> </span> <br> <br>
			
			</label>
			
			<label>
			
				<strong> Re-Enter your Password: <span style="color: red"> * </span> </strong> <br> <br>
				<input type="password" name="password2" placeholder="Re-Enter your Password" value="<?php echo $password2; ?>" > <br> <br>
				<span style="color: red"> <?php echo $password2_err; ?> </span> <br> <br>
			
			</label>
			
			<label>
			
				<input type="submit" name="Signup" value="Sign Up"> <br> <br>
			
			</label>
			
		</form>
		
		<p> Already a Member ? <a href="Login.php"> Login </a> </p>
		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		<p> <span style="color: red">*</span> Fields are Mandatory </p>
		
	</fieldset>

</body>

</html>