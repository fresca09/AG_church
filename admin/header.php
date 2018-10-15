<?php 
session_start();

if (!(isset($_SESSION['auth']) && $_SESSION['auth'] === true)) {
    
        
        header("Location: login.php?access=false");
        exit();

}
    else{
        $user_name = $_SESSION['user-user'];
        $user_image = $_SESSION['user-image'];
        $user_lname = $_SESSION['user-lname'];
        $user_fname = $_SESSION['user-fname'];
        $user_email = $_SESSION['user-email'];
        $user_gender = $_SESSION['user-gender'];
        $user_phone = $_SESSION['user-phone'];
        $user_id = $_SESSION['user-id'];
        $user_pass = $_SESSION['user-pass'];
    }
          
    require_once 'includes/libraries.php';
     //require 'includes/config.php';

    $msg = "";

   $sql = "SELECT * FROM admin";
   $query = mysqli_query($conn, $sql);

 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Slim">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/slim/img/slim-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/slim">
    <meta property="og:title" content="Slim">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/slim/img/slim-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/slim/img/slim-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Worship Centre Dashboard</title>

    <!-- vendor css -->
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="lib/chartist/css/chartist.css" rel="stylesheet">
    <link href="lib/rickshaw/css/rickshaw.min.css" rel="stylesheet">

    <link href="lib/datatables/css/jquery.dataTables.css" rel="stylesheet">
    <link href="lib/select2/css/select2.min.css" rel="stylesheet">

    <!-- Slim CSS -->
    <link rel="stylesheet" href="css/slim.css">
    <link rel="stylesheet" href="css/sweetalert.css">
    <link rel="stylesheet" href="css/DT_bootstrap.css">
   

  </head>
  <body>
    <div class="slim-header">
      <div class="container">
        <div class="slim-header-left">
          <h2 class="slim-logo"><a href="index.php">Fresca<span>.</span></a></h2>

          <!-- <div class="search-box">
            <input type="text" class="form-control" placeholder="Search">
            <button class="btn btn-primary"><i class="fa fa-search"></i></button>
          </div> --><!-- search-box -->
        </div><!-- slim-header-left -->
        <div class="slim-header-right">

          <div class="pd-x-10 tx-center bg-magenta">
            <a href="signup.php" class="btn btn-primary pd-x-20" >Sign Up</a>
          </div>

          <div class="dropdown dropdown-c">
            
            <a href="#" class="logged-user" data-toggle="dropdown">
              <img src="<?php if (isset($user_image)) {
                    echo $user_image;
        
                } ?>" alt="">
              <span><?php if (isset($user_name)) {
                    echo $user_name;
        
                } ?></span>


              <i class="fa fa-angle-down"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <?php 
              // if ($query) {
              //  while ($row = mysqli_fetch_assoc($query)) {
              // $id = urlencode($row['ID']); 
              // $fname = $row['Fname'];
              // $lname = $row['Lname'];
              // $email = $row['Email'];
              // $username = $row['Username'];
              // $phone = $row['Phone'];
              // $gender = $row['Gender'];
              // $image = $row['Image'];
              //  }
              // }
             ?>
              <nav class="nav">
                <?php
                $user_id = base64_encode($user_id);
               echo "<a href='view_profile.php?ID=$user_id' class='nav-link'>" . '<i class="icon ion-person"></i>' .  ' View Profile ' . "</a>"; ?>

                <?php 
                  // $msql = "SELECT * FROM admin";
                  // $mquery = mysqli_query($conn, $msql);
                  // if ($mquery) {
                   
                 echo "<tr><a href='edit_profile.php?ID=$user_id&Fname=$user_fname&Lname=$user_lname&Username=$user_name&Email=$user_email&Gender=user_gender&Phone=$user_phone&Image=$user_image' class='nav-link'><i class='icon ion-compose'></i>Edit Profile</a></td>
      </tr>";
              
                    //}                 
                 ?>
                <!-- <a href="edit_profile.php" class="nav-link"><i class="icon ion-compose"></i> Edit Profile</a> -->

                <a href="logout.php" class="nav-link"><i class="icon ion-forward"></i> Sign Out</a>
              </nav>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </div><!-- header-right -->
      </div><!-- container -->
    </div><!-- slim-header -->

    <div class="slim-navbar">
      <div class="container">
        <ul class="nav">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">
              <i class="icon ion-ios-home-outline"></i>
              <span>Dashboard</span>
            </a>
          </li>
            <li class="nav-item with-sub">
            <a class="nav-link" href="#" data-toggle="dropdown">
              <i class="icon ion-ios-mic-outline"></i>
              <span>Sermon & Books</span>
            </a>
            <div class="sub-item">
              <ul>
                <li><a href="add_sermons.php">Add Sermons</a></li>
                <li><a href="add_books.php">Add Books</a></li>
                <li><a href="view_sermons.php">View Sermons</a></li>
                <li><a href="view_books.php">View Books</a></li>
<!--                  <li><a href="add_activity.php">Add Activities</a></li>-->
<!--                 <li><a href="view_activity.php">View Activities</a></li>-->
              </ul>
            </div><!-- dropdown-menu -->
          </li>

            <li class="nav-item with-sub">
            <a class="nav-link" href="#" data-toggle="dropdown">
              <i class="icon ion-ios-gear-outline"></i>
              <span>Events</span>
            </a>
            <div class="sub-item">
              <ul>
                <li><a href="add_upevent.php">Add Upcoming Events</a></li>
                  <li><a href="add_mevent.php">Add Monthly Events</a></li>
                <li><a href="view_upevent.php">View Upcoming Events</a></li>
                  <li><a href="view_mevent.php">View Monthly Events</a></li>
              </ul>
            </div><!-- dropdown-menu -->
          </li>

          <li class="nav-item with-sub">
            <a class="nav-link" href="#" data-toggle="dropdown">
              <i class="icon ion-ios-gear-outline"></i>
              <span>Ministeries</span>
            </a>
            <div class="sub-item">
              <ul>
                  <li><a href="add_dept_detail.php">Add Departmental Details</a></li>
                  <li><a href="add_ministry.php">Add Ministry Details</a></li>
                  <li><a href="view_dept_detail.php">View Departmental Details</a></li>
                  <li><a href="view_ministry.php">View Ministry Details</a></li>
              </ul>
            </div><!-- dropdown-menu -->
          </li>

            <li class="nav-item with-sub">
                <a class="nav-link" href="#" data-toggle="dropdown">
                    <i class="icon ion-ios-book-outline"></i>
                    <span>Activities</span>
                </a>
                <div class="sub-item">
                    <ul>
                        <li><a href="add_activity.php">Add Activities</a></li>
                        <li><a href="view_activity.php">View Activities</a></li>
                        <!-- <li><a href="view_dept_detail.php">View Departmental Details</a></li> -->
                        <!-- <li><a href="view_mem_dept.php">View Members by Department</a></li> -->
                    </ul>
                </div><!-- dropdown-menu -->
            </li>

          <li class="nav-item with-sub">
            <a class="nav-link" href="#" data-toggle="dropdown">
              <i class="icon ion-ios-gear-outline"></i>
              <span>Subscribers</span>
            </a>
            <div class="sub-item">
              <ul>
                <li><a href="add_pay.php">Add Payment Type</a></li>
                <li><a href="view_pay.php">View Payment Type</a></li>
                <li><a href="view_sub.php">View Subscribers</a></li>
                  <li><a href="view_message.php">View Messages</a></li>
              </ul>
            </div><!-- dropdown-menu -->
          </li>
        </ul>
      </div><!-- container -->
    </div><!-- slim-navbar -->

    <div><p style="font-size: 20px; color: #000;"><?php echo $msg; ?></p></div>
   

     <!-- MODAL GRID -->
   
