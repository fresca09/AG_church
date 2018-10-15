<?php 
require 'header.php';

require 'includes/php-image-magician/php_image_magician.php';

 $sql = "SELECT * FROM admin";
   $query = mysqli_query($conn, $sql);

 ?>

    <div class="slim-mainpanel">
      <div class="container">
        <div class="slim-pageheader">
          <h6 class="slim-pagetitle">EDIT PROFILE</h6>
        </div><!-- slim-pageheader -->

        <div class="section-wrapper">
          <label class="section-title">PROFILE INFO</label><br>
          <p id="message" style="font-size: 20px; color: #000;"></p><br>
          
          <form method="post" enctype="multipart/form-data" id="form1">
          <div class="form-layout">
            <div class="row mg-b-25">
              
                  <input type="hidden" name="id" id="id" value="<?php if(isset($user_id)){echo $user_id; } ?>">              

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">First Name: </label>
                  <input class="form-control" type="text" name="fname" id="fname" value="<?php if(isset($user_fname)){echo $user_fname; } ?>">
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Last Name: </label>
                  <input class="form-control" type="text" name="lname" id="lname" value="<?php if(isset($user_lname)){echo $user_lname; } ?>">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Username: </label>
                  <input class="form-control" type="text" name="username" id="username" value="<?php if(isset($user_name)){echo $user_name; } ?>">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Email Address: </label>
                  <input class="form-control" type="text" name="email" id="email" value="<?php if(isset($user_email)){echo $user_email; } ?>">
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Phone Number: </label>
                  <input class="form-control" type="text" name="phone" id="phone" value="<?php if(isset($user_phone)){echo $user_phone; } ?>">
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Gender: </label>
                  <select class="form-control select2"  name="gender" id="gender">
                    <option value="<?php if(isset($user_gender)){echo $user_gender; } ?>">Select Gender</option>
                    <option>Male</option>
                    <option>Female</option>
                  </select>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Old Password: </label>
                  <input class="form-control" type="password" name="password" id="password">
                </div>
              </div><!-- col-8 -->

              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Password: </label>
                  <input class="form-control" type="password" name="password1" id="password1">
                </div>
              </div>

              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Confirm Password: </label>
                  <input class="form-control" type="password" name="password2" id="password2">
                </div>
              </div>            

            <div class="col-lg-3" style="margin-top: 30px;">
              <div class="custom-file" style="width: 325px;">
                <label class="form-control-label">Profile picture: <span class="tx-danger">*</span></label>
                <input type="file" class="custom-file-input" id="customFile" name="postimg" value="<?php if(isset($user_image)){echo $user_image; } ?>">
                <label class="custom-file-label" for="customFile">Choose picture file</label>
              </div>
            </div>
            </div>
             
            <div class="form-layout-footer">
              <input type="submit" class="btn btn-primary bd-1" name="update" id="update" value="Edit" style="width: 190px;">&nbsp;&nbsp;&nbsp;
              <input type="#" name="cancel" value="Cancel" class="btn btn-secondary bd-1" style="width: 190px;">
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
           <div style="padding-top: 10px;"><h5>Click to view <a href="view_profile.php?ID=$user_id">Admin Profile</a></h5>
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

    <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $("#form1").on("submit", function(e){
        e.preventDefault();
        $.ajax({
          url: "profile_update.php",
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

    })
  </script>
  </body>
</html>
