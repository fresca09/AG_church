<?php
require 'header.php';

$msg = "";

if (isset($_GET['submit'])) {
    $pay_type = trim($_GET['pay_type']);

    $sql_stmt = "SELECT * FROM payment_type WHERE pay_type = '$pay_type'";
    $mquery = mysqli_query($conn, $sql_stmt);
    if (mysqli_num_rows($mquery) == 1) {
        $err = true;
    }
    else{
        $sql = "INSERT INTO payment_type (pay_type) VALUES ('$pay_type')";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            $success = true;
        }
    }
}

?>

<div class="slim-mainpanel">
    <div class="container">
        <div class="slim-pageheader">
            <h6 class="slim-pagetitle">ADD PAYMENT TYPE</h6>
        </div><!-- slim-pageheader -->

        <div class="section-wrapper">
            <label class="section-title">PAYMENT TYPE INFO</label>

            <div class="section-wrapper">
                <label class="section-title">Only payment type is required here</label>
                <!-- <p class="mg-b-20 mg-sm-b-40">This is a demo of a required field that must not leave empty.</p> -->
                <p style="font-size: 20px; color: #000;"><?php echo $msg; ?></p><br><br><br>

                <form action="add_pay.php" method="get" data-parsley-validate>
                    <div class="wd-300">
                        <div class="d-md-flex mg-b-30">
                            <div class="form-group mg-b-0">
                                <label>ENTER PAYMENT TYPE: <span class="tx-danger">*</span></label>
                                <input type="text" name="pay_type" class="form-control wd-250" required>
                            </div><!-- form-group -->&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="submit" class="btn btn-primary pd-x-30" name="submit" value="Submit" style="height: 42px; margin-top: 28px;">
                        </div><!-- d-flex -->

                    </div>
                </form>

            </div>

        </div>

        <?php require 'footer.php'; ?>

        <script src="lib/jquery/js/jquery.js"></script>
        <script src="lib/popper.js/js/popper.js"></script>
        <script src="lib/bootstrap/js/bootstrap.js"></script>
        <script src="lib/jquery.cookie/js/jquery.cookie.js"></script>
        <script src="lib/select2/js/select2.min.js"></script>
        <script src="lib/parsleyjs/js/parsley.js"></script>

        <script src="js/slim.js"></script>

        <script src="js/sweetalert.min.js"></script><!-- Sweet Alert -->

        <?php if (isset($success) && $success === true) { ?>
            <script type="text/javascript">
                swal("Good!!!", "Payment type inserted...", "success");
            </script>
        <?php } ?>

        <?php if (isset($err) && $err === true) { ?>
            <script type="text/javascript">
                swal("Ooops!!!", "Payment type already exist!!!", "error");
            </script>
        <?php } ?>

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
        <script>
            $(function(){
                'use strict';

                $('.select2').select2({
                    minimumResultsForSearch: Infinity
                });

                $('#selectForm').parsley();
                $('#selectForm2').parsley();
            });
        </script>
        </body>
        </html>
        */
