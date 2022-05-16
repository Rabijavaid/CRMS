<?php

$conn = mysqli_connect('localhost','root','','crms');

$img_name = $_FILES['img']['name'];
$tmp_name = $_FILES['img']['tmp_name'];

$id  	= $_POST['officerId'];
$name 		= strtoupper($_POST['name']);  
$Fname 		= strtoupper($_POST['Fname']); 
$Cnic   	= $_POST['Cnic']; 
$Address	= strtoupper($_POST['Address']);
$rank		= $_POST['rank'];
$contact		= $_POST['contact'];
$policeStation  =$_POST['station'];


$extention = pathinfo($img_name,PATHINFO_EXTENSION);
$img = rand().'.'.$extention;

if ($_FILES['img']['name'] === '') {

	$sql = "UPDATE `officer` SET `name`='{$name}',`Fname`='{$Fname}',`CNIC`='{$Cnic}',`city`='{$Address}',`rank`='{$rank}',`ps_id`='{$policeStation}',`contact`='{$contact}' WHERE `officer_id` = '{$id}'";
	$result = mysqli_query($conn,$sql);


}else{
	$sql = "UPDATE `officer` SET `name`='{$name}',`Fname`='{$Fname}',`CNIC`='{$Cnic}',`city`='{$Address}',`rank`='{$rank}',`ps_id`='{$policeStation}',`photo`='{$img}',`contact`='{$contact}' WHERE `officer_id` = '{$id}'";
	move_uploaded_file($tmp_name, 'officerImages/'.$img);
	$result = mysqli_query($conn,$sql);


}

?>