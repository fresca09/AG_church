<?php 
require_once 'includes/libraries.php';
require 'includes/php-image-magician/php_image_magician.php';

	if($_SERVER['REQUEST_METHOD']=="POST"){
		echo $id = sanitize(trim($_POST['id']));
		echo $day = sanitize(trim($_POST['day']));
		echo $time = sanitize(trim($_POST['time']));
		echo $address = sanitize(trim($_POST['address']));
		echo $phone = sanitize(trim($_POST['phone']));
		echo $body = sanitize(trim($_POST['body']));

			
	    $sql = "UPDATE department_details SET day = '$day', d_time = '$time', address = '$address', phone = '$phone', body = '$body' WHERE id = '$id'";
		$query = mysqli_query($conn, $sql);
		if ($query) {
			echo "Record successfully updated!!!";
		}
		else{
			echo "Not Successful!!!";
			echo mysqli_error($conn);
		}		
	}
	
 ?>