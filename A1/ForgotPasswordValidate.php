<?php 
	
	SESSION_start();

	$host = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "login";
	
	$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
	
	$email = "";
	$email_err = $valid_err = "" ;
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		if (empty($_POST["email"])) {
		  
			$email_err = "* Email-ID is required";
			
		}
		else {

			$email = $_POST["email"];

			if(!(preg_match("/^[a-z]{3,}+(_|\.)?[a-z0-9]*(@).[a-z]+(.com|.org|.co.in)$/i", $email))) { // ? can come or not _ .

				$valid_err = "* Enter a valid Email-ID";
						
			}
			else {
				
				$email = filter_data($_POST["email"]);
		
				$sql = "SELECT * FROM demo WHERE email = '$email' ";
					 
					if ($conn->query($sql)) {
						
						$result = mysqli_fetch_array($conn->query($sql));
						
						if ($email == $result["email"]) {

								$_SESSION["email"] = $email;
								header("location: ConnectEmail.php");

						}
						else {

							$valid_err = "* It seems you are not registered";

						}

					}

					$conn->close();

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