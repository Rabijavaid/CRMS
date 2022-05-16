<?php

session_start();
$role = $_SESSION['role'];
if ($role == "c4ca4238a0b923820dcc509a6f75849b") {

}else{
  header("location:http://localhost/crms/login/login.php");
}

?>