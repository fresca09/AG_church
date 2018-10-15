<?php 
require_once 'includes/libraries.php';

	if($_SERVER['REQUEST_METHOD']=="POST"){
		$id = sanitize(trim($_POST['id']));
	
		$sql = "DELETE FROM sermons WHERE ID ='$id'";
		$query = mysqli_query($conn, $sql);
		if ($query) {
			echo "Delete was successful!!!";
		}
		else{
			echo "Delete not successful!!!";
			echo mysqli_error($conn);
		}
		
	}

 ?>