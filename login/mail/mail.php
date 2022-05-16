<?php

$email='kashifkhan96189@gmail.com';


	use PHPMailer\PHPMailer\Exception;
	use PHPMailer\PHPMailer\PHPMailer;
	

	require_once("PHPMailer/src/PHPMailerAutoload.php");
	require_once("PHPMailer/src/PHPMailer.php");
    require_once("PHPMailer/src/SMTP.php");
    require_once("PHPMailer/src/Exception.php");
    

$mail = new PHPMailer;
//Enable SMTP debugging.
$mail->SMTPDebug = 3;                           
//Set PHPMailer to use SMTP.
$mail->isSMTP();        
//Set SMTP host name                      
$mail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                      
//Provide username and password
$mail->Username = "kakoobadshah679@gmail.com";             
$mail->Password = "Aa@3084776963@";           
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";                       
//Set TCP port to connect to
$mail->Port = 587;                    
$mail->From = "kakoobadshah679@gmail.com";
$mail->FromName = "CRMS";
$mail->addAddress($email);
$mail->isHTML(true);
$mail->Subject = "Password Reset";
$mail->Body = '<div>
	<h2 style="border-bottom: 2px solid blue;color: blue;font-size: xx-large;display:inline-block;">Reset Password :</h2><br>
	<span style="font-style: italic;font-family: cursive;">Tap the Following button to Reset your CRMS Password,if you Didn'."'".'t request for a new Password than safely delete this email.</span><br>
	<a href="http://localhost/crms/login/resetPassword.php?email='.$email.'" style="color: #fff;
    background-color: #007bff;display: inline-block;color:#fff;background-color:#007bff;padding: 10px;text-decoration: none;margin: 20px;">RESET PASSWORD</a>
</div>';
$mail->AltBody = "This is the plain text version of the email content";
if(!$mail->send())
{
echo "Mailer Error: " . $mail->ErrorInfo;
}
else
{
echo "Message has been sent successfully";
}


mysqli_close($conn);

?>
