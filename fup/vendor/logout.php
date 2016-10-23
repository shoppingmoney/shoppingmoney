<?php
session_start();
ob_start();
unset($_SESSION['auth_first']);
unset($_SESSION['userEmail']);
header("location:../index.php");
?>