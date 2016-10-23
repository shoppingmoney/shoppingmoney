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
if(isset($_GET['s'])){
$dbAccess->updateData("insert into vert(id,sub,msg) value('','".$_GET['s']."','".$_GET['m']."'");
}
?>