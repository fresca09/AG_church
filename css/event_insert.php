
<?php require 'includes/config.php'; ?>
<?php require 'includes/php-image-magician/php_image_magician.php'; ?>

<?php 
if (isset($_POST['submit'])) {
	$err[] = "";
	$err_flag = false;
	if (empty($_POST['title'])) {
		$err[] = 'Post must have a title';
		$err_flag = true;
	}
	else
	{
		$title = trim($_POST['title']);
	}
	if (empty($_POST['day'])) {
		$err[] = 'Post must have a day';
		$err_flag = true;
	}
	else
	{
		$day = trim($_POST['day']);
	}

	if (empty($_POST['dates'])) {
		$err[] = 'Post must have a date';
		$err_flag = true;
	}
	else
	{
		$date = trim($_POST['dates']);
	}
	if (empty($_POST['time'])) {
		$err[] = 'Post must have a time';
		$err_flag = true;
	}
	else
	{
		$time = trim($_POST['time']);
	}
	if (empty($_POST['body'])) {
		$err[] = 'Post must have a body';
		$err_flag = true;
	}
	else
	{
		$body = trim($_POST['body']);
	}
	//$date = $_POST['date'];


	if (isset($_FILES['postimg'])) {
		$img_size = $_FILES['postimg']['size'];
		$temp = $_FILES['postimg']['tmp_name'];
		$img_type = $_FILES['postimg']['type'];
		$img_name = $_FILES['postimg']['name'];

		if ($img_size > 500000) {
			$err_flag = true;
			$error = "THe image size is too large... Try again.";
		}

		$extensions = array('jpg', 'jpeg', 'png', 'gif');
		$img_ext = explode('/', $img_type);
		$img_ext = end($img_ext);
		$img_ext = strtolower($img_ext);
		if (!(in_array($img_ext, $extensions))) {
			$err_flag = true;
			$error = "Unwamted image file type... Only jpg, jpeg, png and gif allowed.";
		}
		//Preparing image folder in the server

		// $imgFile = 'post-images/';
		// $filepath = $imgFile. basename($img_name);
		// $thumb_path = "";
		// if (isset($err_flag) && $err_flag === false) {
		// 	$result = move_uploaded_file($temp, $filepath);
		// 	if ($result) {
		// 		$magicianObj = new imageLib($filepath);
	 //            $magicianObj -> resizeImage(233,233);
	 //            $magicianObj -> saveImage($imgFile . 'thumbnails/' . $filepath, 100);
	 //            $thumb_path = $imgFile . 'thumbnails/' . $filepath; 
		// 	}
		// }
	
		$imgFile = 'event-images/';
		
		$filepath = $imgFile . basename($img_name);
		$thumb_path = "";
		if (isset($err_flag) && $err_flag === false) {
			$result = move_uploaded_file($temp, $filepath);
			if ($result) {
				$magicianObj = new imageLib($filepath);
	            $magicianObj -> resizeImage(150, 150);
	            $magicianObj -> saveImage($imgFile . 'thumbnails/', 100);
				$img_path = $imgFile.$filepath;
				$thumb_path = $imgFile . 'thumbnails/' . $filepath;
			}
		}
	}
	// $user_id = intval($_SESSION['user_id']);
	if (isset($err_flag) && $err_flag === false) {
		$sql = "INSERT INTO event (event_title, event_image, event_thumb, event_desc, event_day, event_date, event_time,) VALUES ('$title', '$img_path', '$thumb_path', '$body', '$day', '$date', '$time')";
		$query = mysqli_query($conn, $sql);
		if ($query) {
			//$success = true;
			echo "Inserrtion was successful!!!";
		}
		else{
			echo "Something went wrong...";
		}
	}
}

 ?>

 <!DOCTYPE html>
<html>
<head>
	<title>Event Insertion....</title>
	<link href="css/mystyle.css" rel="stylesheet" type="text/css">
</head>
<body>

<h1>Add New Event Here</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			<form method="post" action="event_insert.php" enctype="multipart/form-data">
				<input type="text" name="title" placeholder="Event Title" required>
				<input type="file" name="postimg">
				<input type="text" name="day" placeholder="Event day" required>
				<input type="text" name="dates" placeholder="Event date" required>
				<input type="text" name="time" placeholder="Event time" required>
				<textarea name="body" placeholder="Please enter event description" style="height: 400px;"></textarea>
				<input type="hidden" name="date" value="<?php echo time(); ?>">
				<input type="submit" name="submit" value="Submit Post" required>
			</form>
		</div>
	</div>


<!-- <?php if (isset($success) && $success === true) { ?>
	<script type="text/javascript">
		swal("Good job!", "New post entry added successfully!", "success");
	</script>
	<?php } ?>	 -->

</body>
</html>
		
			