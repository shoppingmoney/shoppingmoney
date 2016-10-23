<?php

/*  
 * This is for layer completion algo.
 */
include 'includes/config.php';
$conf = new config();

//trigger while insert into tree.
$select = $conf->checkAvailablity("tree where refrenceid='$needidofuser' && uplinerid='$needidofuser'");

$layerup = $conf->single("tree where id='$needidofuser' ", "level");
        $layerdown = $conf->single("tree where refrenceid='$needidofuser' && uplinerid='$needidofuser' order by id DESC limit 1", "level");
        //$level=$layerdown-$layerup;
        
        $secound = $conf->checkAvailablity("tree where uplinerid='$needidofuser' && level='$layerdown+1'");
        
        //bahut tedha hai bhai.
        
        
if($select == 5 && $select<6)
{
   
    $column="uid,cr,mode,date,status";
    $value = "'$needidofuser','500','5 Direct Refrence Income',now(),'1'";
    $conf->insertValue("account", $column, $value);
    
    //getting layer.    
}
    


