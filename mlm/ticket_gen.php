<?php
//error_reporting(0);
session_start();
ob_start();
if (isset($_SESSION['userEmail']) == null || isset($_SESSION['userEmail']) == '') {
    header("location:../index.php");
}
include '../vendor/lib/Connection.php';
include '../vendor/lib/DBQuery.php';
include '../vendor/lib/Fileupload.php';
include '../vendor/lib/Helpers.php';
$connection = new Connection();
$helper = new Helpers();
$FileUpload = new Fileupload();
$dbAccess = new DBQuery();
print_r($_POST);

if (isset($_POST['submit']) && isset($_POST['subject'])) {
	
extract($_POST);
if($_FILES['file']['name'] != ''){
	$file = rand(100,9999).$_FILES['file']['name'];
	move_uploaded_file($_FILES['file']['tmp_name'],"../vendor/images/$file");
}else{
	$file = "";
}
$requestId = "SM".strtoupper(substr(preg_replace("~[^a-zA-Z0-9]+~", "",$subject),0,3)).rand(100000,999999);
$read = $dbAccess->selectSingleStmt("select * from register_vendor where email = '" . $_SESSION['userEmail'] . "' ");
$vendorId = $read['unique_user_id'];
$dbAccess->insertData("request", "vid,subject,description,file,ticketid,date,status","'$vendorId','$subject','$description','$file','$requestId',now(),'Open'");
$_SESSION['message']="Ticket has been generated : Ticket Id:$requestId";
	header("location:panel.php?dash=support");
	
}
?>