<?php
session_start();
session_destroy();
header("location:http://localhost/crms/login/login.php");
?>