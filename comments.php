<?php
/**
 * Created by PhpStorm.
 * User: Fresca
 * Date: 24/09/2018
 * Time: 10:45 PM
 */

<div class="modal fade" id="popUpWindow">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- header begins here -->
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title" style="text-align: center;"> Contact us here</h2>
              </div>

              <!-- body begins here -->
              <div class="modal-body">
                <?php
                    $msg = "";
  if (isset($_POST['submit'])) {
    $name = sanitize(trim($_POST['name']));
    $emails = sanitize(trim($_POST['emails']));
    $phone = sanitize(trim($_POST['phone']));
    $comment = sanitize(trim($_POST['comment']));
    $date = sanitize(trim($_POST['date']));

    // $sql_stmt = "SELECT * FROM comments WHERE email = '$emails'";
    // $stmt_query = mysqli_query($conn, $sql_stmt);
    // if (mysqli_num_rows($stmt_query) > 0){
    //     //$msg = "Message not sent, duplicate email address or phone number";
    //     $msg1 = false;
    // }
    // else{
        $c_sql = "INSERT INTO comments (name, email, phone, comment, cDate) VALUES ('$name', '$emails', '$phone', '$comment', '$date')";
        $c_query = mysqli_query($conn, $c_sql);
        if ($c_query) {
            //$msg = "Your message has been sent. Thank you!!!";
            $msg1 = true;
            $msg = $emails;
        }



   else{
     //$msg = "Message not sent";
      $msg1 = false;
       $msg = $emails;
     //echo mysqli_error($conn);
   }
  }
                 ?>
                <form role="form" method="post">
                  <div class="form-group">
                     <span class="input-group-addonn"><i class="glyphicon glyphicon-user"></i></span>
                     <input type="text" class="form-control" name="name" require placeholder="Enter fullname" required>

                  </div>

                  <div class="form-group">
                     <span class="input-group-addonn"><i class="glyphicon glyphicon-lock"></i></span>
                    <input type="email" class="form-control" name="emails" require placeholder="Enter email address" required>

                  </div>
                  <div class="form-group">
                     <span class="input-group-addonn"><i class="glyphicon glyphicon-lock"></i></span>
                    <input type="text" class="form-control" name="phone" require placeholder="Enter phone number" required>
                  </div>
                    <div class="form-group">
                      <textarea cols="6" rows="7" id="comments" name="comment" class="form-control input-lg" placeholder="Enter your message" required style="font-size: 15px;"></textarea>
                    </div>
                    <div class="form-group">
                      <input type="hidden" name="date" value="<?php echo time(); ?>">
                 </div>&nbsp;
                <div class="modal-footer">
                        <input type="submit" name="submit" value="Submit" class="col-lg-12 col-sm-12 col-xs-12 col-md-12 btn btn-success">

                    </div>
                </form>
            </div>
          </div>
        </div>
        </div>
?>