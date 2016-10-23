<?php
include_once '../includes/config.php';
$conf = new config();
$otp = $_GET['otp'];
$phone=$_GET['phone'];
$id = $conf->single("otp WHERE  otp='$otp' AND email='$phone'",'id');
if($id > 0){
	echo "1";
$conf->query("DELETE FROM otp WHERE email='$phone'");
}
else{
echo "0";
}
$conf->closeConnection();

?>