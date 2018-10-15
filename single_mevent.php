
  <!-- Start Site Header -->
  <?php 
  ob_start();

  require 'header.php';
 
  require 'includes/php-image-magician/php_image_magician.php';
  $id=0;
  if(!isset($_GET['ID'])){
    header("Location: ./m_events.php");
  }
  else{
    $id = base64_decode($_GET['ID']);

    
  }

$r = "";
$sql = "SELECT * FROM m_event INNER JOIN months ON m_event.month_id = months.ID WHERE m_event.ID = '$id'";
$query = mysqli_query($conn, $sql);
if ($query) {
    
}
else {
  $r = mysqli_error($conn);
}
 ?>
 
  <!-- End Site Header --> 
  <!-- Start Nav Backed Header -->
  <p><?php echo $r; ?></p>
  <div class="nav-backed-header parallax" style="background-image:url(images/main2.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li><a href="events.php">Events</a></li>
            <li class="active">Monthly Events</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  
  <?php require 'countdown.php'; ?>
  <!-- End Page Header --> 
  <!-- Start Content -->
  <div class="main" role="main">
    <div id="content" class="content full">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <?php 
    if ($query) {
      while ($row = mysqli_fetch_assoc($query)) {
        $id = urlencode($row['ID']);
        $title = $row['event_name'];
        $month = $row['month'];
        $number = $row['event_num'];
        $time = $row['event_time'];
        $location = $row['event_location'];
        $event_desc = nl2br($row['event_desc']);
        $image = $row['event_image']; 
        $event_date = date('F j, Y', $row['event_date']);

     ?>
            <header class="single-post-header clearfix">

              <h2 class="post-title" style="text-transform: uppercase;font-size: 20px; font-weight: bold;font-family: cursive;"><?php echo $title; ?></h2>
            </header>
            <?php 
               if (isset($name) && $name === true) {
                    echo "<p>" . $msg . "<p>";
                }
             ?>
            <article class="post-content">
              <?php
                  if(preg_match("/^post-images\/thumbnails\//i", $image)){
                    $image= preg_replace("/^post-images\/thumbnails\//i", "", $image);
                  }

               ?>
               
              <div class="event-description"> <div style="border: 1px solid #666666; width: 650px; height: 331px; margin-bottom: 30px;"><img src="<?php echo 'admin/'.$image; ?>" class="img-responsive"></div>
                <div class="spacer-20"></div>
                <div class="row">
                  <div class="col-md-8">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h3 class="panel-title">Event details</h3>
                      </div>
                      <div class="panel-body">
                        <ul class="info-table">
                          <li><i class="fa fa-calendar"></i> <strong><?php echo '2nd Sunday of ' . $month; ?></li>
                          <li><i class="fa fa-clock-o"></i> <?php echo $time; ?></li>
                          <li><i class="fa fa-map-marker"></i> <?php echo $location; ?></li>
                          <li><i class="fa fa-phone"></i> <?php echo $number; ?></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  
                </div>
                <p style="font-weight: normal;font-size: 15px;font-family: sans-serif, Verdana;"><?php echo $event_desc; ?></p>
                
              </div>
            </article>
            <?php }
                   } ?>
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

    <script src="js/sweetalert.min.js"></script><!-- Sweet Alert -->
    <?php if (isset($msg) && $msg === true) { ?>
    <script type="text/javascript">
        swal("Good job!", "Your message has been sent. Thank you", "success");
    </script>
    <?php } ?>

    <?php if (isset($msg) && $msg === false) { ?>
    <script type="text/javascript">
        swal("Ooops!!!", "Message not sent", "error");
    </script>
    <?php } ?>
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