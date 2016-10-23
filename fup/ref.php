<?php
session_start();
include_once 'mlm/includes/config.php';
$conf = new config();
$ref='';
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$ref = $conf->single("userdetails WHERE refralink='$actual_link'","userid");
if($ref != ''){
$_SESSION['refid'] = $ref;
$_SESSION['ref'] = "yes";
}else{
 echo "<script>alert('Invalid referral link');</script>";
}
//print_r($_SESSION);
//header("location: ../index.php");
echo "<script>window.location='../index.php';</script>";
?>