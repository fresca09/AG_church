<?php
require 'header.php';

require 'includes/php-image-magician/php_image_magician.php';

$msg = "";

if (isset($_POST['submit']) && $_POST['submit'] == "Submit") {
    $err[] = "";
    $err_flag = false;


    if (empty($_POST['ministry'])) {
        $err[] = 'Post must have a day';
        $err_flag = true;
    }
    else
    {
        $ministry = trim($_POST['ministry']);
    }

    if (empty($_POST['body'])) {
        $err[] = 'Post must have a body';
        $err_flag = true;
    }
    else
    {
        $body = trim($_POST['body']);
    }

    if (isset($err_flag) && $err_flag === false) {

        $sql_stmt = "SELECT * FROM ministry_details WHERE special_id = '$ministry'";
        $mquery = mysqli_query($conn, $sql_stmt);
        if (mysqli_num_rows($mquery) >0) {
            $err = true;
        }
        else{
            $sql = "INSERT INTO ministry_details (body, special_id) VALUES ('$body', '$ministry')";
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
            <h6 class="slim-pagetitle">ADD MINISTRY DETAILS</h6>
        </div><!-- slim-pageheader -->

        <div class="section-wrapper">
            <label class="section-title">MINISTRY DETAILS</label><br>
            <p style="font-size: 20px; color: #000;"><?php echo $msg; ?></p><br>

            <form method="post" action="add_ministry.php" enctype="multipart/form-data">
                <div class="form-layout">
                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Ministry Category: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" name="ministry">
                                    <option value=""></option>
                                    <option>Select Ministry</option>
                                    <?php
                                    $sql = "SELECT * FROM special";
                                    $query = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($query) > 0) {
                                        while ($row = mysqli_fetch_assoc($query)) {
                                            $special_name = $row['Area'];
                                            $special_id = $row['ID'];
                                            ?>
                                            <option value="<?php echo $special_id; ?>"><?php echo $special_name; ?></option>
                                        <?php } } ?>
                                </select>
                            </div>
                        </div><!-- col-4 -->

                    </div><!-- row -->

                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Ministry Description: <span class="tx-danger">*</span></label>
                                <textarea class="form-control" name="body" style="width: 400px; min-height: 200px; "></textarea>
                            </div>
                        </div>
                        <!-- col-8 -->

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
                swal("Good!!!", "Ministry details successfully inserted...", "success");
            </script>
        <?php } ?>

        <?php if (isset($err) && $err === true) { ?>
            <script type="text/javascript">
                swal("Ooops!!!", "Ministry details already filled... Duplicate ministry!!!", "error");
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
