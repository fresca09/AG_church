 <?php 
  
  //require 'includes/config.php';
  

  $sql = "SELECT *,events.ID FROM events INNER JOIN months ON events.month_id = months.ID ORDER BY events.ID ASC LIMIT 3";
$query = mysqli_query($conn, $sql);
if ($query) {
  // echo"Yes";
}

 ?>

<!-- Start Sidebar -->
         <!--  <div class="col-md-3 sidebar"> -->
            <div class="widget-upcoming-events widget">
              
              <div class="sidebar-widget-title">
                <h3>Upcoming Events</h3>
              </div>
              <ul>
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
                <li class="item event-item clearfix">
                  <div class="event-date" style="width: 18%;"> <span class="date" style="font-size: 20px;"><?php echo $day_no; ?></span> <span class="month" style="font-size: 10px;"><?php echo $month; ?></span> </div>
                  <div class="event-detail" style="padding-left: 35px;width: 70%;">
                    <h4  style="font-size: 15px; font-weight: bold;"><?php
                      $id = base64_encode($id);
                       echo "<a href='single_event.php?ID=$id'>" . $title . '</a>'; ?></h4>
                    <span class="event-dayntime meta-data"><?php echo $day . ' | ' . $time; ?></span> </div>
                </li>
                <!-- li class="item event-item clearfix">
                  <div class="event-date"> <span class="date">28</span> <span class="month">Aug</span> </div>
                  <div class="event-detail">
                    <h4><p>Staff members meet</a></h4>
                    <span class="event-dayntime meta-data">Monday | 01:00 PM</span> </div>
                </li>
                <li class="item event-item clearfix">
                  <div class="event-date"> <span class="date">25</span> <span class="month">Sep</span> </div>
                  <div class="event-detail">
                    <h4><a href="#">Evening Prayer</a></h4>
                    <span class="event-dayntime meta-data">Friday | 06:00 PM</span> </div>
                </li> -->
                <?php }
                   } ?>
              </ul>
              
            </div>
            <!-- Recent Posts Widget -->
            <div class="widget-recent-posts widget">
              <div class="sidebar-widget-title">
                <h3>Our Activities</h3>
              </div>
                <?php
                $asql = "SELECT * FROM activities";
                $aquery = mysqli_query($conn, $asql);
                if ($aquery) {
                while ($row = mysqli_fetch_assoc($aquery)) {
                $id = urlencode($row['ID']);
                $activity = $row['activity'];
                $act_time = $row['act_time'];
                $act_day = $row['act_day'];
                $act_image = $row['act_image'];
                $act_desc = $row['act_desc'];
                //$phone = $row['ePhone'];
                ?>
              <ul>
                <li class="clearfix">
                    <?php
                    if(preg_match("/^church-images\/thumbnails\//i", $act_image)){
                        $act_image= preg_replace("/^church-images\/thumbnails\//i", "", $act_image);
                    } ?>
                    <p class="media-box post-image"> <img src="<?php echo './admin/'.$act_image; ?>" alt="" class="img-thumbnail"> </p>
                  <div class="widget-blog-content">
                      <?php echo "<a href='#acty' style='font-size: 15px;font-weight: bold;'>" . $activity . "</a>" ?> <span class="meta-data"><i class="fa fa-calendar"></i><?php echo $act_time. " Every " .$act_day ?></span>
                  </div>
                </li>
<!--                <li class="clearfix"> <p class="media-box post-image"> <img src="images/talk4.jpg" alt="" class="img-thumbnail"> </p>-->
<!--                  <div class="widget-blog-content"><p>Word Discovery</p> <span class="meta-data"><i class="fa fa-calendar"></i>5pm Every Tuesday</span> </div>-->
<!--                </li>-->
<!--                <li class="clearfix"> <p class="media-box post-image"> <img src="images/talk8.png" alt="" class="img-thumbnail"> </p>-->
<!--                  <div class="widget-blog-content"><p>Comforter's Voice</p> <span class="meta-data"><i class="fa fa-calendar"></i> 9pm-dawn Every First Friday</span> </div>-->
<!--                </li>-->
              </ul>
                <?php }
                } ?>
            </div>
          <!-- </div> -->
        