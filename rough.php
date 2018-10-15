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

                        <h2 class="post-title">Our Vision</h2>
                    </header>
                    <article class="post-content">
                        <div class="container col-lg-12">
                            <?php include_once("tab_ministry.php"); ?>
                            <ul class="nav nav-tabs center-block">
                                <?php echo $dept_html; ?>
                            </ul>
                            <div class="event-description">
                                <div class="tab-content" id="tab">
                                    <?php echo $text_html; ?>

                                </div>
                            </div>
                        </div>
                    </article>

                    <header class="single-post-header clearfix">

                        <h2 class="post-title">Our Ministries</h2>
                    </header>
                    <article class="post-content">
                        <div class="container col-lg-12" style="padding-bottom: 50px;">
                            <?php include_once("tab_dept.php"); ?>
                            <ul class="nav nav-tabs center-block">
                                <?php echo $dept_html; ?>
                            </ul>
                            <div class="event-description">
                                <div class="tab-content" id="tab">
                                    <?php echo $text_html; ?>
                                </div>
                            </div>
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

<script type="text/javascript">
    function openCity(evt, cityName) {
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }


        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";


    }

</script>
</body>
</html>