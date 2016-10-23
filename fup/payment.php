<?php

//Array ( [point] => 774.4 [firstname] => Shahnawaz Alam [email] => alam@gmail.com [address_1] => jharoda [address_2] => surendera colony [mark] => near jharoda main bus stand [postcode] => 110084 [country] => IND [city] => DEL [submit] => Place Order ) ;
session_start();
print_r($_POST);
extract($_POST);
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
$ordId="SHOP".rand(1000,10000);
$address = $address_1." , ".address_2;
$userid=$dbAccess->selectSingleStmt("select * from firstimeregd where uemail = '".$_SESSION['myemail']."'");
$useid = $userid['id'];
$dbAccess->insertData("checkout","orderid,user_email,fname,address,city,pincode,country,phone,date,status,state,user_id,point,grandtotla,mode","'$ordId','$email','$firstname','$address','$city','$postcode','$country','$phone',now(),'0','$state','$useid','$point','$pays','$mode'");

$Lastid = $dbAccess->LastId();

$zopim=$dbAccess->selectData("select * from cart where user_id = '".$_SESSION['myemail']."' ");


foreach($zopim as $t){
$dbAccess->insertData("checkout_ord","product_id,mrp,qty,orderid,checkout_id,user_id,date,status","'".$t['product_id']."','".$t['unit_prc']."','".$t['qty']."','$ordId','$Lastid','$useid',now(),'0'");
}

$dbAccess->updateData("deleter from cart where user_id = '".$_SESSION['myemail']."'");

header("location:index.php");






?>




