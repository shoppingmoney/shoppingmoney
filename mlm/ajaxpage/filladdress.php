<?php

 include_once '../includes/config.php';
 $conf = new config();
 $pin= $_GET["pin"];
 $area='';
  $refid = $conf->fetchSingle("state_district WHERE pin='$pin'");
  $state=$refid->state;
  $district=$refid->district;
  $arr = $conf->fetchall("state_district WHERE pin='$pin'");
  foreach($arr as $ar){
	 $area .= $ar->area ."~"; 
  }
  //$area=$refid->area;
  if($refid->id==0 || empty($refid->id))
  { echo "not found";}
else
{ echo "found*".$state."*".$district."*".$area;
 // echo $bank_name;
 // echo $bank_add;
}
?>