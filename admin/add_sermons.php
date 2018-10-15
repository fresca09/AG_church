<?php 
require 'header.php';

require 'includes/php-image-magician/php_image_magician.php';

  $msg = "";

if (isset($_POST['submit']) && $_POST['submit'] == "Submit") {
  $err[] = "";
  $err_flag = false;

  $dat = "church-audio/";
    $audio_path = $dat.basename($_FILES['audio']['name']);
    move_uploaded_file($_FILES['audio']['tmp_name'], $audio_path);

  if (empty($_POST['topic'])) {
    $err[] = 'Post must have a topic';
    $err_flag = true;
  }
  else
  {
    $topic = trim($_POST['topic']);
  }
  if (empty($_POST['speaker'])) {
    $err[] = 'Post must have a speaker';
    $err_flag = true;
  }
  else
  {
    $speaker = trim($_POST['speaker']);
  }

  if (empty($_POST['category'])) {
    $err[] = 'Post must have a category';
    $err_flag = true;
  }
  else
  {
    $category = trim($_POST['category']);
  }

  $body = trim($_POST['body']);

  $date = $_POST['date'];

  $image_file = checkImage($_FILES['postimg'],300,320,"church-images/");

  // $user_id = intval($_SESSION['user_id']);
  if (isset($err_flag) && $err_flag === false) {

    $sql_stmt = "SELECT * FROM sermons WHERE sermon_topic = '$topic'";
    $mquery = mysqli_query($conn, $sql_stmt);
    if (mysqli_num_rows($mquery) >0) {
        $err = true;
    }
    else{
         $sql = "INSERT INTO sermons (sermon_topic, sermon_speaker, sermon_image, sermon_audio, sermon_desc, cat_id, sDate) VALUES ('$topic', '$speaker', '$image_file', '$audio_path', '$body', '$category', '$date')";
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
          <h6 class="slim-pagetitle">ADD SERMONS</h6>
        </div><!-- slim-pageheader -->

        <div class="section-wrapper">
          <label class="section-title">SERMON INFO</label><br>
          <p style="font-size: 20px; color: #000;"><?php echo $msg; ?></p><br>
          
          <form method="post" action="add_sermons.php" enctype="multipart/form-data">
          <div class="form-layout">
            <div class="row mg-b-25">

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Sermon Title: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="topic" required>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Sermon Minister: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="speaker" required>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Sermon Category: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" name="category">
                      <option value=""></option>
                    <option>Select Sermon Category</option>
                    <?php 
            $sql = "SELECT * FROM Category";
            $query = mysqli_query($conn, $sql);
            if (mysqli_num_rows($query) > 0) {
              while ($row = mysqli_fetch_assoc($query)) {
                $cat_name = $row['category'];
                $cat_id = $row['ID'];
           ?>
          <option value="<?php echo $cat_id; ?>"><?php echo $cat_name; ?></option>
          <?php } } ?>
                  </select>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-3" style="margin-top: 30px;">
              <div class="custom-file" style="width: 325px;">
                <label class="form-control-label">Sermon picture: <span class="tx-danger">*</span></label>
                <input type="file" accept="image/*" class="custom-file-input" id="customFile" name="postimg">
                <label class="custom-file-label" for="customFile">Choose Sermon Picture</label>
              </div><!-- custom-file -->
            </div><!-- col -->

              
              <div class="col-lg-3" style="margin-top: 30px;margin-left: 86px; ">
              <div class="custom-file" style="width: 325px;">
                <!-- <label class="form-control-label">Sermon PDF: <span class="tx-danger">*</span></label> -->
                <input type="file" accept="audio/*" class="custom-file-input" name="audio">
                <label class="custom-file-label" for="customFile">Choose Sermon Audio</label>
              </div><!-- custom-file -->
            </div><!-- col -->
            </div><!-- row -->

            <div class="row mg-b-25" style=" display: none;">
               <div class="col-lg-4 hidden">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Sermon Description: <span class="tx-danger">*</span></label>
                  <textarea class="form-control" name="body" style="width: 400px; min-height: 200px;"></textarea>
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
        swal("Good!!!", "Sermon successfully inserted...", "success");
    </script>
    <?php } ?>

    <?php if (isset($err) && $err === true) { ?>
    <script type="text/javascript">
        swal("Ooops!!!", "Sermon already exist... Duplicate sermon topic!!!", "error");
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
