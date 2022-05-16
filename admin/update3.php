<?php

$conn = mysqli_connect('localhost','root','','crms');

$img_name = $_FILES['img']['name'];
$tmp_name = $_FILES['img']['tmp_name'];

$id  	= $_POST['criminalId'];
$name 		= strtoupper($_POST['name']);  
$Fname 		= strtoupper($_POST['Fname']); 
$Cnic   	= $_POST['Cnic']; 
$Address	= strtoupper($_POST['address']);
$crime		= $_POST['crime'];
$crimeStatus		= $_POST['crimeStatus'];
$crimeDetail  =$_POST['crimeDetail'];


$extention = pathinfo($img_name,PATHINFO_EXTENSION);
$img = rand().'.'.$extention;

if ($_FILES['img']['name'] === '') {

	$sql = "UPDATE `criminal` SET `C_name`='{$name}',`C_Fname`='{$Fname}',`C_cnic`='{$Cnic}',`C_crime`='{$crime}',`C_status`='{$crimeStatus}',`C_address`='{$Address}',`C_detail`='{$crimeDetail}' WHERE `C_id` = '{$id}'";
	$result = mysqli_query($conn,$sql);


}else{
	$sql = "UPDATE `criminal` SET `C_name`='{$name}',`C_Fname`='{$Fname}',`C_cnic`='{$Cnic}',`C_image`='{$img}',`C_crime`='{$crime}',`C_status`='{$crimeStatus}',`C_address`='{$Address}',`C_detail`='{$crimeDetail}' WHERE `C_id` = '{$id}'";
	move_uploaded_file($tmp_name, '../officer/criminalsImages/'.$img);
	$result = mysqli_query($conn,$sql);


}

?>