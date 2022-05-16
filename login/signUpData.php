<?php

include "config.php";

$name = $_POST['name'];
$email = $_POST['email'];
$cnic = $_POST['cnic'];
$contact = $_POST['contact'];
$password = md5($_POST['password']);
$role = md5(3);

$sql = "INSERT INTO `user`(`userName`, `userEmail`, `userCNIC`, `userContact`) VALUES ('{$name}','{$email}','{$cnic}','{$contact}')";
$result = mysqli_query($conn,$sql);

$sql0 = "INSERT INTO `user_login`(`user_name`, `password`, `role`) VALUES ('{$email}','{$password}','{$role}')";
$result0 = mysqli_query($conn,$sql0);
?>