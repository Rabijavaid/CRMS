<?php
$id = $_POST['id'];

$conn = mysqli_connect('localhost','root','','crms');

$sql="DELETE FROM `criminal` WHERE `C_id` = {$id}";
$result = mysqli_query($conn,$sql);

echo $sql;
mysqli_close($conn);

?>