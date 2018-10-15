<?php
/**
 * Created by PhpStorm.
 * User: Fresca
 * Date: 27/09/2018
 * Time: 09:29 PM
 */
require "includes/config.php";
$msgs = "";
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delete file</title>
    <script src="lib/jquery/js/jquery.js"></script>
    <script src="lib/popper.js/js/popper.js"></script>
    <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script src="lib/jquery.cookie/js/jquery.cookie.js"></script>
    <script src="lib/datatables/js/jquery.dataTables.js"></script>
    <script src="lib/datatables-responsive/js/dataTables.responsive.js"></script>
    <script src="lib/select2/js/select2.min.js"></script>

    <script src="js/slim.js"></script>
</head>
<body>

<div class="container">
    <h2>Delete data from Database using jquery Ajax in php</h2>
    <div id="message">
        <p><?php
            echo $msgs
            ?></p>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th>S/N</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        </thead>

        <tbody>
        <?php
        $sql = mysqli_query($conn, "SELECT * FROM newsletter");
        while ($row = mysqli_fetch_array($sql)) {
            ?>
            <tr>
                <td><?php echo $row[0]; ?></td>
                <td><?php echo $row[1]; ?></td>
                <td>
                    <button type="button" class="btn btn-danger" onclick="delete_data(<?php echo $row[0]; ?>)">Delete</button>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script>
    function delete_data(id) {
        var id = id;
        //e.preventDefault();
        $.ajax({
           url: "sub_delete.php",
           type: "post",
           data: {id:id},
           success: function (strMessage) {
               $("#message").text(strMessage)
           }
        });
    }
</script>

</body>
</html>
