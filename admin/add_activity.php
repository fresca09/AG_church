<?php
require 'header.php';

require 'includes/php-image-magician/php_image_magician.php';

$msg = "";

if (isset($_POST['submit']) && $_POST['submit'] == "Submit") {
    $err[] = "";
    $err_flag = false;

    if (empty($_POST['activity'])) {
        $err[] = 'Post must have a activity';
        $err_flag = true;
    }
    else
    {
        $activity = trim($_POST['activity']);
    }
    if (empty($_POST['act_time'])) {
        $err[] = 'Post must have a activity time';
        $err_flag = true;
    }
    else
    {
        $act_time = trim($_POST['act_time']);
    }

    if (empty($_POST['act_day'])) {
        $err[] = 'Post must have a activity day';
        $err_flag = true;
    }
    else
    {
        $act_day = trim($_POST['act_day']);
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

    $image_file = checkImage($_FILES['postimg'],300,200,"church-images/");

    if (isset($err_flag) && $err_flag === false) {

        $sql_stmt = "SELECT * FROM activities WHERE activity = '$activity'";
        $result = mysqli_query($conn, $sql_stmt);
        if (mysqli_num_rows($result) > 0) {
            $err = true;
        }
        else{
            $sql = "INSERT INTO activities (activity, act_time, act_day, act_image, act_desc, act_date) VALUES ('$activity', '$act_time', '$act_day', '$image_file', '$body', '$date')";
            $query = mysqli_query($conn, $sql);
            if ($query) {
                $success = true;
            }
        }
    }
}
?>

<div class="slim-mainpanel">
    <div class="container">
        <div class="slim-pageheader">
            <h6 class="slim-pagetitle">ADD ACTIVITIES</h6>
        </div><!-- slim-pageheader -->

        <div class="section-wrapper">
            <label class="section-title">ACTIVITIES INFO</label><br>
            <p style="font-size: 20px; color: #000;"><?php echo $msg; ?></p><br>

            <form method="post" action="add_activity.php" enctype="multipart/form-data">
                <div class="form-layout">
                    <div class="row mg-b-25">

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Activity Title: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="activity" required>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Activity Time: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="act_time" required>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Activity Day: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="act_day" required>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-3" style="margin-top: 30px;">
                            <div class="custom-file" style="width: 325px;">
                                <label class="form-control-label">Activity picture: <span class="tx-danger">*</span></label>
                                <input type="file" accept="image/*" class="custom-file-input" id="customFile" name="postimg">
                                <label class="custom-file-label" for="customFile">Choose Sermon Picture</label>
                            </div><!-- custom-file -->
                        </div><!-- col -->

                    </div><!-- row -->

                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Activity Description: <span class="tx-danger">*</span></label>
                                <textarea class="form-control" name="body" style="width: 400px; min-height: 200px;"></textarea>
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
                swal("Good!!!", "Activity successfully inserted...", "success");
            </script>
        <?php } ?>

        <?php if (isset($err) && $err === true) { ?>
            <script type="text/javascript">
                swal("Ooops!!!", "Activity already exist!!!", "error");
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
