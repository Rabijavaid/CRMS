<?php 


$conn = mysqli_connect('localhost','root','','crms');

$new =$_POST['email'];
$old =$_POST['oldEmail'];


$sql ="UPDATE `user_login` SET `user_name`='{$new}' WHERE `user_name` = '{$old}'";
$sql0 ="UPDATE `officer` SET `Email`='{$new}' WHERE `Email` ='{$old}'";


if($result = mysqli_query($conn,$sql) AND $result0 = mysqli_query($conn,$sql0)){
	echo ("Email Updated successfully !");
}else{
	echo ("New Email Exist in record,Connot add New Email !");
}


mysqli_close($conn);
?>