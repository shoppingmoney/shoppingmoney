<?php

include 'config.php';

/**
 * Description of layercomplectionalgo
 *
 * @author aarohi
 */
class layercomplectionalgo extends config
{
    
    //trigger while insert into tree.
    function layercomplete($needidofuser)
    {
        if ($needidofuser == 8 || $needidofuser == 1 || $needidofuser == 2) { // gift will not distribute to company.
            return;
        }
        $select = $this->checkAvailablity("tree where refrenceid='$needidofuser'");
        $tid    = $this->single("tree where linkid='$needidofuser' ", "id");
        
        if ($select >= 5 && $select < 10) {
            
            $column = "uid,cr,mode,date,narration,status";
            $value  = "'$needidofuser','500','Layer Completion Income',now(),'1','1'";
            $chk = $this->checkGift(1, $needidofuser);
            if (empty($chk) || $chk == 0) {
				$this->query("UPDATE firstimeregd SET club='BRONZE' WHERE id='$needidofuser'");
                $this->insertValue("account", $column, $value);
            }
            
            //getting layer.    
        }
        
        //putting all members in array
        
        //totoal member of layer`1
        
        if ($select >= 5) { // gift will distribute only after introducing 5 member
            $arr1  = array();
            $check = $this->fetchall("tree where uplinerid='$tid'");
            foreach ($check as $chk) {
                $arr1[] = $chk->id;
            }
            //total memeber of layer 2  
            //echo count($arr1)."<br/>";
            $arr2 = array();
            for ($i = 0; $i < count($arr1); $i++) {
                
                $check = $this->fetchall("tree where uplinerid='" . $arr1[$i] . "'");
                foreach ($check as $chk) {
                    $arr2[] = $chk->id;
                }
            }
            //total member of layer 3  
            $arr3 = array();
            for ($i = 0; $i < count($arr2); $i++) {
                $check = $this->fetchall("tree where uplinerid='" . $arr2[$i] . "'");
                foreach ($check as $chk) {
                    $arr3[] = $chk->id;
                }
            }
            
            //total member of layer 4  
            $arr4 = array();
            for ($i = 0; $i < count($arr3); $i++) {
                $check = $this->fetchall("tree where uplinerid='" . $arr3[$i] . "'");
                foreach ($check as $chk) {
                    $arr4[] = $chk->id;
                }
            }
            
            //total member of layer 5  
            $arr5 = array();
            for ($i = 0; $i < count($arr4); $i++) {
                $check = $this->fetchall("tree where uplinerid='" . $arr4[$i] . "'");
                foreach ($check as $chk) {
                    $arr5[] = $chk->id;
                }
            }
            //total member of layer 6  
            $arr6 = array();
            for ($i = 0; $i < count($arr5); $i++) {
                $check = $this->fetchall("tree where uplinerid='" . $arr5[$i] . "'");
                foreach ($check as $chk) {
                    $arr6[] = $chk->id;
                }
            }
            //layer 7
            $arr7 = array();
            for ($i = 0; $i < count($arr6); $i++) {
                $check = $this->fetchall("tree where uplinerid='" . $arr6[$i] . "'");
                foreach ($check as $chk) {
                    $arr7[] = $chk->id;
                }
            }
            
            //layer 8
            $arr8 = array();
            for ($i = 0; $i < count($arr7); $i++) {
                $check = $this->fetchall("tree where uplinerid='" . $arr7[$i] . "'");
                foreach ($check as $chk) {
                    $arr8[] = $chk->id;
                }
            }
            
            //layer 9
            $arr9 = array();
            for ($i = 0; $i < count($arr8); $i++) {
                $check = $this->fetchall("tree where uplinerid='" . $arr8[$i] . "'");
                foreach ($check as $chk) {
                    $arr9[] = $chk->id;
                }
            }
            // Inserting Amount
            if (count($arr2) >= "25" && count($arr2) < "35") { // second layer
                $column = "uid,cr,mode,date,narration,status";
                $value  = "'$needidofuser','1000','Layer Completion Income',now(),'2','1'";
                $chk    = $this->checkGift(2, $needidofuser);
                if (empty($chk) || $chk == 0) {
					$this->query("UPDATE firstimeregd SET club='SILVER' WHERE id='$needidofuser'");
                    $this->insertValue("account", $column, $value);
                }
            }
            
            if (count($arr3) >= "125" && count($arr3) > "150") {
                $column = "uid,cr,mode,date,narration,status";
                $value  = "'$needidofuser','2000','Layer Completion Income',now(),'3','1'";
                $chk    = $this->checkGift(3, $needidofuser);
                if (empty($chk) || $chk == 0) {
					$this->query("UPDATE firstimeregd SET club='GOLD' WHERE id='$needidofuser'");
                    $this->insertValue("account", $column, $value);
                }
            }
            
            if (count($arr4) >= "625" && count($arr4) < "660") {
                $column = "uid,cr,mode,date,narration,status";
                $value  = "'$needidofuser','5000','Layer Completion Income',now(),'4','1'";
                $chk    = $this->checkGift(4, $needidofuser);
                if (empty($chk) || $chk == 0) {
					$this->query("UPDATE firstimeregd SET club='PEARL' WHERE id='$needidofuser'");
                    $this->insertValue("account", $column, $value);
                }
            }
            
            if (count($arr5) >= "3125" && count($arr5) < "3170") {
                $column = "uid,cr,mode,date,narration,status";
                $value  = "'$needidofuser','10000','Layer Completion Income',now(),'5','1'";
                $chk    = $this->checkGift(5, $needidofuser);
                if (empty($chk) || $chk == 0) {
					$this->query("UPDATE firstimeregd SET club='RUBY' WHERE id='$needidofuser'");
                    $this->insertValue("account", $column, $value);
                }
            }
            
            if (count($arr6) >= "15625" && count($arr6) < "15700") {
                $column = "uid,cr,mode,date,narration,status";
                $value  = "'$needidofuser','100000','Layer Completion Income',now(),'6','1'";
                $chk    = $this->checkGift(6, $needidofuser);
                if (empty($chk) || $chk == 0) {
					$this->query("UPDATE firstimeregd SET club='EMERALD' WHERE id='$needidofuser'");
                    $this->insertValue("account", $column, $value);
                }
            }
            
            if (count($arr7) >= "78125" && count($arr7) < "78200") {
                $column = "uid,cr,mode,date,narration,status";
                $value  = "'$needidofuser','800000','Layer Completion Income',now(),'7','1'";
                $chk    = $this->checkGift(7, $needidofuser);
                if (empty($chk) || $chk == 0) {
					$this->query("UPDATE firstimeregd SET club='TOPAZ' WHERE id='$needidofuser'");
                    $this->insertValue("account", $column, $value);
                }
            }
            if (count($arr8) >= "390625" && count($arr8) < "390750") {
                $column = "uid,cr,mode,date,narration,status";
                $value  = "'$needidofuser','2500000','Layer Completion Income',now(),'8','1'";
                $chk    = $this->checkGift(8, $needidofuser);
                if (empty($chk) || $chk == 0) {
					$this->query("UPDATE firstimeregd SET club='SAPPHIRE' WHERE id='$needidofuser'");
                    $this->insertValue("account", $column, $value);
                }
            }
            
            if (count($arr9) >= "1953125" && count($arr9) < "1953225") {
                $column = "uid,cr,mode,date,narration,status";
                $value  = "'$needidofuser','10000000','Layer Completion Income',now(),'9','1'";
                $chk    = $this->checkGift(9, $needidofuser);
                if (empty($chk) || $chk == 0) {
					$this->query("UPDATE firstimeregd SET club='DIAMOND' WHERE id='$needidofuser'");
                    $this->insertValue("account", $column, $value);
                }
            }
        }
        
        /* for testing... 
        
        print_r($arr1);
        echo "<br/>";
        print_r($arr2);
        echo "<br/>";
        print_r($arr3);
        echo "<br/>";
        print_r($arr4);
        echo "<br/>";
        print_r($arr5);
        echo "<br/>";
        print_r($arr6);
        echo "<br/>";
        print_r($arr7);
        echo "<br/>";
        print_r($arr8);
        echo "<br/>";
        print_r($arr9); */
    }
    
    function checkGift($narr, $id)
    {
        return $tid = $this->single("account where uid='$id' AND mode='Layer Completion Income' AND narration='$narr'", "id");
    }
    
    function croneJob()
    {
        $check = $this->fetchall("tree where day= curdate()");
        foreach ($check as $ch) {
            $this->layercomplete($ch->refrenceid);
        }
    }
    
}
$layer = new layercomplectionalgo();
$layer->croneJob();
//$layer ->layercomplete($_GET['id']);
