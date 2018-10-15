<?php 
// require 'includes/snippet.php';
// require 'includes/db-inc.php';
require "header.php"; 




if(isset($_POST['del'])){

	$id = sanitize(trim($_POST['id']));

	$sql_del = "DELETE from books where BookId = $id"; 

	$result = mysqli_query($conn,$sql_del);
			if ($result)
			{
				echo "<script>";
	echo "      
		var response = confirm('Would you like to delete the Book');
		if (response == true) {
			alert('Book was successfully deleted from the database');
				location.href ='bookstable.php';
		}   

		else
			{
				alert('Could not delete Book');
			}
		

	 </script>";
			}
			

 }


 

?>


<div class="container">
    <?php include "includes/nav.php"; ?>
	<!-- navbar ends -->
	<!-- info alert -->
	<div class="alert alert-warning col-lg-7 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-0 col-sm-offset-1 col-xs-offset-0" style="margin-top:70px">

		<span class="glyphicon glyphicon-book"></span>
	    <strong>Books</strong> Table
	</div>
	<!-- <div class="alert alert-info col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10px">
		<button class="btn btn-success" style="float: left"><span class="glyphicon glyphicon-plus-sign"></span> Add Button</button>
		
	    <form class="form-vertical col-lg-6 col-md-6 col-sm-6 col-xs-12" role="form" style="float: right">
	    	<div class="form-group ">
				<label for="Username" class="col-lg-8 col-md-2 col-xs-8 col-sm-8 control-label">Search User</label>
				<div class="col-lg-12 col-md-12 col-sm-10 col-xs-12  ">
							<input type="text" class="form-control" name="username" placeholder="Enter Username" id="username">
				</div>		
			</div>
	    </form>
    </div> -->
	   
	   


	</div>
	<div class="container">
		<div class="panel panel-default">
		  <!-- Default panel contents -->
		  <div class="panel-heading">
		  	<div class="row">
		  	  <a href="addbook.php"><button class="btn btn-success col-lg-3 col-md-4 col-sm-11 col-xs-11 button" style="margin-left: 15px;margin-bottom: 5px"><span class="glyphicon glyphicon-plus-sign"></span> Add Book</button></a>
			  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-right">
			  	<form method="post" action="bookstable.php" enctype="multipart/form-data">
			  		<div class="input-group pull-right">
				      <span class="input-group-addon">
				        <button class="btn btn-success" name="search">Search</button> 
				      </span>
				      <input type="text" class="form-control" name="text">
			      </div>
			  	</form>
			    
			  </div><!-- /.col-lg-6 -->
  
			</div>
		  </div>

		  <table class="table table-bordered">
		
	 <thead>
	 <tr>
		 <th>BookId</th>
			  <th>bookTitle</th>
			  <th>author</th>
			  <th>ISBN</th>
			  <th>bookCopies</th>
			  <th>publisherName</th>
			  <th>available</th>
			  <th>categories</th>
			  <th>callNumber</th>
			   <th>Delete</th>
	 </tr>
</thead>

  <?php 


if(isset($_POST['search'])){
	
	$text = sanitize(trim($_POST['text']));

	 $sql = "SELECT * FROM books where BookId = $text ";

	 $query = mysqli_query($conn, $sql);

	 

	 while($row=mysqli_fetch_array($query)){ ?>
		<tbody>
		<td><?php echo $row['bookId']; ?></td>
		<td><?php echo $row['bookTitle']; ?></td>
		<td><?php echo $row['author']; ?></td>
		<td><?php echo $row['ISBN']; ?></td>	
		<td><?php echo $row['bookCopies']; ?></td>
		<td><?php echo $row['publisherName']; ?></td>
		<td><?php echo $row['available']; ?></td>
		<td><?php echo $row['categories']; ?></td>
		<td><?php echo $row['callNumber']; ?></td>
		<form method='post' action='bookstable.php'>
		<input type='hidden' value="<?php echo $row['bookId']; ?>" name='id'>
		<td><button name='del' type='submit' value='Delete' class='btn btn-warning' onclick='return Delete()'>DELETE</button></td>
		</form>
		</tbody>
	<?php  }
 }
 else{
	$sql2 = "SELECT * from books";

	$query2 = mysqli_query($conn, $sql2); 
	while ($row = mysqli_fetch_array($query2)) { ?>
	<tbody>
		<td><?php echo $row['bookId']; ?></td>
		<td><?php echo $row['bookTitle']; ?></td>
		<td><?php echo $row['author']; ?></td>
		<td><?php echo $row['ISBN']; ?></td>	
		<td><?php echo $row['bookCopies']; ?></td>
		<td><?php echo $row['publisherName']; ?></td>
		<td><?php echo $row['available']; ?></td>
		<td><?php echo $row['categories']; ?></td>
		<td><?php echo $row['callNumber']; ?></td>
		<form method='post' action='bookstable.php'>
		<input type='hidden' value="<?php echo $row['bookId']; ?>" name='id'>
		<td><button name='del' type='submit' value='Delete' class='btn btn-warning' onclick='return Delete()'>DELETE</button></td>
		</form>
		</tbody>
	
<?php 	}
	
 } 

 ?>
		   </table>
		 
	  </div>
	</div>
	<div class="mod modal fade" id="popUpWindow">
        	<div class="modal-dialog">
        		<div class="modal-content">
        			
        			<!-- header begins here -->
        			<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal">&times;</button>
        				<h3 class="modal-title"> Warning</h3>
        			</div>

        			<!-- body begins here -->
        			<div class="modal-body">
        				<p>Are you sure you want to delete this book?</p>
        			</div>

        			<!-- button -->
        			<div class="modal-footer ">
        				<button class="col-lg-4 col-sm-4 col-xs-6 col-md-4 btn btn-warning pull-right"  style="margin-left: 10px" class="close" data-dismiss="modal">
        					No
        				</button>&nbsp;
        				<button class="col-lg-4 col-sm-4 col-xs-6 col-md-4 btn btn-success pull-right"  class="close" data-dismiss="modal" data-toggle="modal" data-target="#info">
        					Yes
        				</button>
        			</div>
        		</div>
        	</div>
        </div>
        <div class="modal fade" id="info">
        	<div class="modal-dialog">
        		<div class="modal-content">
        			
        			<!-- header begins here -->
        			<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal">&times;</button>
        				<h3 class="modal-title"> Warning</h3>
        			</div>

        			<!-- body begins here -->
        			<div class="modal-body">
        				<p>Book deleted <span class="glyphicon glyphicon-ok"></span></p>
        			</div>

        		</div>
        	</div>
        </div>
		




<script src="lib/jquery/js/jquery.js"></script>
<script src="lib/bootstrap/js/bootstrap.js"></script>	
<script>
 function Delete() {
            return confirm('Would you like to delete the news');
        }
</script>
</body>
</html>