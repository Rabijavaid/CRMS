<?php

include 'config.php';

	$name=$_POST["name"];
	$password=md5($_POST['password']);

	$sql="SELECT `user_name`,`password`,`role` FROM `user_login` WHERE `user_name`='{$name}' AND `password`='{$password}'";
	$result=mysqli_query($conn,$sql);

	if (mysqli_num_rows($result)>0) {
			while ($row=mysqli_fetch_assoc($result)) {
			if ($row['role'] == 'c4ca4238a0b923820dcc509a6f75849b') {
				$output = "http://localhost/crms/admin/index.php";
				echo $output;
				session_start();
				$_SESSION["user_name"] = $row['user_name'];
				$_SESSION["role"] = $row['role'];	
			}elseif ($row['role'] == 'c81e728d9d4c2f636f067f89cc14862c') {
				$output = "http://localhost/crms/officer/index.php";
				echo $output;
				session_start();
				$_SESSION["user_name"] = $row['user_name'];
				$_SESSION["role"] = $row['role'];
			}elseif ($row['role'] == 'eccbc87e4b5ce2fe28308fd9f2a7baf3') {
				$output = "http://localhost/crms/users/index.php";
				echo $output;
				session_start();
				$_SESSION["user"] = $row['user_name'];
				$_SESSION["roleUser"] = $row['role'];
			}
			
		}
	}else{
		$output = 1;
		echo $output;
	}

	mysqli_close($conn); 
?>