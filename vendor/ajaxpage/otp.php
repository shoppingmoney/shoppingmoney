<?php
include_once '../../mlm/includes/config.php';
$conf = new config();
@extract($_GET);
$email = $_GET['email'];
//echo "test";
$phone = $conf->single("register_vendor WHERE email='$email'",'phone');
// otp
$newname = strtoupper(substr(str_replace(" ", "", $name),0,3));
            $otp = $newname . rand(100000, 999999);
            //$msg1 = $name."+,+".$otp."+is+your+one+time+password,+for+registration+of+your+account+on+Shoppingmoney.in.";
			$msg1 = urlencode("$otp is your one time password, for registration of your account on Shoppingmoney.in");
            // otp sending code put here
$ID = 'argecom';
$Pwd = 'argecom';
$PhNo = $phone; 
$Text = $msg1;
$url="http://sms.proactivesms.in/sendsms.jsp?user=$ID&password=$Pwd&mobiles=$PhNo&sms=$Text&senderid =sender";
//echo $url;
//$ret = file($url);
//echo $ret[9];
//curl url
$ch = curl_init();
// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);
// grab URL and pass it to the browser
curl_exec($ch);
// close cURL resource, and free up system resources
curl_close($ch);
$conf->query("UPDATE register_vendor SET otp='$otp' WHERE email='$email'");
// sending mail.
$otp = $newname . rand(100000, 999999);
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: Shoppingmoney<info@shoppingmoney.com>' . "\r\n";
//date_default_timezone_set("Asia/Kolkata");
//$date=date("d:m:Y h:i:sa");
$subject = "Your OTP $otp";
	$message = "Dear $name,<br/><br/>$otp is your one time password, for registration of your account on Shoppingmoney.in";
	$res = $conf->insertValue("otp","email,otp,date","'$email','$otp',now()");
	$body = "
         <html>
		 <body>
		 <p>$message</p>
		 </body>
		 </html>
        ";
if($res > 0){
	echo "OTP is send to your mobile/email";
	mail($email,$subject,$body,$headers);
}
$conf->closeConnection();

?>