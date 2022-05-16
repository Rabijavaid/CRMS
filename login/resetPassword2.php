<?php

$email = $_POST['email'];
$new = md5($_POST['newp']);

include "config.php";

$sql="UPDATE `user_login` SET `password`='$new' WHERE `user_name` ='$email' ";
$result = mysqli_query($conn,$sql);

echo $sql;
?>