<?php 
    require 'includes/config.php';

    $sql = "SELECT * FROM member_add";
    $query = mysqli_query($conn, $sql);


//      $ssql = "SELECT * FROM events";
// $squery = mysqli_query($conn, $ssql);

//     if ($squery) {
//       while ($row = mysqli_fetch_assoc($squery)) {
//         $id = urlencode($row['ID']);
//         $timer = $row['event_month'];
//         $time = date('F j, Y', $row['event_month']);
//     }
// }

 ?>

<!DOCTYPE html>
<html>
<head>
    <title>Searching...</title>
</head>
<body>

    <<table>
              <thead>
                <tr>
                  <th>Firstname</th>
                  <th>Lastname</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Birthday</th>
                  <th>Nationality</th>
                </tr>
              </thead>
              <?php 
        if ($query) {
            while ($row = mysqli_fetch_assoc($query)) {
             ?>   
            <tbody>
                <tr>
                   <td style='text-align: center;'> $row[Firstname]</td> 
                   <td style='text-align: center;'> $row[Lastname]</td>                 
                   <td style='text-align: center;'> $row[Email]</td>
                   <td style='text-align: center;'> $row[Phone]</td>
                   <td style='text-align: center;'> $row[Birthday]</td>
                   <td style='text-align: center;'> $row[Nationality]</td>
                </tr>

                 </tbody>
                 <?php  
               }
             }
               ?>
            </table>


<!-- <span id="countdown" class="timer"></span>
<?php echo $time; ?>



<script>
    var initialTime = <?php echo $timer; ?>;//Place here the total of seconds you receive on your PHP code. ie: var initialTime = <? echo $remaining; ?>;

var seconds = initialTime;
function timer() {
    var days        = Math.floor(seconds/24/60/60);
    var hoursLeft   = Math.floor((seconds) - (days*86400));
    var hours       = Math.floor(hoursLeft/3600);
    var minutesLeft = Math.floor((hoursLeft) - (hours*3600));
    var minutes     = Math.floor(minutesLeft/60);
    var remainingSeconds = seconds % 60;
    if (remainingSeconds < 10) {
        remainingSeconds = "0" + remainingSeconds; 
    }
    document.getElementById('countdown').innerHTML = days + "Days " + hours + "Hours " + minutes + "Minutes " + remainingSeconds+ "Seconds";
    if (seconds == 0) {
        clearInterval(countdownTimer);
        document.getElementById('countdown').innerHTML = "Completed";
    } else {
        seconds--;
    }
}
var countdownTimer = setInterval('timer()', 1000);

</script> -->
</body>
</html>