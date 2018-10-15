<?php 
require 'includes/config.php';

$country = $_GET['country'];
//$state = $_GET['state'];

if ($country!="") {
	$sql = "SELECT state.state FROM state JOIN country ON state.country_id = country.id WHERE country_id = $country";
	$query = mysqli_query($conn, $sql);
	echo "<select class='form-control' name='state'>";
	echo "<option>Select State</option>";
	while ($row = mysqli_fetch_array($query)) {
		echo "<option value='$row[id]'>"; echo $row['state']; echo "</option>";
	}
	echo "</select>";
}


 ?>