<?php

include 'config.php';

/**
 * Description of Shifting Tree.
 *
 * @author aarohi
 */
class ShiftDeleteTree extends config
{
    //Shifting tree.
    function shiftTree($tid, $upid = 0)
    {
        $select = $this->checkAvailablity("tree where uplinerid='$tid'");
        if ($select > 0) {
            // Getting id of member in tree
            $id = $this->single("tree where uplinerid='$tid' ", "id");
            $this->query("UPDATE tree SET id='$tid', uplinerid='$upid' WHERE id='$id'");
            $this->shiftTree($id, $tid); //using recursion here.
            
        }
    }
    
    function deleteMember($uid)
    {
		$this->query("DELETE FROM shopwarn WHERE uid='$uid'");
        $res  = $this->fetchSingle("tree where linkid='$uid' ", "id,uplinerid");
        $tid  = $res->id;
        $upid = $res->uplinerid;
        $flag = $this->query("DELETE from tree WHERE linkid='$uid'");
        if ($flag > 0) {
            $this->shiftTree($tid, $upid);
        }
        
    }
    function notify()
    {
		$this->query("DELETE FROM shopwarn WHERE status='3'"); // status 3 is granted by admin to keep particular user.
        $user = $this->fetchall("firstimeregd WHERE ustatus=1");
        foreach ($user as $usr) {
            $uid  = $usr->id;
            $prev = $this->fetchSingle("shopwarn where uid='$uid' AND status <> 2");
            if ($prev->uid > 0) { // if user is already notified.
                //$date = $prev->date;
                $month  = $prev->month;
                $amount = $prev->amount;
                if ($month == 1) {
                    $req_amt = 1000 + $amount;
                    $mnt     = 2;
                    $status  = 0;
                } else {
                    $req_amt = 1000 + $amount;
                    $mnt     = 3;
                    $status  = 1; // warning will be shown to admin on status 1.
                }
				if($month < 3){
                $amt = $this->single("checkout_ord where YEAR(date)=YEAR(now()) AND MONTH(date) = MONTH(now()) AND user_id='$uid' group by user_id", "sum(mrp)");
                if ($amt >= $req_amt) {
                    $this->query("DELETE FROM shopwarn WHERE uid='$uid'");
                } else {
                    $message = "You have not complete your minimum shopping amount from last $mnt month.<br/>
						Which is Rs $req_amt , and you shop for only Rs $amt.<br/><b>You will be terminated if you don't shop for Rs 3000 in three continuos month.</b>";
                    $amt     = $req_amt - $amt;
                    $this->updateQuery("shopwarn", "date,amount,month,status", "now()~,'$amt'~,'$mnt'~,'$status'","WHERE uid='$uid'");
                    $this->sendMail($usr->uemail, $message);
                }
				}
            } else { // if user is not notified yet.
                $amt = $this->single("checkout_ord where YEAR(date)=YEAR(now()) AND MONTH(date) = MONTH(now()) AND user_id='$uid' group by user_id", "sum(mrp)");
                if ($amt >= 1000) {
                    //$this->query("DELETE FROM shopwarn WHERE uid='$uid'");
                } else {
                    $message = "You have not complete your minimum shopping amount in this month.<br/>
						Which is Rs 1000 , and you shop for only Rs $amt.<br/><b>You will be terminated if you don't shop for Rs 3000 in three continuos month.</b>";
                    $amt     = 1000 - $amt;
                    $this->insertValue("shopwarn", "uid,date,amount,month,status", "'$uid',now(),'$amt','1','0'");
                    $this->sendMail($usr->uemail, $message);
                }
            }
        }
    }
    function sendMail($email, $message)
    {
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: ShoppingMoney<info@shoppingmoney.com>' . "\r\n";
        //date_default_timezone_set("Asia/Kolkata");
        //$date=date("d:m:Y h:i:sa");
        $subject = "Shopping Notification";
        //$email = "alam.buoyant@gmail.com";
        $body    = "
         <html>
		 <body>
		 <p>$message</p>
		 </body>
		 </html>
        ";
        mail($email, $subject, $body, $headers);
    }
    
    function croneJob()
    {
        // Sending notification
        $this->notify();
        
        // Deleting user after admin approval i.e whose status is changed to 2.
        $check = $this->fetchall("shopwarn where status='2' group by uid");
        foreach ($check as $ch) {
            $this->deleteMember($ch->uid); // deleting user and shiftTree
        }
    }
}
$layer = new ShiftDeleteTree();
$layer->croneJob();
