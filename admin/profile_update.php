<?php 
	require_once 'includes/libraries.php';
	require 'includes/php-image-magician/php_image_magician.php';


	if($_SERVER['REQUEST_METHOD']=="POST"){
		$id = sanitize(trim(base64_decode($_POST['id'])));
		$fname = sanitize(trim($_POST['fname']));
		$lname = sanitize(trim($_POST['lname']));
		$username = sanitize(trim($_POST['username']));
		$email = sanitize(trim($_POST['email']));
		$phone = sanitize(trim($_POST['phone']));
		$gender = sanitize(trim($_POST['gender']));
		$password1 = sanitize(trim($_POST['password1']));
		$password2 = sanitize(trim($_POST['password2']));
		$pass = sanitize(trim($_POST['password']));
		$image_file = checkImage($_FILES["postimg"],250,250, "church-images/");

		

		if(preg_match("/[0-9]+\.[a-z]+/i", $image_file)){

			$check = "SELECT * FROM admin WHERE Password = '$pass'";
			$mquery = mysqli_query($conn, $check);
			if (mysqli_num_rows($mquery)){

				if ($password1 == $password2) {
			$password = $password1;

			$sql_stmt = "UPDATE admin SET Fname = '$fname', Lname = '$lname', Username = '$username', Email = '$email', Gender = '$gender', Phone='$phone', Password = '$password', Image = '$image_file' WHERE ID = '$id'";
			$result = mysqli_query($conn, $sql_stmt);
		if ($result) {
			echo "Updated Successfully";
			
		}
		else{
			echo mysqli_error($conn);
		}
		}
		else{
			echo "Password don't match";
		}	
		
			
	}
			
		else{
			echo "Old password is incorrect";
		}
		}	
		else{
			echo "There was an error with the image";
			echo mysqli_error($conn);
		}

	}
 
 ?>