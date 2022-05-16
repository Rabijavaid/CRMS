<?php

$id = $_POST['id'];
$conn = mysqli_connect('localhost','root','','crms');

$sql="SELECT * FROM `officer` WHERE `ps_id` = $id";
$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result)>0) {
	while ($row = mysqli_fetch_assoc($result)) {
		$sql0="UPDATE `officer` SET `ps_id`=0 WHERE `officer_id` = ".$row['officer_id']."";
		$result0 = mysqli_query($conn,$sql0);
	}
}

$sql1="DELETE FROM `policestation` WHERE `PSID` = $id ";
$result1 = mysqli_query($conn,$sql1);

echo $sql1;
mysqli_close($conn);

?>