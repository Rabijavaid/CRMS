<?php
	require("PHPMailer-master/src/PHPMailer.php");
    require("PHPMailer-master/src/SMTP.php");
    require("PHPMailer-master/src/Exception.php");
    
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
$mail->Port = 465;                    
$mail->From = "kakoobadshah679@gmail.com";
$mail->FromName = "K_B The Tiger";
$mail->addAddress("abdullahakrahs789@gmail.com");
$mail->isHTML(true);
$mail->Subject = "Subject Text";
$mail->Body = "<i>Mail body in HTML</i>";
$mail->AltBody = "This is the plain text version of the email content";
if(!$mail->send())
{
echo "Mailer Error: " . $mail->ErrorInfo;
}
else
{
echo "Message has been sent successfully";
}