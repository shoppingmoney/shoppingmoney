<?php
include 'class/Connection.php';
include 'class/Fileupload.php';
include 'class/DBQuery.php';
include 'class/Helpers.php';
include 'class/ReturnMsg.php';
$connection = new Connection();
$helper = new Helpers();
$FileUpload = new Fileupload();
$dbAccess = new DBQuery();

$LoadMsg = new ReturnMsg();


$yii=$dbAccess->selectSingleStmt("select * from product_tbl where product_id='".$_GET['poid']."'");
?>



View Pincodes:- &nbsp;<br/>
<?=$yii['pincode'];?>

  											