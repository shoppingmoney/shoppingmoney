<?php

include 'config.php';
/**
 * Description of growtreealgo
 *
 * @author aarohi
 */
class GrowTreeAlgo extends config
{
    //put your code here
    //Status=0, KYC not completed & Status=1 completed KYC
    //Status=2 Into tree.
    //Status=3 Deactive by condition
    // All condition in firstimeregd.
    function addToTree($userid) //check the condition at the time of purchase.
    {
        $avail = $this->single("tree where linkid='$userid' ", "id"); //checking whether user is present
        if (!empty($avail) || $avail != null) {
            return;
        }
        

        //$data= $this->checkAvailablity("tree where refrencedid='$refrenceid'");
        $column = "uplinerid,refrenceid,name,level,day,status,linkid";
        $status = $this->single("firstimeregd where id='$userid' ", "ustatus"); // checking whether KYC is completed
        if ($status == 1) {
            $detail = $this->fetchSingle("firstimeregd where id='$userid'");
			$name = $detail->ufirstname;
			$refrenceid = $detail->refid;
            $tid  = $this->single("tree where linkid='$refrenceid' ", "id");
            $data = $this->single("checkout_ord where user_id='$userid'", "sum(mrp)");
			$data = 5000;
            if ($data >= 5000){
                //You are entitled in tree.
                $level = $this->single("tree where id='$tid'", "level");
                // for layer 1
                $arr1  = array();
                $check = $this->fetchall("tree where uplinerid='$tid'");
                foreach ($check as $chk) {
                    $arr1[] = $chk->id;
                }
                if (count($arr1) < 5 || $refrenceid == 8) { // 8 is company id and all member through company reference will be at 2nd level
                    $lev    = $level + 1;
                    $insert = $this->insertValue("tree", $column, "'$tid','$refrenceid','$name','$lev',now(),'1','$userid'");
                    echo "inserted";
					// checking for company owner
				if($refrenceid == 8){
				 $col = "uid,cr,mode,date,narration,status";
                 $val = "'8','83.34','Referral Income',now(),'" . $tid . "','1'";
				$this->insertValue("account", $col, $val);
				$val = "'1','83.33','Referral Income',now(),'" . $tid . "','1'";
				$this->insertValue("account", $col, $val);
				$val = "'2','83.33','Referral Income',now(),'" . $tid . "','1'";
				$this->insertValue("account", $col, $val);
				}else{
				$col = "uid,cr,mode,date,narration,status";
                $val = "'$refrenceid','250','Referral Income',now(),'" . $tid . "','1'";
				$this->insertValue("account", $col, $val);
				}
                    return;
                }
                
                // for layer 2
                $arr2 = array();
                
                $arr2 = $this->insertMemeber($arr1, $refrenceid, $userid, $name, $level + 2);
                if (count($arr2) < 25) {
                    return;
                }
                // layer 3
                $arr3 = array();
                $arr3 = $this->insertMemeber($arr2, $refrenceid, $userid, $name, $level + 3);
                if (count($arr3) < 125) {
                    return;
                }
                
                // layer 4
                $arr4 = array();
                $arr4 = $this->insertMemeber($arr3, $refrenceid, $userid, $name, $level + 4);
                if (count($arr4) < 625) {
                    return;
                }
                // layer 5
                $arr5 = array();
                $arr5 = $this->insertMemeber($arr4, $refrenceid, $userid, $name, $level + 5);
                if (count($arr5) < 3125) {
                    return;
                }
                // layer 6
                $arr6 = array();
                $arr6 = $this->insertMemeber($arr5, $refrenceid, $userid, $name, $level + 6);
                if (count($arr6) < 15625) {
                    return;
                }
                // layer 7
                $arr7 = array();
                $arr7 = $this->insertMemeber($arr6, $refrenceid, $userid, $name, $level + 7);
                if (count($arr7) < 78125) {
                    return;
                }
                // layer 8
                $arr8 = array();
                $arr8 = $this->insertMemeber($arr7, $refrenceid, $userid, $name, $level + 8);
                if (count($arr8) < 390625) {
                    return;
                }
                // layer 9
                $arr9 = array();
                $arr9 = $this->insertMemeber($arr8, $refrenceid, $userid, $name, $level + 9);
                if (count($arr9) < 1953125) {
                    return;
                }
                
            }
        }
    }
    function insertMemeber($ar, $ref, $mem, $name, $level)
    {
        $column = "uplinerid,refrenceid,name,level,day,status,linkid";
        $arr    = array();
        $chkarr = array();
        //print_r($ar);
        for ($i = 0; $i < count($ar); $i++) {
            
            $check = $this->fetchall("tree where uplinerid='" . $ar[$i] . "'");
            foreach ($check as $chk) {
                $arr[]    = $chk->id; // Store total member of this level
                $chkarr[] = $chk->id; // Store member under particular parent
                //echo "<br/> $i id is: ".$id = $chk->id;
                
            }
            if (count($chkarr) < 5) {
                $insert = $this->insertValue("tree", $column, "'" . $ar[$i] . "','$ref','$name','$level',now(),'1','$mem'");
                echo "inserted";
				// Inserting in account for refferal income
				// checking for company owner
				if($ref == 8){
				 $col = "uid,cr,mode,date,narration,status";
                 $val = "'8','83.34','Referral Income',now(),'" . $ar[$i] . "','1'";
				$this->insertValue("account", $col, $val);
				$val = "'1','83.33','Referral Income',now(),'" . $ar[$i] . "','1'";
				$this->insertValue("account", $col, $val);
				$val = "'2','83.33','Referral Income',now(),'" . $ar[$i] . "','1'";
				$this->insertValue("account", $col, $val);
				}else{
				$col = "uid,cr,mode,date,narration,status";
                $val = "'$ref','250','Referral Income',now(),'" . $ar[$i] . "','1'";
				$this->insertValue("account", $col, $val);
				}
				
                return $arr;
            }
            unset($chkarr);
        }
        return $arr;
    }
	function croneJob(){
		$check = $this->fetchall("checkout where date= curdate() group by user_id");
		foreach($check as $ch){
			$this ->addToTree($ch->user_id);
		}
		
	}
}

$gtree = new GrowTreeAlgo();
$gtree->croneJob();
//$gtree->addToTree(14);