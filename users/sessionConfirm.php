<?php

session_start();
$userName = $_SESSION["user"];
if (isset($_SESSION["user"])) {
}else{
	header("location:http://localhost/crms/login/login.php");
}

?>