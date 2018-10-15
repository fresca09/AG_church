<?php 
require_once 'includes/libraries.php';
require 'includes/php-image-magician/php_image_magician.php';

	if($_SERVER['REQUEST_METHOD']=="POST"){
		$id = sanitize(trim($_POST['id']));
		$title = sanitize(trim($_POST['title']));
		$author = sanitize(trim($_POST['author']));
		$category = sanitize(trim($_POST['category']));
		$body = sanitize(trim($_POST['body']));
		$image_file = checkImage($_FILES['postimg'],200,250, "church-images/");

		$pdf_file = checkPdf($_FILES['filename'], "church_files");
		

		if (preg_match("/[0-9]+\.[a-z]+/i", $image_file)) {
			
	    	$sql = "UPDATE books SET book_title = '$title', book_author = '$author', book_image = '$image_file', book_pdf = '$pdf_file', book_desc = '$body', cat_id = '$category' WHERE ID = '$id'";
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