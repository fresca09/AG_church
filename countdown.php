<div class="notice-bar">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-6 notice-bar-title"> <span class="notice-bar-title-icon hidden-xs"><i class="fa fa-calendar fa-3x"></i></span> <span class="title-note">Next</span> <strong>Upcoming Event</strong> </div>
        <div class="col-md-3 col-sm-6 col-xs-6 notice-bar-event-title">
          <?php 
          $ssql = "SELECT *,events.ID FROM events INNER JOIN months ON events.month_id = months.ID ORDER BY events.event_month ASC LIMIT 1";
$squery = mysqli_query($conn, $ssql);

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