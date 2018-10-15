<?php
/**
 * Created by PhpStorm.
 * User: Fresca
 * Date: 28/09/2018
 * Time: 10:54 AM
 */

require_once 'includes/libraries.php';
$msg = "";
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $err[] = "";
    $err_flag = false;
    if (empty($_POST['name'])) {
        $err[] = 'Post must have a name';
        $err_flag = true;
    }
    else
    {
        $name = trim($_POST['name']);
    }

    if (empty($_POST['email'])) {
        $err[] = 'Post must have a email';
        $err_flag = true;
    }
    else
    {
        $email = trim($_POST['email']);
    }

    if (empty($_POST['phone'])) {
        $err[] = 'Post must have a phone';
        $err_flag = true;
    }
    else
    {
        $phone = trim($_POST['phone']);
    }
    if (empty($_POST['message'])) {
        $err[] = 'Post must have a message';
        $err_flag = true;
    }
    else
    {
        $message = trim($_POST['message']);
    }
    $date = $_POST['date'];
//    $name = $_POST['name'];
//    $email = $_POST['email'];
//    $phone = $_POST['phone'];
//    $message = $_POST['message'];
//    $date = $_POST['date'];

    $sql = "INSERT INTO contact_messages (name, email, phone, message, msg_date) VALUES ('$name', '$email', '$phone', '$message', '$date')";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        //$msg = true;
        $msg = "Sent";
    }
    else{
        //$msg = false;
        $msg = "Not sent";
        $msg = mysqli_error($conn);
    }
//    if ($query) {
//        echo "Record successfully updated!!!";
//        echo $audio_file;
//    }
//    else{
//        echo "Not Successful!!!";
//        echo mysqli_error($conn);
//    }
}
?>