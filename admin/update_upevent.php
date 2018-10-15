<?php 
require_once 'includes/libraries.php';
require 'includes/php-image-magician/php_image_magician.php';

	if($_SERVER['REQUEST_METHOD']=="POST"){
		$id = sanitize(trim($_POST['id']));
		$title = sanitize(trim($_POST['title']));
		$day = sanitize(trim($_POST['day']));
		$day_no = sanitize(trim($_POST['day_no']));
		$time = sanitize(trim($_POST['time']));
		$phone = sanitize(trim($_POST['phone']));
		$month = sanitize(trim($_POST['month']));
		$location = sanitize(trim($_POST['location']));
		$body = sanitize(trim($_POST['body']));
		$image_file = checkImage($_FILES['postimg'],650,330, "church-images/");

		if (preg_match("/[0-9]+\.[a-z]+/i", $image_file)) {
			
	    $sql = "UPDATE events SET eTitle = '$title', eDay = '$day', eDay_no = '$day_no', eTime = '$time', ePhone = '$phone', eLocation = '$location', eImage = '$image_file', eDesc = '$body', month_id = '$month' WHERE ID = '$id'";
		$query = mysqli_query($conn, $sql);
		if ($query) {
			echo "Record successfully updated!!!";
		}
		else{
			echo "Not Successful!!!";
			echo mysqli_error($conn);
		}

	    

		}
		else{
			echo "Field is empty!!!";
			echo mysqli_error($conn);
		}

		
		
	}


	

	
 ?>