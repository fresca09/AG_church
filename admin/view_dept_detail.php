<?php 
require 'header.php';

require 'includes/php-image-magician/php_image_magician.php';

$sql = "SELECT department_details.*, department.Department FROM department_details JOIN department ON department_details.dept_id = department.ID";
$query = mysqli_query($conn, $sql);

 ?>
    <div class="slim-mainpanel">
      <div class="container">
        <div class="slim-pageheader">
          <h6 class="slim-pagetitle">View Departmental Details</h6>
        </div><!-- slim-pageheader -->

        <div class="section-wrapper">
          <label class="section-title">DEPARTMENTAL DETAILS</label>
          <p class="mg-b-20 mg-sm-b-40">Searching, ordering and paging goodness will be immediately added to the table, as shown in this example.</p>

          <div class="table-wrapper" style="margin-left: -33px;">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th>Departmental day</th>
                  <th>Departmental time</th>
                  <th>Departmental address</th>
                  <th>Departmental phone</th>
                  <!-- <th>Departmental Description</th> -->
                  <th>Department</th>
                  <th>Action</th>
                  <th>Action</th>
                 
                </tr>
              </thead>
              <?php 
        if ($query) {
        while ($row = mysqli_fetch_assoc($query)) {
                             
             echo "<tbody>
                <tr><td>$row[day]</td><td>$row[d_time]</td><td>$row[address]</td><td>$row[phone]</td><td>$row[Department]</td>
                    <td><a href='dept_detail_update.php?ID=$row[ID]&day=$row[day]&d_time=$row[d_time]&address=$row[address]&phone=$row[phone]&body=$row[body]&Department=$row[Department]'>Edit</a></td>
                     <td><a href='upevent_delete.php?id=$row[ID]' id='delete'>Delete</a></td>                
                    
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
