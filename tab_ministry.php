<?php
/**
 * Created by PhpStorm.
 * User: Fresca
 * Date: 05/10/2018
 * Time: 08:20 AM
 */


include_once("includes/libraries.php");
$dept_sql = "SELECT ID, Area FROM special";
$dept_query = mysqli_query($conn, $dept_sql) or die("database error:". mysqli_error($conn));
$active_class = 0 ;
$dept_html = '';
$text_html = '';
while( $dept = mysqli_fetch_assoc($dept_query) ) {
    $current_tab = "";
    $current_content = "";
    if(!$active_class) {
        $active_class = 1;
        $current_tab = 'active';
        $current_content = 'in active';
    }
    $dept_html .= '<li class="'.$current_tab.'"><a href="#'.$dept['ID'].'" data-toggle="tab">'.
        $dept['Area'].'</a></li>';
    $text_html .= '<div id="'.$dept["ID"].'" class="tab-pane fade '.$current_content.'">';
    $detail_sql = "SELECT ID, body FROM ministry_details WHERE special_id = ".$dept["ID"];
    $detail_query = mysqli_query($conn, $detail_sql) or die("database error:". mysqli_error($conn));
    if(!mysqli_num_rows($detail_query)) {
        $text_html .=  '<br>No ministry found!';
    }
    while( $row = mysqli_fetch_assoc($detail_query) ) {
        $text_html .= '<div class="contact_list cogl-lg-10 col-md-4 col-sm-12 col-xs-12"  style="padding: 0;width: 100%;">';
        $text_html .= '<p style="width: 83%;">'.$row["body"].'</p>';
        $text_html .= '</div>';

    }
    $text_html .=  '<div class="clear_both"></div></div>';
}




?>

