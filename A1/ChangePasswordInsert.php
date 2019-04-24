<?php 

	session_start();
	
	$host = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "login";
	
	$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
	
	$otp = $password1 = $password2 = "";
	$otp_err = $password1_err = $password2_err = $valid_err = "" ;
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		if (empty($_POST["otp"])) {
		  
			$otp_err = "* OTP is required";
		
		}
		else {
			
			$otp = filter_data($_POST["otp"]); 
				 
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
						$email = $_SESSION["email"];
						$sql = "UPDATE demo SET password= '$password' WHERE email = '$email' ";
								
						if($conn->query($sql)) {

							$sql = "SELECT * FROM demo where email = '$email' ";
							$result = mysqli_fetch_array($conn->query($sql));

							if($otp == $result["otp"]) {

								$_SESSION["email"] = "Enter your Email-Id";
								header("location: Login.php");
								
							}
							else {

								$valid_err = "OTP entered is Incorrect";

							}

						}
						else {
										
							echo "Error". $sql . "<br>" . $conn->error;
										
						}

						$conn->close();
					
					}
					else {
								
						$password1_err = "Passwords not Matched";
						$password2_err = "Passwords not Matched";
								
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