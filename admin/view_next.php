<?php 
require_once 'includes/config.php';

$sql = "SELECT * FROM admin";
$query = mysqli_query($conn, $sql);

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Nexting</title>
 </head>
 <body>
 
<table class="table display responsive nowrap">
              <thead>
                <tr>
               	 
                  <th>Firstname</th>
                  <th>Lastname</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Phone</th> 
                  <th>Gender</th>
                  <th>Password</th>
                  <th>Image</th>                          
                  <th>Action</th>
                  <th>Action</th>
                 
                </tr>
              </thead>
              <?php 
        if ($query) {

        while ($row = mysqli_fetch_array($query)) {   
                  
                 echo "<tbody>
                <tr><td>$row[Fname]</td><td>$row[Lname]</td><td>$row[Username]</td><td>$row[Email]</td><td>$row[Phone]</td><td>$row[Gender]</td><td>$row[Password]</td><td>$row[Image]</td>
                    <td><a href='next.php?ID=$row[ID]&Fname=$row[Fname]&Lname=$row[Lname]&Username=$row[Username]&Email=$row[Email]&Phone=$row[Phone]&Gender=$row[Gender]&Password=$row[Password]&Image=$row[Image]'>Edit</a></td>
                     <td><a href='next.php?ID=$row[ID]' id='delete'>Delete</a></td>                
                    
                </tr>

                 </tbody>";
               }
             }
                  ?>
            </table>

 </body>
 </html>