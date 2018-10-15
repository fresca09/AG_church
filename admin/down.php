<?php
require 'includes/config.php';

$id = $_GET['ID'];
$sql = "SELECT * FROM sermons WHERE id = '$id'";
$query = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($query)) {
    $path = $row['sermon_audio'];
    header('Content-Disposition: attachment; filename ='.$path);
    header('Content-type:application/octet-stream');
    header('Content-length:' .filesize($path));
    readfile($path);

}
?>
