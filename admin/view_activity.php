<?php
require 'header.php';

require 'includes/php-image-magician/php_image_magician.php';

$sql = "SELECT * FROM activities";
$query = mysqli_query($conn, $sql);

?>
<div class="slim-mainpanel">
    <div class="container">
        <div class="slim-pageheader">
            <h6 class="slim-pagetitle">View Activities</h6>
        </div><!-- slim-pageheader -->

        <div class="section-wrapper">
            <label class="section-title">ALL ACTIVITIES</label>
            <p class="mg-b-20 mg-sm-b-40">List of activities and their details.</p>

            <div class="table-wrapper" style="margin-left: -30px; width: 106%;">
                <table id="datatable2" class="table display responsive nowrap">
                    <thead>
                    <tr>
                        <th>Activity title</th>
                        <th>Activity time</th>
                        <th>Activity day</th>
                        <th>Activity description</th>
                        <th>Action</th>
                        <th>Action</th>

                    </tr>
                    </thead>

                    <?php
                    if ($query) {
                        while ($row = mysqli_fetch_assoc($query)) {
                            $act_desc = substr($row['act_desc'], 0, 30) . "...";
                            echo "<tbody>
                <tr><td>$row[activity]</td><td>$row[act_time]</td><td>$row[act_day]</td><td>$act_desc</td>
                    <td><a href='activity_update.php?ID=$row[ID]&activity=$row[activity]&act_time=$row[act_time]&act_day=$row[act_day]&act_image=$row[act_image]&act_desc=$row[act_desc]'>Edit</a></td>
                     <td><a href='activity_delete.php?ID=$row[ID]' id='delete'>Delete</a></td>                
                    
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
</body>
</html>
