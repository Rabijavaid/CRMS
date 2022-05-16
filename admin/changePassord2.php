<?php

$id = $_POST['id'];

$ABD="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
$abc="abcdefghijkmnopqrstuvwxyz";
$char = '123456789';

$pass1 = substr(str_shuffle($ABD), 0, 3);
$pass2 = substr(str_shuffle($abc), 0, 3);
$pass3 = substr(str_shuffle($char), 0, 2);

$generatedPassword = str_shuffle($pass1.$pass2.$pass3);
$password = md5($generatedPassword);


$conn = mysqli_connect('localhost','root','','crms');

	$sql = "SELECT `Email` FROM `officer` WHERE `officer_id` = {$id}";
	$result = mysqli_query($conn,$sql);
	if (mysqli_num_rows($result)>0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$sql1 = "UPDATE `user_login` SET `password`='{$password}' WHERE `user_name` = '{$row['Email']}'";
			$result1 = mysqli_query($conn,$sql1);
			$output = "$generatedPassword";
		}
	}else{
		$output = 1;
		
	}
	echo $output;
	mysqli_close($conn);
?>