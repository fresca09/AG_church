  <!-- Start Site Header -->
  <?php 
  require 'header.php';

 ?>
  <!-- End Site Header --> 
  <!-- Start Nav Backed Header -->
  <div class="nav-backed-header parallax" style="background-image:url(images/main2.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li><a href="#">About Us</a></li>
            <li class="active">Our Pastor</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- End Nav Backed Header --> 
  <!-- Start Page Header -->
  <!-- <div class="page-header">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-sm-10 col-xs-8">
          <h1>Events</h1>
        </div>
        <div class="col-md-2 col-sm-2 col-xs-4"> <a href="events.html" class="pull-right btn btn-primary">All events</a> </div>
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
            <nav class="btn-toolbar pull-right" style="margin-right: 70px;"> <a href="#" class="btn btn-default" data-placement="bottom" data-toggle="tooltip" data-original-title="Facebook" ><i class="fa fa-facebook"></i></a> <a href="#" class="btn btn-default" data-placement="bottom" data-toggle="tooltip" data-original-title="Twitter" ><i class="fa fa-twitter"></i></a> <a href="#" class="btn btn-default" data-placement="bottom" data-toggle="tooltip" data-original-title="Whatsapp" ><i class="fa fa-whatsapp"></i></a> </nav>
           <!--  <div class="social-icons"> <a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a> <a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a><a href="http://www.pinterest.com/" target="_blank"><i class="fa fa-youtube"></i></a>
        </div> -->
              <h2 class="post-title">Our Pastor</h2>
            </header>
            <article class="post-content">
              <div class="event-description">
               
                <div class="spacer-20"></div>
              
                <p><img src="church-images/pastor.jpg" style="width: 50%; height: 300px; float: left; margin: 0 auto; padding-right: 20px;">Dr. Ikechukwu Sabastine Oduenyi (Dp.Th, B.A. Phil, B.Th. M.A. Phil, CTT, Ph.D) is a graduate of the University of Nigeria Nsukka where he studied philosophy from his Bachelor's Degree to his Doctorate Degree, specializing in metaphysics (Philosophy of Mind) in his doctoral degree thesis.<br><br>
                Rev. Dr. Sebastian Oduenyi is a certified Theologian and a teacher of the Word (Bible). He is an Associate Member of the Association of Christian Theologians (ACTS). Rev. Oduenyi also holds both diploma and a bachelor's degree in theology and he is currently a research fellow of the United Bible University, Lagos, working for the Masters in Arts and Science in Theology.</p>

                
                <p style="width: 90%;">He is also a lecturer at Crown Theological Seminary Enugu and the H.O.D of Biblical Studies Department of the Seminary. He has authored other books and articles. He coordinates the Comforter's Voice Prayer Summit, Pastor A.G. Worship Centre, Zodiac Hotels, Enugu and husband of Pastor Esther and father of three grown up children: Thank God, Fear God, and Worship God.</p>
                
              </div>
            </article>

            
          </div>
          <!-- Start Sidebar -->
          <div class="col-md-3 sidebar">
            <?php require 'sidebar.php'; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Start Footer -->
  <?php 
  require 'footer.php';
   ?> 
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
</body>
</html>