<?php 
	require_once 'includes/libraries.php';

	$id = base64_decode($_GET['ID']);
	$sql = "SELECT * FROM sermons WHERE ID = '$id'";
	$query = mysqli_query($conn, $sql);
	while ($row = mysqli_fetch_assoc($query)) {
		$path = $row['sermon_audio'];
        $path = 'admin/'.$path;
        $path= preg_replace("/^church-audio/i", "", $path);
		header('Content-Disposition: attachment; filename ='.$path);
		header('Content-type:application/octet-stream');
		header('Content-length:' .filesize($path));
		readfile($path);

	}
 ?>

