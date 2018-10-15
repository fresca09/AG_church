<?php
require_once "includes/config.php";
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form method="post" class="contact-form" id="form1">
    <div class="col-md-6 margin-15">
        <div class="form-group">
            <input type="text" id="name" name="name"  class="form-control input-lg" placeholder="Name" required>
        </div>
        <div class="form-group">
            <input type="email" id="email" name="email"  class="form-control input-lg" placeholder="Email" required>
        </div>
        <div class="form-group">
            <input type="text" id="phone" name="phone" class="form-control input-lg" placeholder="Phone" required>
        </div>
        <div class="form-group">
            <input type="hidden" name="date" value="<?php echo time(); ?>">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <textarea cols="10" rows="7" id="message" name="message" class="form-control input-lg" placeholder="Enter message" required style="margin-top: -5px;"></textarea>
        </div>
    </div>
    <div class="col-md-12">
        <input id="submit" name="submit" type="submit" class="btn btn-primary btn-lg pull-right" value="Submit now!">
    </div>
</form>

<script type="text/javascript" src="js/jquery.js"></script>
<script src="js/jquery-2.0.0.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $("#form1").on("submit", function(e){
            e.preventDefault();
            $.ajax({
                url: "contact_insert.php",
                data: new FormData(this),
                cache: false,
                processData: false,
                contentType: false,
                type: "POST",
                success: function(strMessage){
                    $('#msg').text(strMessage)
                }
            });
        });

    });
</script>
</body>
</html>
