<?php 
require 'header.php';

require 'includes/php-image-magician/php_image_magician.php'; 
 ?>

    <div class="slim-mainpanel">
      <div class="container">
        <div class="slim-pageheader">
          <h6 class="slim-pagetitle">EDIT SERMONS</h6>
        </div><!-- slim-pageheader -->

        <div class="section-wrapper">
          <label class="section-title">SERMON INFO</label><br>
          <p id="message" style="font-size: 18px; color: #A9919D; margin-left: -15px;"></p><br>
          
          <form method="post" enctype="multipart/form-data" id="form1">
          <div class="form-layout">
            <div class="row mg-b-25">
              <input type="hidden" id="id" name="id" value="<?= $_GET['ID']; ?>" readonly="readonly">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Sermon Title: </label>
                  <input class="form-control" type="text" name="topic" id="topic" value="<?= $_GET['sermon_topic']; ?>">
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Sermon Author: </label>
                  <input class="form-control" type="text" name="speaker" id="speaker" value="<?= $_GET['sermon_speaker']; ?>">
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Sermon Category: </label>
                  <select class="form-control select2" name="category">
                      <option value="<?= $_GET['category']; ?>"><?= $_GET['category']; ?></option>
                    <option value="">Select Category</option>
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
                <label class="form-control-label">Sermon picture: </label>
                <input type="file" class="custom-file-input" id="customFile" name="postimg" accept="image/*">
                <label class="custom-file-label" for="customFile">Choose picture file</label>
              </div><!-- custom-file -->
            </div><!-- col -->

              
              <div class="col-lg-3" style="margin-top: 30px;margin-left: 86px; ">
              <div class="custom-file" style="width: 325px;">
                <!-- <label class="form-control-label">sermon PDF: <span class="tx-danger">*</span></label> -->
                <input type="file" class="custom-file-input" id="customFile" name="audio" accept="audio/*">
                <label class="custom-file-label" for="customFile">Choose Sermon Audio</label>
              </div><!-- custom-file -->
            </div><!-- col -->
            </div><!-- row -->

            <div class="row mg-b-25">
<!--               <div class="col-lg-4">-->
<!--                <div class="form-group mg-b-10-force">-->
<!--                  <label class="form-control-label">Sermon Abstract: </label>-->
<!--                  <textarea class="form-control" name="body" style="width: 400px; min-height: 200px; " value="">--><?//= $_GET['sermon_desc']; ?><!--</textarea>-->
<!--                </div>-->
<!--              </div>          -->
             <!-- col-8 -->

              <div class="form-group">
                      <input type="hidden" name="date" value="<?php echo time(); ?>">
                 </div>&nbsp;
              
            </div><!-- row -->
             
            <div class="form-layout-footer">
              <input type="submit" class="btn btn-primary bd-1" name="update" id="update" value="Update" style="width: 190px;">&nbsp;&nbsp;&nbsp;
              <button class="btn btn-secondary bd-1" style="width: 190px;">Cancel</button>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout --><br>
          <div><h5>Click to view <a href="view_sermons.php">Sermons</a></h5>
  
</div>
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
    $(document).ready(function(){
      $("#form1").on("submit", function(e){
        e.preventDefault();
        $.ajax({
          url: "update_sermons.php",
          data: new FormData(this),
          cache: false,
          processData: false,
          contentType: false,
          type: "POST",
          success: function(strMessage){
            $('#message').text(strMessage)
          }
        });
      });

    });
  </script>
  </body>
</html>
