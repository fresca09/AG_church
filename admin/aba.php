<?php 
	require_once 'includes/libraries.php';
	require 'includes/php-image-magician/php_image_magician.php';

	if (isset($_GET['submit'])) {
		echo $name = $_GET['user'];
		echo $file = checkFile($_FILES["myFile"], "200", "234", "img/");

		$sql = "INSERT INTO upload (name, pdf_file) VALUES ('$name'; '$file')";
		$query = mysqli_query($conn, $sql);
		if ($query) {
			echo "File inserted";
		}
		else{
			echo "File not insert!!!";
		}
	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Aba testing...</title>
</head>
<body>

	<form method="get" action="aba.php" enctype="multipart/form-data">
		<input type="text" name="user" placeholder="Enter Name" required>
		<input type="file" name="myFile">
		<input type="submit" name="submit" value="Submit">
	</form>

</body>
</html>