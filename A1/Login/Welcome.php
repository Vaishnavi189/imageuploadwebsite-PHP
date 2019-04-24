<?php include('ConnectWelcome.php'); ?>

<!DOCTYPE html>

<html>

<head>
	
	<link rel="stylesheet" type="text/css" href="Style.css">
	
</head>

<body>

	<h1> <?php echo "Welcome ". $result["username"]?> </h1>

	<a href="Logout.php"> Logout </a>

</body>	

</html>