<?php 
require 'header.php';

require 'includes/php-image-magician/php_image_magician.php';
  

  $msg = "";

if (isset($_POST['submit'])) {
  $err[] = "";
  $err_flag = false;

//  $file = $_FILES['filename']['name'];
//  $pdf = "church_files/" . $file;
//  move_uploaded_file($_FILES['filename']['tmp_name'], $pdf);

  if (empty($_POST['title'])) {
    $err[] = 'Post must have a title';
    $err_flag = true;
  }
  else
  {
    $title =strtoupper(trim($_POST['title']));
  }
  if (empty($_POST['author'])) {
    $err[] = 'Post must have a author';
    $err_flag = true;
  }
  else
  {
    $author = trim($_POST['author']);
  }

    if (empty($_POST['price'])) {
        $err[] = 'Post must have a price';
        $err_flag = true;
    }
    else
    {
        $price = trim($_POST['price']);
    }

  if (empty($_POST['category'])) {
    $err[] = 'Post must have a category';
    $err_flag = true;
  }
  else
  {
    $category = trim($_POST['category']);
  }
  if (empty($_POST['body'])) {
    $err[] = 'Post must have a body';
    $err_flag = true;
  }
  else
  {
    $body = trim($_POST['body']);
  }
  $date = $_POST['date'];

  $pdf_file = checkPdf($_FILES['filename'], "church_files");

  $image_file = checkImage($_FILES['postimg'],200,250,"church-images/");

  // $user_id = intval($_SESSION['user_id']);
  if (preg_match("/[0-9]+\.[a-z]+/i", $image_file)) {
    if (isset($err_flag) && $err_flag === false) {
    

    $sql_stmt = "SELECT * FROM books WHERE book_title = '$title'";
    $mquery = mysqli_query($conn, $sql_stmt);
    if (mysqli_num_rows($mquery) >0) {
        $err = true;
      //$msg = "Not accepted";
    }
    else{
         $sql = "INSERT INTO books (book_title, book_author, book_price, book_image, book_pdf, book_desc, cat_id, bDate) VALUES ('$title', '$author', '$price', '$image_file', '$pdf_file', '$body', '$category', '$date')";
    $query = mysqli_query($conn, $sql);
    if ($query) {
     $success = true;
      //$msg = "Accepted";
    }
    }   
  }
  else{
   $msg = mysqli_error($conn);
  }
}
}
 ?>

    <div class="slim-mainpanel">
      <div class="container">
        <div class="slim-pageheader">
          <h6 class="slim-pagetitle">ADD BOOKS</h6>
        </div><!-- slim-pageheader -->

        <div class="section-wrapper">
          <label class="section-title">BOOK INFO</label><br>
          <p style="font-size: 20px; color: #000;"><?php echo $msg; ?></p><br>
          
          <form method="post" action="add_books.php" enctype="multipart/form-data">
          <div class="form-layout">
            <div class="row mg-b-25">

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Book Title: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="title" required>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Book Author: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="author" required>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Book Category: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" name="category">
                      <option value=""></option>
                    <option>Select Category</option>
                    <?php 
            $sql = "SELECT * FROM Category";
            $query = mysqli_query($conn, $sql);
            if (mysqli_num_rows($query) > 0) {
              while ($row = mysqli_fetch_assoc($query)) {
                $cat_name = $row['category'];
                $cat_id = $row['ID'];
           ?>
          <option value="<?php echo $cat_id; ?>"><?php echo $cat_name; ?></option>
          <?php } } ?>
                  </select>
                </div>
              </div><!-- col-4 -->

                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Book Price: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="price" >
                    </div>
                </div><!-- col-4 -->

              <div class="col-lg-3" style="margin-top: 30px;">
              <div class="custom-file" style="width: 325px;">
                <label class="form-control-label">Book picture: <span class="tx-danger">*</span></label>
                <input type="file" accept="image/*" class="custom-file-input" id="customFile" name="postimg">
                <label class="custom-file-label" for="customFile">Choose picture file</label>
              </div><!-- custom-file -->
            </div><!-- col -->

              
              <div class="col-lg-3" style="margin-top: 30px;margin-left: 86px; ">
              <div class="custom-file" style="width: 325px;">
                <!-- <label class="form-control-label">Book PDF: <span class="tx-danger">*</span></label> -->
                <input type="file" class="custom-file-input" name="filename">
                <label class="custom-file-label" for="customFile">Choose pdf file</label>
              </div>
            </div>
            </div><!-- row -->

            <div class="row mg-b-25">
               <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Book Abstract: <span class="tx-danger">*</span></label>
                  <textarea class="form-control" name="body" style="width: 400px; min-height: 200px; " required></textarea>
                </div>
              </div>          
             <!-- col-8 -->

              <div class="form-group">
                      <input type="hidden" name="date" value="<?php echo time(); ?>">
                 </div>&nbsp;
              
            </div><!-- row -->
             
            <div class="form-layout-footer">
              <input type="submit" class="btn btn-primary bd-1" name="submit" value="Submit" style="width: 260px;">&nbsp;&nbsp;&nbsp;
<!--              <button class="btn btn-secondary bd-1" style="width: 190px;">Cancel</button>-->
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
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

    <!-- Sweet Alert -->
    <script src="js/sweetalert.min.js"></script>

    <?php if (isset($success) && $success === true) { ?>
    <script type="text/javascript">
        swal("Good!!!", "Book successfully inserted...", "success");
    </script>
    <?php } ?>

    <?php if (isset($err) && $err === true) { ?>
    <script type="text/javascript">
        swal("Ooops!!!", "Book already exist... Duplicate book title!!!", "error");
    </script>
    <?php } ?>
    <!-- Sweet Alert ends -->

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
