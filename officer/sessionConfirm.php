<?php

session_start();
$officerName = $_SESSION["user_name"];
$role = $_SESSION['role'];
if ($role == "c81e728d9d4c2f636f067f89cc14862c") {

}else{
  header("location:http://localhost/crms/login/login.php");
}

$query = "SELECT `officer_id` FROM `officer` WHERE `Email` = '$officerName'";
$queryresult = mysqli_query($conn,$query);
while ($query_rows = mysqli_fetch_assoc($queryresult)) {
	$officerID = $query_rows['officer_id'];
};

?>
