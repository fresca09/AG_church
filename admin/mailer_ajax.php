<?php 
require_once 'includes/libraries.php';
require 'PHPMailer/class.phpmailer.php';
require 'PHPMailer/class.smtp.php';

if($_SERVER['REQUEST_METHOD']=="POST") {

$mysql = "SELECT email FROM newsletter";
$report = mysqli_query($conn, $mysql);
if ($report) {
	if(mysqli_num_rows($report) > 0) {
		while($list = mysqli_fetch_array($report))
		{
			
	//PHPMailer Object
$mail = new PHPMailer;

//Enable SMTP debugging. 
//$mail->SMTPDebug = 3;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "smtp.sendgrid.net";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "aptech-web";                 
$mail->Password = "secretpassword123";                           
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "ssl";                           
//Set TCP port to connect to 
$mail->Port = 465; 

//From email address and name
// $mail->From = "info@seantech.com.ng";
$mail->From = "info@frescasoft.com";
$mail->FromName = "AG Worship Center";

//To address and name
//$mail->addAddress($email, $username);
$mail->addAddress($list['email']);
//$mail->addAddress("Recipient email"); //Recipient name is optional


//Address to which recipient will reply
$mail->addReplyTo("info@agworshipcenter.com", "Reply");

//CC and BCC
// $mail->addCC("cc@example.com");
// $mail->addBCC("bcc@example.com");

//Send HTML or Plain Text email
$mail->isHTML(true);

$mail->Subject = "Worship Center Welcome Message";
$mail->Body = '<div style="background-color:#656C74; width:800px; min-height: 650px;">
	<div style="min-height:80px; width:100%;background-color:#F6A821; color:#FFFFFF;padding-top: 7px;">
		<h1 style="text-align: center;">Fresca<span style="color: #656C74;">Soft Consortium Limited</span>
		</h1>
	</div>
	
	<div style="background-color:#eee; min-height: 470px; margin-top: -22px;">
		<p style="text-align: center;font-size: 20px; padding-top: 20px;">Thank you for subcribing to our newsletter</p>
	</div>
	
</div>';
$mail->AltBody = "Thank you for subcribing to our newsletter";

if(!$mail->send()) 
{
	$msg = "Message not successfully sent";
} 
else 
{
    $msg = "Message has been sent successfully";
}
}

}
}

}	
 ?>