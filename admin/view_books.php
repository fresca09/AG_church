<?php 
require 'header.php';

require 'includes/php-image-magician/php_image_magician.php';

$sql = "SELECT books.*, Category.category FROM books JOIN Category ON books.cat_id = Category.ID ORDER BY bDate";
$query = mysqli_query($conn, $sql);

 ?>
    <div class="slim-mainpanel">
      <div class="container">
        <div class="slim-pageheader">
          <h6 class="slim-pagetitle">View Books</h6>
        </div><!-- slim-pageheader -->
        
        <div class="section-wrapper">
          <label class="section-title">ALL BOOKS</label>
          <p class="mg-b-20 mg-sm-b-40">List of books and their details.</p>

          <div class="table-wrapper" style="margin-left: -30px; width: 106%;">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th>Book title</th>
                  <th>Book author</th>
                  <th>Book pdf</th>
                    <th>Book price</th>
                  <th>Book category</th>
<!--                   <th>Book abstract</th>                  -->
                  <th>Action</th>
                  <th>Action</th>
                 
                </tr>
              </thead>
              <?php 
        if ($query) {
        while ($row = mysqli_fetch_assoc($query)) {
                $book_desc = substr($row['book_desc'], 0, 30) . "...";
                 echo "<tbody>
                <tr><td>$row[book_title]</td><td>$row[book_author]</td><td>$row[book_pdf]</td><td>$row[book_price]</td><td>$row[category]</td>
                    <td><a href='book_update.php?ID=$row[ID]&book_title=$row[book_title]&book_author=$row[book_author]&book_price=$row[book_price]&book_image=$row[book_image]&book_thumb=$row[book_pdf]&category=$row[category]&book_desc=$row[book_desc]'>Edit</a></td>
                     <td><a href='book_delete.php?ID=$row[ID]' id='delete'>Delete</a></td>                
                    
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
