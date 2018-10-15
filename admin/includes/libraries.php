<?php 
require 'config.php';
//$conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);


function cleanInput($input) {

  $search = array(
    '@<script[^>]*?>.*?</script>@si',   // Strip out javascript
    '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
    '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
    '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
  );

    $output = preg_replace($search, '', $input);
    return $output;
  }
?>

<?php
function sanitize($input) {
$dbhost = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "church_db";
$link = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);
    if (is_array($input)) {
        foreach($input as $var=>$val) {
            $output[$var] = sanitize($val);
        }
    }
    else {
        if (get_magic_quotes_gpc()) {
            $input = stripslashes($input);
        }
        $input  = cleanInput($input);
        $output = mysqli_real_escape_string($link, $input);
    }
    return $output;
}

function insertDB($sql_stm, $db_link){
	$query = mysqli_query($sql_stm, $db_link);
	$msg_str = urlencode("Action successful");
	if ($query) {
		header("Location: dashboard.php?msg=$msg_str");
		exit();
	}
}

function selectDB($sql_stm, $db_link)
{
	$query = mysqli_query($sql_stm, $db_link);
	if (mysqli_num_rows($query) > 1) {
		$result = mysqli_fetch_assoc($query);
		return $result;
	}
}


