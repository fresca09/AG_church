<?php 

  require 'header.php';

  require 'includes/php-image-magician/php_image_magician.php';
  $id=0;
  if(!isset($_GET['ID'])){
    header("Location: ./sermons.php");
  }
  else{
    $id = base64_decode($_GET['ID']);
    
  }

  $sql = "SELECT * FROM sermons INNER JOIN Category ON sermons.cat_id = Category.ID WHERE sermons.ID = '$id'";
  $query = mysqli_query($conn, $sql);
  if ($query) {

  }
  else echo mysqli_error($conn);

 ?>
 
  <!-- End Site Header --> 
  <!-- Start Nav Backed Header -->
  <div class="nav-backed-header parallax" style="background-image:url(images/main2.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
<!--          <ol class="breadcrumb">-->
<!--            <li><a href="index.php">Home</a></li>-->
<!--            <li><a href="sermons.php">Sermons</a></li>-->
<!--            <li class="active">Sermon title</li>-->
<!--          </ol>-->
        </div>
      </div>
    </div>
  </div>

  <!-- End Nav Backed Header --> 
  <!-- Start Page Header -->
  <?php require 'countdown.php'; ?>
  <!-- End Page Header --> 
  <!-- Start Content -->
  <div class="main" role="main">
    <div id="content" class="content full">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
             
            <div class="row" style="padding-top: 30px;">
              <?php 
              if ($query) {
                while ($row = mysqli_fetch_assoc($query)) {
                  $id = urlencode($row['ID']);
                  $title = $row['sermon_topic'];
                  $speaker = $row['sermon_speaker'];
                  $category = $row['category'];
                  $body = $row['sermon_desc'];
                  $image = $row['sermon_image'];
                  $path = $row['sermon_audio'];
                  $date = date('F j, Y', $row['sDate']);
               ?>
              <div class="col-lg-4">
                <div class="thumbnail" style="border:0px">
                  <img src="<?php echo 'admin/'.$image; ?>" style="height: 250px; width: 200px;border:1px solid #ACA9B3;">
                  <p style="display: none;"><?php echo $path; ?></p>
                  <div class="caption">
                    <p><?php
                      
                       echo "<a href='download_sermon.php?ID=$id' class='btn btn-primary' style='width: 200px;'>" . 'Download <i class="fa fa-download"></i>' . '</a>'; ?></p>
                  </div>
                </div>
              </div>
            
            <div class="col-lg-7">
              <h3 class="page-header" style="padding: 2px 0px 0px 0px;background-color: #fff;border-bottom: 0px;box-shadow: 0px 0px 0px 0px;font-weight: bold;">
                <?php echo $title; ?>
              </h3>
              <p style="font-weight: bold;">Minister:&nbsp;<span style="color: #007F7B;"><?php echo $speaker; ?></span></p>
              <p style="margin-top: -10px;font-weight: bold; margin-bottom: 35px;">Category:&nbsp;<span style="color: #007F7B;"><?php echo $category; ?></span>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Language: <span style="color: #007F7B;">English</span>
              
              <!-- <h5 style="margin-top: -10px;">Abstract</h5> -->
              <p style="text-align: justify; padding-top: 10px; border-top: 1px solid #ECEAE4;""><?php echo $body; ?></p>
               <p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>


            </div> 
            <?php }
                   } ?>
          </div>    
          </div>
          <!-- Start Sidebar -->
          <div class="col-md-3 sidebar">
            <?php require 'sidebar.php'; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Start Footer -->
 <?php 
  require 'footer.php';
   ?>
  <!-- End Footer --> 
  <a id="back-to-top"><i class="fa fa-angle-double-up"></i></a>
</div>
<script src="js/jquery-2.0.0.min.js"></script> <!-- Jquery Library Call --> 
<script src="plugins/prettyphoto/js/prettyphoto.js"></script> <!-- PrettyPhoto Plugin --> 
<script src="js/helper-plugins.js"></script> <!-- Plugins --> 
<script src="js/bootstrap.js"></script> <!-- UI --> 
<script src="js/waypoints.js"></script> <!-- Waypoints --> 
<script src="plugins/mediaelement/mediaelement-and-player.min.js"></script> <!-- MediaElements --> 
<script src="js/init.js"></script> <!-- All Scripts --> 
<script src="plugins/flexslider/js/jquery.flexslider.js"></script> <!-- FlexSlider --> 
<script src="plugins/countdown/js/jquery.countdown.min.js"></script> <!-- Jquery Timer --> 
</body>
</html>