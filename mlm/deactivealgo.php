<?php
include 'includes/config.php';

$conf = new config();

$table="tree";

$rs = $conf->fetchall($table);
foreach ($rs as $r)
{
    //deletion algorithm done.
    if(!empty($deactiveid)){        
        $rsp = $conf->fetchall(" tree where uplinerid='$deactiveid' limit 1");
        foreach ($rsp as $rt)
        {
            $updateme = " tree set refrenceid='$rt->refrenceid',name='$rt->name',day='$rt->day',linkid='$rt->linkid' where id='$deactiveid'";
            $update = $conf->updateValue($updateme);
            //updating delete
            $deactiveid = $rt->id;
        }
        //deleting last data.
        
        
    }    
}

$conf->delme("tree", $deactiveid,"Order by id DESC limit 1");//delete the last value of Users.
?>
