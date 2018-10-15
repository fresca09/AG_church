<?php 
require 'header.php';
require_once 'slider.php';
  
  $sql = "SELECT *,events.ID FROM events INNER JOIN months ON events.month_id = months.ID ORDER BY events.ID ASC LIMIT 3";
$query = mysqli_query($conn, $sql);
if ($query) {
  // echo"Yes";
}

 ?>
 
  <!-- Start Notice Bar -->
  <div class="notice-bar" style="margin-top: 80PX;">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-6 notice-bar-title"> <span class="notice-bar-title-icon hidden-xs"><i class="fa fa-calendar fa-3x"></i></span> <span class="title-note">Next</span> <strong>Upcoming Event</strong> </div>
        <div class="col-md-3 col-sm-6 col-xs-6 notice-bar-event-title">
          <?php 
          $ssql = "SELECT * FROM events INNER JOIN months ON events.month_id = months.ID ORDER BY events.event_month ASC LIMIT 1";
$squery = mysqli_query($conn, $ssql);
if ($squery) {
  // echo"Yes";
}
    if ($squery) {
      while ($row = mysqli_fetch_assoc($squery)) {
        $id = urlencode($row['ID']);
        $title = $row['eTitle'];
        $day = $row['eDay'];
        $day_no = $row['eDay_no'];
        $month = $row['month'];
        $time = $row['eTime'];
        $phone = $row['ePhone'];
        $location = $row['eLocation'];
        $body = nl2br($row['eDesc']);
        $thumb_path = $row['eThumb'];
        // $img = set_book_thumbnail_size( 50, 50 );
        
        //$event_date = date('F j, Y', $row['event_date']);
        $event_date = date('Y', $row['event_month']);
     ?>
          <h5><?php
                      $id = base64_encode($id);
                       echo "<a href='single_event.php?ID=$id'>" . $title . '</a>'; ?></h5>
          <span class="meta-data"><?php echo $day_no . 'th ' . $month . ', ' .  $event_date; ?></span> <?php }
                   } ?></div>
        <div id="counter" class="col-md-4 col-sm-6 col-xs-12 counter" data-date="July 13, 2015">
          <div id="clockdiv" class="clock">
          <div class="timer-col"> <span class="days"></span> <span class="timer-type">days</span> </div>
          <div class="timer-col"> <span class="hours"></span> <span class="timer-type">hours</span> </div>
          <div class="timer-col"> <span class="minutes"></span> <span class="timer-type">mins</span> </div>
          <div class="timer-col"> <span class="seconds"></span> <span class="timer-type">secs</span> </div>
        </div>
        </div>
        <div class="col-md-2 col-sm-6 hidden-xs"> <a href="events.php" class="btn btn-primary btn-lg btn-block">All Events</a> </div>
      </div>
    </div>
  </div>
  <!-- End Notice Bar --> 
  <!-- Start Content -->
  <div class="main" role="main">
    <div id="content" class="content full">
      <div class="container">
        <div class="row"> 
          <!-- Start Featured Blocks -->
          <div class="featured-blocks clearfix">
            <div class="col-md-4 col-sm-4 featured-block"> <a href="pastor.php" class="img-thumbnail"> <img src="images/talk10.png" alt="staff"> <strong>Our Pastors</strong> <span class="more">read more</span> </a> </div>
            <div class="col-md-4 col-sm-4 featured-block"> <a href="mission.php" class="img-thumbnail"> <img src="images/talk11.png" alt="staff"> <strong>Our Mission</strong> <span class="more">read more</span> </a> </div>
            <div class="col-md-4 col-sm-4 featured-block"> <a href="ministry.php" class="img-thumbnail"> <img src="images/talk12.png" alt="staff"> <strong>Our Ministries</strong> <span class="more">read more</span> </a> </div>
          </div>
          <!-- End Featured Blocks --> 
        </div>
        <div class="row">
          <div class="col-md-8 col-sm-6"> 
            <!-- Events Listing -->
            <div class="listing events-listing">
              <header class="listing-header">
                <h3>Upcoming Events</h3>
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
            <div class="event-detail" style="padding-left: 10px;">
              <h4><?php
              $id = base64_encode($id);
               echo "<a href='single_event.php?ID=$id'>" . $title . '</a>'; ?></h4>
              <span class="event-dayntime meta-data"><?php echo $day . ' | ' . $time; ?></span> </div>
            <div class="to-event-url">
              <div><?php

               echo "<a href='single_event.php?ID=$id' class='btn btn-default btn-sm'>" . 'Details' . "</a>"; ?></div>
            </div>
          </li>
          </li>
        </ul>
        <?php }
           } ?>
      </section>
    </div>

    <div class="spacer-30"></div>
    <!-- Latest News -->
    <div class="listing post-listing">
      <header class="listing-header">
        <h3>Our Activities</h3>
      </header>
      <section class="listing-cont">
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
          <li class="item post" id="acty">
              <?php
              if(preg_match("/^church-images\/thumbnails\//i", $act_image)){
                  $act_image= preg_replace("/^church-images\/thumbnails\//i", "", $act_image);
              } ?>
            <div class="row">
              <div class="col-md-4"> <a href="#" class="media-box"> <img src="<?php echo './admin/'.$act_image; ?>" alt="" class="img-thumbnail"> </a></div>
              <div class="col-md-8">
                <div class="post-title">
                  <h2><?php echo "<a href='#'>" . $activity . "</a>" ?></h2>
                  <span class="meta-data"><i class="fa fa-calendar"></i><?php echo $act_time. " Every " .$act_day ?></span>
                </div>
                <p><?php echo $act_desc; ?></p>
              </div>
            </div>
          </li>
        </ul>
          <?php }
          } ?>
      </section>
    </div>
  </div>

  <!-- Start Sidebar -->
  <div class="col-md-4 col-sm-6">
    <!-- Latest Sermons -->
    <div class="listing sermons-listing">
      <header class="listing-header">
        <h3>Recent Sermons</h3>
      </header>
      <section class="listing-cont">

        <ul>
          <li class="item sermon featured-sermon">
            <?php
          $aud = "SELECT * FROM sermons ORDER BY sermons.sDate DESC LIMIT 1";
          $aquery = mysqli_query($conn, $aud);
          if (!$aquery) {
            echo "No";
            echo mysqli_error($conn);
          }
          else{
            while ($row = mysqli_fetch_assoc($aquery)) {
             $id = urlencode($row['ID']);
             $topic = $row['sermon_topic'];
             $image = $row['sermon_image'];
             $audio = $row['sermon_audio'];
             $speaker = $row['sermon_speaker'];
             $body = substr($row['sermon_desc'], 0, 50) . "...";
             $date = date('F j, Y', $row['sDate']);



         ?>
           <span class="date"><?php echo $date; ?></span>

            <h4 style="color: #198B87;"><?php
                echo $topic; ?></h4>
            <div class="featured-sermon-video">
              <?php
          if(preg_match("/^church-audio/i", $audio)){
            $audio= preg_replace("/^church-audio/i", "", $audio);
          } ?>
              <audio class="audio-player" src="<?php echo $audio; ?>" type="audio/mp3" controls></audio>
            </div>
            <h4 style="font-size: 14px;color: #8E7779;font-family: Candara;">By: <span style="font-family: Candara;color: #8E7779;font-weight: bold;"><?php echo $speaker; ?></span></h4>
            <div class="sermon-actions"> <!-- <a href="#" data-placement="top" data-toggle="tooltip" data-original-title="Video"><i class="fa fa-video-camera"></i></a> <a href="#" data-placement="top" data-toggle="tooltip" data-original-title="Play Audio"><i class="fa fa-headphones"></i></a> <a href="#" data-placement="top" data-toggle="tooltip" data-original-title="Read online"><i class="fa fa-file-text-o"></i></a> <a href="#" data-placement="top" data-toggle="tooltip" data-original-title="Download Audio"><i class="fa fa-download"></i></a> -->
             <p style="float: left;"><?php
              $id = base64_encode($id);
               echo "<a href='download_sermon.php?ID=$id' class='btn btn-primary'>Download <i class='fa fa-download'></i> </a>"; ?></p>
<!--                <p style="float: left;">--><?php
//                    echo "<a href='#' class='btn btn-primary'>Play <i class='fa fa-play'></i></a>"; ?><!--</p>-->

             </div>



          </li>
          <?php }
           } ?>
          <div class="col-md-4 col-sm-4 widget footer-widget" style="width: 100%; padding-left: 10px; padding-top: 10px;">
  <h4 class="footer-widget-title">Our Church on Facebook</h4>
  <!-- <ul class="twitter-widget">
  </ul> -->
  <!-- <div class="fb-page"></div>
  <div id="fb-root"></div> -->
  <div class="tweet" style=" height: 300px;border: 1px solid #000;">
<!--  <p style="padding: 10px 0px 0 10px;">LATEST TWEETS:</p>-->
<!--      <a class="twitter-timeline"  href="https://twitter.com/el_acquafresca"  data-widget-id="375941557314002944" data-chrome="noheader nofooter noborders transparent" width="290" height="300" overflow="hidden"></a>-->
<!--     <script>-->
<!--     !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");-->
<!--     </script>-->

      <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fweb.facebook.com%2Febenezer.acquafresca&tabs=timeline&width=350&height=250&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="289" height="298" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
     </div>
        </div>
                </ul>

              </section>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Start Featured Gallery -->
<!--   <div class="featured-gallery">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-3" style="margin-top: 60px;">
          <h4 style="font-size: 20px;">Updates from<br> our gallery</h4>
          </div>
        <div class="col-md-3 col-sm-3 post format-image"> <a href="images/img1.jpg" alt="" class="media-box" data-rel="prettyPhoto[Gallery]"> <img src="images/img1.jpg" alt=""> </a> </div>
        <div class="col-md-3 col-sm-3 post format-video"> <a href="http://youtu.be/NEFfnbQlGo8" class="media-box" data-rel="prettyPhoto[Gallery]"> <img src="images/img2.jpg" alt=""> </a> </div>
        <div class="col-md-3 col-sm-3 post format-image"> <a href="images/img3.jpg" class="media-box" data-rel="prettyPhoto[Gallery]"> <img src="images/img3.jpg" alt=""> </a> </div>
      </div>
    </div>
  </div> -->
  <!-- End Featured Gallery --> 

  <!-- Start Footer -->
  <?php 
  require 'footer.php';
   ?> 
  <!-- End Footer --> 
<a id="back-to-top"><i class="fa fa-angle-double-up"></i></a> </div>
<script src="js/jquery-2.0.0.min.js"></script> <!-- Jquery Library Call --> 
<script src="plugins/prettyphoto/js/prettyphoto.js"></script> <!-- PrettyPhoto Plugin --> 
<script src="js/helper-plugins.js"></script> <!-- Plugins --> 
<script src="js/bootstrap.js"></script> <!-- UI --> 
<script src="js/waypoints.js"></script> <!-- Waypoints --> 
<script src="plugins/mediaelement/mediaelement-and-player.min.js"></script> <!-- MediaElements --> 
<script src="js/init.js"></script> <!-- All Scripts --> 
<script src="plugins/flexslider/js/jquery.flexslider.js"></script> <!-- FlexSlider --> 
<script src="plugins/countdown/js/jquery.countdown.min.js"></script> <!-- Jquery Timer -->

 
<script type="">
  var deadline = '2018-05-04';
  
  function getTimeRemaining(endtime){
  var t = Date.parse(endtime) - Date.parse(new Date());
  var seconds = Math.floor( (t/1000) % 60 );
  var minutes = Math.floor( (t/1000/60) % 60 );
  var hours = Math.floor( (t/(1000*60*60)) % 24 );
  var days = Math.floor( t/(1000*60*60*24) );
  return {
    'total': t,
    'days': days,
    'hours': hours,
    'minutes': minutes,
    'seconds': seconds
  };
}

getTimeRemaining(deadline).minutes

function initializeClock(id, endtime){
  var clock = document.getElementById('clockdiv');
  var daysSpan = clock.querySelector('.days');
  var hoursSpan = clock.querySelector('.hours');
  var minutesSpan = clock.querySelector('.minutes');
  var secondsSpan = clock.querySelector('.seconds');

 function updateClock(){
    var t = getTimeRemaining(endtime);

    daysSpan.innerHTML = t.days;
    hoursSpan.innerHTML = t.hours;
    minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
    secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);
if(t.total<=0){
    clearInterval(timeinterval);
  }
}
updateClock(); // run function once at first to avoid delay
var timeinterval = setInterval(updateClock,1000);
}

initializeClock('clockdiv', deadline);
</script>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.0';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</body>
</html>