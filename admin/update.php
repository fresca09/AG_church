<!DOCTYPE html>
<html>
<head>
	<title>Updating Data...</title>	
</head>
<body>
<h2>Ajax with PHP and MySQL => Update Database values.</h2>
<div>
	<p id="message"></p>
<form method="post" action="update.php">
	<input type="hidden" id="id" name="id" value="<?= $_GET['id']; ?>" readonly="readonly">
	<input type="text" id="name" name="name" placeholder="Enter Name" value="<?= $_GET['name']; ?>">
	<input type="submit" name="update" id="update" value="Update">
</form>
</div>

<div>
	<a href="load.php">View names</a>
</div>

<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#update').click(function(event){
				event.preventDefault();
				$.ajax({
					url: "updated.php",
					method: "post",
					data: $('form').serialize(),
					dataType: "text",
					success: function(strMessage){
						$('#message').text(strMessage)
					}
				})
			})
		})
	</script>

</body>
</html>