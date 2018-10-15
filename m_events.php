 <?php 
    require 'header.php';
    require 'includes/php-image-magician/php_image_magician.php';

    if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 6;
        $offset = ($pageno-1) * $no_of_records_per_page;


        $total_pages_sql = "SELECT COUNT(*) FROM m_event";
        $result = mysqli_query($conn,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);
 
$sql = "SELECT *, m_event.ID FROM m_event INNER JOIN months ON m_event.month_id = months.ID ORDER BY m_event.event_date DESC LIMIT $offset, $no_of_records_per_page";
$query = mysqli_query($conn, $sql);
if ($query) {
  
}
 ?>

  <!-- Start Nav Backed Header -->
  <div class="nav-backed-header parallax" style="background-image:url(images/main2.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li><a href="#">Events</a></li>
            <li class="active">Monthly Events</li>
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
                    <h3>Special Monthly Events</h3>
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
        $title = $row['event_name'];
        $month = $row['month'];
        $number = $row['event_num'];
        $event_desc = nl2br($row['event_desc']);
        $thumb_path = $row['event_image'];
        
        $event_date = date('F j, Y', $row['event_date']);

     ?>
                <ul>
                  <li class="item event-item">
                    <div class="event-date"> <span class="date" style="font-size: 15px; padding-top: 9px;"><?php echo $month; ?></span> <!-- <span class="month">Feb</span> --> </div>
                    <div class="event-detail" style="padding-left: 55px; padding-top: 5px;">
                      <h4><?php
                      $id = base64_encode($id);
                       echo "<a href='single_mevent.php?ID=$id'>" . $title . '</a>'; ?></h4>
                      <span class="event-dayntime meta-data"><?php echo ' 2nd Sunday | ' . $event_date; ?></span> </div>
                    <div class="to-event-url">      
                </ul>
                <?php }
                   } ?>

                   <ul class="pagination">
              <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>"><a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>"><i class="fa fa-chevron-left"></i></a></li>
              
              <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>"><a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>"><i class="fa fa-chevron-right"></i></a></li>
            </ul>
                   
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