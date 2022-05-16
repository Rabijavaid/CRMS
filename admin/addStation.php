<?php

$conn = mysqli_connect('localhost','root','','crms');

$name 		= strtoupper($_POST['name']); 
$Address	= strtoupper($_POST['Address']);
$contact		= $_POST['contact'];
$location		= $_POST['location'];

$sql = "INSERT INTO `policestation`( `ps_name`, `contactNo`, `location`,`url`) VALUES ('{$name}','{$contact}','{$Address}','{$location}')";
$result = mysqli_query($conn,$sql);
echo $sql;
?>