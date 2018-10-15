<?php
/**
 * Created by PhpStorm.
 * User: Fresca
 * Date: 24/09/2018
 * Time: 09:28 AM
 */
require_once 'includes/libraries.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Displaying check...</title>
</head>
<body>

<?php
$sql = "SELECT * FROM sermons";
$query = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($query)) {
    $name = $row['sermon_topic'];
    $image = $row['sermon_image'];
    $path = $row['sermon_audio'];
    $ID = urldecode($row['ID']);
    ?>
    <img src="<?php echo $image ?>" width="200px" height="200px" />
    <p><?php echo "<a href='down.php?ID=$ID'>Download</a>" ?> <?php echo $name; ?></p>

    <?php
}
?>
<p><a href="index.php">Click</a> to go back to Uploading Page</p>


</body>
</html>
