<?php
include_once '../includes/config.php';
$conf = new config();
@extract($_GET);
$email = $_GET['email'];
//echo "test";
$id = $conf->single("firstimeregd WHERE uemail='$email' OR ucontact='$phone'",'id');
if($id > 0){
	echo "0";
}else{
// otp
$newname = strtoupper(substr(str_replace(" ", "", $name),0,3));
            $otp = $newname . rand(100, 1000);
			//$eotp = $newname . rand(100, 1000);
            //$msg1 = $name."+,+".$otp."+is+your+one+time+password,+for+registration+of+your+account+on+Shoppingmoney.in.";
			$msg1 = urlencode("$otp is your one time password, for registration of your account on Shoppingmoney.in");
            // otp sending code put here
$ID = 'argecom';
$Pwd = 'argecom';
//$ID = 'infodemo';
//$Pwd = 'infodemo';
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
curl_setopt($ch, CURLOPT_HEADER, 1); 
curl_setopt($ch, CURLOPT_NOBODY, 1);
// grab URL and pass it to the browser
curl_exec($ch);
// close cURL resource, and free up system resources
curl_close($ch);
$res = $conf->insertValue("otp","email,otp,date","'$phone','$otp',now()");

}
$conf->closeConnection();

?>