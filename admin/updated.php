<?php 

require 'includes/config.php';

	if($_SERVER['REQUEST_METHOD']=="POST"){
		$id = $_POST['id'];
		$name = $_POST['name'];

		$sql = "UPDATE updated SET name = '$name' WHERE id = '$id'";
		$query = mysqli_query($conn, $sql);
		if ($query) {
			echo "Record successfully updated!!!";
		}
		else{
			echo "Not Successful!!!";
			
		}
	}

	
 ?>