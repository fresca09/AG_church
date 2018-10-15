<?php
// connect to the database

$host = 'localhost';
$user = 'root';
$password = '';
$db = 'search';

$conn = mysqli_connect($host, $user, $password, $db) or die("Failed to connect to database");
//$result = mysqli_select_db($db, $conn) or die("Failure selecting database");

$sql = "SELECT * FROM member ";

            if (isset($_POST['search'])) {

                $search_term = mysqli_real_escape_string($_POST['search-box']);

                $sql .= "WHERE MB_COUNTY = '{$search_term}' ";
            }

            $query = mysqli_query($conn,$sql) or die(mysqli_error());
?>

<!DOCTYPE html>
<html>
<head>
	<title>Searching...</title>
</head>
<body>

<form name="search_form" method="POST" action="stockists.php">
            Search: <input type="text" name="search_box" value=" "/>
            <input type="submit" name="search" value="Search the stockists...">
            </form>

            <table width="70%" cellpadding="5" cellspace="5">

            <tr>
                <td><strong>Company Name</strong></td>
                <td><strong>Website</strong></td>
                <td><strong>Phone</strong></td>
                <td><strong>Address</strong></td>
            </tr>

            <?php while ($row = mysqli_fetch_array($query)) {?>
            <tr>
                <td><?php echo $row['MB_COMPANY'];?></td>
                <td><?php echo $row['MB_MOBILE'];?></td>
                <td><?php echo $row['MB_PHONE'];?></td>
                <td><?php echo $row['MB_COUNTY'];?></td>
            </tr>

            <?php } ?>
            </table>

</body>
</html>