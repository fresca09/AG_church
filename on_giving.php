<?php 
  require 'header.php';
  

  if (isset($_POST['submit'])) {
    $err[] = "";
  $err_flag = false;
  if (empty($_POST['name'])) {
    $err[] = 'Post must have a name';
    $err_flag = true;
  }
  else
  {
    $name = trim($_POST['name']);
  }
  if (empty($_POST['email'])) {
    $err[] = 'Post must have a email';
    $err_flag = true;
  }
  else
  {
    $email = trim($_POST['email']);
  }

  if (empty($_POST['phone'])) {
    $err[] = 'Post must have a phone';
    $err_flag = true;
  }
  else
  {
    $phone = trim($_POST['phone']);
  }
  if (empty($_POST['gender'])) {
    $err[] = 'Post must have a gender';
    $err_flag = true;
  }
  else
  {
    $gender = trim($_POST['gender']);
  }

  if (empty($_POST['country'])) {
      $err[] = 'Post must have a country';
      $err_flag = true;
  }
  else
  {
      $country = trim($_POST['country']);
  }
  if (empty($_POST['pay'])) {
      $err[] = 'Post must have a pay';
      $err_flag = true;
  }
  else
  {
      $pay = trim($_POST['pay']);
  }

  if (empty($_POST['currency'])) {
      $err[] = 'Post must have a currency';
      $err_flag = true;
  }
  else
  {
      $currency = trim($_POST['currency']);
  }
  if (empty($_POST['amount'])) {
      $err[] = 'Post must have a amount';
      $err_flag = true;
  }
  else
  {
      $amount = trim($_POST['amount']);
  }
  $date = $_POST['date'];

  $sql = "INSERT INTO payment (name, email, phone, gender, country, pay, currency, amount, pDate) VALUES ('$name', '$email', 'phone', '$gender', '$country', '$pay', '$currency', '$amount', '$date')";
  $query = mysqli_query($conn, $sql);
  if ($query) {
//    echo "yes";
      $msg = true;
  }
  else{
      //echo "Something went wrong...";
      $msg = false;
      echo mysqli_error($conn);
    }

  }

 ?>
  <!-- Start Nav Backed Header -->
  <div class="nav-backed-header parallax" style="background-image:url(images/back1.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-md-12">

        </div>
      </div>
    </div>
  </div>
  <!-- End Nav Backed Header --> 
  <!-- Start Page Header -->

  <?php require 'countdown.php'; ?>
  <!-- End Page Header --> 
  <!-- Start Content -->
  <div class="main" role="main">
    <div id="content" class="content full">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <header class="single-post-header clearfix">
              <h2 class="post-title">Online Offering</h2>
            </header>
            <div class="post-content">
              <!-- <div id="gmap">
                <iframe src="https://maps.google.com/?ie=UTF8&amp;ll=40.717989,-74.002705&amp;spn=0.043846,0.077162&amp;t=m&amp;z=14&amp;output=embed"></iframe>
              </div> -->
              <div class="row">

                <form method="post" class="contact-form" action="on_giving.php">
                  <div class="col-md-6 margin-15" style="width: 60%;">
                    <div class="form-group">
                      <input type="text" id="name" name="name"  class="form-control input-lg" placeholder="Full Name*">
                    </div>
                    <div class="form-group">
                      <input type="email" id="email" name="email"  class="form-control input-lg" placeholder="Email*">
                    </div>
                    <div class="form-group">
                      <select id="gender" name="gender"  class="form-control input-lg">
                        <option>Select your sex*</option>
                          <?php
                          $sql = "SELECT * FROM gender";
                          $query = mysqli_query($conn, $sql);
                          if (mysqli_num_rows($query) > 0) {
                              while ($row = mysqli_fetch_assoc($query)) {
                                  $gender = $row['Gender'];
                                  $gender_id = $row['ID'];
                                  ?>
                                  <option value="<?php echo $gender_id; ?>"><?php echo $gender; ?></option>
                              <?php } } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <select id="country" name="country"  class="form-control input-lg">
                        <option>Select Country*</option>
                          <?php
                          $sql = "SELECT * FROM countries";
                          $query = mysqli_query($conn, $sql);
                          if (mysqli_num_rows($query) > 0) {
                              while ($row = mysqli_fetch_assoc($query)) {
                                  $names = $row['name'];
                                  $name_id = $row['id'];
                                  ?>
                                  <option value="<?php echo $name_id; ?>"><?php echo $names; ?></option>
                              <?php } } ?>
                      </select>
                    </div>
                    
                    <div class="form-group">
                      <input type="text" id="phone" name="phone"  class="form-control input-lg" placeholder="Phone Number*">
                    </div>
                    <div class="form-group">
                      <select id="pay" name="pay"  class="form-control input-lg">
                        <option>Select payment type*</option>
                          <?php
                          $sql = "SELECT * FROM payment_type";
                          $query = mysqli_query($conn, $sql);
                          if (mysqli_num_rows($query) > 0) {
                              while ($row = mysqli_fetch_assoc($query)) {
                                  $pay_type = $row['pay_type'];
                                  $pay_id = $row['ID'];
                                  ?>
                                  <option value="<?php echo $pay_id; ?>"><?php echo $pay_type; ?></option>
                              <?php } } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <select id="currency" name="currency"  class="form-control input-lg">
                        <option>Select Currency*</option>
                        <option>NGN (#)</option>
                        <option>USD ($)</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <input type="text" id="amount" name="amount"  class="form-control input-lg" placeholder="Amount*">
                    </div>
                    <div class="form-group">
                      <input type="hidden" name="date" value="<?php echo time(); ?>">
                    </div>
                    <div class="col-md-12">
                    <input id="submit" name="submit" type="submit" class="btn btn-primary btn-lg pull-right" value="Submit now!">
                  </div>
                  </div>
                  
                  
                </form>
                <div class="clearfix"></div>
                <div class="col-md-12">
                  <div id="message"></div>
                </div>
              </div>
            </div>
          </div>
          <!-- Start Sidebar -->
          <div class="col-md-3 sidebar">
            <?php require 'sidebar.php'; ?>
          <!-- End Sidebar -->
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

<!-- Sweet Alert -->
<script src="js/sweetalert.min.js"></script>
<?php if (isset($msg) && $msg === true) { ?>
    <script type="text/javascript">
        swal("Wait shortly!", "For your payment processing", "success");
    </script>
<?php } ?>

<?php if (isset($msg) && $msg === false) { ?>
    <script type="text/javascript">
        swal("Ooops!!!", "Payment not rendered", "error");
    </script>
<?php } ?>

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