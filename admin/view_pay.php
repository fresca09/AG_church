<?php
require 'header.php';

$sql = "SELECT * FROM payment_type";
$query = mysqli_query($conn, $sql);
?>
<div class="slim-mainpanel">
    <div class="container">
        <div class="slim-pageheader">
            <h6 class="slim-pagetitle">View Payment type</h6>
        </div><!-- slim-pageheader -->

        <div class="section-wrapper">
            <div style="text-align: center;"><label class="section-title">ALL PAYMENT TYPE</label>
                <p class="mg-b-20 mg-sm-b-40">This shows the list of payment type.</p>

            </div>


            <div class="table-wrapper" style="width: 70%; margin-left: 150px;">
                <table id="datatable2" class="table display responsive nowrap">
                    <thead>
                    <tr>
                        <th>Payment type</th>
                        <th>Action</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <?php
                    if ($query) {
                        while ($row = mysqli_fetch_assoc($query)) {

                            echo "<tbody>
                <tr><td> $row[pay_type]</td>
                    <td><a href='pay_update.php?ID=$row[ID]&pay_type=$row[pay_type]'>Edit</a></td>
                     <td><a href='pay_delete.php?ID=$row[ID]' id='delete'>Delete</a></td>                
                    
                </tr>

                 </tbody>";
                        }
                    }
                    ?>
                </table>
            </div><!-- table-wrapper -->
        </div><!-- section-wrapper -->

    </div><!-- container -->
</div><!-- slim-mainpanel -->



<!-- SMALL MODAL -->
<div id="modaldemo2" class="modal fade">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content bd-0 tx-14" style="width: 120%;">
            <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Notice</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pd-20">
                <p class="mg-b-5" style="text-align: center;">Are you sure want to delete the department from Database?</p>
            </div>
            <div class="modal-footer justify-content-center">
                <form method="post" action="view_department.php">
                    <input type="text" name="id" class="form-control" value="<?= $_GET['ID']; ?>">

                    <input type="submit" name="delete" id="delete" class="btn btn-primary" value="Delete">

                    <input type="submit" class="btn btn-secondary" data-dismiss="modal" value="Cancel">
                </form>

            </div>
        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->
<!-- <div class="modal-footer-demo">
  <a href="" class="btn btn-primary" data-toggle="modal" data-target="#modaldemo2">View Live Demo</a>
</div> --><!-- pd-y-30 -->




<?php require 'footer.php'; ?>

<script src="lib/jquery/js/jquery.js"></script>
<script src="lib/popper.js/js/popper.js"></script>
<script src="lib/bootstrap/js/bootstrap.js"></script>
<script src="lib/jquery.cookie/js/jquery.cookie.js"></script>
<script src="lib/datatables/js/jquery.dataTables.js"></script>
<script src="lib/datatables-responsive/js/dataTables.responsive.js"></script>
<script src="lib/select2/js/select2.min.js"></script>

<script src="js/slim.js"></script>
<script>
    $(function(){
        'use strict';

        $('#datatable1').DataTable({
            responsive: true,
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_ items/page',
            }
        });

        $('#datatable2').DataTable({
            bLengthChange: false,
            searching: false,
            responsive: true
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

    });
</script>

<script type="text/javascript">
    $(".show-modal").on("click", function(e){
        e.preventDefault();

        $("#modaldemo").css("display", "block");

        var purpose = $(this).find(".purpose");
        purpose = purpose.val();
        if (purpose === "update") {

            $(".update_in").css("display", "block");
        }

    })
</script>

<script>
    $(function(){

        // showing modal with effect
        $('.modal-effect').on('click', function(e){
            e.preventDefault();
            var effect = $(this).attr('data-effect');
            $('#modaldemo8').addClass(effect);
        });

        // hide modal with effect
        $('#modaldemo8').on('hidden.bs.modal', function (e) {
            $(this).removeClass (function (index, className) {
                return (className.match (/(^|\s)effect-\S+/g) || []).join(' ');
            });
        });
    });
</script>


</body>
</html>
