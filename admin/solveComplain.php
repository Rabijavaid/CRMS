<?php

$conn = mysqli_connect('localhost','root','','crms');
$id = $_GET['id'];
$sql = "UPDATE `complains` SET `complainStatus`=1 WHERE `id` = $id";
$result = mysqli_query($conn,$sql);
header("location:http://localhost/crms/admin/complains.php");
?>