<?php

 /*include '../includes/config.php';
 $conf = new config();
 $ifsc= $_GET['ifsc'];
 
  $refid = $conf->single("bank_ifsc WHERE ifsc='$ifsc'",'id');
  
  if($refid==0 || empty($refid))
  { echo "not-found";}
else
{ echo "found";}
 */
 include_once '../includes/config.php';
 $conf = new config();
 $ifsc= $_GET["ifsc"];
 
  $refid = $conf->fetchSingle("bank_ifsc WHERE ifsc='$ifsc'");
  $bank_name=$refid->bank;
  $bank_add=$refid->address;
  
  if($refid->id==0 || empty($refid->id))
  { echo "not found";}
else
{ echo "found*".$bank_name."*".$bank_add;
 // echo $bank_name;
 // echo $bank_add;
}
?>