<?php
/* 
 To Do Login based action.
 */
include 'includes/loginModel.php';
include '../vendor/lib/Helpers.php';

$helper = new Helpers();

extract($_POST);

$conf = new loginModel();
$con=$conf->objectcreate();
$val = $conf->loginmein($email, $pass);
if(empty($val))
{
    echo "<script>alert('Please check your usename and password!!');window.location='../index.php';</script>";
}else{
	$system_id=$helper->systemId();

mysqli_query($con,"update cart set user_id = '".$email."' where system_id = '$system_id' And user_id = '' ");
$too=$conf->fetchSingle("firstimeregd where uemail = '".$email."'");
$fro=$conf->fetchSingle("userdetails where linkid = '".$too->id."'");
if($fro->pin==null || $fro->pin==''){
$nat="Patparganj,East Delhi,110091";
}else{
$nat=$fro->state.",".$fro->city.",".$fro->district.",".$fro->pin;
}
//die;
$helper->cookieHelper("LOCATION",$nat);
//echo $bringback;
   echo "<script>window.location='panel.php';</script>";




}

//$_SESSION['myemail'];

//print_r($_SESSION);
//echo count($val);
?>
