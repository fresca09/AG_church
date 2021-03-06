<?php 
  require 'header.php';
  require 'includes/php-image-magician/php_image_magician.php';

  if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 4;
        $offset = ($pageno-1) * $no_of_records_per_page;


        $total_pages_sql = "SELECT COUNT(*) FROM books";
        $result = mysqli_query($conn,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);

    $sql = "SELECT *,books.ID FROM books INNER JOIN Category ON books.cat_id = Category.ID ORDER BY books.bDate DESC LIMIT $offset, $no_of_records_per_page";
  $query = mysqli_query($conn, $sql);
  if ($query) {
    // echo"Yes";
  }
?>

  <!-- End Site Header --> 
  <!-- Start Nav Backed Header -->
  <div class="nav-backed-header parallax" style="background-image:url(images/main2.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
<!--          <ol class="breadcrumb">-->
<!--            <li><a href="index.php">Home</a></li>-->
<!--            <li class="active">Books</li>-->
<!--          </ol>-->
        </div>
      </div>
    </div>
  </div>
  <!-- End Nav Backed Header --> 
  <!-- Start Page Header -->
  <!-- <div class="page-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>Books</h1>
        </div>
      </div>
    </div>
  </div> -->
  <?php require 'countdown.php'; ?>
  <!-- End Page Header --> 
  <!-- Start Content -->
  <div class="main" role="main">
    <div id="content" class="content full">
      <div class="container">
        <div class="row">
          <div class="col-md-8 sermon-archive"> 
            <!-- Books Listing -->
            <?php 
    if ($query) {
      while ($row = mysqli_fetch_assoc($query)) {
        $id = urlencode($row['ID']);
        $title = strtoupper($row['book_title']);
        $author = $row['book_author'];
        $book_desc = substr($row['book_desc'], 0, 100) . "...";
        $book_img = $row['book_image'];
        $category = $row['category'];
        $b_date = date('F j, Y', $row['bDate']);

     ?>
            <article class="post sermon" style="height: 230px;">
                      
              <header class="post-title">

                <div class="row">
           
                  <div class="col-md-9 col-sm-9">

                    <h3 style='color: #EECE5F; font-size: 16px; font-weight: bold;margin-top: -20px;'><?php $id = base64_encode($id); echo "<a href='single_book.php?ID=$id'>" . $title . '</a>'; ?></h3>
                    <strong><span class="meta-data" style="font-size: 14px;"><i class="fa fa-book"></i>Author: <?php echo "<a href='#' style='text-transform:capitalize;'>" . $author . '</a>' . ' | Category: ' . $category; ?></span></strong> </div>

                </div>
              </header>
              <div class="post-content">
                 <?php
                  if(preg_match("/^church-images\/thumbnails\//i", $book_img)){
                    $book_img= preg_replace("/^church-images\/thumbnails\//i", "", $book_img);
                  } ?>
                <div class="row">
                  <div class="col-md-3">
                    <img src="<?php echo './admin/'.$book_img; ?>">
                   </div>
                  <div class="col-md-8">
                    <div style="width: 90%; text-align: justify;"><p><?php echo $book_desc; ?></p></div>
                    
                    <p><?php
                      
                       echo "<a href='single_book.php?ID=$id' class='btn btn-primary'>" . 'Download <i class="fa fa-download"></i>' . '</a>'; ?></p>

                  </div>
                </div>
                
              </div>
             
             </article>
            <?php }
                   } ?>
            <ul class="pagination">
              <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>"><a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>"><i class="fa fa-chevron-left"></i></a></li>
              
              <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>"><a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>"><i class="fa fa-chevron-right"></i></a></li>
            </ul>

            <!-- <ul class="pagination">
        <li><a href="?pageno=1">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
        </li>
        <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
    </ul> -->

          </div>
          <!-- Start Sidebar -->
          <div class="col-md-4 sidebar">
            
            <?php require 'sidebar.php'; ?>
            <div class="widget sidebar-widget">
              <div class="sidebar-widget-title">
                <h3>Sermon Tags</h3>
              </div>

              <div class="tag-cloud">
                <?php 
                $sql1 = "SELECT DISTINCT book_cat.category FROM book_cat INNER JOIN books ON books.cat_id = book_cat.ID ";
                $query1 = mysqli_query($conn, $sql1);
    if ($query1) {
      while ($row = mysqli_fetch_assoc($query1)) {
        //$id = urlencode($row['ID']);
        $cat = $row['category'];
        ?>
               <?php echo "<a href='book.php?book-id=$id'>" . $cat . '</a>'; ?>
               <?php }
                   } ?>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Start Footer -->
  <?php 
  require 'footer.php';
   ?> 
  <!-- End Footer --> 
  <a id="back-to-top"><i class="fa fa-angle-double-up"></i></a>
</div>
<script src="js/jquery-2.0.0.min.js"></script> <!-- Jquery Library Call --> 
<script src="plugins/prettyphoto/js/prettyphoto.js"></script> <!-- PrettyPhoto Plugin --> 
<script src="js/helper-plugins.js"></script> <!-- Plugins --> 
<script src="js/bootstrap.js"></script> <!-- UI --> 
<script src="js/waypoints.js"></script> <!-- Waypoints --> 
<script src="plugins/mediaelement/mediaelement-and-player.min.js"></script> <!-- MediaElements --> 
<script src="js/init.js"></script> <!-- All Scripts --> 
<script src="plugins/flexslider/js/jquery.flexslider.js"></script> <!-- FlexSlider --> 
<script src="plugins/countdown/js/jquery.countdown.min.js"></script> <!-- Jquery Timer --> 
</body>
</html>