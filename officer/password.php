<?php


include "config.php";
include "sessionConfirm.php";

$output = '';
$officerName = $_SESSION["user_name"];

$sql = "SELECT `password` FROM `user_login` WHERE `user_name` = '$officerName'";

$result = mysqli_query($conn,$sql);
while ($row = mysqli_fetch_assoc($result)) {
	$password = $row['password'];
};

$old = md5($_POST['old']);
$newp = md5($_POST['newp']);
$confirm = md5($_POST['confirm']);

if ($old =='' || $newp =='' || $confirm == '') {
	$output = 1;
}elseif ($newp != $confirm ) {
	$output = 2;
}elseif ($password != $old ) {
	$output = 3;
}else{
	$sql0 = "UPDATE `user_login` SET `password`='$newp' WHERE `user_name` = '$officerName'";
	$result = mysqli_query($conn,$sql0);
}

echo $output;
?>