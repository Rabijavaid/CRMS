<?php

$conn = mysqli_connect('localhost','root','','crms');
$output = "";
$stationId = $_POST['stationId'];
$stationName = $_POST['stationName'];
$stationContact = $_POST['stationContact'];
$stationAddress = $_POST['stationAddress'];
$stationLocation = $_POST['stationLocation'];
$stationOfficer = $_POST['stationOfficer'];
$oldOfficer = $_POST['oldOfficer'];

if ($oldOfficer == 0) {
	$sql = "UPDATE `policestation` SET `ps_name`='{$stationName}',`contactNo`='{$stationContact}',`O_id`='{$stationOfficer}',`location`='{$stationAddress}',`url`='{$stationLocation}' WHERE `PSID`='{$stationId}'";
	$result = mysqli_query($conn,$sql);
	$sql0 = "UPDATE `officer` SET `ps_id`='{$stationId}' WHERE `officer_id` = '{$stationOfficer}'";
	$result0 = mysqli_query($conn,$sql0);
	echo "RECORD UPDATED SUCCESSFULLY !";
}else if ($oldOfficer != 0) {
	$sql = "UPDATE `policestation` SET `ps_name`='{$stationName}',`contactNo`='{$stationContact}',`O_id`='{$stationOfficer}',`location`='{$stationAddress}',`url`='{$stationLocation}' WHERE `PSID`='{$stationId}'";
	$result = mysqli_query($conn,$sql);
	if ($stationOfficer != 0) {
	$sql0 = "UPDATE `officer` SET `ps_id`='{$stationId}' WHERE `officer_id` = '{$stationOfficer}'";
	$result0 = mysqli_query($conn,$sql0);	
	}
	if ($stationOfficer != $oldOfficer) {
	$sql1 = "UPDATE `officer` SET `ps_id`= 0 WHERE `officer_id` = '{$oldOfficer}'";
	$result1 = mysqli_query($conn,$sql1);
	}
	
	echo "RECORD UPDATED SUCCESSFULLY !";
}


mysqli_close($conn);
?>