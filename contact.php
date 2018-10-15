<?php 
  require 'header.php';

$msg = "";
//  if (isset($_POST['submit'])) {
//      $err[] = "";
//      $err_flag = false;
//      if (empty($_POST['name'])) {
//          $err[] = 'Post must have a name';
//          $err_flag = true;
//      }
//      else
//      {
//          $name = trim($_POST['name']);
//      }
//
//      if (empty($_POST['email'])) {
//          $err[] = 'Post must have a email';
//          $err_flag = true;
//      }
//      else
//      {
//          $email = trim($_POST['email']);
//      }
//
//      if (empty($_POST['phone'])) {
//          $err[] = 'Post must have a phone';
//          $err_flag = true;
//      }
//      else
//      {
//          $phone = trim($_POST['phone']);
//      }
//      if (empty($_POST['message'])) {
//          $err[] = 'Post must have a message';
//          $err_flag = true;
//      }
//      else
//      {
//          $message = trim($_POST['message']);
//      }
//      $date = $_POST['date'];
//
//      $sql = "INSERT INTO contact_messages (name, email, phone, message, msg_date) VALUES ('$name', '$email', '$phone', '$message', '$date')";
//      $query = mysqli_query($conn, $sql);
//    if ($query) {
//        //$msg = true;
//        $msg = "Sent";
//    }
//    else{
//        //$msg = false;
//        $msg = "Not sent";
//        $msg = mysqli_error($conn);
//    }
//
//  }

 ?>
  <!-- Start Nav Backed Header -->
  <div class="nav-backed-header parallax" style="background-image:url(images/back1.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
<!--          <ol class="breadcrumb">-->
<!--            <li><a href="index.php">Home</a></li>-->
<!--            <li><a href="#">About Us</a></li>-->
<!--            <li class="active">Contact</li>-->
<!--          </ol>-->
        </div>
      </div>
    </div>
  </div>
  <!-- End Nav Backed Header --> 
  <!-- Start Page Header -->
  <!-- <div class="page-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>Contact</h1>
        </div>
      </div>
    </div>
  </div> -->
  <?php require 'countdown.php'; ?>
  <!-- End Page Header --> 
  <!-- Start Content -->
  <div class="main" role="main">
    <div id="content" class="content full">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <header class="single-post-header clearfix">
              <h2 class="post-title">Our Location</h2>
            </header>
            <div class="post-content">
<!--              <div id="gmap">-->
<!--                <iframe src="https://maps.google.com/maps?q=zodiac%20hotel%20enugu&t=&z=13&ie=UTF8&amp;ll=40.717989,-74.002705&amp;spn=0.043846,0.077162&amp;t=m&amp;z=14&amp;output=embed"></iframe>-->
<!--              </div>-->

                <div class="mapouter" style="margin-bottom: 40px;">
                    <div class="gmap_canvas">
                        <iframe width="700" height="350" id="gmap_canvas" src="https://maps.google.com/maps?q=zodiac%20hotel%20enugu&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.crocothemes.net">crocothemes.net</a>
                    </div>
                    <style>.mapouter{text-align:right;height:350px;width:700px;}.gmap_canvas {overflow:hidden;background:none!important;height:350px;width:700px;}</style>
                </div>

              <div class="row">
                  <header class="single-post-header clearfix" style="padding-bottom: 20px; margin-left: 10px;">


                      <h2 class="post-title">Contact us here</h2>
                      <p id="msg" style="font-size: 18px; color: #A9919D;"></p><br>
<!--                      <p>--><?php
//                          echo $msg;
//                          ?><!--</p>-->
                  </header>
                <form method="post" action="contact.php" class="contact-form" id="form1">
                  <div class="col-md-6 margin-15">
                    <div class="form-group">
                      <input type="text" id="name" name="name"  class="form-control input-lg" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                      <input type="email" id="email" name="email"  class="form-control input-lg" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                      <input type="text" id="phone" name="phone" class="form-control input-lg" placeholder="Phone" required>
                    </div>
                    <div class="form-group">
                      <input type="hidden" name="date" value="<?php echo time(); ?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <textarea cols="10" rows="7" id="message" name="message" class="form-control input-lg" placeholder="Enter message" required style="margin-top: -5px;"></textarea>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <input id="submit" name="submit" type="submit" class="btn btn-primary btn-lg pull-right" value="Submit now!">
                  </div>
                </form>
                <div class="clearfix"></div>
                <div class="col-md-12">

                </div>
              </div>
            </div>
          </div>
          <!-- Start Sidebar -->
          <div class="col-md-3 sidebar"> 
            <!-- Recent Posts Widget -->
            <div class="widget-recent-posts widget">
              <div class="sidebar-widget-title">
                <h3 style=" width: 150%; border-bottom: none;">Comforter's Voice on Radio</h3>
              </div>
              <ul>
                <li class="clearfix"> 
                  <div class="widget-blog-content" style="width: 140%;"><a href="#">On Dream FM, 94.5. Enugu</a> <span class="meta-data"><i class="fa fa-calendar"></i> 8am, Every Saturday.</span> </div>
                </li>
                <li class="clearfix"> 
                  <div class="widget-blog-content" style="width: 140%;""><p>For Enquiries Call</p> <span class="meta-data"><i class="fa fa-calendar"></i> 08098123454<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0987345762</span> </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Start Footer -->
  <?php 
  require 'footer.php';
   ?> 

   <script src="js/sweetalert.min.js"></script><!-- Sweet Alert -->
    <?php if (isset($msg) && $msg === true) { ?>
    <script type="text/javascript">
        swal("Good job!", "Your message has been sent. Thank you", "success");
    </script>
    <?php } ?>

    <?php if (isset($msg) && $msg === false) { ?>
    <script type="text/javascript">
        swal("Ooops!!!", "Message not sent", "error");
    </script>
    <?php } ?>
  <!-- End Footer --> 
  <a id="back-to-top"><i class="fa fa-angle-double-up"></i></a>
</div>

<script src="js/jquery-2.0.0.min.js"></script> <!-- Jquery Library Call -->
<script src="plugins/prettyphoto/js/prettyphoto.js"></script> <!-- PrettyPhoto Plugin -->
<script src="js/helper-plugins.js"></script> <!-- Plugins -->
<script src="js/bootstrap.js"></script> <!-- UI -->
<script src="js/waypoints.js"></script> <!-- Waypoints -->
<script src="plugins/mediaelement/mediaelement-and-player.min.js"></script> <!-- MediaElements -->
<script src="js/init.js"></script> <!-- All Scripts -->
<script src="plugins/flexslider/js/jquery.flexslider.js"></script> <!-- FlexSlider -->
<script src="plugins/countdown/js/jquery.countdown.min.js"></script> <!-- Jquery Timer -->
<script src="js/jquery-2.0.0.min.js"></script> <!-- Jquery Library Call -->
<script type="text/javascript" src="js/jquery.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $("#form1").on("submit", function(e){
            // alert("Yes");
            e.preventDefault();
            $.ajax({
                url: "contact_insert.php",
                data: new FormData(this),
                cache: false,
                processData: false,
                contentType: false,
                type: "POST",
                success: function(strMessage){
                    $('#msg').text(strMessage)
                }
            });
        });

    });
</script>

</body>
</html>