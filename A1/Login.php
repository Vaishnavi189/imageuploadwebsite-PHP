<?php include('ConnectValidate.php'); ?>

<!DOCTYPE html>

<html>

<head>

	<link rel="stylesheet" type="text/css" href="Style1.css">
	
</head>

<body>
</body><header>
	
<button class="btn"><a href="nav.html"><i class="fa fa-home"></i>Home</a></button>
	
	<div id="login-box">
      <div class="left-box">
<h1><center>Log in</center></h1>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

			<span style="color: red"> <?php echo $valid_err; ?> </span> 
		
			<label>
			
				<strong> Email:  </strong> 
				<input type="text" name="email"  value="<?php echo $email; ?>" > 
				<span style="color: red"> <?php echo $email_err; ?> </span> 
			
			</label>
			
			<label>
			
				<strong> Enter your Password:  </strong> 
				<input type="password" name="password"  > 
				<span style="color: red"> <?php echo $password_err; ?> </span> 
			
			</label>
			
			<label>
			
				<input type="submit" value="Login"> 
			</label>
			
		</form>
		<div></div>
		<p> Not yet a Member ? <a href="Signup.php"> Sign up </a> </p>
		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		<p> <a href="ForgotPassword.php"> Forgot Password ?</a> </p>
		

	
	
		
</div>
</header>
</body>

</html>