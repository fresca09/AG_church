<?php
require 'includes/config2.php';

$output = "";
if($_SERVER['REQUEST_METHOD']=="POST"){
    $searchq = $_POST['search'];
    //$searchq = preg_match("/[^0-9a-z]/i", "",$searchq);
    $sql = "SELECT * FROM member WHERE MB_COMPANY LIKE '%$searchq%'";
    $query = mysqli_query($conn, $sql);
    // echo $searchq;
    $count = mysqli_num_rows($query);
    if($count == 0){
        $output = "There was no search result";
        echo mysqli_error($conn);
    }
    else{
        while ($row = mysqli_fetch_assoc($query)){
            $id = $row['ID'];
            $company = $row['MB_COMPANY'];
            $mob = $row['MB_MOBILE'];
            $phone = $row['MB_PHONE'];
            $county = $row['MB_COUNTY'];

            echo $company. " " .$mob. " " .$phone. " " .$county;

        }
    }
}

?>