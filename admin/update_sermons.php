<?php 
require_once 'includes/libraries.php';
require 'includes/php-image-magician/php_image_magician.php';

	if($_SERVER['REQUEST_METHOD']=="POST"){
		$id = sanitize(trim($_POST['id']));
		$topic = sanitize(trim($_POST['topic']));
		$speaker = sanitize(trim($_POST['speaker']));
		$category = sanitize(trim($_POST['category']));
		//$body = sanitize(trim($_POST['body']));
		$image_file = checkImage($_FILES['postimg'],300,320,"church-images/");
		//$audio_file = check_aud($_FILES['audio'], "church-audio");

        $dat = "church-audio/";
        $audio_file = $dat.basename($_FILES['audio']['name']);
        move_uploaded_file($_FILES['audio']['tmp_name'], $audio_file);

		//$pdf_file = ($_FILES['file_pdf']==null) ? "update table " : "update without im";
//		if (preg_match("/[0-9]+\.[a-z]+/i", $image_file)) {

		// (($image_file == NULL) && ($audio_file == NULL)) ?
	
	    	$sql = "UPDATE sermons SET sermon_topic = '$topic', sermon_speaker = '$speaker', sermon_image = '$image_file', sermon_audio = '$audio_file', cat_id = '$category' WHERE ID = '$id'";
		$query = mysqli_query($conn, $sql);
		if ($query) {
			echo "Record successfully updated!!!";
			//echo $audio_file;
		}
		else{
			echo "Not Successful!!!";
			echo mysqli_error($conn);
		}

	    

//		}
//		else{
//			echo "Field is empty!!!";
//			echo mysqli_error($conn);
//		}

		
		
	}


	

	
 ?>