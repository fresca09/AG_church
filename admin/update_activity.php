<?php
require_once 'includes/libraries.php';
require 'includes/php-image-magician/php_image_magician.php';

if($_SERVER['REQUEST_METHOD']=="POST"){
    $id = sanitize(trim($_POST['id']));
    $activity = sanitize(trim($_POST['activity']));
    $act_time = sanitize(trim($_POST['act_time']));
    $act_day = sanitize(trim($_POST['act_day']));
    $body = sanitize(trim($_POST['body']));
    $image_file = checkImage($_FILES['postimg'],300,200,"church-images/");


    $sql = "UPDATE activities SET activity = '$activity', act_time = '$act_time', act_day = '$act_day', act_image = '$image_file', act_desc = '$body' WHERE ID = '$id'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo "Record successfully updated!!!";
    }
    else{
        echo "Not Successful!!!";
        echo mysqli_error($conn);
    }

}





?>