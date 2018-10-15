<?php 
require 'header.php';
 ?>

 <div class="slim-mainpanel">
      <div class="container">
        <div class="slim-pageheader">
          <ol class="breadcrumb slim-breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Forms</a></li>
            <li class="breadcrumb-item active" aria-current="page">Datepicker</li>
          </ol>
          <h6 class="slim-pagetitle">Datepicker</h6>
        </div><!-- slim-pageheader -->

        <div class="section-wrapper">
          <label class="section-title">Default Functionality</label>
          <p class="mg-b-20 mg-sm-b-40">The datepicker is tied to a standard form input field. Click on the input to open an interactive calendar in a small overlay. If a date is chosen, feedback is shown as the input's value.</p>

          <div class="wd-200 mg-b-30">
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="icon ion-calendar tx-16 lh-0 op-6"></i>
                </div>
              </div>
              <input type="text" class="form-control fc-datepicker" placeholder="MM/DD/YYYY">
            </div>
          </div><!-- wd-200 -->
        </div><!-- section-wrapper -->

        <div class="section-wrapper mg-t-20">
          <label class="section-title">Multiple Months</label>
          <p class="mg-b-20 mg-sm-b-40">Set the numberOfMonths option to an integer of 2 or more to show multiple months in a single datepicker.</p>

          <div class="wd-200 mg-b-30">
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="icon ion-calendar tx-16 lh-0 op-6"></i>
                </div>
              </div>
              <input id="datepickerNoOfMonths" type="text" class="form-control" placeholder="MM/DD/YYYY">
            </div>
          </div><!-- wd-200 -->
        </div><!-- section-wrapper -->

        <div class="section-wrapper mg-t-20">
          <label class="section-title">Inline Datepicker</label>
          <p class="mg-b-20 mg-sm-b-40">Display the datepicker embedded in the page instead of in an overlay.</p>

          <div class="fc-datepicker"></div>
        </div><!-- section-wrapper -->

        <div class="section-wrapper mg-t-20">
          <label class="section-title">Colored Variant Datepicker</label>
          <p class="mg-b-20 mg-sm-b-40">Below are some available colored datepicker/calendar.</p>

          <div class="row no-gutters ht-md-350">
            <div class="col-md-6 bg-gray-200 d-flex align-items-center justify-content-center">
              <div class="fc-datepicker fc-datepicker-color fc-datepicker-primary mg-y-20"></div>
            </div><!-- col-6 -->
            <div class="col-md-6 bg-gray-800 d-flex align-items-center justify-content-center">
              <div class="fc-datepicker fc-datepicker-color fc-datepicker-danger mg-y-20"></div>
            </div><!-- col-6 -->
          </div><!-- row -->

          <div class="row no-gutters ht-350 mg-t-20 mg-md-t-0">
            <div class="col-md-6 bg-gray-800 d-flex align-items-center justify-content-center">
              <div class="fc-datepicker fc-datepicker-color fc-datepicker-warning mg-y-20"></div>
            </div><!-- col-6 -->
            <div class="col-md-6 bg-gray-200 d-flex align-items-center justify-content-center">
              <div class="fc-datepicker fc-datepicker-color fc-datepicker-info mg-y-20"></div>
            </div><!-- col-6 -->
          </div><!-- row -->

          <p class="section-label mg-t-40">Class Reference</p>
          <table class="table table-reference">
            <thead>
              <tr>
                <th class="wd-40p">Class</th>
                <th class="wd-60p">Value</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><code class="pd-0 bg-transparent">class="fc-datepicker fc-datepicker-color fc-datepicker-[value]"</code></td>
                <td>primary | success | warning | danger | info | teal | indigo | purple | pink | orange | dark</td>
              </tr>
            </tbody>
          </table>
        </div><!-- section-wrapper -->


      </div><!-- container -->
    </div><!-- slim-mainpanel -->

    <div class="slim-footer">
      <div class="container">
        <p>Copyright 2018 &copy; All Rights Reserved. Slim Dashboard Template</p>
        <p>Designed by: <a href="">ThemePixels</a></p>
      </div><!-- container -->
    </div><!-- slim-footer -->

    <script src="lib/jquery/js/jquery.js"></script>
    <script src="lib/popper.js/js/popper.js"></script>
    <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script src="lib/jquery.cookie/js/jquery.cookie.js"></script>
    <script src="lib/moment/js/moment.js"></script>
    <script src="lib/jquery-ui/js/jquery-ui.js"></script>


    <script src="js/slim.js"></script>
    <script>
      $(function(){
        'use strict'

        // Datepicker
        $('.fc-datepicker').datepicker({
          showOtherMonths: true,
          selectOtherMonths: true
        });

        $('#datepickerNoOfMonths').datepicker({
          showOtherMonths: true,
          selectOtherMonths: true,
          numberOfMonths: 2
        });

      });
    </script>
  </body>
</html>