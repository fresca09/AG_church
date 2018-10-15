
  <!-- Start Site Header -->
  <?php 
  ob_start();

  require 'header.php';
  require 'includes/php-image-magician/php_image_magician.php';
  $id=0;
  if(!isset($_GET['ID'])){
    header("Location: ./m_events.php");
    echo "yes";
  }
  else{
    $id = base64_decode($_GET['ID']);
    
  }

 ?>
 
<?php 
$sql = "SELECT * FROM m_event INNER JOIN months ON m_event.month_id = months.ID WHERE m_event.ID = '$id'";
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
          <ol class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><a href="events.html">Events</a></li>
            <li class="active">Monday Prayer</li>
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
        $thumb_path = $row['event_image']; 
        $event_date = date('F j, Y', $row['event_date']);

     ?>
            <header class="single-post-header clearfix">
              
              <nav class="btn-toolbar pull-right"> <!-- <a href="#" class="btn btn-default" data-placement="bottom" data-toggle="tooltip" data-original-title="Print" ><i class="fa fa-print"></i></a> --> <a href="#" class="btn btn-default" data-placement="bottom" data-toggle="modal" data-target="#popUpWindow" data-original-title="Contact us" ><i class="fa fa-envelope"></i></a>
              
      <div class="modal fade" id="popUpWindow">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- header begins here -->
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title" style="text-align: center;"> Contact us here</h2>
              </div>

              <!-- body begins here -->
              <div class="modal-body">
                <form role="form" method="post" action="index.php">
                  <div class="form-group">
                     <span class="input-group-addonn"><i class="glyphicon glyphicon-user"></i></span>
                     <input type="text" class="form-control" name="name" require placeholder="Enter full name" value="<?php if (isset($err_msg)) {
                echo $_POST['username'];
            } ?>">
                    
                  </div>

                  <div class="form-group">
                     <span class="input-group-addonn"><i class="glyphicon glyphicon-lock"></i></span>
                    <input type="email" class="form-control" name="email" require placeholder="Enter email address">
                    
                  </div>
                  <div class="form-group">
                     <span class="input-group-addonn"><i class="glyphicon glyphicon-lock"></i></span>
                    <input type="text" class="form-control" name="phone" require placeholder="Enter phone number">                 
                  </div>
                    <div class="form-group">
                      <textarea cols="6" rows="7" id="comments" name="comments" class="form-control input-lg" placeholder="Type your message"></textarea>
                    </div>
                <div class="modal-footer">
                        <input name="submit" type="submit" value="Submit" class="col-lg-12 col-sm-12 col-xs-12 col-md-12 btn btn-success">
                        
                    </div>              
                </form>              
            </div>
          </div>
        </div>
        </div>
 <a href="#" class="btn btn-default" data-placement="bottom" data-toggle="tooltip" data-original-title="Share event" ><i class="fa fa-location-arrow"></i></a> </nav>
              <h2 class="post-title"><?php echo $title; ?></h2>
            </header>
            <article class="post-content">
              <?php
                  if(preg_match("/^post-images\/thumbnails\//i", $thumb_path)){
                    $thumb_path= preg_replace("/^post-images\/thumbnails\//i", "", $thumb_path);
                  }

               ?>
              <div class="event-description"> <img src="<?php echo $thumb_path; ?>" class="img-responsive">
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
                <p><?php echo $event_desc; ?></p>
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