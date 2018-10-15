

<div class="pd-x-10 tx-center bg-magenta">
            <a href="" class="btn btn-primary pd-x-20" data-toggle="modal" data-target="#modaldemo">Sign Up</a>
          </div>

          <div id="modaldemo" class="modal fade">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bd-0 bg-transparent rounded overflow-hidden">
          <div class="modal-body pd-0">
            <div class="row no-gutters">
              <div class="col-lg-6 bg-primary">
                <div class="pd-40">
                  <h1 class="tx-white mg-b-20">slim</h1>
                  <p class="tx-white op-7 mg-b-30">We work with clients big and small across a range of sectors and we utilise all forms of media to get your name out there in a way that’s right for you. We believe that analysis of your company and your customers is key in responding effectively to your promotional needs and we will work with you to fully understand your business to achieve the greatest amount of publicity possible so that you can see a return from the advertising.</p>
                  
                </div>
              </div><!-- col-6 -->
              <div class="col-lg-6 bg-white">
                <div class="pd-y-30 pd-xl-x-30">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <?php 
 if (isset($_POST['submit'])) {
    $err_flag = false;
    if (empty($_POST['name'])) {
      $err_flag = true;
      $err_msg = 'Name filed cannot be empty';
    }
    else
    {
      $name = trim($_POST['name']);
    }

    if (empty($_POST['email'])) {
      $err_flag = true;
      $err_msg = 'Email filed cannot be empty';
    }
    else
    {
      $email = trim($_POST['email']);
    }

    if (empty($_POST['phone'])) {
      $err_flag = true;
      $err_msg = 'Phone filed cannot be empty';
    }
    else
    {
      $phone = trim($_POST['phone']);
    }

    if (empty($_POST['gender'])) {
      $err_flag = true;
      $err_msg = 'Gender filed cannot be empty';
    }
    else
    {
      $gender = trim($_POST['gender']);
    }

    
    if (empty($_POST['password1'])) {
      $err_flag = true;
      $err_msg = 'Password filed cannot be empty';
    }
    else
    {
      $password1 = trim($_POST['password1']);
    }

    if (empty($_POST['password2'])) {
      $err_flag = true;
      $err_msg = 'Confirm password filed cannot be empty';
    }
    else
    {
      $password2 = trim($_POST['password2']);
    }

    if ($password1 == $password2) {
      $password = $password1;
    }

    else
    {
      $err_flag = true;
      $err_msg = 'Password does not match';
      
    }

    echo $image_file = checkImage($_FILES['postimg'],100,100,"post-images/");

    if (isset($name) && $err_flag == false) {
      $sql = "SELECT * FROM Admin WHERE Email = '$email'";
      $query = mysqli_query($conn, $sql);
      if (mysqli_num_rows($query) > 0) {
        //echo "<script>alert('');</script>";
        $msg = "The email already exist!!!";
      }
      else
      {
        $sql_stm = "INSERT INTO admin (Name, Email, Gender, Phone, Password, image) VALUES ('$name', '$email', '$gender', '$phone', '$password', '$image_file')";
        $query = mysqli_query($conn, $sql_stm);
        if (mysqli_num_rows($query) > 0) {
          while ($row = mysqli_fetch_assoc($query)) {
            $_SESSION['auth'] = true;
            $_SESSION['Admin_name'] = $row['Name'];
            $_SESSION['Admin_email;'] = $row['Email'];
            $_SESSION['Admin_phone'] = $row['Phone'];
            $_SESSION['Admin_image'] = $row['image'];
          }
          if ($_SESSION['auth'] === true) {
            $msg = 'Registration was successful...';
          }
          else
        {
          
          $msg = 'Something went wrong';
          echo mysqli_error($conn);

        }
          
        }
        
      }

    }
  }

 ?>
                  <form method="post" action="header.php">
                  <div class="pd-x-30 pd-y-10">
                    <h3 class="tx-gray-800 tx-normal mg-b-5">Welcome admin!</h3>
                    <p>Sign up to create new account for admin</p>
                    <br>
                    <div class="form-group">
                      <input type="text" name="username" class="form-control" placeholder="Enter username">
                    </div><!-- form-group -->

                    <div class="form-group">
                      <input type="email" name="email" class="form-control" placeholder="Enter email">
                    </div>

                    <div class="form-group mg-b-20">
                      <input type="password" name="password1" class="form-control" placeholder="Enter password">  
                    </div><!-- form-group -->

                    <div class="form-group mg-b-20">
                      <input type="password" name="password2" class="form-control" placeholder="Confirm password">  
                    </div><!-- form-group -->

                    <div class="form-group">
                      <input type="tel" name="phone" class="form-control" placeholder="Enter phone number">
                    </div>

              <div style="margin-bottom: 15px;">
                <select name="gender" class="form-control select2" data-parsley-class-handler="#slWrapper" data-parsley-errors-container="#slErrorContainer" required>
                  <option>--Gender--</option>
                         <option>Male</option>
                         <option>Female</option>
                </select>
              </div>

               
              <div class="custom-file">
                <label class="form-control-label">Event picture: <span class="tx-danger">*</span></label>
                <input type="file" class="custom-file-input" id="customFile" name="postimg">
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div><!-- custom-file -->
         

                    <input type="submit" name="submit" value="Sign Up" class="btn btn-primary btn-block">

                  </div>
                  </form>
                </div><!-- pd-20 -->
              </div><!-- col-6 -->
            </div><!-- row -->
          </div><!-- modal-body -->
        </div><!-- modal-content -->
      </div><!-- modal-dialog -->
    </div><!-- modal -->