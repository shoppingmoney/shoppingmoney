<?php
session_start();
include_once '../includes/config.php';
$conf = new config();
$firstinfo = $conf->fetchSingle("firstimeregd WHERE uemail='{$_SESSION['myemail']}'");
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: Shoppingmoney.in<info@shoppingmoney.com>' . "\r\n";
//date_default_timezone_set("Asia/Kolkata");
//$date=date("d:m:Y h:i:sa");
//$email = "alam.buoyant@gmail.com";
$email = $_GET['email'];
$name = urldecode($_GET['name']);
$reff = urldecode($_GET['reff']);
$subject = "$name has sent you an invitation to join Shoppingmoney.in";
$message = "<p>
    HI
</p>
<p>
    Greetings of the day!!
</p>
<p>
    We would like to inform you that your friend $name, has invited you to join shoppingmoney.in- 'shop to earn' via referral link $reff
</p>
<p>
   <a href='$reff'> Click here to accept invitation.</a>
</p>
<p>
    About Shoppingmoney.in
</p>
<p align='justify'>
    Shoppingmoney. in - 'shop to earn' is building bigger shopping dream for every Indian in the age of the internet where retailing has changed.
    Shoppingmoney.in works through RBMS (Referral Based Marketing System) model to full fill the growing demand of online shopping. We deal in all kinds of
    Apparels, electronics, Groceries and many other categories .Here customers can introduce near and dear ones for shopping. To become a business partner with
    shoppingmoney .in business associates have to do minimum shopping of worth Rs 5000.
</p>
<p>
    For further advice and assistance do call us or drop a mail. You may refer our <a href='http://shoppingmoney.in/faq.php'>FAQ</a> section for guidance and connect with us anytime.
</p>
<p>
    Thank you
</p>
<p>
    Shoppingmoney .in Team
</p>";
if($firstinfo->mailcnt <= 10){
	$sql="firstimeregd SET mailcnt = mailcnt+1 WHERE uemail='{$_SESSION['myemail']}'";
	mail($email,$subject,$message,$headers);
	$conf->updateValue($sql);
	echo "done";
}
$conf->closeConnection();
?>