<?php
session_start();
ob_start();
unset($_SESSION['aName']);
unset($_SESSION['superEmail']);
header("location:../index.php");
?>