<?php  
// auto password ganerator

$ABD="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
$abc="abcdefghijkmnopqrstuvwxyz";
$char = '123456789';

$pass1 = substr(str_shuffle($ABD), 0, 3);
$pass2 = substr(str_shuffle($abc), 0, 3);
$pass3 = substr(str_shuffle($char), 0, 2);

$password = md5(str_shuffle($pass1.$pass2.$pass3));

$img_name = $_FILES['img']['name'];
$tmp_name = $_FILES['img']['tmp_name'];
$name 		= strtoupper($_POST['name']);  
$Fname 		= strtoupper($_POST['Fname']); 
$Email  	= $_POST['Email'];
$Cnic   	= $_POST['Cnic']; 
$Address	= strtoupper($_POST['Address']);
$rank		= $_POST['rank'];
$contact		= $_POST['contact'];


$extention = pathinfo($img_name,PATHINFO_EXTENSION);
$img = rand().'.'.$extention;


if ($_FILES['img']['name'] != '' ) {

	$conn = mysqli_connect('localhost','root','','crms');
	$sql = "INSERT INTO `user_login`(`user_name`, `password`, `role`) VALUES ('{$Email}','{$password}','c81e728d9d4c2f636f067f89cc14862c')";
	$result = mysqli_query($conn,$sql);

	$sql2="INSERT INTO `officer`(`name`, `Fname`, `Email`, `CNIC`, `city`, `rank`,`photo`,`contact`) VALUES ('{$name}','{$Fname}','{$Email}','{$Cnic}','{$Address}','{$rank}','{$img}','{$contact}')";
	$result2 = mysqli_query($conn,$sql2);


	move_uploaded_file($tmp_name, 'officerImages/'.$img);
	echo "Record Inserted successfully";
}else{
	echo "Select Image . ";
}


mysqli_close($conn);
?>