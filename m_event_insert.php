
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
	if (empty($_POST['number'])) {
		$err[] = 'Post must have a number';
		$err_flag = true;
	}
	else
	{
		$number = trim($_POST['number']);
	}

	if (empty($_POST['month'])) {
		$err[] = 'Post must have a month';
		$err_flag = true;
	}
	else
	{
		$month = trim($_POST['month']);
	}
	if (empty($_POST['body'])) {
		$err[] = 'Post must have a body';
		$err_flag = true;
	}
	else
	{
		$body = trim($_POST['body']);
	}
	$date = $_POST['date'];


	if (isset($_FILES['postimg'])) {
		$img_size = $_FILES['postimg']['size'];
		$temp = $_FILES['postimg']['tmp_name'];
		$img_type = $_FILES['postimg']['type'];
		$img_name = "thumbnails".$_FILES['postimg']['name'];

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
		
	
		$imgFile = 'post-images/';
		
		$filepath = $imgFile . basename($img_name);
		$thumb_path = "";
		if (isset($err_flag) && $err_flag === false) {
			$result = move_uploaded_file($temp, $filepath);
			if ($result) {
				$magicianObj = new imageLib($filepath);
	            $magicianObj -> resizeImage(150, 150);
	            $magicianObj -> saveImage($imgFile . 'thumbnails/', 100);
				$img_path = $imgFile.$filepath;
				$thumb_path =$filepath;
			}
		}
	}
	// $user_id = intval($_SESSION['user_id']);
	if (isset($err_flag) && $err_flag === false) {
		$sql = "INSERT INTO m_event (event_name, month_id, event_num, event_image, event_thumb, event_date, event_desc) VALUES ('$title', '$month', '$number', '$img_path', '$thumb_path', '$date', '$body')";
		$query = mysqli_query($conn, $sql);
		if ($query) {
			$success = true;
		}
		else{
			//echo "Something went wrong...";
			echo mysqli_error($conn);
		}
	}
}

 ?>

 <!DOCTYPE html>
<html>
<head>
	<title>Monthly Events Insertion....</title>
	<link href="css/style1.css" rel="stylesheet" type="text/css">
</head>
<body>

<h1>Add Monthly Events Here</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			<form method="post" action="m_event_insert.php" enctype="multipart/form-data">
				<input type="text" name="title" placeholder="Event Name" required>
				<input type="text" name="number" placeholder="Enter Number" required>
				<select name="month">
					<option value="0">Select Month</option>
					<?php 
						$sql = "SELECT * FROM months";
						$query = mysqli_query($conn, $sql);
						if (mysqli_num_rows($query) > 0) {
							while ($row = mysqli_fetch_assoc($query)) {
								$month = $row['month'];
								$month_id = $row['ID'];
					 ?>
					<option value="<?php echo $month_id; ?>"><?php echo $month; ?></option>
					<?php } } ?>
				</select>
				<input type="file" name="postimg">
				<textarea name="body" placeholder="Please enter event description"></textarea>
				<input type="hidden" name="date" value="<?php echo time(); ?>">
				<input type="submit" name="submit" value="Submit Post" required>
			</form>
		</div>
	</div>


<?php if (isset($success) && $success === true) { ?>
	<script type="text/javascript">
		swal("Good job!", "New post entry added successfully!", "success");
	</script>
	<?php } ?>	

</body>
</html>
		

