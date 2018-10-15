<?php 
	session_start();

   require 'includes/php-image-magician/php_image_magician.php';

      require_once 'includes/libraries.php';
     //require 'includes/config.php';

if (!(isset($_SESSION['auth']) && $_SESSION['auth'] === true)) {
    
        
        header("Location: login.php?access=false");
        exit();

}
    
    $msg = "";
    $err_msg = "";

    if (isset($_POST['submit'])) {
    
    $err_flag = false;

     if (empty($_POST['Fname'])) {
      $err_flag = true;
      $err_msg = 'Firstname filed cannot be empty';
    }
    else
    {
      $Fname = ucwords(sanitize(trim($_POST['Fname'])));
    }

     if (empty($_POST['Lname'])) {
      $err_flag = true;
      $err_msg = 'Lastname filed cannot be empty';
    }
    else
    {
      $Lname = ucwords(sanitize(trim($_POST['Lname'])));
    }

    if (empty($_POST['username'])) {
      $err_flag = true;
      $err_msg = 'Username filed cannot be empty';
    }
    else
    {
      $username = sanitize(trim($_POST['username']));
    }

    if (empty($_POST['email'])) {
      $err_flag = true;
      $err_msg = 'Email filed cannot be empty';
    }
    else
    {
      $email = strtolower(sanitize(trim($_POST['email'])));
    }

    if (empty($_POST['phone'])) {
      $err_flag = true;
      $err_msg = 'Phone filed cannot be empty';
    }
    else
    {
      $phone = sanitize(trim($_POST['phone']));
    }

    if (empty($_POST['gender'])) {
      $err_flag = true;
      $err_msg = 'Gender filed cannot be empty';
    }
    else
    {
      $gender = sanitize(trim($_POST['gender']));
    }

    
    if (empty($_POST['password1'])) {
      $err_flag = true;
      $err_msg = 'Password filed cannot be empty';
    }
    else
    {
      $password1 = sanitize(trim($_POST['password1']));
    }

    if (empty($_POST['password2'])) {
      $err_flag = true;
      $err_msg = 'Confirm password filed cannot be empty';
    }
    else
    {
      $password2 = sanitize(trim($_POST['password2']));
    }

    if ($password1 == $password2) {
      $password = $password1;
    }

    else
    {
      $err_flag = true;
      $err_msg = 'Sorry, password does not match';
      
    }

    $image_file = checkImage($_FILES['postimg'],250,250,"church-images/");
    if (isset($err_flag) && $err_flag == false) {
      
      $sql = "SELECT * FROM admin WHERE Email = '$email'";
      $query = mysqli_query($conn, $sql);
      if (mysqli_num_rows($query) > 0) {
        $msg = 'Sorry, the email address have already been used...';
      }
      else{
        $sql_stm = "INSERT INTO admin (Fname, Lname, Username, Email, Gender, Phone, Password, Image) VALUES ('$Fname', '$Lname', '$username', '$email', '$gender', '$phone', '$password', '$image_file')";
        $result = mysqli_query($conn, $sql_stm);
        
        if (mysqli_num_rows($result)) {
          while ($row = mysqli_fetch_assoc($result)) {
            $_SESSION['auth'] = true;
            $_SESSION['Admin_fname'] = $row['Fname'];
            $_SESSION['Admin_lname'] = $row['Lname'];
            $_SESSION['Admin_user'] = $row['Username'];
            $_SESSION['Admin_email;'] = $row['Email'];
            $_SESSION['Admin_phone'] = $row['Phone'];
             $_SESSION['Admin_gender'] = $row['Gender'];
            $_SESSION['Admin_image'] = $row['Image'];
          
          if ($_SESSION['auth'] === true) {
            $success = true;
          }
           else
        {
          $err = true;
          echo mysqli_error($conn);

        }
        }
      }
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
    <!-- Sweetalert CSS -->
    <link rel="stylesheet" href="css/sweetalert.css">

  </head>
  <body>
 
  
    <div class="signin-wrapper">


      <div class="signin-box signup">
        <?php 
        if (isset($err_flag) && $err_flag === true) {
          echo "<p style='font-size:18px;text-align:center;'>" . $err_msg . "<p>";
        }

       ?>

       <?php 
       echo "<p style='font-size:18px;text-align:center;'>" . $msg . "<p>";
       ?>
        
        <h3 class="signin-title-primary">Get Started!</h3>
        <h5 class="signin-title-secondary lh-4">Please, sign up for new Admin here.</h5>

        <form method="post" action="signup.php" enctype="multipart/form-data">

        <div class="row row-xs mg-b-10">
          <div class="col-sm"><input type="text" name="Fname" class="form-control" placeholder="Firstname" required>
          </div>

          <div class="col-sm mg-t-10 mg-sm-t-0"><input type="text" name="Lname" class="form-control" placeholder="Lastname" required>
          </div>
        </div><!-- row -->

        <div class="row row-xs mg-b-10">
          <div class="col-sm"><input type="email" name="email" class="form-control" placeholder="Email" required>
          </div>

          <div class="col-sm mg-t-10 mg-sm-t-0"><input type="text" name="username" class="form-control" placeholder="Username" required>
          </div>
        </div><!-- row -->

        <div class="row row-xs mg-b-10">
          <div class="col-sm"><input type="password" name="password1" class="form-control" placeholder="Password" required>
          </div>

          <div class="col-sm mg-t-10 mg-sm-t-0"><input type="password" name="password2" class="form-control" placeholder="Confirm Password" required>
          </div>
        </div><!-- row -->

        <div class="row row-xs mg-b-10">
          <div class="col-sm"><input type="tel" name="phone" class="form-control" placeholder="Phone Number" required>
          </div>

          <div class="col-sm mg-t-10 mg-sm-t-0"><select name="gender" class="form-control select2" data-parsley-class-handler="#slWrapper" data-parsley-errors-container="#slErrorContainer" required>
                  <option>--Gender--</option>
                         <option>Male</option>
                         <option>Female</option>
                </select></div>
        </div><!-- row -->

        <!-- <div class="row row-xs mg-b-10"> -->
          <div class="col-sm" style="margin-bottom: 10px;"><input type="file" class="custom-file-input" id="customFile" name="postimg" required><label class="custom-file-label" for="customFile">Choose file</label></div>
        <!-- </div> --><!-- row -->

        <input type="submit" name="submit" value="Sign Up" class="btn btn-primary btn-block btn-signin"></form>

        <p class="mg-t-40 mg-b-0" style="font-size: 17px;">To go back to Dashboard <a href="index.php">Click Here</a></p>

        
      </div><!-- signin-box -->

    </div><!-- signin-wrapper -->
    <?php require 'footer.php'; ?>

    <script src="lib/jquery/js/jquery.js"></script>
    <script src="lib/popper.js/js/popper.js"></script>
    <script src="lib/bootstrap/js/bootstrap.js"></script>

    <script src="js/slim.js"></script>

    <script src="js/sweetalert.min.js"></script><!-- Sweet Alert -->

    <?php if (isset($success) && $success === true) { ?>
    <script type="text/javascript">
        swal("Good!!!", "New admin successfully registered...", "success");
    </script>
    <?php } ?>

    <?php if (isset($err) && $err === true) { ?>
    <script type="text/javascript">
        swal("Ooops!!!", "Something went wrong...", "error");
    </script>
    <?php } ?>

  </body>
</html>
