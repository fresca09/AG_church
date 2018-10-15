<?php 
require 'header.php';
 ?>
 
  

    <div class="slim-mainpanel">
      <div class="container">
        <div class="slim-pageheader">
<!--          <ol class="breadcrumb slim-breadcrumb">-->
<!--            <li class="breadcrumb-item"><a href="#">Home</a></li>-->
<!--            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>-->
<!--          </ol>-->
          <h6 class="slim-pagetitle">Dashboard</h6>
        </div><!-- slim-pageheader -->

        <div class="dash-headline">
          <div class="dash-headline-left">
            <div class="dash-headline-item-one">
              <div>
                <img src="img/lord.jpg" width="121%" height="500px;">
              </div>
              
            </div><!-- dash-headline-item-one -->
          </div><!-- dash-headline-left -->

          <div class="dash-headline-right">
            <div class="dash-headline-right-top">
              <div class="dash-headline-item-two">
                <div id="chartMultiBar1" class="chart-rickshaw"></div>
                <div class="dash-item-overlay">
                  <?php 
                  $var = "SELECT * FROM newsletter";
                  $show = mysqli_query($conn, $var);
                  if ($show) {
                    $now = mysqli_num_rows($show);
                  }
                  
                 ?>
                <h4><?php echo $now; ?></h4>
                  <p class="item-label">Our subscribers</p>
                  <p class="item-desc">Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus...</p>
                  <!-- <a href="#" class="report-link">View Report <i class="fa fa-angle-right mg-l-5"></i></a> -->
                </div>
              </div><!-- dash-headline-item-two -->
            </div><!-- dash-headline-right-top -->
            <div class="dash-headline-right-bottom">
              <div class="dash-headline-right-bottom-left">
                <div class="dash-headline-item-three">
                  <span id="sparkline3" class="sparkline wd-100p">1,4,4,7,5,9,10,5,4,4,7,5,9,10</span>
                  <div>
                    <?php 
                  $var = "SELECT * FROM sermons";
                  $show = mysqli_query($conn, $var);
                  if ($show) {
                    $now = mysqli_num_rows($show);
                  }
                  
                 ?>
                <h1><?php echo $now; ?></h1>

                    <p class="item-label">Sermons</p>
                    <p class="item-desc">Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus...</p>
                  </div>
                </div><!-- dash-headline-item-three -->
              </div><!-- dash-headline-right-bottom-left -->
              <div class="dash-headline-right-bottom-right">
                <div class="dash-headline-item-three">
                  <span id="sparkline4" class="sparkline wd-100p">1,4,4,7,5,7,4,3,4,4,6,5,9,7</span>
                  <div>
                    <?php 
                  $var = "SELECT * FROM books";
                  $show = mysqli_query($conn, $var);
                  if ($show) {
                    $now = mysqli_num_rows($show);
                  }
                  
                 ?>
                <h1><?php echo $now; ?></h1>
                    <p class="item-label">Books</p>
                    <p class="item-desc">Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus...</p>
                  </div>
                </div><!-- dash-headline-item-three -->
              </div><!-- dash-headline-right-bottom-right -->
            </div><!-- dash-headline-right-bottom -->
          </div><!-- wd-50p -->
        </div><!-- d-flex ht-100v -->

        <div class="card card-dash-one mg-t-20">
          <div class="row no-gutters">
            <div class="col-lg-3">
              <i class="icon ion-ios-analytics-outline"></i>
              <div class="dash-content">
                <label class="tx-primary">Events <span style="color: #B5B5EA;">(Upcoming)</span></label>
                <?php 
                  $var = "SELECT * FROM events";
                  $show = mysqli_query($conn, $var);
                  if ($show) {
                    $now = mysqli_num_rows($show);
                  }
                  
                 ?>
                <h2><?php echo $now; ?></h2>
              </div><!-- dash-content -->
            </div><!-- col-3 -->
            <div class="col-lg-3">
              <i class="icon ion-ios-pie-outline"></i>
              <div class="dash-content">
                <label class="tx-success">Monthly events</label>
                <?php 
                  $var = "SELECT * FROM m_event";
                  $show = mysqli_query($conn, $var);
                  if ($show) {
                    $now = mysqli_num_rows($show);
                  }
                  
                 ?>
                <h2><?php echo $now; ?></h2>
              </div><!-- dash-content -->
            </div><!-- col-3 -->
            <div class="col-lg-3">
              <i class="icon ion-ios-stopwatch-outline"></i>
              <div class="dash-content">
                <label class="tx-purple">Messages Received</label>
                <?php 
                  $var = "SELECT * FROM contact_messages";
                  $show = mysqli_query($conn, $var);
                  if ($show) {
                    $now = mysqli_num_rows($show);
                  }
                  
                 ?>
                <h2><?php echo $now; ?></h2>
              </div><!-- dash-content -->
            </div><!-- col-3 -->
            <div class="col-lg-3">
              <i class="icon ion-ios-world-outline"></i>
              <div class="dash-content">
                <label class="tx-danger">Our Activities</label>
                <?php 
                  $var = "SELECT * FROM activities";
                  $show = mysqli_query($conn, $var);
                  if ($show) {
                    $now = mysqli_num_rows($show);
                  }
                  
                 ?>
                <h2><?php echo $now; ?></h2>
              </div><!-- dash-content -->
            </div><!-- col-3 -->
          </div><!-- row -->
        </div><!-- card -->

      </div><!-- container -->
    </div><!-- slim-mainpanel -->

   

    <?php require 'footer.php'; ?>

    
    <script src="lib/jquery/js/jquery.js"></script>
    <script src="lib/popper.js/js/popper.js"></script>
    <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script src="lib/jquery.cookie/js/jquery.cookie.js"></script>
    <script src="lib/chartist/js/chartist.js"></script>
    <script src="lib/d3/js/d3.js"></script>
    <script src="lib/rickshaw/js/rickshaw.min.js"></script>
    <script src="lib/jquery.sparkline.bower/js/jquery.sparkline.min.js"></script>
    <script src="lib/select2/js/select2.min.js"></script>


    <script src="js/ResizeSensor.js"></script>
    <script src="js/dashboard.js"></script>
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
  </body>
</html>
