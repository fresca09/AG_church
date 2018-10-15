<?php 
require 'header.php';

require 'includes/php-image-magician/php_image_magician.php';

$sql = "SELECT events.*, months.month FROM events JOIN months ON events.month_id = months.ID";
$query = mysqli_query($conn, $sql);

 ?>
    <div class="slim-mainpanel">
      <div class="container">
        <div class="slim-pageheader">
          <h6 class="slim-pagetitle">View Upcoming Events</h6>
        </div><!-- slim-pageheader -->

        <div class="section-wrapper">
          <label class="section-title">ALL UPCOMING EVENT</label>
          <p class="mg-b-20 mg-sm-b-40">Searching, ordering and paging goodness will be immediately added to the table, as shown in this example.</p>

          <div class="table-wrapper" style="margin-left: -33px;">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Event title</th>
                  <th class="wd-15p">Event day</th>
                  <th class="wd-20p">Event day(No)</th>
                  <th class="wd-15p">Event time</th>
                  <th class="wd-10p">Event phone no</th>
                  <!-- <th class="wd-10p">Event location</th> -->
                  <!-- <th class="wd-10p">Event image</th> -->
                  <!-- <th class="wd-25p">Event description</th> -->
                  <th class="wd-10p">Event month</th>
                  <th class="wd-25p">Action</th>
                  <th class="wd-25p">Action</th>
                 
                </tr>
              </thead>
              <?php 
        if ($query) {
        while ($row = mysqli_fetch_assoc($query)) {
                             
             echo "<tbody>
                <tr><td>$row[eTitle]</td><td>$row[eDay]</td><td>$row[eDay_no]</td><td>$row[eTime]</td><td>$row[ePhone]</td><td>$row[month]</td>
                    <td><a href='upevent_update.php?ID=$row[ID]&eTitle=$row[eTitle]&eDay=$row[eDay]&eDay_no=$row[eDay_no]&eTime=$row[eTime]&ePhone=$row[ePhone]&month=$row[month]&eLocation=$row[eLocation]&eDesc=$row[eDesc]'>Edit</a></td>
                     <td><a href='upevent_delete.php?ID=$row[ID]' id='delete'>Delete</a></td>                
                    
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
