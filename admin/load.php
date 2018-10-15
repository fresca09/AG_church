<?php 
require 'includes/config.php';

$sql = "SELECT * FROM updated";
$query = mysqli_query($conn, $sql);
echo "<table cellpadding=5 cellspacing=5><tr><th>Name</th></tr>";
	if ($query) {
		while ($row = mysqli_fetch_assoc($query)) {
			echo "<tr><td>$row[id]</td><td>$row[name]</td><td><a href='update.php?id=$row[id]&name=$row[name]'>Update</a></td>
			<td><a href='update.php?$row[id]' id='delete'>Delete</a></td>
			</tr>";
		}
		
	}
	else
	{
		echo mysql_error();
	}

 ?>

 <!-- <!doctype html>
 <html>
 	<head>
 		<title></title>
 		<script src="js/jquery.js"></script>
 	</head>
 	<body style="overflow-x:hidden !important;">
 		<div style="width: 100%;height:100%;background:teal;position: absolute;z-index: 99;padding: 50px 100px;display:none;" class="my-modal">
			<div class="inner-modal" style="background-color: #fff;width: 60%;height: 60%;">
				<button style="width:100%;background:indianred;" class="close-btn">
				CLOSE
			</button>
				<h2>WELCOME TO MY SELF MADE MODAL</h2>
				<DIV class="update-user" STYLE="display:none;">
					<label>USERNAME: <span class="dept-name-label"></span></label><BR>
					<label>ID: <span class="dept-id-label"></span></label><BR>
					<FORM id="update-the-user" method="post">
						<input type="text" name="name" class="dept-name"/>
						<input type="text" name="id" class="dept-id" readonly="true" />
						<input type="submit" name="update" value="UPDATE" />
					</FORM>
				</DIV>

				<DIV class="delete-user" STYLE="display:none;">
					<label>USERNAME: <span class="dept-name-label"></span></label><BR>
					<label>ID: <span class="dept-id-label"></span></label><BR>
					<FORM id="delete-the-user" method="post">
						<input type="hidden" name="name" class="dept-name"/>
						<input type="hidden" name="id" class="dept-id"/>
						<h5>ARE YOU SURE YOU WANT TO DELETE THIS USER 
						<input type="submit" name="delete" value="YES" style="border:none;background-color:#fff;color:teal;text-decoration:underline;font-weight:bold;cursor:pointer;" /></h5>
					</FORM>
				</DIV>
			</div>
		</div>
 		<table cellpadding=5 cellspacing=5>
 			<tr><th>Name</th>
 			</tr>
 			<?php 
 			$sql = "SELECT * FROM updated";
$query = mysqli_query($conn, $sql);
	if($query){
		while ($row = mysqli_fetch_assoc($query)) {
 			 ?>
 			<tr><td><?php echo $row['id']; ?></td><td><?php echo $row['name']; ?></td><td><p id='update' style="color:teal;cursor:pointer;font-family:consolas;text-decoration:underline;" class="show-modal">Update
 				<input type="hidden" value="<?php echo $row['name']; ?>" class="department-in">
 				<input type="hidden" value="<?php echo $row['id']; ?>" class="name-id">
 				<input type="hidden" value="update" class="purpose">
 			</p></td>

			<td><p id='delete' class="show-modal" style="color:indianred;cursor:pointer;font-family:consolas;text-decoration:underline;">Delete
				<input type="hidden" value="<?php echo $row['name']; ?>" class="department-in">
 				<input type="hidden" value="<?php echo $row['id']; ?>" class="name-id">
 				<input type="hidden" value="delete" class="purpose">
			</p></td>
			</tr>
			<?php } } ?>

		</table>

		<script type="text/javascript">

			$(".show-modal").on("click", function(e){
				e.preventDefault();
				$(".my-modal").css("display","block");

				//GET THE FORM FIELDS HERE
				var dept_name= $(this).find(".department-in");//GET THE DEPT. NAME HERE
				dept_name = dept_name.val();

				var dept_id = $(this).find(".name-id");//GET THE DEPT ID HERE
				dept_id = dept_id.val();

				//GET THE REASON FOR OPENING THIS MODAL
				var purpose_for_modal = $(this).find(".purpose");
				purpose_for_modal = purpose_for_modal.val();
				
				if(purpose_for_modal==="delete"){
					$(".delete-user").css("display","block");
					$(".update-user").css("display","none");
				}
				else if(purpose_for_modal==="update"){
					$(".update-user").css("display","block");
					$(".delete-user").css("display","none");
				}

				$(".dept-name").attr("value", dept_name);
				$(".dept-id").attr("value", dept_id);

				$(".dept-id-label").html(dept_id);
				$(".dept-name-label").html(dept_name);
			});

			$(".close-btn").on("click", function(e){
				e.preventDefault();
				$(".my-modal").css("display","none");
			});

			$(".my-modal").on("click", function(){
				$(".my-modal").css("display", "none");
			});

		//ajax functions here
		$("#update-the-user").on("submit", function(e){
			e.preventDefault();

			$.ajax({
				url:"updated.php",
				type:"POST",
				data: new FormData(this),
				cache:false,
				processData: false,
				contentType: false,
				success: function(data){
					alert(data);
				}
			});
		});

		$("#delete-the-user").on("submit", function(e){
			e.preventDefault();

			$.ajax({
				url:"deleted.php",
				type:"POST",
				data: new FormData(this),
				cache:false,
				processData: false,
				contentType: false,
				success: function(data){
					alert(data);
				}
			});
		});

		</script>
 	</body>
 </html> -->
 