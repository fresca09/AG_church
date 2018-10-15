<?php
require_once 'includes/libraries.php';

if($_SERVER['REQUEST_METHOD']=="POST"){
    $id = sanitize(trim($_POST['id']));
    $pay_type = sanitize(trim($_POST['pay_type']));

    if (!empty(isset($pay_type) && $pay_type == true)) {
        $sql_stmt = "SELECT * FROM payment_type WHERE pay_type = '$pay_type'";
        $mquery = mysqli_query($conn, $sql_stmt);
        if (mysqli_num_rows($mquery) > 0) {
            echo 'Department already exist!!!';
        }
        else
        {
            $sql = "UPDATE payment_type SET pay_type = '$pay_type' WHERE ID = '$id'";
            $query = mysqli_query($conn, $sql);
            if ($query) {
                echo "Record successfully updated!!!";
            }
            else{
                echo "Not Successful!!!";
                echo mysqli_error($conn);
            }

        }

    }
    else{
        echo "Field is empty!!!";
    }



}





?>