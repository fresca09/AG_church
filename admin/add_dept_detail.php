<?php 
require 'header.php';

require 'includes/php-image-magician/php_image_magician.php';

  $msg = "";

if (isset($_POST['submit']) && $_POST['submit'] == "Submit") {
  $err[] = "";
  $err_flag = false;


  if (empty($_POST['day'])) {
    $err[] = 'Post must have a day';
    $err_flag = true;
  }
  else
  {
    $day = trim($_POST['day']);
  }
  if (empty($_POST['time'])) {
    $err[] = 'Post must have a time';
    $err_flag = true;
  }
  else
  {
    $time = trim($_POST['time']);
  }

  if (empty($_POST['address'])) {
    $err[] = 'Post must have a address';
    $err_flag = true;
  }
  else
  {
    $address = trim($_POST['address']);
  }

  if (empty($_POST['phone'])) {
    $err[] = 'Post must have a phone';
    $err_flag = true;
  }
  else
  {
    $phone = trim($_POST['phone']);
  }

  if (empty($_POST['department'])) {
    $err[] = 'Post must have a department';
    $err_flag = true;
  }
  else
  {
    $department = trim($_POST['department']);
  }

  if (empty($_POST['body'])) {
    $err[] = 'Post must have a body';
    $err_flag = true;
  }
  else
  {
    $body = trim($_POST['body']);
  }

  if (isset($err_flag) && $err_flag === false) {

    $sql_stmt = "SELECT * FROM department_details WHERE dept_id = '$department'";
    $mquery = mysqli_query($conn, $sql_stmt);
    if (mysqli_num_rows($mquery) >0) {
        $err = true;
    }
    else{
        $sql = "INSERT INTO department_details (day, d_time, address, phone, body, dept_id) VALUES ('$day', '$time', '$address', '$phone', '$body', '$department')";
      $query = mysqli_query($conn, $sql);
      if ($query) {
       $success = true;
    }
    }
    
   }    
  
}
 ?>

    <div class="slim-mainpanel">
      <div class="container">
        <div class="slim-pageheader">
          <h6 class="slim-pagetitle">ADD DEPARTMENTAL DETAILS</h6>
        </div><!-- slim-pageheader -->

        <div class="section-wrapper">
          <label class="section-title">DEPARTMENTAL DETAILS</label><br>
          <p style="font-size: 20px; color: #000;"><?php echo $msg; ?></p><br>
          
          <form method="post" action="add_dept_detail.php" enctype="multipart/form-data">
          <div class="form-layout">
            <div class="row mg-b-25">

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Meeting Day(s): <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="day">
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Meeting Time(s): <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="time">
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Meeting Address(es): <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="address">
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Department Phone: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="phone">
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Department Category: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" name="department">
                      <option value=""></option>
                    <option>Select Department</option>
                    <?php 
            $sql = "SELECT * FROM department";
            $query = mysqli_query($conn, $sql);
            if (mysqli_num_rows($query) > 0) {
              while ($row = mysqli_fetch_assoc($query)) {
                $dept_name = $row['Department'];
                $dept_id = $row['ID'];
           ?>
          <option value="<?php echo $dept_id; ?>"><?php echo $dept_name; ?></option>
          <?php } } ?>
                  </select>
                </div>
              </div><!-- col-4 -->

            </div><!-- row -->

            <div class="row mg-b-25">
               <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Department Description: <span class="tx-danger">*</span></label>
                  <textarea class="form-control" name="body" style="width: 400px; min-height: 200px; "></textarea>
                </div>
              </div>          
             <!-- col-8 -->

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
        swal("Good!!!", "Departmental details successfully inserted...", "success");
    </script>
    <?php } ?>

    <?php if (isset($err) && $err === true) { ?>
    <script type="text/javascript">
        swal("Ooops!!!", "Departmental details already filled... Duplicate department!!!", "error");
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
  </body>
</html>
