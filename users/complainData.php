<?php

include "config.php";

$username = $_POST['userName'];
$subject = $_POST['subject'];
$complain = $_POST['complain'];

$sql = "INSERT INTO `complains`(`complainUser`, `complainSubject`, `complaindetails`) VALUES ('{$username}','{$subject}','{$complain}')";
$result = mysqli_query($conn,$sql);
header("location:http://localhost/crms/users/complain.php");
?>