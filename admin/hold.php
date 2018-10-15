
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="lib/jquery/js/jquery.js"></script>
</head>
<body>
<form method="post" enctype="multipart/form-data" id="pdf-form">
	<input type="file" name="file_pdf" accept="application/pdf" />
	<input type="submit" name="submit" value="Submit">
</form>


<script type="text/javascript">
	$("#pdf-form").on("submit", function(e){
		e.preventDefault();

		$.ajax({
			url: "pdf.php",
			type: "POST",
			data: new FormData(this),
			contentType: false,
			processData: false,
			cache: false,
			success: function(data){
				alert(data);
			}
		});
	});
</script>

</body>
</html>