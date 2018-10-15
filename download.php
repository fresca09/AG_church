<?php 
	require_once 'includes/libraries.php';

	$id = base64_decode($_GET['ID']);
	$sql = "SELECT * FROM books WHERE ID = '$id'";
	$query = mysqli_query($conn, $sql);
	while ($row = mysqli_fetch_assoc($query)) {
		$path = $row['book_pdf'];
        $path = 'admin/'.$path;
		header('Content-Disposition: attachment; filename ='.$path);
		header('Content-Type: application/octet-stream');
		header('Content-Length: ' . filesize($path));
		readfile($path);

	}

//if (isset($_GET['row'])){
//
//    $path = $_GET['row'];
//    $sql = "SELECT * FROM books WHERE book_pdf = '$path'";
//    $query = mysqli_query($conn, $sql);
//
//    header('Content-Type: application/octet-stream');
//    header('Content-Disposition: attachment; filename="'.basename($path).'"');
//    header('Content-Length: ' . filesize($path));
//    readfile($path);
//}
 ?>

