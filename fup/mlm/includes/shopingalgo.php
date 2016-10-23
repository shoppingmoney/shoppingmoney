<?php

include 'config.php';

/**
 * @author aarohi
 */
class shopingalgo extends config
{
    
    //put your code here
    function getIncomePointValueDistribution($pointvalue, $userid)
    {
        $toDistribute= $pointvalue * 0.45; // only 45% of total amount will be distributed.
        for ($i = 0; $i < 9; $i++) {
            
            switch ($i) {
                case "0":
                    //get upliner id and insert
                    $id     = $this->getingUpliner($userid);
                    $amount = $pointvalue * 0.10;
                    break;
                case "1":
                    //get upliner id and insert
                    $id     = $this->getingUpliner($id);
                    $amount = $pointvalue * 0.09;
                    break;
                case "2":
                    //get upliner id and insert
                    $id     = $this->getingUpliner($id);
                    $amount = $pointvalue * 0.08;
                    break;
                case "3":
                    //get upliner id and insert
                    $id     = $this->getingUpliner($id);
                    $amount = $pointvalue * 0.07;
                    break;
                case "4":
                    //get upliner id and insert
                    $id     = $this->getingUpliner($id);
                    $amount = $pointvalue * 0.06;
                    break;
                case "5":
                    //get upliner id and insert
                    $id     = $this->getingUpliner($id);
                    $amount = $pointvalue * 0.02;
                    break;
                case "6":
                    //get upliner id and insert
                    $id     = $this->getingUpliner($id);
                    $amount = $pointvalue * 0.01;
                    break;
                case "7":
                    //get upliner id and insert
                    $id     = $this->getingUpliner($id);
                    $amount = $pointvalue * 0.01;
                    break;
                case "8":
                    //get upliner id and insert
                    $id     = $this->getingUpliner($id);
                    $amount = $pointvalue * 0.01;
                    break;
                    
            }
            if (!empty($id)) {
                // checking for company owner
                if ($id == 8) {
                    $amount = $amount / 3;
                    $col    = "uid,cr,mode,date,status";
                    $val    = "'8','$amount','Shopping Income',now(),'1'";
                    $this->insertValue("account", $col, $val);
                    $val = "'1','$amount','Shopping Income',now(),'1'";
                    $this->insertValue("account", $col, $val);
                    $val = "'2','$amount','Shopping Income',now(),'1'";
                    $this->insertValue("account", $col, $val);
                } else {
                    $column = "uid,cr,mode,date,status";
                    $value  = "'$id','$amount','Shopping Income',now(),'1'";
                    $this->insertValue("account", $column, $value);
                }
            }
        }
    }
    
    function getingUpliner($value)
    {
        if ($value > 0 && $value != '') {
            $value = $this->single("tree where linkid = $value", "uplinerid");
            return $this->single("tree where id = $value", "linkid");
        } else {
            return '';
        }
    }
    // Crone job
    function croneJob()
    {
        $check = $this->fetchall("checkout where date= curdate() - INTERVAL 3 DAY");
        foreach ($check as $ch) {
            $this->getIncomePointValueDistribution($ch->point, $ch->user_id);
        }
        
    }
    
}
$sp = new shopingalgo();
$sp->croneJob();
//$sp->getIncomePointValueDistribution($_GET['point'], $_GET['id']);
