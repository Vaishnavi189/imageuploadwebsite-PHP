<?php
include("inc/db.php");

if (isset($_POST['submit'])) {
	$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

        $img_path = $_FILES["fileToUpload"]["name"];

        $sql = "INSERT INTO photo (img_path)
		VALUES ('$img_path')";

		if ($conn->query($sql) === TRUE) {
		    echo "New Image Uplaod successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}


    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
	
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<style>
		.btn {
  margin-bottom: 28px;
    width: 160px;
    height: 32px;
    background: white;
    border: none;
    border-radius: 0.5px;
    color: black;
    font-family: sans-serif;
    font-weight: 500;
text-decoration: none;
    transition: 0.7s ease;
    cursor: pointer;
    text-decoration:none;
    font-size: 20px;
}

.btn1:hover,
.btn1:focus
{
    background: #ff5722;
    transition: 0.5s ease;
}</style>
  <title>Image Upload</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	
			<div class="col-sm-8">
				<center><h3>Uploaded Images</h3></center>
				<div class="row">
				<?php 
				$sql = "SELECT img_path FROM photo ORDER BY id";
				$result = mysqli_query($conn, $sql);

				if (mysqli_num_rows($result) > 0) {
				    // output data of each row
				    while($row = mysqli_fetch_assoc($result)) {
				       echo "
				        <div class='col-sm-4 thumbnail'>
						<img src='upload/".$row["img_path"] ."' style='width: 100%;'>
					    </div>";
				    }
				} else {
				    echo '0 results';
				}


				 ?>	
				</div>
			</div>
			&nbsp&nbsp&nbsp&nbsp&nbsp
		<div class="btn btn1">
			
		<a href="Welcome.php"><span style="color:black">Upload another files</span></a>
			
			</div>&nbsp&nbsp&nbsp&nbsp&nbsp<div class="btn btn1">
				<a href="Logout.php"> <span style="color:black">Logout</span> </a>
			</div>
</body>
</html>
