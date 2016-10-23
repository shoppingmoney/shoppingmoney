<?php
session_start();
ob_start();
if (isset($_SESSION['userEmail']) == null || isset($_SESSION['userEmail']) == '') {
    //$_SESSION['userEmail']="headies70@yahoo.com";
    header("location:../index.php");

}
?>