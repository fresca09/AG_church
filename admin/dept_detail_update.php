<?php 
require 'header.php';

require 'includes/php-image-magician/php_image_magician.php';
 ?>

    <div class="slim-mainpanel">
      <div class="container">
        <div class="slim-pageheader">
          <h6 class="slim-pagetitle">EDIT DEPARTMENTAL DETAILS</h6>
        </div><!-- slim-pageheader -->

        <div class="section-wrapper">
          <label class="section-title">DEPARTMENTAL DETAIL INFO</label><br>
          <!-- <p style="font-size: 20px; color: #000;"><?php echo $msg; ?></p><br> -->
          <p id="message" style="font-size: 18px; color: #A9919D; margin-left: -15px;"></p><br>
          
          <form method="post" action="dept_detail_update.php" enctype="multipart/form-data">
          <div class="form-layout">
            <div class="row mg-b-25">

              <input type="hidden" id="id" name="id" value="<?= $_GET['ID']; ?>" readonly="readonly">

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Departmental Day: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="day" value="<?= $_GET['day']; ?>">
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Departmental Time: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="time" value="<?= $_GET['d_time']; ?>">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Departmental Address: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="address" value="<?= $_GET['address']; ?>">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Departmental Phone: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="phone" value="<?= $_GET['phone']; ?>">
                </div>
              </div><!-- col-4 -->
            </div><!-- row -->

            <div class="row mg-b-25">
               <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Departmental Description: <span class="tx-danger">*</span></label>
                  <textarea class="form-control" name="body" style="width: 400px; min-height: 200px; " value=""><?= $_GET['body']; ?></textarea>
                </div>
              </div>           
            </div><!-- row -->
             
            <div class="form-layout-footer">
              <input type="submit" class="btn btn-primary bd-1" name="update" id="update" value="Update" style="width: 190px;">&nbsp;&nbsp;&nbsp;
              <button class="btn btn-secondary bd-1" style="width: 190px;">Cancel</button>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
          <div style="padding-top: 10px;"><h5>Click to view <a href="view_dept_detail.php">Departmental Details</a></h5>
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
      $('#update').click(function(event){
        event.preventDefault();
        $.ajax({
          url: "update_dept_detail.php",
          method: "post",
          data: $('form').serialize(),
          dataType: "text",
          success: function(strMessage){
            $('#message').text(strMessage)
          }
        })
      })
    })
  </script>
  </body>
</html>
