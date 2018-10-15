<?php 
require_once 'includes/libraries.php';
  require 'includes/php-image-magician/php_image_magician.php';

if($_SERVER['REQUEST_METHOD']=="POST"){
    $id = sanitize(trim($_POST['id']));
    $fname = sanitize(trim($_POST['fname']));
    $lname = sanitize(trim($_POST['lname']));
    $username = sanitize(trim($_POST['username']));
    $email = sanitize(trim($_POST['email']));
    $phone = sanitize(trim($_POST['phone']));
    $gender = sanitize(trim($_POST['gender']));
    $pass = sanitize(trim($_POST['password']));
    $image_file = checkImage($_FILES["postimg"],100,100, "church-images/");

    $sql = "UPDATE admin SET Fname = '$fname', Lname = '$lname', Username = '$username', Email = '$email', Gender = '$gender', Phone = '$phone', Password = '$pass', Image = '$image_file' WHERE ID = '$id'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
      echo "Record successfully updated!!!";
      echo $id;
      echo $fname;
    }
    else{
      echo "Not Successful!!!";
      
    }
}

 ?>

