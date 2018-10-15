<?php 
require 'header.php';

require 'includes/php-image-magician/php_image_magician.php';

  $msg = "";

if (isset($_POST['submit'])) {
  $err[] = "";
  $err_flag = false;
  if (empty($_POST['title'])) {
    $err[] = 'Post must have a title';
    $err_flag = true;
  }
  else
  {
    $title = trim($_POST['title']);
  }
  if (empty($_POST['day'])) {
    $err[] = 'Post must have a day';
    $err_flag = true;
  }
  else
  {
    $day = trim($_POST['day']);
  }

  if (empty($_POST['day_no'])) {
    $err[] = 'Post must have a day_no';
    $err_flag = true;
  }
  else
  {
    $day_no = trim($_POST['day_no']);
  }
  if (empty($_POST['month'])) {
    $err[] = 'Post must have a month';
    $err_flag = true;
  }
  else
  {
    $month = trim($_POST['month']);
  }
  if (empty($_POST['time'])) {
    $err[] = 'Post must have a time';
    $err_flag = true;
  }
  else
  {
    $time = trim($_POST['time']);
  }
  if (empty($_POST['phone'])) {
    $err[] = 'Post must have a phone';
    $err_flag = true;
  }
  else
  {
    $phone = trim($_POST['phone']);
  }
  if (empty($_POST['location'])) {
    $err[] = 'Post must have a location';
    $err_flag = true;
  }
  else
  {
    $location = trim($_POST['location']);
  }
  // if (empty($_POST['s_month'])) {
  //  $err[] = 'Post must have a select month';
  //  $err_flag = true;
  // }
  // else
  // {
  //  $s_month = trim($_POST['s_month']);
  // }
  if (empty($_POST['body'])) {
    $err[] = 'Post must have a body';
    $err_flag = true;
  }
  else
  {
    $body = trim($_POST['body']);
  }
  $date = $_POST['date'];

  $image_file = checkImage($_FILES['postimg'],650,350,"church-images/");

    if(preg_match("/[0-9]+\.[a-z]+/i", $image_file)){

  
  // $user_id = intval($_SESSION['user_id']);
  if (isset($err_flag) && $err_flag === false) {


    $sql_stmt = "SELECT * FROM events WHERE eTitle = '$title'";
    $mquery = mysqli_query($conn, $sql_stmt);
    if (mysqli_num_rows($mquery) >0) {
        $err = true;
    }
    else{
         $sql = "INSERT INTO events (eTitle, eDay, eDay_no, eTime, ePhone, eLocation, eImage, eDesc, month_id, eDate) VALUES ('$title', '$day', '$day_no', '$time', '$phone', '$location', '$image_file', '$body', '$month', '$date')";
    $query = mysqli_query($conn, $sql);
    if ($query) {
     $success = true;
    }
    else{
      echo mysqli_error($conn);
    }
    }   
  }
}
else{
    echo "Picture field is empty!!!";
}
}
 ?>

    <div class="slim-mainpanel">
      <div class="container">
        <div class="slim-pageheader">
          <h6 class="slim-pagetitle">ADD UPCOMING EVENTS</h6>
        </div><!-- slim-pageheader -->

        <div class="section-wrapper">
          <label class="section-title">UPCOMING EVENT INFO</label><br>
          <p style="font-size: 20px; color: #000;"><?php echo $msg; ?></p><br>
          
          <form method="post" action="add_upevent.php" enctype="multipart/form-data">
          <div class="form-layout">
            <div class="row mg-b-25">

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Event title: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="title">
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Event day: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="day">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Event day in number: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="day_no">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Event time: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="time">
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Event phone number: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="phone">
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Event month: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" name="month">
                      <option value=""></option>
                    <option>Select Month</option>
                    <?php 
                $sql = "SELECT * FROM months";
                $query = mysqli_query($conn, $sql);
                if (mysqli_num_rows($query) > 0) {
                  while ($row = mysqli_fetch_assoc($query)) {
                    $month = $row['month'];
                    $month_id = $row['ID'];
               ?>
              <option value="<?php echo $month_id; ?>"><?php echo $month; ?></option>
              <?php } } ?>
                  </select>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Event location: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="location">
                </div>
              </div><!-- col-8 -->

              <div class="col-lg-3" style="margin-top: 30px;">
              <div class="custom-file" style="width: 325px;">
                <label class="form-control-label">Event picture: <span class="tx-danger">*</span></label>
                <input type="file" class="custom-file-input" id="customFile" name="postimg" accept="image/*">
                <label class="custom-file-label" for="customFile">Choose picture file</label>
              </div><!-- custom-file -->
            </div><!-- col -->
            </div><!-- row -->

            <div class="row mg-b-25">
               <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Event description: <span class="tx-danger">*</span></label>
                  <textarea class="form-control" name="body" style="width: 400px; min-height: 200px; "></textarea>
                </div>
              </div>

              
             <!-- col-8 -->

              <div class="form-group">
                      <input type="hidden" name="date" value="<?php echo time(); ?>">
                 </div>&nbsp;
              
            </div><!-- row -->
             
            <div class="form-layout-footer">
              <input type="submit" class="btn btn-primary bd-1" name="submit" value="Submit" style="width: 260px;">&nbsp;&nbsp;&nbsp;
<!--              <button class="btn btn-secondary bd-1" style="width: 190px;">Cancel</button>-->
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
          </form>
        </div><!-- section-wrapper -->
        

        <?php require 'footer.php'; ?>

    <script src="lib/jquery/js/jquery.js"></script>
    <script src="lib/popper.js/js/popper.js"></script>
    <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script src="lib/jquery.cookie/js/jquery.cookie.js"></script>
    <script src="lib/select2/js/select2.min.js"></script>
    <script src="lib/parsleyjs/js/parsley.js"></script>

    <script src="js/slim.js"></script>

    <!-- Sweet Alert -->
    <script src="js/sweetalert.min.js"></script>

    <?php if (isset($success) && $success === true) { ?>
    <script type="text/javascript">
        swal("Good!!!", "Event successfully inserted...", "success");
    </script>
    <?php } ?>

    <?php if (isset($err) && $err === true) { ?>
    <script type="text/javascript">
        swal("Ooops!!!", "Event already exist... Check your picture!!!", "error");
    </script>
    <?php } ?>
    <!-- Sweet Alert ends -->

    <script>
      $(function(){
        'use strict'

        $('.form-layout .form-control').on('focusin', function(){
          $(this).closest('.form-group').addClass('form-group-active');
        });

        $('.form-layout .form-control').on('focusout', function(){
          $(this).closest('.form-group').removeClass('form-group-active');
        });

        // Select2
        $('.select2').select2({
          minimumResultsForSearch: Infinity
        });

        $('#select2-a, #select2-b').select2({
          minimumResultsForSearch: Infinity
        });

        $('#select2-a').on('select2:opening', function (e) {
          $(this).closest('.form-group').addClass('form-group-active');
        });

        $('#select2-a').on('select2:closing', function (e) {
          $(this).closest('.form-group').removeClass('form-group-active');
        });

      });
    </script>
    <script type="text/javascript">
      function change_country()
    {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.open("GET", "ajaxD.php?country="+document.getElementById("countrydd").value, false);
      xmlhttp.send(null);
      //alert(xmlhttp.responseText);
      document.getElementById("state").innerHTML=xmlhttp.responseText;
    }
    </script>
  </body>
</html>
