<?php 
require 'header.php';

$sql = "SELECT email FROM newsletter";
$query = mysqli_query($conn, $sql);
$subs = mysqli_num_rows($query);
 ?>
    <div class="slim-mainpanel">
      <div class="container">
        <div class="slim-pageheader">
          <h6 class="slim-pagetitle">Our subscribers</h6>
        </div><!-- slim-pageheader -->

        <div class="section-wrapper">
          <div style="text-align: center;"><label class="section-title">OUR SUBSCRIBERS</label>
          <p class="mg-b-20 mg-sm-b-40">We have <?php echo $subs; ?> subscriber(s).</p>

          <div id="message" style="color: #000;">
        <?php 
          if (isset($msg)) {
            echo "<p>$msg</p>";
          }
         ?>
      </div>

         </div>
          

          <div class="table-wrapper" style="width: 50%; margin-left: 250px;">
            <table id="datatable2" class="table display responsive nowrap">
              <thead>
                <tr>
<!--                    <th style="text-align: center;">S/N</th>-->
                  <th style="text-align: center;">Email address</th>
                    <th style="text-align: center;">Action</th>
                 
                  
                </tr>
              </thead>

            <tbody>
                 <?php
        $sql_stmt = mysqli_query($conn, "SELECT * FROM newsletter");
        while ($row = mysqli_fetch_array($sql_stmt)) {

        ?>
            <tr>

                <td style="text-align: center;"><?php echo $row[1]; ?></td>
                <td style="text-align: center;">
                    <a href="#" class="danger" onclick="delete_data(<?php echo $row[0]; ?>)" style="height: 30px;padding-top: -20px;">Delete</a>
                </td>

            </tr>
        <?php } ?>
                 </tbody>

            </table>
          </div><!-- table-wrapper -->
          <div style="margin-left: 60px;">
            <form method="post" action="dash.php" id="form1">
       <input type="submit" name="submit" value="Send email" style="padding: 7px;border: none;background-color: #2A2D35;color: #eee;font-size: 15px;font-weight: bold;cursor: pointer;">      
     </form>
<!--              <div id="result" style="font-size: 18px; color: #A9919D; margin-left: -15px;">-->
<!--                  --><?php
//                  if (isset($msgs)) {
//                      echo "<p>$msgs</p>";
//                  }
//                  ?>
<!--              </div><br>-->
    </div>
      
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

    <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $("#form1").on("submit", function(e){
        e.preventDefault();
        $.ajax({
          url: "mailer_ajax.php",
          data: new FormData(this),
          cache: false,
          processData: false,
          contentType: false,
          type: "POST",
          success: function(data){
            // $('#message').text(strMessage)
              alert(data)
          }
        });
      });

    })
  </script>

    <script>
      $(function(){
        'use strict';

        $('#datatable1').DataTable({
          responsive: true,
          language: {
            // searchPlaceholder: 'Search...',
            // sSearch: '',
            // lengthMenu: '_MENU_ items/page',
          }
        });

        $('#datatable2').DataTable({
          bLengthChange: false,
          searching: false,
          responsive: false
        });

        // Select2
        // $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });
    </script>

<script>
    function delete_data(id) {
        var id = id;
        //e.preventDefault();
        $.ajax({
            url: "sub_delete.php",
            type: "post",
            data: {id:id},
            success: function (data) {
                confirm("Are you sure you want to delete?")
            }
        });
    }
</script>


<!--    <script>-->
<!--      $(function(){-->
<!---->
<!--        // showing modal with effect-->
<!--        $('.modal-effect').on('click', function(e){-->
<!--          e.preventDefault();-->
<!--          var effect = $(this).attr('data-effect');-->
<!--          $('#modaldemo8').addClass(effect);-->
<!--        });-->
<!---->
<!--        // hide modal with effect-->
<!--        $('#modaldemo8').on('hidden.bs.modal', function (e) {-->
<!--          $(this).removeClass (function (index, className) {-->
<!--              return (className.match (/(^|\s)effect-\S+/g) || []).join(' ');-->
<!--          });-->
<!--        });-->
<!--      });-->
<!--    </script>-->

    
  </body>
</html>

