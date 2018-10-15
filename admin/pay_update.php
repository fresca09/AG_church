<?php
require 'header.php';

?>

<div class="slim-mainpanel">
    <div class="container">
        <div class="slim-pageheader">
            <h6 class="slim-pagetitle">EDIT PAYMENT TYPE</h6>
        </div><!-- slim-pageheader -->

        <div class="section-wrapper">
            <label class="section-title">PAYMENT TYPE INFO</label>



            <div class="section-wrapper">
                <label class="section-title">Only new payment type is required here</label><br>
                <!-- <p class="mg-b-20 mg-sm-b-40">This is a demo of a required field that must not leave empty.</p> -->
                <p id="message" style="font-size: 18px; color: #A9919D; margin-left: -15px;"></p><br>

                <form action="pay_update.php" method="post" id="form1" data-parsley-validate>
                    <div class="wd-300">
                        <div class="d-md-flex mg-b-30">
                            <input type="hidden" id="id" name="id" value="<?= $_GET['ID']; ?>" readonly="readonly">
                            <div class="form-group mg-b-0">
                                <label>ENTER NEW PAYMENT TYPE: <span class="tx-danger">*</span></label>
                                <input type="text" name="pay_type" id="pay_type" class="form-control wd-250" value="<?= $_GET['pay_type']; ?>" require>
                            </div><!-- form-group -->&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="submit" class="btn btn-primary pd-x-30" name="update" id="update" value="Update" style="height: 42px; margin-top: 28px;">


                        </div><!-- d-flex -->
                        <div><h5>Click to view <a href="view_pay.php">Payment type</a></h5>

                        </div>
                    </div>
                </form>

            </div><!-- section-wrapper

          </div><!-- form-layout -->

        </div><!-- section-wrapper -->

        <?php require 'footer.php'; ?>

        <script src="lib/jquery/js/jquery.js"></script>
        <script src="lib/popper.js/js/popper.js"></script>
        <script src="lib/bootstrap/js/bootstrap.js"></script>
        <script src="lib/jquery.cookie/js/jquery.cookie.js"></script>
        <script src="lib/select2/js/select2.min.js"></script>
        <script src="lib/parsleyjs/js/parsley.js"></script>

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

        <script>
            $(document).ready(function () {
              $('#form1').on("submit", function (e) {
                 e.preventDefault();
                 $.ajax({
                     url: "update_pay.php",
                     type: "POST",
                     data: new FormData(this),
                     cache: false,
                     processData: false,
                     contentType: false,
                     success: function (strMessage) {
                        $('#message').text(strMessage)
                     }
                 });
              });
            });
        </script>

        </body>
        </html>
