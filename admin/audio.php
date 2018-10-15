<?php 
	require 'includes/config.php';

	// if (isset($_POST['save_audio']) && $_POST['save_audio'] == "Upload_audio") {
	// 	$dat = "church-audio/";
	// 	$path = $dat.basename($_FILES['audio']['name']);
	// 	if (move_uploaded_file($_FILES['audio']['tmp_name'], $path)) {
	// 		echo "Upload successful";
	// 		saveAudio($path);
	// 	}
	// }

	// function saveAudio($fileName){
	// 	$conn = mysqli_connect("localhost", "root", "", "church_db");
	// 	if (!$conn) {
	// 		die('Server not connected');
	// 	}
		
	// 	$sql = "INSERT INTO audio (filename) VALUES ('$fileName')";
	// 	$query = mysqli_query($conn, $sql);
	// 	if (mysqli_affected_rows($conn) > 0) {
	// 		echo "Audio file saved in the database";
	// 	}
	// 	mysqli_close($conn);
	// }


	if (isset($_POST['save_audio']) && $_POST['save_audio'] == "Upload_audio") {
		$dat = "church-audio/";
		$path = $dat.basename($_FILES['audio']['name']);
		move_uploaded_file($_FILES['audio']['tmp_name'], $path);

		$sql = "INSERT INTO audio (filename) VALUES ('$path')";
		$query = mysqli_query($conn, $sql);
		if (mysqli_affected_rows($conn) > 0) {
			echo "Audio file saved in the database";
		}
		}
	
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Add audio...</title>
</head>
<body>

	<form method="post" action="audio.php" enctype="multipart/form-data">
		<input type="file" name="audio">
		<input type="submit" name="save_audio" value="Upload_audio">
	</form>

</body>
</html>