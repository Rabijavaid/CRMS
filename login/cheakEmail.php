<?php 


include "config.php";

$email =$_POST['email'];

$cheakMail = '';


$sql = "SELECT `user_name` FROM `user_login` WHERE `user_name` ='{$email}'";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
	$cheakMail = 1;
}else{
	$cheakMail = 2;
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $cheakMail = 3;
}
echo $cheakMail;


?>