<?php 
require 'header.php';

require 'includes/php-image-magician/php_image_magician.php';

$sql = "SELECT m_event.*, months.month FROM m_event JOIN months ON m_event.month_id = months.ID";
$query = mysqli_query($conn, $sql);

 ?>
    <div class="slim-mainpanel">
      <div class="container">
        <div class="slim-pageheader">
          <h6 class="slim-pagetitle">View Monthly Events</h6>
        </div><!-- slim-pageheader -->

        <div class="section-wrapper">
          <label class="section-title">ALL MONTHLY EVENT</label>
          <p class="mg-b-20 mg-sm-b-40">Searching, ordering and paging goodness will be immediately added to the table, as shown in this example.</p>

          <div class="table-wrapper" style="margin-left: -33px;">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th>Event title</th>
                  <th>Event month</th>
                  <th>Event phone no</th>
                  <th>Event time</th>
                  <!-- <th>Event location</th> -->
                  <th>Event image</th>
                   <!-- <th>Event description</th>  -->                 
                  <th>Action</th>
                  <th>Action</th>
                 
                </tr>
              </thead>
              <?php 
        if ($query) {
        while ($row = mysqli_fetch_assoc($query)) {
            
                
                 echo "<tbody>
                <tr><td>$row[event_name]</td><td>$row[month]</td><td>$row[event_num]</td><td>$row[event_time]</td><td>$row[event_image]</td>
                    <td><a href='mevent_update.php?ID=$row[ID]&event_name=$row[event_name]&event_num=$row[event_num]&event_time=$row[event_time]&event_location=$row[event_location]&event_image=$row[event_image]&event_desc=$row[event_desc]&month=$row[month]'>Edit</a></td>
                     <td><a href='mevent_delete.php?ID=$row[ID]' id='delete'>Delete</a></td>                
                    
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
