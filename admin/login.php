<?php
session_start(); 
if (isset($_SESSION['auth']) && $_SESSION['auth'] === true) {
    header("Location: index.php");
    exit();
}
if (isset($_GET['access'])) {
    $alert_user = true;
}

require_once 'includes/libraries.php';
//require 'includes/config.php';


$msg = "";
//$msg1 = "";

if (isset($_POST['submit'])) {
    // var_dump($_POST);
    //echo "yes";
    $err_flag = false;  
    if (empty($_POST['username'])) {
        $err_flag = true;
        $err_msg = 'Empty field not allowed';
    }
    else
    {
        $username = sanitize(trim($_POST['username']));
    }

    if (empty($_POST['password'])) {
        $err_flag = true;
        $err_msg = 'Empty field not allowed';
    }
    else
    {
        $password = sanitize(trim($_POST['password']));
        $password = ($password);
    }
    if (isset($err_flag) && $err_flag === false) {


        $sql = "SELECT * FROM Admin WHERE Username = '$username' AND Password = '$password'";

        $query = mysqli_query($conn, $sql);
        if (mysqli_num_rows($query) > 0) {

            while ($row = mysqli_fetch_assoc($query)) {
                $_SESSION['auth'] = true;
                $_SESSION['user-fname'] = $row['Fname'];
                $_SESSION['user-lname'] = $row['Lname'];
                $_SESSION['user-user'] = $row['Username'];
                $_SESSION['user-email'] = $row['Email'];
                $_SESSION['user-gender'] = $row['Gender'];
                $_SESSION['user-phone'] = $row['Phone'];
                $_SESSION['user-image'] = $row['Image'];
                $_SESSION['user-id'] = $row['ID'];
                $_SESSION['user-pass'] = $row['Password'];

            }
            if ($_SESSION['auth'] === true) {
                header("Location: index.php");
                exit();
            }
            
        }
        else{
              $msg = "Wrong username or password... Check correctly!!!";
            }
    }
}

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

  </head>
  <body>
    <div class="slim-header">
      <div class="container">
        <div class="slim-header-left">
          <h2 class="slim-logo"><a href="form-elements.php">Fresca<span>.</span></a></h2>

          <!-- <div class="search-box">
            <input type="text" class="form-control" placeholder="Search">
            <button class="btn btn-primary"><i class="fa fa-search"></i></button>
          </div> --><!-- search-box -->
        </div><!-- slim-header-left -->
        <div class="slim-header-right">

         
          <div class="pd-y-30 tx-center bg-magenta">
            <a href="" class="btn btn-primary pd-x-25" data-toggle="modal" data-target="#modaldemo">Login</a>
          </div>
          

        </div><!-- header-right -->
      </div><!-- container -->
    </div><!-- slim-header -->


     <!-- MODAL GRID -->
    <div id="modaldemo" class="modal fade">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bd-0 bg-transparent rounded overflow-hidden">
          <div class="modal-body pd-0">
            <div class="row no-gutters">


              <div class="signin-box">

         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        <div style="text-align: center;"><h2 class="signin-title-primary">Hello Admin</h2>
        <h3 class="signin-title-secondary">Sign in to continue.</h3></div>
        

        <form method="post" action="login.php">

        <div class="form-group">
          <input type="text" name="username" class="form-control" placeholder="Enter your username">
        </div><!-- form-group -->
        <div class="form-group mg-b-50">
          <input type="password" name="password" class="form-control" placeholder="Enter your password">
        </div><!-- form-group -->

        <input type="submit" name="submit" value="Sign In" class="btn btn-primary btn-block btn-signin">

    </form>
        
      </div><!-- signin-box -->
              
            </div><!-- row -->
          </div><!-- modal-body -->
        </div><!-- modal-content -->
      </div><!-- modal-dialog -->
    </div><!-- modal -->

    <div class="slim-mainpanel">
      <div class="container">
        <div class="slim-pageheader">
          <ol class="breadcrumb slim-breadcrumb">
            <li class="breadcrumb-item"><a href="#"></a></li>
            <li class="breadcrumb-item active" aria-current="page"></li>
          </ol>
          <!-- <p style="font-size: 20px; color: #000;"><?php echo $msg; ?></p> -->
          <h4 style="color: magenta;"><?php echo $msg; ?></h4>
        </div><!-- slim-pageheader -->

        <div class="dash-headline">
          <div class="dash-headline-left">
            <div class="dash-headline-item-one">
              <div><img src="img/every.jpg" width="100%" height="500px;"></div>
              
            </div><!-- dash-headline-item-one -->
          </div><!-- dash-headline-left -->

          <div class="dash-headline-right">
            <div class="dash-headline-item-one">
              <div><img src="img/cross.jpg" width="100%" height="500px;"></div>
              
            </div><!-- dash-headline-item-one -->
          </div><!-- dash-headline-left -->

        </div><!-- d-flex ht-100v -->

        





      </div><!-- container -->
    </div><!-- slim-mainpanel -->

    <?php require 'footer.php'; ?>

    
    <script src="lib/jquery/js/jquery.js"></script>
    <script src="lib/popper.js/js/popper.js"></script>
    <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script src="lib/jquery.cookie/js/jquery.cookie.js"></script>
    <script src="lib/chartist/js/chartist.js"></script>
    <script src="lib/d3/js/d3.js"></script>
    <script src="lib/rickshaw/js/rickshaw.min.js"></script>
    <script src="lib/jquery.sparkline.bower/js/jquery.sparkline.min.js"></script>
    <script src="lib/select2/js/select2.min.js"></script>


    <script src="js/ResizeSensor.js"></script>
    <script src="js/dashboard.js"></script>
    <script src="js/slim.js"></script>

    <script>
      $(function(){
        'use strict'

        $('.form-layout .form-control').on('focusin', function(){
          $(this).closest('.form-group').addClass('form-group-active');
        });

        $('.form-layout .form-control').on('focusout', function(){
          $(this).closest('.form-group').removeClass('form-group-active');
        });

        // Select2
        $('.select2').select2({
          minimumResultsForSearch: Infinity
        });

        $('#select2-a, #select2-b').select2({
          minimumResultsForSearch: Infinity
        });

        $('#select2-a').on('select2:opening', function (e) {
          $(this).closest('.form-group').addClass('form-group-active');
        });

        $('#select2-a').on('select2:closing', function (e) {
          $(this).closest('.form-group').removeClass('form-group-active');
        });

      });
    </script>

    <script src="js/sweetalert.min.js"></script>

    <?php if (isset($alert_user)) { ?>
    <script type="text/javascript">
        swal("Oops...", "You are not allowed to view this page directly...!", "error");
    </script>
    <?php } ?>
  </body>
</html>
