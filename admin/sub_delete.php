<?php
/**
 * Created by PhpStorm.
 * User: Fresca
 * Date: 27/09/2018
 * Time: 11:48 AM
 */

require "includes/config.php";
$msgs = "";

    $id = $_POST['id'];

    //$sql = ;
    $query = mysqli_query($conn, "DELETE FROM newsletter WHERE ID = '".$id."'");
    if ($query){
        $msgs = "Yes";
    }
    else{
        $msgs = "No";
    }

?>