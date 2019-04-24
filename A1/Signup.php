<?php include('ConnectInsert.php'); ?>

<!DOCTYPE html>

<html>

<head>

	<link rel="stylesheet" type="text/css" href="Style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	<header>
<div >
	
<button class="btn"><a href="nav.html"><i class="fa fa-home"></i></a></button>
	
<div id="login-box">
      <div class="left-box">
		<span style="color: red"> <?php echo $valid_err; ?> </span>
		
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<h1>Sign up</h1>
			<label>
			
			
				<input type="text" name="username" placeholder="User name" value="<?php echo $username; ?>" required > 
				<span style="color: red"> <?php echo $username_err; ?> </span> 
			
			</label>
		
			<label>
				<input type="text" name="email" placeholder="E-mail" value="<?php echo $email; ?>"  required > 
				<span style="color: red"> <?php echo $email_err; ?> </span> 
			</label>
			
			<label>
			
				
				<input type="password" name="password1" placeholder="Password" value="<?php echo $password1; ?>"  required > 
				<span style="color: red"> <?php echo $password1_err; ?> </span> 
			<p>enter first letter cap and @ should be included</p> 
			</label>
			
			<label>
			
				
				<input type="password" name="password2" placeholder="Re-type Password" value="<?php echo $password2; ?>"  required > <br> <br>
				<span style="color: red"> <?php echo $password2_err; ?> </span> 
			
			</label>
			
			<label>
			
				<input type="submit" name="signup-button" value="Sign Up"> 
			
			</label>
		<p style="color:black"> Already a Member ? <a href="Login.php" style="color:black"> Login </a> </p>
		
		
	
		</form>
	</div>
		
		</form>
	
	<div class="right-box">
          <span class="signinwith">Sign in with<br/>Social Network     </span>
        
        <button class="social facebook">Log in with Facebook</button>    
        <button class="social twitter">Log in with Twitter</button> 
        <button class="social google">Log in with Google+</button> 
            
        
        </div>
        <div class="or">OR</div>
    </div>
</div>
</div>
</header>
</body>

</html>