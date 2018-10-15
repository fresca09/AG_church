
  <!-- Start Site Header -->
 <?php 
  require 'header.php';
  
  require 'includes/php-image-magician/php_image_magician.php';

  if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 7;
        $offset = ($pageno-1) * $no_of_records_per_page;


        $total_pages_sql = "SELECT COUNT(*) FROM events";
        $result = mysqli_query($conn,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);

  $sql = "SELECT *,events.ID FROM events INNER JOIN months ON events.month_id = months.ID ORDER BY events.ID DESC LIMIT $offset, $no_of_records_per_page";
$query = mysqli_query($conn, $sql);
if ($query) {
  // echo"Yes";
}

 ?>
  <!-- End Site Header --> 
  <!-- Start Nav Backed Header -->
  <div class="nav-backed-header parallax" style="background-image:url(images/main2.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li><a href="#">Events</a></li>
            <li class="active">Upcoming Events</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- End Nav Backed Header --> 
  <!-- Start Page Header -->
  <!-- <div class="page-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>Events</h1>
        </div>
      </div>
    </div>
  </div> -->
  <?php require 'countdown.php'; ?>
  <!-- End Page Header --> 
  <!-- Start Content -->
  <div class="main" role="main">
    <div id="content" class="content full">
      <div class="container">
        <div class="row">
          <div class="col-md-9"> 
            <!-- Events Listing -->
            <div class="listing events-listing">
              <header class="listing-header">
                <div class="row">
                  <div class="col-md-6 col-sm-6">
                    <h3>All Upcoming Events</h3>
                  </div>
                  <!-- <div class="listing-header-sub col-md-6 col-sm-6">
                    <h5>February</h5>
                    <nav class="next-prev-nav"> <a href="#"><i class="fa fa-angle-left"></i></a> <a href="#"><i class="fa fa-angle-right"></i></a> </nav>
                  </div> -->
                </div>
              </header>
              <section class="listing-cont">
                <?php 
    if ($query) {
      while ($row = mysqli_fetch_assoc($query)) {
        $id = urlencode($row['ID']); 
        $title = $row['eTitle'];
        $day = $row['eDay'];
        $day_no = $row['eDay_no'];
        $month = $row['month'];
        $time = $row['eTime'];
        $phone = $row['ePhone'];
        $location = $row['eLocation'];
        $body = nl2br($row['eDesc']);
        $thumb_path = $row['eImage'];
        // $img = set_book_thumbnail_size( 50, 50 );
        
        //$event_date = date('F j, Y', $row['event_date']);

     ?>
                <ul>
                  <li class="item event-item">
                    <div class="event-date"> <span class="date"><?php echo $day_no; ?></span> <span class="month"><?php echo $month; ?></span> </div>
                    <div class="event-detail" style="padding-left: 55px; padding-top: 5px;">
                      <h4><?php
                      $id = base64_encode($id);
                       echo "<a href='single_event.php?ID=$id'>" . $title . '</a>'; ?></h4>
                      <span class="event-dayntime meta-data"><?php echo $day . ' | ' . $time; ?></span> </div>
                    <!-- <div class="to-event-url">
                      <div><a href="single-event.html" class="btn btn-default btn-sm">Details</a></div>
                    </div> -->
                    <div class="to-event-url">
                      <div><?php
                       echo "<a href='single_event.php?ID=$id' class='btn btn-default btn-sm'>" . ' Details ' . "</a>"; ?></div>
                    </div>
                  </li>
                  
                </ul>
                <?php }
                   } ?>

            <ul class="pagination">
              
              <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>"><a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>"><i class="fa fa-chevron-left"></i></a></li>
              
              <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>"><a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>"><i class="fa fa-chevron-right"></i></a></li>
            </ul>

            <!-- <div class="listing-header-sub col-md-6 col-sm-6">
                    <h5>February</h5>
                    <nav class="next-prev-nav"> <a href="#"><i class="fa fa-angle-left"></i></a> <a href="#"><i class="fa fa-angle-right"></i></a> </nav>
                  </div> -->

              </section>
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