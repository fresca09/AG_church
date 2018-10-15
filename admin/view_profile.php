<?php 
ob_start();

    
require 'header.php';

 require 'includes/php-image-magician/php_image_magician.php';
  $id=0;
  if(!isset($_GET['ID'])){
    header("Location: index.php");
  }
  else{
    $id = base64_decode($_GET['ID']);
    
  }

   $sql = "SELECT * FROM admin";
   $query = mysqli_query($conn, $sql);


 ?>

<div class="slim-mainpanel">
      <div class="container">
        <div class="slim-pageheader">
          <h6 class="slim-pagetitle">My Profile</h6>
        </div><!-- slim-pageheader -->

        <div class="row row-sm">
          <div class="col-lg-8">
          	
            <div class="card card-profile">
              <div class="card-body">
                <div class="slim-card-title" style="margin-bottom: 20px;margin-left: -240px;font-family: 'Javanese Text';">Personal Info</div>
                <div class="media"> 
              
                  <img src="<?php if (isset($user_image)) {
          echo $user_image;} ?>">
                  <div class="media-body">
                    <h4 class="card-profile-name"><i class="icon ion-person tx-24 lh-0"></i>&nbsp;&nbsp;&nbsp;<span style="font-size: 16px;font-family: Georgia, serif;">Name:</span> <span style="font-size: 16px;font-family:  padding-left: 10px;color: #3093ED;"><?php if (isset($user_fname) && $user_lname == true) {
                      echo $user_fname . '&nbsp;' . $user_lname;
                    }  ?></span></h4><hr>

                    <h4 class="card-profile-name"><i class="icon ion-person tx-24 lh-0"></i>&nbsp;&nbsp;&nbsp;<span style="font-size: 16px;font-family: Georgia, serif;">Username:</span><span style="font-size: 16px; padding-left: 10px;color: #3093ED;"><?php if (isset($user_name)) {
                      echo $user_name;
                    }  ?></span></h4><hr>

                      <h4 class="card-profile-name"><i class="icon ion-link tx-24 lh-0"></i>&nbsp;&nbsp;&nbsp;<span style="font-size: 16px;font-family: Georgia, serif;">Gender:</span><span style="font-size: 16px; padding-left: 10px;color: #3093ED;"><?php if (isset($user_gender)) {
                        echo $user_gender;
                      }  ?></span></h4><hr>
                   
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <!-- <a href="" class="card-profile-direct">http://thmpxls.me/profile?id=katherine</a> -->
                <div>
                  <a href="edit_profile.php">Edit Profile</a>
                  <a href="logout.php">Log out</a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mg-t-20 mg-lg-t-0">
            <div class="card card-connection">

              <div class="slim-card-title" style="font-family: 'Javanese Text';">Contact Info</div>

              <div class="media-list mg-t-30">
                <!-- <div class="media">
                  <div><i class="icon ion-social-facebook tx-24 lh-0"></i></div>
                  <div class="media-body mg-l-15 mg-t-4">
                    <h6 class="tx-14 tx-gray-700">Facebook</h6>
                    <a href="" class="d-block">http://themepixels.me</a>
                    <a href="" class="d-block">http://themeforest.net</a>
                  </div>
                </div> -->
                <div class="media mg-t-25">
                  <div><i class="icon ion-ios-telephone-outline tx-24 lh-0"></i></div>
                  <div class="media-body mg-l-15 mg-t-4">
                    <h6 class="tx-14 tx-gray-700">Phone Number</h6>
                    <span class="d-block"><?php if (isset($user_phone)) {
                      echo $user_phone;
                    }  ?></span>
                  </div>
                </div>
                <div class="media mg-t-25">
                  <div><i class="icon ion-ios-email-outline tx-24 lh-0"></i></div>
                  <div class="media-body mg-l-15 mg-t-4">
                    <h6 class="tx-14 tx-gray-700">Email Address</h6>
                    <span class="d-block"><?php if (isset($user_email)) {
                     echo $user_email;
                    }  ?></span>
                  </div>
                </div>
                <div class="media mg-t-25">
                  <div><i class="icon ion-social-twitter tx-18 lh-0"></i></div>
                  <div class="media-body mg-l-15 mg-t-2">
                    <h6 class="tx-14 tx-gray-700">Twitter</h6>
                    <a href="#" class="d-block">@themepixels</a>
                  </div>
                </div>
              
            </div>
            </div>

            
          </div>
        </div>

      </div><!-- container -->
    </div><!-- slim-mainpanel --> 

    <?php require 'footer.php'; ?>

    <script src="lib/jquery/js/jquery.js"></script>
    <script src="lib/popper.js/js/popper.js"></script>
    <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script src="lib/jquery.cookie/js/jquery.cookie.js"></script>

    <script src="js/slim.js"></script>
  </body>
</html>