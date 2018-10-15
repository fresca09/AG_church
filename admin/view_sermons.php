<?php 
require 'header.php';

require 'includes/php-image-magician/php_image_magician.php';

$sql = "SELECT sermons.*, Category.category FROM sermons JOIN Category ON sermons.cat_id = Category.ID ORDER BY sDate";
$query = mysqli_query($conn, $sql);

 ?>
    <div class="slim-mainpanel">
      <div class="container">
        <div class="slim-pageheader">
          <h6 class="slim-pagetitle">View Sermons</h6>
        </div><!-- slim-pageheader -->

        <div class="section-wrapper">
          <label class="section-title">ALL SERMONS</label>
          <p class="mg-b-20 mg-sm-b-40">List of sermons and their details.</p>

          <div class="table-wrapper" style="margin-left: -30px; width: 106%;">
            <table id="datatable2" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th>Sermon topic</th>
                  <th>Sermon speaker</th>
                  <!-- <th>Sermon image</th> -->  
                  <th>Sermon audio</th>     
                  <th>Sermon category</th>
                   <!-- <th>Sermon abstract</th> -->                  
                  <th>Action</th>
                  <th>Action</th>
                 
                </tr>
              </thead>
                
      <?php 
        if ($query) {
        while ($row = mysqli_fetch_assoc($query)) {
                //$sermon_desc = substr($row['sermon_desc'], 0, 30) . "...";
                 echo "<tbody>
                <tr><td>$row[sermon_topic]</td><td>$row[sermon_speaker]</td><td>$row[sermon_audio]</td><td>$row[category]</td>
                    <td><a href='sermon_update.php?ID=$row[ID]&sermon_topic=$row[sermon_topic]&sermon_speaker=$row[sermon_speaker]&sermon_image=$row[sermon_image]&sermon_audio=$row[sermon_audio]&category=$row[category]&sermon_desc=$row[sermon_desc]'>Edit</a></td>
                     <td><a href='sermon_delete.php?ID=$row[ID]' id='delete'>Delete</a></td>                
                    
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
