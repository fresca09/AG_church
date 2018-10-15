<?php 
require "includes/config.php";
if(isset($_POST['submit']))  
{  
$checkbox1=$_POST['techno'];  
$chk="";  
foreach($checkbox1 as $chk1)  
   {  
      $chk .= $chk1.",";  
   }  
$in_ch=mysqli_query($conn,"insert into special (Arae) values ('$chk')");  
if($in_ch==1)  
   {  
      echo'<script>alert("Inserted Successfully")</script>';  
   }  
else  
   {  
      echo'<script>alert("Failed To Insert")</script>';  
   }  
}  
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Checking my boxes...</title>
</head>
<body>

<form action="" method="post" enctype="multipart/form-data">  
   <div style="width:200px;border-radius:6px;margin:0px auto">  

      <label>PHP</label>
      <input type="checkbox" name="techno[]" value="PHP"></input>  
    
     
      <label>.Net</label>  
<input type="checkbox" name="techno[]" value=".Net"></input>  
    
     
      <label>Java</label>  
      <input type="checkbox" name="techno[]" value="Java"></input>  
    
     
      <label>Javascript</label>  
      <input type="checkbox" name="techno[]" value="javascript"></input><br><br>   
    
     
     <input type="submit" value="submit" name="submit">
    
</table>  
</div>  
</form>  

</body>
</html>