

<!--Start site footer -->
    <footer class="site-footer">
       	<div class="container">
    		<div class="site-footer-top">
            	<div class="row">     	
                        <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 widget footer_widget twitter_widget">
                            <h4><i class="fa fa-microphone"></i> Comforter's Voice on Radio</h4>
                            <p>On Urban Radio 94.5, Enugu<br>Saturdays, 8am</p>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 widget footer_widget twitter_widget">
                            <h4><i class="fa fa-map-marker"></i> Our Location</h4>
                            <p>15-17 Ranger Avenue, Zodaic Hotel.<br>Enugu.</p>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 widget footer_widget twitter_widget">
                            <h4><i class="fa fa-envelope"></i> Contact Info</h4>
                            <p>11 - 00 - 653240<br>info@comfortersvoice.com</p>                       
                        </div>                
                	<div class=" col-lg-3 col-md-4 col-sm-12 col-xs-12 widget footer_widget newsletter_widget">
                        <h4>News subscription</h4>
                        <!-- <hr class="sm"> -->
                        <p>Subscribe to our newsletter in order to receive the latest news &amp; articles.</p>
                       <?php 
    //require_once 'includes/config.php';
    if (isset($_POST['submit_ad'])) {
    $error = "";
    $err_flag = false;
    if (empty($_POST['email_ad'])) {
        $error = 'Please enter your email address';
        $err_flag = true;
    }
    else
    {
        $email_ad = sanitize(trim($_POST['email_ad']));
    }

        $check = "SELECT * FROM newsletter WHERE email = '$email_ad'";
        $result = mysqli_query($conn, $check);
        if (mysqli_num_rows($result) > 0) {           
            $err = true;
        }
        else{
           $sql = "INSERT INTO newsletter (email) VALUES ('$email_ad')";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            $success = true;
        }
        else{
            $success = false;
        } 
        }

        
    } 
 ?>
 

     
                            <form method="post">
                                
                                 <div class="input-group" style="margin-bottom: 10px;">
                               <span class="input-group-addon">@</span>
                            <input type="email" name="email_ad" class="form-control" required>
                            <span class="input-group-btn">
                            <input class="btn btn-primary" type="submit" name="submit_ad" value="Submit" style="width: 100%; margin-left: -1px; height: 34px;">
                            </span>
                            </div> 
                           <?php 
                                if (isset($err_flag) && $err_flag === true){                                    
                                   echo "<p>$error</p>";
                                    } 
                                    
                                 ?>
                                 
                            </form>
                            
                        
            		</div>
               	</div>
                <footer class="site-footer-bottom" style="margin-bottom: -30px;">
    <div class="container">
      <div class="row">
        <div class="copyrights-col-left col-md-6 col-sm-6">
          <p style="font-size: 13px;">&copy; 2018 AG Worship Center. All Rights Reserved</p>
        </div>
        <div class="copyrights-col-right col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right"><span style="font-size: 15px;">Powered by</span>
          
          <a href="" style="text-decoration: none; font-size: 15px; font-weight: bold; ">SEANTECH</a>
        </div>
      </div>
    </div>
  </footer> 
           	</div>
        </div>
    </footer>
<script src="js/sweetalert.min.js"></script><!-- Sweet Alert -->
    <?php if (isset($success) && $success === true) { ?>
    <script type="text/javascript">
        swal("Good job!", "You've successfully subscribe to our Newsletter", "success");
    </script>
    <?php } ?>

    <?php if (isset($err) && $err === true) { ?>
    <script type="text/javascript">
        swal("Ooops!!!", "This email have already subscribe", "error");
    </script>
    <?php } ?>
    <!-- End site footer
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

         <a id="back-to-top"><i class="fa fa-angle-double-up"></i></a> </div>
<script src="js/jquery-2.0.0.min.js"></script> <!-- Jquery Library Call --> 

