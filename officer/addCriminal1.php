<?php

include "config.php";

$output = '';
$officerId = $_POST['officerId'];
$img_name = $_FILES['img']['name'];
$tmp_name = $_FILES['img']['tmp_name'];
$name 		= strtoupper($_POST['name']);  
$Fname 		= strtoupper($_POST['Fname']); 
$Cnic   	= $_POST['Cnic']; 
$Address	= strtoupper($_POST['Address']);
$crime		= $_POST['Crime'];
$criminal_status		= $_POST['criminalStatus'];
$crimeDetail		= $_POST['crimeDetail'];

$extention = pathinfo($img_name,PATHINFO_EXTENSION);
$img = rand().'.'.$extention;

if ($_FILES['img']['name'] == '') {
	$output = 'select the image first !';
	echo $output;
}elseif ($name == '' || $Fname == '' || $Cnic=='' || $Address == '' || $crime == '' || $criminal_status == '' || $crimeDetail == '') {
	$output = 'Fill All Fields !';
	echo $output;

}else{
	$sql = "INSERT INTO `criminal`(`C_name`, `C_Fname`, `C_cnic`, `C_image`, `C_crime`, `C_status`, `C_address`, `C_officer`, `C_detail`) VALUES ('{$name}','{$Fname}','{$Cnic}','{$img}','{$crime}','{$criminal_status}','{$Address}','{$officerId}','{$crimeDetail}')";
	$result = mysqli_query($conn,$sql);
	move_uploaded_file($tmp_name, 'criminalsImages/'.$img);
	$sql2 = "UPDATE `officer` SET cases = cases + 1 WHERE `officer_id` = '{$officerId}'";
	$result = mysqli_query($conn,$sql2);

	
	$output = 'RECORD INSERTED successfully !';
	echo $output;
}


?>