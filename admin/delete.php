<?php

$id = $_POST['id'];
$Email = $_POST['Email'];

$conn = mysqli_connect('localhost','root','','crms');

$sql="DELETE FROM `officer` WHERE `officer_id` = {$id}";
$result = mysqli_query($conn,$sql);

$sql1="DELETE FROM `user_login` WHERE `user_name` = {$Email}";
$result1 = mysqli_query($conn,$sql1);

mysqli_close($conn);

?>