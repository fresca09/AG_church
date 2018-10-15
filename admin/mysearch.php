

<!DOCTYPE html>
<html>
<head>
    <title>Searching...</title>
</head>
<body>
  <center>
  <div>
      <form method="post" id="form1">
          <input type="text" name="search" id="search" placeholder="Search here.....">
          <input type="submit" name="submit" id="" value="Submit">
      </form>

<!--  <div id="here"> -->
  </div>
      <p id="message" style="font-size: 18px; color: #A9919D; margin-left: -15px;"></p><br>
</div>


<!--  <div style="width: auto;">-->
<!--    <table>-->
<!--              <thead>-->
<!--                <tr>-->
<!--                  <th>Firstname</th>-->
<!--                  <th>Lastname</th>-->
<!--                  <th>Email</th>-->
<!--                  <th>Phone</th>-->
<!--                  <th>Birthday</th>-->
<!--                  <th>Nationality</th>-->
<!--                </tr>-->
<!--              </thead>-->
<!--            <tbody>-->
<!--                <tr>-->
<!--                   <td style='text-align: center;'>--><?php //echo $row['Firstname'];?><!--</td> -->
<!--                   <td style='text-align: center;'>--><?php //echo $row['Lastname'];?><!--</td>                 -->
<!--                   <td style='text-align: center;'>--><?php //echo $row['Email'];?><!--</td>-->
<!--                   <td style='text-align: center;'>--><?php //echo $row['Phone'];?><!--</td>-->
<!--                   <td style='text-align: center;'>--><?php //echo $row['Birthday'];?><!--</td>-->
<!--                   <td style='text-align: center;'>--><?php //echo $row['Nationality'];?><!--</td>-->
<!--                </tr>-->
<!---->
<!--                 </tbody>-->
<!--            </table>-->
<!--          </div>-->
  </center>

  <script src="lib/jquery/js/jquery.js"></script>
<script>
    $("#form1").on("submit", function (e) {
       e.preventDefault();
       $.ajax({
          url: "fetch.php",
           type: "POST",
           cache: false,
           processData: false,
           contentType: false,
           data: new FormData(this),
           success: function (strMessage) {
               $('#message').text(strMessage)
           }

       });
    });
</script>

</body>
</html>