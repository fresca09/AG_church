<?php 
require_once 'includes/libraries.php';
require 'includes/php-image-magician/php_image_magician.php';

	if($_SERVER['REQUEST_METHOD']=="POST"){
		echo $id = sanitize(trim($_POST['id']));
		echo $title = sanitize(trim($_POST['title']));
		echo $time = sanitize(trim($_POST['time']));
		$phone = sanitize(trim($_POST['phone']));
		$month = sanitize(trim($_POST['month']));
		$location = sanitize(trim($_POST['location']));
		$body = sanitize(trim($_POST['body']));
		$image_file = checkImage($_FILES['postimg'],650,330,"church-images/");

		if (preg_match("/[0-9]+\.[a-z]+/i", $image_file)) {
			
	    	$sql = "UPDATE m_event SET event_name = '$title', month_id = '$month', event_num = '$phone', event_time = '$time', event_location = '$location', event_image = '$image_file', event_desc = '$body' WHERE ID = '$id'";
		$query = mysqli_query($conn, $sql);
		if ($query) {
			$msg = "Record successfully updated!!!";
		}
		else{
            $msg = "Not Successful!!!";
			echo mysqli_error($conn);
		}

	    

		}
		else{
            $msg = "Field is empty!!!";
			echo mysqli_error($conn);
		}

		
		
	}


	

	
 ?>