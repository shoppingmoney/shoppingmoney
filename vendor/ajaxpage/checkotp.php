<?php
include_once '../../mlm/includes/config.php';
$conf = new config();
session_start();
@extract($_GET);
// verifying email
$flag=0;
$id = $conf->single("otp WHERE otp='$otpe' AND email='$email'",'id');
if($id > 0){
	echo "1*";
$conf->query("DELETE FROM otp WHERE email='$email'");
}else{
	$flag=1;
echo "0*";
}
// verifying mobile
$id = $conf->single("register_vendor WHERE otp='$otpm' AND email='$email'",'id');
if($id > 0){
	echo "1*";
}else{
	$flag=1;
echo "0*";
}
if($flag==0){
$conf->query("UPDATE register_vendor SET otpstatus='1' WHERE email='$email'");	
$_SESSION['auth_first'] = $email;
}
$conf->closeConnection();

?>