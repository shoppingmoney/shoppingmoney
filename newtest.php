<?php

session_start();
ob_start();
include 'vendor/lib/Connection.php';
include 'vendor/lib/Fileupload.php';
include 'vendor/lib/DBQuery.php';
include 'vendor/lib/Helpers.php';
include 'vendor/lib/ReturnMsg.php';
$connection = new Connection();
$helper = new Helpers();
$FileUpload = new Fileupload();
$dbAccess = new DBQuery();
$LoadMsg = new ReturnMsg();
$system_id=$helper->systemId();
if(isset($_SESSION['myemail'])){
	$user_session_id = $_SESSION['myemail'];
}else{
	$user_session_id = '';
}
print_r($_POST);
@extract($_POST);
$fullprc = $prct*$qutynow;
$dbAccess->updateData("insert into buynow(product_id,unit_prc,mrp,qty,shipping,point,system_id,user_id) values('$pridnow','$prct','$fullprc','$qutynow','$shiponthedocknow','$mypointisnow','$system_id','$user_session_id')");
header("location:checkout-now.php");

?>