<?php 

	SESSION_start();
	
	$host = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "login";
	
	$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
	
	$username = $password1 = $password2 = $email = "";
	$username_err = $password1_err = $password2_err = $email_err = $valid_err = "" ;
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		if (empty($_POST["username"])) {
		  
			$username_err = "* Name is required";
		
		}
		else {
			
			$username = $_POST["username"];

			if(!(preg_match("/^[a-z_]{3,10}$/i", $username))) {

				$username_err = "* Username must be only 'a-z', ' _ ', >5 and <10 characters";
				
			}
			else {

				$username = filter_data($_POST["username"]);
				
				if (empty($_POST["email"])) {
		  
				$email_err = "* Email-ID is required";
			
				}
				else {

					$email = $_POST["email"];

					if(!(preg_match("/^[a-z]{3,}+(_|\.)?[a-z0-9]*(@).[a-z]+(.com|.org|.co.in)$/i", $email))) { // ? can come or not _ .

						$email_err = "* Enter a valid Email-ID";
						
					}
					else {

						$email = filter_data($_POST["email"]);


						if (empty($_POST["password1"])) {
				  
							$password1_err = "* Password is required";
					
						}
						else {
								
							$password1 = $_POST["password1"];

							if(!(preg_match("/^(?=.*\d)(?=.*[@#$%^&*!+-])(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9!@#$%^&*+-]{8,20}$/", $password1))) {

								$password1_err = "* Password must contain 'a-z', 'A-Z', one special character and atleast 8 to 20 character";
								
							}
							else {

								$password1 = filter_data($_POST["password1"]);

							}

							if (empty($_POST["password2"])) {
		  
								$password2_err = "* Password is required";
						
							}
							else {
								
								 $password2 = filter_data($_POST["password2"]);
								 
								 if ($password1 == $password2) {
						
									$password = md5($password1);
									$sql = "INSERT INTO demo (username, email, password) values('$username', '$email', '$password')";
										
									if($conn->query($sql)) {

										header("location: Login.php");
										$conn->close();
										session_unset();
				
									}
									else {
												
										$sql = "SELECT * FROM demo WHERE email = '$email' ";
										$result = mysqli_fetch_array($conn->query($sql));

										if($result["email"] == $email) {

											$valid_err = "* Email-ID already exists";
											$conn->close();
											session_unset();
						
										}
										else {

											$valid_err = "Error ". $sql . "<br>" . $conn->error;

										}
												
									}
							
								}
								else {
										
									$password1_err = "Passwords not Matched";
									$password2_err = "Passwords not Matched";
										
								}
								 
						}

					}
				
					
				}

			} 

		}

	}

}
			
	
	function filter_data($text) {
		
		$text=trim($text);
		$text=stripslashes($text);
		$text=htmlspecialchars($text);
		
		return $text;
		
	}

?>								